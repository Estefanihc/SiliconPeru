@extends('layouts.layout')

@section('title', 'Compras')

@section('content')
    <!-- Enlace a Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

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
            padding: 8px 20px;
            margin-bottom: 10%;
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
            background-color: #fd812f;
            box-shadow: 0 6px 12px rgba(0, 123, 255, 0.5); /* Efecto al pasar sobre el botón */
            margin-bottom: 10%;
        }

        .btn-secondary {
            background-color: #6c757d;
            padding-top: 2%;
            padding-bottom: 2%;
            text-align: center;
            color: #fff;
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            box-shadow: 0 6px 12px rgba(108, 117, 125, 0.5);
        }

        .btn-info {
            background-color: #55b5c4;
            padding-top: 0%;
            color: #fff;
            box-shadow: 0 4px 8px rgba(23, 162, 184, 0.3);
        }

        .btn-info:hover {
            background-color: #138496;
            box-shadow: 0 6px 12px rgba(23, 162, 184, 0.5);
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

        .list-unstyled li {
            margin-bottom: 10px; /* Espaciado entre botones */
        }
    </style>

    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center" style="max-width: 600px;">
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo mx-auto d-block" />
            </div>

            <div class="outer-card shadow-lg mx-auto mb-4">

                <a href="{{ route('purchases.create') }}" class="btn btn-primary">Agregar Compra</a>
                <div class="inner-card p-4">
                    <div class="card-header bg-dark text-white text-center">
                        <h2 class="mb-0">Detalles de la Compra</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead mb-4">Completa el siguiente formulario para registrar una nueva compra.</p>

                        <form id="purchaseForm">
                            <div class="form-group mb-3">
                                <label for="itemName" class="form-label">Nombre del Artículo</label>
                                <input type="text" class="form-control" id="itemName" placeholder="Ingrese el nombre del artículo" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="unitPrice" class="form-label">Precio Unitario</label>
                                <input type="text" class="form-control" id="unitPrice" placeholder="Precio unitario" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="quantity" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Ingrese la cantidad" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="totalPrice" class="form-label">Precio Total</label>
                                <input type="text" class="form-control" id="totalPrice" placeholder="Precio total" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="supplier" class="form-label">Proveedor</label>
                                <select id="supplier" class="form-control" required>
                                    <option value="">Seleccione un proveedor</option>
                                    <option value="1">Proveedor 1</option>
                                    <option value="2">Proveedor 2</option>
                                    <option value="3">Proveedor 3</option>
                                    <!-- Puedes agregar más proveedores aquí -->
                                </select>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn btn-primary">Registrar Compra</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </form>

                        <!-- Mensaje de confirmación -->
                        <div id="confirmationMessage" class="alert alert-success mt-3" style="display: none;"></div>

                        <!-- Buscar Productos -->
                        <div class="mt-4">
                            <h4>Buscar Compras:</h4>
                            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Buscar por nombre o código">
                        </div>

                        <!-- Lista de compras -->
                        <div class="mt-4">
                            <h4>Ver Compras:</h4>
                            <ul id="purchaseList" class="list-unstyled">
                                @foreach ($purchases as $purchase)
                                    <li>
                                        <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-info btn-block mb-2">Ver Compra {{ $purchase->id }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                
                <!-- Paginación -->
                <div class="pagination">
                    {{$purchases->links()}}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('purchaseForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Evita que el formulario se envíe de la forma tradicional
            
            // Aquí puedes agregar la lógica para registrar la compra (usando AJAX o redireccionando a
