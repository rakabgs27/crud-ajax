<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ApiProductController;
use App\Http\Controllers\Api\v1\ApiCategoryController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Middleware\ApiTokenMiddleware;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', ApiTokenMiddleware::class])->group(function () {
    Route::apiResource('v1/product', ApiProductController::class);
    Route::apiResource('v1/category', ApiCategoryController::class);
    Route::get('categories', [ApiProductController::class, 'getCategories'])->name('api.categories.get');
});
