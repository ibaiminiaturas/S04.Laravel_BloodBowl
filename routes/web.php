<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/player-types', [PlayerTypeController::class, 'index']);
