<?php

$str = 'Happy 2021 New Year 2021! I have a cat.';

$str = preg_replace('/ 2021/', '', $str);
$str = preg_replace('/ca/', 'ac', $str);

echo $str;