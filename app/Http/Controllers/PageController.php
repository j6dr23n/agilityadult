<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function plan()
    {
        return view('frontend.pages.plan');
    }

    public function search($item)
    {
        $title = $item;
        $videos = DB::table('videos')->where('title', 'like', '%'.$item.'%')
        ->orWhere('tags', 'like', '%'.$item.'%')
        ->latest()->paginate(12);

        return view('frontend.index',compact('videos','title'));
    }
}
