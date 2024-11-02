<nav class="bg-gradient-to-br from-yellow-800 via-purple-700 to-yellow-500 shadow-2xl fixed top-0 left-0 right-0 z-50">
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
            <div x-data="{open:false}" class="relative text-gray-300 hover:bg-gray-700 hover:text-white rounded-md pl-4 pr-8 py-2">
                <div x-on:click="open=!open" class="relative cursor-pointer">
                    <button type="button" class="text-gray-400 ">
                    <span class="sr-only">ShoppingCart</span>
                    <i class="fa-solid fa-cart-shopping text-2xl"></i>
                    </button>
                    <div class="bg-indigo-600 w-8 h-8 rounded-full flex justify-center items-center bg-opacity-50 absolute top-1 left-6">
                        <p class="text-gray-300 text-xl font-bold">{{$totalCart}}</p>
                    </div>
                </div>
                <div x-show="open">
                    @livewire('shoppingcar')
                </div>
            </div>
        </div>
    </div>


</nav>
