<?php namespace sembem\Http\Controllers\Administrador;


use sembem\Http\Requests\InsertarCedulaPersonalRequest;
use sembem\Http\Requests\InsertarPacienteIdentificadoRequest;
use sembem\Http\Requests\InsertarPacienteIdentificadoPerRequest;
use sembem\Http\Controllers\Controller;
use Illuminate\Http\Request;
use sembem\Persona;
use sembem\Personal;
use sembem\Telefono;
use sembem\Usuario;
use sembem\Paciente;
use sembem\PacienteIdentificado;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;


class PacienteIdentificadoController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFormCedulaConsultarPi(){
        return view ('Administrador.PacienteIdentificado.CedulaConsultar');
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
                PacienteIdentificado::pacienteIdenFound($paciente->pa_id);
                $persona -> p_fecha_nacimiento_form = $persona -> p_fecha_nacimiento;
                return view('Administrador.PacienteIdentificado.Consultar', compact('persona'));
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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        return view ('Administrador.PacienteIdentificado.CedulaPI');
    }

    /**
     *
     */
    public function getCedulaPi(InsertarCedulaPersonalRequest $request){
        try {
            $cedula = $request->get('p_cedula');
            $persona = Persona::buscarPersona($cedula);
            try{
                $paciente = Paciente::pacienteFound($persona['p_id']);
                $pacienteiden = new PacienteIdentificado;
                $pacienteiden->pacienteIdenFound($paciente->pa_id);
                $pacienteiden->msjPacienteIdenFound($cedula);
                return redirect()->back();
            }
            catch(ModelNotFoundException $e){
                $personal = new Personal;
                $personal->personalFound($persona['p_id']);
                $persona->p_fecha_nacimiento_form = $persona['p_fecha_nacimiento'];
                $personal->msjPersonalPaFound();
                return view('Administrador.PacienteIdentificado.InsertarPer', compact('persona'));
            }
        }
        catch(ModelNotFoundException $e){
            return view('Administrador.PacienteIdentificado.Insertar', compact('cedula'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(InsertarPacienteIdentificadoRequest $request){
        $requestall = $request->all();

        //Tabla telefono
        $telefono = new Telefono($requestall);
        $telefono -> t_movil = trim($telefono -> t_movil);
        $telefono -> t_oficina = trim($telefono -> t_oficina);
        $telefono -> save();

        //Tabla persona
        $persona = new Persona($requestall);
        $persona -> p_id_telefono = $telefono -> t_id;
        $persona -> p_nombre_primer = trim($persona->p_nombre_primer);
        $persona -> p_nombre_segundo = trim($persona->p_nombre_segundo);
        $persona -> p_apellido_primer = trim($persona->p_apellido_primer);
        $persona -> p_apellido_segundo = trim($persona->p_apellido_segundo);
        $persona -> p_direccion = trim($persona->p_direccion);
        $persona -> p_edad = $persona['p_fecha_nacimiento'];
        $persona -> save();

        //Tabla paciente
        $paciente = new Paciente();
        $paciente -> pa_id_persona = $persona -> p_id;
        $paciente -> save();

        //Tabla paciente identificado
        $pacienteidentificado = new PacienteIdentificado();
        $pacienteidentificado -> pi_id_paciente = $paciente -> pa_id;
        $pacienteidentificado -> save();

        $pacienteidentificado -> msjPacienteIdentificadoInsertado($persona -> full_name);
        return redirect()->route('admin.pacienteidentificado.create');
    }

    /**
    * @param $id
    * @param InsertarPacienteIdentificadoPerRequest $request
    */
    public function storePiper($id, InsertarPacienteIdentificadoPerRequest $request){
        $requestall = $request->all();

        $persona = Persona::findOrFail($id);
        $telefono = Telefono::findOrFail($persona -> p_id_telefono);
        $personal = Personal::personalFound($persona->p_id);
        $usuario = Usuario::usuarioFound($personal->id);

        //Tabla telefono
        $telefono -> fill($requestall);
        $telefono -> t_movil = trim($telefono -> t_movil);
        $telefono -> t_oficina = trim($telefono -> t_oficina);
        $telefono -> save();

        //Tabla persona
        $persona -> fill($requestall);
        $persona -> p_nombre_primer = trim($persona->p_nombre_primer);
        $persona -> p_nombre_segundo = trim($persona->p_nombre_segundo);
        $persona -> p_apellido_primer = trim($persona->p_apellido_primer);
        $persona -> p_apellido_segundo = trim($persona->p_apellido_segundo);
        $persona -> p_direccion = trim($persona->p_direccion);
        $persona -> p_edad = $persona['p_fecha_nacimiento'];
        $persona -> save();

        //Tabla paciente
        $paciente = new Paciente();
        $paciente -> pa_id_persona = $persona -> p_id;
        $paciente -> save();

        //Tabla paciente identificado
        $pacienteidentificado = new PacienteIdentificado();
        $pacienteidentificado -> pi_id_paciente = $paciente -> pa_id;
        $pacienteidentificado -> save();

        //Tabla usuario
        $usuario -> u_usuario = $persona -> p_correo;
        $usuario -> save();

        $pacienteidentificado -> msjPacienteIdentificadoInsertado($persona -> full_name);
        return redirect()->route('admin.pacienteidentificado.create');
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
    public function getFormCedulaPi(){
        return view ('Administrador.PacienteIdentificado.CedulaModificar');
    }

    /**
     * @param InsertarCedulaPersonalRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getCedulaPiModificar(InsertarCedulaPersonalRequest $request){
        try {
            $cedula = $request->get('p_cedula');
            $persona = Persona::buscarPersona($cedula);
            try{
                $paciente = Paciente::pacienteFound($persona['p_id']);
                PacienteIdentificado::pacienteIdenFound($paciente->pa_id);
                $persona -> p_fecha_nacimiento_form = $persona -> p_fecha_nacimiento;
                return view('Administrador.PacienteIdentificado.Modificar', compact('persona'));
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

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, InsertarPacienteIdentificadoPerRequest $request){
        $requestall = $request->all();

        $persona = Persona::findOrFail($id);
        $telefono = Telefono::findOrFail($persona -> p_id_telefono);

        try {
            $personal = Personal::personalFound($persona->p_id);
            $usuario = Usuario::usuarioFound($personal->id);

            //Tabla telefono
            $telefono -> fill($requestall);
            $telefono -> t_movil = trim($telefono -> t_movil);
            $telefono -> t_oficina = trim($telefono -> t_oficina);
            $telefono -> save();

            //Tabla persona
            $persona -> fill($requestall);
            $persona -> p_nombre_primer = trim($persona->p_nombre_primer);
            $persona -> p_nombre_segundo = trim($persona->p_nombre_segundo);
            $persona -> p_apellido_primer = trim($persona->p_apellido_primer);
            $persona -> p_apellido_segundo = trim($persona->p_apellido_segundo);
            $persona -> p_direccion = trim($persona->p_direccion);
            $persona -> p_edad = $persona['p_fecha_nacimiento'];
            $persona -> save();

            //Tabla usuario
            $usuario -> u_usuario = $persona -> p_correo;
            $usuario -> save();

            PacienteIdentificado::msjPacienteIdenModificado($persona -> full_name);
            return redirect()->route('admin.pacienteidentificado.edit.cedula');
        }
        catch(ModelNotFoundException $e){
            //Tabla telefono
            $telefono -> fill($requestall);
            $telefono -> t_movil = trim($telefono -> t_movil);
            $telefono -> t_oficina = trim($telefono -> t_oficina);
            $telefono -> save();

            //Tabla persona
            $persona -> fill($requestall);
            $persona -> p_nombre_primer = trim($persona->p_nombre_primer);
            $persona -> p_nombre_segundo = trim($persona->p_nombre_segundo);
            $persona -> p_apellido_primer = trim($persona->p_apellido_primer);
            $persona -> p_apellido_segundo = trim($persona->p_apellido_segundo);
            $persona -> p_direccion = trim($persona->p_direccion);
            $persona -> p_edad = $persona['p_fecha_nacimiento'];
            $persona -> save();

            PacienteIdentificado::msjPacienteIdenModificado($persona -> full_name);
            return redirect()->route('admin.pacienteidentificado.edit.cedula');
        }
    }
}
?>
