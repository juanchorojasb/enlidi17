<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Panel - Enlidi')</title>
    <link href="//fonts.googleapis.com/css2?family=Figtree:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>

<body class="bg-white font-sans">
    <div class="flex flex-col min-h-screen">
        <x-admin-header />

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 mt-4 flex-grow">
            @yield('content')
        </div>

        <x-admin-footer />
    </div>

    <script src="{{ asset('admin1/js/main.js') }}"></script>
    @vite('resources/js/app.js')
</body>
</html>