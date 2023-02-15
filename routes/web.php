<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;

Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('/about', [IndexController::class, 'about'])->name('page-about');

Route::prefix('products')->group(static function() {
    Route::get('list', [ProductsController::class, 'productList'])->name('products-list');
    Route::get('{productId}', [ProductsController::class, 'productCard'])->name('product-card');
});
