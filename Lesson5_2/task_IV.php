<?php

$arr = [1, 5, 3, 5, 3.3, 2, 14];

function less16 ($array): array
{
    $countArray = count($array);                // задачка простая, но с маленьким и возможно неочевидным подвохом)

    for ($i=0; $i < $countArray; $i++) {        // изначально(по инерции) в for написал "$i < count($array)" 
        if ($array[$i] ** 2 > 16) {             // и не пойму почему не удаляет в конце массива....)))
            unset($array[$i]);                  
        }
    }
    return $array;
}


function outputArray ($x)                              // функция для вывода элементов массива в строчку 
{
    echo " массив:";                             
        foreach ($x as $key => $value) {
            echo "  [$key]".'-> '.$x[$key];
        }
}


outputArray(less16($arr));