<?php

function multiAllElem ($arr): int
{
    $multiAll = 1;
    
        foreach ($arr as $value) {
            $multiAll *= $value; 
        }

    return $multiAll;    
}


$arr = [3, 5, 2, 8];

echo multiAllElem($arr);