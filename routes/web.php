<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['authWeb'])->group(function () {

    Route::get('/ApiProduct/index', function () {
        return view('ApiProduct/index');
    });

    Route::resource('products', ProductController::class);
    Route::get('/categories', [ProductController::class, 'getCategories'])->name('categories.get');
});


