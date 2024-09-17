<x-index-layout>
    <div class="bg-white">
        <!-- Contenido principal -->
        <div class="flex w-full flex-1 ">
            <!-- Barra lateral de categorías -->
            <div class="flex  bg-gray-100 overflow-y-auto">
                <aside class="w-64 bg-gray-100 p-6 overflow-y-auto">
                    <h2 class="text-xl font-bold mb-6 text-gray-800 text-center">Categorías</h2>
                     <ul class="space-y-4">
                        <li class="flex items-center hover:border-l-4 hover:border-l-indigo-600 pl-2">
                            <input wire:model.live="sendCategory" type="radio" id="todo" name="category" value="0"
                                   class="mr-2 h-4 w-4 appearance-none rounded-full border border-neutral-300 checked:border-indigo-600 checked:bg-indigo-600">
                            <label for="todo"
                                   class="cursor-pointer flex items-center px-6 py-2 mt-4 text-gray-400 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                                Todo
                            </label>
                        </li>
                        @foreach ($categories as $category)
                            <li class="flex items-center hover:border-l-4 hover:border-l-indigo-600 pl-2">
                                <input wire:model.live="sendCategory" type="radio" id="{{ $category->name }}" name="category" value="{{ $category->id }}"
                                       class="mr-2 h-4 w-4 appearance-none rounded-full border border-neutral-300 checked:border-indigo-600 checked:bg-indigo-600">
                                <label for="{{ $category->name }}"
                                       class="cursor-pointer flex items-center px-6 py-2 mt-4 text-gray-400 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
                                    {{ $category->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>


                    {{-- <x-native-select wire:model.live="b_cat">
                        <option value="">seleccione una opcion</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-native-select>
                    {{ $b_cat }} --}}

                </aside>
            </div>


            <!-- Sección de productos -->
            <main class="flex-1 p-3 overflow-y-auto">
                <h1 class="text-3xl font-bold mb-3">Productos</h1>
                <div class="flex items-end py-8 gap-4">
                    <div class="flex-grow">
                        <x-input icon="search" class="w-full" placeholder="Buscar registro" wire:model.live="search" />
                    </div>
                    <label class="flex items-center px-6 py-2 mt-4 text-gray-400">Select status</label>
                    <div class="flex flex-col items-start mx-8">

                        <x-native-select class="w-48 text-gray-400" placeholder="Select one status" :options="['Active', 'Pending', 'Stuck', 'Done']" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <!-- Producto 1 -->
                    @foreach ($products as $product)
                        <div class="border rounded-lg p-4  bg-purple-100 shadow-xl shadow-purple-300 shadow-opacity-75">
                            <span class="bg-red-500 text-white px-2 py-1 text-xs font-bold">OFERTA</span>
                            <img src="{{ Storage::url($product->image->url) }}" alt=""
                                class="w-full h-48 object-contain my-4">
                            <p class="text-zinc-700 dark:text-zinc-300">{{ $product->description }}</p>
                            <p class="text-red-500 line-through">{{ $product->price }}</p>
                            <p class="text-purple-500">$984.00</p>
                        </div>
                    @endforeach

                </div>
            </main>
        </div>
    </div>

</x-index-layout>
