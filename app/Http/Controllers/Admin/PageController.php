<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $videos = DB::table('videos')->latest()->get();
        $users = DB::table('users')->latest()->get();

        return view('backend.index',compact('videos','users'));
    }
}
