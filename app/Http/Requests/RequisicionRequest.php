<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class RequisicionRequest extends FormRequest
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
            'cantidad' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'id_producto' => 'Producto',
            'cantidad' => 'Cantidad ',
            'precio' => 'Precio'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido'
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
