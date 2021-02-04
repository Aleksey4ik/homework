<?php

declare(strict_types=1);

namespace Project\Tests;

use PHPUnit\Framework\TestCase;
use Project\Models\Document;
use Project\Service\DocumentService;

final class testDocumentService extends TestCase {
    
    /**
     * @dataProvider providerAddPage
     */
    public function testAddPage($a, $b, $c): void
    {
        $doc = new Document('name', $a);
        $ser = new DocumentService();
        $ser->addSomePage($doc, $b);
        $this->assertEquals($c, $doc->getNumberPage());
    }

    public function providerAddPage(): array
    {
        return array (
            array (50, 20, 70),
            array (170, 15, 185),
            array (90, 11, 101)
        );
    }

    public function testPrintCurrentPage(): void
    {
        $doc = new Document('name', 55);
        $ser = new DocumentService();
        $ser->printCurrentPage($doc);
        $this->assertEquals(2, $doc->getCurrentPage());
    }
}