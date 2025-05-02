<?php

namespace App\Domain\Driver\Entity;

class Driver
{
    private string $name;
    private string $nationality;
    private int $number;

    public function __construct(string $name, string $nationality, int $number)
    {
        $this->name = $name;
        $this->nationality = $nationality;
        $this->number = $number;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function nationality(): string
    {
        return $this->nationality;
    }

    public function number(): int
    {
        return $this->number;
    }
}