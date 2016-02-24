<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;

class ModificarPreguntaRequest extends Request
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
        $rules = [
            'u_respuesta_actual'  => 'required|same:old_respuesta',
            'u_id_pregunta_nueva' => 'required|in:1,2,3,4,5,6',
            'u_respuesta_nueva'   => 'required|max:50'
        ];

        if (!\Hash::check($this->request->get('password'), $this->request->get('actual_password'))) {
            $rules['password'] = 'required|alpha_dash|max:9|same:actual_password';
        }
        else{
            $rules['password'] = 'required|alpha_dash|max:9';
        }

        return $rules;
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'password.same'           => 'La Contraseña Actual es Errónea.',
            'u_respuesta_actual.same' => 'La Respuesta de Seguridad Actual es Errónea.'
        ];
    }
}
