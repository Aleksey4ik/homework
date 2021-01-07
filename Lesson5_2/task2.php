<?php

$str = 'my careful cat cancelled the scanning ';

$newStr = preg_replace('/ca/', 'ac', $str, 2);

echo $str."\n";
echo $newStr;