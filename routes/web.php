<?php

use App\Http\Controllers\DashboardController;
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

Route::get('/search', [PurchaseController::class, 'search']);


//Vista principal
Route::middleware(['auth'])->group(function () {
    Route::get('/home', HomeController::class)->name('home'); 
});

//Vista de Dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])  // Asegúrate de que el middleware 'auth' esté presente
    ->name('dashboard');



// Vista de empleados
Route::middleware(['auth'])->group(function () {
    Route::controller(EmployeeController::class)->group(function() {
        Route::get('/employees', 'index')->name('employees.index');
        Route::get('/employees/create', 'create')->name('employees.create');
        Route::get('/employees/{employee}', 'show')->name('employees.show');
        Route::post('/employees', 'store')->name('employees.store');
        Route::get('/employees/{employee}/edit', 'edit')->name('employees.edit');
        Route::put('/employees/{employee}', 'update')->name('employees.update');
        Route::delete('/employees/{employee}', 'destroy')->name('employees.destroy');
    });
});

// Vista de productos
Route::middleware(['auth'])->group(function () {
    Route::controller(ProductController::class)->group(function() {
        Route::get('/products', 'index')->name('products.index'); // Lista de productos
        Route::get('/products/create', 'create')->name('products.create'); // Formulario para crear producto
        Route::post('/products', 'store')->name('products.store'); // Guardar el nuevo producto
        Route::get('/products/{product}', 'show')->name('products.show'); // Ver detalles del producto
        Route::get('/products/{product}/edit', 'edit')->name('products.edit'); // Editar producto
        Route::put('/products/{product}', 'update')->name('products.update'); //Actualizar producto
        Route::delete('/products/{product}', 'destroy')->name('products.destroy'); //Eliminar producto
    });
});

// Vista de proveedores
Route::middleware(['auth'])->group(function () {
    Route::controller(SupplierController::class)->group(function() {
        Route::get('/suppliers', 'index')->name('suppliers.index');
        Route::get('/suppliers/create', 'create')->name('suppliers.create');
        Route::post('/suppliers', 'store')->name('suppliers.store');
        Route::get('/suppliers/{supplier}', 'show')->name('suppliers.show');
        Route::get('/suppliers/{supplier}/edit', 'edit')->name('suppliers.edit'); // Ruta para editar
        Route::put('/suppliers/{supplier}', 'update')->name('suppliers.update'); // Ruta para actualizar
        Route::delete('/suppliers/{supplier}', 'destroy')->name('suppliers.destroy');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::controller(PurchaseController::class)->group(function() {
        Route::get('/purchases', 'index')->name('purchases.index');
        Route::get('/purchases/create', 'create')->name('purchases.create');
        Route::post('/purchases', 'store')->name('purchases.store');
        Route::get('/purchases/{purchase}', 'show')->name('purchases.show');
        Route::get('/purchases/{purchase}/edit', 'edit')->name('purchases.edit'); // Ruta para editar
        Route::put('/purchases/{purchase}', 'update')->name('purchases.update'); // Ruta para actualizar
        Route::delete('/purchases/{purchase}', 'destroy')->name('purchases.destroy');
    });
});




//Vista de relación productos -> compras
Route::middleware(['auth'])->group(function () {
    Route::controller(ProductPurchaseController::class)->group(function() {
        Route::get('/productsPurchases', 'index')->name('productsPurchases.index');
        Route::get('/productsPurchases/create', 'create')->name('productsPurchases.create');
        Route::post('/productsPurchases', 'store')->name('productsPurchases.store');
        Route::get('/productsPurchases/{productPurchase}', 'show')->name('productsPurchases.show');
        Route::get('/productsPurchases/{productPurchase}/edit', 'edit')->name('productsPurchases.edit'); // Ruta para editar
        Route::put('/productsPurchases/{productPurchase}', 'update')->name('productsPurchases.update'); // Ruta para actualizar
        Route::delete('/productsPurchases/{productPurchase}', 'destroy')->name('productsPurchases.destroy');
    });
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