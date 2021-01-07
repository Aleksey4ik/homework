<?php

$str = 'my dog is bigger than my cat';

    function reverseString ($str): string
    {   
        $newStr = '';
        for ($i = strlen($str) - 1; $i >= 0; $i--) { 
            
            if (substr($str, $i, 1) == 'a' || substr($str, $i, 1) == 'o' || substr($str, $i, 1) == 'e' || substr($str, $i, 1) == 'i' || substr($str, $i, 1) == 'u') {
                continue;
            } else {
                $newStr .= substr($str, $i, 1);
            }  
        }
        return $newStr;      
    }

echo reverseString($str);


