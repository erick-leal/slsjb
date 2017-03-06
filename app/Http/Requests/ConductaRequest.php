<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConductaRequest extends FormRequest
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
            'descripcion' => 'required|min:10|max:500',
            'tipo' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'descripcion.required' =>'La descripcion es obligatoria',
            'descripcion.min' =>'La descripcion debe contener al menos 10 caracteres',
            'descripcion.max' => 'La descripcion debe contener como maximo 500 caracteres',
            'tipo.required' => 'Seleccione tipo de conducta',
        ];
    }
}
