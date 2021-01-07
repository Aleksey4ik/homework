<?php

$str = 'The year 2020 was a great year';

$pos = strpos($str, '2020');

    if ($pos !== false) {
        $newStr = mb_substr($str, $pos);
        echo $newStr;
    } else {
        echo 'Значение \'2020\' в строке $str не найдено!';
    }

