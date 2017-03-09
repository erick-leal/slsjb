<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalificacionRequest extends FormRequest
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
            
            'n1' => 'digits_between:0,7', 
            'n2' => 'digits_between:0,7', 
            'n3' => 'digits_between:0,7', 
            'n4' => 'digits_between:0,7', 
            'n5' => 'digits_between:0,7', 
            'n6' => 'digits_between:0,7', 
            'n7' => 'digits_between:0,7', 
            'n8' => 'digits_between:0,7',
            'promedio' => 'digits_between:0,7',
            'examen' => 'digits_between:0,7',
            'final' => 'digits_between:0,7'
            
        ];
    }
    public function messages()
    {
        return [
           
            'n1.numeric' => 'La nota debe ser un numero',
            'n1.between' => 'La nota ingresada no es válida'
        ];
    }
}
