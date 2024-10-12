@extends('layouts.layout')

@section('title', 'Nuevo Producto')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

        body {
            background: url('https://images.pexels.com/photos/3184298/pexels-photo-3184298.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            margin: 20px;
            text-align: center;
        }

        h2 {
            font-size: 36px;
            color: #4CAF50;
            margin-bottom: 20px;
            font-weight: 600;
        }

        label {
            font-weight: 500;
            color: #333;
            font-size: 14px;
        }

        input, textarea, button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        input:focus, textarea:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
        }

        textarea {
            resize: vertical;
        }

        .icon {
            position: absolute;
            margin-left: -30px;
            margin-top: 13px;
            font-size: 16px;
            color: #555;
        }

        .form-group {
            position: relative;
            text-align: left;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-weight: 600;
        }

        button:hover {
            background-color: #45a049;
        }

        button:focus {
            outline: none;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3e8e41;
        }

        .btn-secondary {
            background-color: #f39c12;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #e67e22;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                max-width: 90%;
            }
        }
    </style>

    <div class="container mt-5">
        <h2 class="text-center">Crear Nuevo Producto</h2>

        <!-- Botón para regresar -->
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Regresar</a>

        <!-- Formulario para crear el producto -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            
            <!-- Campo nombre del producto -->
            <div class="form-group">
                <label for="name"><i class="fas fa-box icon"></i> Nombre del producto</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del producto" required>
            </div>
    
            <!-- Campo descripción -->
            <div class="form-group mt-3">
                <label for="description"><i class="fas fa-align-left icon"></i> Descripción</label>
                <textarea name="description" id="description" class="form-control" placeholder="Descripción del producto"></textarea>
            </div>
    
            <!-- Campo fecha de entrada -->
            <div class="form-group mt-3">
                <label for="entry_date"><i class="fas fa-calendar-alt icon"></i> Fecha de entrada</label>
                <input type="date" name="entry_date" id="entry_date" class="form-control">
            </div>
    
            <!-- Campo precio de compra -->
            <div class="form-group mt-3">
                <label for="purchase_price"><i class="fas fa-dollar-sign icon"></i> Precio de compra</label>
                <input type="number" step="0.01" name="purchase_price" id="purchase_price" class="form-control" placeholder="Precio de compra" required>
            </div>
    
            <!-- Campo precio de venta -->
            <div class="form-group mt-3">
                <label for="sale_price"><i class="fas fa-tag icon"></i> Precio de venta</label>
                <input type="number" step="0.01" name="sale_price" id="sale_price" class="form-control" placeholder="Precio de venta" required>
            </div>
    
            <!-- Campo margen de ganancia -->
            <div class="form-group mt-3">
                <label for="profit_margin"><i class="fas fa-percentage icon"></i> Margen de ganancia (%)</label>
                <input type="number" step="0.01" name="profit_margin" id="profit_margin" class="form-control" placeholder="Margen de ganancia">
            </div>
    
            <!-- Campo stock -->
            <div class="form-group mt-3">
                <label for="stock"><i class="fas fa-archive icon"></i> Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" placeholder="Cantidad en stock" required>
            </div>

            <!-- Campo para subir imagen -->
            <div class="form-group mt-3">
                <label for="image"><i class="fas fa-image icon"></i> Subir Imagen</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
    
            <!-- Botón para guardar -->
            <div class="form-group mt-4 text-center">
                <button type="submit" class="btn btn-primary">Crear Producto</button>
            </div>
        </form>
    </div>
@endsection
