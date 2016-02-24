<?php namespace sembem;

	use Illuminate\Database\Eloquent\Model;

	class Telefono extends Model{

				public $timestamps = false;

				protected $primaryKey = 't_id';

			//tabla de la BDD usada por el modelo
				protected $table = 'telefono';

			//atributos que se pueden asignar masivamente
				protected $fillable = ['t_id','t_fijo','t_movil','t_oficina'];

			/*
			* Función en la que se establece la relación
			* entre el objeto Telefono y el objeto Persona
			* en donde se tiene que un teléfono pertenece a
			* una o varias personas
			*/
			public function telefonoPersona(){
				return $this->belongsTo('sembem\Persona', 'p_id_telefono', 't_id');
			}
	}

?>
