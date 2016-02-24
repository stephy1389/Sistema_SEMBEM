<?php namespace sembem\Http\Requests;

use sembem\Http\Requests\Request;


class InsertarPacienteNoIdentificadoRequest extends Request
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
            'pni_fecha_ing'      => 'required|date_format:d/m/Y g:i a|after:-1 years|before:0 years',
            'pni_color_ojos'     => 'required|in:AZUL,CAFÉ,GRIS,NEGRO,VERDE,VIOLETA',
            'pni_color_piel'     => 'required|in:BLANCO,MARRÓN,NEGRO',
            'pni_color_cabello'  => 'required|in:AMARILLO,BLANCO,MARRÓN,NEGRO,ROJO',
            'pni_estatura'       => 'required|alpha_spaces|max:20',
            'pni_apodo'          => 'required|alpha_spaces|max:20',
            'pni_contextura'     => 'required|in:DELGADO(A),INTERMEDIO(A),OBESO(A),RAQUÍTICO(A)',
            'pni_vestimenta'     => 'required|alpha_spaces|max:100',
            'pni_diagnostico'    => 'required|max:100',
            'pni_tratamiento'    => 'max:100',
            'p_tipo'             => 'required|in:AVF - NIÑO,AVF - NIÑA,BVF - NIÑO,BVF - NIÑA,CVF - NIÑO,CVF - NIÑA,AVF - ADOLESCENTE HOMBRE,AVF - ADOLESCENTE MUJER,BVF - ADOLESCENTE HOMBRE,BVF - ADOLESCENTE MUJER,CVF - ADOLESCENTE HOMBRE,CVF - ADOLESCENTE MUJER,AVF - ADULTO JOVEN,AVF - ADULTA JOVEN,BVF - ADULTO JOVEN,BVF - ADULTA JOVEN,CVF - ADULTO JOVEN,CVF - ADULTA JOVEN,AVF - ADULTO,AVF - ADULTA,BVF - ADULTO,BVF - ADULTA,CVF - ADULTO,CVF - ADULTA,AVF - ADULTO MAYOR,AVF - ADULTA MAYOR,BVF - ADULTO MAYOR,BVF - ADULTA MAYOR,CVF - ADULTO MAYOR,CVF - ADULTA MAYOR',
            'p_sexo'             => 'required|in:F,M',
            'p_direccion'        => 'max:100'
        );
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        return [
            'pni_fecha_ing.before'       => 'Seleccione una Fecha y Hora válidas.',
            'pni_fecha_ing.after'        => 'Seleccione una Fecha y Hora válidas.',
            'pni_fecha_ing.date_format'  => 'La Fecha y Hora de Ingreso debe tener el formato dd/mm/yyyy y formato de 12 horas hh:mm am/pm.'
        ];
    }
}
