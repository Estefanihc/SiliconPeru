<?php

namespace App\Http\Controllers;

use App\Models\Purchase; // Asegúrate de importar tu modelo
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
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

    // Mostrar la lista de compras
    public function index()
    {
        $purchases = Purchase::all(); // O cualquier lógica que necesites
        return view('stores.purchases.index', compact('purchases'));
    }

        public function show($id)
    {
        // Fetch the purchase by ID
        $purchase = Purchase::findOrFail($id);

        // Return the view with the purchase data
        return view('stores.purchases.show', compact('purchase')); // Updated line
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


}