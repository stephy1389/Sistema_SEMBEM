<?php namespace sembem\Http\Controllers\Administrador;


use sembem\Http\Controllers\Controller;
use Illuminate\Http\Request;
use sembem\Http\Requests\InsertarPacienteNoIdentificadoRequest;
use sembem\Http\Requests\ConsultarPacienteNoIdentificadoRequest;
use sembem\Persona;
use sembem\Telefono;
use sembem\Paciente;
use sembem\PacienteNoIdentificado;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;


class PacienteNoIdentificadoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ConsultarPacienteNoIdentificadoRequest $request){
        $pacientesnoidentificados = PacienteNoIdentificado::filterAndPaginate($request->get('apodo'), $request->get('genero'), $request->get('fecha'));

        foreach($pacientesnoidentificados as $pacienteidentificado) {
            PacienteNoIdentificado::datosPacienteNoIdentificado($pacienteidentificado);
        }

        return view('Administrador.PacienteNoIdentificado.Consultar', compact('pacientesnoidentificados'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        return view ('Administrador.PacienteNoIdentificado.Insertar');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(InsertarPacienteNoIdentificadoRequest $request){
        $requestall = $request->all();

        //Tabla telefono
        $telefono = new Telefono($requestall);
        $telefono -> save();

        //Tabla persona
        $persona = new Persona($requestall);
        $persona -> p_id_telefono = $telefono -> t_id;
        if($persona -> p_cedula == ""){
            $persona -> p_cedula = "C" . $telefono -> t_id;
        }
        if($persona -> p_correo == ""){
            $persona -> p_correo = "CO" . $telefono -> t_id;
        }
        if($persona -> p_fecha_nacimiento == ""){
            $persona -> p_fecha_nacimiento = null;
        }
        $persona -> p_direccion = trim($persona->p_direccion);
        $persona -> save();

        //Tabla paciente
        $paciente = new Paciente();
        $paciente -> pa_id_persona = $persona -> p_id;
        $paciente -> save();

        //Tabla paciente no identificado
        $pacientenoidentificado = new PacienteNoIdentificado($requestall);
        $pacientenoidentificado -> pni_id_paciente = $paciente -> pa_id;
        $pacientenoidentificado -> pni_fecha_ing = $requestall['pni_fecha_ing'];
        $pacientenoidentificado -> pni_hora_ing = $requestall['pni_fecha_ing'];
        $pacientenoidentificado -> pni_estatura = trim($pacientenoidentificado -> pni_estatura);
        $pacientenoidentificado -> pni_apodo = trim($pacientenoidentificado -> pni_apodo);
        $pacientenoidentificado -> pni_vestimenta = trim($pacientenoidentificado -> pni_vestimenta);
        $pacientenoidentificado -> pni_diagnostico = trim($pacientenoidentificado -> pni_diagnostico);
        $pacientenoidentificado -> pni_tratamiento = trim($pacientenoidentificado -> pni_tratamiento);
        $pacientenoidentificado -> save();

        $pacientenoidentificado -> msjPacienteNoIdentificadoInsertado();
        return redirect()->route('admin.pacientenoidentificado.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $pacientenoidentificado = PacienteNoIdentificado::findOrFail($id);
        $pacientenoidentificado -> paciente -> persona -> telefono;

        return view('Administrador.PacienteNoIdentificado.ConsultarPNI', compact('pacientenoidentificado'));
    }
}
?>
