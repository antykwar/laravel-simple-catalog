<?php

namespace App\Http\Controllers;

use App\Actions\Product\UpdateProductAction;
use App\DTOs\ProductData;
use App\Models\Product;
use Illuminate\Http\Request;
use WendellAdriel\ValidatedDTO\Exceptions\CastTargetException;
use WendellAdriel\ValidatedDTO\Exceptions\MissingCastTypeException;

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

    /**
     * @throws CastTargetException
     * @throws MissingCastTypeException
     */
    public function productCreate(Request $request)
    {
        if (!$request->isMethod('POST')) {
            return view('products.create');
        }

        $newProductDTO = ProductData::fromRequest($request);
        UpdateProductAction::execute($newProductDTO);

        return redirect()
            ->route('product-create')
            ->with('success', 'Product successfully added');
    }
}
