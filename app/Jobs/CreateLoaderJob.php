<?php

namespace App\Jobs;

use App\Loader;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateLoaderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $loader = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $data = [])
    {
        $this->loader = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->loader['truckr_id'] = md5(microtime());
        Loader::create($this->loader);
    }
}
