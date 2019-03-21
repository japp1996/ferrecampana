<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ProveedorRequest extends FormRequest
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
            'dni' => 'required',
            'name' => 'required|string',
            'description' => 'required|string',
            'contact_name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required|max:500',
        ];
    }

    public function attributes()
    {
        return [
            'dni' => 'RIF',
            'name' => 'Nombre o Razon Social',
            'description' => 'Descripcion',
            'contact_name' => 'Nombre de contacto',
            'phone' => 'Teléfono',
            'email' => 'Email',
            'address' => 'Dirección',
        ];
    }

    public function messages()
    {
        return [
            'required'  => 'El :attribute es necesario',
            'max'  => 'El :attribute solo puede tener un máximo de :max caracteres',
            'string' => 'El :attribute solo acepta cadenas de texto',
            'numeric' => 'El :attribute debe ser solo numérico',
            'email' => 'El :attribute debe tener un formáto de email válido',
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
