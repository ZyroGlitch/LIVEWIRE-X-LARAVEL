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

    <link rel="icon" href="{{ asset('assets/livewire.png') }}">

    {{-- BOOTSTRAP SCRIPT TAG --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- BOOTSTRAP ICON CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- SweetJsAlert2 CDN --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: "Montserrat", sans-serif;
            padding: 0;
            margin: 0;
            height: 100%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            padding: 0;
            margin: 0;
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



        /* Sidebar styling */
        .wrapper {
            display: flex;
        }

        #sidebar {
            min-width: 250px;
            background: #7386D5;
            color: white;
            transition: all 0.3s;
        }

        #sidebar li {
            list-style-type: none;
        }

        #sidebar li a {
            text-decoration: none;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #content {
            width: 100%;
            min-height: 100vh;
        }

        /* Media query for smaller screens */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar {
                margin-left: 0;
            }

            #sidebarCollapse {
                display: none;
            }
        }

        #dashboardBtn,
        #userBtn,
        #signoutBtn {
            width: 100%;
            color: white;
            background: dark;
            font-size: 18px;
            font-weight: 600;
            padding: 0.5rem;
            border-radius: 10px;
        }

        #dashboardBtn:hover {
            color: black;
            background: lightgray;
        }

        #userBtn:hover {
            color: black;
            background: lightgray;
        }

        #signoutBtn:hover {
            color: black;
            background: lightgray;
        }

        /* Add transition effect for icon */
        #toggleIcon {
            transition: transform 0.3s ease;
        }

        #sidebar.active #toggleIcon {
            transform: rotate(90deg);
            /* Rotate the icon when the sidebar is active */
        }

        .admin-link {
            width: 100%;
            color: white;
            background: dark;
            font-size: 18px;
            font-weight: 600;
            padding: 0.5rem;
            border-radius: 10px;
        }

        .admin-link:hover {
            color: black;
            background: lightgray;
        }


        .admin-current {
            color: black;
            background: lightgray;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            padding: 25px;
            gap: 25px;
            /* 3 equal columns */
        }
    </style>
</head>

<body>
    @if (request()->is('product') ||
            request()->is('orders') ||
            request()->is('customer') ||
            request()->is('product/view') ||
            request()->is('product/payment'))
        @include('customer-navbar.app')
    @endif

    {{ $slot }}



    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    text: '{{ session('message') }}',
                });
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    text: '{{ session('message') }}',
                });
            });
        </script>
    @endif


    <!-- Script to toggle sidebar -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the sidebar collapse button
            const sidebarCollapse = document.getElementById('sidebarCollapse');
            // Get the sidebar element
            const sidebar = document.getElementById('sidebar');
            // Get the toggle icon
            const toggleIcon = document.getElementById('toggleIcon');

            // Add click event listener to toggle the sidebar
            sidebarCollapse.addEventListener('click', function() {
                // Toggle 'active' class on the sidebar
                sidebar.classList.toggle('active');

                // Change icon based on sidebar state
                if (sidebar.classList.contains('active')) {
                    toggleIcon.classList.remove('bi-list');
                    toggleIcon.classList.add('bi-x');
                } else {
                    toggleIcon.classList.remove('bi-x');
                    toggleIcon.classList.add('bi-list');
                }
            });
        });


        document.addEventListener('clear-file-input', function() {
            document.querySelector('#product-name').value = null;
        });
    </script>
</body>

</html>
