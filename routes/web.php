<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RickMortyController;

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

Route::get('/dashboard', [OrderController::class, 'view'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/order/save', [OrderController::class, 'create'])->middleware(['auth', 'verified'])->name('saveOrder');
Route::get('/order/{id_orden}', [OrderController::class, 'detalle'])->middleware(['auth', 'verified'])->name('detalle.orden');
Route::get('/order/data/update', [OrderController::class, 'datos_update'])->middleware(['auth', 'verified'])->name('detalle.datos_update');
Route::post('/order/update/save', [OrderController::class, 'update'])->middleware(['auth', 'verified'])->name('updateOrder');
Route::get('/order/data/delete', [OrderController::class, 'delete'])->middleware(['auth', 'verified'])->name('deleteOrder');
Route::get('/order/reporte/orden/{id}', [OrderController::class, 'reporte'])->middleware(['auth', 'verified'])->name('reporteOrder');


Route::get('/users', [UsersController::class, 'admin'])->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/archivo/carga', [PdfController::class, 'index'])->middleware(['auth', 'verified'])->name('carga.index');
Route::post('/archivo/save', [PdfController::class, 'save'])->middleware(['auth', 'verified'])->name('carga.save');

Route::get('/api/index', [RickMortyController::class, 'index'])->middleware(['auth', 'verified'])->name('api.ram');
