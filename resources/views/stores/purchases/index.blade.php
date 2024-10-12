@extends('layouts.layout')

@section('title', 'Compras')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 800px;">
            <!-- Logo -->
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <!-- Card Gestión de Compras -->
            <div class="card shadow-lg mx-auto mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Gestión de Compras</h2>
                </div>
                <div class="card-body">
                    <p class="lead">Gestiona todas tus compras de forma eficiente.</p>
                    <div class="d-flex justify-content-center gap-3 mt-4">
                        <a href="{{ url('/') }}" class="btn btn-secondary">Regresar</a>
                        <a href="{{ route('compras.create') }}" class="btn btn-primary">Nueva Compra</a>
                        <a href="{{ route('compras.index') }}" class="btn btn-outline-light">Ver Mis Compras</a>
                    </div>
                </div>
            </div>

            <!-- Últimas Compras -->
            <div class="card shadow-lg mx-auto">
                <div class="card-header bg-warning text-dark">
                    <h2 class="mb-0">Últimas Compras</h2>
                </div>
                <div class="card-body">
                    @if($purchases->isEmpty())
                        <p>No has realizado ninguna compra aún.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach($purchases as $purchase)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('compras.show', $purchase->id) }}" class="text-decoration-none">{{ $purchase->name }}</a>
                                    <span class="badge bg-secondary">{{ $purchase->created_at->format('d/m/Y') }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Aplicar la fuente a todo el cuerpo */
        }
        /* Fondo */
        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Logo */
        .logo {
            max-width: 150px;
            height: auto;
            margin-left: 40%;
            margin-top: 10%;
            margin-bottom: 2%; /* Reducir margen para más espacio */
        }

        /* Botón de regresar */
        .btn-secondary {
            background-color: #ff963f;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            box-shadow: 0 6px 12px rgba(108, 117, 125, 0.5);
        }

        /* Cards */
        .card {
            border-radius: 25px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            margin-bottom: 8%;
        }

        /* Card Header */
        .card-header {
            border-radius: 15px 15px 0 0;
            padding: 8px;
            font-size: 1.5rem;
            text-align: center;
        }

        /* Botones */
        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 30px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
        }

        .btn-outline-light {
            background-color: #faa543;
            border: 2px solid #fff;
            color: #fff;
        }

        .btn-outline-light:hover {
            background-color: #fff;
            color: #007bff;
        }

        /* Listado de Compras */
        .list-group-item {
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.2s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        /* Badge */
        .badge {
            font-size: 0.875rem;
            background-color: #b6ddff;
            padding: 5px 10px;
            border-radius: 20px;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .welcome-text {
                font-size: 2rem;
            }
        }
    </style>
@endsection
