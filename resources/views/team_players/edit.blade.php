@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Editar Jugador: {{ $player->name }}</h1>

    @include('team_players._form', ['player' => $player, 'team' => $team, 'playerTypes' => $playerTypes, 'editableFields' => ['name', 'experience']])

    <a href="{{ route('teams.edit', $team) }}" class="inline-block mt-4 text-blue-600 hover:underline">
        ← Volver al equipo
    </a>
</div>
@endsection
