@extends('Menus.menuadministrador')

@section('contenido')

    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">INSERTAR PACIENTE NO IDENTIFICADO - CAMPOS OBLIGATORIOS (<font color="#DF0101">*</font>)</h3>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('message.tipo') }} alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <p><strong>{{ Session::get('message.msjinicial') }}</strong> {{ Session::get('message.mensaje') }}</p>
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(['route' => 'admin.pacientenoidentificado.store', 'method' => 'POST']) !!}

                        @include('Administrador.PacienteNoIdentificado.Partials.Fields')

                        {!! Form::hidden('t_fijo', '') !!}
                        {!! Form::hidden('t_movil', '') !!}
                        {!! Form::hidden('t_oficina', '') !!}
                        {!! Form::hidden('p_nombre_primer', '') !!}
                        {!! Form::hidden('p_nombre_segundo', '') !!}
                        {!! Form::hidden('p_apellido_primer', '') !!}
                        {!! Form::hidden('p_apellido_segundo', '') !!}
                        {!! Form::hidden('p_nacionalidad', '') !!}
                        {!! Form::hidden('p_cedula', '') !!}
                        {!! Form::hidden('p_edo_civil', '') !!}
                        {!! Form::hidden('p_edad', '') !!}
                        {!! Form::hidden('p_fecha_nacimiento', '') !!}
                        {!! Form::hidden('p_correo', '') !!}

                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'admin.administrador.index', 'method' => 'GET']) !!}
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