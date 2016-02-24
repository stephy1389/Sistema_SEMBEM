<?php namespace sembem\Http\Controllers\Administrador;


use sembem\Http\Requests\InsertarCedulaPersonalRequest;
use sembem\Http\Requests\InsertarExamenMedicoRequest;
use sembem\Http\Requests\ConsultarExamenMedicoRequest;
use sembem\Http\Requests\ModificarExamenMedicoRequest;
use sembem\Http\Controllers\Controller;
use Illuminate\Http\Request;
use sembem\PacienteIdentificadoExamenMedico;
use sembem\Persona;
use sembem\Telefono;
use sembem\Paciente;
use sembem\PacienteIdentificado;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;


class ExamenMedicoController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormCedulaConsultarExPi(){
        return view ('Administrador.ExamenMedico.CedulaConsultarEXPI');
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(InsertarCedulaPersonalRequest $request){
        try {
            $cedula = $request->get('p_cedula');
            $persona = Persona::buscarPersona($cedula);
            try{
                $paciente = Paciente::pacienteFound($persona['p_id']);
                $pacienteiden = PacienteIdentificado::pacienteIdenFound($paciente->pa_id);

                if(($pacienteiden -> examenMedico -> toArray() == null) || ($pacienteiden -> examenMedico -> toArray() == "")){
                    $pacienteiden -> msjPacienteIdenNotEx($pacienteiden -> paciente -> persona -> full_name);
                    return redirect()->back();
                }
                else{
                    $examenes = $pacienteiden -> filterAndPaginate($paciente->pa_id);

                    foreach($examenes as $examen){
                        PacienteIdentificado::datosPacienteIdentificadoEx($examen);
                    }

                    $nombrepac = $persona -> full_name;

                    return view('Administrador.ExamenMedico.Consultar', compact('examenes','nombrepac','pacienteiden'));
                }
            }
            catch(ModelNotFoundException $e){
                PacienteIdentificado::msjPacienteIdenNotFound($cedula);
                return redirect()->back();
            }
        }
        catch(ModelNotFoundException $e){
            Persona::msjPersonaNotFound($request->get('p_cedula'));
            return redirect()->back();
        }
    }


    public function getIndexFiltros(ConsultarExamenMedicoRequest $request, $pacienteiden){
        $fechaapc = $request->get('fechaapc');
        $fechartro = $request->get('fechartro');
        $examen = $request->get('examen');

        $examenes = PacienteIdentificado::filterAndPaginateFiltros($pacienteiden, $fechaapc, $fechartro, $examen);

        foreach($examenes as $examen){
            PacienteIdentificado::datosPacienteIdentificadoEx($examen);
        }

        $pac = PacienteIdentificado::where('pi_id', $pacienteiden)->firstOrFail();

        $nombrepac = $pac -> paciente -> persona -> full_name;

        return view('Administrador.ExamenMedico.Consultar', compact('examenes','nombrepac','pacienteiden'));
    }

    public function getIndexFiltrosMod(ConsultarExamenMedicoRequest $request, $pacienteiden){
        $fechaapc = $request->get('fechaapc');
        $fechartro = $request->get('fechartro');
        $examen = $request->get('examen');

        $examenes = PacienteIdentificado::filterAndPaginateFiltros($pacienteiden, $fechaapc, $fechartro, $examen);

        foreach($examenes as $examen){
            PacienteIdentificado::datosPacienteIdentificadoEx($examen);
        }

        $pac = PacienteIdentificado::where('pi_id', $pacienteiden)->firstOrFail();

        $nombrepac = $pac -> paciente -> persona -> full_name;

        return view('Administrador.ExamenMedico.Modificar', compact('examenes','nombrepac','pacienteiden'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        return view ('Administrador.ExamenMedico.CedulaEXPI');
    }


    /**
     *
     */
    public function getCedulaExPi(InsertarCedulaPersonalRequest $request){
        try {
            $cedula = $request->get('p_cedula');
            $persona = Persona::buscarPersona($cedula);
            try{
                $paciente = Paciente::pacienteFound($persona['p_id']);
                $pacienteiden = PacienteIdentificado::pacienteIdenFound($paciente->pa_id);
                $pacienteiden -> msjPacienteIdenEx($persona -> full_name);
                return view('Administrador.ExamenMedico.Insertar', compact('pacienteiden'));
            }
            catch(ModelNotFoundException $e){
                PacienteIdentificado::msjPacienteIdenNotFound($cedula);
                return redirect()->back();
            }
        }
        catch(ModelNotFoundException $e){
            Persona::msjPersonaNotFound($request->get('p_cedula'));
            return redirect()->back();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(InsertarExamenMedicoRequest $request){
        $requestall = $request->all();

        $pacienteidentificado = PacienteIdentificado::pacienteIdenFound($requestall['pi_id_paciente']);

        $fechahorasep = explode(" ", $requestall['pie_fecha_aplicacion']);
        $fecha = $fechahorasep[0];
        $hora = $fechahorasep[1] . ' ' . $fechahorasep[2];

        if($requestall['pie_fecha_retiro'] == ""){
            $fecharetiro = null;
        }

        $examenes  = $requestall['pie_id_examen_medico'];
        $pivotData = array_fill(0, count($examenes), ['pie_fecha_aplicacion' => $fecha,
                                                      'pie_hora_aplicacion'  => $hora,
                                                      'pie_fecha_retiro'     => $fecharetiro,
                                                      'pie_hora_retiro'      => $requestall['pie_hora_retiro'],
                                                      'pie_observacion'      => $requestall['pie_observacion'],
                                                      'pie_status_entrega'   => $requestall['pie_status_entrega'],
                                                      'pie_status_realizar'  => $requestall['pie_status_realizar']
                                                     ]);
        $syncData  = array_combine($examenes, $pivotData);


        //Tabla paciente_identificado_examen_medico
        $pacienteidentificado -> examenMedico() -> attach($syncData);

        $pacienteidentificado->msjExamenMedicoInsertado($pacienteidentificado -> paciente -> persona -> full_name);
        return redirect()->route('admin.examenmedico.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormCedulaExPi(){
        return view ('Administrador.ExamenMedico.CedulaModificarEXPI');
    }


    /**
     *
     */
    public function getCedulaExPiModificar(InsertarCedulaPersonalRequest $request){
        try {
            $cedula = $request->get('p_cedula');
            $persona = Persona::buscarPersona($cedula);
            try{
                $paciente = Paciente::pacienteFound($persona['p_id']);
                $pacienteiden = PacienteIdentificado::pacienteIdenFound($paciente->pa_id);

                if(($pacienteiden -> examenMedico -> toArray() == null) || ($pacienteiden -> examenMedico -> toArray() == "")){
                    $pacienteiden -> msjPacienteIdenNotEx($pacienteiden -> paciente -> persona -> full_name);
                    return redirect()->back();
                }
                else{
                    $examenes = $pacienteiden -> filterAndPaginate($paciente->pa_id);

                    foreach($examenes as $examen){
                        PacienteIdentificado::datosPacienteIdentificadoEx($examen);
                    }

                    $nombrepac = $persona -> full_name;

                    return view('Administrador.ExamenMedico.Modificar', compact('examenes','nombrepac','pacienteiden'));
                }
            }
            catch(ModelNotFoundException $e){
                PacienteIdentificado::msjPacienteIdenNotFound($cedula);
                return redirect()->back();
            }
        }
        catch(ModelNotFoundException $e){
            Persona::msjPersonaNotFound($request->get('p_cedula'));
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $examenmedico = PacienteIdentificadoExamenMedico::find($id);
        $idpi = $examenmedico->pie_id_paciente_identificado;
        $pi = PacienteIdentificado::find($examenmedico->pie_id_paciente_identificado);
        $nombrepac = $pi -> paciente -> persona -> full_name;
        $examenmedico -> pie_fecha_aplicacion_form = $examenmedico['pie_fecha_aplicacion'];

        return view('Administrador.ExamenMedico.ModificarExamen', compact('examenmedico','nombrepac','idpi'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, ModificarExamenMedicoRequest $request){
        $requestall = $request->all();
        $examenmedico = PacienteIdentificadoExamenMedico::find($id);

        $pi = PacienteIdentificado::find($examenmedico->pie_id_paciente_identificado);
        $nombrepac = $pi -> paciente -> persona -> full_name;

        $examenmedico -> fill($requestall);

        if(isset($requestall['pie_fecha_retiro']) != "") {
            $fechahorasep = explode(" ", $requestall['pie_fecha_retiro']);
            $fecha = $fechahorasep[0];
            $hora = $fechahorasep[1] . ' ' . $fechahorasep[2];

            $examenmedico->pie_fecha_retiro = $fecha;
            $examenmedico->pie_hora_retiro = $hora;
        }

        $examenmedico -> save();

        $examenmedico -> msjExamenMedicoModificado($nombrepac);
        return redirect()->route('admin.examenmedico.pacienteidentificado.edit.cedula');
    }
}
?>
