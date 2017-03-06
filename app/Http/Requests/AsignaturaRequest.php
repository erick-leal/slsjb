<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaturaRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'nombre' => 'required|min:5|max:30|unique:asignaturas',
                    //'horario' => 'required',
                    'periodo' => 'required',
                    'codigo' => 'required|unique:asignaturas',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    //'horario' => 'required',
                    'periodo' => 'required',
                ];
            }
            default:break;
        }
        
    }
    public function messages()
    {
        return [
            'nombre.required' =>'El nombre de la asignatura es obligatorio',
            'nombre.unique' =>'La asignatura ingresada ya existe',
            'nombre.min' =>'El nombre debe contener al menos 5 caracteres',
            'nombre.max' => 'El nombredebe contener un maximo de 30 caracteres',
            'periodo.required' => 'Seleccione periodo',
            'codigo.required' => 'El codigo de la asignatura es obligatorio',
            'codigo.unique' => 'Codigo de la asignatura ya existe',
        ];
    }
}
