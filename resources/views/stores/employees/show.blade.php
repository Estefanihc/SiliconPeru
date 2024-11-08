<!-- Heredar el código de la plantilla -->
@extends('layouts.layout')

<!-- Modificar la sección del título -->
@section('title', 'Detalles del Empleado - ' . $employee->name)

<!-- Personalizar el contenido de la página (content) -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Detalles del Empleado</h1>
                <p class="lead">Está viendo la información del empleado: <strong>{{ $employee->name }}</strong></p>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Información Básica</h5>
                        <p><strong>Nombre:</strong> {{ $employee->name }}</p>
                        <p><strong>Email:</strong> {{ $employee->email }}</p>
                        <p><strong>Fecha de Contratación:</strong> {{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}</p>
                        <p><strong>Teléfono:</strong> {{ $employee->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
