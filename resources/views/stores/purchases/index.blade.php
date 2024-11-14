@extends('layouts.layout')

@section('title', 'Compras')

@section('content')
    <!-- Enlace a Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Aplicar la fuente a todo el cuerpo */
        }

        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px 0;
            color: #fff;
        }

        .logo {
            max-width: 180px;
            height: auto;
            margin-left: 37%;
        }

        .outer-card {
            border-radius: 20px;
            background-color: rgba(16, 13, 59, 0.95);
            transition: transform 0.3s ease;
            padding: 40px;
        }

        .outer-card:hover {
            transform: scale(1.05);
        }

        .btn {
            border-radius: 50px; /* Cambiar los bordes de los botones a estilo más moderno */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            padding: 8px 20px;
            margin-bottom: 10%;
            font-size: 16px;
            font-weight: 600;
            width: 48%; /* Ancho consistente para los botones */
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            padding-top: 2%;
            padding-bottom: 2%;
            text-align: center;
            color: #fff;
        }

        .btn-info {
            background-color: #55b5c4;
            color: #fff;
        }

        .form-control {
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ddd1;
            transition: box-shadow 0.3s ease;
            color: #1a1a1a;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        .list-unstyled li {
            margin-bottom: 10px; /* Espaciado entre botones */
        }
    </style>

    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 600px;">
            <div class="logo-container mb-4">
                <img src="https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo mx-auto d-block" />
            </div>

            <div class="outer-card shadow-lg mx-auto mb-4">

                <a href="{{ route('purchases.create') }}" class="btn btn-primary">Agregar Compra</a>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver</a>
                
                <div class="inner-card p-4">
                    <div class="card-body">
                        <!-- Mensaje de confirmación -->
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Buscar Productos -->
                        <div class="mt-4">
                            <h4>Buscar Compras:</h4>
                            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Buscar por nombre o código">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Buscar</a>
                        </div>

                        <!-- Lista de compras -->
                        <div class="mt-4">
                            <h4>Ver Compras:</h4>
                            <ul id="purchaseList" class="list-unstyled">
                                @foreach ($purchases as $purchase)
                                    <li class="purchase-item">
                                        <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info btn-checklist mb-2">
                                            Ver Compra {{ $purchase->id }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <style>
                            #purchaseList {
                                display: flex;
                                flex-wrap: wrap;
                                list-style-type: none; /* Asegúrate de que la lista no tenga puntos */
                                padding: 0; /* Eliminar el padding por defecto */
                            }
                        
                            .purchase-item {
                                width: 48%; /* Establecer un ancho del 48% para dos columnas */
                                margin-right: 4%; /* Espacio entre las columnas */
                                margin-bottom: 10px; /* Espacio entre filas */
                            }
                        
                            .purchase-item:nth-child(2n) {
                                margin-right: 0; /* Eliminar el margen derecho para cada segundo elemento */
                            }
                        </style>
                        

                    </div>
                </div>
                
                <!-- Paginación -->
                <div class="pagination">
                    {{$purchases->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
