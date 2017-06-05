<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:20',
            'descripcion' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' =>'El nombre del cargo es obligatorio',
            'nombre.min' =>'El nombre debe contener al menos 3 caracteres',
            'nombre.max' => 'El debe contener un maximo de 20 caracteres',
            'descripcion.required' => 'La descripcion del cargo es obligatorio',
        ];
    }
}
