<?php
namespace Tests\Unit\Application\Standings;

use App\Application\Standings\StandingsService;
use App\Domain\Driver\Entity\Driver;
use App\Domain\Driver\Repository\DriverRepositoryInterface;
use PHPUnit\Framework\TestCase;

class StandingsServiceTest extends TestCase
{
    public function testReturnsSortedDriversFromRepository()
    {
        $season = 2025;
        $driver1 = new Driver('Lewis Hamilton', 'British', 44);
        $driver2 = new Driver('Max Verstappen', 'Dutch', 1);
        $repoMock = $this->createMock(DriverRepositoryInterface::class);
        $repoMock->expects($this->once())
                 ->method('getStandings')
                 ->with($season)
                 ->willReturn([$driver2, $driver1]);

        $service = new StandingsService($repoMock);
        $result = $service->getStandings($season);

        $this->assertSame([$driver2, $driver1], $result);
    }
}