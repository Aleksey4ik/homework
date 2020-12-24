<?php

function lessTenV1 ($x)                               // функция удаляет из заданного масива
{
    foreach ($x as $key => $value) {
        if ($value > 10) {unset($x[$key]); }
    }

    return $x;
}

function lessTenV2 ($x)                               // функция записывает элементы меньше 10 в новый массив
{   $newX = [];
    foreach ($x as $key => $value) {
        if ($value < 10) {$newX[] = $value;}
    } 

    return $newX;
}

function outputArray ($x)                              // функция для вывода элементов массива в строчку 
{
    echo " массив:";                             
        foreach ($x as $key => $value) {
            echo "  [$key]".'-> '.$x[$key];
        }
}

function stringFormat (string $str, float $number): string                     
{
    $newstr = "У ".$str." есть столько денег: ".round($number, 2);
    return $newstr;  
}


function maxMinusMinArray ($arr): int                       // разность максимального и минимального значения
{
    $min = $arr[0];
    $max =$arr[0];
    $i = 0;
        while ($i < count($arr)) {
            if ($max < $arr[$i]) $max = $arr[$i];                 
            if ($min > $arr[$i]) $min = $arr[$i];
            $i++;
        }
    return $max - $min;        
}




function newRandomArray(int $amountElements, int $minRandom = 0, $maxRandom = 250): Array          // Создание рамдомного массива
{    
    $i = 0;
    $bigArray = [];

    for ($i=0;$i<$amountElements;$i++) {
        $bigArray[$i] = mt_rand($minRandom, $maxRandom);    
    }
    return $bigArray;
}