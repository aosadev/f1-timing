<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Application\Standings\StandingsService;
use App\Domain\Driver\Entity\Driver;

class StandingsControllerTest extends TestCase
{
    public function testIndexReturnsViewWithStandings()
    {
        // 1) Preparamos el Driver de ejemplo
        $driver = new Driver('Max Verstappen', 'Dutch', 1);

        // 2) Creamos un mock con PHPUnit y programamos la llamada
        $mockService = $this->createMock(StandingsService::class);
        $mockService
            ->expects($this->once())
            ->method('getStandings')
            ->with(date('Y'))
            ->willReturn([$driver]);

        // 3) Inyectamos el mock en el contenedor de Laravel
        $this->app->instance(StandingsService::class, $mockService);

        // 4) Hacemos la petición y comprobamos resultado
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('standings');
        $response->assertViewHas('drivers', [$driver]);
    }
}
