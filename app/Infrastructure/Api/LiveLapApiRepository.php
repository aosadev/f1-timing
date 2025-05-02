<?php
namespace App\Infrastructure\Api;

use App\Domain\LiveLap\Entity\LiveLap;
use App\Domain\LiveLap\Repository\LiveLapRepositoryInterface;
use App\Services\F1ApiService;

class LiveLapApiRepository implements LiveLapRepositoryInterface
{
    private F1ApiService $api;
    public function __construct(F1ApiService $api)
    { $this->api = $api; }
    public function getLiveLapData(int $raceId): array
    {
        $resp = $this->api->getLiveTiming($raceId);
        $laps = [];
        foreach ($resp['response'][0]['positions'] as $item) {
            $laps[] = new LiveLap(
                (int) $item['driver']['id'],
                (int) $item['rank'], 
                (float) $item['lap_time'], 
                $item['gap']
            );
        }
        return $laps;
    }
}