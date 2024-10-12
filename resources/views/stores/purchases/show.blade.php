@extends('layouts.layout')

@section('title', 'Compra ' . $purchase->id)

@section('content')
<div class="background-image d-flex align-items-center justify-content-center">
    <div class="container text-center" style="max-width: 600px;">
        <h1 class="mb-4 text-background">Detalles de la Compra</h1>

        <div class="outer-card shadow-lg mx-auto mb-4">
            <div class="inner-card p-4">
                <div class="card-header bg-dark text-white text-center">
                    <h2 class="mb-0">Compra: {{ $purchase->item_name }}</h2>
                </div>
                <div class="card-body">
                    <p class="lead mb-4">Aquí puedes ver la información detallada de la compra realizada.</p>

                    <!-- Información detallada de la compra -->
                    <div class="details-container">
                        <p><strong>ID de Compra:</strong> {{ $purchase->id }}</p>
                        <p><strong>Nombre del Producto:</strong> {{ $purchase->item_name }}</p>
                        <p><strong>Cantidad:</strong> {{ $purchase->quantity }}</p>
                        <p><strong>Precio:</strong> ${{ number_format($purchase->price, 2) }}</p>
                    </div>

                    <!-- Botones organizados verticalmente -->
                    <div class="button-container mt-4">
                        <a href="{{ route('purchases.index') }}" class="btn btn-secondary mb-2">Volver</a>
                        <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-warning">Editar Compra</a>
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
        width: 100%; /* Hace que los botones ocupen todo el ancho */
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

    .btn-warning {
        background-color: #ffc107;
        color: #fff;
        box-shadow: 0 4px 8px rgba(255, 193, 7, 0.3);
    }

    .btn-warning:hover {
        background-color: #e0a800;
        box-shadow: 0 6px 12px rgba(255, 193, 7, 0.5);
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
