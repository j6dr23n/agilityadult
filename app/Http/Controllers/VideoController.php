<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $videos = DB::table('videos')->latest()->paginate(12);

        return view('backend.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        // if($request->video !== null){
        //     $token = $this->getTokenB2();
        //     $video = $this->uploadVideoB2($request,$token);
        //     $data['embed_link'] = 'https://f003.backblazeb2.com/file/agadult-/'.$video['fileName'];
        // }
        if ($request->has('poster')) {
            foreach ($request->file('poster') as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $path = $item->storeAs('/videos/images', $fileName, 'public');
                $images[] = $fileName;
            }
            $data['poster'] = $images;
        }
        Video::create($data);

        return redirect()->route('videos.index')->with('success', 'Video Created!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        views($video)->cooldown($minutes = 3)->record();

        $videos = DB::table('videos')->latest()->take(4)->get();
        $totalViews = views($video)->count();

        return view('frontend.pages.details', compact('video', 'videos', 'totalViews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('backend.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $data = $request->all();
        if ($request->hasFile('poster')) {
            if (is_array($video->poster)) {
                foreach ($video->poster as $image) {
                    Storage::disk('public')->delete('/videos/images/'.$image);
                }
            }

            foreach ($request->file('poster') as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $path = $item->storeAs('/videos/images/', $fileName, 'public');
                $images[] = $fileName;
            }
            $data['poster'] = $images;
        }

        $video->fill($data)->save();

        return redirect()->route('videos.index')->with('success', 'Video Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if (is_array($video->poster)) {
            foreach ($video->poster as $image) {
                Storage::disk('public')->delete('/videos/images/'.$image);
            }
        }
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Videos Deleted!!!');
    }

    protected function getTokenB2(){
        $apiUrl = "https://api003.backblazeb2.com";
        $authToken = "4_003ea52174924fc0000000003_01a4d4eb_fb1f50_acct_yEst3R3Isw8OLUmLFEIbvgfLjtA=";

        $api_url = $apiUrl; // From b2_authorize_account call
        $auth_token = $authToken; // From b2_authorize_account call
        $bucket_id = env('BUCKET_ID');  // The ID of the bucket you want to upload to

        $session = curl_init($api_url .  "/b2api/v2/b2_get_upload_url");

        // Add post fields
        $data = array("bucketId" => $bucket_id);
        $post_fields = json_encode($data);
        curl_setopt($session, CURLOPT_POSTFIELDS, $post_fields); 

        // Add headers
        $headers = array();
        $headers[] = "Authorization: " . $auth_token;
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers); 

        curl_setopt($session, CURLOPT_POST, true); // HTTP POST
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
        $server_output = curl_exec($session); // Let's do this!
        curl_close ($session); // Clean up
        $results = json_decode($server_output,true);
        $upload_auth_token = $results['authorizationToken'];
        $upload_url = $results['uploadUrl'];
        $token = [$upload_url,$upload_auth_token];

        return $token;
    }

    protected function uploadVideoB2($request,$token){
        $file = $request->file('video');
        $file_name = $file->getClientOriginalName();
        $my_file = $request->file('video');
        $handle = fopen($my_file, 'r');
        $read_file = fread($handle,filesize($my_file));

        $upload_url = $token[0]; // Provided by b2_get_upload_url
        $upload_auth_token = $token[1]; // Provided by b2_get_upload_url
        $bucket_id = env('BUCKET_ID');  // The ID of the bucket
        $content_type = "text/plain";
        $sha1_of_file_data = sha1_file($my_file);

        $session = curl_init($upload_url);

        // Add read file as post field
        curl_setopt($session, CURLOPT_POSTFIELDS, $read_file); 

        // Add headers
        $headers = array();
        $headers[] = "Authorization: " . $upload_auth_token;
        $headers[] = "X-Bz-File-Name: " . $file_name;
        $headers[] = "Content-Type: " . $content_type;
        $headers[] = "X-Bz-Content-Sha1: " . $sha1_of_file_data;
        $headers[] = "X-Bz-Info-Author: " . "unknown";
        $headers[] = "X-Bz-Server-Side-Encryption: " . "AES256";
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers); 

        curl_setopt($session, CURLOPT_POST, true); // HTTP POST
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
        $server_output = curl_exec($session); // Let's do this!
        curl_close ($session); // Clean up
        $output = $server_output;

        return json_decode($output,true);
    }
}
