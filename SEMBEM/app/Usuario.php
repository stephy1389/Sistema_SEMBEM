<?php namespace sembem;

        use Illuminate\Database\Eloquent\Model;


    class  Usuario extends Model{

            public $timestamps = false;

            protected $primaryKey = 'u_id';

            //tabla de la BDD usada por el modelo
            protected $table = 'usuario';

            //atributos que se pueden asignar masivamente
            protected $fillable = ['u_id','u_id_personal','u_id_pregunta','u_usuario','password','u_permisologia_acc','u_permisologia_morb','u_status',
                                   'u_status_primeravez','u_respuesta'];

            /*
            * Función en la que se establece la relación
            * entre el objeto Usuario y el objeto Personal
            * en donde se tiene que un usuario pertenece a
            * solo uno del personal
            */
            public function usuarioPersonal(){
                return $this->belongsTo('sembem\Personal', 'id', 'u_id_personal');
            }

            public function setPasswordAttribute($pass){
                $this->attributes['password'] = bcrypt($pass);
		    }

            public static function usuarioFound($perid){
                return Usuario::where('u_id_personal', $perid)->firstOrFail();
            }
    }

?>
