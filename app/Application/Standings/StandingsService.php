<?php
namespace App\Application\Standings;

use App\Domain\Driver\Repository\DriverRepositoryInterface;

class StandingsService
{
    private DriverRepositoryInterface $repository;

    public function __construct(DriverRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Obtener clasificación de pilotos para una temporada.
     *
     * @param int \$season
     * @return array
     */
    public function getStandings(int $season): array
    {
        return $this->repository->getStandings($season);
    }
}