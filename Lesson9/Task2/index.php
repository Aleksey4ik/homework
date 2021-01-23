<?php

function fileInArray(string $fileName, int $n): array
{
    if (!file_exists($fileName)) {                                  // написал исключение в функции для проверки сущетсвования файла, но
        try {                                                       // вероятнее всего это делать надо на стадии вызова функции, но
            throw new Error('Файл не существует');                  // не знаю как...
        } catch (Error $e) {
            echo $e->getMessage();
            exit;
        }
    }
    $file = fopen("$fileName", "r");
    $arrayPrice = [];

    for ($i = 0; $i < $n; $i++) {
        $oneRow = fgetcsv($file);

        if ($oneRow === false) {
            try {
                throw new RuntimeException('Вероятно конец файла или другая непредвиденная ошибка');
            } catch (RuntimeException $e) {
                echo $e->getMessage();
                break;
            }
        }
        $arrayPrice[$oneRow[0]] = $oneRow[1];
    }

    fclose($file);
    return $arrayPrice;
}


$myFile = 'file2.csv';

try {                                                   // функця принимает 2 агрумента: имя файля и необходимое количество обработки строк
    print_r(fileInArray($myFile, 10));                 // обезопасим от передачи в функцию не соответствующего типа аргументов
} catch (TypeError $e) {                                 // и их количества
    echo $e->getMessage();
} 

