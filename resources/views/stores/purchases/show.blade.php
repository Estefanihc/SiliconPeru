@extends('layouts.layout')

@section('title', 'Editar Compra ' . $purchase->id)

@section('content')
<div class="background-image d-flex align-items-center justify-content-center">
    <div class="container text-center" style="max-width: 600px;">
        <h1 class="mb-4 text-background">Editar Compra</h1>

        <div class="outer-card shadow-lg mx-auto mb-4">
            <div class="inner-card p-4">
                <div class="card-header bg-dark text-white text-center">
                    <h2 class="mb-0">Compra: {{ $purchase->item_name }}</h2>
                </div>
                <div class="card-body">
                    <p class="lead mb-4">Aquí puedes editar la información de la compra.</p>

                    <!-- Formulario para editar la compra -->
                    <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="details-container">
                            <div class="mb-3">
                                <label for="item_name" class="form-label"><strong>Nombre del Artículo</strong></label>
                                <input type="text" name="item_name" id="item_name" class="form-control" value="{{ old('item_name', $purchase->item_name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="ciaf_number" class="form-label"><strong>Número de CIAF</strong></label>
                                <input type="text" name="ciaf_number" id="ciaf_number" class="form-control" value="{{ old('ciaf_number', $purchase->ciaf_number) }}" placeholder="N/A">
                            </div>

                            <div class="mb-3">
                                <label for="purchase_date_time" class="form-label"><strong>Fecha y Hora de Compra</strong></label>
                                <input type="datetime-local" name="purchase_date_time" id="purchase_date_time" class="form-control" value="{{ old('purchase_date_time', $purchase->purchase_date_time) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="employee_id" class="form-label"><strong>Empleado que Realizó la Compra</strong></label>
                                <input type="number" name="employee_id" id="employee_id" class="form-control" value="{{ old('employee_id', $purchase->employee_id) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="supplier_id" class="form-label"><strong>Proveedor</strong></label>
                                <input type="number" name="supplier_id" id="supplier_id" class="form-control" value="{{ old('supplier_id', $purchase->supplier_id) }}" required>
                            </div>
                        </div>

                        <!-- Botones -->
<div class="button-container mt-4" style="display: flex; gap: 10px;">
    <button type="submit" class="btn btn-warning btn-uniform">Guardar Cambios</button>
    <a href="{{ route('purchases.index') }}" class="btn btn-warning btn-uniform">Cancelar</a>
</div>

<!-- CSS adicional -->
<style>
    .btn-uniform {
        padding: 10px 20px; /* Asegura el mismo relleno */
        font-size: 16px;    /* Asegura el mismo tamaño de fuente */
        display: inline-block;
        line-height: 1.5;   /* Ajusta la altura de línea */
    }
</style>

                    </form>
                    
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
        margin-bottom: 50px;
    }

    .btn-warning {
        background-color: #ffc107;
        margin-top: 25px;
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

    .details-container p,
    .details-container .form-label {
        font-size: 18px;
        margin: 10px 0;
    }
</style>
@endsection
