<?php namespace sembem;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Session;

	class Persona extends Model{

			public $timestamps = false;

			protected $primaryKey = 'p_id';

		//tabla de la BDD usada por el modelo
			protected $table = 'persona';

		//atributos que se pueden asignar masivamente
			protected $fillable = ['p_id','p_id_telefono','p_nombre_primer','p_nombre_segundo','p_apellido_primer','p_apellido_segundo','p_nacionalidad','p_cedula',
	                          	   'p_edo_civil','p_edad','p_fecha_nacimiento','p_sexo','p_direccion','p_correo','p_tipo'];

		 /*
         * Función en la que se establece la relación
         * entre el objeto Persona y el objeto Personal
		 * en donde se tiene que una persona pertenece a
		 * uno o ninguno del personal
         */
		 public function personaPersonal(){
		 	return $this->belongsTo('sembem\Personal', 'p_id', 'per_id_persona');
		 }

		/*
		* Función en la que se establece la relación
		* entre el objeto Persona y el objeto Paciente
		* en donde se tiene que una persona pertenece a
		* uno o ningún paciente
		*/
		public function personaPaciente(){
			return $this->belongsTo('sembem\Paciente', 'p_id', 'pa_id_persona');
		}

		/*
        * Función en la que se establece la relación
        * entre el objeto Persona y el objeto Telefono
        */
		public function telefono(){
			return $this->hasOne('sembem\Telefono', 't_id', 'p_id_telefono');
		}

		public static function datosPersona($person){
			$person->telefono;
		}

		public static function datosPersonal($person){
			$person->telefono;
			$person->personaPersonal->especialidad;
			$person->personaPersonal->cargo;
			$person->personaPersonal->jerarquia;
			$person->personaPersonal->usuario;
			return $person;
		}

		public static function buscarPersona($cedula){
			return Persona::where('p_cedula', $cedula)->firstOrFail();
		}

		public function setPEdadAttribute($fecha){
			if($fecha == ""){
				$this->attributes['p_edad'] = "";
			}
			else{
				$date = explode("/", $fecha);
				$this->attributes['p_edad'] = \Carbon\Carbon::createFromDate($date[2], $date[1], $date[0])->age;
			}
		}

		public function getFullNameAttribute(){
			return $this -> p_nombre_primer . ' ' . $this -> p_apellido_primer;
		}

		public function setPFechaNacimientoFormAttribute($fecha){
			$date = explode("-", $fecha);
			$this->attributes['p_fecha_nacimiento'] = $date[2] .'/'. $date[1] .'/'. $date[0];
		}

		public static function msjPersonaNotFound($cedula){
			Session::flash('message',
						  ['mensaje' => 'La Cédula Nro. '. $cedula . ' no se encuentra registrada, por favor intente nuevamente.',
					       'tipo' => 'danger',
					       'msjinicial' => '¡ Error !'
				          ]);
		}
	}
?>