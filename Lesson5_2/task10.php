<?php

$arr = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

// $s2 = [$arr[0][1], $arr[1][1], $arr[2][1]];
$s2 = array_column($arr, 1);

var_dump($s2);