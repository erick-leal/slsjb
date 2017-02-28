<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdministrativoRequest extends Request
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
                    "rut" => "required|unique:apoderados|unique:profesores|unique:administrativos|unique:alumnos",
                    "nombre"=> "required|min:3|max:30",
                    "apellido_paterno"=> "required|min:3|max:30",
                    "apellido_materno"=> "required|min:3|max:30",
                    "email" => "required|email|unique:administrativos",
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    "nombre"=> "required|min:3|max:30",
                    "apellido_paterno"=> "required|min:3|max:30",
                    "apellido_materno"=> "required|min:3|max:30",
                     "email" => "required|email",
                    
                ];
            }
            default:break;
        }
    }

    public function messages()
    {
        return [
            
            'nombre.required' =>'El nombre debe ser obligatorio',
            'nombre.min' =>'El nombre debe contener al menos 3 caracteres',
            'nombre.max' => 'El debe contener un maximo de 30 caracteres',
            'nombre.alpha' => "El nombre solo debe contener letras",
            'apellido_paterno.required' => 'El apellido paterno debe ser obligatorio',
            'apellido_paterno.min' =>'El apellido paterno debe tener un minimo de 3 caracteres',
            'apellido_paterno.max' =>'El apellido paterno debe tener un maximo de 30 caracteres',
            'apellido_paterno.alpha' => 'El apellido paterno debe solo contener letras',
            'apellido_materno.required' =>'El apellido materno debe ser obligatorio',
            'apellido_materno.min' => 'El apellido materno debe tener un minimo de 3 caracteres',
            'apellido_materno.max' => 'El apellido materno debe tener un maximo de 30 caracteres',
            'apellido_materno.alpha' => 'El apellido materno debe solo contener letras',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingrese correo electronico valido',
            'email.unique' => 'Su correo electronico ya existe en nuestros datos',
            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'Recuerde confirmar su contraseña',
            'password.min' => 'Su contraseña debe tener minimo 6 caracteres'
        ];
    }
}
