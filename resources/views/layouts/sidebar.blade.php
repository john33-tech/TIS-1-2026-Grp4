@php
    $user = Auth::user();
    $role = $user->role;
@endphp

<aside x-data="{ 
    sidebarOpen: localStorage.getItem('sidebarOpen') !== 'false',
    openSections: {
        inteligencia: true,
        catalogo: true,
        mesas: true,
        operaciones: true,
        administracion: true
    }
}" 
       :class="sidebarOpen ? 'w-72' : 'w-20'" 
       class="bg-primary text-white shadow-xl transition-all duration-300 ease-in-out flex flex-col h-screen sticky top-0"
       :style="sidebarOpen ? 'min-width: 288px' : 'min-width: 80px'">
    
    <!-- Logo compacto -->
    <div class="p-5 border-b border-white/10 flex items-center justify-between">
        <div class="flex items-center gap-3 overflow-hidden">
            <div class="flex-shrink-0">
                <i class="fas fa-utensils text-2xl text-white"></i>
            </div>
            <div x-show="sidebarOpen" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 transform -translate-x-4"
                 x-transition:enter-end="opacity-100 transform translate-x-0"
                 class="whitespace-nowrap">
                <h1 class="text-xl font-bold text-white">SaborGestion</h1>
                <p class="text-xs text-white/70">Sistema de Gestión</p>
            </div>
        </div>
        
        <!-- Botón toggle para escritorio -->
        <button @click="sidebarOpen = !sidebarOpen; localStorage.setItem('sidebarOpen', sidebarOpen)" 
                class="hidden lg:block p-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-white/50 focus:ring-offset-2 focus:ring-offset-primary group">
            <i x-show="sidebarOpen" 
               class="fas fa-chevron-left text-white/70 group-hover:text-white transition-colors text-lg"
               style="display: none"></i>
            <i x-show="!sidebarOpen" 
               class="fas fa-chevron-right text-white/70 group-hover:text-white transition-colors text-lg"
               style="display: none"></i>
        </button>
    </div>

    <!-- Navegación principal -->
    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-6 px-3 custom-scrollbar">
        <div class="space-y-1">
            
            <!-- Inteligencia de Negocios -->
            @if(in_array($role, ['admin', 'mesero', 'cocinero', 'cajero']))
            <div x-data="{ open: $store.sidebar.openSections.inteligencia }" class="mb-1">
                <button @click="open = !open; $store.sidebar.openSections.inteligencia = open" 
                        class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg transition-all duration-200 hover:bg-white/10 group">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-chart-line text-white/80 text-lg w-5 group-hover:text-white transition-colors"></i>
                        <span x-show="sidebarOpen" 
                              x-transition.duration.200 
                              class="text-sm font-medium text-white/80 group-hover:text-white whitespace-nowrap">
                            Inteligencia de Negocios
                        </span>
                    </div>
                    <i x-show="sidebarOpen" 
                       :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" 
                       class="fas text-xs text-white/50 transition-transform duration-200"></i>
                </button>
                
                <div x-show="open" 
                     x-collapse
                     class="ml-10 mt-1 space-y-1">
                    @if($role == 'admin')
                        <a href="{{ route('dashboard.administrador') }}" 
                           class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                            <i class="fas fa-chart-pie text-xs w-4"></i>
                            <span x-show="sidebarOpen" class="whitespace-nowrap">Dashboard Admin</span>
                        </a>
                    @endif
                    @if($role == 'mesero')
                        <a href="{{ route('dashboard.mesero') }}" 
                           class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                            <i class="fas fa-chart-simple text-xs w-4"></i>
                            <span x-show="sidebarOpen" class="whitespace-nowrap">Dashboard Mesero</span>
                        </a>
                    @endif
                    @if($role == 'cocinero')
                        <a href="{{ route('dashboard.cocinero') }}" 
                           class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                            <i class="fas fa-chart-line text-xs w-4"></i>
                            <span x-show="sidebarOpen" class="whitespace-nowrap">Dashboard Cocinero</span>
                        </a>
                    @endif
                    @if($role == 'cajero')
                        <a href="{{ route('dashboard.cajero') }}" 
                           class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                            <i class="fas fa-chart-bar text-xs w-4"></i>
                            <span x-show="sidebarOpen" class="whitespace-nowrap">Dashboard Cajero</span>
                        </a>
                    @endif
                </div>
            </div>
            @endif

            <!-- Catálogo y Menú -->
            @if(in_array($role, ['admin', 'cocinero']))
            <div x-data="{ open: $store.sidebar.openSections.catalogo }" class="mb-1">
                <button @click="open = !open; $store.sidebar.openSections.catalogo = open" 
                        class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg transition-all duration-200 hover:bg-white/10 group">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-book-open text-white/80 text-lg w-5 group-hover:text-white transition-colors"></i>
                        <span x-show="sidebarOpen" 
                              x-transition.duration.200 
                              class="text-sm font-medium text-white/80 group-hover:text-white whitespace-nowrap">
                            Catálogo y Menú
                        </span>
                    </div>
                    <i x-show="sidebarOpen" 
                       :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" 
                       class="fas text-xs text-white/50 transition-transform duration-200"></i>
                </button>
                
                <div x-show="open" 
                     x-collapse
                     class="ml-10 mt-1 space-y-1">
                    <a href="{{ route('productos.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-hamburger text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Productos</span>
                    </a>
                    <a style="display:none" href="{{ route('inventario.index') }}" 
                       class="flex items-center justify-between px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-boxes text-xs w-4"></i>
                            <span x-show="sidebarOpen" class="whitespace-nowrap">Inventario</span>
                        </div>
                        @php
                            try {
                                $stockBajo = \App\Models\Inventario::whereRaw('cantidad <= stock_minimo')->count();
                            } catch (\Exception $e) {
                                $stockBajo = 0;
                            }
                        @endphp
                        @if($stockBajo > 0)
                            <span x-show="sidebarOpen" 
                                  class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-pulse">
                                {{ $stockBajo }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
            @endif

            <!-- Mesas -->
            @if(in_array($role, ['admin', 'mesero']))
            <div x-data="{ open: $store.sidebar.openSections.mesas }" class="mb-1">
                <button @click="open = !open; $store.sidebar.openSections.mesas = open" 
                        class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg transition-all duration-200 hover:bg-white/10 group">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-chair text-white/80 text-lg w-5 group-hover:text-white transition-colors"></i>
                        <span x-show="sidebarOpen" 
                              x-transition.duration.200 
                              class="text-sm font-medium text-white/80 group-hover:text-white whitespace-nowrap">
                            Gestión de Mesas
                        </span>
                    </div>
                    <i x-show="sidebarOpen" 
                       :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" 
                       class="fas text-xs text-white/50 transition-transform duration-200"></i>
                </button>
                
                <div x-show="open" 
                     x-collapse
                     class="ml-10 mt-1">
                    <a href="{{ route('mesas.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-table text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Mesas</span>
                    </a>
                </div>
            </div>
            @endif

            <!-- Operaciones (Pedidos + Facturación) -->
            @if(in_array($role, ['admin', 'cajero']))
            <div x-data="{ open: $store.sidebar.openSections.operaciones }" class="mb-1">
                <button @click="open = !open; $store.sidebar.openSections.operaciones = open" 
                        class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg transition-all duration-200 hover:bg-white/10 group">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-cash-register text-white/80 text-lg w-5 group-hover:text-white transition-colors"></i>
                        <span x-show="sidebarOpen" 
                              x-transition.duration.200 
                              class="text-sm font-medium text-white/80 group-hover:text-white whitespace-nowrap">
                            Operaciones
                        </span>
                    </div>
                    <i x-show="sidebarOpen" 
                       :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" 
                       class="fas text-xs text-white/50 transition-transform duration-200"></i>
                </button>
                
                <div x-show="open" 
                     x-collapse
                     class="ml-10 mt-1 space-y-1">
                    <a href="{{ route('pedidos.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-clipboard-list text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Pedidos</span>
                    </a>
                    <a href="{{ route('comandas.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-receipt text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Comandas</span>
                    </a>
                    <a href="{{ route('delivery.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-motorcycle text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Delivery</span>
                    </a>
                    
                    <div class="h-px bg-white/10 my-2"></div>
                    
                    <a href="{{ route('facturas.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-file-invoice text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Pre-factura</span>
                    </a>
                    <a href="{{ route('pagos.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-credit-card text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Pagos</span>
                    </a>
                    <a href="{{ route('cierres.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-cash-register text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Cierre de Caja</span>
                    </a>
                </div>
            </div>
            @endif

            <!-- Administración -->
            @if($role == 'admin')
            <div x-data="{ open: $store.sidebar.openSections.administracion }" class="mb-1">
                <button @click="open = !open; $store.sidebar.openSections.administracion = open" 
                        class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg transition-all duration-200 hover:bg-white/10 group">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-user-shield text-white/80 text-lg w-5 group-hover:text-white transition-colors"></i>
                        <span x-show="sidebarOpen" 
                              x-transition.duration.200 
                              class="text-sm font-medium text-white/80 group-hover:text-white whitespace-nowrap">
                            Administración
                        </span>
                    </div>
                    <i x-show="sidebarOpen" 
                       :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" 
                       class="fas text-xs text-white/50 transition-transform duration-200"></i>
                </button>
                
                <div x-show="open" 
                     x-collapse
                     class="ml-10 mt-1">
                    <a href="{{ route('usuarios.index') }}" 
                       class="flex items-center gap-3 px-4 py-2 text-sm rounded-lg text-white/70 hover:bg-white/10 hover:text-white transition-all duration-200 group">
                        <i class="fas fa-users text-xs w-4"></i>
                        <span x-show="sidebarOpen" class="whitespace-nowrap">Usuarios</span>
                    </a>
                </div>
            </div>
            @endif

        </div>
    </nav>
</aside>

<!-- Alpine.js Store para el estado del sidebar -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
            openSections: {
                inteligencia: true,
                catalogo: true,
                mesas: true,
                operaciones: true,
                administracion: true
            }
        })
    })
</script>

<!-- Estilos adicionales mejorados -->
<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 5px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }
    
    /* Mejoras en las transiciones */
    [x-cloak] {
        display: none !important;
    }
    
    /* Transición suave para el colapso */
    .x-collapse {
        transition: all 0.2s ease-out;
    }
</style>