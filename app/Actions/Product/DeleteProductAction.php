<?php

namespace App\Actions\Product;

use App\Models\Product;

class DeleteProductAction
{
    public static function execute(int $productId): Product|false
    {
        $product = Product::find($productId);
        if ($product === null) {
            return false;
        }
        $product->delete();
        return $product;
    }
}
