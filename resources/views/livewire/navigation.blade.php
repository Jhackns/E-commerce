<nav class="bg-gradient-to-br from-yellow-800 via-purple-700 to-yellow-500 shadow-2xl">
    <div class="container mx-auto px-4 py-2 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <a href="#" class="text-2xl font-bold text-white dark:text-white" onclick="location.reload();">
                <img src="{{ asset('img/logo.png') }}" alt="" width="150" height="150">
            </a>
            {{-- @livewire('category-livewire') --}}
            <div class="relative">
                <nav class="flex items-center space-x-4">
                    <a class="text-white flex px-4 py-2 hover:scale-110 transition duration-300 ease-in-out"
                    href="{{route('index')}}">INICIO</a>
                    <a class="text-white flex px-4 py-2 hover:scale-110 transition duration-300 ease-in-out"
                    href="{{route('tienda')}}">TIENDA</a>
                    <a class="text-white flex px-4 py-2 hover:scale-110 transition duration-300 ease-in-out"
                    href="">BLOG</a>
                    <a class="text-white flex px-4 py-2 hover:scale-110 transition duration-300 ease-in-out"
                    href="">CONTACTO</a>

                </nav>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-yellow-400 focus:outline-none focus-visible:ring-[#FF2D20]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-yellow-400 focus:outline-none focus-visible:ring-[#FF2D20]">
                        <b>Login</b>
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-yellow-400 focus:outline-none focus-visible:ring-[#FF2D20]">
                            <b>Register</b>
                        </a>
                    @endif
                @endauth

            @endif

            {{-- <a href="/login" class="flex items-center text-white dark:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
          <span class="ml-1">Entrar</span>
        </a> --}}
            <a href="#" class="flex items-center text-white dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <span class="ml-1">Favoritos</span>
            </a>
            <a href="{{ url('carrito') }}"
                class="flex items-center text-yellow-300 dark:text-white hover:scale-110 transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 hover:stroke-white hover:stroke-width-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>

                <span class="ml-1">0</span>
            </a>
        </div>
    </div>


</nav>
