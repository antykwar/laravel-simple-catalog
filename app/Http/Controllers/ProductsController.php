<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function productList()
    {
        $products = Product::query()
            ->orderBy('price')
            ->paginate(1);

        return view('products.list')->with('products', $products);
    }

    public function productCard(int $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            abort(404);
        }

        return view('products.card')->with('product', $product);
    }
}
