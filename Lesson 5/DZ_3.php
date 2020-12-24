<?php

function comparisonString($str1, $str2): bool               // Долго мучался с этой задачей...с кириллицей не мог справиться...
{                                                           // нашел решение в книжке по php, все просто до ужаса)
        $strNew = "";                                       // ниже мой первоначальный код с которым я мучался...
        for ($i = mb_strlen($str1); $i >= 0; $i--) {        // с латиницей работает, а с кириллицей нет..
            $strNew .= mb_substr($str2, $i, 1);             
        }                                                   // функция strrev тож не прокатит...

            if ($str1 == $strNew) {
                return true;
            } else {
                return false;
            }  
}

$str1 = trim(readline("Введите первую строку: "));
$str2 = trim(readline("Введите вторую строку: "));

echo comparisonString($str1, $str2);



// function comparisonString($str1, $str2): bool                
// {                                                            
//     if (iconv_strlen($str1) == iconv_strlen($str2)) {
        
//         $strNew = "";
//         $j = iconv_strlen($str1) - 1;
//         for ($i = 0; $i < iconv_strlen($str1); $i++, $j--) {
//             $strNew[$i] = $str2[$j];             
//         }

//             if ($str1 == $strNew) {
//                 return true;
//             } else {
//                 return false;
//             }    
        
//     } else {
//         return false;
//     }
// }

// $str1 = trim(readline("Введите первую строку: "));
// $str2 = trim(readline("Введите вторую строку: "));

// echo comparisonString($str1, $str2);