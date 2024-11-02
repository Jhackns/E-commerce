<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="font-sans antialiased">
    <!-- https://tailwindcomponents.com/component/dashboard-template/landing -->
    <div>
        <x-dialog />
        <div x-data="{ sidebarOpen: false, cartOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
            @livewire('dashboard.sidebar')
            <div class="flex flex-col flex-1 overflow-hidden">
                @livewire('dashboard.header')
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="py-8 mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>

            <!-- Botón para abrir el carrito -->
            <button @click="cartOpen = true" class="fixed bottom-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-full shadow-lg">
                <i class="fas fa-shopping-cart"></i> Ver Carrito
            </button>

            <!-- Panel del carrito -->
            <div x-show="cartOpen"
                 class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-xl z-50 overflow-y-auto"
                 @click.away="cartOpen = false">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-4">Carrito de Compras</h2>
                    @livewire('shopping-cart')
                    <button @click="cartOpen = false" class="mt-4 bg-red-500 text-white px-4 py-2 rounded w-full">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    @stack('modals')
    @stack('js')
    @stack('scripts')
    @livewireScripts
</body>

</html>
