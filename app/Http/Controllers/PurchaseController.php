<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //método para mostrar la página principal de los empleados
    public function index() {
        return view('stores.purchases.index');
    }

    //método para mostrar el formulario para crear un nuevo empleado
    public function create() {
        return view('stores.purchases.create');
    }

    //método para mostrar la información de un empleado en específico
    public function show($purchase) {
        return view('stores.purchases.show', compact('purchase'));
    }
}