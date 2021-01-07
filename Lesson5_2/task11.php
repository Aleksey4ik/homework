<?php

$arr1 = [1, 2, 3, 4];
$arr2 = [3];
$arr3 = [4];
$arr4 = [2, 5, 10];

$arr5 = array_intersect(array_diff($arr1, $arr2, $arr3), $arr4);

var_dump($arr5);