<?php

declare(strict_types = 1);

namespace Project;

class Point {
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int
    {
        return $this->x;
    }
    
    public function getY(): int
    {
        return $this->y;
    }

    public function pointsDistance(Point $point): float
    {
        return sqrt(pow($this->x - $point->getX(), 2) + pow($this->y - $point->getY(), 2));
    }

}
