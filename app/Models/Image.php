<?php

namespace App\Models;

use App\BasicComponents\BasicModel;
use App\Interfaces\EntityWithImagesInterface;
use App\Services\ImageManager;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property string $original_name
 * @property string $original_extension
 * @property string $file_name
 * @property string $file_extension
 * @property string $small_thumb_name
 * @property string $small_thumb_extension
 * @property EntityWithImagesInterface $entity
 */
class Image extends BasicModel
{
    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFileName(bool $withExtension = true): string
    {
        return $withExtension
            ? $this->file_name . '.' . $this->file_extension
            : $this->file_name;
    }

    public function getSmallThumbName(bool $withExtension = true): string
    {
        return $withExtension
            ? $this->small_thumb_name . '.' . $this->small_thumb_extension
            : $this->small_thumb_name;
    }

    public static function boot(): void
    {
        parent::boot();

        self::deleting(static function(self $model) {
            ImageManager::deleteImageFiles($model);
        });
    }
}
