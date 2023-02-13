<?php

namespace App;

use App\Js\JsObject;
use App\Js\PrototypeTrait;

class TrafficTool
{
    use PrototypeTrait;

    public $madeIn = 'China';

    protected function __construct()
    {
        $this->prototype = JsObject::jsNew(null, $this);
    }
}
