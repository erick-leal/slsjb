<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaRequest extends FormRequest
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
            'nombre' => 'required|min:5|max:20',
            'capacidad' => 'required|numeric',
            
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' =>'El nombre de la sala es obligatorio',
            'nombre.min' =>'El nombre debe contener al menos 5 caracteres',
            'nombre.max' => 'El nombre debe contener un maximo de 20 caracteres',
            'capacidad.required' => 'La capacidad debe ser obligatorio',
            'capacidad.numeric' => 'La capacidad debe ser un numero'
            
        ];
    }
}
