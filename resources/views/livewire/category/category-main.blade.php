<div class="py-5">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            categorias
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 mb-2">
            <x-input icon="search" placeholder="Buscar registro" wire:model.live="search" />
            <x-button wire:click="create()" spinner="create" icon="plus" primary label="Nuevo" />
            @if ($isOpen)
                @include('livewire.category.category-create')
            @endif
        </div>

        <!--Tabla lista de categorias   -->
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-indigo-500 text-white">
                    <tr class="text-left text-xs font-bold  uppercase">
                        <td scope="col" class="px-6 py-3">ID</td>
                        <td scope="col" class="px-6 py-3">name</td>
                        <td scope="col" class="px-6 py-3">description</td>
                        <td scope="col" class="px-6 py-3">imagen</td>
                        <td scope="col" class="px-6 py-3 text-center">Opciones</td>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($categorias as $categoria)
                        <tr class="text-sm font-medium text-gray-900">
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                                    {{ $categoria->id }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $categoria->name }}</td>
                            <td class="px-6 py-4">{{ $categoria->description }}</td>
                            <td class="px-6 py-4">
                                @if ($categoria->image && $categoria->image->exists())
                                    <img src="{{ Storage::url($categoria->image->url) }}" alt="" width="30%">
                                @else
                                    <p>Sin imagen</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-button.circle wire:click="edit({{ $categoria }})" primary icon="pencil" />
                                <x-button.circle negative icon="x"
                                    x-on:confirm="{
                        title: 'Seguro que deseas eliminar?',
                        icon: 'error',
                        method: 'destroy',
                        params: {{ $categoria }}
                    }" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (!$categorias->count())
            <p class="dark:text-gray-200">No existe ningun registro conincidente</p>
        @endif
        @if ($categorias->hasPages())
            <div class="px-6 py-3">
                {{ $categorias->links() }}
            </div>
        @endif

    </div>
</div>
</div>
