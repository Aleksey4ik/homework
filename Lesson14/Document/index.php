<?php

declare(strict_types=1);

use Project\Models\Document;
use Project\Service\DocumentService;

require_once __DIR__ . '/vendor/autoload.php';

$doc = new Document('My file MS', 345);        
$ser = new DocumentService();

$ser->printCurrentPage($doc);
echo PHP_EOL;
echo 'Текущее начение $currentPage = ' . $doc->getCurrentPage();


// echo PHP_EOL;
// $ser->addPage($doc);
// echo PHP_EOL;
// echo 'Текущее количество страниц: ' . $doc->getNumberPage();

// echo PHP_EOL;
// $ser->deleteCurrentPage($doc);
// echo PHP_EOL;
// echo 'Текущее количество страниц: ' . $doc->getNumberPage();

// echo PHP_EOL;
// $ser->selectedNextPage($doc);

// echo PHP_EOL;
// $ser->selectedNextPage($doc);

// echo PHP_EOL;
// $ser->selectedPrevPage($doc);
