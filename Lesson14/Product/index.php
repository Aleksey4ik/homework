<?php

// Сделайте класс Product (товар), в котором будут приватные свойства name (название товара), 
// price (цена за штуку) и quantity. Пусть все эти свойства будут доступны только для чтения.

// Добавьте в класс Product метод getCost, который будет находить полную стоимость продукта (сумма умножить на количество).

// Сделайте класс Cart (корзина). Данный класс будет хранить список продуктов (объектов класса Product) в виде массива. 
// Пусть продукты хранятся в свойстве products.

// Реализуйте в классе Cart метод add для добавления продуктов.

// Реализуйте в классе Cart метод remove для удаления продуктов. Метод должен принимать параметром название удаляемого продукта.

// Реализуйте в классе Cart метод getTotalCost, который будет находить суммарную стоимость продуктов.

// Реализуйте в классе Cart метод getTotalQuantity, который будет находить суммарное количество продуктов (то есть сумму свойств quantity всех продуктов).

// Реализуйте в классе Cart метод getAvgPrice, который будет находить среднюю стоимость продуктов (суммарная стоимость делить на количество всех продуктов).

declare(strict_types = 1);

namespace Project;
use Project\Models\Product;
use Project\Service\Cart;

require_once __DIR__ . '/vendor/autoload.php';

$cart = new Cart();
$cart->addProduct(new Product('apple', 5, 20));
$cart->addProduct(new Product('orange', 3, 10));
$cart->addProduct(new Product('banane', 2, 25));

print_r($cart->getProducts());

$cart->removeProduct('apple');

print_r($cart->getProducts());

echo PHP_EOL;
echo $cart->getTotalCost();
echo PHP_EOL;
echo $cart->getTotalQuantity();
echo PHP_EOL;
echo $cart->getAvgPrice();