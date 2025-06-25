@extends('layouts.app')

@section('header')
    <h2 class="font-extrabold text-3xl text-gray-900 dark:text-gray-100 leading-tight tracking-wide">
        Bienvenido al gestor de equipos de Blood Bowl ⚔️🏈
    </h2>
@endsection

@section('content')
    <div
        class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-10 max-w-4xl mx-auto border border-gray-200 dark:border-gray-700">
        <h3
            class="text-3xl font-extrabold mb-8 text-gray-900 dark:text-gray-100 border-b-2 border-gray-300 dark:border-gray-600 pb-2">
            ¿Qué puedes hacer desde aquí?
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div
                        class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 flex items-center justify-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8c.667 0 2 .667 2 2 0 1.333-1.333 2-2 2s-2-.667-2-2c0-1.333 1.333-2 2-2z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v6" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 10v4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 10v4" />
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-1">Habilidades</h4>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Explora todas las habilidades del juego con
                        sus nombres y descripciones para dominar cada jugada.</p>
                </div>
            </div>

            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div
                        class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 flex items-center justify-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-1">Rosters</h4>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Consulta los tipos de jugadores disponibles
                        por roster. Cada equipo tiene su propia estrategia y particularidades.</p>
                </div>
            </div>

            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div
                        class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 flex items-center justify-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-1">Entrenadores</h4>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Crea y gestiona tus entrenadores. Cada
                        entrenador puede dirigir uno o varios equipos.</p>
                </div>
            </div>

            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <div
                        class="h-12 w-12 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 flex items-center justify-center shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                        </svg>
                    </div>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-1">Equipos</h4>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Construye tus equipos eligiendo roster,
                        jugadores y habilidades para llevarlos a lo más alto del torneo.</p>
                </div>
            </div>
        </div>

        <p class="mt-12 text-center text-gray-600 dark:text-gray-400 italic font-semibold tracking-wide">
            ¡Prepárate para el caos en el campo y demuestra quién manda en Blood Bowl! 🩸⚡
        </p>
    </div>
@endsection