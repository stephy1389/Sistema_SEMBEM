<?php namespace sembem;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class PacienteIdentificadoExamenMedico extends Model{

    public $timestamps = false;

    protected $primaryKey = 'pie_id';

    //tabla de la BDD usada por el modelo
    protected $table = 'paciente_identificado_examen_medico';

    //atributos que se pueden asignar masivamente
    protected $fillable = ['pie_id','pie_id_examen_medico','pie_id_paciente_identificado','pie_fecha_aplicacion','pie_hora_aplicacion','pie_fecha_retiro','pie_hora_retiro',
                           'pie_observacion','pie_status_entrega','pie_status_realizar'];


    public function setPieFechaAplicacionFormAttribute($fecha){
        $date = explode("-", $fecha);
        $this->attributes['pie_fecha_aplicacion'] = $date[2] .'/'. $date[1] .'/'. $date[0];
    }


    public static function msjExamenMedicoModificado($fullnombre){
        Session::flash('message',
                      ['mensaje' => 'Se modificó correctamente el Examen Médico del Paciente Identificado: ' . $fullnombre . '.',
                       'tipo' => 'success',
                       'msjinicial' => '¡ Éxito !'
                      ]);
    }
}
?>