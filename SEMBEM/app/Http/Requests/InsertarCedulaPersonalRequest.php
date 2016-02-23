<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;

class InsertarCedulaPersonalRequest extends Request
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
        return array(
            //Para la cédula que se va a buscar en la BDD, del personal que se va a insertar al sistema
            'p_cedula' => 'required|digits_between:1,9',

        );
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'p_cedula.digits_between' => 'La Cédula debe tener entre 1 y 9 dígitos.',
        ];
    }
}
