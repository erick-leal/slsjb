<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaRequest extends FormRequest
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
            
            'nota' => 'numeric|min:0|max:7|nullable', 
            
            
            
        ];
    }
    public function messages()
    {
        return [
           
            'nota.numeric' => 'La nota "N1" debe ser un numero',
            
            'nota.min' => 'La nota "N1" ingresada no es válida, Ejemplo "6.5"',
            'nota.max' => 'La nota "N1" ingresada no es válida, Ejemplo "6.5"',
           
        ];
    }
}
