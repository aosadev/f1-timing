<?php
namespace Tests\Unit\Application\LiveTiming;

use App\Application\LiveTiming\LiveTimingService;
use App\Domain\LiveLap\Entity\LiveLap;
use App\Domain\LiveLap\Repository\LiveLapRepositoryInterface;
use PHPUnit\Framework\TestCase;

class LiveTimingServiceTest extends TestCase
{
    public function testReturnsLiveLapCollection()
    {
        $raceId = 101;
        $lap1 = new LiveLap(1, 1, 70.5, '+0.000');
        $lap2 = new LiveLap(2, 2, 71.2, '+0.700');

        $repoMock = $this->createMock(LiveLapRepositoryInterface::class);
        $repoMock->expects($this->once())
                 ->method('getLiveLapData')
                 ->with($raceId)
                 ->willReturn([$lap1, $lap2]);

        $service = new LiveTimingService($repoMock);
        $result = $service->getLiveLapData($raceId);

        $this->assertSame([$lap1, $lap2], $result);
    }
}