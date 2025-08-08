<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name') . ' Admin')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('powergrid')
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('layouts.partials.navbar')

    <div class="flex flex-1 pt-14">
        @include('layouts.partials.sidebar')

        <main id="main-content" class="flex-1 px-4 py-6 transition-all duration-300 ml-0 lg:ml-60">
            @hasSection('breadcrumbs')
                <div class="mb-4">
                    @yield('breadcrumbs')
                </div>
            @endif

            <div class="bg-white rounded-lg shadow p-6">
                @yield('content')
            </div>
        </main>
    </div>

    @include('layouts.partials.footer')

    @stack('scripts')
    @livewireScripts
    <script>
        const toggleBtn = document.getElementById('sidebarToggle');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', () => {
                const sidebar = document.getElementById('sidebar');
                const main = document.getElementById('main-content');
                sidebar.classList.toggle('-translate-x-full');
                main.classList.toggle('lg:ml-60');
            });
        }
    </script>
</body>
</html>
