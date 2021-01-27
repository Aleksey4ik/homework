<?php

class Office 
{
    protected string $address;
    protected int $floors;

    public function __construct(string $address, int $floors)
    {
        $this->address = $address;
        $this->floors = $floors;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getFloors(): string
    {
        return $this->floors;
    }

    public function setFloors(int $floors): void
    {
        $this->floors = $floors;
    }
}

$house = new Office('ul. Pervomayskaya, d. 65', 9);

echo 'Адресс нашего офиса: ' . $house->getAddress();
echo PHP_EOL;
$house->setFloors(5);
echo 'Этажей у нашего здания: ' . $house->getFloors();