<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['truckr_id', 'license_pin', 'license_date_issued', 'license_date_expired', 'user_id', 'class_type'];
    /**
     * @return string
     */

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function setLicensePinAttribute($value)
    {
        $this->attributes['license_pin'] = strtolower($value);
    }

    public function getLicensePinAttribute()
    {
        return strtoupper($this->attributes['license_pin']);
    }

    public function setClassTypeAttribute($value)
    {
        $this->attributes['class_type'] = strtolower($value);
    }

    public function getClassTypeAttribute()
    {
        return strtoupper($this->attributes['class_type']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
