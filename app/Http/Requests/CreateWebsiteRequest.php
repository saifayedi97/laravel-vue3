<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWebsiteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'url' => 'required|url',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
