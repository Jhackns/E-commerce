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
                <h2 class="text-2xl font-bold mb-2">Sign up to your account</h2>
                <p class="text-zinc-600 mb-6">Greetings on your return! We kindly request you to enter your details.</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div>
                        <label for="email" class="block text-zinc-700 mb-2" value="USUARIO" >USUARIO</label>
                        <x-input id="email" class="w-full px-3 py-2 border rounded-lg" type="email" name="email"
                            :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <div class="mt-4">
                        <label for="password" class="block text-zinc-700 mb-2" value="PASSWORD" >PASSWORD</label>
                        <x-input id="password" class="w-full px-3 py-2 border rounded-lg" type="password"
                            name="password" required autocomplete="current-password" />
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <button type="submit"
                            class="w-full bg-orange-500 text-white py-2 rounded-lg mb-4 hover:shadow-lg transition duration-300">
                            {{ __('Log in') }}
                        </button>
                    </div>
                </form>
                <p class="text-center text-zinc-600">Already have an account? <a href="#"
                        class="text-red-500">Sign
                        in</a></p>
            </div>
        </div>

</x-guest-layout>
