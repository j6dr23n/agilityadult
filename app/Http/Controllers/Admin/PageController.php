<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $videos = DB::table('videos')->whereNotNull('embed_link')->latest()->get();
        $photos = DB::table('videos')->whereNull('embed_link')->latest()->get();
        $users = DB::table('users')->latest()->get();
        $members = DB::table('users')->where('role', 'member')->get();
        if(auth()->user()->role === 'uploader'){
            $videos = DB::table('videos')->whereNotNull('embed_link')->where('user_id',auth()->id())->whereMonth('created_at',Carbon::now()->format('m'))->latest()->get();
            $tdy_videos = Video::where('user_id',auth()->id())->whereDate('created_at',Carbon::today())->get();
        }

        return view('backend.index', compact('videos', 'photos', 'users', 'members','tdy_videos'));
    }
    
    public function working_days()
    {
        $users = DB::table('users')->select("users.name", DB::raw("count(videos.id) as total,DATE_FORMAT(videos.created_at,'%M') as month"))->join('videos','users.id','=','videos.user_id')->whereMonth('videos.created_at',Carbon::now()->format('m'))->groupBy('videos.user_id')->get();
        
        return view('backend.pages.working-days',compact('users'));
    }
}
