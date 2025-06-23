
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-md bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Detalles del Entrenador</h1>

    <p><strong>Nombre:</strong> {{ $coach->name }}</p>
    <p><strong>Email:</strong> {{ $coach->email }}</p>
    <p><strong>Creado:</strong> {{ $coach->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Actualizado:</strong> {{ $coach->updated_at->format('d/m/Y H:i') }}</p>

    <div class="mt-4 space-x-2">
        <a href="{{ route('coaches.edit', $coach) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Editar</a>
        <a href="{{ route('coaches.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">Volver</a>
    </div>
</div>
@endsection
