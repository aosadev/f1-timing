<?php
namespace App\Interfaces\Http\Controllers\Api;

use App\Application\LiveTiming\LiveTimingService;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

class LiveTimingController extends Controller
{
    public function show(int $raceId, LiveTimingService $service): JsonResponse
    {
        // obtenemos la colección de entidades LiveLap
        $laps = $service->getLiveLapData($raceId);

        // mapeamos cada LiveLap a un array serializable
        $payload = array_map(function ($lap) {
            return [
                'driverId' => $lap->driverId(),
                'position' => $lap->position(),
                'lapTime'  => $lap->lapTime(),
                'gap'      => $lap->gap(),
            ];
        }, $laps);

        return response()->json($payload);
    }
}
