<?php

namespace App\Actions\Product;

use App\DataObjects\Product\ProductData;
use App\Models\Product;

class UpdateProductAction
{
    public static function execute(ProductData $productData): ProductData
    {
        $product = Product::updateOrCreateOnNull($productData);
        return ProductData::from($product);
    }
}
