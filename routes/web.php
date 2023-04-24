<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;

Route::get('/', [IndexController::class, 'home'])->name('home');

Route::prefix('products')->group(static function() {
    Route::get('list', [ProductsController::class, 'productList'])
        ->name('products-list');

    Route::get('show/{productId}', [ProductsController::class, 'productCard'])
        ->name('product-card');

    Route::get('create', [ProductsController::class, 'productUpdateForm'])
        ->name('product-create-form');
    Route::post('create', [ProductsController::class, 'productUpdate'])
        ->name('product-create');
    Route::get('{productId}/edit', [ProductsController::class, 'productUpdateForm'])
        ->name('product-edit-form');

    Route::post('delete', [ProductsController::class, 'productDelete'])
        ->name('product-delete');
});
