<?php

declare(strict_types = 1);
require_once('date.php');
use PHPUnit\Framework\TestCase;

class Test extends TestCase 
{
    private Date $date;

    public function setUp(): void
    {
        $this->date = new Date('2020-10-15');
    }

    public function testConstructNoParam()
    {
        $date = new Date();
        
        $this->assertIsObject($date);
        $this->assertObjectHasAttribute('date', $date);
        $this->assertEquals(date('Y'), $date->getYear());
        $this->assertEquals(date('M'), $date->getMonth());
        $this->assertEquals(date('d'), $date->getDay());
        $this->assertEquals(date('S'), $date->getWeekDay());
    }

    public function testConstructWithParam()
    {   
        $this->assertIsObject($this->date);
        $this->assertObjectHasAttribute('date', $this->date);
        $this->assertIsObject($this->date);
        $this->assertEquals('2020', $this->date->getYear());
        $this->assertEquals('15', $this->date->getDay());
    }

    // public function 

    public function testGetMonthWithParamEn()
    {
        $this->assertEquals('October', $this->date->getMonth('en'));        
    }

    public function testGetMonthWithParamRu()
    {
        $this->assertEquals('Октябрь', $this->date->getMonth('ru'));        
    }

    public function testGetWeekDayWithParamEn()
    {
        $this->assertEquals('Thursday', $this->date->getWeekDay('en'));
    }

    public function testGetWeekDayWithParamRU()
    {
        $this->assertEquals('Четверг', $this->date->getWeekDay('ru'));
    }

    /**
     * @dataProvider addDayProvider
     */
    public function testAddDay($a, $b, $c)
    { 
        $this->date->addDay($a);
        $this->assertEquals($c, $this->date->getDay());        
        $this->assertEquals($b, $this->date->getMonth());        
    }

    public function addDayProvider()
    {
        return [
            [5, 'Oct', 20],
            [10, 'Oct', 25],
            [15, 'Oct', 30],
            [20, 'Nov', 4],
            [61, 'Dec', 15]
        ];
    }

    /**
     * @dataProvider subDayProvider
     */

    public function testSubDay($a, $b, $c)
    {
        $this->date->subDay($a);
        $this->assertEquals($c, $this->date->getDay());
        $this->assertEquals($b, $this->date->getMonth());
    }

    public function subDayProvider()
    {
        return [
            [5, 'Oct', 10],
            [15, 'Sep', 30],
            [25, 'Sep', 20]
        ];
    }

    /**
     * @dataProvider addMonthProvider
     */

    public function testAddMonth($a, $b, $c)
    {
        $this->date->addMonth($a);
        $this->assertEquals($c, $this->date->getMonth());
        $this->assertEquals($b, $this->date->getYear());
    }

    public function addMonthProvider()
    {
        return [
            'add one month' => [1, 2020, 'Nov'],
            'add five month' => [5, 2021, 'Mar'],
            'add fifteen month' => [15, 2022, 'Jan']
        ];
    }

    // дальше буду без провацдеров)
    public function testSubMonth()
    {
        $this->date->subMonth(5);
        $this->assertEquals('May', $this->date->getMonth());
        $this->assertEquals(2020, $this->date->getYear());
    }
    
    public function testAddYear()
    {
        $this->date->addYear(5);
        $this->assertEquals(2025, $this->date->getYear());
    }

    public function testSubYear()
    {
        $this->date->subYear(10);
        $this->assertEquals(2010, $this->date->getYear());
    }

    public function testFormate()
    {
        $this->assertEquals('2020-October-15', $this->date->format('Y-F-d'));
    }

    public function test__toString()
    {
        $this->assertEquals('2020-Oct-15', $this->date->__toString());
    }
}

