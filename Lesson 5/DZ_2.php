<?php

include 'functions.php';

do {
    fwrite(STDOUT, "Введите ИМЯ владельца денег(Латиницей): ");     // получается запись в ASCII, по этому если ввести на кириллице оно не выводится?
    $name = trim(fgets(STDIN));                                     // как здесь быть?
} while (is_numeric($name));
        
do {
    fwrite(STDOUT, "Введите сколько имеете денег на руках: ");
    $money = trim(fgets(STDIN));        
} while (!is_numeric($money));

// $name = 'Коли';                                                   // если так присвоть значние - оно отображается в echo
// $money = 25.4595;

echo stringFormat($name, $money);

