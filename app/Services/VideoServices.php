<?php

namespace App\Services;

use App\Jobs\CreateVideoThumbnailJob;
use App\Jobs\SendTeleBot;
use App\Jobs\UploadVideoToB2;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

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

        if (array_key_exists('link', $data) === false) {
            $data['title'] = str_replace(' ','',$data['title']);
            $videoFileName = Session::get('fileName-'.auth()->id());
            Session::forget('fileName-'.auth()->id());
            
            $data['embed_link'] = 'https://videos.agilityadult.com/file/agadult-v2/'.date('d-m-Y').'/'.$videoFileName;
            if (array_key_exists('poster', $data) === false) {
                $images[] = $data['title'].'.jpg';
            }
            Bus::chain([
                // new AddWatermarkToVideo($videoFileName),
                new UploadVideoToB2($videoFileName),
                new CreateVideoThumbnailJob($data['embed_link'], $data['title']),
                new SendTeleBot($data['title']),
            ])->dispatch();
        }
        $data['poster'] = $images;
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

    public function uploadLargeFiles(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
    
        if (!$receiver->isUploaded()) {
            // file not uploaded
        }
    
        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.'.$extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name
            $fileName = str_replace(' ','',$fileName);
            Session::put('fileName-'.auth()->id(),$fileName);
    
            $disk = Storage::disk(config('filesystems.public'));
            $path = $disk->putFileAs('videos/tempo', $file, $fileName);
    
            // delete chunked file
            unlink($file->getPathname());
        }
    
        // otherwise return percentage information
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
}
