<x-index-layout>
    <div class="w-full mx-auto">
        <div id="default-carousel" class="relative" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="overflow-hidden relative w-full h-80 sm:h-96 xl:h-[30rem] 2xl:h-[40rem] rounded-lg">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/car2.jpeg" class="block w-full h-full object-cover" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/car3.jpg" class="block w-full h-full object-cover" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img/car2.jpeg" class="block w-full h-full object-cover" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-100" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button"
                class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-100" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nextButton = document.querySelector('[data-carousel-next]');

            function clickNextButton() {
                nextButton.click();
            }

            setInterval(clickNextButton, 4000);
        });
    </script>

    {{-- Fin Carrousel --}}

    {{-- Publicidad --}}
    <div
        class="flex flex-col md:flex-row items-center bg-zinc-900 dark:bg-zinc-900 p-6 shadow-xl shadow-purple-500 shadow-opacity-75">
        <div class="md:w-1/2 text-center md:text-left">
            <div class="bg-red-500 text-white inline-block px-3 py-1 rounded-full text-sm mb-4">Mejores precios</div>
            <h1 class="text-3xl md:text-4xl font-bold text-white dark:text-white mb-4">Súper precios en tus artículos
                favoritos</h1>
            <p class="text-zinc-100 dark:text-zinc-300 mb-6">Gana más por tu dinero</p>
            <a href="{{ url('tienda') }}" class="bg-purple-600 text-white px-6 py-3 rounded-full text-lg">Comprar
                ahora</a>
        </div>
        <div class="md:w-1/2 mt-6 md:mt-0 ">
            <video src="vid/vid1.mp4" class="rounded-lg shadow-lg" autoplay muted loop></video>
            <!-- <img src="img/car1.jpg" alt="Promotional Image" class="rounded-lg shadow-lg"> -->
        </div>
    </div>


    {{-- Productos recientes --}}
    <div>
        <div class="p-8 text-white">
            <h2 class="text-2xl font-bold text-center mb-8 dark:text-white animate-pulse"
                style="text-shadow: 0 0 5px #a855f7, 0 0 15px #a855f7, 0 0 20px #a855f7; filter: brightness(1.5);">
                PRODUCTOS RECIENTES</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto px-4">
                @foreach ($products as $product)
                    <div
                        class="border rounded-lg p-6 bg-purple-100 shadow-xl shadow-purple-300 shadow-opacity-75 relative">
                        <span class="bg-red-500 text-white px-2 py-1 text-xs font-bold animate-pulse"
                            style="text-shadow: 0 0 5px #ef4444, 0 0 15px #ef4444, 0 0 20px #ef4444; filter: brightness(1.5);">OFERTA</span>
                        <img src="{{ Storage::url($product->image->url) }}" alt=""
                            class="w-full h-48 object-contain my-6">
                        <p class="text-zinc-700 dark:text-zinc-300">{{ $product->description }}</p>
                        <div class="mt-6">
                            @if ($product->discount > 0)
                                <p class="line-through text-sm text-red-500">S/ {{ $product->price }}</p>
                            @endif
                            <p class="font-bold text-black">S/
                                {{ number_format($product->price - ($product->discount / 100) * $product->price, 2) }}
                            </p>
                        </div>
                        @auth
                            <div class="absolute top-2 left-2">
                                @can('Editar productos')
                                    <x-button
                                        onclick="Livewire.emit('openModal','admin.product-create',{{ json_encode(['product' => $product]) }})"><i
                                            class="fas fa-edit"></i></x-jet-button>
                                    @endcan
                                    @can('Eliminar productos')
                                        <x-danger-button wire:click="$emit('deleteItem',{{ $product->id }})"><i
                                                class="fas fa-trash"></i></x-jet-danger-button>
                                        @endcan
                            </div>
                        @endauth
                        <button wire:click="agregarProducto({{ $product->id }})" x-data="{}"
                            x-on:click="
                            $wire.call('agregarProducto', {{ $product->id }})
                            .then(() => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Producto agregado',
                                    text: 'El producto se ha agregado correctamente al carrito',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            })
                        "
                            class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-400 text-sm w-full mt-6">
                            <i class="fa-solid fa-cart-arrow-down text-yellow-400"></i> Agregar
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ url('tienda') }}">
                    <button class="bg-purple-500 text-white hover:text-yellow-400 py-2 px-6 rounded-full">Ver
                        Más</button>
                </a>
            </div>
        </div>
        <div class="mt-2">{{$products->links()}}</div>
    </div>



    {{-- Categorias --}}
    <div class="container mx-auto py-8">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach ($categories as $category)
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 rounded-full bg-zinc-200 flex items-center justify-center">
                        <img src="{{ Storage::url($category->image->url) }}" alt="" class="rounded-full">
                    </div>
                    <p class="mt-2 text-center text-white">{{ $category->name }}</p>
                </div>
            @endforeach

            <div class="flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-zinc-200 flex items-center justify-center">
                    <img src="img/4.jpg" alt="T.V. y cine en casa" class="rounded-full" />
                </div>
                <p class="mt-2 text-center text-white">T.V. y cine en casa</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-zinc-200 flex items-center justify-center">
                    <img src="img/2.jpg" alt="Tecnología portátil" class="rounded-full" />
                </div>
                <p class="mt-2 text-center text-white">Tecnología portátil</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-zinc-200 flex items-center justify-center">
                    <img src="img/5.jpg" alt="Bocinas" class="rounded-full" />
                </div>
                <p class="mt-2 text-center text-white">Bocinas</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-24 h-24 rounded-full bg-zinc-200 flex items-center justify-center">
                    <img src="img/6.jpg" alt="Audífonos" class="rounded-full" />
                </div>
                <p class="mt-2 text-center text-white">Audífonos</p>
            </div>
        </div>
    </div>

    {{-- Mesaz de ayuda --}}
    <div class="flex flex-col md:flex-row items-center bg-zinc-900 text-white">
        <div class="p-8 md:w-1/2">
            <h2 class="text-2xl font-bold mb-4">¿Buscas ayuda? Ve a la página de Ayuda</h2>
            <p class="mb-6">
                Párrafo. Haz clic aquí para agregar tu texto y editar. Permite que tus usuarios te conozcan.
            </p>
            <a href="#" class="bg-purple-600 text-white py-2 px-4 rounded-full">Ir al Centro de ayuda</a>
        </div>
        <div class="md:w-1/2">
            <img src="img/tecnologia.jpg" alt="Help Center Image" class="w-full h-auto object-cover" />
        </div>
    </div>

    {{-- Footer --}}
    <footer
        class="bg-zinc-100 dark:bg-zinc-800 text-white dark:text-zinc-300 p-8 bg-gradient-to-br from-purple-900 to-purple-800">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="font-semibold mb-4">Ubicación de tienda</h3>
                <p>Av. Fray A. Alcalde 10<br />44100, Guada., Jal., México</p>
                <p>info@mistio.com<br />+52-1-33-12345678</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#"><img src="https://placehold.co/20x20" alt="Facebook" /></a>
                    <a href="#"><img src="https://placehold.co/20x20" alt="Instagram" /></a>
                    <a href="#"><img src="https://placehold.co/20x20" alt="Twitter" /></a>
                    <a href="#"><img src="https://placehold.co/20x20" alt="YouTube" /></a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold mb-4">Tienda</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Comprar todo</a></li>
                    <li><a href="#" class="hover:underline">Computadoras</a></li>
                    <li><a href="#" class="hover:underline">Tabletas</a></li>
                    <li><a href="#" class="hover:underline">Drones y cámaras</a></li>
                    <li><a href="#" class="hover:underline">Audio</a></li>
                    <li><a href="#" class="hover:underline">Celulares</a></li>
                    <li><a href="#" class="hover:underline">T.V. y cine en casa</a></li>
                    <li><a href="#" class="hover:underline">Tecnología portátil</a></li>
                    <li><a href="#" class="hover:underline">Oferta</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold mb-4">Atención al cliente</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Contáctanos</a></li>
                    <li><a href="#" class="hover:underline">Asistencia</a></li>
                    <li><a href="#" class="hover:underline">Acerca de</a></li>
                    <li><a href="#" class="hover:underline">Empleos</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold mb-4">Política</h3>
                <ul>
                    <li><a href="#" class="hover:underline">Envío y devoluciones</a></li>
                    <li><a href="#" class="hover:underline">Términos y condiciones</a></li>
                    <li><a href="#" class="hover:underline">Métodos de pago</a></li>
                    <li><a href="#" class="hover:underline">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-zinc-300 dark:border-zinc-700 mt-8 pt-8 text-center">
            <p class="mb-4">Aceptamos los siguientes métodos de pago</p>
            <div class="flex justify-center space-x-4 mb-4">
                <img src="https://placehold.co/40x20" alt="Visa" />
                <img src="https://placehold.co/40x20" alt="Mastercard" />
                <img src="https://placehold.co/40x20" alt="American Express" />
                <img src="https://placehold.co/40x20" alt="Discover" />
                <img src="https://placehold.co/40x20" alt="PayPal" />
            </div>
            <p class="text-sm">
                &copy; 2035 Creado por Jhackns
            </p>
        </div>
    </footer>
</x-index-layout>
