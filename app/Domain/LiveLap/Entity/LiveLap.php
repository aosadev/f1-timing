<?php
namespace App\Domain\LiveLap\Entity;

class LiveLap
{
    private int $driverId;
    private int $position;
    private float $lapTime;
    private string $gap;

    public function __construct(int $driverId, int $position, float $lapTime, string $gap)
    {
        $this->driverId = $driverId;
        $this->position = $position;
        $this->lapTime  = $lapTime;
        $this->gap      = $gap;
    }

    public function driverId(): int { return $this->driverId; }
    public function position(): int { return $this->position; }
    public function lapTime(): float { return $this->lapTime; }
    public function gap(): string { return $this->gap; }
}