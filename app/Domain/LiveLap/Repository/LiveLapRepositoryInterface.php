<?php
namespace App\Domain\LiveLap\Repository;

use App\Domain\LiveLap\Entity\LiveLap;

interface LiveLapRepositoryInterface
{
    /**
     * Obtiene datos de live timing para una carrera.
     *
     * @param int $raceId
     * @return LiveLap[]
     */
    public function getLiveLapData(int $raceId): array;
}