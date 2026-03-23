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
                Iniciar Sesión
            </h2>
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input id="email" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary"
                        type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" value="Contraseña" />
                    <x-text-input id="password" class="block mt-1 w-full border-border focus:border-primary focus:ring-primary"
                        type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember -->
                <div class="block mt-4">
                    <label class="inline-flex items-center">
                        <input type="checkbox"
                               class="rounded border-border text-primary shadow-sm focus:ring-primary"
                               name="remember">
                        <span class="ms-2 text-sm text-muted">
                            Recordarme
                        </span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-muted hover:text-primary"
                           href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-primary hover:bg-secondary text-white">
                        Iniciar Sesión
                    </x-primary-button>
                </div>

                <div class="mt-6 text-center text-sm text-muted">
                    <p>Credenciales de prueba:</p>
                    <p class="text-xs">admin@saborgestion.com / password</p>
                    <p class="text-xs">mesero@saborgestion.com / password</p>
                    <p class="text-xs">cocinero@saborgestion.com / password</p>
                    <p class="text-xs">cajero@saborgestion.com / password</p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>