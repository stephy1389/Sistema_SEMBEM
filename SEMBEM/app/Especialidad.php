<?php namespace sembem;

        use Illuminate\Database\Eloquent\Model;

        class  Especialidad extends Model{

            //tabla de la BDD usada por el modelo
                protected $table = 'especialidad';

            //atributos que se pueden asignar masivamente
                protected $fillable = ['e_id','e_descripcion'];

            /*
            * Función en la que se establece la relación
            * entre el objeto Especialidad y el objeto Personal,
            * en donde se tiene que un personal pertenece a una o ninguna Especialidad
            */
            public function personalEspecialidad(){
                return $this->belongsTo('sembem\Personal', 'per_id_especialidad', 'e_id');
            }
        }

?>
