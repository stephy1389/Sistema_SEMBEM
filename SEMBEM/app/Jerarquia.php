<?php namespace sembem;

        use Illuminate\Database\Eloquent\Model;

        class  Jerarquia extends Model{

            //tabla de la BDD usada por el modelo
                protected $table = 'jerarquia';

            //atributos que se pueden asignar masivamente
                protected $fillable = ['j_id','j_descripcion'];

            /*
             * Función en la que se establece la relación
             * entre el objeto Jerarquia y el objeto Personal,
             * en donde se tiene que un personal pertenece a una Jerarquia
             */
             public function personalJerarquia(){
                return $this->belongsTo('sembem\Personal', 'per_id_jerarquia', 'j_id');
             }


        }

?>
