@props(['player' => null, 'playerTypes', 'editableFields' => [], 'team'])

<form action="{{ $player
  ? route('team_players.update', [$team, $player])
  : route('team_players.store', $team) }}" method="POST" class="mt-4 border p-4 rounded bg-gray-50">
  @csrf
  @if($player)
    @method('PUT')
  @endif

  <div class="mb-2">
    <label for="name" class="block font-semibold">Nombre:</label>
    <input type="text" name="name" id="name"
      class="border p-1 w-full text-left rounded {{ !in_array('name', $editableFields) ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}"
      value="{{ old('name', $player?->name) }}" @if(!in_array('name', $editableFields)) readonly @endif required>
  </div>

  <div class="mb-2">
    <label for="jersey_number" class="block font-semibold">Número de camiseta:</label>
    <input type="number" name="jersey_number" id="jersey_number"
      class="border p-1 w-full text-left rounded {{ !in_array('jersey_number', $editableFields) ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}"
      min="1" max="99" value="{{ old('jersey_number', $player?->jersey_number) }}" @if(!in_array('jersey_number', $editableFields)) readonly @endif required>
  </div>

  <div class="mb-2">
    <label for="experience" class="block font-semibold">Experiencia:</label>
    <input type="number" name="experience" id="experience"
      class="border p-1 w-full text-left rounded {{ !in_array('experience', $editableFields) ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}"
      min="0" max="10" value="{{ old('experience', $player?->experience) }}" @if(!in_array('experience', $editableFields)) readonly @endif required>
  </div>


  <div class="mb-2">
    <label for="player_type_id" class="block font-semibold">Tipo de jugador:</label>
    <select name="player_type_id" id="player_type_id"
      class="border p-1 w-full text-left rounded {{ !in_array('player_type_id', $editableFields) ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}"
      @if(!in_array('player_type_id', $editableFields)) disabled @endif required>
      <option value="">Selecciona tipo</option>
      @foreach ($playerTypes as $type)
      @if(isset($isEdit) && $isEdit)
      @if(isset($availableSlots) && isset($availableSlots[$type->id]) && $availableSlots[$type->id] > 0)
      <option value="{{ $type->id }}" @selected(old('player_type_id', $player?->player_type_id) == $type->id)>
      {{ $type->name }} - {{ $type->cost }} oro

      ({{ $availableSlots[$type->id] ?? 0 }} disponibles de {{ $type->max_per_team }})

      </option>
    @endif
    @elseif (request()->routeIs('team_players.edit'))
      <option value="{{ $type->id }}" @selected(old('player_type_id', $player?->player_type_id) == $type->id)>
      {{ $type->name }} - {{ $type->cost }} oro
      </option>

    @endif
    @endforeach
    </select>
  </div>

  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full"
    @if(empty($editableFields)) disabled @endif>
    {{ $player ? 'Actualizar jugador' : 'Guardar jugador' }}
  </button>
</form>