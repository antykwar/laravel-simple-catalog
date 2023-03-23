<?php

namespace App\Models;

use App\BasicComponents\BasicModel;
use App\Interfaces\EntityWithImagesInterface;
use App\Services\Product\ImageManager;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property string $original_name
 * @property string $original_extension
 * @property string $file_name
 * @property string $file_extension
 *
 * @property EntityWithImagesInterface $entity
 */
class Image extends BasicModel
{
    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFileName(): string
    {
        return $this->file_name . '.' . $this->file_extension;
    }

    public static function boot(): void
    {
        parent::boot();

        self::deleting(static function(self $model) {
            ImageManager::deleteImageFiles($model);
        });
    }
}
