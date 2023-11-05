<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ConocenosController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//RUTAS DE INGRESAR PRODUCTO
Route::get('/dashboard', [ProductoController::class, 'index'])->name('dashboard');
Route::get('/dashboard/create', [ProductoController::class, 'create'])->name('create');
Route::post('/dashboard', [ProductoController::class, 'store'])->name('store');
Route::get('/dashboard/{producto}', [ProductoController::class, 'show'])->name('show');
Route::get('/dashboard/{producto}/edit', [ProductoController::class, 'edit'])->name('edit');
Route::put('/dashboard/{producto}', [ProductoController::class, 'update'])->name('update');
Route::delete('/dashboard/{producto}', [ProductoController::class, 'destroy'])->name('destroy');
Route::get('/buscarProducto', [ProductoController::class, 'buscarProducto'])->name('buscarProducto');
//RUTAS DE INGRESAR VENTAS
Route::get('/ventas/createV', [VentaController::class, 'create'])->name('createV');
Route::post('/ventas', [VentaController::class, 'store'])->name('storeV');
Route::get('/ventas', [VentaController::class, 'index'])->name('ventas');
Route::get('/ventas/{venta}', [VentaController::class, 'show'])->name('showV');
Route::get('/ventas/{venta}/editV', [VentaController::class, 'edit'])->name('editV');
Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('updateV');
Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('destroyV');
Route::get('/generarReporteVentas', [VentaController::class, 'generarReporteVentas'])->name('generarReporteVentas');
Route::get('/consultarVentasPorProducto', [VentaController::class, 'consultarVentasPorProducto'])->name('consultarVentasPorProducto');
Route::get('/consultarVentasPorFecha', [VentaController::class, 'consultarVentasPorFecha'])->name('consultarVentasPorFecha');
//CONOCENOS
Route::get('/conocenos', [ConocenosController::class, 'index'])->name('conocenos');
require __DIR__.'/auth.php';
