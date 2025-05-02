<?php

namespace App\Interfaces\Http\Controllers;

use App\Application\Standings\StandingsService;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class StandingsController extends Controller
{
    /**
     * Muestra la clasificación de pilotos de la temporada actual.
     *
     * @param  StandingsService  $service
     * @return View
     */
    public function index(StandingsService $service): View
    {
        // Obtenemos los pilotos ordenados por posición
        $drivers = $service->getStandings(date('Y'));

        // Devolvemos la vista 'standings' pasando la variable 'drivers'
        return view('standings', ['drivers' => $drivers]);
    }
}
