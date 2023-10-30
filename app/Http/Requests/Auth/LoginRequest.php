<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => 'required|min:8|max:13|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Заполните поле "Телефон" (:attribute)',
            'phone.min' => 'Поле "Телефон" (:attribute) не может быть меньше 8 символов',
            'phone.max' => 'Поле "Телефон" (:attribute) не может быть больше 13 символов',
            'password.required' => 'Заполните поле "Пароль" (:attribute)',
            'password.min' => 'Поле "Пароль" (:attribute) не может быть меньше 6 символов',
        ];
    }
}
