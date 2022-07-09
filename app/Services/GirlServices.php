<?php

namespace App\Services;

use App\Models\Girl;
use Illuminate\Support\Facades\Storage;

class GirlServices
{
    public function store($data): Girl
    {
        foreach ($data['images'] as $item) {
            $fileName = time().'-'.$item->getClientOriginalName();
            $fileName = str_replace(' ', '', $fileName);
            $item->storeAs('/girls/images', $fileName, 'public');
            $images[] = $fileName;
        }
        $data['images'] = $images;
        $girl = Girl::create($data);

        return $girl;
    }

    public function update($data, $girl): bool
    {
        if (array_key_exists('images', $data)) {
            if (is_array($girl->images)) {
                foreach ($girl->images as $image) {
                    Storage::disk('public')->delete('/girls/images/'.$image);
                }
            }

            foreach ($data['images'] as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $item->storeAs('/girls/images/', $fileName, 'public');
                $images[] = $fileName;
            }
            $data['images'] = $images;
        }

        $girl = $girl->fill($data)->save();

        return $girl;
    }
}
