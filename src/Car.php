<?php

namespace App;

use App\Js\PrototypeTrait;

class Car
{
    use PrototypeTrait;

    public $madeIn = 'Beijing';
    public $maxSpeed = '100km/h';

    protected function __construct()
    {
        $this->prototype = TrafficTool::jsNew(null, $this);
    }
}
