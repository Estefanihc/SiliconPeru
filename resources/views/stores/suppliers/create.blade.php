@extends('layouts.layout')

@section('title', 'Nuevo Proveedor')

@section('content')
    <div class="background-image d-flex align-items-center justify-content-center">
        <div class="container text-center">
            <!-- Logo centrado -->
            <div class="logo-container mb-4">
                <img src="https://mlkenzoihcoe.i.optimole.com/w:auto/h:auto/q:mauto/f:best/https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo Silicon" class="logo" />
            </div>

            <h1 class="mb-4 text-background">Crear Nuevo Proveedor</h1>

            <div class="outer-card shadow-lg mx-auto">
                <div class="inner-card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="mb-0">Formulario de Proveedor</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('suppliers.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="company_name">Nombre de la Empresa</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="fiscal_address">Dirección Fiscal</label>
                                <input type="text" class="form-control" id="fiscal_address" name="fiscal_address" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com">
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+51 999 999 999">
                            </div>

                            <div class="form-group mb-3">
                                <label for="credit_line">Línea de Crédito</label>
                                <input type="number" step="0.01" class="form-control" id="credit_line" name="credit_line" placeholder="0.00">
                            </div>

                            <div class="form-group mb-3">
                                <label for="comments">Comentarios Adicionales</label>
                                <textarea class="form-control" id="comments" name="comments" rows="4" placeholder="Escribe aquí tus comentarios..."></textarea>
                            </div>

                            <div class="form-group d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-success">Agregar Proveedor</button>
                            </div>
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
            padding: 40px 0;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        .text-background {
            background-color: rgba(245, 140, 20, 0.9);
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
            display: inline-block;
            margin-bottom: 20px;
        }

        .outer-card {
            border-radius: 20px;
            background-color: rgba(11, 23, 56, 0.9);
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }

        .inner-card {
            border-radius: 15px;
            border: none;
        }

        .card-header {
            border-radius: 15px 15px 0 0;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            color: #000;
            background-color: #fff;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: #0b2f7c;
            box-shadow: 0 0 5px rgba(11, 47, 124, 0.5);
        }

        .form-control::placeholder {
            color: #999;
        }

        .btn {
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s;
        }

        .btn-success {
            background-color: #0b2f7c;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn-success:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .logo {
                max-width: 100px;
            }
        }
    </style>
@endsection
