<?php namespace sembem;

		use Illuminate\Database\Eloquent\Model;
		use Illuminate\Support\Facades\Session;

		class Paciente extends Model
		{
			public $timestamps = false;

			protected $primaryKey = 'pa_id';

			//tabla de la BDD usada por el modelo
			protected $table = 'paciente';

			//atributos que se pueden asignar masivamente
			protected $fillable = ['pa_id', 'pa_id_persona'];


			/*
			* Función en la que se establece la relación
			* entre el objeto Paciente y el objeto Persona
			*/
			public function persona(){
				return $this->hasOne('sembem\Persona', 'p_id', 'pa_id_persona');
			}

			/*
			* Función en la que se establece la relación
			* entre el objeto Paciente y el objeto Paciente Identificado
			* en donde se tiene que un paciente pertenece a
			* uno o ningún paciente identificado
			*/
			public function pacientePi(){
				return $this->belongsTo('sembem\PacienteIdentificado', 'pa_id', 'pi_id_paciente');
			}

			/*
			* Función en la que se establece la relación
			* entre el objeto Paciente y el objeto Paciente No Identificado
			* en donde se tiene que un paciente pertenece a
			* uno o ningún paciente identificado
			*/
			public function pacientePni(){
				return $this->belongsTo('sembem\PacienteNoIdentificado', 'pa_id', 'pni_id_paciente');
			}

			public static function pacienteFound($pid){
				return Paciente::where('pa_id_persona', $pid)->firstOrFail();
			}

			public static function msjPacienteFound(){
				Session::flash('message',
					          ['mensaje' => 'Los datos a continuación pertenecen a un Paciente Identificado, téngalo en cuenta ya que al registrarlo también formará parte del Personal.',
							   'tipo' => 'warning',
						       'msjinicial' => '¡ Atención !'
							  ]);
			}

		}

	?>