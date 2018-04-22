<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendVerificationCode extends Command
{
    private $telephone;
    private $code;
    private $response;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send verification code';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($telephone = null, $code = null)
    {
        parent::__construct();
        $this->code = $code;
        $this->telephone = $telephone;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $curl = curl_init('https://api.mnotify.com/api/sms/quick?key=6wJLF1iIHgMDscRJPeHu0s1WhgKhv51BBLnhNGZuWL8pY');

        $headers = [
            'Content-Type: application/json'
        ];

        $body = [
            "key" => "6wJLF1iIHgMDscRJPeHu0s1WhgKhv51BBLnhNGZuWL8pY",
            "sender" => "TRUCKR",
            "message" => $this->code,
            "recipient" => [$this->telephone]
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));

        try {
            $this->response = curl_exec($curl);
        } catch (\Exception $exception) {
            $this->response = $exception->getMessage();
        }
    }
}
