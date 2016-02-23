<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;

class ConsultarExamenMedicoRequest extends Request
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
            //Para la Fecha de Aplicación, Fecha de Retiro y Examen Médico de los Exámenes Médicos del Paciente No Identificado
            'fechaapc'   => 'date_format:d/m/Y|after:-120 years|before:0 years',
            'fechartro'  => 'date_format:d/m/Y|after:-120 years|before:0 years',
            'examen'     => 'in:1,2,3,4,5,6,7,8,9,10',
        );
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'fechaapc.before'        => 'Seleccione una Fecha de Aplicación válida.',
            'fechaapc.after'         => 'Seleccione una Fecha de Aplicación válida.',
            'fechaapc.date_format'   => 'La Fecha de Aplicación debe tener el formato dd/mm/yyyy.',
            'fechartro.before'       => 'Seleccione una Fecha de Retiro válida.',
            'fechartro.after'        => 'Seleccione una Fecha de Retiro válida.',
            'fechartro.date_format'  => 'La Fecha de Retiro debe tener el formato dd/mm/yyyy.'
        ];
    }
}
