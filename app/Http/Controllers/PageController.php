<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $title = null;
        if(AUth::check()){
            $videos = DB::table('videos')->where('status','published')->latest()->paginate(20);
        }else{
            $videos = DB::table('videos')->where('status','published')->latest()->limit(50)->paginate(20);
        }

        return view('frontend.index',compact('videos','title'));
    }

    public function plan()
    {
        return view('frontend.pages.plan');
    }

    public function search($name)
    {
        $title = $name;
        $videos = DB::table('videos')->where('title', 'like', '%'.$name.'%')
        ->orWhere('tags', 'like', '%'.$name.'%')
        ->latest()->paginate(20);

        return view('frontend.index',compact('videos','title'));
    }

    public function searchInput(Request $request)
    {
        if(!Auth::check()){
            return back()->with('error','Login to search...');
        }
        $request->validate([
            'search' => 'string|required'
        ]);

        $data = $request->all();

        $title = $data['search'];
        $videos = DB::table('videos')->where('title', 'like', '%'.$data['search'].'%')
        ->orWhere('tags', 'like', '%'.$data['search'].'%')
        ->latest()->paginate(20);

        return view('frontend.index',compact('videos','title'));
    }
}
