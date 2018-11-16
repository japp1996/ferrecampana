<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
            "tipodoc" => "required|string",
            "number" => "unique:usuarios|required|numeric",
            "name" => "required",
            "password" => "required|min:8",
            "password2" => "required|min:8",
            "email" => "unique:usuarios|required|email",
            "phone" => "unique:usuarios|required",
            "address" => "required",
            "date" => "required|date"
        ];
    }
    
    public function attributes()
    {
        return [
            'tipodoc' => 'Tipo de Documento',
            'number' => 'Número',
            'name' => 'Nombre',
            'password' => 'Contraseña',
            "password2" => "Repetir contraseña",
            "email" => "Email",
            "phone" => "Telefono",
            "address" => "Direccion",
            "date" => "Fecha de Nacimiento"
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'min' => 'El campo :attribute no puede contener menos de :min caracteres',
            'unique' => 'Ya existe un Usuario registrado con este documento',
            'mimes' => 'La imágen tiene un formato incorrecto',
            'numeric' => 'El campo :attribute debe contener sólo números',
            'date' => 'El campo :attribute no tiene formato de fecha',
            'email' => 'El campo :attribute debe ser email'
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
