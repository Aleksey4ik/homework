<?php

function validIsBrackets(string $str): string
{
    $newStr = '';
    $mistakes = '';

    $pattern1 = '/^\)|^\]|^\}/';                                // Первый символ - закрывающаяся скобка    
    $pattern2 = '/[^\(|\)|\[|\]|\{|\}]/';                       // все кроме скобок

    $onlyBrackets = preg_replace($pattern2, '', $str);          // Удаляем со строки все символы, кроме скобок

    $bracketsOpen = ['(', '[', '{'];
    $bracketsClose = [')', ']', '}'];
    $bracketsPair = ['()', '[]', '{}'];

    preg_match($pattern1, $onlyBrackets, $arrPattern1);                  // проверим строку регуляркой $pattern1, что первая скобка являктся закрывабщейся

    if (strlen($onlyBrackets) % 2 != 0) {
        $mistakes = 'No valid! - нечетное количетво строк!';
        return $mistakes;
    } else if (!empty($arrPattern1[0])) {
        $mistakes = 'No valid! - Первой идет закрывающаяся скобка';
        return $mistakes;
    } else {
        for ($i = 0; $i < strlen($str); $i++) {
            if (in_array($str[$i], $bracketsOpen)) {
                $newStr .= substr($str, $i, 1);
            }
            if (in_array($str[$i], $bracketsClose)) {
                if (in_array(substr($newStr, -1) . substr($str, $i, 1), $bracketsPair)) {
                    $newStr = substr($newStr, 0, -1);
                }
            }
        }
        if (empty($newStr)) {
            $mistakes = 'VALID!!!';
            return $mistakes;
        } else {
            $mistakes = 'No VALID! - Не все скобки соответствуют!';
            return $mistakes;
        }
    }

    return $mistakes;
}


$str = '(this {string} [is] (valid))';
// $str = '(this {string} is [not) (valid))';

echo validIsBrackets($str);
