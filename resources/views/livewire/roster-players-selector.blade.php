<div>
    <label for="roster" class="block font-semibold mb-2">Selecciona un roster:</label>
    <select wire:model="roster" id="roster" wire:change="rosterChanged($event.target.value)"
        class="form-select mb-4 border rounded px-3 py-2 w-full max-w-md">
        <option value="">-- Selecciona --</option>
        @foreach($rosters as $roster)
            <option value="{{ $roster->id }}">{{ $roster->name }}</option>
        @endforeach
    </select>

    @if($roster)
        <h2 class="text-xl font-bold mb-4">Roster seleccionado</h2>
        <table class="w-full table-auto border-collapse bg-white shadow rounded mb-6">
            <colgroup>
                <col style="width: 15%;">
                <col style="width: 6%;">
                <col style="width: 6%;">
                <col style="width: 6%;">
                <col style="width: 6%;">
                <col style="width: 6%;">
                <col>
                <col style="width: 8%; min-width: 60px; max-width: 80px;">
                <col style="width: 8%; min-width: 60px; max-width: 80px;">
            </colgroup>
            <thead class="bg-gray-100 border-b border-gray-300">
                <tr>
                    <th class="px-3 py-2 text-left">Nombre</th>
                    <th class="px-3 py-2 text-center">MA</th>
                    <th class="px-3 py-2 text-center">FU</th>
                    <th class="px-3 py-2 text-center">AG</th>
                    <th class="px-3 py-2 text-center">PA</th>
                    <th class="px-3 py-2 text-center">AR</th>
                    <th class="px-3 py-2 text-left">Skills</th>
                    <th class="px-3 py-2 text-center">Precio</th>
                    <th class="px-3 py-2 text-center">Máx</th>
                </tr>
            </thead>
            <tbody>
                @foreach($playerTypes as $type)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : '' }} border-b border-gray-200">
                        <td class="px-3 py-2 font-medium break-words whitespace-normal">{{ $type->name }}</td>
                        <td class="px-3 py-2 text-center">{{ $type->movement }}</td>
                        <td class="px-3 py-2 text-center">{{ $type->strength }}</td>
                        <td class="px-3 py-2 text-center">{{ $type->agility }}+</td>
                        <td class="px-3 py-2 text-center">{{ $type->passing }}+</td>
                        <td class="px-3 py-2 text-center">{{ $type->armor }}+</td>
                        <td class="px-3 py-2 break-words whitespace-normal overflow-hidden">
                            @foreach($type->skills as $skill)
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mr-1 mb-1 max-w-[140px] break-words">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="px-3 py-2 text-center">{{ $type->cost }}k</td>
                        <td class="px-3 py-2 text-center">{{ $type->max_per_team }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="italic text-gray-600">Por favor, selecciona un roster.</p>
    @endif
</div>