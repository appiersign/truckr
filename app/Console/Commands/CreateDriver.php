<?php

namespace App\Console\Commands;

use App\Driver;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateDriver extends Command
{
    private $user_id;
    private $license_pin;
    private $class_type;
    private $license_date_issued;
    private $license_date_expired;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:driver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new driver object';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($user_id = null, $license_pin = null, $class_type = null, $license_date_issued = null, $license_date_expired = null)
    {
        parent::__construct();
        $this->class_type = $class_type;
        $this->license_pin = $license_pin;
        $this->user_id = $user_id;
        $this->license_date_issued = Carbon::parse($license_date_issued)->toDateString();
        $this->license_date_expired = Carbon::parse($license_date_expired)->toDateString();
        $this->truckr_id = md5(microtime());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Driver::create([
            'truckr_id' => $this->truckr_id,
            'user_id' => $this->user_id,
            'class_type' => $this->class_type,
            'license_date_issued' => $this->license_date_issued,
            'license_date_expired' => $this->license_date_expired,
            'license_pin' => $this->license_pin
        ]);
    }
}
