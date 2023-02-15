<?php

namespace App\DTOs;

use App\BasicComponents\BasicData;
use App\Models\Product;

class ProductData extends BasicData
{
    public ?int $id;

    public string $name;

    public float $price;

    public string $description;

    protected static function getModelClass(): string
    {
        return Product::class;
    }

    protected function rules(): array
    {
        return [
            'id' => 'integer',
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ];
    }

    protected function defaults(): array
    {
        return [
            'id' => null,
        ];
    }

    protected function casts(): array
    {
        return [];
    }
}
