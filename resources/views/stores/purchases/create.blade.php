@extends('layouts.layout')

@section('title', 'Nueva Compra')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 600px;">
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo mx-auto d-block" />
            </div>

            <h1 class="mb-4 text-background">Crear Nueva Compra</h1>

            <div class="outer-card shadow-lg mx-auto mb-4">
                <div class="inner-card p-4">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="mb-0">Detalles de la Compra</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead mb-4">Completa el siguiente formulario para registrar una nueva compra.</p>

                        <form>
                            <div class="form-group mb-3">
                                <label for="itemName" class="form-label">Nombre del Artículo</label>
                                <input type="text" class="form-control" id="itemName" placeholder="Ingrese el nombre del artículo">
                            </div>
                            <div class="form-group mb-3">
                                <label for="quantity" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Ingrese la cantidad">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="price" placeholder="Ingrese el precio">
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn btn-primary">Registrar Compra</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        .text-background {
            background-color: rgba(255, 140, 20, 0.85);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
            display: inline-block;
            margin-left: 18%;
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
            border-radius: 50px; /* Cambiar los bordes de los botones a estilo más moderno */
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            width: 48%; /* Ancho consistente para los botones */
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3); /* Añadir sombra */
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 123, 255, 0.5); /* Efecto al pasar sobre el botón */
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

        .form-control {
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: box-shadow 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .lead {
            font-size: 1.2rem;
            font-weight: 400;
        }

        .button-container {
            display: flex;
            justify-content: space-between; /* Botones alineados con espacio entre ellos */
        }
    </style>
@endsection
