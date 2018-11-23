<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class PasswordRequest extends FormRequest
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
            'password' => 'required|min:8',
            'password2' => 'required|min:8'
        ];
    }

    public function attributes()
    {
        return [
            "password" => "Contraseña",
            "password2" => "Repetir contraseña"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Ya existe un diseño registrado con este nombre',
            'min' => 'El campo :attribute no puede tener ménos de :min carácteres'
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
