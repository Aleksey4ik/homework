<?php 

#Запускать через консоль, заморочился....)

include 'functions.php';

$arr = [];
$aroundElementsArray = 0;
$i = 0;
$j = 1;


while (!is_numeric($aroundElementsArray) || $aroundElementsArray < 1) {                 
    fwrite(STDOUT, "Введите количество элемемнтов вашего массива: ");
    $aroundElementsArray = trim(fgets(STDIN));
        if (is_numeric($aroundElementsArray) && $aroundElementsArray >= 1) break;
    echo 'Вы ввели недопустимое значение!'."\n";
    echo 'Попробуйте еще раз!'."\n";
}

    while ($i < $aroundElementsArray) {  
        do {
            fwrite(STDOUT, "Введите $j элемент массива: ");
            $n = trim(fgets(STDIN));  
                if (!is_numeric($n)) echo 'Вы ввели недопустимое значение! Попробуйте еще раз!'."\n";
         } while (!is_numeric($n));
    $arr[] = $n;
    $i++;
    $j++;
    }      

    $outputOnDisplay = 0;
    do {
        fwrite(STDOUT, "Введите 1 для отображения массива Version1,\nВведите 2 для отображения массива Version2,\nВведите 3 для отображения двух версий массива:");
        $outputOnDisplay = trim(fgets(STDIN));
            if ($outputOnDisplay == 1) {echo "Version1"; outputArray(lessTenV1($arr));}
            elseif ($outputOnDisplay == 2) {echo "Version2"; outputArray(lessTenV2($arr));}
            elseif ($outputOnDisplay == 3) {echo "Version1"; outputArray(lessTenV1($arr)); echo "\nVersion2"; outputArray(lessTenV2($arr));}
            else {echo "Вы ввели неверное значение!\n";}
    } while (!is_numeric($outputOnDisplay) || $outputOnDisplay < 1 || $outputOnDisplay > 3);
     
    