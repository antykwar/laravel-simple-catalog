<?php

namespace App\Actions\Product;

use App\Http\Requests\ProductsUpdateRequest;
use App\Models\Product;
use App\Services\Product\ImageManager;

class UpdateProductAction
{
    public static function execute(ProductsUpdateRequest $request): Product
    {
        $data = $request->post();
        $image = null;

        if ($uploadedImage = $request->file('image')) {
            $image = ImageManager::saveUploadedImage(new Product(), $uploadedImage);
        }

        /** @var Product $product */
        $product = Product::updateOrCreateOnNull($data);
        if ($image) {
            $product->images()->save($image);
        }

        return $product;
    }
}
