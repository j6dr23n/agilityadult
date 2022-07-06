<?php

namespace App\Services;

use App\Jobs\AddWatermarkToVideo;
use App\Jobs\CreateVideoThumbnailJob;
use App\Jobs\UploadVideoToB2;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Bus;

class VideoServices
{
    public function store($data): Video
    {
        if (array_key_exists('poster', $data)) {
            foreach ($data['poster'] as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $fileName = str_replace(' ', '', $fileName);
                $item->storeAs('/videos/images', $fileName, 'public');
                $images[] = $fileName;
            }
        }

        if (array_key_exists('video', $data)) {
            $video = $data['video'];
            $videoFileName = time().'-'.$video->getClientOriginalName();
            $videoFileName = str_replace(' ', '', $videoFileName);
            $video->storeAs('/videos/tempo',$videoFileName,'local');
            $data['embed_link'] = 'https://videos.agilityadult.com/file/agadult-v2/'.date('d-m-Y').'/'.$videoFileName;
            if(array_key_exists('poster',$data) === false){
                $images[] = $data['title'].'.jpg';
            }
            Bus::chain([
                new AddWatermarkToVideo($videoFileName),
                new UploadVideoToB2($videoFileName),
                new CreateVideoThumbnailJob($data['embed_link'],$data['title']),
            ])->dispatch();
        }
        $data['poster'] = $images;
        unset($data['video']);
        $video = Video::create($data);

        return $video;
    }

    public function update($data, $video): bool
    {
        if (array_key_exists('poster', $data)) {
            if (is_array($video->poster)) {
                foreach ($video->poster as $image) {
                    Storage::disk('public')->delete('/videos/images/'.$image);
                }
            }

            foreach ($data['poster'] as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $item->storeAs('/videos/images/', $fileName, 'public');
                $images[] = $fileName;
            }
            $data['poster'] = $images;
        }
        $video = $video->fill($data)->save();

        return $video;
    }

    public function destroy($video)
    {
        if (is_array($video->poster)) {
            foreach ($video->poster as $image) {
                Storage::disk('public')->delete('/videos/images/'.$image);
            }
        }

        return $video->delete();
    }
}
