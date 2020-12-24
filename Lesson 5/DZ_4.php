<?php

include 'functions.php';

$amountElementArray = (int)readline('Введите желаемое количество элементов в массиве: ');                   // вводим кол-во элементов для нового массива
$minRandom = (int)readline('Введите минимальное рандомное значение: ');                                     // минимальное рандомного значение
$maxRandom = (int)readline('Введите максимальное рандомное значение: ');                                    // максимальное рандомного значение

$bigArray = newRandomArray($amountElementArray, $minRandom, $maxRandom);                                    // создали рандомный массив 

echo "\n".'Разность максимального и минимального значений массива = '.maxMinusMinArray($bigArray)."\n";     // вывод возврата функции разномти max и min массива 

echo "\n".'Сгенерированный массив:'."\n";                                                                   

outputArray($bigArray);                                                                                      // вывод нашего массива
