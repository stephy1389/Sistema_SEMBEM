<?php namespace sembem\Http\Controllers\Administrador;

use sembem\Http\Requests\ConsultarPersonalRequest;
use sembem\Http\Requests\InsertarPersonalRequest;
use sembem\Http\Requests\InsertarPersonalPIRequest;
use sembem\Http\Requests\InsertarCedulaPersonalRequest;
use sembem\Http\Requests\ModificarPersonalRequest;
use Illuminate\Routing\Redirector;
use sembem\Http\Controllers\Controller;
use sembem\Personal;
use sembem\Telefono;
use sembem\Persona;
use sembem\Usuario;
use sembem\Paciente;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ConsultarPersonalRequest $request)
    {
        $personals = Personal::filterAndPaginate($request->get('nombre'), $request->get('cargo'),$request->get('jerarquia'));

        foreach($personals as $personal) {
            Personal::datosPersonal($personal);
       }

        return view('Administrador.Personal.Consultar', compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){
        return view ('Administrador.Personal.Cedula');
    }

    /**
     *
     */
    public function getCedula(InsertarCedulaPersonalRequest $request){
        try {
            $cedula = $request->get('p_cedula');
            $persona = Persona::buscarPersona($cedula);
            try{
                $personal = new Personal;
                $personal->personalFound($persona['p_id']);
                $personal->msjPersonalFound($cedula);
                return redirect()->back();
            }
            catch(ModelNotFoundException $e){
                $paciente = new Paciente;
                $paciente->pacienteFound($persona['p_id']);
                $persona->p_fecha_nacimiento_form = $persona['p_fecha_nacimiento'];
                $paciente->msjPacienteFound();
                return view('Administrador.Personal.InsertarPI', compact('persona'));
            }
        }
        catch(ModelNotFoundException $e){
            return view('Administrador.Personal.Insertar', compact('cedula'));
        }

       // $datospersona = Persona::datosPersona($persona);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(InsertarPersonalRequest $request)
    {
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

        //Tabla personal
        $personal = new Personal($requestall);
        if($personal['per_id_especialidad'] == ""){
            $personal['per_id_especialidad'] = null;
        }
        $personal -> per_id_persona = $persona -> p_id;
        $personal -> per_nro_equipo = trim($personal -> per_nro_equipo);
        $personal -> save();

        //Tabla personal_cargo
        $personal -> cargo() -> sync($requestall['pc_id_cargo']);

        //Tabla usuario
        $usuario = new Usuario($requestall);
        if ($usuario['u_permisologia_morb'] == ""){
            $usuario['u_permisologia_morb'] = 'f';
        }
        $usuario -> u_id_personal = $personal -> id;
        $usuario -> u_usuario = $requestall['p_correo'];
        $usuario -> password = $requestall['p_cedula'];
        $usuario -> save();

        $personal->msjPersonalInsertado($persona -> full_name);
        return redirect()->route('admin.personal.create');
    }

    public function storePpi($id, InsertarPersonalPIRequest $request){
        $requestall = $request->all();

        $persona = Persona::findOrFail($id);
        $telefono = Telefono::findOrFail($persona -> p_id_telefono);

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

        //Tabla personal
        $personal = new Personal($requestall);
        if($personal['per_id_especialidad'] == ""){
            $personal['per_id_especialidad'] = null;
        }
        $personal -> per_id_persona = $persona -> p_id;
        $personal -> per_nro_equipo = trim($personal -> per_nro_equipo);
        $personal -> save();

        //Tabla personal_cargo
        $personal -> cargo() -> sync($requestall['pc_id_cargo']);

        //Tabla usuario
        $usuario = new Usuario($requestall);
        if ($usuario['u_permisologia_morb'] == ""){
            $usuario['u_permisologia_morb'] = 'f';
        }
        $usuario -> u_id_personal = $personal -> id;
        $usuario -> u_usuario = $requestall['p_correo'];
        $usuario -> password = $requestall['p_cedula'];
        $usuario -> save();

        $personal->msjPersonalInsertado($persona -> full_name);
        return redirect()->route('admin.personal.create');
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
    //public function getFormCedula(){
    //    return view ('Administrador.Personal.CedulaModificar');
    //}

    /**
     *
     */
    /**
     * public function getCedulaModificar(InsertarCedulaPersonalRequest $request){
            try {
                $cedula = $request->get('p_cedula');
                $persona = Persona::buscarPersona($cedula);
                try{
                    $personal = Personal::personalFoundMod($persona['p_id']);
                    try{
                        $paciente = new Paciente;
                        $paciente->pacienteFound($persona['p_id']);
                        $personal -> persona -> p_fecha_nacimiento_form = $personal -> persona -> p_fecha_nacimiento;
                        $pacienteper = true;
                        return view('Administrador.Personal.Modificar', compact('personal','persona','pacienteper'));
                    }
                    catch(ModelNotFoundException $e){
                        $personal -> persona -> p_fecha_nacimiento_form = $personal -> persona -> p_fecha_nacimiento;
                        return view('Administrador.Personal.Modificar', compact('personal','persona'));
                    }
                }
                catch(ModelNotFoundException $e){
                    Personal::msjPersonalNotFound($cedula);
                    return redirect()->back();
                }
            }
            catch(ModelNotFoundException $e){
                Persona::msjPersonaNotFound($request->get('p_cedula'));
                return redirect()->back();
            }
        }
     **/


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $personal = Personal::find($id);
        $persona = $personal -> persona;
        try{
            $paciente = new Paciente;
            $paciente->pacienteFound($persona['p_id']);
            $personal -> persona -> p_fecha_nacimiento_form = $personal -> persona -> p_fecha_nacimiento;
            $pacienteper = true;
            return view('Administrador.Personal.Modificar', compact('personal','persona','pacienteper'));
        }
        catch(ModelNotFoundException $e){
            $personal -> persona -> p_fecha_nacimiento_form = $personal -> persona -> p_fecha_nacimiento;
            return view('Administrador.Personal.Modificar', compact('personal','persona'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, ModificarPersonalRequest $request){
        $requestall = $request->all();

        $persona = Persona::findOrFail($id);
        $telefono = Telefono::findOrFail($persona -> p_id_telefono);
        $personal = Personal::where('per_id_persona', $persona -> p_id)->firstOrFail();
        $usuario = Usuario::where('u_id_personal', $personal -> id)->firstOrFail();

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

        //Tabla personal
        $personal -> fill($requestall);
        if($personal['per_id_especialidad'] == ""){
            $personal['per_id_especialidad'] = null;
        }
        $personal -> per_nro_equipo = trim($personal -> per_nro_equipo);
        $personal -> save();

        //Tabla personal_cargo
        $personal -> cargo() -> sync($requestall['pc_id_cargo']);

        //Tabla usuario
        $usuario -> fill($requestall);
        if ($usuario['u_permisologia_morb'] == ""){
            $usuario['u_permisologia_morb'] = 'f';
        }
        $usuario -> u_usuario = $requestall['p_correo'];
        if(isset($requestall['resetpassword']) == "on"){
            $usuario -> password = $requestall['p_cedula'];
            $usuario -> u_id_pregunta = null;
            $usuario -> u_respuesta = null;
            $usuario -> u_status_primeravez = "f";
        }
        $usuario -> save();

        $personal->msjPersonalModificado($persona -> full_name);
        return redirect()->route('admin.personal.index');
    }

}

?>