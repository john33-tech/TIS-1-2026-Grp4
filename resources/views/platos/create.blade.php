{{-- resources/views/platos/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto" x-data="{ ingredientes: [] }">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-primary">Crear Nuevo Plato</h1>
        <a href="{{ route('platos.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i> Volver
        </a>
    </div>

    <div class="card">
        <form action="{{ route('platos.store') }}" method="POST" enctype="multipart/form-data" id="platoForm">
            @csrf
            
            <div class="space-y-6">
                <!-- Información básica -->
                <div>
                    <h2 class="text-xl font-semibold text-text mb-4">Información del Plato</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Nombre *</label>
                            <input type="text" name="nombre" required value="{{ old('nombre') }}" class="w-full px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary">
                            @error('nombre')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Precio *</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">$</span>
                                <input type="number" name="precio" step="0.01" required value="{{ old('precio') }}" class="w-full pl-8 pr-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary">
                            </div>
                            @error('precio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Categoría *</label>
                            <div class="flex gap-2">
                                <select name="categoria_id" required class="flex-1 px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary">
                                    <option value="">Seleccionar categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                <a href="{{ route('categorias.create') }}" 
                                   target="_blank" 
                                   class="btn-secondary px-4 inline-flex items-center justify-center">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <p class="text-xs text-muted mt-1">
                                <i class="fas fa-info-circle"></i> 
                                ¿No encuentras la categoría? 
                                <a href="{{ route('categorias.create') }}" target="_blank" class="text-primary">Créala aquí</a> 
                                y actualiza la página
                            </p>
                            @error('categoria_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-text mb-2">Imagen</label>
                            <input type="file" name="imagen" accept="image/*" class="w-full px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary">
                            @error('imagen')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-text mb-2">Descripción</label>
                            <textarea name="descripcion" rows="3" class="w-full px-4 py-2 rounded-lg border border-border focus:outline-none focus:border-primary">{{ old('descripcion') }}</textarea>
                        </div>
                        
                        <div>
                            <label class="flex items-center">
                                <input type="checkbox" name="disponible" value="1" {{ old('disponible', true) ? 'checked' : '' }} class="mr-2">
                                <span class="text-sm text-text">Disponible para la venta</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Ingredientes con Alpine.js -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-text">Ingredientes</h2>
                        <a href="{{ route('ingredientes.create') }}" 
                           target="_blank" 
                           class="btn-secondary text-sm inline-flex items-center justify-center">
                            <i class="fas fa-plus mr-1"></i> Nuevo Ingrediente
                        </a>
                    </div>
                    
                    <!-- Contenedor de ingredientes dinámicos -->
                    <div id="ingredientes-container" class="space-y-3">
                        <template x-for="(ingrediente, index) in ingredientes" :key="index">
                            <div class="flex gap-3 items-start border border-border rounded-lg p-3 bg-background">
                                <select :name="'ingredientes[' + index + '][id]'" 
                                        class="flex-1 px-4 py-2 rounded-lg border border-border"
                                        x-model="ingrediente.id"
                                        required>
                                    <option value="">Seleccionar ingrediente</option>
                                    @foreach($ingredientes as $ingrediente)
                                        <option value="{{ $ingrediente->id }}">
                                            {{ $ingrediente->nombre }} ({{ $ingrediente->unidad_medida }})
                                        </option>
                                    @endforeach
                                </select>
                                
                                <input type="number" 
                                       :name="'ingredientes[' + index + '][cantidad]'"
                                       x-model="ingrediente.cantidad"
                                       placeholder="Cantidad" 
                                       step="0.01" 
                                       required 
                                       class="w-32 px-4 py-2 rounded-lg border border-border">
                                
                                <button type="button" 
                                        @click="ingredientes.splice(index, 1)"
                                        class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </template>
                        
                        <!-- Mensaje cuando no hay ingredientes -->
                        <div x-show="ingredientes.length === 0" class="text-center text-muted py-4">
                            <i class="fas fa-info-circle"></i> No hay ingredientes agregados
                        </div>
                    </div>
                    
                    @if($ingredientes->count() > 0)
                        <button type="button" 
                                @click="ingredientes.push({ id: '', cantidad: '' })" 
                                class="mt-3 text-primary hover:text-secondary">
                            <i class="fas fa-plus-circle mr-1"></i> Agregar ingrediente
                        </button>
                    @else
                        <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <p class="text-yellow-800 text-sm">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                No hay ingredientes disponibles. 
                                <a href="{{ route('ingredientes.create') }}" target="_blank" class="font-semibold underline">Crea un ingrediente primero</a>
                            </p>
                        </div>
                    @endif
                    
                    <p class="text-xs text-muted mt-2">
                        <i class="fas fa-info-circle"></i> 
                        ¿No encuentras el ingrediente? 
                        <a href="{{ route('ingredientes.create') }}" target="_blank" class="text-primary">Créalo aquí</a> 
                        y actualiza la página
                    </p>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="submit" class="btn-primary px-6">
                        <i class="fas fa-save mr-2"></i> Guardar Plato
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Función para recargar cuando la ventana recupera el foco
    let ventanaRecargada = false;
    window.addEventListener('focus', function() {
        if (!ventanaRecargada && localStorage.getItem('recargarPlatos') === 'true') {
            localStorage.removeItem('recargarPlatos');
            ventanaRecargada = true;
            location.reload();
        }
    });
    
    // Marcar que se necesita recargar cuando se abre una nueva pestaña
    document.querySelectorAll('a[target="_blank"]').forEach(link => {
        link.addEventListener('click', () => {
            localStorage.setItem('recargarPlatos', 'true');
        });
    });
    
    // Cargar ingredientes existentes del old() si hay error de validación
    document.addEventListener('DOMContentLoaded', function() {
        @if(old('ingredientes'))
            const ingredientesExistentes = @json(old('ingredientes'));
            const alpineData = document.querySelector('[x-data]').__x.$data;
            ingredientesExistentes.forEach(ing => {
                alpineData.ingredientes.push({
                    id: ing.id,
                    cantidad: ing.cantidad
                });
            });
        @endif
    });
</script>
@endpush
@endsection