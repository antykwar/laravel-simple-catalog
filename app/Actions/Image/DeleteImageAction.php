<?php

namespace App\Actions\Image;

use App\Models\Image;

class DeleteImageAction
{
    public static function execute(int $imageId): Image|false
    {
        $image = Image::find($imageId);
        if ($image === null) {
            return false;
        }
        $image->delete();
        return $image;
    }
}
