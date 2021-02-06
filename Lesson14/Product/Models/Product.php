<?php

declare(strict_types = 1);

namespace Project\Models;

class Product
{
    private string $name;   //наименования продукта
    private int $price;     //цена единицы продукта
    private int $quantity;  //количество едениц продукта

    public function __construct(string $name, int $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getCost(): int      //общая стоимость всех едениц продукта
    {   
        return $this->price * $this->quantity;
    }

    public function getName(): string   
    {
        return $this->name;
    }

    public function getQuantity(): int  
    {
        return $this->quantity;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}


