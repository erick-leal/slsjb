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
            
            'n1' => 'numeric|min:0|max:7|nullable', 
            'n2' => 'numeric|min:0|max:7|nullable', 
            'n3' => 'numeric|min:0|max:7|nullable', 
            'n4' => 'numeric|min:0|max:7|nullable', 
            'n5' => 'numeric|min:0|max:7|nullable', 
            'n6' => 'numeric|min:0|max:7|nullable', 
            'n7' => 'numeric|min:0|max:7|nullable', 
            'n8' => 'numeric|min:0|max:7|nullable',
            'examen' => 'numeric|min:0|max:7|nullable',
            
            
        ];
    }
    public function messages()
    {
        return [
           
            'n1.numeric' => 'La nota "N1" debe ser un numero',
            'n2.numeric' => 'La nota "N2" debe ser un numero',
            'n3.numeric' => 'La nota "N3" debe ser un numero',
            'n4.numeric' => 'La nota "N4" debe ser un numero',
            'n5.numeric' => 'La nota "N5" debe ser un numero',
            'n6.numeric' => 'La nota "N6" debe ser un numero',
            'n7.numeric' => 'La nota "N7" debe ser un numero',
            'n8.numeric' => 'La nota "N8" debe ser un numero',
            'examen.numeric' => 'La nota "Examen" debe ser un numero',
            'n1.min' => 'La nota "N1" ingresada no es válida, Ejemplo "6.5"',
            'n1.max' => 'La nota "N1" ingresada no es válida, Ejemplo "6.5"',
            'n2.min' => 'La nota "N2" ingresada no es válida, Ejemplo "6.5"',
            'n2.max' => 'La nota "N2" ingresada no es válida, Ejemplo "6.5"',
            'n3.min' => 'La nota "N3" ingresada no es válida, Ejemplo "6.5"',
            'n3.max' => 'La nota "N3" ingresada no es válida, Ejemplo "6.5"',
            'n4.min' => 'La nota "N4" ingresada no es válida, Ejemplo "6.5"',
            'n4.max' => 'La nota "N4" ingresada no es válida, Ejemplo "6.5"',
            'n5.min' => 'La nota "N5" ingresada no es válida, Ejemplo "6.5"',
            'n5.max' => 'La nota "N5" ingresada no es válida, Ejemplo "6.5"',
            'n6.min' => 'La nota "N6" ingresada no es válida, Ejemplo "6.5"',
            'n6.max' => 'La nota "N6" ingresada no es válida, Ejemplo "6.5"',
            'n7.min' => 'La nota "N7" ingresada no es válida, Ejemplo "6.5"',
            'n7.max' => 'La nota "N7" ingresada no es válida, Ejemplo "6.5"',
            'n8.min' => 'La nota "N8" ingresada no es válida, Ejemplo "6.5"',
            'n8.max' => 'La nota "N8" ingresada no es válida, Ejemplo "6.5"',
            'examen.min' => 'La nota "Examen" ingresada no es válida, Ejemplo "6.5"',
            'examen.max' => 'La nota "Examen" ingresada no es válida, Ejemplo "6.5"',
        ];
    }
}
