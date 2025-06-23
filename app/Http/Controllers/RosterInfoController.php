<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\PlayerType;
use App\Models\Roster;

class RosterInfoController extends Controller
{
    public function index()
    {
        $rosters = Roster::with('playerTypes.skills')->get();

        return view('rosters.index', compact('rosters'));

    }

    public function skills()
    {
        $skills = Skill::paginate(15);

        return view('rosters.skills', compact('skills'));
    }
}
