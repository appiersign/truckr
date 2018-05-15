<?php

namespace App\Jobs;

use App\Truck;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;

class CreateTruckJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $truck;
    private $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        $user = User::with('owner')->find(Auth::id());
        $this->truck['type'] = $data['type'];
        $this->truck['license_plate'] = $data['license_plate'];
        $this->truck['model'] = $data['model'];
        $this->truck['make'] = $data['make'];
        $this->truck['capacity'] = $data['capacity'];
        $this->truck['truckr_id'] = md5(microtime());
        $this->truck['tracker_id'] = $data['tracker_id'];
        $this->truck['owner_id'] = $user->owner->id;
        $this->truck['year_of_make'] = Carbon::now();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Truck::create($this->truck);
    }
}
