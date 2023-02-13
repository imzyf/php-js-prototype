<?php

namespace App;

use App\Js\PrototypeTrait;

class Tesla
{
    use PrototypeTrait;

    public $maxSpeed = '500km/h';
    public $model = 'S1';

    protected function __construct()
    {
        $this->prototype = Car::jsNew(null, $this);
    }
}
