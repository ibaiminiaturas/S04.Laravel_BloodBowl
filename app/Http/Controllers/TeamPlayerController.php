<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamPlayer;
use App\Models\PlayerType;
use App\Models\Team;
use Illuminate\Validation\Rule;

class TeamPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'jersey_number' => [
                    'required',
                    'integer',
                    'min:1',
                    'max:99',
                    Rule::unique('team_players')->where(function ($query) use ($team) {
                        return $query->where('team_id', $team->id);
                    }),
             ],
            'player_type_id' => 'required|exists:player_types,id',
             'experience' => 'required|integer|min:0',
        ]);
        $validated['team_id'] = $team->id;

        if (TeamPlayer::where('team_id', $validated['team_id'])->where('jersey_number', $validated['jersey_number'])->exists()) {
            return back()->withErrors(['jersey_number' => 'Ese número ya está en uso en este equipo.'])->withInput();
        }

        $playerType = PlayerType::findOrFail($validated['player_type_id']);

        if ($team->gold_remaining < $playerType->cost) {
            return back()->withErrors(['gold_remaining' => 'No hay oro suficiente para añadir este jugador.'])->withInput();
        }

        $team->gold_remaining -=  $playerType->cost;
        $team->update(['gold_remaining' => $team->gold_remaining]) ;

        $team->players()->create($validated);

        return back()->with('success', 'Jugador ' . $validated['name'] . ' añadido con éxito.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamPlayer $teamPlayer)
    {
        $teamPlayer->delete();

        return back()->with('success', 'Jugador ' . $teamPlayer->name . ' eliminado.');
    }
}
