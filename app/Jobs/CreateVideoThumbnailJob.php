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

    public $link,$width,$height,$title;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct(int $width,int $height,string $link,string $title)
    {
        $this->width = $width;
        $this->height =$height;
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
        VideoThumbnail::createThumbnail(
            $this->link,
            storage_path('app/public/videos/images'),
            $this->title.'.jpg',
            3,
            $this->width,
            $this->height
        );
    }
}
