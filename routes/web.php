<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerTypeController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamPlayerController;
use App\Http\Controllers\RosterInfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/player-types', [PlayerTypeController::class, 'index']);

Route::resource('coaches', CoachController::class);

Route::resource('teams', TeamController::class);

Route::resource('team_players', TeamPlayerController::class)->only(['store', 'update', 'destroy']);

Route::post('/teams/{team}/players', [TeamPlayerController::class, 'store'])->name('team_players.store');
Route::delete('/teams/{team}/players/{player}', [TeamPlayerController::class, 'destroy'])->name('team_players.destroy');

Route::get('/teams/{team}/players/{player}/edit', [TeamPlayerController::class, 'edit'])->name('team_players.edit');
Route::put('/teams/{team}/players/{player}', [TeamPlayerController::class, 'update'])->name('team_players.update');

Route::get('/rosters/info', [RosterInfoController::class, 'index'])->name('rosters.index');
