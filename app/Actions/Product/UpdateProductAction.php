<?php

namespace App\Actions\Product;

use App\Http\Requests\Products\UpdateRequest;
use App\Models\Product;
use App\Services\ImageManager;

class UpdateProductAction
{
    public static function execute(UpdateRequest $request): Product
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
