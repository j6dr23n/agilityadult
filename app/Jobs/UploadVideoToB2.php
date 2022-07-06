<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Throwable;

class UploadVideoToB2 implements ShouldQueue
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
        $token = $this->getTokenB2();
        $this->uploadVideoB2($token);
        Storage::disk('local')->delete('/videos/tempo/'.$this->title);
        Storage::disk('local')->delete('videos/watermarked/'.$this->title);
    }

    public function failed(Throwable $exception)
    {
        dd($exception);
    }

    protected function getTokenB2()
    {
        $apiUrl = "https://api003.backblazeb2.com";
        $authToken = "4_003ea52174924fc0000000008_01a57215_6c66af_acct_c_wGA61i2rX6RgdB9qD7vmJwB_s=";

        $api_url = $apiUrl; // From b2_authorize_account call
        $auth_token = $authToken; // From b2_authorize_account call
        $bucket_id = env('BUCKET_ID');  // The ID of the bucket you want to upload to

        $session = curl_init($api_url .  "/b2api/v2/b2_get_upload_url");

        // Add post fields
        $data = array("bucketId" => $bucket_id);
        $post_fields = json_encode($data);
        curl_setopt($session, CURLOPT_POSTFIELDS, $post_fields);
         
        // Add headers
        $headers = array();
        $headers[] = "Authorization: " . $auth_token;
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($session, CURLOPT_POST, true); // HTTP POST
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
        $server_output = curl_exec($session); // Let's do this!
        curl_close($session); // Clean up
        $results = json_decode($server_output, true);
        $upload_auth_token = $results['authorizationToken'];
        $upload_url = $results['uploadUrl'];
        $token = [$upload_url,$upload_auth_token];

        return $token;
    }

    protected function uploadVideoB2($token)
    {
        $file_name = date('d-m-Y').'/'.$this->title;
        $my_file = storage_path('app/videos/watermarked/'.$this->title);
        $handle = fopen($my_file, 'r');
        $read_file = fread($handle, filesize($my_file));

        $upload_url = $token[0]; // Provided by b2_get_upload_url
        $upload_auth_token = $token[1]; // Provided by b2_get_upload_url
        $bucket_id = env('BUCKET_ID');  // The ID of the bucket
        $content_type = "text/plain";
        $sha1_of_file_data = sha1_file($my_file);

        $session = curl_init($upload_url);

        // Add read file as post field
        curl_setopt($session, CURLOPT_POSTFIELDS, $read_file);

        // Add headers
        $headers = array();
        $headers[] = "Authorization: " . $upload_auth_token;
        $headers[] = "X-Bz-File-Name: " . $file_name;
        $headers[] = "Content-Type: " . $content_type;
        $headers[] = "X-Bz-Content-Sha1: " . $sha1_of_file_data;
        $headers[] = "X-Bz-Info-Author: " . "unknown";
        $headers[] = "X-Bz-Server-Side-Encryption: " . "AES256";
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($session, CURLOPT_POST, true); // HTTP POST
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
        $server_output = curl_exec($session); // Let's do this!
        curl_close($session); // Clean up
        $output = $server_output;

        return json_decode($output, true);
    }
}
