<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ProfileRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required',
            'name' => 'required',
            'address' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'Correo',
            'phone' => 'Teléfono',
            'name' => 'Nombres y Apellidos',
            'address' => 'Dirección'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Debe completar los campos en :attribute',
            'email' => 'El campo :attribute debe tener formáto de email'
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
