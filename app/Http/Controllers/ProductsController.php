<?php

namespace App\Http\Controllers;

use App\Actions\Product\UpdateProductAction;
use App\DataObjects\Product\ProductData;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function productList()
    {
        $products = Product::query()
            ->orderBy('price')
            ->paginate(5);

        return view('product.list')
            ->with('products', $products);
    }

    public function productCard(int $productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            abort(404);
        }
        $productData = ProductData::from($product);

        return view('product.card')
            ->with('productData', $productData);
    }

    public function productUpdateForm(?int $productId = null)
    {
        $product = new Product();
        if ($productId && !$product = Product::find($productId)) {
            abort(404);
        }

        $productData = ProductData::from($product);
        return view('product.update')
            ->with('productData', $productData);
    }

    public function productUpdate(Request $request): RedirectResponse
    {
        $newProductDTO = ProductData::from($request);
        $productData = UpdateProductAction::execute($newProductDTO);

        $operationName = ($newProductDTO->id !== null) ? 'UPDATED' : 'ADDED';
        $successMessage = "Product successfully {$operationName}!";

        return redirect()
            ->route('product-edit-form', ['productId' => $productData->id])
            ->with('success', $successMessage);
    }
}
