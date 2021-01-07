<?php

$arr1 = [1, 2, 3, 4];
$arr2 = [3, 10, 20];
$arr3 = [1, 3, 16];

$arr4 = array_merge(array_intersect($arr3, $arr1), array_intersect($arr3, $arr2));

var_dump($arr4);