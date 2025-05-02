<?php

namespace App\Domain\Driver\Repository;

use App\Domain\Driver\Entity\Driver;

interface DriverRepositoryInterface
{
    /**
     * Devuelve un array de Driver ordenado por posición en el campeonato.
     *
     * @param int $season  Año de la temporada
     * @return Driver[]
     */
    public function getStandings(int $season): array;
}