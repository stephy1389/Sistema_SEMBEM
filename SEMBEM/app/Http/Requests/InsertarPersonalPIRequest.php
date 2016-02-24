<?php namespace sembem\Http\Requests;

use Illuminate\Routing\Route;
use sembem\Http\Requests\Request;

class InsertarPersonalPIRequest extends Request
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
            'p_cedula'           => 'bail|required|digits_between:1,9|unique:persona,p_cedula,' . $this->route->getParameter('personal').',p_id',
            'p_edo_civil'        => 'required|in:C,CO,D,S,V',
            'p_fecha_nacimiento' => 'required|date_format:d/m/Y|after:-120 years|before:-18 years',
            'p_sexo'             => 'required|in:F,M',
            'p_direccion'        => 'required|max:100',
            'p_correo'           => 'bail|required|email|max:50|unique:persona,p_correo,'. $this->route->getParameter('personal').',p_id',

            //Para los datos de personal
            'per_id_jerarquia'     => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12',
            'per_seccion'          => 'in:A,B,C',
            'per_nro_equipo'       => 'bail|alpha_dash|min:1|max:10|unique:personal,per_nro_equipo',

            //Para select del cargo
            'pc_id_cargo' => 'required',

            //Para los datos de usuario
            'u_permisologia_acc'  => 'required|in:A,P',
            'u_permisologia_morb' => 'required_if:u_permisologia_acc,P|in:t,f'
        ];

        //Para especialidad
        if ($this->request->get('pc_id_cargo') != null){
            foreach ($this->request->get('pc_id_cargo') as $key => $val) {
                if ($val == '11' || $val == '12') {
                    $rules['per_id_especialidad'] = 'required_if:pc_id_cargo.' . $key . ',11,12|in:1,2,3,4,5,6,7,8,9';
                }
            }
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
            'p_fecha_nacimiento.before'       => 'La Fecha de Nacimiento no es válida, el Personal debe ser mayor de edad, por favor modifique la Fecha de Nacimiento en el módulo de Paciente Identificado.',
            'p_fecha_nacimiento.after'        => 'Seleccione una Fecha de Nacimiento válida.',
            'p_fecha_nacimiento.date_format'  => 'La Fecha de Nacimiento debe tener el formato dd/mm/yyyy.',
            'u_permisologia_morb.required_if' => 'El campo Permisología Morbilidad es obligatorio cuando la Permisología de Acceso es Personal.'
        ];

        if ($this->request->get('pc_id_cargo') != null){
            foreach ($this->request->get('pc_id_cargo') as $key => $val) {
                if ($val == '11' || $val == '12') {
                    $cargo = config('options.cargos.' . $val);
                    $messages['per_id_especialidad.required_if'] = 'El campo Especialidad es obligatorio cuando el Cargo es ' . $cargo . '.';
                }
            }
        }

        return $messages;
    }
}
