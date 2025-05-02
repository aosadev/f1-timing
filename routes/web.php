<?php

use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controllers\StandingsController;

Route::get('/', [StandingsController::class, 'index']);