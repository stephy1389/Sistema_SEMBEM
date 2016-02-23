<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;


class InsertarExamenMedicoRequest extends Request
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
            //Para la fecha y hora de asignación del examen médico
            'pie_fecha_aplicacion' => 'required|date_format:d/m/Y g:i a|after:-3 months|before:0 years',

            //Para select de examen médico
            'pie_id_examen_medico' => 'required',
        );
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'pie_fecha_aplicacion.before'       => 'Seleccione una Fecha y Hora válidas.',
            'pie_fecha_aplicacion.after'        => 'Seleccione una Fecha y Hora válidas.',
            'pie_fecha_aplicacion.date_format'  => 'La Fecha y Hora de Aplicación debe tener el formato dd/mm/yyyy y formato de 12 horas hh:mm am/pm.'
        ];
    }
}
