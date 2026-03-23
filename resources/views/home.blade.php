<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SaborGestion - Sistema de Gestión Gastronómica</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-text">

    <!-- Navbar -->
    <nav class="bg-surface border-b border-border shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <div class="flex items-center">
                <i class="fas fa-utensils text-3xl text-primary mr-3"></i>
                <h1 class="text-2xl font-bold text-primary">SaborGestion</h1>
            </div>

            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard/administrador') }}" class="btn-primary">
                            <i class="fas fa-tachometer-alt mr-2"></i> Panel
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-primary">
                            <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
                        </a>
                    @endauth
                @endif
            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-primary to-secondary text-white py-20">
        <div class="container mx-auto px-6 text-center">

            <h1 class="text-5xl font-bold mb-6">
                Bienvenido a SaborGestion
            </h1>

            <p class="text-xl mb-8 max-w-2xl mx-auto">
                El sistema integral de gestión para restaurantes que transforma tu negocio gastronómico
            </p>

            <a href="{{ route('login') }}"
               class="inline-block bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                <i class="fas fa-rocket mr-2"></i> Comenzar
            </a>

        </div>
    </section>

    <!-- Features -->
    <section class="py-16">
        <div class="container mx-auto px-6">

            <h2 class="text-3xl font-bold text-center text-primary mb-12">
                ¿Qué Ofrecemos?
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Card -->
                <div class="card text-center hover:-translate-y-1 transition">
                    <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-3">Inteligencia</h3>
                    <p class="text-muted">Dashboards por rol con datos reales</p>
                </div>

                <div class="card text-center hover:-translate-y-1 transition">
                    <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-boxes text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-3">Inventario</h3>
                    <p class="text-muted">Control de stock inteligente</p>
                </div>

                <div class="card text-center hover:-translate-y-1 transition">
                    <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clipboard-list text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-3">Pedidos</h3>
                    <p class="text-muted">Gestión rápida de comandas</p>
                </div>

                <div class="card text-center hover:-translate-y-1 transition">
                    <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-file-invoice-dollar text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-3">Facturación</h3>
                    <p class="text-muted">Control total de ventas</p>
                </div>

                <div class="card text-center hover:-translate-y-1 transition">
                    <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-3">Usuarios</h3>
                    <p class="text-muted">Roles y permisos completos</p>
                </div>

                <div class="card text-center hover:-translate-y-1 transition">
                    <div class="bg-primary text-white rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-simple text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-3">Reportes</h3>
                    <p class="text-muted">Análisis detallado del negocio</p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-primary py-16">
        <div class="container mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold text-white mb-6">
                ¿Listo para mejorar tu restaurante?
            </h2>

            <p class="text-lg text-white mb-8">
                Lleva tu negocio al siguiente nivel
            </p>

            <a href="{{ route('login') }}"
               class="inline-block bg-white text-primary px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                Iniciar Sesión
            </a>

        </div>
    </section>








    <!-- Footer -->
    <footer class="bg-text text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2026 SaborGestion</p>
            <p class="text-sm text-muted mt-2">Sistema de Gestión Gastronómica</p>
        </div>

        <!-- Authentication -->
        <form method="POST" class="container mx-auto px-6 text-center" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" style="text-align:center;"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </footer>

</body>
</html>