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

        return view('backend.videos.index',compact('videos'));
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
        if($request->hasFile('poster')){
            foreach($request->file('poster') as $item){
                $fileName = time().'-'.$item->getClientOriginalName();
                $path = $item->storeAs('/videos/images/', $fileName, 'public');
                $images[] = $fileName;
            }
            $data['poster'] = $images;
        }

        $video = Video::create($data);

        return redirect()->route('videos.index')->with('success','Video Created!!!');
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

        return view('frontend.pages.details',compact('video','videos','totalViews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('backend.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Video $video)
    {
        $data = $request->all();
        if($request->hasFile('poster')){
            if(is_array($video->poster)){
                foreach($video->poster as $image){
                    Storage::disk('public')->delete('/videos/images/'.$image);
                }
            }

            foreach($request->file('poster') as $item){
                $fileName = time().'-'.$item->getClientOriginalName();
                $path = $item->storeAs('/videos/images/', $fileName, 'public');
                $images[] = $fileName;
            }
            $data['poster'] = $images;
        }

        $video->fill($data)->save();

        return redirect()->route('videos.index')->with('success','Video Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()->route('videos.index')->with('success','Videos Deleted!!!');
    }
}
