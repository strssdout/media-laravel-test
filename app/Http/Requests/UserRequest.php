<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|different:email',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Не забывайте ввести ваше имя',
            'name.different:email' => 'Имя пользователя должно отличаться от вашей электронной почты',
            'email.required' => 'Введите пожалуйста вашу электронную почту',
            'email.email' => 'Не верная электронная почта',
            'email.unique' => 'Пользователь с данной электронной почтой уже зарегистрирован',
            'password.required' => 'Введите пароль',
            'password.min' => 'Пароль должен содержать минимум 8 символов',
            'password.regex' => 'Пароль должен должен состоять хотя бы из одной цифры и букв разного регистра',
        ];
    }
}
