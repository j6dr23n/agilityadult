<?php

namespace App\Http\Controllers;

use App\Models\Girl;
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
        $videos = Video::where('status', 'published')->where('type','free')->latest()->get();
        if (Auth::check()) {
            $videos = Video::where('status', 'published')->latest()->get();
        }
        $videos = $videos->paginate(20);

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

    public function girls()
    {
        $girls = Girl::latest()->paginate(12);

        return view('frontend.girls.index', compact('girls'));
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
        $cat_title = '';
        $categories = DB::table('categories')->oldest()->limit(8)->get();
        $sub_cat = DB::table('sub_categories')->latest()->paginate(20);
        if ($request->filled('c') && $request->filled('t')) {
            $cat_title = $request->t;
            $sub_cat = DB::table('sub_categories')->where('category_id', $request->c)->paginate(20);
            $sub_cat->appends(request()->query());
        }

        return view('frontend.pages.categories', compact('categories', 'sub_cat', 'cat_title'));
    }

    public function search($name)
    {
        $name = str_replace('International ', '', $name);
        $title = $name;
        $videos = Video::where('title', 'like', '%'.$name.'%')
        ->orWhere('tags', 'like', '%'.$name.'%')
        ->where('status', 'published')
        ->latest()->paginate(20);

        return view('frontend.index', compact('videos', 'title'));
    }

    public function searchInput(Request $request)
    {
        if (! Auth::check()) {
            return back()->with('error', 'Login to search...');
        }
        $request->validate([
            'search' => 'string|required',
        ]);

        $data = $request->all();

        $title = $data['search'];
        $videos = Video::where('title', 'like', '%'.$data['search'].'%')
        ->orWhere('tags', 'like', '%'.$data['search'].'%')
        ->where('status', 'published')
        ->latest()->paginate(20);

        return view('frontend.index', compact('videos', 'title'));
    }
}
