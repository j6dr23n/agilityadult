<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Telegram;
use Telegram\Bot\FileUpload\InputFile;

class SendTeleBot implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $title;

    public $name;

    public $slug;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title,$name,$slug)
    {
        $this->title = $title;
        $this->name = $name;
        $this->slug = $slug;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = env('APP_URL').'storage/videos/images/';
        Telegram::sendPhoto([
            'chat_id' => env('TELEGRAM_CHAT_ID', ''),
            'photo' => InputFile::createFromContents(\file_get_contents($path.$this->name.'.jpg'), $this->name.'.jpg'),
            'caption' => $this->title.'

Watch - '.env('APP_URL').'view/'.$this->slug,
        ]);
    }

    public function failed(Exception $exception)
    {
        Log::error($exception);
    }
}
