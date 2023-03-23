<?php

namespace App\Services\Product;

use App\Interfaces\EntityWithImagesInterface;
use App\Models\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageManager
{
    public static function clearImages(EntityWithImagesInterface $entity): void
    {
        if (!isset($entity->images) || !($entity->images instanceof Collection)) {
            return;
        }
        $entity->images->each(static function(Image $image) {
            $image->delete();
        });
    }

    public static function deleteImageFiles(Image $image): void
    {
        $imagePath = $image->entity->getPathToImages();
        if (!Storage::exists($imagePath . $image->getFileName())) {
            return;
        }
        Storage::delete($imagePath . $image->getFileName());
    }

    public static function saveUploadedImage(EntityWithImagesInterface $entity, UploadedFile $uploadedImage): Image
    {
        $fileName = $entity->getImageFilename();

        $image = new Image();
        $image->original_name = pathinfo($uploadedImage->getClientOriginalName(), PATHINFO_FILENAME);
        $image->original_extension = $uploadedImage->getClientOriginalExtension();
        $image->file_name = $fileName;
        $image->file_extension = $uploadedImage->getClientOriginalExtension();

        $uploadedImage->storeAs($entity->getPathToImages(), $image->getFileName());
        return $image;
    }
}
