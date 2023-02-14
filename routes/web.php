<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;

// Main page
Route::get('/', [IndexController::class, 'home'])->name('home');

// Project info pages
Route::get('/about', [IndexController::class, 'about'])->name('page-about');

// Product pages
Route::get('/products', [ProductsController::class, 'products'])->name('products-list');
