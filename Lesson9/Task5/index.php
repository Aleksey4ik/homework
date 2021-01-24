<?php

function editTime (int $num): object
{
    $objTime = new DateTime("now", new DateTimeZone("Europe/Minsk"));

    $objTime->setTimestamp($objTime->getTimestamp() - $num);
    
    if ($objTime->format('N') >= 1 && $objTime->format('N') <= 5) {
        return $objTime->sub(new DateInterval('P10D'));                
    } else {
        return $objTime->modify('+ 5 day');
    }    
}

print_r(editTime(604800));
