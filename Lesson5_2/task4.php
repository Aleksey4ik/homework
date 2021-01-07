<?php

$str = 'Эта_строка_больше_10_символов';

if (mb_strlen($str) > 10) {
    $newStr = mb_substr($str, 10);
}

echo $newStr;