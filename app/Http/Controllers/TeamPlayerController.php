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

        $count = TeamPlayer::where('team_id', $team->id)->where('player_type_id', $playerType->id)->count();
        if ($count === $playerType->max_per_team) {
            return back()
    ->withErrors(['not_enough_spots' => 'No puedes añador mas jugadores de ese tipo. Maximo ' . $playerType->max_per_team . ' por equipo'])
    ->withInput();
        }

        $team->gold_remaining -=  $playerType->cost;
        $team->save();
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
    public function edit(Team $team, TeamPlayer $player)
    {
        $playerTypes = PlayerType::where('roster_id', $team->roster_id)->get();
        return view('team_players.edit', [
          'player' => $player,
          'team' => $team,
          'playerTypes' => $playerTypes,
          'editableFields' => ['name',  'experience'], // prueba con todos editables
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team, TeamPlayer $player)
    {
        $player->name = $request->input('name');
        $player->experience = $request->input('experience');

        $player->save();

        return redirect()->route('teams.edit', $team)->with('success', 'Jugador ' . $player->name .  ' actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team, TeamPlayer $player)
    {
        $playerType = $player->playerType; // relación playerType()
        if ($playerType) {
            $team->gold_remaining += $playerType->cost;
            $team->save();
        }

        $player->delete();

        return back()->with('success', 'Jugador ' . $player->name . ' eliminado con exito');
    }
}
