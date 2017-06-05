<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaRequest extends FormRequest
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
            'estado' => 'required',
            'monto' => 'required',
            'fecha' => 'date',
        ];
    }
    public function messages()
    {
        return [
            'estado.required' =>'El Estado de la Matricula es obligatorio',
            'monto.required' => 'EL monto es obligatorio',
            'fecha.date' =>'Fecha invalida',
            //'id_alumno.unique' => 'Matricula de alumno existente en la base de datos',
        ];
    }
}
