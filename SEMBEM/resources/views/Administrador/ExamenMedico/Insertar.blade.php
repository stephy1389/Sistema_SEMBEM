@extends('Menus.menuadministrador')

@section('contenido')

    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">INSERTAR EXAMEN MÉDICO - CAMPOS OBLIGATORIOS (<font color="#DF0101">*</font>)</h3>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('message.tipo') }} alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <p><strong>{{ Session::get('message.msjinicial') }}</strong> {{ Session::get('message.mensaje') }}</p>
                        </div>
                        {{ Session::flush() }}
                    @endif

                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.examenmedico.store', 'method' => 'POST']) !!}

                        @include('Administrador.ExamenMedico.Partials.Fields')


                        {!! Form::hidden('pi_id', $pacienteiden->pi_id) !!}
                        {!! Form::hidden('pi_id_paciente', $pacienteiden->pi_id_paciente) !!}
                        {!! Form::hidden('pie_fecha_retiro', null) !!}
                        {!! Form::hidden('pie_hora_retiro', '') !!}
                        {!! Form::hidden('pie_observacion', '') !!}
                        {!! Form::hidden('pie_status_entrega', 'f') !!}
                        {!! Form::hidden('pie_status_realizar', 'f') !!}

                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'admin.examenmedico.create', 'method' => 'GET']) !!}
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
