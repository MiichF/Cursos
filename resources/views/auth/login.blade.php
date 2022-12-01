
<x-guest-layout>
    <x-jet-authentication-card class="bg-red-400">
        <x-slot name="logo">
        <a href="/" class="flex flex-shrink-0 items-center text-Black font-big">
          <img class="block h-12 w-auto " src="https://cdn-icons-png.flaticon.com/512/6106/6106505.png" alt="Your Company"> <b>Cour</b>line<b>free</b>
          <img class="hidden h-13 w-auto " src="https://cdn-icons-png.flaticon.com/512/6106/6106505.png" alt="Your Company"> 
        </a>


        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo Electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme ') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('¿Olividaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-red-400" >
                    {{ __('Ingresar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
