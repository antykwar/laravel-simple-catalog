<?php

namespace App\Http\Requests\ProductsImages;

use App\Http\Requests\AllowedToFallFormRequest;

class DeleteRequest extends AllowedToFallFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'imageId' => 'numeric|exists:App\Models\Image,id',
        ];
    }
}
