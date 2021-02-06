<?php

declare(strict_types = 1);

namespace Project;

use PHPUnit\Framework\TestCase;

final class Test extends TestCase {

    public function testCirclesIntersect()
    {
        $c1 = new Circle(new Point(10, 8), 30);
        $c2 = new Circle(new Point(1, 2), 10);
        
        $this->assertTrue($c1->circleCovers($c2));
    }
}