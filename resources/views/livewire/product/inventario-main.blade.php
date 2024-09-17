<div class="py-5">
    <div class="bg-white max-w-8xl mx-auto shadow rounded-lg p-4 sm:p-6 xl:p-8 lg:px-7">
        <div class="mb-4 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Inventario de Productos</h3>
                <span class="text-base font-normal text-gray-500">Actualizar el stock de los productos</span>
            </div>
            <div class="flex-shrink-0">
                <x-button href="{{ route('Productpdf') }}" icon="document" target="_blank" label="PDF" gray />
         </div>
        </div>
        <div class="flex item-center justify-between gap-4 mb-2">
            <div class="flex gap-5">
                <x-input icon="search" class="px-4 w-80" placeholder="Buscar registro" wire:model.live="search" />
                <x-native-select wire:model.live="b_cat">
                    <option value="">Seleccione una opción</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-native-select>
            </div>

        </div>
        <div class="flex flex-col mt-8">

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            NAME</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            STOCK</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            NUEVO STOCK</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            DESCUENTO %</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            PRECIO INICIAL</th>
                        <th scope="col"
                            class="py-3 pl-4 pr-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
                            PRECIO FINAL</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($productos as $item)
                        <tr>
                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                {{ $item->name }}
                            </td>
                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                {{ $item->stock }}
                            </td>
                            <td>
                                <input type="number" wire:model="newStock.{{ $item->id }}"
                                    class="mr-2 px-2 py-1 w-20 border border-gray-300 rounded focus:ring focus:ring-opacity-50 focus:ring-orange-500"
                                    placeholder="0">
                                <button wire:click="updateStock({{ $item->id }})"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </td>
                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                <input type="number" step="1.00" wire:model="discount.{{ $item->id }}"
                                    class="mr-2 px-2 py-1 w-20 border border-gray-300 rounded focus:ring focus:ring-opacity-50 focus:ring-orange-500">
                                <button wire:click="updateDiscount({{ $item->id }})"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-orange-600 hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </td>
                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                               $.{{ $item->price }}
                            </td>
                            <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-500">
                                $.{{ $this->calculateDiscountedPrice($item->id) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

</div>
