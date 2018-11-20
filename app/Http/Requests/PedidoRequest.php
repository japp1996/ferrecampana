<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class PedidoRequest extends FormRequest
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
            'id_producto' => 'required',
            'cantidad' => 'required|numeric',
            'precio' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'id_producto' => 'Código del producto',
            'cantidad' => 'Cantidad ',
            'precio' => 'Precio'
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'Ya existe un diseño registrado con este nombre',
            'required' => 'El campo :attribute es requerido'
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
