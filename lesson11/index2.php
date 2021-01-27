<?php 

interface WikipediaEntity
{
    public function __toString(): string;
}

class Country implements WikipediaEntity
{
    protected string $name;
    protected float $surface;
    protected int $population;

    public function __construct(string $name, float $surface, int $population)
    {
        $this->name = $name;
        $this->surface = $surface;
        $this->population = $population;
    }

    public function __toString(): string
    {
        return 'Страна: ' . $this->name . PHP_EOL . 'Площадь: ' . $this->surface . PHP_EOL . 'Население: ' . $this->population;
    }
}

class Person implements WikipediaEntity
{
    protected string $name;
    protected int $age;
    protected string $birthdate;
    protected object $timeZone;
    protected object $diff;

    public function __construct($name, $birthdate, $timeZone)
    {
        $this->name = $name;
        
        $birth = new DateTime($birthdate, $timeZone);
        $now = new DateTime('now', $timeZone);
        $diff = $birth->diff($now);       
        $this->diff = $diff;
        $this->age = $diff->format('%y'); 

        $this->birthdate = $birth->format('d-F-Y');
        $this->timeZone = $timeZone;
    }

    public function __toString(): string
    {
        return 'Ваше имя: ' . $this->name . PHP_EOL . 'Ваш возраст: ' . $this->age . PHP_EOL . 'Дата вашего рождения: ' . $this->birthdate;
    }

    public function getAgeY_M_D_M_S(): string
    {
        return $this->diff->format('%y лет - %m месяца - %d дней - %h часов - %i минут' . PHP_EOL . '    ИЛИ' . PHP_EOL . '%a дней');
    }
}

$c = new Country('USA', 150.35, 50000000);
echo $c->__toString();

$timeZone = new DateTimeZone("Europe/Minsk");
$birthdate = '1984-03-12';
$name = 'Alexios';
$person = new Person($name, $birthdate, $timeZone);
echo PHP_EOL;
echo $person->__toString();
echo PHP_EOL;
echo $person->getAgeY_M_D_M_S();