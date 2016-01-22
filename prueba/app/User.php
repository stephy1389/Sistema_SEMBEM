<?php

namespace prueba;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'type'];
    //fillable son los atributos asignados de forma masiva
    //aqu� no deben ir los atributos que no queremos que el usuario pueda modificar
    //por ejemplo, no debe ir el id

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    //Métodos para lo de Eloquent

    public function profile(){
        return $this->hasOne('prueba\UserProfile');
    }

    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setPasswordAttribute($value){
        if( ! empty ($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }


}
