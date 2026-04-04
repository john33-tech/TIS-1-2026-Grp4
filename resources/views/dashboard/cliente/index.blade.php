{{-- resources/views/dashboard/cliente/index.blade.php --}}
@extends('layouts.app')

@section('content')

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mi Panel de Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-semibold">¡Bienvenido, {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">Esta es tu área personal como cliente de SaborGestion.</p>
                    
                    <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
                        <div class="p-4 bg-blue-50 rounded-lg">
                            <h4 class="font-semibold text-blue-800">Mis Reservas</h4>
                            <p class="text-sm text-gray-600">Gestiona tus reservas en el restaurante</p>
                            <a href="#" class="inline-block mt-2 text-sm text-blue-600 hover:text-blue-800">Ver reservas →</a>
                        </div>
                        <div class="p-4 bg-green-50 rounded-lg">
                            <h4 class="font-semibold text-green-800">Mis Pedidos</h4>
                            <p class="text-sm text-gray-600">Seguimiento de tus pedidos</p>
                            <a href="#" class="inline-block mt-2 text-sm text-green-600 hover:text-green-800">Ver pedidos →</a>
                        </div>
                        <div class="p-4 bg-purple-50 rounded-lg">
                            <h4 class="font-semibold text-purple-800">Mi Perfil</h4>
                            <p class="text-sm text-gray-600">Actualiza tus datos personales</p>
                            <a href="{{ route('profile.edit') }}" class="inline-block mt-2 text-sm text-purple-600 hover:text-purple-800">Editar perfil →</a>
                        </div>
                    </div>

                    <!-- Sección de reservas recientes -->
                    <div class="mt-8">
                        <h4 class="mb-3 text-lg font-semibold text-gray-800">Reservas Recientes</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Personas</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-600" colspan="4">No hay reservas recientes</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Sección de pedidos recientes -->
                    <div class="mt-8">
                        <h4 class="mb-3 text-lg font-semibold text-gray-800">Pedidos Recientes</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">N° Pedido</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-600" colspan="4">No hay pedidos recientes</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endsection