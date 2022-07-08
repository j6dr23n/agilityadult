<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Telegram;
use Telegram\Bot\FileUpload\InputFile;

class SendTeleBot implements ShouldQueue
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
        $path = env('APP_URL')."storage/videos/images/";
        Telegram::sendPhoto([
            'chat_id' => env('TELEGRAM_CHAT_ID',''),
            'photo' => InputFile::createFromContents(\file_get_contents($path.$this->title.'.jpg'),$this->title.'.jpg'),
            'caption' => 'New video has been uploaded!!!'
        ]);
    }
}
