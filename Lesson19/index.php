<?php

# напишите функцию, которая примет целое число и вернет True,
# если это число является квадратом целого числа
# методом бинарного поиска

function squareInteger(int $number): bool
{   
    $start = 1;
    $end = round($number / 2);

    while($start <= $end) {
        
        $mid = floor(($start + $end) / 2);

        if ($mid ** 2 == $number) {
            return true;
        }

        if ($mid ** 2 > $number) {
            $end = $mid - 1;
        }

        if ($mid ** 2 < $number) {
            $start = $mid +1;
        }
    }

    return false;
}


if (squareInteger(1196122225)) {
    echo 'YES';
} else {
    echo 'NO';
}


// время выполнения подряд 1000 моих функций = 34970200 наносекунд == 0,035 сек
// время выполнения 1000 скрипта с лекции = 10030163800 наносекунд == 10 сек
// да, разница ощутима)

// $i=0;
// $eta=-hrtime(true);

// while($i < 1000) {
//     squareInteger(1196122225);
//     $i++;
// }
// $eta+=hrtime(true);

// echo $eta;

