<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
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
Route::get('/dashboard', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/dashboard/create', [ProductoController::class, 'create'])->name('productos.create');
Route::post('/dashboard', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/dashboard/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/dashboard/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/dashboard/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/dashboard/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

require __DIR__.'/auth.php';
