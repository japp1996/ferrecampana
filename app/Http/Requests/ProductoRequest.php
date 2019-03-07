<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
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
            'code' => 'unique:productos|required',
            'code' => Rule::unique('productos')->ignore($this->code, 'code'),
            'name' => 'required',
            'stock' => 'required',
            'unity' => 'required',  
            'price' => 'required|numeric',
            'id_categoria' => 'required',
            'id_proveedor' => 'required'
            //'main' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Código',
            'name' => 'Nombre',
            'stock' => 'Stock',
            'unity' => 'Unidad',
            'price' => 'Precio',
            'id_categoria' => 'Categoría',
            'id_proveedor' => 'Proveedor'
            //'main' => 'Imagen principal'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es requerido',
            'numeric' => 'El campo :attribute debe ser un número',
            'array_object_not_null' => 'Debes completar los campos en :attribute',
            'mines' => 'La imagen no tiene un formato válido',
            'unique' => 'El :attribute ya existe'   
        ];
    }

    public function formatErrors(Validator $validator)
    {
        return [ 'error' => $validator->errors()->first() ];
    }
}
