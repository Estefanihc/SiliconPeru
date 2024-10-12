@extends('layouts.app')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

@section('content')
<div class="background-image d-flex align-items-center justify-content-center">
    <div class="container my-5">
        <div class="card shadow-lg">
            <div class="card-header text-white text-center">
                <img src="https://silicon.pe/wp-content/uploads/2023/01/Logotipo-en-Blanco2.png" alt="Logo" class="logo mb-2">
                <h1 class="mb-0">Editar Proveedor</h1>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo Nombre de la Empresa -->
                    <div class="form-group mb-4">
                        <label for="company_name" class="font-weight-bold">Nombre de la Empresa</label>
                        <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name', $supplier->company_name) }}" placeholder="Ingrese el nombre de la empresa">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success btn-lg px-5">Actualizar Proveedor</button>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary btn-lg px-4 ml-2">Cancelar</a>
                    </div>
                </form>
            </div>
                <a href="{{ route('suppliers.index') }}" class="btn btn-outline-light btn-sm">Regresar a la lista de proveedores</a>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        font-family: 'Roboto', sans-serif; /* Aplicar la fuente a todo el cuerpo */
    }

    /* Imagen de fondo */
    .background-image {
        background-image: url('https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff; 
        padding: 20px;
    }

    /* Estilo de la tarjeta */
    .card {
        border-radius: 20px;
        opacity: 0.95;
        background-color: rgba(255, 255, 255, 0.9); 
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        padding: 30px; /* Aumentar el padding interior */
        transition: background-color 0.3s; /* Agregar transición */
    }

    /* Encabezado de la tarjeta */
    .card-header {
        border-radius: 20px 20px 0 0;
        background-color: #0b2f7c;
        font-size: 1.8rem; /* Aumentar tamaño de la fuente */
        font-weight: bold;
    }

    .logo {
        max-width: 150px;
        margin-top: 4%;
        margin-left: 32%;
    }

    /* Estilo de los campos del formulario */
    .form-group label {
        font-size: 1.5rem; /* Aumentar tamaño de la fuente */
        color: #333;
        margin-bottom: 8px; /* Agregar margen inferior a la etiqueta */
    }

    .form-control {
        border-radius: 5px;
        font-size: 1.2rem; /* Aumentar tamaño de la fuente */
        padding: 12px; /* Aumentar padding para mayor confort */
        margin-bottom: 20px; /* Agregar margen inferior a los campos */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Estilo de los botones */
    .btn {
        border-radius: 10px;
        font-size: 1.2rem; /* Aumentar tamaño de la fuente */
        padding: 12px 24px; /* Aumentar padding de los botones */
        transition: background-color 0.3s ease, transform 0.3s;
        margin-left: 9%;
    }

    .btn-success {
        background-color: #ff9b29; /* Cambiar a un azul más claro */
        border: none;
    }

    .btn-success:hover {
        background-color: #f77e0e; /* Color más oscuro al pasar el ratón */
        transform: scale(1.05);
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: scale(1.05);
    }

    .btn-outline-light {
        border-color: #fff;
        color: #fff;
    }

    .btn-outline-light:hover {
        background-color: #fff;
        color: #0b2f7c;
    }

    /* Cambiar el fondo de la tarjeta al pasar el ratón sobre el botón */
    .btn-outline-light:hover ~ .card {
        background-color: #0b2f7c; /* Cambia el color a azul */
        color: #1a1a1a; /* Cambiar el color del texto a blanco */
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .btn-lg {
            font-size: 1rem;
            padding: 8px 16px;
        }

        .card-header {
            font-size: 1.8rem; /* Ajustar tamaño en dispositivos pequeños */
        }

        .form-group label {
            font-size: 1.2rem; /* Ajustar tamaño en dispositivos pequeños */
        }

        .form-control {
            font-size: 1rem; /* Ajustar tamaño en dispositivos pequeños */
        }
    }
</style>
@endsection
