<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products',ProductController::class);
Route::get('/categories',[ProductController::class, 'getCategories'])->name('categories.get');


