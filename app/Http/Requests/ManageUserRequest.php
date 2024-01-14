<?php

namespace App\Http\Requests;

use App\Enums\UserRoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ManageUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['bail', 'required', 'string', 'min:3', 'max:50'],
            'last_name' => ['bail', 'required', 'string', 'min:3', 'max:50'],
            'email' => ['bail', 'required', 'email', 'min:3', 'max:50', 'unique:users,email'],
            'password' => ['bail', 'required', 'string', 'min:6'],
            'role' => ['required', new Enum(UserRoleEnum::class)]
        ];
    }
}
