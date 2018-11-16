<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; 

class EstadoPedidoRequest extends FormRequest
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
            'descripcion_estado' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'descripcion' => 'Nombre del Estado para los pedidos'
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
