<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Incluir Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-white">
    <div class="min-h-screen flex flex-col">
        {{-- Aquí puedes incluir un componente para el header público, si lo necesitas --}}
        <x-public-header />

        <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow">
            @yield('content')
        </main>

        {{-- Incluye un componente de footer si lo deseas --}}
        <x-footer />
    </div>
</body>
</html>