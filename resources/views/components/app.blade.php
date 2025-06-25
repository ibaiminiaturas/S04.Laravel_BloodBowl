<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Blood Bowl' }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-900">
    {{ $slot }}

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>