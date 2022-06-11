<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $title = null;
        if (Auth::check()) {
            $videos = Video::where('status', 'published')->latest()->paginate(20);
        } else {
            $videos = Video::where('status', 'published')->latest()->limit(50)->paginate(20);
        }

        return view('frontend.index', compact('videos', 'title'));
    }

    public function plan()
    {
        return view('frontend.pages.plan');
    }

    public function profile()
    {
        return view('frontend.pages.profile');
    }

    public function profile_update(Request $request, $id)
    {
        $user = User::find($id)->firstOrFail();
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['expiry_date'] = $user->expiry_date;

        $user->fill($data)->save();

        return back()->with('success', 'Your Profile Information Updated!!!');
    }

    public function categories(Request $request)
    {
        $categories = DB::table('categories')->oldest()->limit(8)->get();
        $sub_cat = DB::table('sub_categories')->latest()->paginate(20);
        if ($request->filled('c')) {
            $sub_cat = DB::table('sub_categories')->where('category_id', $request->c)->paginate(20);
            $sub_cat->appends(request()->query());
        }
        
        return view('frontend.pages.categories', compact('categories', 'sub_cat'));
    }

    public function search($name)
    {
        $title = $name;
        $videos = Video::where('title', 'like', '%'.$name.'%')
        ->orWhere('tags', 'like', '%'.$name.'%')
        ->latest()->paginate(20);

        return view('frontend.index', compact('videos', 'title'));
    }

    public function searchInput(Request $request)
    {
        if (!Auth::check()) {
            return back()->with('error', 'Login to search...');
        }
        $request->validate([
            'search' => 'string|required'
        ]);

        $data = $request->all();

        $title = $data['search'];
        $videos = Video::where('title', 'like', '%'.$data['search'].'%')
        ->orWhere('tags', 'like', '%'.$data['search'].'%')
        ->latest()->paginate(20);

        return view('frontend.index', compact('videos', 'title'));
    }
}
