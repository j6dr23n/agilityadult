<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manga\StoreRequest;
use App\Http\Requests\Manga\UpdateRequest;
use App\Models\Manga;
use App\Services\MangaServices;
use Illuminate\Support\Facades\DB;

class MangaController extends Controller
{
    public function index()
    {
        $manga = Manga::latest()->paginate(12);

        return view('backend.manga.index', compact('manga'));
    }

    public function show($id)
    {
        $manga = DB::table('mangas')->where('id', $id)->first();
        $chapters = DB::table('chapters')->where('manga_id', $id)->paginate(12);

        return view('backend.manga.chapter.show', compact('manga', 'chapters'));
    }

    public function create()
    {
        return view('backend.manga.create');
    }

    public function store(StoreRequest $request, MangaServices $action)
    {
        $data = $request->validated();
        $action->store($data);

        return redirect(route('manga.index'))->with('success', 'Manga Created!!!');
    }

    public function edit(Manga $manga)
    {
        return view('backend.manga.edit', compact('manga'));
    }

    public function update(UpdateRequest $request, Manga $manga, MangaServices $action)
    {
        $data = $request->validated();
        $action->update($data, $manga);

        return redirect(route('manga.index'))->with('success', 'Manga Updated!!!');
    }

    public function destroy(Manga $manga, MangaServices $action)
    {
        $action->destroy($manga);

        return redirect(route('manga.index'))->with('success', 'Manga Deleted!!!');
    }
}
