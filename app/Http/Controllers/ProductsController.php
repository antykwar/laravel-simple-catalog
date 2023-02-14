<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::query()
            ->orderBy('price')
            ->paginate(1);

        return view('products')->with('products', $products);
    }

    public function productCard(int $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            abort(404);
        }

        return view('product-card')->with('product', $product);
    }
}
