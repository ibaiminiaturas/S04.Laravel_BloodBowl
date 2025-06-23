<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerTypeController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamPlayerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/player-types', [PlayerTypeController::class, 'index']);

Route::resource('coaches', CoachController::class);

Route::resource('teams', TeamController::class);

Route::resource('team_players', TeamPlayerController::class)->only(['store', 'update', 'destroy']);

// web.php
Route::post('/teams/{team}/players', [TeamPlayerController::class, 'store'])->name('team_players.store');
