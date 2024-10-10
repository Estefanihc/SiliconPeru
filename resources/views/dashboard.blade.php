@extends('layouts.app')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-3xl text-gray-100 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <!-- Fondo con degradado azul personalizado -->
        <div class="py-12 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Caja contenedora -->
                <div class="bg-white overflow-hidden shadow-2xl rounded-lg">
                    <div class="p-6 sm:px-20 bg-gray-100 border-b border-gray-200">
                        <div class="mt-8 text-4xl font-bold text-gray-900">
                            ¡Bienvenido al sistema de gestión de almacén!
                        </div>
                        <div class="mt-4 text-lg text-gray-700 leading-relaxed">
                            Administra los productos y empleados de manera fácil y eficiente desde aquí.
                        </div>

                        <!-- Botones de opciones -->
                        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Productos -->
                            <div class="bg-blue-200 hover:bg-blue-300 transition duration-300 ease-in-out text-center rounded-lg p-6">
                                <a href="{{ route('products.index') }}"
                                   class="block text-xl font-bold text-blue-800 hover:text-blue-900">
                                    Ver Productos
                                </a>
                                <p class="mt-2 text-gray-600">
                                    Administra todos los productos disponibles en el almacén.
                                </p>
                            </div>

                            <!-- Empleados -->
                            <div class="bg-green-200 hover:bg-green-300 transition duration-300 ease-in-out text-center rounded-lg p-6">
                                <a href="{{ route('employees.index') }}"
                                   class="block text-xl font-bold text-green-800 hover:text-green-900">
                                    Ver Empleados
                                </a>
                                <p class="mt-2 text-gray-600">
                                    Gestiona a los empleados y sus roles dentro del sistema.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
