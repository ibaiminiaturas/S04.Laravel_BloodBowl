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

  <!-- Sección derecha: jugadores -->
  <div class="w-3/5 max-w-full overflow-x-auto bg-white p-4 rounded shadow min-w-[320px]">
    <h2 class="text-xl font-bold mb-4 text-center">Jugadores</h2>
<div class="overflow-x-auto">
<table class="min-w-full border table-auto w-full break-words">
  <thead>
    <tr>
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
    <tr>
      <td class="border px-2 py-1">{{ $player->name }}</td>
      <td class="border px-2 py-1">{{ $player->jersey_number }}</td>
      <td class="border px-2 py-1">{{ $player->experience }}</td>
      <td class="border px-2 py-1">{{ $player->playerType->name }}</td>
      <td class="border px-2 py-1">{{ $player->playerType->movement }}</td>
      <td class="border px-2 py-1">{{ $player->playerType->strength . '+'}}</td>
      <td class="border px-2 py-1">{{ $player->playerType->agility . '+'}}</td>
      <td class="border px-2 py-1">{{ $player->playerType->passing . '+'}}</td>
      <td class="border px-2 py-1">{{ $player->playerType->armor . '+'}}</td>
      <td class="border px-2 py-1">{{ $player->playerType->cost }}</td>
      <td class="border px-2 py-1">
        <!-- Aquí podrías poner editar o eliminar jugador -->
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

    <!-- Botón para añadir jugador -->
    <button onclick="document.getElementById('addPlayerForm').classList.toggle('hidden')" 
            class="mt-4 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Añadir jugador
    </button>

    <!-- Formulario oculto para añadir jugador -->
    <form id="addPlayerForm" action="{{ route('team_players.store', $team) }}" method="POST" class="mt-4 hidden border p-4 rounded bg-gray-50">
      @csrf
      <div class="mb-2">
        <label for="name" class="block font-semibold">Nombre:</label>
        <input type="text" name="name" id="name" class="border p-1 w-full text-left" required>
      </div>
      <div class="mb-2">
        <label for="jersey_number" class="block font-semibold">Número de camiseta:</label>
        <input type="number" name="jersey_number" id="jersey_number" class="border p-1 w-full text-left" min="1" max="99" required>
      </div>
      <div class="mb-2">
        <label for="experience" class="block font-semibold">Experiencia:</label>
        <input type="number" name="experience" id="experience" class="border p-1 w-full text-left" min="0" max="10" required>
      </div>
      <div class="mb-2">
        <label for="player_type_id" class="block font-semibold">Tipo de jugador:</label>
        <select name="player_type_id" id="player_type_id" class="border p-1 w-full text-left" required>
          <option value="">Selecciona tipo</option>
          @foreach ($playerTypes as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full">
        Guardar jugador
      </button>
    </form>
  </div>
</div>
@endsection
