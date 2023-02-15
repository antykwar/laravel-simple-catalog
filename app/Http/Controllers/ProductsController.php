<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function productList()
    {
        $products = Product::query()
            ->orderBy('price')
            ->paginate(5);

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

    public function productCreate(Request $request)
    {
        if (!$request->isMethod('POST')) {
            return view('products.create');
        }

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $postData = $request->post();
        $newProduct = new Product();
        $newProduct->name = $postData['name'];
        $newProduct->price = $postData['price'];
        $newProduct->description = $postData['description'];
        $newProduct->save();

        return redirect()
            ->route('product-create')
            ->with('success', 'Product successfully added');
    }
}
