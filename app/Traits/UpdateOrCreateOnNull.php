<?php

namespace App\Traits;

use App\BasicComponents\BasicModel;
use Spatie\LaravelData\Data;

trait UpdateOrCreateOnNull
{
    public static function updateOrCreateOnNull(Data $data): BasicModel
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
