<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => ['bail', 'required', 'email', 'min:3', 'max:50', 'unique:users,email'],
            'password' => ['bail', 'required', 'string', 'min:6'],
        ];
    }
}
