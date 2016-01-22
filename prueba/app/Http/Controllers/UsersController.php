<?php

namespace prueba\Http\Controllers;

use prueba\User;


class UsersController extends Controller{

    //Usando Eloquent
    //Se coloca en la ruta /users/orm para que llame a este método, ya que en routes se tiene que para el controlador
    //UsersController se va a usar users y aquí se encuentran todos los métodos para él... Se trae un objeto que no es plano, sino que forma parte del ORM Eloquent
    public function getOrm(){

        $users = User:://select('id', 'first_name')
            //->join()   también se puede usar para por ejemplo traerme solo los usuarios que tienen twitter
            //->with('profile')
            //where('first_name', '<>', 'Stephy')
            //->orderBy('first_name', 'ASC')
            get();  //Me traigo un objeto de la clase Users y este representa el primer registro de la BDD que en este caso es el número 1

        foreach($users as $user) {
            $user-> ano = $user->profile->age;  //Es lo mismo que llamar a getFullNameAttribute(), usa los métodos mágicos de PHP
        }

            dd($users->toArray());
    }



    //Usando Fluent
    public function getIndex(){   //Se coloca el get que es el tipo de método Http que voy a llamar que en este caso es get y luego el nombre del método

       //Así los devuelve de forma Json
        $result = \DB::table('users')
            ->select(
                'users.*',
                'user_profiles.id as profile_id',
                'user_profiles.twitter'
            )  //Se puede obviar el .users porque es una sola tabla
            ->orderBy('id', 'ASC')
            ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->get();

        //->orderBy(\DB::('RAND()'))   Permite utilizar un método propio del motor de base de datos pero elimina la protección de inyección de SQL

        //Con el join no trae mis datos de la tabla users ya que yo no tengo un user_profiles hecho,
        //por lo que hay que hacer uso del left join, para que traiga todos los de la tabla users que se encuentren
        //o no en la tabla user_profiles, trayendo esos campos como NULL ya que no tengo un profile hecho


       //Método dd, usa método de Symfony para imprimir los datos, permite extender y retraer la información
        dd($result);

        return $result;
    }
}
