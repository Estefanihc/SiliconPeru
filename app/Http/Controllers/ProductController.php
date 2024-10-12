<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importar el modelo Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Método para mostrar la página principal de los productos
    public function index() {
        // Llamar todos los registros
        $products = Product::paginate(5);
        
        return view('stores.products.index', compact('products')); // Pasar la lista de productos a la vista
    }

    // Método para mostrar el formulario para crear un nuevo producto
    public function create()
{
    // Si no necesitas un producto específico, puedes crear un objeto vacío.
    // Esto es útil si solo estás creando un nuevo producto y no estás editando uno existente.
    $product = new Product(); // Asegúrate de que Product sea el modelo correcto.

    return view('stores.products.create', compact('product'));
}


    // Método para mostrar la información de un producto en específico
    public function show(Product $product) {
        return view('stores.products.show', compact('product')); // Pasar el producto a la vista
    }

    // Método para mostrar el formulario de edición
    public function edit(Product $product) {
        return view('stores.products.edit', compact('product'));
    }

    // Método para almacenar un nuevo producto
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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
    ]);

    // Calcular el margen de ganancia
    $purchasePrice = $validatedData['purchase_price'];
    $salePrice = $validatedData['sale_price'];
    $profitMargin = ($salePrice > 0) ? (($salePrice - $purchasePrice) / $salePrice) * 100 : 0;
    $validatedData['profit_margin'] = $profitMargin;

    // Crear un nuevo producto
    $product = new Product();
    $this->fillProduct($product, $validatedData);

    // Manejar la imagen
    if ($request->hasFile('image')) {
        $product->image = $request->file('image')->store('images', 'public');
    }

    $product->save();

    // Redirigir a la lista de productos o a una vista de confirmación
    return redirect()->route('products.show', $product)->with('success', 'Producto creado exitosamente.');
}

    // Método para actualizar un producto existente
    public function update(Request $request, Product $product)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
            'entry_date' => 'nullable|date',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock' => 'required|integer',
            'profit_margin' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
        ]);

        // Actualizar el producto existente
        $this->fillProduct($product, $validatedData);

        // Manejar la imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($product->image) {
                Storage::delete($product->image);
            }
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save(); // Guardar los cambios

        // Redirigir a la lista de productos o a una vista de confirmación
        return redirect()->route('products.show', $product)->with('success', 'Producto actualizado exitosamente.');
    }

    // Método para llenar las propiedades del producto
    protected function fillProduct(Product $product, array $data)
    {
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->entry_date = $data['entry_date'];
        $product->purchase_price = $data['purchase_price'];
        $product->sale_price = $data['sale_price'];
        $product->stock = $data['stock'];
        $product->profit_margin = $data['profit_margin'];
    }

   
}
