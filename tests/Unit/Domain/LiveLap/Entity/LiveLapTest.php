<?php
namespace Tests\Unit\Domain\LiveLap\Entity;

use App\Domain\LiveLap\Entity\LiveLap;
use PHPUnit\Framework\TestCase;

class LiveLapTest extends TestCase
{
    public function testCanCreateLiveLapWithAttributes()
    {
        $driverId = 1;
        $position = 5;
        $lapTime  = 72.345; // segundos
        $gap      = '+3.210';

        $liveLap = new LiveLap($driverId, $position, $lapTime, $gap);

        $this->assertSame($driverId, $liveLap->driverId());
        $this->assertSame($position, $liveLap->position());
        $this->assertSame($lapTime, $liveLap->lapTime());
        $this->assertSame($gap, $liveLap->gap());
    }
}