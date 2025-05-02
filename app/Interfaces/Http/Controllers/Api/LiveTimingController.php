<?php
namespace App\Interfaces\Http\Controllers\Api;

use App\Application\LiveTiming\LiveTimingService;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

class LiveTimingController extends Controller
{
    public function show(int $raceId, LiveTimingService $service): JsonResponse
    {
        $data = $service->getLiveLapData($raceId);
        return response()->json($data);
    }
}