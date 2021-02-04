<?php

declare(strict_types=1);

namespace Project\Service;

use Project\Models\Document;

class DocumentService { 

    public function addSomePage(Document $document, int $numberPages): void
    {
        $document->setNumberPage($document->getNumberPage() + $numberPages);
        echo $numberPages . ' страниц добавлено!';
    }

    public function deleteCurrentPage(Document $document):void
    {
        $document->setNumberPage($document->getNumberPage() - 1);
        echo 'Текущая страниуа удалена';
    }

    public function printCurrentPage(Document $document): void
    {
        echo 'распечатана страница № ' . $document->getcurrentPage();
        $document->setCurrentPage($document->getCurrentPage() + 1); 
    }

    public function selectedNextPage(Document $document): void
    {
        if ($document->getCurrentPage() < $document->getNumberPage()) {
            $document->setCurrentPage($document->getCurrentPage() + 1);
            echo 'перешли на следующую страницу № ' . $document->getCurrentPage();
        } else {
            echo 'Это последняя страница';
        }
    }

    public function selectedPrevPage(Document $document): void
    {
        if ($document->getCurrentPage() > 1) {
            $document->setCurrentPage($document->getCurrentPage() - 1);
            echo 'перешли на предыдущкю страницу № ' . $document->getCurrentPage();
        } else {
            echo 'Это первая страница';
        }
    }
}