<?php

require_once './vendor/autoload.php';

// JsNull -> JsObject -> TrafficTool -> Car -> Tesla

$car = \App\Car::jsNew();

var_dump('--- Car ---');
var_dump($car->madeIn);
var_dump($car->maxSpeed);
var_dump($car->toString());

$tesla = \App\Tesla::jsNew();
var_dump('--- Tesla ---');
var_dump($tesla->madeIn);
var_dump($tesla->maxSpeed);
var_dump($tesla->valueOf());
