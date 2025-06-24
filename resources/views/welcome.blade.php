<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laravel Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 flex flex-col items-center justify-center min-h-screen px-6">

    {{-- Logo centrado arriba --}}
    <div class="mb-10">
        <x-application-logo class="h-20 w-auto text-gray-800 dark:text-gray-200" />
    </div>

    {{-- Contenido principal --}}
    <main class="flex flex-col items-center justify-center text-center space-y-6 max-w-md w-full">
        <h1 class="text-3xl font-semibold text-gray-800 dark:text-gray-100">
            Bienvenido a BloodBowl Teams
        </h1>

        <p class="text-gray-600 dark:text-gray-400 text-lg">
            Gestiona tus equipos y jugadores de forma sencilla.
        </p>

        @if (Route::has('login'))
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-6">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-6 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800 transition font-medium">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="px-6 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800 transition font-medium">
                        Iniciar sesión
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="px-6 py-2 border border-gray-500 text-gray-700 dark:text-gray-300 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition font-medium">
                            Registrarse
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </main>

</body>
</html>
