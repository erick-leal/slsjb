<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'nombre' => 'required|min:5|max:255',
            'descripcion' => 'required|max:255',
            'fecha' => 'date',
            'foto' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' =>'El nombre de la noticia es obligatorio',
            'nombre.min' =>'El nombre debe contener al menos 5 caracteres',
            'nombre.max' => 'El nombre debe contener un maximo de 255 caracteres',
            'descripcion.required' => 'La descripcion de la noticia es obligatorio',
            'descripcion.max' => 'La descripcion debe contener un maximo de 255 caracteres',
            'fecha.date' =>'Fecha invalida',
            'foto.required' =>'Foto invalida',
        ];
    }
}
