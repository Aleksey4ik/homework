<?php

declare(strict_types = 1);

namespace Project;

use Project\Point;

class Circle {

    private Point $point;
    private int $radius;

    public function __construct(Point $point, int $radius)
    {
        $this->point = $point;
        $this->radius = $radius;
    }

    public function getRadius(): int
    {
        return $this->radius;
    }

    public function getPoint(): Point
    {
        return $this->point;
    }

    public function circleCovers(Circle $circle): bool
    {        
        if ($this->point->pointsDistance($circle->getPoint()) + $circle->getRadius() <= $this->getRadius()) {
            return true;
        } else {
            return false;
        }
    }
}

