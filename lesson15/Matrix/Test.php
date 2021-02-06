<?php

declare(strict_types = 1);

namespace Matrix;

use PHPUnit\Framework\TestCase;

final class Test extends TestCase {
    private Matrix $matrix1;
    private Matrix $matrix2;
    private Matrix $matrix3;

    public function setUp(): void
    {
        $this->matrix1 = new Matrix(5);
        $this->matrix2 = new Matrix(5);        
    }

    public function testMatrixIsRandom()        // проверка, что значения матрицы создаются рандомно; сравним соответствующие значения двух матриц
    {                                           // думаю по-хорошему, можно допустить пару совпадений, но это не реализовано)
        for ($i=0; $i < count($this->matrix1->getMatrix()); $i++) { 
            for ($j=0; $j < count($this->matrix1->getMatrix()[$i]); $j++) { 
                                
                $this->assertNotEquals($this->matrix1->getMatrix()[$i][$j], $this->matrix2->getMatrix()[$i][$j]);                
            }
        }
    }
                                                    
    public function testMatrixNoArguments()     // проверим, что при создании объекта Matrix без параметров, создается матрица 3х3
    {                                              
        $this->matrix3 = new Matrix();
        
        $this->assertEquals(3, count($this->matrix3->getMatrix()));     // проверяем количество элементов(строк) матрицы
        
        for ($i=0; $i < 3; $i++) {                                              // проверяем количество эл-тов(стобцов) каждого элемента матрицы
            $this->assertEquals(3, count($this->matrix3->getMatrix()[$i]));
        }
    }
}