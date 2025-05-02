<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\Api\LiveTimingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group and the "/api" prefix.
|
*/

// **AÑADE ESTO AL FINAL** (dentro del mismo archivo, no en web.php)
Route::get('live/{raceId}', [LiveTimingController::class, 'show']);
