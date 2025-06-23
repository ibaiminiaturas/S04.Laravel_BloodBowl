@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Lista de Skills</h1>

  <div class="overflow-x-auto">
    <table class="w-full table-auto border-collapse bg-white shadow rounded">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 text-left">Nombre</th>
          <th class="px-4 py-2 text-left">Descripción</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($skills as $skill)
          <tr class="{{ $loop->even ? 'bg-gray-200' : 'bg-gray-150' }}">
            <td class="px-4 py-2 font-medium">{{ $skill->name }}</td>
            <td class="px-4 py-2">{{ $skill->description }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

    <div class="mt-4">
    {{ $skills->links() }}
  </div>
@endsection
