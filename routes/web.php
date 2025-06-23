<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerTypeController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TeamController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/player-types', [PlayerTypeController::class, 'index']);

Route::resource('coaches', CoachController::class);

Route::resource('teams', TeamController::class);
