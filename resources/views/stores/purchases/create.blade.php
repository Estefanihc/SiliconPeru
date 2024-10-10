@extends('layouts.layout')

@section('title', 'Nueva Compra')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 600px; margin-left: 50px;">
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <h1 class="mb-4 text-background">Crear Nueva Compra</h1>

            <div class="outer-card shadow-lg mx-auto mb-4">
                <div class="inner-card">
                    <div class="card-header bg-dark text-white">
                        <h2 class="mb-0">Detalles de la Compra</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead mb-4">Completa el siguiente formulario para registrar una nueva compra.</p>

                        <form>
                            <div class="mb-3">
                                <label for="itemName" class="form-label">Nombre del Artículo</label>
                                <input type="text" class="form-control" id="itemName" placeholder="Ingrese el nombre del artículo">
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Ingrese la cantidad">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="price" placeholder="Ingrese el precio">
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar Compra</button>
                        </form>
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
            background-color: rgba(12, 13, 66, 0.9);
            margin-top: 20px;
            transition: transform 0.2s;
        }

        .outer-card:hover {
            transform: scale(1.02);
        }

        .inner-card {
            border-radius: 15px;
            border: none;
        }

        .card-header {
            border-radius: 15px 15px 0 0;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 200px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
