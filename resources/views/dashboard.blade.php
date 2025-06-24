@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Bienvenido al gestor de equipos de Blood Bowl ⚔️🏈
    </h2>
@endsection

@section('content')
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-8">
        <h3 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100">¿Qué puedes hacer desde aquí?</h3>

        <ul class="space-y-4 text-gray-700 dark:text-gray-300 list-disc list-inside">
            <li><strong>Habilidades:</strong> Explora todas las habilidades del juego con sus nombres y descripciones para dominar cada jugada.</li>
            <li><strong>Rosters:</strong> Consulta los tipos de jugadores disponibles por roster. Cada equipo tiene su propia estrategia y particularidades.</li>
            <li><strong>Entrenadores:</strong> Crea y gestiona tus entrenadores. Cada entrenador puede dirigir uno o varios equipos.</li>
            <li><strong>Equipos:</strong> Construye tus equipos eligiendo roster, jugadores y habilidades para llevarlos a lo más alto del torneo.</li>
        </ul>

        <p class="mt-8 text-gray-600 dark:text-gray-400 italic">
            ¡Prepárate para el caos en el campo y demuestra quién manda en Blood Bowl! 🩸⚡
        </p>
    </div>
@endsection
