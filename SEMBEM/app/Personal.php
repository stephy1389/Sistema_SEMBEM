<?php namespace sembem;

		use Illuminate\Database\Eloquent\Model;
		use Illuminate\Support\Facades\Session;

		class Personal extends Model{

				public $timestamps = false;

			//tabla de la BDD usada por el modelo
				protected $table = 'personal';

			//atributos que se pueden asignar masivamente
				protected $fillable = ['id','per_id_persona','per_id_especialidad','per_id_jerarquia','per_seccion','per_nro_equipo'];


			/*
			* Función en la que se establece la relación
			* entre el objeto Personal y el objeto Persona
			*/
			public function persona(){
				return $this->hasOne('sembem\Persona', 'p_id', 'per_id_persona');
			}

			/*
			* Función en la que se establece la relación
			* entre el objeto Personal y el objeto Especialidad
			*/
			public function especialidad(){
				return $this->hasOne('sembem\Especialidad', 'e_id', 'per_id_especialidad');
			}

			/*
			* Función en la que se establece la relación
			* entre el objeto Personal y el objeto Cargo
			*/
			public function cargo(){
				return $this->belongsToMany('sembem\Cargo', 'personal_cargo', 'pc_id_personal', 'pc_id_cargo')->withPivot('pc_id_personal', 'pc_id_cargo');
			}

			/*
			* Función en la que se establece la relación
            * entre el objeto Personal y el objeto Jerarquia
            */
			public function jerarquia(){
				return $this->hasOne('sembem\Jerarquia', 'j_id', 'per_id_jerarquia');
			}

			/*
			* Función en la que se establece la relación
			* entre el objeto Personal y el objeto Usuario
			*/
			public function usuario(){
				return $this->hasOne('sembem\Usuario', 'u_id_personal', 'id');
			}

			/*
			* Función que le envía al index del controlador de personal
			* la información necesaria para filtrar y paginar el personal
			*/
			public static function filterAndPaginate($nombre, $cargo, $jerarquia){
				return Personal::nombre($nombre)
					->cargo($cargo)
					->jerarquia($jerarquia)
					->orderBy('id', 'ASC')
					->paginate(8);
			}

			public static function datosPersonal($personal){
				$personal -> persona -> telefono;
				$personal -> especialidad;
				$personal -> cargo;
				$personal -> jerarquia;
				$personal -> usuario;
			}

			/*
 			* Función en la que se obtiene el nombre y apellido de la Persona
			* para el Filtro de Nombre de personal en "Buscar"
 			*/
			public function scopeNombre($query, $nombre){
				if(trim($nombre) != ""){
					$query->join('persona', 'per_id_persona', '=', 'persona.p_id')->where(\DB::raw("CONCAT(p_nombre_primer, ' ', p_apellido_primer)"), "LIKE", "%$nombre%");
				}
			}

			/*
 			* Función en la que se obtiene el Cargo de la Persona
			* para el Filtro de Cargo en "Buscar"
 			*/
			public function scopeCargo($query, $cargo){
				$cargos = config('options.cargos');

				if ($cargo != "" && isset($cargos[$cargo])){
					$query->join('personal_cargo', 'personal.id', '=', 'personal_cargo.pc_id_personal')->where('pc_id_cargo', $cargo);
				}
			}

			/*
 			* Función en la que se obtiene la Jerarquía de la Persona
			* para el Filtro de Jerarquía en "Buscar"
 			*/
			public function scopeJerarquia($query, $jerarquia){
				$jerarquias = config('options.jerarquias');

				if ($jerarquia != "" && isset($jerarquias[$jerarquia])){
					$query->where('per_id_jerarquia', $jerarquia);
				}
			}

			public static function personalFound($pid){
				return Personal::where('per_id_persona', $pid)->firstOrFail();
			}

			public static function msjPersonalFound($cedula){
				Session::flash('message',
					          ['mensaje' => 'La Cédula Nro. '. $cedula . ' ya pertenece a un Personal, por favor intente nuevamente.',
							   'tipo' => 'danger',
							   'msjinicial' => '¡ Error !'
							  ]);
			}

			public static function msjPersonalNotFound($cedula){
				Session::flash('message',
					          ['mensaje' => 'La Cédula Nro. '. $cedula . ' no pertenece al Personal, por favor intente nuevamente.',
						       'tipo' => 'danger',
						       'msjinicial' => '¡ Error !'
					          ]);
			}

			public static function msjPersonalInsertado($fullnombre){
				Session::flash('message',
					          ['mensaje' => 'Se agregó correctamente a ' . $fullnombre . ' como parte del Personal.',
							   'tipo' => 'success',
						       'msjinicial' => '¡ Éxito !'
					          ]);
			}

			public static function personalFoundMod($pid){
				return Personal::where('per_id_persona', $pid)->firstOrFail();
			}

			public static function msjPersonalModificado($fullnombre){
				Session::flash('message',
						      ['mensaje' => 'Se modificaron correctamente los datos de ' . $fullnombre . '.',
						       'tipo' => 'success',
						       'msjinicial' => '¡ Éxito !'
					          ]);
			}

			public static function msjPersonalPaFound(){
				Session::flash('message',
					          ['mensaje' => 'Los datos a continuación pertenecen al Personal, téngalo en cuenta ya que al registrarlo también formará parte de los Pacientes Identificados.',
						       'tipo' => 'warning',
						       'msjinicial' => '¡ Atención !'
					          ]);
			}

		}

?>
