@extends('Menus.menuadministrador')

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">CONSULTAR PACIENTE IDENTIFICADO</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::model(Request::all(),['route' => 'admin.personal.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}

                        @include('Administrador.PacienteIdentificado.Partials.Table')
                        <br>

                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'admin.pacienteidentificado.consultar.cedula', 'method' => 'GET']) !!}
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

