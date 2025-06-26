@extends('layouts.app')

@section('title', '404 - Página no encontrada')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-start bg-gray-950 text-gray-300 px-4 py-10">
<img src="{{ asset('images/404.webp') }}"
         
         class="w-28 h-28 mb-6 opacity-70">

    <h1 class="text-5xl font-extrabold text-gray-100 mb-4 tracking-wider">404</h1>
    <h2 class="text-xl font-semibold mb-2 text-gray-400">No encontramos esa página en el campo de juego</h2>
    <p class="text-gray-500 mb-6 max-w-xl text-center">
        Tal vez fue eliminada por una falta grave... O nunca existió. Vuelve al vestuario para reagruparte.
    </p>

    <a href="{{ url('/') }}"
       class="inline-block px-6 py-3 bg-gray-800 hover:bg-gray-700 text-gray-100 text-base font-medium rounded shadow-sm transition">
        Volver al inicio
    </a>
</div>
@endsection
