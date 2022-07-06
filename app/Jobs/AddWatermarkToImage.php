<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Image;

class AddWatermarkToImage implements ShouldQueue
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
        $img = \Image::make(storage_path('app/public/videos/images/tempo').'/Suntinve.jpg');
        $watermark = \Image::make(storage_path('app/watermark/watermark.png'));
        $watermark1 = \Image::make(storage_path('app/watermark/watermark1.png'));
        $img->insert($watermark,'bottom-right',10,10);
        $img->insert($watermark1,'top-left',10,10);
        $img->save(storage_path('app/public/videos/images').'/'.$this->title.'-text.jpg');
    }
}
