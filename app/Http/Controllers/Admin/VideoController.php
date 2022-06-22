<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Videos\StoreRequest;
use App\Http\Requests\Videos\UpdateRequest;
use App\Models\Video;
use App\Services\VideoServices;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::latest()->get();

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
    public function store(StoreRequest $request,VideoServices $action)
    {

        $data = $request->validated();
        $action->store($data);

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

        $videos = Video::inRandomOrder()->take(4)->get();
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
    public function update(UpdateRequest $request,Video $video, VideoServices $action)
    {
        $data = $request->validated();
        $action->update($data,$video);

        return redirect()->route('videos.index')->with('success', 'Video Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video,VideoServices $action)
    {
        $action->destroy($video);

        return redirect()->route('videos.index')->with('success', 'Videos Deleted!!!');
    }
}
