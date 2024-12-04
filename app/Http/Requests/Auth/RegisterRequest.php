<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => ['required', 'string', 'min:2'],
            'email'     => ['required', 'string', 'email', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
        ];
    }
}
