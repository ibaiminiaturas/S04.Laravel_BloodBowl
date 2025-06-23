@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Equipos</h1>

    <a href="{{ route('teams.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        + Crear nuevo equipo
    </a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


    <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">Nombre</th>
                <th class="border px-4 py-2 text-left">Entrenador</th>
                <th class="border px-4 py-2 text-left">Roster</th>
                <th class="border px-4 py-2 text-right">Valor</th>
                <th class="border px-4 py-2 text-right">Oro</th>
                <th class="border px-4 py-2 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teams as $team)
            <tr class="{{ $loop->odd ? 'bg-gray-50' : '' }}">
                <td class="border px-4 py-2">{{ $team->name }}</td>
                <td class="border px-4 py-2">{{ $team->coach->name ?? 'Sin coach' }}</td>
                <td class="border px-4 py-2">{{ $team->roster->name ?? 'Sin roster' }}</td>
                <td class="border px-4 py-2 text-right">{{ $team->team_value }}</td>
                <td class="border px-4 py-2 text-right">{{ $team->gold_remaining }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('teams.show', $team) }}" class="text-blue-600 hover:underline">Ver</a>
                    <a href="{{ route('teams.edit', $team) }}" class="text-yellow-600 hover:underline">Editar</a>
                    <form action="{{ route('teams.destroy', $team) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este equipo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $teams->links() }}
    </div>
</div>
@endsection
