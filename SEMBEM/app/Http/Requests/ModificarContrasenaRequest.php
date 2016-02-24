<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;

class ModificarContrasenaRequest extends Request
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
            'password_nueva'              => 'required|alpha_dash|min:6|max:9|confirmed',
            'password_nueva_confirmation' => 'required',
        ];

        if (!\Hash::check($this->request->get('password'), $this->request->get('old_password'))) {
            $rules['password'] = 'required|alpha_dash|max:9|same:old_password';
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
            'password.same' => 'La Contraseña Actual es Errónea.',
        ];
    }
}
