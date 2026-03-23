<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-background">

        <div>
            <a href="/">
                <h1 class="text-3xl font-bold text-primary">
                    SaborGestion
                </h1>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-surface border border-border shadow-md overflow-hidden sm:rounded-lg">

            <h2 class="text-2xl font-bold text-center text-primary mb-6">
                Recuperar Contraseña
            </h2>

            <div class="mb-4 text-sm text-muted text-center">
                Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-border focus:border-primary focus:ring-primary"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    
                    <a href="{{ route('login') }}"
                       class="text-sm text-muted hover:text-primary underline">
                        Volver al login
                    </a>

                    <x-primary-button class="bg-primary hover:bg-secondary text-white">
                        Enviar enlace
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
