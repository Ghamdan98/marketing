<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>

        @yield('title', 'Admin Dashboard')

    </title>

    <!-- Google Font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Admin CSS -->

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>

    <div class="admin-layout">

        {{-- Overlay --}}
        <div class="sidebar-overlay"></div>

        {{-- Sidebar --}}
        @include('admin.dashboard.sidebar')

        <div class="admin-main">

            {{-- Topbar --}}
            @include('admin.dashboard.topbar')

            {{-- Content --}}
            <main class="admin-content">

                @yield('content')

            </main>

        </div>

    </div>

    @stack('scripts')

    <script>
        const sidebar = document.querySelector('.sidebar');

        const overlay = document.querySelector('.sidebar-overlay');

        const toggle = document.querySelector('.menu-toggle');

        toggle.addEventListener('click', () => {

            sidebar.classList.toggle('show');

            overlay.classList.toggle('show');

        });

        overlay.addEventListener('click', () => {

            sidebar.classList.remove('show');

            overlay.classList.remove('show');

        });
    </script>

</body>

</html>
