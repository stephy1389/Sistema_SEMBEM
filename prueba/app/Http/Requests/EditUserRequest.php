<?php

namespace prueba\Http\Requests;

use Illuminate\Routing\Route;
use prueba\Http\Requests\Request;

class EditUserRequest extends Request
{

    private $route;

    /**
     * @param Route $route
     */
    public function __construct(Route $route){

        $this->route = $route;
    }

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
            'email' => 'required|email|unique:users,email,' . $this->route->getParameter('users'), //Nos traemos el ID que está en la URL
            //unique revisa en la BDD si ya existe el email, con los ":"
            //se le pasan los parámetros en laravel a unique, el primero es la tabla de la BDD y el segundo el campo donde va a buscar
            'password' => '',
            'type' => 'required|in:user,admin'
            //"in" para que el usuario solo pueda seleccionar usuario o admin, si trata de agregar superadmin con algún tool no podrá hacerlo porque
            //solo se permite uno de esos dos en el select
        ];
    }
}
