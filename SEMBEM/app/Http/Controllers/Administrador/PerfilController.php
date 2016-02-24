<?php namespace sembem\Http\Controllers\Administrador;

use sembem\Http\Requests\ModificarContrasenaRequest;
use sembem\Http\Requests\ModificarPreguntaRequest;
use Illuminate\Routing\Redirector;
use sembem\Http\Controllers\Controller;
use sembem\Usuario;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(){

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id){
        $perfil = Usuario::find($id);
        return view ('Administrador.Perfil.ModificarContrasena',compact('perfil'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, ModificarContrasenaRequest $request){
        $requestall = $request->all();
        $usuario = Usuario::find($id);
        $usuario -> password = $requestall['password_nueva'];
        $usuario -> save();

        $usuario->msjPasswordModificado();
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function editPregunta($id){
        $perfil = Usuario::find($id);
        return view ('Administrador.Perfil.ModificarPregunta',compact('perfil'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function updatePregunta($id, ModificarPreguntaRequest $request){
        $requestall = $request->all();
        $usuario = Usuario::find($id);
        $usuario -> u_id_pregunta = $requestall['u_id_pregunta_nueva'];
        $usuario -> u_respuesta = trim($requestall['u_respuesta_nueva']);
        $usuario -> save();

        $usuario->msjPreguntaModificada();
        return redirect()->back();
    }

}

?>