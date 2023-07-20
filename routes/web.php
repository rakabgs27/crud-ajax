<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

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

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store')->withoutMiddleware('auth');
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
// Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::resource('products',ProductController::class);

