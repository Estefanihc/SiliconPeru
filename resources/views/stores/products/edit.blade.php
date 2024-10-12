@extends('layouts.layout')

@section('title', 'Editar Producto')

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

        input, textarea {
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

        .btn {
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            outline: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 128, 0, 0.2);
        }

        .btn-primary:hover {
            background-color: #45a049;
            box-shadow: 0 6px 20px rgba(0, 128, 0, 0.4);
        }

        .btn-secondary {
            background-color: #4b516d;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary:hover {
            background-color: #3e4453;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        .form-group.text-center {
            display: flex;
            justify-content: space-around;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                max-width: 90%;
            }

            .btn {
                padding: 10px 20px;
            }
        }
    </style>

    <div class="container mt-5">
        <h2 class="text-center">Editar Producto</h2>
        
        <!-- Formulario para editar el producto -->
        <form action="{{ route('products.update', $product) }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <!-- Campo nombre del producto -->
            <div class="form-group">
                <label for="name"><i class="fas fa-box icon"></i> Nombre del producto</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del producto" required value="{{ $product->name }}">
            </div>

            <!-- Campo descripción -->
            <div class="form-group mt-3">
                <label for="description"><i class="fas fa-align-left icon"></i> Descripción</label>
                <textarea name="description" id="description" class="form-control" placeholder="Descripción del producto">{{ $product->description }}</textarea>
            </div>

            <!-- Mostrar la imagen actual si existe -->
            @if($product->image)
                <div class="form-group mt-3">
                    <label for="current_image">Imagen actual:</label><br>
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width: 150px;">
                </div>
            @endif

            <!-- Campo para subir nueva imagen -->
            <div class="form-group mt-3">
                <label for="image"><i class="fas fa-upload icon"></i> Cambiar Imagen:</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>

            <!-- Otros campos como precio, stock, etc. -->
            <div class="form-group mt-3">
                <label for="stock"><i class="fas fa-archive icon"></i> Stock</label>
                <input type="number" name="stock" id="stock" class="form-control" placeholder="Cantidad en stock" required value="{{ $product->stock }}">
            </div>

            <!-- Botones para guardar y regresar -->
            <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary">Editar Producto</button>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">Volver a Detalles</a>
            </div>
        </form>
    </div>
@endsection
