<?php

namespace App\Http\Controllers;

use App\Models\Purchase; // Importa el modelo Purchase
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // Método para mostrar la página principal de las compras
    public function index()
    {
        $purchases = Purchase::all(); // Obtener todas las compras
        return view('stores.purchases.index', compact('purchases'));
    }

    // Método para mostrar el formulario para crear una nueva compra
    public function create() {
        return view('stores.purchases.create');
    }

    // Método para mostrar la información de una compra en específico
    public function show($purchase) {
        return view('stores.purchases.show', compact('purchase'));
    }
}
