@extends('layouts.layout')

@section('title', 'Compra ' . $purchase)

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 600px;">
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo mx-auto d-block" />
            </div>

            <h1 class="mb-4 text-background">Detalles de la Compra</h1>

            <div class="outer-card shadow-lg mx-auto mb-4">
                <div class="inner-card p-4">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="mb-0">Compra: {{ $purchase }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead mb-4">Aquí puedes ver la información detallada de la compra realizada.</p>

                        <!-- Información detallada de la compra -->
                        <div class="details-container">
                            <p><strong>ID de Compra:</strong> {{ $purchase }}</p>
                            <!-- Agregar más detalles según lo que tengas en la base de datos -->
                        </div>

                        <div class="button-container">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
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
        }

        .text-background {
            background-color: rgba(255, 140, 20, 0.85);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: inline-block;
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

        .inner-card {
            border-radius: 15px;
            border: none;
        }

        .card-header {
            border-radius: 15px 15px 0 0;
        }

        .btn {
            border-radius: 8px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            width: 48%;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            box-shadow: 0 6px 12px rgba(108, 117, 125, 0.5);
        }

        .details-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #fff;
        }

        .details-container p {
            font-size: 18px;
            margin: 10px 0;
        }
    </style>
@endsection
