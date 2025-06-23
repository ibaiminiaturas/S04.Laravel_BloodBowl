@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow mt-6">
    <h1 class="text-2xl font-bold mb-6">Editar Equipo: {{ $team->name }}</h1>

    <form action="{{ route('teams.update', $team) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <div>
            <label for="name" class="block font-semibold mb-1">Nombre</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $team->name) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                maxlength="100"
                required
            >
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Coach -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">Entrenador</label>
            <p class="p-2 bg-gray-100 rounded">{{ $team->coach->name }}</p>
        </div>

        <!-- Roster -->

        <div class="mb-4">
            <label class="block font-semibold mb-1">Roster</label>
            <p class="p-2 bg-gray-100 rounded">{{ $team->roster->name }}</p>
        </div>

        <!-- Team Value -->
        <div>
            <label for="team_value" class="block font-semibold mb-1">Valor del equipo</label>
            <input
                type="number"
                id="team_value"
                name="team_value"
                value="{{ old('team_value', $team->team_value) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                min="0"
                required
            >
            @error('team_value')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gold Remaining -->
        <div>
            <label for="gold_remaining" class="block font-semibold mb-1">Oro restante</label>
            <input
                type="number"
                id="gold_remaining"
                name="gold_remaining"
                value="{{ old('gold_remaining', $team->gold_remaining) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                min="0"
                required
            >
            @error('gold_remaining')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700"
            >
                Guardar cambios
            </button>
            <a href="{{ route('teams.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
