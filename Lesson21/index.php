<?php

// дан массив целыъ чисел в порядке неубывания
// вернуть массив квадратов тех же элементов в порядке неубывания 

// пример: 
// ввод: nums = [-4, -1, 0, 3, 10]
// вывод: [0, 1, 9, 16, 100]



function squareArray(array $nums): array
{
    $newNums = [];
    $countElements = count($nums);

    $pointerLeft = 0;
    $pointerRight = $countElements - 1;    

    if ($nums[$pointerLeft] >= 0) {                      // если первый элемент >= 0, следовательно он уже в порядке неубывания
        for ($i = 0; $i < $countElements; $i++) {        // осталось только все элементы возввести в квадрат И вернкть массив
            $nums[$i] **= 2;                             // пример [0, 3, 5, 7]
        }

        return $nums;
    }

    if ($nums[$pointerRight] < 0) {                         // если последний элемент меньше нуля, следовательно он в порядке убывания
        for ($i = $countElements - 1; $i >= 0; $i--) {      // надо его перевернуть и возвести все в квадрат и вернкть новый массив
            $newNums[] = $nums[$i] ** 2;                    // пример [-8, -5, -2]
        }

        return $newNums;
    }

    for ($i = 0; $i < $countElements; $i++) {               
        if ($nums[$i] >= 0) {                               // будем перебирать массив $nums пока не встретим значение >= 0        
            if ($nums[$i] < abs($nums[$i - 1])) {           // если это значение будет меньше предыдущего - значит это минимум массива
                $newNums[] = $nums[$i] ** 2;                // запишем его первым в новый массив $newNums
                $pointerLeft = $i - 1;                      
                $pointerRight = $i + 1;
                break;
            } else {                                
                $newNums[] = $nums[$i - 1] ** 2;            // а если значение $nums[$i] больше предыдущего - значит предыдущее явл минимумом
                $pointerLeft = $i - 2;                      // Сследовательно запишем его первым в $newNums
                $pointerRight = $i;                         // и назначим наши указатели
                break;
            }
        }
    }

    while ($pointerLeft >= 0 & $pointerRight < $countElements) {        // будем прогонять пока наши указатели не вышли за пределы массива
        if (abs($nums[$pointerLeft]) > $nums[$pointerRight]) {          // будем левый элемент от минимуми проверять с правыми элементами и пока он больше, будем записывать в $newNums правые элементы
            while (abs($nums[$pointerLeft]) > $nums[$pointerRight] & $pointerRight < $countElements) {
                $newNums[] = $nums[$pointerRight] ** 2;
                $pointerRight++;
            }
        } else {
            $newNums[] = $nums[$pointerLeft] ** 2;
            $pointerLeft--;
        }
    }

    if ($pointerLeft >= 0) {                                    // проверим и заодно допишем в $newNums если остали у нас элементы слева
        while ($pointerLeft >= 0) {
            $newNums[] = $nums[$pointerLeft--] ** 2;
        }
    }

    if ($pointerRight < $countElements) {                        // тоже самое, но справа
        while ($pointerRight < $countElements) {
            $newNums[] = $nums[$pointerRight++] ** 2;
        }
    }

    return $newNums;
}

$nums = [-12, -10, -7, -8, -4, -1, 2, 3, 10, 15, 25];
// $nums = [-4, -3, 0, 2, 10, 15, 25];
// $nums = [-30, -3, 5, 8, 10, 15, 25];
// $nums = [0, 3, 5, 8, 10, 15, 25];

// $nums = [-5, 0, 3, 5, 8, 10, 15, 25];
// $nums = [-10, -8, -5, -4, -1];


print_r(squareArray($nums));
