<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ListaPrecioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RequerimientoController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\VariacionController;
use App\Http\Controllers\VariacionListaPreciosController;
use App\Livewire\Administrador\Producto;
use App\Livewire\Administrador\ProductoCrear;
use App\Livewire\Administrador\RequerimientoCrear;
use App\Livewire\Counter;

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

//http://erp.modernoglamour.local
Route::domain('erp.modernoglamour.local')->group(function () {
    Route::get('/', function () {
        return 'ERP';
    });
    // Más rutas para erp
});

//http://punto.modernoglamour.local
Route::domain('punto.modernoglamour.local')->group(function () {
    Route::get('/', function () {
        return 'PUNTO DE VENTA';
    });
    // Más rutas para punto
});

//http://modernoglamour.local
Route::domain('modernoglamour.local')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });    
});

Route::controller(MarcaController::class)->group(function () {
    Route::get('marca', 'vistaTodas')->name('marca.vista.todas');
    Route::get('marca/crear', 'vistaCrear')->name('marca.vista.crear');
    Route::post('marca/crear', 'crear')->name('marca.crear');
    Route::get('marca/ver/{id}', 'vistaVer')->name('marca.vista.ver');
    Route::get('marca/editar/{id}', 'vistaEditar')->name('marca.vista.editar');
    Route::put('marca/editar/{id}', 'editar')->name('marca.editar');
    Route::delete('marca/eliminar/{id}', 'eliminar')->name('marca.eliminar');
});

Route::controller(ColorController::class)->group(function () {
    Route::get('color', 'vistaTodas')->name('color.vista.todas');
    Route::get('color/crear', 'vistaCrear')->name('color.vista.crear');
    Route::post('color/crear', 'crear')->name('color.crear');
    Route::get('color/ver/{id}', 'vistaVer')->name('color.vista.ver');
    Route::get('color/editar/{id}', 'vistaEditar')->name('color.vista.editar');
    Route::put('color/editar/{id}', 'editar')->name('color.editar');
    Route::delete('color/eliminar/{id}', 'eliminar')->name('color.eliminar');
});

Route::controller(TallaController::class)->group(function () {
    Route::get('talla', 'vistaTodas')->name('talla.vista.todas');
    Route::get('talla/crear', 'vistaCrear')->name('talla.vista.crear');
    Route::post('talla/crear', 'crear')->name('talla.crear');
    Route::get('talla/ver/{id}', 'vistaVer')->name('talla.vista.ver');
    Route::get('talla/editar/{id}', 'vistaEditar')->name('talla.vista.editar');
    Route::put('talla/editar/{id}', 'editar')->name('talla.editar');
    Route::delete('talla/eliminar/{id}', 'eliminar')->name('talla.eliminar');
});

Route::controller(CategoriaController::class)->group(function () {
    Route::get('categoria', 'vistaTodas')->name('categoria.vista.todas');
    Route::get('categoria/crear', 'vistaCrear')->name('categoria.vista.crear');
    Route::post('categoria/crear', 'crear')->name('categoria.crear');
    Route::get('categoria/ver/{id}', 'vistaVer')->name('categoria.vista.ver');
    Route::get('categoria/editar/{id}', 'vistaEditar')->name('categoria.vista.editar');
    Route::put('categoria/editar/{id}', 'editar')->name('categoria.editar');
    Route::delete('categoria/eliminar/{id}', 'eliminar')->name('categoria.eliminar');
});

Route::controller(SubcategoriaController::class)->group(function () {
    Route::get('subcategoria', 'vistaTodas')->name('subcategoria.vista.todas');
    Route::get('subcategoria/crear', 'vistaCrear')->name('subcategoria.vista.crear');
    Route::post('subcategoria/crear', 'crear')->name('subcategoria.crear');
    Route::get('subcategoria/ver/{id}', 'vistaVer')->name('subcategoria.vista.ver');
    Route::get('subcategoria/editar/{id}', 'vistaEditar')->name('subcategoria.vista.editar');
    Route::put('subcategoria/editar/{id}', 'editar')->name('subcategoria.editar');
    Route::delete('subcategoria/eliminar/{id}', 'eliminar')->name('subcategoria.eliminar');
});

Route::controller(ProductoController::class)->group(function () {
    Route::get('producto', 'vistaTodas')->name('producto.vista.todas');
    Route::get('producto/crear', 'vistaCrear')->name('producto.vista.crear');
    Route::post('producto/crear', 'crear')->name('producto.crear');
    Route::get('producto/ver/{id}', 'vistaVer')->name('producto.vista.ver');
    Route::get('producto/editar/{id}', 'vistaEditar')->name('producto.vista.editar');
    Route::put('producto/editar/{id}', 'editar')->name('producto.editar');
    Route::delete('producto/eliminar/{id}', 'eliminar')->name('producto.eliminar');
});

Route::controller(VariacionController::class)->group(function () {
    Route::get('variacion', 'vistaTodas')->name('variacion.vista.todas');
});

Route::controller(InventarioController::class)->group(function () {
    Route::get('inventario', 'vistaTodas')->name('inventario.vista.todas');
    Route::get('inventario/editar/{id}', 'vistaEditar')->name('inventario.vista.editar');
    Route::put('inventario/editar/{id}', 'editar')->name('inventario.editar');
    Route::delete('inventario/eliminar/{id}', 'eliminar')->name('inventario.eliminar');
});

//Route::get('/counter', Counter::class);
Route::get('/administrador/producto/crear', ProductoCrear::class)->name('administrador.producto.crear');

Route::controller(ListaPrecioController::class)->group(function () {
    Route::get('lista-precio', 'vistaTodas')->name('lista.precio.vista.todas');
    Route::get('lista-precio/crear', 'vistaCrear')->name('lista.precio.vista.crear');
    Route::post('lista-precio/crear', 'crear')->name('lista.precio.crear');
    Route::get('lista-precio/ver/{id}', 'vistaVer')->name('lista.precio.vista.ver');
    Route::get('lista-precio/editar/{id}', 'vistaEditar')->name('lista.precio.vista.editar');
    Route::put('lista-precio/editar/{id}', 'editar')->name('lista.precio.editar');
    Route::delete('lista-precio/eliminar/{id}', 'eliminar')->name('lista.precio.eliminar');
});

Route::controller(VariacionListaPreciosController::class)->group(function () {
    Route::get('variacion-lista-precio/crear/{id}', 'vistaCrear')->name('variacion.lista.precio.vista.crear');
    Route::put('variacion-lista-precio/crear/{id}', 'crear')->name('variacion.lista.precio.crear');
});

Route::controller(RequerimientoController::class)->group(function () {
    Route::get('requerimiento', 'vistaTodas')->name('requerimiento.vista.todas');
    Route::get('requerimiento/crear', 'vistaCrear')->name('requerimiento.vista.crear');
    Route::post('requerimiento/crear', 'crear')->name('requerimiento.crear');
    Route::get('requerimiento/ver/{id}', 'vistaVer')->name('requerimiento.vista.ver');
    Route::get('requerimiento/editar/{id}', 'vistaEditar')->name('requerimiento.vista.editar');
    Route::put('requerimiento/editar/{id}', 'editar')->name('requerimiento.editar');
    Route::delete('requerimiento/eliminar/{id}', 'eliminar')->name('requerimiento.eliminar');
    Route::put('requerimiento/aprobar/{id}', 'aprobar')->name('requerimiento.aprobar');
});

Route::get('/administrador/requerimiento/crear', RequerimientoCrear::class)->name('administrador.requerimiento.crear');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
