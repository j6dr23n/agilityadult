<?php

namespace App\Jobs;

use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Throwable;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddWatermarkToVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $title;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        FFMpeg::open('videos/tempo/'.$this->title)
        ->addWatermark(function (WatermarkFactory $watermark) {
            $watermark->fromDisk('local')
                ->open('watermark/watermark.png')
                ->top(5)
                ->left(5);
        })
        ->addWatermark(function (WatermarkFactory $watermark) {
            $watermark->fromDisk('local')
                ->open('watermark/watermark1.png')
                ->bottom(5)
                ->right(5);
        })->export()
        ->toDisk('local')
        ->inFormat(new \FFMpeg\Format\Video\X264)
        ->save('videos/watermarked/'.$this->title);
    }

    public function failed(Throwable $exception)
    {
        FFMpeg::cleanupTemporaryFiles();
        dd($exception);
    }
}
