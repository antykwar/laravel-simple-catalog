<?php

namespace App\Actions\Product;

use App\DataObjects\Product\ProductData;
use App\Models\Product;

class DeleteProductAction
{
    public static function execute(int $productId): ProductData|false
    {
        $product = Product::find($productId);
        if ($product === null) {
            return false;
        }
        $productData = ProductData::from($product);
        $product->delete();
        return $productData;
    }
}
