<x-guest-layout>

    <x-slot name="logo">
        <x-authentication-card-logo />
    </x-slot>

    <x-validation-errors class="mb-4" />

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-500 to-orange-500 p-4">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
            <h2 class="text-2xl font-bold mb-2">Crear cuenta</h2>
            <p class="text-zinc-600 mb-6">Por favor, ingresa tus datos para crear una cuenta.</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div>
                    <label for="name" class="block text-zinc-700 mb-2">Nombre</label>
                    <x-input id="name" class="w-full px-3 py-2 border rounded-lg" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <label for="email" class="block text-zinc-700 mb-2">Correo electrónico</label>
                    <x-input id="email" class="w-full px-3 py-2 border rounded-lg" type="email" name="email"
                        :value="old('email')" required autocomplete="email" />
                </div>

                <div class="mt-4">
                    <label for="password" class="block text-zinc-700 mb-2">Contraseña</label>
                    <x-input id="password" class="w-full px-3 py-2 border rounded-lg" type="password"
                        name="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <label for="password_confirmation" class="block text-zinc-700 mb-2">Confirmar contraseña</label>
                    <x-input id="password_confirmation" class="w-full px-3 py-2 border rounded-lg" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit"
                        class="w-full bg-orange-500 text-white py-2 rounded-lg mb-4 hover:shadow-lg transition duration-300">
                        {{ __('Crear cuenta') }}
                    </button>
                </div>
            </form>
            <p class="text-center text-zinc-600">Ya tienes una cuenta? <a href="{{ route('login') }}"
                    class="text-red-500">Iniciar sesión</a></p>
        </div>
    </div>

</x-guest-layout>
