<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;

class ConsultarPacienteNoIdentificadoRequest extends Request
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
            //Para la Fecha de Ingreso, Apodo y Género del Paciente No Identificado
            'fecha'  => 'date_format:d/m/Y|after:-120 years|before:0 years',
            'apodo'  => 'alpha_spaces|max:20',
            'genero' => 'in:F,M',
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
