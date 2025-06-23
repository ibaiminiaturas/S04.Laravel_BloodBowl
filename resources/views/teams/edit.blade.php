@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-6 flex gap-6">
  <!-- Formulario equipo -->
  <div class="w-2/5 bg-white p-6 rounded shadow min-w-[320px]">
    <h1 class="text-2xl font-bold mb-6">Editar Equipo: {{ $team->name }}</h1>

    <form action="{{ route('teams.update', $team) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Nombre -->
      <div>
        <label for="team_name" class="block font-semibold mb-1">Nombre</label>
        <input
          type="text"
          id="team_name"
          name="team_name"
          value="{{ old('team_name', $team->name) }}"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          maxlength="100"
          required
        >
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
        <p class="p-2 bg-gray-100 rounded">{{ $team->team_value }}</p>
        @error('team_value')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Gold Remaining -->
      <div>
        <label for="gold_remaining" class="block font-semibold mb-1">Oro restante</label>
        <p class="p-2 bg-gray-100 rounded">{{ $team->gold_remaining }}</p>
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

  <!-- Sección derecha: jugadores -->
  <div class="w-3/5 max-w-full bg-white p-4 rounded shadow min-w-[320px]">
    <h2 class="text-xl font-bold mb-4 text-center">Jugadores</h2>

    <div class="overflow-x-auto">
      <table class="min-w-full border table-auto w-full break-words">
        <thead>
            <tr class="bg-gray-400">
            <th class="border px-2 py-1">Nombre</th>
            <th class="border px-2 py-1">Número</th>
            <th class="border px-2 py-1">Experiencia</th>
            <th class="border px-2 py-1">Tipo de jugador</th>
            <th class="border px-2 py-1">MA</th>
            <th class="border px-2 py-1">ST</th>
            <th class="border px-2 py-1">AG</th>
            <th class="border px-2 py-1">PA</th>
            <th class="border px-2 py-1">AV</th>
            <th class="border px-2 py-1">Coste</th>
            <th class="border px-2 py-1">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($team->players as $player)
           <tr class="{{ $loop->even ? 'bg-gray-200' : 'bg-gray-50' }}">
            <td class="border px-2 py-1">{{ $player->name }}</td>
            <td class="border px-2 py-1">{{ $player->jersey_number }}</td>
            <td class="border px-2 py-1">{{ $player->experience }}</td>
            <td class="border px-2 py-1">{{ $player->playerType->name }}</td>
            <td class="border px-2 py-1">{{ $player->playerType->movement }}</td>
            <td class="border px-2 py-1">{{ $player->playerType->strength . '+' }}</td>
            <td class="border px-2 py-1">{{ $player->playerType->agility . '+' }}</td>
            <td class="border px-2 py-1">{{ $player->playerType->passing . '+' }}</td>
            <td class="border px-2 py-1">{{ $player->playerType->armor . '+' }}</td>
            <td class="border px-2 py-1">{{ $player->playerType->cost }}</td>
            <td class="border px-2 py-1">
              <div class="flex gap-2 justify-center">
                <a href="{{ route('team_players.edit', [$team, $player]) }}"
                   class="text-blue-600 hover:text-blue-800 font-semibold">
                  Editar
                </a>

                <form action="{{ route('team_players.destroy', [$team, $player]) }}"
                      method="POST"
                      onsubmit="return confirm('¿Eliminar jugador {{ $player->name }}?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                    Eliminar
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
      <div class="mt-4 bg-green-200 text-green-800 p-2 rounded">
        {{ session('success') }}
      </div>
    @endif

    @error('not_enough_spots')
      <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
    @enderror

    @error('gold_remaining')
      <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
    @enderror

    <!-- Botón para añadir jugador -->
    <button onclick="document.getElementById('addPlayerForm').classList.toggle('hidden')" 
            class="mt-6 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Añadir jugador
    </button>

    <!-- Formulario oculto -->
    <div id="addPlayerForm" class="mt-4 hidden">
      @include('team_players._form', [
          'player' => null,
          'team' => $team,
          'playerTypes' => $playerTypes,
          'editableFields' => ['name', 'jersey_number', 'experience', 'player_type_id']
      ])
    </div>
  </div>
</div>
@endsection
