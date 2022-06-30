<?php

namespace App\Services;

use App\Jobs\CreateVideoThumbnailJob;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideoServices
{
    public function store($data): Video
    {
        // if($request->video !== null){
        //     $token = $this->getTokenB2();
        //     $video = $this->uploadVideoB2($request,$token);
        //     $data['embed_link'] = 'https://f003.backblazeb2.com/file/agadult-/'.$video['fileName'];
        // }
        if (array_key_exists('poster', $data)) {
            foreach ($data['poster'] as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $fileName = str_replace(' ', '', $fileName);
                $item->storeAs('/videos/images', $fileName, 'public');
                $images[] = $fileName;
            }
            if (array_key_exists('embed_link', $data)) {
                $data['embed_link'] = str_replace('f003.backblazeb2.com', 'videos.agilityadult.com', $data['embed_link']);
            }
            $data['poster'] = $images;
        } else {
            $link = $data['embed_link'];
            $ffprobe = \FFMpeg\FFProbe::create([
                'ffmpeg.binaries'  => "/usr/bin/ffmpeg",
                'ffprobe.binaries' => "/usr/bin/ffprobe"
            ]);
            $video_dimensions = $ffprobe
                    ->streams($link)   // extracts streams informations
                    ->videos()                      // filters video streams
                    ->first()                       // returns the first video stream
                    ->getDimensions();              // returns a FFMpeg\Coordinate\Dimension object
            $width = $video_dimensions->getWidth();
            $height = $video_dimensions->getHeight();
            $title = $data['title'];
            dispatch(new CreateVideoThumbnailJob($width,$height,$link,$title));
            $images[] = $title.'.jpg';
            $data['poster'] = $images;
        }
        $video = Video::create($data);

        return $video;
    }

    public function update($data, $video): bool
    {
        if (array_key_exists('poster', $data)) {
            if (is_array($video->poster)) {
                foreach ($video->poster as $image) {
                    Storage::disk('public')->delete('/videos/images/'.$image);
                }
            }

            foreach ($data['poster'] as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $item->storeAs('/videos/images/', $fileName, 'public');
                $images[] = $fileName;
            }
            $data['poster'] = $images;
        }
        $video = $video->fill($data)->save();

        return $video;
    }

    public function destroy($video)
    {
        if (is_array($video->poster)) {
            foreach ($video->poster as $image) {
                Storage::disk('public')->delete('/videos/images/'.$image);
            }
        }

        return $video->delete();
    }

    protected function getTokenB2()
    {
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
        curl_close($session); // Clean up
        $results = json_decode($server_output, true);
        $upload_auth_token = $results['authorizationToken'];
        $upload_url = $results['uploadUrl'];
        $token = [$upload_url,$upload_auth_token];

        return $token;
    }

    protected function uploadVideoB2($request, $token)
    {
        $file = $request->file('video');
        $file_name = $file->getClientOriginalName();
        $my_file = $request->file('video');
        $handle = fopen($my_file, 'r');
        $read_file = fread($handle, filesize($my_file));

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
        curl_close($session); // Clean up
        $output = $server_output;

        return json_decode($output, true);
    }
}
