<?php

namespace App\Http\Controllers;

use App\Models\Supplier; // Importar el modelo Supplier
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Método para mostrar la página principal de los proveedores
    public function index() {
        // Obtén todos los proveedores
        $suppliers = Supplier::all();
        return view('stores.suppliers.index', compact('suppliers'));
    }

    // Método para mostrar el formulario para crear un nuevo proveedor
    public function create() {
        return view('stores.suppliers.create');
    }

    // Método para almacenar un nuevo proveedor
    public function store(Request $request) {
        // Validación de datos
        $request->validate([
            'company_name' => 'required|string|max:255',
            'fiscal_address' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'credit_line' => 'nullable|numeric',
        ]);

        // Crear el proveedor
        Supplier::create($request->all());

        // Redirigir a la lista de proveedores con un mensaje
        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado con éxito.');
    }

    // Método para mostrar la información de un proveedor específico
    public function show($id) {
        // Busca el proveedor por ID, o lanza un 404 si no se encuentra
        $supplier = Supplier::findOrFail($id);
        return view('stores.suppliers.show', compact('supplier'));
    }

    public function destroy($id)
{
    $supplier = Supplier::findOrFail($id);
    $supplier->delete();
    return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado con éxito.');
}

public function edit($id)
{
    $supplier = Supplier::findOrFail($id);
    return view('stores.suppliers.edit', compact('supplier'));
}


}
