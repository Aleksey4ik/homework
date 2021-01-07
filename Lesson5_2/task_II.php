<?php

$str = 'Hello my friend';
echo $str."\n";

for ($i=0; $i < mb_strlen($str); $i++) { 
    
    if (mb_substr($str, $i, 1) == 'd') {
        $str[$i] = 't';
    } else if (mb_substr($str, $i, 1) == 'e') {
        $str[$i] = 'i';
    }
}

echo $str;