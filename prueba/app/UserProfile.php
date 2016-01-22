<?php

namespace prueba;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

    //Si se quiere no se coloca el nombre de la tabla ya que
    //se convierte autom�ticamente el nombre de la clase al nombre de la tabla
    //es decir, UserProfile pasa a ser user_profiles y ya ORM lo va a saber, pero
    //siempre es bueno colocarlo, y si se usa espa�ol perfiles_de_usuarios en la BDD
    //Entondes hay que dec�rselo al ORM, pero si el nombre de la tabla coincide con la conversi�n
    //de ORM, no ser�a necesario (de singular a plural y de CamelCase a underscore)
    protected $table = 'user_profiles';


    public function getAgeAttribute(){
        //Componente incluido en laravel (Carbon) que permite trabajar con fechas
        //Con age() se calcula la edad a partir de la fecha que se le pasa
        return \Carbon\Carbon::parse($this->birthdate)->age;
    }

    public function getFechaNacimientoAttribute(){
        //Componente incluido en laravel (Carbon) que permite trabajar con fechas
        //Con age() se calcula la edad a partir de la fecha que se le pasa
        return \Carbon\Carbon::parse($this->birthdate)->format('d/m/Y');
    }
}
