
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Coaches</h1>

    <a href="{{ route('coaches.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
        Crear Coach
    </a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="border px-4 py-2 text-left">Nombre</th>
                <th class="border px-4 py-2 text-left">Email</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coaches as $coach)
            <tr>
                <td class="border px-4 py-2">{{ $coach->name }}</td>
                <td class="border px-4 py-2">{{ $coach->email }}</td>
                <td class="border px-4 py-2 text-center space-x-2">
                    <a href="{{ route('coaches.show', $coach) }}" class="text-blue-600 hover:underline">Ver</a>
                    <a href="{{ route('coaches.edit', $coach) }}" class="text-yellow-600 hover:underline">Editar</a>
                    <form action="{{ route('coaches.destroy', $coach) }}" method="POST" class="inline"
                          onsubmit="return confirm('¿Eliminar este coach?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
