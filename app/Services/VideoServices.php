<?php

namespace App\Services;

use App\Jobs\CreateVideoThumbnailJob;
use App\Jobs\SendTeleBot;
use App\Jobs\UploadVideoToB2;
use App\Jobs\uploadVideoToDD;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class VideoServices
{
    public function store($data): Video
    {
        $data['user_id'] = auth()->id();
        $name = Str::slug($data['title']);
        if (array_key_exists('poster', $data)) {
            foreach ($data['poster'] as $item) {
                $fileName = time().'-'.$item->getClientOriginalName();
                $fileName = str_replace(' ', '', $fileName);
                $item->storeAs('/videos/images', $fileName, 'public');
                $images[] = $fileName;
            }
        }

        if ($data['type'] === 'free') {
            $videoName = Session::get('fileName-'.auth()->id());
            Session::forget('fileName-'.auth()->id());
            $data['poster'] = [asset('storage/video-processing.jpg')];
            $data['link'] = 'https://videos.agilityadult.com/file/agadult-v2/'.date('d-m-Y').'/'.$videoName;
            $video = Video::create($data);
            dispatch(new uploadVideoToDD($videoName, $video->id));
            Bus::chain([
                // new AddWatermarkToVideo($videoFileName),
                new UploadVideoToB2($videoName),
                new CreateVideoThumbnailJob($data['link'], $name, $video->id),
                new SendTeleBot($data['title'], $name, $video->slug),
            ])->dispatch();

            return $video;
        }

        if ($data['type'] === 'premium') {
            $videoFileName = Session::get('fileName-'.auth()->id());
            Session::forget('fileName-'.auth()->id());

            $data['embed_link'] = 'https://videos.agilityadult.com/file/agadult-v2/'.date('d-m-Y').'/'.$videoFileName;
            $data['link'] = 'https://videos.agilityadult.com/file/agadult-v2/'.date('d-m-Y').'/'.$videoFileName;
            if (array_key_exists('poster', $data) === false) {
                $images = [asset('storage/video-processing.jpg')];
            }

            $data['poster'] = $images;
            $video = Video::create($data);

            Bus::chain([
                // new AddWatermarkToVideo($videoFileName),
                new UploadVideoToB2($videoFileName),
                new CreateVideoThumbnailJob($data['embed_link'], $name, $video->id),
                new SendTeleBot($data['title'], $name, $video->slug),
            ])->dispatch();

            return $video;
        }
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

    public function uploadLargeFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (! $receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,10);
            $fileName .= '_'.md5(time()).'.'.$extension; // add timestamp to file name
            Session::put('fileName-'.auth()->id(), $fileName);

            $disk = Storage::disk(config('filesystems.public'));
            $path = $disk->putFileAs('videos/tempo', $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());
        }

        // otherwise return percentage information
        $handler = $fileReceived->handler();

        return [
            'done' => $handler->getPercentageDone(),
            'status' => true,
        ];
    }
}
