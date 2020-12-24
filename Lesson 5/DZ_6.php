<?php

$arrVisitor = ['name' => 'Иван', 'age' => 22, 'visits' => 5];

    function multiplication ($arr): bool
    {
        $firstSymbol = mb_substr($arr['name'], 0, 1);
        $ageVisit = $arr['age'];
        $ageiSplitVisits = $arr['age'] / $arr['visits'];
        $criminalBool = array_key_exists('criminal', $arr);

            if ($firstSymbol != 'К' && $ageVisit > 20 && $ageiSplitVisits < 65 && $ageiSplitVisits > 4 && !$criminalBool) {return true;} 

        return false;
    }

$resolution = multiplication($arrVisitor);

if ($resolution === true) {echo "Проходите";}
else {echo 'Вам вход запещен!!!';}