<?php
namespace App\Application\LiveTiming;

use App\Domain\LiveLap\Entity\LiveLap;
use App\Domain\LiveLap\Repository\LiveLapRepositoryInterface;

class LiveTimingService
{
    private LiveLapRepositoryInterface $repository;
    public function __construct(LiveLapRepositoryInterface $repository)
    { $this->repository = $repository; }
    public function getLiveLapData(int $raceId): array
    { return $this->repository->getLiveLapData($raceId); }
}