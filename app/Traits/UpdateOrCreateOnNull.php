<?php

namespace App\Traits;

use App\BasicComponents\BasicData;
use App\BasicComponents\BasicModel;

trait UpdateOrCreateOnNull
{
    public static function updateOrCreateOnNull(BasicData $data): BasicModel
    {
        $model = new static();
        $primaryKeyValue = $data->{$model->getKeyName()};

        if (!empty($primaryKeyValue)) {
            $model = static::find($primaryKeyValue);
        }

        $dataToFill = $data->toArray();
        unset($dataToFill[$model->getKeyName()]);

        $model->fill($dataToFill);
        $model->save();

        return $model;
    }
}
