<?php

namespace App\Jobs;

use App\Models\Video;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class CreateVideoThumbnailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $link;

    public $title;

    public $vid;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $link, string $title, int $vid)
    {
        $this->link = $link;
        $this->title = $title;
        $this->vid = $vid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ffprobe = \FFMpeg\FFProbe::create([
            'ffmpeg.binaries' => '/usr/bin/ffmpeg',
            'ffprobe.binaries' => '/usr/bin/ffprobe',
        ]);
        $video_dimensions = $ffprobe
                ->streams($this->link)   // extracts streams informations
                ->videos()                      // filters video streams
                ->first()                       // returns the first video stream
                ->getDimensions();              // returns a FFMpeg\Coordinate\Dimension object
        $width = $video_dimensions->getWidth();
        $height = $video_dimensions->getHeight();

        VideoThumbnail::createThumbnail(
            $this->link,
            storage_path('app/public/videos/images'),
            $this->title.'.jpg',
            3,
            $width,
            $height
        );

        $video = Video::find($this->vid);
        if ($video->type !== 'free') {
            $video->poster = [$this->title.'.jpg'];
            $video->save();
        }

        Log::info($video);
    }

    public function failed(Exception $exception)
    {
        Log::error($exception);
    }
}
