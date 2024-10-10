@extends('layouts.layout')

@section('title', 'Compras')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="margin: 0 auto; max-width: 800px;">
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <h1 class="mb-4 text-background">Bienvenido a la página de Compras</h1>

            <div class="outer-card shadow-lg mx-auto mb-4">
                <div class="inner-card">
                    <div class="card-header bg-dark text-white">
                        <h2 class="mb-0">Gestión de Compras</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead mb-4">Aquí puedes gestionar todas tus compras de manera eficiente.</p>
                        <p class="mb-4">Explora las diferentes secciones y realiza tus compras con facilidad.</p>
                        <div class="d-flex justify-content-center flex-wrap">
                            <a href="{{ route('compras.create') }}" class="btn btn-primary mx-2">Realizar una Compra</a>
                            <a href="{{ route('compras.index') }}" class="btn btn-secondary mx-2">Ver Mis Compras</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="outer-card shadow-lg mx-auto">
                <div class="inner-card">
                    <div class="card-header bg-warning text-dark">
                        <h2 class="mb-0">Últimas Compras</h2>
                    </div>
                    <div class="card-body">
                        @if($purchases->isEmpty())
                            <p>No has realizado ninguna compra aún.</p>
                        @else
                            <ul class="list-group">
                                @foreach($purchases as $purchase)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="{{ route('compras.show', $purchase->id) }}" class="text-decoration-none">{{ $purchase->name }}</a>
                                        <span class="badge bg-secondary rounded-pill">{{ $purchase->created_at->format('d/m/Y') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .background-image {
            background-image: url('https://images.pexels.com/photos/7843999/pexels-photo-7843999.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 60px 0;
            color: #fff;
        }

        .logo {
            max-width: 200px;
            height: auto;
        }

        .text-background {
            background-color: rgba(255, 140, 20, 0.8);
            color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            display: inline-block;
        }

        .outer-card {
            border-radius: 20px;
            background-color: rgba(16, 13, 59, 0.9);
            margin-top: 20px;
            transition: transform 0.2s;
        }

        .outer-card:hover {
            transform: scale(1.02);
        }

        .inner-card {
            border-radius: 15px;
            margin-left: 5%;
            border: none;
        }

        .card-header {
            border-radius: 15px 15px 0 0;
            margin-left: 5%;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 200px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            margin-left: 35%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .list-group-item {
            display: flex;
            margin-left: 5%;
            justify-content: space-between;
            align-items: center;
            
        }

        .badge {
            background-color: #6c757d;
            color: #fff;
            margin-left: 5%;
        }
    </style>
@endsection
