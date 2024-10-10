@extends('layouts.layout')

@section('title', 'Proveedores')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <!-- Logo centrado -->
            <div class="logo-container mb-4"> <!-- Agregado mb-4 para margen inferior -->
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <div class="text-box mb-4">
                <h1 class="font-weight-bold">Bienvenido a la página de Proveedores</h1>
            </div>
            
            <div class="card shadow-lg mx-auto">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Lista de Proveedores</h2>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-striped table-bordered mx-auto">
                        <thead>
                            <tr class="table-header">
                                <th>ID</th>
                                <th>Nombre de la Empresa</th>
                                <th>Dirección Fiscal</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Línea de Crédito</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->id }}</td>
                                    <td>{{ $supplier->company_name }}</td>
                                    <td>{{ $supplier->fiscal_address }}</td>
                                    <td>{{ $supplier->email ?? 'N/A' }}</td>
                                    <td>{{ $supplier->phone ?? 'N/A' }}</td>
                                    <td>{{ $supplier->credit_line ? '$' . number_format($supplier->credit_line, 2) : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('suppliers.create') }}" class="btn btn-success">Agregar Proveedor</a>
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

        .logo-container {
            display: flex;
            justify-content: center; /* Centrar horizontalmente */
            margin-top: -20px; /* Ajusta este valor para subir el logo */
        }

        .logo {
            max-width: 200px; /* Ajustar el tamaño del logo */
            height: auto; /* Mantener la proporción */
            margin: 0 auto; /* Centrar horizontalmente */
        }

        .text-box {
    background-color: rgba(0, 0, 255, 0.7); /* Fondo azul semitransparente */
    border-radius: 8px;
    padding: 10px; /* Espaciado interno */
    margin-bottom: 20px; /* Margen inferior */
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

        h1 {
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            font-family: 'Arial', sans-serif;
            font-size: 2.5rem;
        }

        .table {
            font-family: 'Arial', sans-serif;
            font-size: 1rem;
            color: #333;
        }

        .table-header {
            background-color: #f58c14; /* Azul */
            color: white;
        }

        .table th, .table td {
            padding: 12px; /* Espaciado en las celdas */
            text-align: center; /* Alinear el texto al centro */
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s; /* Añadir transición */
        }

        .btn-warning {
            background-color: #ff9800; /* Naranja */
            color: #fff; /* Color de texto */
        }

        .btn-warning:hover {
            background-color: #e68a00; /* Naranja más oscuro */
        }

        .btn-danger {
            background-color: #dc3545; /* Color de fondo */
            color: #fff; /* Color de texto */
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #0b2f7c; /* Color de fondo */
            color: #fff; /* Color de texto */
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px; /* Bordes redondeados */
        }

        /* Estilos adicionales */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem; /* Tamaño de fuente más pequeño en pantallas pequeñas */
            }

            .table {
                font-size: 0.9rem; /* Tamaño de fuente más pequeño para la tabla */
            }
        }
    </style>
@endsection
