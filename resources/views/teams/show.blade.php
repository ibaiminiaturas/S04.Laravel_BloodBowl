@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow mt-6">
    <h1 class="text-2xl font-bold mb-4">Detalles del Equipo: {{ $team->name }}</h1>

    <div class="mb-4">
        <strong>Entrenador:</strong> {{ $team->coach->name }}
    </div>

    <div class="mb-4">
        <strong>Roster:</strong> {{ $team->roster->name }}
    </div>

    <div class="mb-4">
        <strong>Valor del Equipo:</strong> {{ $team->team_value }}
    </div>

    <div class="mb-4">
        <strong>Oro Restante:</strong> {{ $team->gold_remaining }}
    </div>

    <div class="mb-4">
        <strong>Creado en:</strong> {{ $team->created_at->format('d/m/Y H:i') }}
    </div>

    <div class="mb-4">
        <strong>Última actualización:</strong> {{ $team->updated_at->format('d/m/Y H:i') }}
    </div>

    <a href="{{ route('teams.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Volver a la lista</a>
</div>
@endsection
