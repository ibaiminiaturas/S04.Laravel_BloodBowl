@extends('layouts.app')

@section('content')
  <div class="max-w-4xl mx-auto mt-10 px-4">
    <h1 class="text-2xl font-bold mb-6">Selecciona un Roster</h1>

    <form method="GET" action="">
      <label for="roster" class="block text-gray-700 font-semibold mb-2">Roster</label>
      <select
        id="roster"
        name="roster_id"
        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >
        <option value="">-- Elige un roster --</option>
        @foreach ($rosters as $roster)
          <option value="{{ $roster->id }}">{{ $roster->name }}</option>
        @endforeach
      </select>
    </form>
  </div>
@endsection