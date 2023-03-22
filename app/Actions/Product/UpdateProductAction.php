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

        if ($uploadedImage = $request->file('image')) {
            $fileName = ImageManager::saveUploadedImage($uploadedImage);
            $data['image_file'] = $fileName;
            $data['image_name'] = $uploadedImage->getClientOriginalName();
        }

        /** @var Product $product */
        $product = Product::updateOrCreateOnNull($data);
        return $product;
    }
}
