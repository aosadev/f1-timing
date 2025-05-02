<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Application\Standings\StandingsService;
use App\Domain\Driver\Entity\Driver;
use Mockery;

class StandingsControllerTest extends TestCase
{
    public function testIndexReturnsViewWithStandings()
    {
        $driver = new Driver('Max Verstappen', 'Dutch', 1);
        $mockService = Mockery::mock(StandingsService::class);
        $mockService->shouldReceive('getStandings')
            ->once()
            ->with(date('Y'))
            ->andReturn([$driver]);

        $this->app->instance(StandingsService::class, $mockService);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('standings');
        $response->assertViewHas('drivers', [$driver]);
    }
}