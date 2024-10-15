<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // Método para mostrar la página principal de las compras
    public function index()
    {
        $purchases = Purchase::paginate(15);

        return view('stores.purchases.index', compact('purchases'));
    }

    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);

        return view('stores.purchases.show', compact('purchase')); 
    }

    // Mostrar el formulario de crear nueva compra
    public function create()
    {
        return view('stores.purchases.create');
    }


    // Almacenar la nueva compra
    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'itemName' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        // Crear la compra
        Purchase::create([
            'item_name' => $request->itemName,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        // Redirigir a la lista de compras
        return redirect()->route('purchases.index')->with('success', 'Compra registrada exitosamente.');
    }


    // En tu controlador
    public function search(Request $request)
    {
        // Verifica si el 'query' está presente
        $query = $request->input('query');
        if (!$query) {
            return response()->json(['error' => 'No query provided'], 400);
        }

        // Realiza la búsqueda en los productos y proveedores
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        $suppliers = Supplier::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json(['products' => $products, 'suppliers' => $suppliers]);
    }

    public function update(Request $request, $id)
{
    // Validar los datos enviados
    $request->validate([
        'ciaf_number' => 'nullable|string|max:255',
        'purchase_date_time' => 'required|date',
        'employee_id' => 'required|integer',
        'supplier_id' => 'required|integer',
    ]);

    // Encontrar la compra por su ID
    $purchase = Purchase::findOrFail($id);

    // Actualizar los datos de la compra
    $purchase->ciaf_number = $request->input('ciaf_number');
    $purchase->purchase_date_time = $request->input('purchase_date_time');
    $purchase->employee_id = $request->input('employee_id');
    $purchase->supplier_id = $request->input('supplier_id');

    // Guardar los cambios
    $purchase->save();

    // Redirigir al usuario con un mensaje de éxito
    return redirect()->route('purchases.index')->with('success', 'La compra con ID ' . $id . ' se ha editado correctamente.');
}




}