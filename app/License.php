<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    private $pin;
    private $truckr_id;
    private $date_issued;
    private $date_expired;
    private $class_type;

    public function __construct($pin, $date_issued, $date_expired, $class_type, array $attributes = [])
    {
        parent::__construct($attributes);

        $this->pin = $pin;
        $this->truckr_id = md5(microtime());
        $this->date_issued = $date_issued;
        $this->date_expired = $date_expired;
        $this->class_type = $class_type;
    }
}
