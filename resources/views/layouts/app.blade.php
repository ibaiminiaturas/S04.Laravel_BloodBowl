<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blood Bowl - Gestión Coaches</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 min-h-screen">

    <<nav class="bg-blue-700 p-4 text-white">
    <div class="container mx-auto flex justify-between items-center">
        <a class="font-bold text-xl" href="#">Blood Bowl</a>
        <div class="flex space-x-3">
            <a href="{{ route('rosters.index') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">
                Rosters Info
            </a>
            <a href="{{ route('coaches.index') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">
                Coaches
            </a>
            <a href="{{ route('teams.index') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">
                Teams
            </a>
        </div>
    </div>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

</body>
</html>
