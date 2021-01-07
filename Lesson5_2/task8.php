<?php

function newRandomArray(int $amountElements, int $minRandom = 0, $maxRandom = 250): Array          // Создание рамдомного массива
{    
    $i = 0;
    $bigArray = [];

    for ($i=0;$i<$amountElements;$i++) {
        $bigArray[$i] = mt_rand($minRandom, $maxRandom);    
    }
    return $bigArray;
}

function outputArray ($x)                              // функция для вывода элементов массива в строчку 
{
    echo " массив:";                             
        foreach ($x as $key => $value) {
            echo "  [$key]".'-> '.$x[$key];
        }
}

$arr = newRandomArray(10, 0, 90);  
echo 'Исходный'."\n"; 
outputArray($arr);
echo "\n\n".'Сортированный'."\n";
sort($arr);    
outputArray($arr);


