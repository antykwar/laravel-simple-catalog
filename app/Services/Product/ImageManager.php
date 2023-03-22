<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageManager
{
    public function __construct(public Product $product) {}

    public function clearOldImages(bool $isDeleteMode = false): void
    {
        $imageFile = $this->product->getOriginal('image_file');

        $shouldKeepImage = $isDeleteMode
            ? $imageFile === null
            : $imageFile === null || $imageFile === $this->product->image_file;

        if ($shouldKeepImage || !Storage::exists('/images/products/' . $imageFile)) {
            return;
        }

        Storage::delete('/images/products/' . $imageFile);
    }

    public static function saveUploadedImage(UploadedFile $uploadedImage): string
    {
        $fileName = 'product_' . time() . '.' . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storeAs('/images/products', $fileName);
        return $fileName;
    }
}
