<?php

namespace prueba\Http\Requests;

use prueba\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            //unique revisa en la BDD si ya existe el email, con los ":"
            //se le pasan los parámetros en laravel a unique, el primero es la tabla de la BDD y el segundo el campo donde va a buscar
            'password' => 'required',
            'type' => 'required|in:user,admin'
        ];
    }
}
