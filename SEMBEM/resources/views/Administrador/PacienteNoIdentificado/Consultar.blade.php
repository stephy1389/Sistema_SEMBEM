@extends('Menus.menuadministrador')

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">CONSULTAR PACIENTE NO IDENTIFICADO</h3>
                    </div>
                    <div class="panel-body">

                        @include('Administrador.PacienteNoIdentificado.Partials.Messages')

                        {!! Form::model(Request::all(),['route' => 'admin.pacientenoidentificado.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('fecha', null, ['class' => 'form-control', 'placeholder' => 'Fecha de Ingreso', 'id' => 'fechabuscadorpni']) !!}
                            {!! Form::text('apodo', null, ['class' => 'form-control', 'placeholder' => 'Apodo del Paciente']) !!}
                            {!! Form::select('genero', config('options.generos'), null, ['class' => 'form-control', 'id' => 'selectbuscador3']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        {!! Form::close() !!}

                        @include('Administrador.PacienteNoIdentificado.Partials.Table')

                        <p>Existen {{ $pacientesnoidentificados -> total() }} registros</p>

                        <center>{{ $pacientesnoidentificados -> appends(Request::only(['apodo','genero','fecha']))->render() }}</center>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@stop
