<?php

namespace App\Models;

use App\BasicComponents\BasicModel;
use App\Interfaces\EntityWithImagesInterface;
use App\Models\Images\ImageSize;
use App\Services\ImageManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property string $image_file
 * @property string $image_name
 *
 * @property Collection $images
 */
class Product extends BasicModel implements EntityWithImagesInterface
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_file',
        'image_name',
    ];

    public function getPathToImages(): string
    {
        return '/images/products/';
    }

    public function getImageFilename(): string
    {
        return 'product_' . time();
    }

    public function getSmallThumbSize(): ImageSize
    {
        return new ImageSize(300, 300);
    }

    public static function boot(): void
    {
        parent::boot();

        self::deleting(static function($model) {
            ImageManager::clearImages($model);
        });
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class,'entity');
    }
}
