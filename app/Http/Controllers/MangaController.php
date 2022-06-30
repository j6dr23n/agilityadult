<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Manga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MangaController extends Controller
{
    public function index()
    {
        $manga = Manga::latest()->paginate(12);

        return view('frontend.manga.index',compact('manga'));
    }

    public function show(Manga $manga)
    {
        views($manga)->cooldown($minutes = 3)->record();

        if(Auth::check() === false && $manga->type === 'premium'){
            return redirect(route('pages.manga.index'))->with('error', 'Premium user only!!!');
        }

        $mangas = Manga::inRandomOrder()->take(2)->get();
        $chapters = Chapter::where('manga_id',$manga->id)->orderBy('chapter_no')->get();

        $totalViews = views($manga)->count();

        return view('frontend.manga.show',compact('mangas','manga','chapters','totalViews'));
    }

    public function show_chapter(Manga $manga,$chapter_no)
    {
        if(Auth::check() === false && $manga->type === 'premium'){
            return redirect(route('pages.manga.index'))->with('error', 'Premium user only!!!');
        }

        $chapter = $manga->chapters->where('chapter_no',$chapter_no)->first();
        $chapters = $manga->chapters; 
        views($chapter)->cooldown($minutes = 3)->record();

        $mangas = Manga::inRandomOrder()->take(6)->get();
        $count = File::files(str_replace('image.jpg','',$chapter->path));
        $totalViews = views($chapter)->count();

        return view('frontend.manga.show-chapter',compact('mangas','manga','chapters','chapter','count','totalViews'));
    }
}
