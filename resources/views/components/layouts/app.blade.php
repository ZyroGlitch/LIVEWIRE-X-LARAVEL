<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'LARAVEL LIVEWIRE' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="icon" href="assets/livewire.png">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- BOOTSTRAP ICON CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetJsAlert2 CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: "Montserrat", sans-serif;
            padding: 0;
            margin: 0;
            height: 100%;
        }

        .nav-link {
            color: white;
        }

        .logout {
            color: white;
        }

        .nav-link:hover {
            color: lightgray;
        }

        .logout:hover {
            color: lightgrey;
        }

        .current {
            color: lightcoral;
        }

        .links {
            color: white;
        }

        .links:hover {
            color: lightblue;
        }
    </style>
</head>

<body>
    @if (request()->is('product'))
        @include('customer-navbar.app')
    @endif

    @if (request()->is('orders'))
        @include('customer-navbar.app')
    @endif

    @if (request()->is('customer'))
        @include('customer-navbar.app')
    @endif

    {{ $slot }}
</body>

</html>
