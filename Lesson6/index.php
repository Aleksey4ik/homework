<?php

declare(strict_types=1);

$x = 5;
$y = '10as';

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
    }
} catch (Throwable $e) {
    echo $e->getMessage() . "\n";
}


try {
    if (!is_int($x) || !is_int($y)) {
        throw new InvalidArgumentException("Переменные(-ая) не являются целыми числами!");
    }
    $summa = summa($x, $y);
    echo $summa;
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . "\n";
} catch (Throwable $e) {
    echo $e->getMessage();
}


echo "Конец скрипта)";
