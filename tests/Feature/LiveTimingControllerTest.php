<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Application\LiveTiming\LiveTimingService;
use App\Domain\LiveLap\Entity\LiveLap;

class LiveTimingControllerTest extends TestCase
{
    public function testApiLiveReturnsJson()
    {
        $raceId = 101;
        $lap = new LiveLap(1,1,70.5,'+0.000');
        $mockService = $this->createMock(LiveTimingService::class);
        $mockService->method('getLiveLapData')
                    ->willReturn([$lap]);
        $this->app->instance(LiveTimingService::class, $mockService);

        $response = $this->getJson("/api/live/{$raceId}");
        $response->assertStatus(200)
                 ->assertJson([['driverId'=>1,'position'=>1,'lapTime'=>70.5,'gap'=>'+0.000']]);
    }
}