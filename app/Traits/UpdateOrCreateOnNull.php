<?php

namespace App\Traits;

use App\BasicComponents\BasicModel;

trait UpdateOrCreateOnNull
{
    public static function updateOrCreateOnNull(array $data): BasicModel
    {
        $model = new static();
        $primaryKeyValue = $data[$model->getKeyName()];

        if (!empty($primaryKeyValue)) {
            $model = static::find($primaryKeyValue);
        }

        unset($data[$model->getKeyName()]);

        $model->fill($data);
        $model->save();

        return $model;
    }
}
