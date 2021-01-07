<?php

$str = 'my careful cat cancelled the scanning';

$findStr = 'cat';

$pos = strripos($str, $findStr);                  // strripos не учитывет регистр, strrpos учитывает

if ($pos === false) {
    echo 'Строка $str не содержит '."$findStr";
} else {
    echo 'Строка $str содержит '."$findStr";
}