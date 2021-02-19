<?php

// https://leetcode.com/problems/minimum-changes-to-make-alternating-binary-string/

function minOperation($str): int
{
    $one = 0;
    $two = 1;

    $x = $y = 0;

    for ($i=0; $i < strlen($str); $i++) { 
        if ($str[$i] != $one) {
            $x++;
        }

        if ($str[$i] != $two) {
            $y++;
        }

        $one = $one + $two - ($two = $one);
    }

    return min($x, $y);
}


// $str = '110';
$str = '1111';
echo minOperation($str);