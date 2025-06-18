<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayerType;

class PlayerTypeController extends Controller
{
    public function index()
    {
        $playerTypes = PlayerType::all();
        return view('player_types.index', compact('playerTypes'));
    }
}
