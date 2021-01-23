<?php

function decodeAndPrintJson($myFile): void      // тут просто)
{
    $file = fopen($myFile, "r");
    $str = '';

    while (!feof($file)) {
        $str .= fgets($file);
    }

    fclose($file);
    $objPhp = json_decode($str);
    print_r($objPhp);
}


$fileJson = 'file1.json';

decodeAndPrintJson($fileJson);



