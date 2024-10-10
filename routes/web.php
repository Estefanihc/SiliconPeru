<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPurchaseController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Vista principal
Route::get('/', HomeController::class); 

Route::controller(EmployeeController::class)->group(function() {
    Route::get('/employees', 'index')->name('employees.index');
    Route::get('/employees/create', 'create')->name('employees.create');
    Route::get('/employees/{employee}', 'show')->name('employees.show');
    Route::post('/employees', 'store')->name('employees.store');
    Route::get('/employees/{employee}/edit', 'edit')->name('employees.edit');
    Route::put('/employees/{employee}', 'update')->name('employees.update');
    Route::delete('/employees/{employee}', 'destroy')->name('employees.destroy');
});

// Vista de productos
Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index')->name('products.index'); // Lista de productos
    Route::get('/products/create', 'create')->name('products.create'); // Formulario para crear producto
    Route::post('/products', 'store')->name('products.store'); // Guardar el nuevo producto
    Route::get('/products/{product}', 'show')->name('products.show'); // Ver detalles del producto
});

// Vista de proveedores
Route::controller(SupplierController::class)->group(function() {
    Route::get('/suppliers', 'index')->name('suppliers.index');
    Route::get('/suppliers/create', 'create')->name('suppliers.create');
    Route::post('/suppliers', 'store')->name('suppliers.store');
    Route::get('/suppliers/{supplier}', 'show')->name('suppliers.show');
});

//Vista de compras
Route::controller(PurchaseController::class)->group(function() {
    Route::get('/purchases', 'index')->name('compras.index'); // Asignar el nombre a esta ruta
    Route::get('/purchases/create', 'create')->name('compras.create'); // Asignar nombre a crear
    Route::get('/purchases/{purchase}', 'show')->name('compras.show'); // Asignar nombre a mostrar
});

//Vista de relación productos -> compras
Route::controller(ProductPurchaseController::class)->group(function() {
    Route::get('/productsPurchases', 'index');
    Route::get('/productsPurchases/create', 'create');
    Route::get('/productsPurchases/{productPurchase}', 'show');
});

/*
Route::group([], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

*/


/*
// Ruta del dashboard sin autenticación
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth']);
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); // Middleware auth eliminado temporalmente



/*
//Vista de empleados
Route::controller(EmployeeController::class)->group(function() {
    Route::get('/employees', 'index')->name('employees.index'); // Listar empleados
    Route::get('/employees/create', 'create')->name('employees.create'); // Formulario para crear un empleado
    Route::get('/employees/{employee}', 'show')->name('employees.show'); // Mostrar un empleado específico
});
*/

/*
//Vista de proveedores
Route::controller(SupplierController::class)->group(function() {
    Route::get('/suppliers', 'index');
    Route::get('/suppliers/create', 'create');
    Route::get('/suppliers/{supplier}', 'show');
});
*/


/*
//Vista de empleados
Route::controller(EmployeeController::class)->middleware('auth')->group(function() {
    Route::get('/employees', 'index');
    Route::get('/employees/create', 'create');
    Route::get('/employees/{employee}', 'show');
});

//Vista de productos
Route::controller(ProductController::class)->middleware('auth')->group(function() {
    Route::get('/products', 'index')->name('products.index'); // Asigna el nombre a la ruta
    Route::get('/products/create', 'create')->name('products.create'); // Asigna el nombre a la ruta
    Route::get('/products/{product}', 'show')->name('products.show'); // Asigna el nombre a la ruta
});
*/
/*
//Vista de proveedores
Route::controller(SupplierController::class)->middleware('auth')->group(function() {
    Route::get('/suppliers', 'index');
    Route::get('/suppliers/create', 'create');
    Route::get('/suppliers/{supplier}', 'show');
});

//Vista de compras
Route::controller(PurchaseController::class)->middleware('auth')->group(function() {
    Route::get('/purchases', 'index');
    Route::get('/purchases/create', 'create');
    Route::get('/purchases/{purchase}', 'show');
});

//Vista de relación productos -> compras
Route::controller(ProductPurchaseController::class)->middleware('auth')->group(function() {
    Route::get('/productsPurchases', 'index');
    Route::get('/productsPurchases/create', 'create');
    Route::get('/productsPurchases/{productPurchase}', 'show');
});
*/

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/

