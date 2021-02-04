<?php

declare(strict_types=1);

namespace Project\Models;

class Document {
    private string $name;
    private int $numberPage;
    private int $currentPage = 1;

    public function __construct(string $name, int $numberPage)
    {
        $this->name = $name;
        if ($this->validNumderPage($numberPage)) {
            $this->numberPage = $numberPage;
        }
        
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setNumberPage(int $numberPage):void
    {
        $this->numberPage = $numberPage;
    }

    public function getNumberPage(): int
    {
        return $this->numberPage;
    }

    public function setCurrentPage($currentPage): void
    {
        $this->currentPage = $currentPage;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    private function validNumderPage(int $numberPage): bool
    {
        return $numberPage > 0;
    }
}