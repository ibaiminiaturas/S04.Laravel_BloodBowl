<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamPlayer;
use App\Models\Roster;
use App\Models\Coach;
use App\Models\Skill;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        $teams = Team::with(['coach', 'roster'])->paginate(10);
        return view('teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coaches = Coach::all();
        $rosters = Roster::all();
        return view('teams.create', compact('rosters', 'coaches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:teams,name|max:100',
            'coach_id' => 'required|exists:coaches,id',
            'roster_id' => 'required|exists:rosters,id',
            'team_value' => 'required|integer|min:0',
            'gold_remaining' => 'required|integer|min:0',
        ]);

        Team::create($validated);

        return redirect()->route('teams.index')->with('success', 'Equipo "' . $validated['name'] . '" creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $coaches = Coach::all();
        $rosters = Roster::all();
        $playerTypes = $team->roster->playerTypes;

        return view('teams.edit', compact('team', 'rosters', 'coaches', 'playerTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'team_name' => ['required', 'max:100', Rule::unique('teams', 'name')->ignore($team->id)]
        ]);
        $team->name = $validated['team_name'];
        $team->save();


        return back()->with('success', 'Equipo "' . $team->name . '" actualizado correctamente.');


    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team '  . $team->name . ' eliminado correctamente');
    }
}
