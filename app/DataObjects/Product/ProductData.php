<?php

namespace App\DataObjects\Product;

use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public ?int $id = null;
    public ?string $name = null;
    public ?float $price = null;
    public ?string $description = null;

    public static function rules(): array
    {
        return [
            'id' => 'integer',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ];
    }
}
