<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;


class ModificarExamenMedicoRequest extends Request
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
            $fechahora = $this->request->get('pie_fecha_aplicacion') . ' '. $this->request->get('pie_hora_aplicacion'),
            'pie_status_realizar' => 'in:t,f',
            'pie_observacion'     => 'alpha_spaces|max:40',
            'pie_status_entrega'  => 'in:t,f',
            'pie_fecha_retiro'    => 'required_if:pie_status_entrega,t|date_format:d/m/Y g:i a|after:'. $fechahora .'|before:0 years'
        );
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'pie_fecha_retiro.before'       => 'Seleccione una Fecha y Hora válidas.',
            'pie_fecha_retiro.after'        => 'Seleccione una Fecha y Hora válidas, deben ser posteriores a la Fecha y Hora de Aplicación.',
            'pie_fecha_retiro.date_format'  => 'La Fecha y Hora de Retiro debe tener el formato dd/mm/yyyy y formato de 12 horas hh:mm am/pm.',
            'pie_fecha_retiro.required_if'  => 'El campo Fecha y Hora de Retiro es obligatorio cuando Examen Médico Entregado es ENTREGADO.'
        ];
    }
}
