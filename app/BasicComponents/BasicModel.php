<?php

namespace App\BasicComponents;

use App\Traits\UpdateOrCreateOnNull;
use Illuminate\Database\Eloquent\Model;

class BasicModel extends Model
{
    use UpdateOrCreateOnNull;

    protected $guarded = [];
}
