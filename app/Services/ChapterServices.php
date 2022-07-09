<?php

namespace App\Services;

use App\Models\Chapter;
use App\Models\Manga;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChapterServices
{
    public function store($data): Chapter
    {
        $value = $this->pdfToImage($data);
        $data['path'] = $value['path'];
        $data['pdfPath'] = $value['pdfPath'];

        $chapter = Chapter::create($data);

        return $chapter;
    }

    public function update($data, $chapter): bool
    {
        $manga = Manga::where('id', $data['manga_id'])->firstOrFail();
        $mangaName = str_replace(' ', '', $manga->title);
        $pdfName = explode('/', $chapter->path);
        $pdfName = $pdfName[7];
        if (array_key_exists('path', $data)) {
            Storage::disk('public')->delete(str_replace('/storage', '', $chapter->pdfPath));
            File::deleteDirectory(public_path().'/storage/manga/'.$mangaName.'/chapter/'.$chapter->chapter_no);

            $value = $this->pdfToImage($data, $mangaName);
            $data['path'] = $value['path'];
            $data['pdfPath'] = $value['pdfPath'];
        }

        return $chapter->fill($data)->save();
    }

    protected function pdfToImage($data, $mangaName = null): array
    {
        $value = [];
        $manga = Manga::where('id', $data['manga_id'])->firstOrFail();
        $mangaName = str_replace(' ', '', $manga->title);

        $pdf = $data['path'];
        $fileName = time().'-'.$pdf->getClientOriginalName();
        $pdf->storeAs('/manga/'.$mangaName.'/pdf', $fileName, 'public');
        $value['pdfPath'] = '/storage/manga/'.$mangaName.'/pdf/'.$fileName;

        $img = new \Imagick();
        $img->readImage(public_path('/storage/manga/'.$mangaName.'/pdf/'.$fileName));
        // $path = public_path()."/storage/manga/".$mangaName.'/images/'.$pdfName;
        // File::makeDirectory($path, $mode = 0777, true, true);
        File::makeDirectory(public_path().'/storage/manga/'.$mangaName.'/chapter/'.$data['chapter_no'], $mode = 0777, true, true);
        $saveImagePath = public_path().'/storage/manga/'.$mangaName.'/chapter/'.$data['chapter_no'].'/image.jpg';
        $img->setImageResolution(1080, 1080);
        $img->writeImages($saveImagePath, true);

        $value['path'] = $saveImagePath;

        return $value;
    }

    public function destroy($chapter): bool
    {
        $manga = Manga::where('id', $chapter->manga_id)->firstOrFail();
        $mangaName = str_replace(' ', '', $manga->title);
        Storage::disk('public')->delete(str_replace('/storage', '', $chapter->pdfPath));
        File::deleteDirectory(public_path().'/storage/manga/'.$mangaName.'/chapter/'.$chapter->chapter_no);

        return $chapter->delete();
    }
}
