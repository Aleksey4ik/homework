<?php

declare(strict_types = 1);

namespace Project\Tests;

use Project\Models\Product;
use PHPUnit\Framework\TestCase;

final class Test extends TestCase {
    private array $products;

    public function setUp(): void
    {
        $this->products['apple'] = new Product('apple', 3, 5);
        $this->products['orange'] = new Product('orange', 5, 8);
        $this->products['banana'] = new Product('banana', 10, 15);
    }

    
    public function testRemoveProduct()
    {   
        $name = 'apple';
        $have = '';
        if (array_key_exists($name, $this->products)) {
            unset($this->products[$name]);            
        }

        foreach ($this->products as $key => $value) {
            if ($key == $name) {
                $have = $name;
            }            
        }

        $this->assertNotEquals($name, $have);
    }

    public function testGetTotalCost()
    {
        $sum = 0;

        foreach ($this->products as $prod) {
            $sum += $prod->getCost();
        }

        $this->assertEquals(205, $sum, 'Шеф! Все пропало!)');
    }

    //дальше по аналогии)

    
}