<?php

namespace App\Actions\Product;

use App\BasicComponents\BasicModel;
use App\DTOs\ProductData;
use App\Models\Product;

class UpdateProductAction
{
    public static function execute(ProductData $productData): BasicModel
    {
        return Product::updateOrCreateOnNull($productData);
    }
}
