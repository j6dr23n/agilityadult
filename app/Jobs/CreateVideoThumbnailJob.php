<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class CreateVideoThumbnailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $link;
    public $title;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct(string $link, string $title)
    {
        $this->link = $link;
        $this->title = $title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ffprobe = \FFMpeg\FFProbe::create([
            'ffmpeg.binaries'  => "/usr/bin/ffmpeg",
            'ffprobe.binaries' => "/usr/bin/ffprobe"
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
    }
}
