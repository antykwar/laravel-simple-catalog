<?php

namespace App\DataObjects\Product;

use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public ?int $id;

    public string $name;

    public float $price;

    public string $description;

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
