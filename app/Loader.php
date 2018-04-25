<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loader extends Model
{
    protected $fillable = ['business_name', 'category', 'position', 'address', 'truckr_id', 'user_id'];
}
