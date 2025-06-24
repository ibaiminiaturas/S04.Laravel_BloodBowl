<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerTypeController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamPlayerController;
use App\Http\Controllers\RosterInfoController;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/player-types', [PlayerTypeController::class, 'index']);

    Route::resource('coaches', CoachController::class);

    Route::resource('teams', TeamController::class);

    Route::resource('team_players', TeamPlayerController::class)->only(['store', 'update', 'destroy']);

    Route::post('/teams/{team}/players', [TeamPlayerController::class, 'store'])->name('team_players.store');
    Route::delete('/teams/{team}/players/{player}', [TeamPlayerController::class, 'destroy'])->name('team_players.destroy');

    Route::get('/teams/{team}/players/{player}/edit', [TeamPlayerController::class, 'edit'])->name('team_players.edit');
    Route::put('/teams/{team}/players/{player}', [TeamPlayerController::class, 'update'])->name('team_players.update');

    Route::get('/rosters/info', [RosterInfoController::class, 'index'])->name('rosters.index');
    Route::get('/rosters/skills', [RosterInfoController::class, 'skills'])->name('rosters.skills');

});

require __DIR__.'/auth.php';
