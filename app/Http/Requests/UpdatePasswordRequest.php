<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
       return [
            'current_password' => ['bail', 'required', 'string'],
            'password'         => ['bail', 'required', 'string', 'min:6', 'max:120', 'confirmed', 'different:current_password'],
        ];
    }
}
