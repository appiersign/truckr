<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = ['model', 'tracker_id', 'make', 'license_plate', 'capacity', 'year_of_make', 'truckr_id', 'owner_id', 'type', 'year_of_make'];
}
