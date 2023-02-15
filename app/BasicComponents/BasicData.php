<?php

namespace App\BasicComponents;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\ValidatedDTO\ValidatedDTO;

abstract class BasicData extends ValidatedDTO
{
    public function toModel(?string $model = null): Model
    {
        if ($model === null) {
            $model = static::getModelClass();
        }
        return parent::toModel($model);
    }

    abstract protected static function getModelClass(): string;
}
