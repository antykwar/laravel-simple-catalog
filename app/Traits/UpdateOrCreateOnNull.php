<?php

namespace App\Traits;

use App\BasicComponents\BasicModel;

trait UpdateOrCreateOnNull
{
    public static function updateOrCreateOnNull(array $data): BasicModel
    {
        $model = new static();
        $keyName = $model->getKeyName();
        $primaryKeyValue = $data[$keyName] ?? null;

        if (!empty($primaryKeyValue)) {
            $model = static::find($primaryKeyValue);
        }

        if (isset($data[$keyName])) {
            unset($data[$keyName]);
        }

        $model->fill($data);
        $model->save();

        return $model;
    }
}
