@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Compra</h1>

        <form action="{{ route('purchases.update', $purchase->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campo para ingresar el número de CIAF -->
            <div class="mb-3">
                <label for="ciaf_number" class="form-label">Número de CIAF</label>
                <input type="text" name="ciaf_number" id="ciaf_number" class="form-control" value="{{ old('ciaf_number', $purchase->ciaf_number) }}" required>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $purchase->quantity) }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Precio</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $purchase->price) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Compra</button>
        </form>
    </div>
@endsection
