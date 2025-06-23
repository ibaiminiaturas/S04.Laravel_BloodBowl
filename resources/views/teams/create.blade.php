@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Crear equipo</h1>

    <form action="{{ route('teams.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block font-medium">Nombre del equipo</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-200"
                   required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="coach_id" class="block font-medium">Coach</label>
            <select name="coach_id" id="coach_id"
                    class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-200"
                    required>
                <option value="">Selecciona un coach</option>
                @foreach($coaches as $coach)
                    <option value="{{ $coach->id }}" {{ old('coach_id') == $coach->id ? 'selected' : '' }}>
                        {{ $coach->name }} ({{ $coach->email }})
                    </option>
                @endforeach
            </select>
            @error('coach_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="roster_id" class="block font-medium">Roster</label>
            <select name="roster_id" id="roster_id"
                    class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-200"
                    required>
                <option value="">Selecciona un roster</option>
                @foreach($rosters as $roster)
                    <option value="{{ $roster->id }}" {{ old('roster_id') == $roster->id ? 'selected' : '' }}>
                        {{ $roster->name }}
                    </option>
                @endforeach
            </select>
            @error('roster_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="team_value" class="block font-medium">Valor del equipo</label>
            <input type="number" name="team_value" id="team_value" value="{{ old('team_value', 1000) }}"
                   class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-200"
                   required>
            @error('team_value')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="gold_remaining" class="block font-medium">Oro restante</label>
            <input type="number" name="gold_remaining" id="gold_remaining" value="{{ old('gold_remaining', 0) }}"
                   class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-200"
                   required>
            @error('gold_remaining')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Crear equipo
            </button>
            <a href="{{ route('teams.index') }}" class="ml-4 text-gray-600 hover:underline">Cancelar</a>
        </div>
    </form>
</div>
@endsection
