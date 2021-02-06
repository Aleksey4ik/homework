<?php

declare(strict_types = 1);

require_once __DIR__ . '/vendor/autoload.php';

use Project\Point;
use Project\Circle;

$p1 = new Point(10, 8);
$p2 = new Point(1, 2);

$c1 = new Circle($p1, 30);
$c2 = new Circle($p2, 10);
var_dump($c1->circleCovers($c2));

