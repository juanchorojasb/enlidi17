<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Panel - Enlidi')</title>
    <link href="//fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin1/css/style.css') }}">
</head>

<body>
    <div class="header-bg">
        @include('layouts.partials.admin-navbar')
    </div>

    <div class="wraper">
        <section class="error-404">
            <div class="container">
               @yield('content')
            </div>
        </section>
    </div>

    <script src="{{ asset('admin1/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('admin1/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('admin1/js/main.js') }}"></script>
</body>

</html>