<?php

namespace App\Jobs;

use App\Owner;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateOwnerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $owner = [];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $data = [] )
    {
        $this->owner['business_name'] = $data['business_name'];
        $this->owner['user_id'] = $data['user_id'];
        $this->owner['truckr_id'] = md5(microtime());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Owner::create($this->owner);
    }
}
