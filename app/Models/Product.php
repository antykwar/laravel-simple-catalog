<?php

namespace App\Models;

use App\BasicComponents\BasicModel;
use App\Services\Product\ImageManager;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property string $image_file
 * @property string $image_name
 */
class Product extends BasicModel
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_file',
        'image_name',
    ];

    public static function boot(): void
    {
        parent::boot();

        self::updating(static function($model) {
            $imageManager = new ImageManager($model);
            $imageManager->clearOldImages();
        });
        self::deleting(static function($model) {
            $imageManager = new ImageManager($model);
            $imageManager->clearOldImages(isDeleteMode: true);
        });
    }
}
