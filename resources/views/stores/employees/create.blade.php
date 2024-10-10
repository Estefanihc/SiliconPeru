@extends('layouts.layout')

@section('title', 'Nuevo Empleado')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <div class="text-box mb-4">
                <h1 class="font-weight-bold">Crear un Nuevo Empleado</h1>
            </div>
            
            <div class="card shadow-lg mx-auto">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Formulario de Nuevo Empleado</h2>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 text-center"> <!-- Aumenté el margen inferior -->
                            <label for="first_name" class="form-label" style="margin-left: 30px;">Nombre</label>
                            <input type="text" name="first_name" id="first_name" class="form-control mx-auto" style="width: 80%; margin-left: 30px;" required>
                        </div>
                        <div class="mb-4 text-center"> <!-- Aumenté el margen inferior -->
                            <label for="last_name" class="form-label" style="margin-left: 30px;">Apellido</label>
                            <input type="text" name="last_name" id="last_name" class="form-control mx-auto" style="width: 80%; margin-left: 30px;" required>
                        </div>
                        <div class="mb-4 text-center"> <!-- Aumenté el margen inferior -->
                            <label for="hire_date" class="form-label" style="margin-left: 30px;">Fecha de Contratación</label>
                            <input type="date" name="hire_date" id="hire_date" class="form-control mx-auto" style="width: 80%; margin-left: 30px;" required>
                        </div>
                        <div class="mb-4 text-center"> <!-- Aumenté el margen inferior -->
                            <label for="address" class="form-label" style="margin-left: 30px;">Dirección</label>
                            <input type="text" name="address" id="address" class="form-control mx-auto" style="width: 80%; margin-left: 30px;">
                        </div>
                        <div class="mb-4 text-center"> <!-- Aumenté el margen inferior -->
                            <label for="phone" class="form-label" style="margin-left: 30px;">Teléfono</label>
                            <input type="text" name="phone" id="phone" class="form-control mx-auto" style="width: 80%; margin-left: 30px;">
                        </div>
                        <div class="mb-4 text-center"> <!-- Aumenté el margen inferior -->
                            <label for="email" class="form-label" style="margin-left: 30px;">Email</label>
                            <input type="email" name="email" id="email" class="form-control mx-auto" style="width: 80%; margin-left: 30px;">
                        </div>

                        <div class="text-center mt-4"> <!-- Añadido para centrar y dar espacio al botón -->
                            <button type="submit" class="btn btn-success">Agregar Empleado</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilo de fondo */
        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 20px 0;
            color: #fff; /* Color del texto */
            display: flex;
            align-items: center; /* Centrar verticalmente */
            justify-content: center; /* Centrar horizontalmente */
        }

        .text-box {
            background-color: rgba(245, 140, 20, 0.9); /* Fondo azul semitransparente */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 20px; /* Margen inferior */
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        .card {
            border-radius: 15px;
            border: none; /* Sin borde para una apariencia más limpia */
            opacity: 0.95; /* Ligeramente transparente */
            transition: transform 0.3s; /* Animación al pasar el ratón */
            margin-top: 20px; /* Espacio encima de la tarjeta */
        }

        .card:hover {
            transform: translateY(-5px); /* Levantar la tarjeta al pasar el ratón */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Sombra más intensa */
        }

        .form-label {
            font-weight: bold; /* Negrita para las etiquetas */
            color: #343a40; /* Color oscuro para las etiquetas */
            margin-bottom: 5px; /* Espacio inferior */
            display: block; /* Para que el margen funcione correctamente */
            text-align: center; /* Centrar las etiquetas */
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s; /* Añadir transición */
        }

        .btn-success {
            background-color: #0b2f7c; /* Color de fondo */
            color: #fff; /* Color de texto */
        }

        .btn-success:hover {
            background-color: #218838; /* Color de fondo al pasar el ratón */
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px; /* Bordes redondeados */
        }
    </style>
@endsection
