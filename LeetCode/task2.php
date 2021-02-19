<?php
// https://leetcode.com/problems/min-cost-climbing-stairs/

// $arr = [1, 100, 1, 1, 1, 100, 1, 1, 100, 1];
$arr = [10, 15, 20];
// $arr = [0, 0, 1, 1];


function stepsBySteps(array $arr): int
{
    $arr[] = 0;
    
    for ($i=2; $i < count($arr); $i++) { 
        $arr[$i] += min($arr[$i-1], $arr[$i-2]);
    }

    return $arr[count($arr) - 1];
}

echo stepsBySteps($arr);