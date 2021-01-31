<?php 

trait hasBirthday 
{
    private object $dateTime;

    public function __construct(string $date)
    {
        $this->dateTime = new DateTime($date);
    }

    public function setDateTime($date): void
    {
        $this->dateTime = new DateTime($date);
    }

    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }    
}

class Person {
    use hasBirthday;
}

class Pet {
    use hasBirthday;
}


$person = new Person("2009-11-15");
$person->setDateTime('2005-11-01');
print_r($person->getDateTime());

$pet = new Pet('2020-06-10');
$pet->setDateTime('2015-07-07');
print_r($pet->getDateTime());