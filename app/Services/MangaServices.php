<?php

namespace App\Services;

use App\Models\Manga;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MangaServices
{
    public function store($data): Manga
    {
        $data['slug'] = Str::slug($data['title']);
        
        $poster = $data['poster'];
        $fileName = time().'-'.$poster->getClientOriginalName();
        $fileName = str_replace(' ', '', $fileName);
        $poster->storeAs('/manga', $fileName, 'public');
        $data['poster'] = $fileName;

        $manga = Manga::create($data);

        return $manga;
    }

    public function update($data, $manga): Manga
    {
        if (array_key_exists('poster', $data)) {
            Storage::disk('public')->delete($manga->poster);

            $poster = $data['poster'];
            $fileName = time().'-'.$poster->getClientOriginalName();
            $fileName = str_replace(' ', '', $fileName);
            $poster->storeAs('/manga', $fileName, 'public');
            $data['poster'] = $fileName;
        }
        $manga->fill($data)->save();

        return $manga;
    }

    public function destroy($manga): bool
    {
        Storage::disk('public')->delete('manga/'.$manga->poster);

        return $manga->delete();
    }
}
