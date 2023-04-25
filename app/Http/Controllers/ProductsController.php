<?php

namespace App\Http\Controllers;

use App\Actions\Product\DeleteProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Http\Requests\Products\UpdateRequest;
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

        return view('product.card')
            ->with('product', $product);
    }

    public function productUpdateForm(?int $productId = null)
    {
        $product = new Product();
        if ($productId && !$product = Product::find($productId)) {
            abort(404);
        }

        return view('product.update')
            ->with('product', $product);
    }

    public function productUpdate(UpdateRequest $request): RedirectResponse
    {
        $product = UpdateProductAction::execute($request);

        $operationName = ($request->post('id') !== null) ? 'UPDATED' : 'ADDED';
        $successMessage = "Product successfully {$operationName}!";

        return redirect()
            ->route('product-edit-form', ['productId' => $product->id])
            ->with('success', $successMessage);
    }

    public function productDelete(Request $request): RedirectResponse
    {
        $productId = (int)$request->post('productId');

        if (!$productId) {
            return redirect()
                ->route('products-list')
                ->with('error', 'Missing product ID!');
        }

        $deletedProduct = DeleteProductAction::execute($productId);
        if ($deletedProduct === false) {
            return redirect()
                ->route('products-list')
                ->with('error', "Product with ID={$productId} not found!");
        }

        return redirect()
            ->route('products-list')
            ->with('success', "{$deletedProduct->name} (ID={$deletedProduct->id}) successfully removed!");
    }
}
