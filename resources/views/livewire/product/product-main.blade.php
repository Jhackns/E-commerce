<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products
        </h2>
    </x-slot>
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-7">
        <div class="flex item-center justify-between gap-4 mb-2">
            <div class="flex gap-2">
                <x-input icon="search" class="px-25" placeholder="Buscar registro" wire:model.live="search" />
                <x-native-select wire:model.live="b_cat">
                    <option value="">seleccione una opcion</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-native-select>
                {{ $b_cat }}
            </div>
            <x-button wire:click="create()" spinner="create" icon="plus" primary label="Nuevo" />
            @if ($isOpen)
                @include('livewire.product.product-create')
            @endif

        </div>

        <div class="bg-gray-100 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">


            <!--Tabla lista de products   -->

            <ul class="grid grid-cols-1 xl:grid-cols-3 gap-y-10 gap-4 items-start p-8">
                @foreach ($products as $item)
                    <div id="app" class="bg-white w-128 h-60 rounded shadow-md flex card text-grey-darkest">

                        <div class="relative w-1/2  rounded-l-sm">
                            @if ($item->image && $item->image->exists())
                                <img src="{{ Storage::url($item->image->url) }}" class="w-full h-full rounded-l-sm">
                            @else
                                <p>Sin imagen</p>
                            @endif
                            <span
                                class="absolute -top-5 -left-4 m-2 w-12 h-12 bg-gray-100 text-slate-800 rounded-full flex items-center justify-center text-4xl text">
                                {{ $item->id }}
                            </span>
                        </div>
                        <div class="w-full flex flex-col">
                            <div class="p-4 pb-0 flex-1">
                                <h3 class="font-light mb-1 text-grey-darkest text-2xl">{{ $item->name }}</h3>
                                <div class="text-xs flex items-center mb-4">
                                    <i class="fas fa-wallet mr-1 text-grey-dark"></i>
                                    {{ $item->category->name }}
                                </div>
                                <span class="text-4xl text-grey-darkest">${{ $item->price }}<span class="text-3xl">
                                        .</span></span>
                                <div class="mb-1">
                                    <div class=" text-xs mb-2">
                                        <i class="fas fa-layer-group"></i>Stock: {{ $item->stock }}
                                    </div>
                                    <div class=" text-xs">
                                        <i class="fas fa-cubes"></i>{{ $item->description }}
                                    </div>
                                </div>
                            </div>
                            <div>
                                <ul class="px-6 py-2 text-right">
                                    <x-button.circle wire:click="edit({{ $item }})" primary icon="pencil" />
                                    <x-button.circle negative icon="x"
                                        x-on:confirm="{
                        title: 'Seguro que deseas eliminar?',
                        icon: 'error',
                        method: 'destroy',
                        params: {{ $item }}
                    }" />
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
            </tbody>
            </table>
        </div>
        @if (!$products->count())
            <p class="dark:text-gray-200">No existe ningun registro conincidente</p>
        @endif
        @if ($products->hasPages())
            <div class="px-6 py-3">
                {{ $products->links() }}
            </div>
        @endif

    </div>
</div>
