<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvaluacionRequest extends FormRequest
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
            //'id_alumno' => 'unique:matriculas',   
            'nombre' => 'required',
            'contenido' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' =>'El Nombre de la Evaluacion es obligatorio',
            'contenido.required' => 'EL contenido de la Evaluacion es obligatorio',
            
            //'id_alumno.unique' => 'Matricula de alumno existente en la base de datos',
        ];
    }
}