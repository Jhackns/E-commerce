<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <div class="bg-gradient-to-br from-yellow-800 via-purple-600 to-yellow-500">

        <title>store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @wireUiScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
</head>

<body class="antialiased">
    <div class="sticky top-0 z-50">
        @livewire('navigation')
    </div>
    <div
        class="relative sm:flex sm:justify-center sm:items-center  bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        <div class="shadow-black  overflow-x-hidden overflow-y-auto bg-zinc-800">
            {{-- <div class="max-w-7xl mx-auto p-6 lg:p-8"> --}}
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('modals')
    @livewireScripts
</body>

</html>
