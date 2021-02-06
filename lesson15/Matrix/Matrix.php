<?php

declare(strict_types = 1);

namespace Matrix;

class Matrix {
    private array $matrix;

    public function __construct(int $sizeMatrix = 3)    
    {
        for ($i = 0; $i < $sizeMatrix; $i++) {
            for ($j=0; $j < $sizeMatrix; $j++) { 
                $this->matrix[$i][$j] = rand(-200, 200);
            }
        }
    }

    public function getMatrix(): array
    {
        return $this->matrix;
    }
}
