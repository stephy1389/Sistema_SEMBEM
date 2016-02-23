<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

/*
* Rutas del Sistema
*/
Route::group(['middleware' => ['web']], function () {
	/*
	* Rutas para el Administrador
	*/
    Route::group(['prefix' => 'admin', 'namespace' => 'Administrador'], function(){

        //Propios del Administrador, solo he usado el Mostrar la Pantalla Principal del Administrador (index)
        Route::resource('administrador', 'AdministradorController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);

        //Para recibir la cédula del formulario y mostrar el formulario de Insertar Personal
        Route::get('personal/cedula', array('as' => 'admin.personal.cedula', 'uses' => 'PersonalController@getCedula'));

        //Para Insertar a un Paciente Identificado como Personal
        Route::put('personal/ppi/{personal}', array('as' => 'admin.personal.storeppi', 'uses' => 'PersonalController@storePpi'));

        //Para mostrar el formulario de Ingresar la Cédula para Modificar Personal
        Route::get('personal/edit/cedula', array('as' => 'admin.personal.edit.cedula', 'uses' => 'PersonalController@getFormCedula'));

        //Para recibir la cédula del formulario y mostrar el formulario de Modificar Personal
        Route::get('personal/cedula/mod', array('as' => 'admin.personal.cedula.mod', 'uses' => 'PersonalController@getCedulaModificar'));

        //Para todo lo relacionado al Módulo de Personal, más las cuatro rutas de arriba
        Route::resource('personal', 'PersonalController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);

        //Para recibir la cédula del formulario y mostrar el formulario de Insertar Paciente Identificado
        Route::get('pacienteidentificado/cedula', array('as' => 'admin.pacienteidentificado.cedula', 'uses' => 'PacienteIdentificadoController@getCedulaPi'));

        //Para Insertar a un Personal como Paciente Identificado
        Route::put('pacienteidentificado/piper/{pacienteidentificado}', array('as' => 'admin.pacienteidentificado.storepiper', 'uses' => 'PacienteIdentificadoController@storePiper'));

        //Para mostrar el formulario de Ingresar la Cédula para Modificar Paciente Identificado
        Route::get('pacienteidentificado/edit/cedula', array('as' => 'admin.pacienteidentificado.edit.cedula', 'uses' => 'PacienteIdentificadoController@getFormCedulaPi'));

        //Para recibir la cédula del formulario y mostrar el formulario de Modificar Paciente Identificado
        Route::get('pacienteidentificado/cedula/mod', array('as' => 'admin.pacienteidentificado.cedula.mod', 'uses' => 'PacienteIdentificadoController@getCedulaPiModificar'));

        //Para todo lo relacionado al Módulo de Paciente Identificado más las tres de arriba y la que está abajo
        Route::resource('pacienteidentificado', 'PacienteIdentificadoController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);

        //Para mostrar el formulario de Ingresar la Cédula para Consultar Paciente Identificado
        Route::get('pacienteidentificado/consultar/cedula', array('as' => 'admin.pacienteidentificado.consultar.cedula', 'uses' => 'PacienteIdentificadoController@getFormCedulaConsultarPi'));

        //Para todo lo relacionado al Módulo de Paciente No Identificado
        Route::resource('pacientenoidentificado', 'PacienteNoIdentificadoController', ['only' => ['index', 'create', 'store', 'show']]);

        //Para recibir la cédula del formulario y mostrar el formulario de Insertar Exámenes Médicos
        Route::get('examenmedico/pacienteidentificado/cedula', array('as' => 'admin.examenmedico.pacienteidentificado.cedula', 'uses' => 'ExamenMedicoController@getCedulaExPi'));

        //Para mostrar el formulario de Ingresar la Cédula para Modificar Examen Médico
        Route::get('examenmedico/pacienteidentificado/edit/cedula', array('as' => 'admin.examenmedico.pacienteidentificado.edit.cedula', 'uses' => 'ExamenMedicoController@getFormCedulaExPi'));

        //Para recibir la cédula del formulario y mostrar la Tabla con los Exámenes Médicos para Modificar
        Route::get('examenmedico/pacienteidentificado/cedula/mod', array('as' => 'admin.examenmedico.pacienteidentificado.cedula.mod', 'uses' => 'ExamenMedicoController@getCedulaExPiModificar'));

        //Para mostrar los Filtros de los Exámenes Médicos del Paciente Identificado
        Route::get('examenmedico/filtros/{pacienteiden}', array('as' => 'admin.examenmedico.filtros', 'uses' => 'ExamenMedicoController@getIndexFiltros'));

        //Para mostrar los Filtros de los Exámenes Médicos del Paciente Identificado al Modificar
        Route::get('examenmedico/mod/filtros/{pacienteiden}', array('as' => 'admin.examenmedico.mod.filtros', 'uses' => 'ExamenMedicoController@getIndexFiltrosMod'));

        //Para mostrar el formulario de Ingresar la Cédula para Consultar Exámenes Médicos
        Route::get('examenmedico/consultar/cedula', array('as' => 'admin.examenmedico.consultar.cedula', 'uses' => 'ExamenMedicoController@getFormCedulaConsultarExPi'));

        //Para todo lo relacionado al Módulo de Exámenes Médicos
        Route::resource('examenmedico', 'ExamenMedicoController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);


    });

});
