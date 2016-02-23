<?php namespace sembem;

        use Illuminate\Database\Eloquent\Model;

        class  Cargo extends Model{

            //tabla de la BDD usada por el modelo
                protected $table = 'cargo';

            //atributos que se pueden asignar masivamente
                protected $fillable = ['id','c_descripcion'];

            /*
			 * Función en la que se establece la relación
			 * entre el objeto Cargo y el objeto Personal
			 */
            public function personal(){
                return $this->belongstoMany('sembem\Personal', 'personal_cargo', 'pc_id_cargo', 'pc_id_personal')->withPivot('pc_id_cargo','pc_id_personal');
            }

        }

?>
