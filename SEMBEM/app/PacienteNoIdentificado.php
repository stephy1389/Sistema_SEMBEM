<?php namespace sembem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

	class PacienteNoIdentificado extends Model{

		public $timestamps = false;

		protected $primaryKey = 'pni_id';

		//tabla de la BDD usada por el modelo
		protected $table = 'paciente_no_identificado';

		//atributos que se pueden asignar masivamente
		protected $fillable = ['pni_id', 'pni_id_paciente', 'pni_fecha_ing', 'pni_hora_ing', 'pni_color_ojos', 'pni_color_piel',
			                   'pni_color_cabello', 'pni_estatura', 'pni_apodo', 'pni_contextura', 'pni_vestimenta', 'pni_diagnostico',
			                   'pni_tratamiento'
							  ];

		/*
		* Función en la que se establece la relación
		* entre el objeto Paciente No Identificado y el objeto Paciente
		*/
		public function paciente(){
			return $this->hasOne('sembem\Paciente', 'pa_id', 'pni_id_paciente');
		}


		public static function msjPacienteNoIdentificadoInsertado(){
			Session::flash('message',
				          ['mensaje' => 'Se agregó correctamente al Paciente No Identificado.',
					       'tipo' => 'success',
					       'msjinicial' => '¡ Éxito !'
				          ]);
		}


		public function setPniFechaIngAttribute($fechahora){
			$fechahorasep = explode(" ", $fechahora);
			$this->attributes['pni_fecha_ing'] = $fechahorasep[0];
		}


		public function setPniHoraIngAttribute($fechahora){
			$fechahorasep = explode(" ", $fechahora);
			$this->attributes['pni_hora_ing'] = $fechahorasep[1] . ' ' . $fechahorasep[2];
		}


		/*
		* Función que le envía al index del controlador de paciente no identificado
		* la información necesaria para filtrar y paginar los pacientes no identificados
		*/
		public static function filterAndPaginate($apodo, $genero, $fecha){
			return PacienteNoIdentificado::apodo($apodo)
				                           ->genero($genero)
				                           ->fecha($fecha)
				                           ->orderBy('pni_id', 'ASC')
							               ->paginate(8);
		}


		public static function datosPacienteNoIdentificado($pacientenoidentificado){
			$date = explode("-", $pacientenoidentificado -> pni_fecha_ing);
			$pacientenoidentificado -> pni_fecha_ing = $date[2] .'/'. $date[1] .'/'. $date[0];
			$pacientenoidentificado -> paciente -> persona -> telefono;
		}


		/*
 		* Función en la que se obtiene el Apodo del Paciente No Identificado
		* para el Filtro de Apodo en "Buscar"
 		*/
		public function scopeApodo($query, $apodo){
			if(trim($apodo) != ""){
				$query->where('pni_apodo', "LIKE", "%$apodo%");
			}
		}


		/*
 		* Función en la que se obtiene el Género de la Persona
		* para el Filtro de Género en "Buscar"
 		*/
		public function scopeGenero($query, $genero){
			$generos = config('options.generos');

			if ($genero != "" && isset($generos[$genero])){
				$query -> join('paciente', 'pni_id_paciente', '=', 'paciente.pa_id')
					   -> join('persona', 'pa_id_persona', '=', 'persona.p_id')
					   -> where('p_sexo', $genero);
			}
		}


		/*
 		* Función en la que se obtiene la Fecha de Ingreso del Paciente No Identificado
		* para el Filtro de Fecha de Ingreso en "Buscar"
 		*/
		public function scopeFecha($query, $fecha){
			if(trim($fecha) != ""){
				$query->where('pni_fecha_ing',"$fecha");
			}
		}
}
?>