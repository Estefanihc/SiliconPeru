<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Employee; // Asegúrate de que el modelo Employee esté incluido
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class PurchaseController extends Controller
{
    // Método para mostrar la página principal de las compras
    public function index()
    {
        $purchases = Purchase::paginate(15);
        return view('stores.purchases.index', compact('purchases'));
    }

    // Método para mostrar detalles de una compra específica
    public function show($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('stores.purchases.show', compact('purchase')); 
    }

    // Mostrar el formulario de crear nueva compra con listas de empleados y proveedores
    public function create()
    {
        // Obtener empleados y proveedores de la base de datos
        $employees = Employee::all(); 
        $suppliers = Supplier::all();

        return view('stores.purchases.create', compact('employees', 'suppliers'));
    }

    // Almacenar la nueva compra
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'ciaf_number' => 'nullable|string|max:255',
            'purchase_date_time' => 'required|date',
            'employee_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'product_id' => 'required|integer', // Validar el ID del producto
            'quantity' => 'required|integer|min:1', // Validar la cantidad
        ]);

        try {
            // Crear la compra en la base de datos
            $purchase = Purchase::create([
                'ciaf_number' => $request->ciaf_number,
                'purchase_date_time' => $request->purchase_date_time,
                'employee_id' => $request->employee_id,
                'supplier_id' => $request->supplier_id,
                'price' => $request->price,
            ]);

            // Agrega los detalles de productos aquí
            $productPurchases = [
                'purchase_id' => $purchase->id,
                'product_id' => $request->product_id, // Usar el ID del producto del request
                'quantity_purchased' => $request->quantity, // Usar la cantidad del request
            ];

            // Inserta los detalles del producto en la tabla product_purchases
            DB::table('product_purchases')->insert($productPurchases); // Asegúrate de que el modelo de producto esté correctamente insertado

            // Redirigir con un mensaje de éxito
            return redirect()->route('purchases.index')->with('success', 'Compra registrada exitosamente.');
            
        } catch (\Exception $e) {
            // Manejar el error y redirigir con un mensaje de error
            return redirect()->back()->withErrors(['error' => 'Error al registrar la compra: ' . $e->getMessage()]);
        }
    }

    // Método para realizar la búsqueda de productos y proveedores
    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json(['error' => 'No query provided'], 400);
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")->get();
        $suppliers = Supplier::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json(['products' => $products, 'suppliers' => $suppliers]);
    }

    // Método para actualizar los detalles de una compra
    public function update(Request $request, $id)
    {
        $request->validate([
            'ciaf_number' => 'nullable|string|max:255',
            'purchase_date_time' => 'required|date',
            'employee_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'price' => 'nullable|numeric|min:0', // Opcional si no deseas actualizar el precio
            'product_id' => 'required|integer', // Validar el ID del producto
            'quantity' => 'required|integer|min:1', // Validar la cantidad
        ]);

        $purchase = Purchase::findOrFail($id);

        $purchase->ciaf_number = $request->input('ciaf_number');
        $purchase->purchase_date_time = $request->input('purchase_date_time');
        $purchase->employee_id = $request->input('employee_id');
        $purchase->supplier_id = $request->input('supplier_id');
        
        // Actualizar el precio solo si se proporciona
        if ($request->has('price')) {
            $purchase->price = $request->input('price');
        }

        $purchase->save();

        // Aquí podrías actualizar los detalles del producto, si es necesario

        return redirect()->route('purchases.index')->with('success', 'La compra con ID ' . $id . ' se ha editado correctamente.');
    }
}
