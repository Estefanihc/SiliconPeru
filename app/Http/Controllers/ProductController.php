<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importar el modelo Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //método para mostrar la página principal de los productos
    public function index() {
        return view('stores.products.index')->with('products', Product::all()); // Pasar la lista de productos a la vista
    }

    //método para mostrar el formulario para crear un nuevo producto
    public function create() {
        return view('stores.products.create');
    }

    //método para mostrar la información de un producto en específico
    public function show($id) {
        $product = Product::findOrFail($id); // Obtener el producto por ID
        return view('stores.products.show', compact('product')); // Pasar el producto a la vista
    }
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'entry_date' => 'nullable|date',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Crear un nuevo producto
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->entry_date = $validatedData['entry_date'];
        $product->purchase_price = $validatedData['purchase_price'];
        $product->sale_price = $validatedData['sale_price'];
        $product->stock = $validatedData['stock'];
        $product->save();

        // Redirigir a la lista de productos o a una vista de confirmación
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }
}
