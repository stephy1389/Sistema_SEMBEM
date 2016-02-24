<?php namespace sembem\Http\Requests;

use Illuminate\Routing\Route;
use sembem\Http\Requests\Request;
use sembem\Persona;

class InsertarPacienteIdentificadoPerRequest extends Request
{

    /**
     * @var Route
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
        $rules = [
            //Para los datos de telefono
            't_fijo'    => array('required','regex:/^(?:\([0-9]\d{3}\)\ ?|[0-9]\d{3}(?:\-?|\ ?))[0-9]\d{2}[- ]?\d{4}$/','max:13'),
            't_movil'   => array('regex:/^(?:\([0-9]\d{3}\)\ ?|[0-9]\d{3}(?:\-?|\ ?))[0-9]\d{2}[- ]?\d{4}$/','max:13'),
            't_oficina' => array('regex:/^(?:\([0-9]\d{3}\)\ ?|[0-9]\d{3}(?:\-?|\ ?))[0-9]\d{2}[- ]?\d{4}$/','max:13'),

            //Para los datos de persona
            'p_nombre_primer'    => 'required|alpha_spaces|max:20',
            'p_nombre_segundo'   => 'alpha_spaces|max:20',
            'p_apellido_primer'  => 'required|alpha_spaces|max:20',
            'p_apellido_segundo' => 'alpha_spaces|max:20',
            'p_nacionalidad'     => 'in:E,V',
            'p_cedula'           => 'bail|required|digits_between:1,9|unique:persona,p_cedula,' . $this->route->getParameter('pacienteidentificado').',p_id',
            'p_edo_civil'        => 'required|in:C,CO,D,S,V',
            'p_fecha_nacimiento' => 'required|date_format:d/m/Y|after:-120 years|before:0 years',
            'p_sexo'             => 'required|in:F,M',
            'p_direccion'        => 'max:100',
            'p_correo'           => 'bail|required|email|max:50|unique:persona,p_correo,'. $this->route->getParameter('pacienteidentificado').',p_id'
        ];

        $person = new Persona();
        $person -> p_edad = $this->request->get('p_fecha_nacimiento');

        if($person -> p_edad >= 0 && $person -> p_edad <= 11){
            $rules['p_tipo'] = 'required|in:AVF - NIÑO,AVF - NIÑA,BVF - NIÑO,BVF - NIÑA,CVF - NIÑO,CVF - NIÑA';
        }elseif($person -> p_edad >= 12 && $person -> p_edad <= 18){
            $rules['p_tipo'] = 'required|in:AVF - ADOLESCENTE HOMBRE,AVF - ADOLESCENTE MUJER,BVF - ADOLESCENTE HOMBRE,BVF - ADOLESCENTE MUJER,CVF - ADOLESCENTE HOMBRE,CVF - ADOLESCENTE MUJER';
        }elseif($person -> p_edad >= 19 && $person -> p_edad <= 40){
            $rules['p_tipo'] = 'required|in:AVF - ADULTO JOVEN,AVF - ADULTA JOVEN,BVF - ADULTO JOVEN,BVF - ADULTA JOVEN,CVF - ADULTO JOVEN,CVF - ADULTA JOVEN';
        }elseif($person -> p_edad >= 41 && $person -> p_edad <= 65){
            $rules['p_tipo'] = 'required|in:AVF - ADULTO,AVF - ADULTA,BVF - ADULTO,BVF - ADULTA,CVF - ADULTO,CVF - ADULTA';
        }else{
            $rules['p_tipo'] = 'required|in:AVF - ADULTO MAYOR,AVF - ADULTA MAYOR,BVF - ADULTO MAYOR,BVF - ADULTA MAYOR,CVF - ADULTO MAYOR,CVF - ADULTA MAYOR';
        }

        return $rules;
    }

    /**
     * Custom error messages
     * @return array
     */
    public function messages()
    {
        $messages = [
            'p_fecha_nacimiento.before'       => 'Seleccione una Fecha de Nacimiento válida.',
            'p_fecha_nacimiento.after'        => 'Seleccione una Fecha de Nacimiento válida.',
            'p_fecha_nacimiento.date_format'  => 'La Fecha de Nacimiento debe tener el formato dd/mm/yyyy.'
        ];

        $person = new Persona();
        $person -> p_edad = $this->request->get('p_fecha_nacimiento');

        if($person -> p_edad >= 0 && $person -> p_edad <= 11){
            $messages['p_tipo.in'] = 'Tipo de Paciente debe ser NIÑO o NIÑA, ya que la edad del paciente se encuentra entre 0-11 años.';
        }elseif($person -> p_edad >= 12 && $person -> p_edad <= 18){
            $messages['p_tipo.in'] = 'Tipo de Paciente debe ser ADOLESCENTE HOMBRE o ADOLESCENTE MUJER, ya que la edad del paciente se encuentra entre 12-18 años.';
        }elseif($person -> p_edad >= 19 && $person -> p_edad <= 40){
            $messages['p_tipo.in'] = 'Tipo de Paciente debe ser ADULTO JOVEN o ADULTA JOVEN, ya que la edad del paciente se encuentra entre 19-40 años.';
        }elseif($person -> p_edad >= 41 && $person -> p_edad <= 65){
            $messages['p_tipo.in'] = 'Tipo de Paciente debe ser ADULTO o ADULTA, ya que la edad del paciente se encuentra entre 41-65 años.';
        }else{
            $messages['p_tipo.in'] = 'Tipo de Paciente debe ser ADULTO MAYOR o ADULTA MAYOR, ya que la edad del paciente se encuentra entre 66 años en adelante.';
        }

        return $messages;
    }
}