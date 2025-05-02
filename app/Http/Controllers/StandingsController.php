<?php
namespace App\Interfaces\Http\Controllers;

use App\Application\Standings\StandingsService;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class StandingsController extends Controller
{
    public function index(StandingsService $service): View
    {
        $drivers = $service->getStandings(date('Y'));
        return view('standings', ['drivers' => $drivers]);
    }
}