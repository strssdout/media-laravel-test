<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Place;
use App\Models\Image;

class PlaceRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z ]+$/|unique:places,name',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите пожалуйста название',
            'name.unique' => 'Данное место уже добавлено',
            'name.regex' => 'Название места должно состоять только из букв',
            'type.required' => 'Выберите тип места',
        ];
    }
}
