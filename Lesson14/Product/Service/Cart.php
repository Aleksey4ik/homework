<?php

declare(strict_types = 1);

namespace Project\Service;
use Project\Models\Product;

class Cart
{
    private array $products;        //в массиве будем хранить объекты класса Product

    public function addProduct(Product $product): void
    {
        $this->products[$product->getName()] = $product;        
    }

    public function removeProduct(string $name): void           // удаление по имени продукта
    {
        if (!empty($this->products)) {
            if (array_key_exists($name, $this->products)) {
                unset($this->products["$name"]);
            } else {
                echo 'Нет такого ключа!';
            }
        } else {
            echo 'Ваш массив пуст!';
        }
    }

    public function getTotalCost(): int                 // сумма всех добавленных товаров в корзину (array $products)
    {
        $sum = 0;

        foreach ($this->products as $prod) {
            $sum += $prod->getCost();
        }

        return $sum;
    }

    public function getTotalQuantity(): int            // количество всех добавленных товаров в корзину (array $products) 
    {
        $sum = 0;

        foreach ($this->products as $prod) {
            $sum += $prod->getQuantity();
        }

        return $sum;
    }

    public function getAvgPrice(): float               // средняя цена всех добавленных товаров
    {
        return round($this->getTotalCost() / $this->getTotalQuantity(), 2);
    }

    public function getProducts(): array
    {
        return $this->products;
    }
}