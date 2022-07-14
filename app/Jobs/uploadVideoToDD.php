<?php

namespace App\Jobs;

use App\Models\Video;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class uploadVideoToDD implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $videoName,$vid;
    
    public $timeout = 2900;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($videoName,$vid)
    {
        $this->videoName = $videoName;
        $this->vid = $vid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $upload_url = $this->getUploadUrl();
        $results = $this->uploadVideoDD($upload_url);

        //Video Updated
        $video = Video::find($this->vid);
        $video->poster = [$results['result'][0]['single_img']];
        $video->embed_link = $results['result'][0]['protected_embed'];
        $video->link = $results['result'][0]['download_url'];
        $video->save();

        Log::info($video);
        Log::info($results); 
    }

    public function failed(Exception $exception)
    {
        Log::error($exception);
    }
    
    protected function getUploadUrl()
    {
        $dd_api_key = env('DOOD_API_KEY');
        $url = 'https://doodapi.com/api/upload/server?key='.$dd_api_key;

        $session = curl_init($url);

        curl_setopt($session, CURLOPT_HTTPGET, true);  // HTTP GET
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true); // Receive server response
        $server_output = curl_exec($session);
        curl_close($session);
        $results = json_decode($server_output, true);
        $uploadUrl = $results['result'];

        return $uploadUrl;
    }

    protected function uploadVideoDD($upload_url)
    {
        $dd_api_key = env('DOOD_API_KEY');
        $file_name = date('d-m-Y').'/'.$this->videoName;
        $my_file = storage_path('app/videos/tempo/'.$this->videoName);
        $type = pathinfo($my_file, PATHINFO_EXTENSION);

        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $upload_url . '?' . $dd_api_key);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POST, 1);


        $posts = array('api_key' => "$dd_api_key",
        'file' => curl_file_create($my_file, $type, $file_name));

        // Add read file as post field
        curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);

        $server_output = curl_exec($ch); // Let's do this!
        curl_close($ch); // Clean up
        $output = $server_output;

        return json_decode($output, true);
    }
}
