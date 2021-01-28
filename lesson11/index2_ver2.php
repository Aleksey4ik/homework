<?php 
declare(strict_types=1);

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
    protected object $birthdate;

    public function __construct($name, $age, $birthdate)
    {
        $this->name = $name;
        $this->age = $age; 
        $this->birthdate = new DateTime($birthdate);
    }

    public function __toString(): string
    {
        return 'Ваше имя: ' . $this->name . PHP_EOL . 'Ваш возраст: ' . $this->age . PHP_EOL . 'Дата вашего рождения: ' . $this->birthdate->format('d-F-Y');
    }

}

$c = new Country('USA', 150.35, 50000000);
echo $c->__toString();

$person = new Person('Alexios', 25, '2010-10-05');
echo $person->__toString();
