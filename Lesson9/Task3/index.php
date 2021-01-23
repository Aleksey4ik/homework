<?php

function decodeAndPrintJson($myFile): void      // тут просто)
{
    $file = fopen($myFile, "r");
    $str = '';

    while (!feof($file)) {
        $str .= fgets($file);
    }

    fclose($file);
    $fileJson = json_decode($str);
    print_r($fileJson);
}


$fileJson = 'file1.json';

decodeAndPrintJson($fileJson);



