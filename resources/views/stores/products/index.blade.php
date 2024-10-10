@extends('layouts.layout')

@section('title', 'Productos')

@section('content')
    <style>
        body {
            background-image: url('https://images.pexels.com/photos/3184298/pexels-photo-3184298.jpeg');
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(20, 20, 20, 0.9); /* Fondo más oscuro */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 20px;
            text-align: center;
            color: white; /* Texto en blanco */
        }

        .title {
            font-size: 36px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
            font-size: 18px;
            margin: 10px;
            display: inline-block;
        }

        .btn-primary {
            background-color: #f39c12;
        }

        .btn-primary:hover {
            background-color: #e67e22;
        }

        .btn-secondary {
            background-color: #4b516d;
        }

        .btn-secondary:hover {
            background-color: #3e4453;
        }
    </style>

    <div class="container">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" style="width: 150px;">
        </div>

        <div class="title">Productos</div>
        <p>Desde aquí puedes gestionar tus productos.</p>

        <!-- Cambia los enlaces de "Ver Productos" a la lista de productos -->
        <a href="{{ route('products.index') }}" class="btn btn-primary">Ver Productos</a>
        <a href="{{ route('products.create') }}" class="btn btn-secondary">Agregar Producto</a>

        <!-- Mostrar la lista de productos -->
        @foreach ($products as $product)
            <div>
                <h2>{{ $product->name }}</h2>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Ver Detalles</a>
            </div>
        @endforeach
    </div>
@endsection
