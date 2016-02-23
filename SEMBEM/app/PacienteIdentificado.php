<?php namespace sembem;

        use Illuminate\Database\Eloquent\Model;
        use Illuminate\Support\Facades\Session;

        class PacienteIdentificado extends Model{

            public $timestamps = false;

            protected $primaryKey = 'pi_id';

            //tabla de la BDD usada por el modelo
            protected $table = 'paciente_identificado';

            //atributos que se pueden asignar masivamente
            protected $fillable = ['pi_id', 'pi_id_paciente'];


            /*
            * Función en la que se establece la relación
            * entre el objeto Paciente Identificado y el objeto Paciente
            */
            public function paciente(){
                return $this->hasOne('sembem\Paciente', 'pa_id', 'pi_id_paciente');
            }


            /*
            * Función en la que se establece la relación
            * entre el objeto Paciente Identificado y el objeto Examen Médico
            */
            public function examenMedico(){
                return $this->belongsToMany('sembem\ExamenMedico', 'paciente_identificado_examen_medico', 'pie_id_paciente_identificado', 'pie_id_examen_medico')
                            ->withPivot('pie_id','pie_id_paciente_identificado', 'pie_id_examen_medico','pie_fecha_aplicacion','pie_hora_aplicacion','pie_fecha_retiro','pie_hora_retiro',
                                        'pie_observacion','pie_status_entrega','pie_status_realizar');
            }


            public static function pacienteIdenFound($paid){
                return PacienteIdentificado::where('pi_id_paciente', $paid)->firstOrFail();
            }


            public static function msjPacienteIdenFound($cedula){
                Session::flash('message',
                              ['mensaje' => 'La Cédula Nro. '. $cedula . ' ya pertenece a un Paciente Identificado, por favor intente nuevamente.',
                               'tipo' => 'danger',
                               'msjinicial' => '¡ Error !'
                              ]);
            }


            public static function msjPacienteIdentificadoInsertado($fullnombre){
                Session::flash('message',
                              ['mensaje' => 'Se agregó correctamente a ' . $fullnombre . ' como parte de los Pacientes Identificados.',
                               'tipo' => 'success',
                               'msjinicial' => '¡ Éxito !'
                              ]);
            }


            public static function msjPacienteIdenNotFound($cedula){
                Session::flash('message',
                              ['mensaje' => 'La Cédula Nro. '. $cedula . ' no pertenece a algún Paciente Identificado, por favor intente nuevamente.',
                               'tipo' => 'danger',
                               'msjinicial' => '¡ Error !'
                              ]);
            }


            public static function msjPacienteIdenModificado($fullnombre){
                Session::flash('message',
                              ['mensaje' => 'Se modificaron correctamente los datos de ' . $fullnombre . '.',
                               'tipo' => 'success',
                               'msjinicial' => '¡ Éxito !'
                              ]);
            }


            public static function msjPacienteIdenEx($fullnombre){
                Session::flash('message',
                              ['mensaje' => 'Los Exámenes Médicos que se seleccionen serán registrados a nombre del Paciente Identificado: '. $fullnombre .'.',
                               'tipo' => 'warning',
                               'msjinicial' => '¡ Atención !'
                              ]);
            }


            public static function msjExamenMedicoInsertado($fullnombre){
                Session::flash('message',
                              ['mensaje' => 'Se agregó correctamente el Examen Médico a nombre de ' . $fullnombre . '.',
                               'tipo' => 'success',
                               'msjinicial' => '¡ Éxito !'
                              ]);
            }


            public static function msjPacienteIdenNotEx($fullnombre){
                Session::flash('message',
                              ['mensaje' => 'El Paciente Identificado: '. $fullnombre .', no posee algún Examen Médico registrado.',
                               'tipo' => 'danger',
                               'msjinicial' => '¡ Error !'
                              ]);
            }


            public static function msjPacienteIdenNotExMod($fullnombre){
                Session::flash('message',
                              ['mensaje' => 'El Paciente Identificado: '. $fullnombre .', no posee Exámenes Médicos que puedan ser Modificados.',
                               'tipo' => 'danger',
                               'msjinicial' => '¡ Error !'
                              ]);
            }


            /*
            * Función que le envía al index del controlador de exámenes médicos
            * la información necesaria para filtrar y paginar los exámenes médicos del paciente identificado
            */
            public static function filterAndPaginate($paid){
                $pacienteiden = PacienteIdentificado::pacienteIdenFound($paid);

                return $pacienteiden->examenMedico()
                                    ->orderBy('paciente_identificado_examen_medico.pie_fecha_aplicacion', 'DESC')
                                    ->paginate(6);
            }

            /*
            * Función que le envía al index del controlador de exámenes médicos
            * la información necesaria para filtrar y paginar los exámenes médicos del paciente identificado
            */
            public static function filterAndPaginateFiltros($pacienteiden,$fechaapc,$fechartro,$examen){
                $paciente = PacienteIdentificado::where('pi_id', $pacienteiden)->firstOrFail();

                return $paciente ->examenMedico()
                                 ->fechaapc($fechaapc)
                                 ->fechartro($fechartro)
                                 ->examen($examen)
                                 ->orderBy('paciente_identificado_examen_medico.pie_fecha_aplicacion', 'DESC')
                                 ->paginate(6);
            }


            public static function datosPacienteIdentificadoEx($examen){
                $dateapc = explode("-", $examen -> pivot -> pie_fecha_aplicacion);
                $examen -> pivot -> pie_fecha_aplicacion = $dateapc[2] .'/'. $dateapc[1] .'/'. $dateapc[0];

                if($examen -> pivot -> pie_fecha_retiro != null || $examen -> pivot -> pie_fecha_retiro != ""){
                    $daterto = explode("-", $examen -> pivot -> pie_fecha_retiro);
                    $examen -> pivot -> pie_fecha_retiro = $daterto[2] .'/'. $daterto[1] .'/'. $daterto[0];
                }
            }
        }
?>