<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\StandingsController;
use App\Interfaces\Http\Controllers\Api\LiveTimingController;

Route::get('/', [StandingsController::class, 'index']);
Route::get('live/{raceId}', [LiveTimingController::class, 'show']);