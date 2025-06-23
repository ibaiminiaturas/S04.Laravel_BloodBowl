
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Editar Entrenador</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('coaches.update', $coach) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $coach->name) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $coach->email) }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Contraseña (dejar en blanco para no cambiar)</label>
            <input type="password" name="password"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Guardar Cambios
        </button>

        <a href="{{ route('coaches.index') }}" class="inline-block ml-4 text-gray-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
