<?php

namespace prueba\Http\Controllers\Admin;

use Illuminate\Http\Request;

use prueba\Http\Requests;
use prueba\Http\Controllers\Controller;
use prueba\Http\Requests\CreateUserRequest;
use prueba\Http\Requests\EditUserRequest;
use prueba\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User($request->all());
        //$user->type = 'user';    Para obligar a que todos los usuarios sean de tipo user
        //y no colocarlo en el array de fillables, de manera que se proteja la aplicación
        //ese atributo no estaría incluído en la asignación masiva
        $user->save();

        return redirect()->route('admin.users.index');

        //Otra forma:
        // $user = new User();
        // $user->fill($request->all());
        // $user->save();

        //Otra forma:
        // $user = User::create($request->all());  ---DUILIO USÓ ESTA Y LUEGO EL REDIRECT---

        //Otra forma:
        //$user = User::create(Request:all());
        //return redirect()->route('admin.users.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); //Si el usuario no es encontrado, laravel va a lanzar un error 404

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fill($request->all());
        $user->save();

        return redirect()->back(); //Para que me devuelva al formulario anterior de edición
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
