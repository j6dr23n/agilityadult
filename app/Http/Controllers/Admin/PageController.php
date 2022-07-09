<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $videos = DB::table('videos')->whereNotNull('embed_link')->latest()->get();
        $photos = DB::table('videos')->whereNull('embed_link')->latest()->get();
        $users = DB::table('users')->latest()->get();
        $members = DB::table('users')->where('role', 'member')->get();

        return view('backend.index', compact('videos', 'photos', 'users', 'members'));
    }
}
