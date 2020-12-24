<?php

$nums = [1, 1, 1, 2, 4, 4, 4, 4, 5, 5];

function arraySorting (&$nums)
{

    $amountElements = count($nums);

    for ($i=0, $j=0; $i < $amountElements - 1; $i++, $j++) { 

        $firstOfDouble = $nums[$i];        

        while ($i < $amountElements - 1 && $firstOfDouble == $nums[$i + 1]) {
                
            unset($nums[$i + 1]);
            $i++; 
            
        }          
    }

    return $j;              // или можно count($nums). Как будет оптимальней?
}


echo 'Количество элементов массива: '.arraySorting($nums)."\n";
var_dump($nums);

