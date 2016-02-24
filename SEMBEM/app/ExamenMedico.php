<?php namespace sembem;

use Illuminate\Database\Eloquent\Model;

class ExamenMedico extends Model{

    public $timestamps = false;

    protected $primaryKey = 'ex_id';

    //tabla de la BDD usada por el modelo
    protected $table = 'examen_medico';

    //atributos que se pueden asignar masivamente
    protected $fillable = ['ex_id', 'ex_nombre', 'ex_descripcion'];


    /*
    * Función en la que se establece la relación
    * entre el objeto Examen Médico y el objeto Paciente Identificado
    */
    public function pacienteIdentificado(){
        return $this->belongstoMany('sembem\PacienteIdentificado', 'paciente_identificado_examen_medico', 'pie_id_examen_medico', 'pie_id_paciente_identificado')
                    ->withPivot('pie_id','pie_id_examen_medico','pie_id_paciente_identificado','pie_fecha_aplicacion','pie_hora_aplicacion','pie_fecha_retiro','pie_hora_retiro',
                                'pie_observacion','pie_status_entrega','pie_status_realizar');
    }


    /*
    * Función en la que se obtiene la Fecha de Aplicación del Examen Médico del Paciente Identificado
    * para el Filtro de Fecha de Aplicación en "Buscar"
    */
    public function scopeFechaapc($query, $fecha){
        if(trim($fecha) != "" || trim($fecha) != null){
            $query->where('pie_fecha_aplicacion',"$fecha");
        }
    }


    /*
    * Función en la que se obtiene la Fecha de Retiro del Examen Médico del Paciente Identificado
    * para el Filtro de Fecha de Retiro en "Buscar"
    */
    public function scopeFechartro($query, $fecha){
        if(trim($fecha) != "" || trim($fecha) != null){
            $query->where('pie_fecha_retiro',"$fecha");
        }
    }


    /*
    * Función en la que se obtiene el Examen Médico del Paciente Identificado
    * para el Filtro de Examen Médico en "Buscar"
    */
    public function scopeExamen($query, $examen){
        $examenesmedicos = config('options.examenesmedicos');

        if (($examen != "" || $examen != null) && isset($examenesmedicos[$examen])){
            $query->where('pie_id_examen_medico', $examen);
        }
    }

}
?>