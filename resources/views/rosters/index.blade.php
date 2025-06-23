@extends('layouts.app')

@section('content')
<label for="roster_select" class="block font-semibold mb-1">Selecciona un roster:</label>
<select id="roster_select" class="border border-gray-300 rounded px-3 py-2 mb-6 w-full max-w-xs">
  @foreach ($rosters as $roster)
    <option value="roster_{{ $roster->id }}">{{ $roster->name }}</option>
  @endforeach
</select>

@foreach ($rosters as $roster)
  <div id="roster_{{ $roster->id }}" class="roster-table-container @if(!$loop->first) hidden @endif">
    <h2 class="text-xl font-bold mb-2">Roster: {{ $roster->name }}</h2>
    <div class="overflow-x-auto">
      <table class="w-full border-collapse bg-white shadow rounded mb-6" style="table-layout: fixed;">
        <colgroup>
          <col style="width: 18%;">
          <col style="width: 6%;">
          <col style="width: 6%;">
          <col style="width: 6%;">
          <col style="width: 6%;">
          <col style="width: 6%;">
          <col style="width: 14%;">
          <col style="width: 10%;">
          <col style="width: 8%;">
        </colgroup>
        <thead class="bg-gray-100">
          <tr>
            <th class="px-2 py-2 text-left">Nombre</th>
            <th class="px-2 py-2 text-center">MA</th>
            <th class="px-2 py-2 text-center">FU</th>
            <th class="px-2 py-2 text-center">AG</th>
            <th class="px-2 py-2 text-center">PA</th>
            <th class="px-2 py-2 text-center">AR</th>
            <th class="px-2 py-2 text-left">Skills</th>
            <th class="px-2 py-2 text-center">Precio</th>
            <th class="px-2 py-2 text-center">Máx</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roster->playerTypes as $index => $type)
            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : '' }}">
              <td class="px-2 py-1 font-medium break-words" style="word-break: break-word;">{{ $type->name }}</td>
              <td class="px-2 py-1 text-center">{{ $type->movement }}</td>
              <td class="px-2 py-1 text-center">{{ $type->strength }}</td>
              <td class="px-2 py-1 text-center">{{ $type->agility }}+</td>
              <td class="px-2 py-1 text-center">{{ $type->passing }}+</td>
              <td class="px-2 py-1 text-center">{{ $type->armor }}+</td>
              <td class="px-2 py-1" style="overflow-wrap: break-word; white-space: normal;">
                @foreach ($type->skills as $skill)
                  <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded mr-1 mb-1 max-w-[130px] break-words">
                    {{ $skill->name }}
                  </span>
                @endforeach
              </td>
              <td class="px-2 py-1 text-center">{{ $type->cost }}k</td>
              <td class="px-2 py-1 text-center">{{ $type->max_per_team }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endforeach

<script>
  const rosterSelect = document.getElementById('roster_select');
  const containers = document.querySelectorAll('.roster-table-container');

  rosterSelect.addEventListener('change', () => {
    containers.forEach(c => c.classList.add('hidden'));
    const selectedId = rosterSelect.value;
    const active = document.getElementById(selectedId);
    if (active) active.classList.remove('hidden');
  });
</script>
@endsection
