<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AllowedToFallFormRequest extends FormRequest
{
    protected bool $hasValidData = true;

    public function hasValidData(): bool
    {
        return $this->hasValidData;
    }

    protected function failedValidation(Validator $validator): void
    {
        $this->hasValidData = false;
    }
}
