@extends('Menus.menuadministrador')

<?php
    $date = explode("-", $pacientenoidentificado -> pni_fecha_ing);
    $pacientenoidentificado -> pni_fecha_ing = $date[2] .'/'. $date[1] .'/'. $date[0];
?>

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">CONSULTAR PACIENTE NO IDENTIFICADO</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="120px">Fecha</th>
                                <th width="120px">Hora</th>
                                <th width="180px">Color de Ojos</th>
                                <th width="190px">Color de Piel</th>
                                <th width="190px">Color de Cabello</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>
                                    {{ $pacientenoidentificado -> pni_fecha_ing }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_hora_ing }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_color_ojos }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_color_piel }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_color_cabello }}
                                </td>
                            </tr>
                        </table>
                        <?php echo '<br>' ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="120px">Estatura</th>
                                <th width="120px">Apodo</th>
                                <th width="180px">Contextura</th>
                                <th width="180px">Vestimenta</th>
                                <th width="180px">Tipo de Paciente</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>
                                    {{ $pacientenoidentificado -> pni_estatura }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_apodo }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_contextura }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_vestimenta }}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> paciente -> persona -> p_tipo }}
                                </td>
                            </tr>
                        </table>
                        <?php echo '<br>' ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                            <th width="120px">Género</th>
                            <th width="230px">Diagnóstico</th>
                            <th width="230px">Tratamiento</th>
                            <th width="230px">Dirección u Observación</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>
                                    {{ config('options.generos.'.$pacientenoidentificado -> paciente -> persona -> p_sexo )}}
                                </td>
                                <td>
                                    {{ $pacientenoidentificado -> pni_diagnostico }}
                                </td>
                                <td>
                                    @if(($pacientenoidentificado -> pni_tratamiento == null) || ($pacientenoidentificado -> pni_tratamiento == ""))
                                        {{ "N/A"  }}
                                    @else
                                        {{ $pacientenoidentificado -> pni_tratamiento }}
                                    @endif
                                </td>
                                <td>
                                    @if(($pacientenoidentificado -> paciente -> persona -> p_direccion == null) || ($pacientenoidentificado -> paciente -> persona -> p_direccion == ""))
                                        {{ "N/A"  }}
                                    @else
                                        {{ $pacientenoidentificado -> paciente -> persona -> p_direccion }}
                                    @endif
                                </td>
                            </tr>
                        </table>

                        {!! Form::open(['route' => 'admin.pacientenoidentificado.index', 'method' => 'GET']) !!}
                        <br><br>
                        <div align="right">
                            <button type="submit" class="btn btn-primary">Regresar</button>
                        </div>
                        <br>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@stop
