<?php

use MyProject\Models\Plane;
use MyProject\Service\AirportService;

require_once __DIR__ . '/vendor/autoload.php';


$planeBelavia = new Plane('Belavia', 345);
$s = new AirportService();
$s->land($planeBelavia);
echo PHP_EOL;
$americanAirways = new Plane('AmericanAirways', 777);
$s->tookOff($americanAirways);





