<?php

declare(strict_types=1);

$x = 5;
$y = 'asd10';

function summa(int $a, int $b): int
{
    return $a + $b;
}

try {
    $summa = summa($x, $y);
} catch (TypeError $e) {
    echo $e->getMessage() . "\n";
    if (is_numeric($x) && is_numeric($y)) {
        $x = (int)$x;
        $y = (int)$y;
        $summa = summa($x, $y);        
    } else {        
        try {
        throw new InvalidArgumentException("Переменные(-ая) не являются целыми числами!");
        }  catch (InvalidArgumentException $e) {
            echo $e->getMessage() . "\n";
        } catch (Throwable $e) {
            echo $e->getMessage() . "\n";
        }
	}
}


echo "Конец скрипта)";
