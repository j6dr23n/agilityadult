<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Videos\StoreRequest;
use App\Http\Requests\Videos\UpdateRequest;
use App\Models\Video;
use App\Services\VideoServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if(auth()->user()->role === 'admin'){
                $videos = Video::latest()->get();
            }else{
                $videos = Video::where('user_id',auth()->id())->latest()->get();
            }
            $videos->each(function ($videos) {
                $videos->title = Str::limit($videos->title, 30);
                $videos->tags = Str::limit($videos->tags, 30);
                $videos->created_diff = $videos->created_at->diffForHumans();
                $videos->views_count = views($videos)->count();
            });

            return datatables()->of($videos)
                ->addColumn('poster', function ($data) {
                    if($data->type === 'premium'){
                        $button = '<img src="'.asset('storage/videos/images/'.$data->poster[0]).'" style="max-width:100%;height:100%;">';
                    }else{
                        $button = '<img src="'.$data->poster[0].'" style="max-width:100%;height:100%;">';
                    }

                    return $button;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a title="View" href="/view/'.$data->slug.'" class="btn btn-info btn-sm br-5 me-2"><i class="fas fa-eye"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a title="Edit" href="videos/'.$data->id.'/edit" class="btn btn-warning btn-sm br-5 me-2"><i class="fas fa-edit"></i></a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a title="Delete" data-id="'.$data->id.'" class="delete-btn btn btn-danger btn-sm br-5 me-2"><i class="fas fa-trash-alt"></i></a>';

                    return $button;
                })->rawColumns(['action', 'poster'])->make(true);
        }
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
        $this->authorize('create', Video::class);

        return view('backend.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, VideoServices $action)
    {
        $this->authorize('create', Video::class);

        $data = $request->validated();
        $action->store($data);

        return redirect()->route('videos.index')->with('success', 'Video Created!!!');
    }

    public function uploadLargeFiles(Request $request, VideoServices $action)
    {
        $action->uploadLargeFiles($request);

        return back()->with('success', 'Uploaded!!!');
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

        if (Auth::check() === false && $video->type === 'premium') {
            return redirect(route('pages.index'))->with('error', 'VIP Customer Only!!!');
        }

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
        $this->authorize('update', $video);

        return view('backend.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Video $video, VideoServices $action)
    {
        $this->authorize('update', $video);

        $data = $request->validated();
        $action->update($data, $video);

        return redirect()->route('videos.index')->with('success', 'Video Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video, VideoServices $action): JsonResponse
    {
        $this->authorize('delete', $video);

        $delete = $action->destroy($video);

        if ($delete) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => __("Couldn't Delete. Please Try Again!"),
            ], 500);
        }
    }
}
