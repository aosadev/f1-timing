<?php
namespace App\Infrastructure\Api;

use App\Domain\Driver\Entity\Driver;
use App\Domain\Driver\Repository\DriverRepositoryInterface;
use App\Services\F1ApiService;

class DriverApiRepository implements DriverRepositoryInterface
{
    private F1ApiService $api;

    public function __construct(F1ApiService $api)
    {
        $this->api = $api;
    }

    public function getStandings(int $season): array
    {
        $response = $this->api->getStandings($season);
        $drivers = [];
        foreach ($response['response'][0]['drivers'] as $item) {
            $drivers[] = new Driver(
                $item['driver']['name'],
                $item['driver']['nationality'],
                (int) $item['driver']['number']
            );
        }
        return $drivers;
    }
}