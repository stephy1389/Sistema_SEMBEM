<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;

class ConsultarPersonalRequest extends Request
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
            //Para la Fecha de Ingreso de Paciente No Identificado
            'nombre'     => 'alpha_spaces|max:45',
            'jerarquia'  => 'in:1,2,3,4,5,6,7,8,9,10,11,12',
            'cargo'      => 'in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25',
        );
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'fecha.before'       => 'Seleccione una Fecha de Ingreso válida.',
            'fecha.after'        => 'Seleccione una Fecha de Ingreso válida.',
            'fecha.date_format'  => 'La Fecha de Ingreso debe tener el formato dd/mm/yyyy.'
        ];
    }
}
