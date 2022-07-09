<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chapter\StoreRequest;
use App\Http\Requests\Chapter\UpdateRequest;
use App\Models\Chapter;
use App\Models\Manga;
use App\Services\ChapterServices;

class ChapterController extends Controller
{
    public function create($id)
    {
        $manga = Manga::where('id', $id)->firstOrFail();
        $latestChapter = Chapter::where('manga_id', $id)->latest()->first();
        if ($latestChapter !== null) {
            $latestChapterNo = $latestChapter->chapter_no;
        } else {
            $latestChapterNo = 0;
        }

        return view('backend.manga.chapter.create', compact('manga', 'latestChapterNo'));
    }

    public function store(StoreRequest $request, ChapterServices $action)
    {
        $data = $request->validated();
        $action->store($data);

        return redirect(route('manga.index'))->with('success', 'Chapter Created!!!');
    }

    public function edit(Chapter $chapter)
    {
        return view('backend.manga.chapter.edit', compact('chapter'));
    }

    public function update(UpdateRequest $request, Chapter $chapter, ChapterServices $action)
    {
        $data = $request->validated();
        $action->update($data, $chapter);

        return redirect(route('manga.index'))->with('success', 'Chapter Updated!!!');
    }

    public function destroy(Chapter $chapter, ChapterServices $action)
    {
        $action->destroy($chapter);

        return back()->with('success', 'Chapter Deleted!!!');
    }
}
