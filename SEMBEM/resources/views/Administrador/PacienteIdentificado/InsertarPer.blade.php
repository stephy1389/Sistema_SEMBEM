@extends('Menus.menuadministrador')

@section('contenido')

    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">INSERTAR PACIENTE IDENTIFICADO - CAMPOS OBLIGATORIOS (<font color="#DF0101">*</font>)</h3>
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
                        {!! Form::model($persona, ['route' => ['admin.pacienteidentificado.storepiper', $persona], 'method' => 'PUT']) !!}

                        @include('Administrador.PacienteIdentificado.Partials.FieldsPer')

                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'admin.pacienteidentificado.create', 'method' => 'GET']) !!}
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