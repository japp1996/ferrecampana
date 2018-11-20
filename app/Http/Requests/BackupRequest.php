<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class BackupRequest extends FormRequest
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
            'server' => 'required',
            'user' => 'required',
            'database' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'server' => 'Nombre del Servidor',
            'user' => 'Nombre de Usuario',
            'database' => 'Nombre de la Base de datos',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Debe completar los campos en :attribute'
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
