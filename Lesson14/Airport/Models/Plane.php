<?php

namespace MyProject\Models;

class Plane {
    private string $carrier;
    private string $status = 'parking';    
    private int $line;

    public function __construct(string $carrier, int $line)
    {
        $this->carrier = $carrier;
        $this->line = $line;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCarrier(): string
    {
        return $this->carrier;
    }

    public function getLine(): int
    {
        return $this->line;
    }
}