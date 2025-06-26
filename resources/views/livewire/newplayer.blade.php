<div>
    <div class="max-w-7xl mx-auto mt-6 px-4">


        <form action="{{ route('teams.update', $team) }}" method="POST"
            class="mb-6 bg-white p-6 rounded shadow flex flex-wrap items-center gap-6">
            @csrf
            @method('PUT')


            <div class="flex flex-col flex-grow min-w-[220px] max-w-xl">
                <label for="team_name" class="text-gray-600 font-semibold mb-1">Nombre del equipo</label>
                <input id="team_name" name="team_name" type="text" value="{{ old('team_name', $team->name) }}"
                    maxlength="100" required
                    class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full">
                @error('team_name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 whitespace-nowrap self-end">
                Actualizar nombre
            </button>


            <div class="flex flex-wrap gap-6 ml-auto min-w-[320px]">
                <div class="flex flex-col min-w-[150px]">
                    <span class="text-gray-600 font-semibold mb-1">Entrenador</span>
                    <span class="p-2 bg-gray-100 rounded truncate max-w-xs">{{ $team->coach->name }}</span>
                </div>
                <div class="flex flex-col min-w-[150px]">
                    <span class="text-gray-600 font-semibold mb-1">Roster</span>
                    <span class="p-2 bg-gray-100 rounded truncate max-w-xs">{{ $team->roster->name }}</span>
                </div>
                <div class="flex flex-col min-w-[150px]">
                    <span class="text-gray-600 font-semibold mb-1">Valor equipo</span>
                    <span class="p-2 bg-gray-100 rounded">{{ $team->team_value }}</span>
                </div>
                <div class="flex flex-col min-w-[150px]">
                    <span class="text-gray-600 font-semibold mb-1">Oro restante</span>
                    <span class="p-2 bg-gray-100 rounded">{{ $team->gold_remaining }}</span>
                </div>
            </div>

        </form>
    </div>



    <div class="bg-white p-4 rounded shadow overflow-x-auto">
        <h2 class="text-xl font-bold mb-4 text-center">Jugadores</h2>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @error('not_enough_spots')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        @error('gold_remaining')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror

        <table class="min-w-full border table-fixed w-full text-sm text-left">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border px-2 py-1 max-w-[140px] truncate" title="Nombre">Nombre</th>
                    <th class="border px-2 py-1 max-w-[50px] truncate" title="Número">Número</th>
                    <th class="border px-2 py-1 max-w-[80px] truncate" title="Experiencia">Experiencia</th>
                    <th class="border px-2 py-1 max-w-[140px] truncate" title="Tipo de jugador">Tipo de jugador</th>
                    <th class="border px-2 py-1 max-w-[40px]" title="MA">MA</th>
                    <th class="border px-2 py-1 max-w-[40px]" title="ST">ST</th>
                    <th class="border px-2 py-1 max-w-[40px]" title="AG">AG</th>
                    <th class="border px-2 py-1 max-w-[40px]" title="PA">PA</th>
                    <th class="border px-2 py-1 max-w-[40px]" title="AV">AV</th>
                    <th class="border px-2 py-1 max-w-[60px]" title="Coste">Coste</th>
                    <th class="border px-2 py-1 min-w-[260px]" title="Skills">Skills</th>
                    <th class="border px-2 py-1 min-w-[140px]" title="Acciones">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team->players as $player)
                    <tr class="hover:bg-gray-50 align-top">
                        <td class="border px-2 py-1 max-w-[140px] break-words whitespace-normal">{{ $player->name }}</td>
                        <td class="border px-2 py-1 max-w-[50px] text-center">{{ $player->jersey_number }}</td>
                        <td class="border px-2 py-1 max-w-[80px] text-center">{{ $player->experience }}</td>
                        <td class="border px-2 py-1 max-w-[140px] break-words whitespace-normal">
                            {{ $player->playerType->name }}
                        </td>
                        <td class="border px-2 py-1 max-w-[40px] text-center">{{ $player->playerType->movement }}</td>
                        <td class="border px-2 py-1 max-w-[40px] text-center">{{ $player->playerType->strength . '+'}}</td>
                        <td class="border px-2 py-1 max-w-[40px] text-center">{{ $player->playerType->agility . '+'}}</td>
                        <td class="border px-2 py-1 max-w-[40px] text-center">{{ $player->playerType->passing . '+'}}</td>
                        <td class="border px-2 py-1 max-w-[40px] text-center">{{ $player->playerType->armor . '+'}}</td>
                        <td class="border px-2 py-1 max-w-[60px] text-center">{{ $player->playerType->cost }}</td>
                        <td class="border px-2 py-1 min-w-[260px] break-words">
                            <div class="flex flex-wrap gap-1">
                                @foreach ($player->playerType->skills as $skill)
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-0.5 rounded whitespace-nowrap"
                                        title="{{ $skill->name }}">
                                        {{ $skill->name }}
                                    </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="border px-2 py-1 min-w-[140px] flex gap-2 justify-center whitespace-nowrap">
                            <a href="{{ route('team_players.edit', [$team, $player]) }}"
                                class="text-blue-600 hover:text-blue-800 font-semibold">
                                Editar
                            </a>

                            <form action="{{ route('team_players.destroy', [$team, $player]) }}" method="POST"
                                onsubmit="return confirm('¿Eliminar jugador {{ $player->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button wire:click="toggleForm" class="mt-4 w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Añadir jugador
        </button>
        @if ($showForm)
            <div id="addPlayerForm" class="mt-4">

                @include('team_players._form', [
                    'player' => null,
                    'team' => $team,
                    'playerTypes' => $playerTypes,
                    'editableFields' => ['name', 'jersey_number', 'experience', 'player_type_id']
                ])
                                </div>
        @endif
    
      </div>
    </div>
</div>