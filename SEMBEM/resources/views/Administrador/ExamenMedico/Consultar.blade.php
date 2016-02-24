@extends('Menus.menuadministrador')

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">CONSULTAR EXAMEN MÉDICO</h3>
                    </div>
                    <div class="panel-body">

                        @include('Administrador.ExamenMedico.Partials.Messages')

                        <p>A continuación se presentan los Exámenes Médicos pertenecientes a <font color="#0000cd"><b>{{ $nombrepac }}</b></font></p>
                        <br>

                        {!! Form::model(Request::all(),['route' => ['admin.examenmedico.filtros',$pacienteiden], 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('fechaapc', null, ['class' => 'form-control', 'placeholder' => 'Fecha de Aplicación', 'id' => 'fechabuscadorpiexapc']) !!}
                            {!! Form::text('fechartro', null, ['class' => 'form-control', 'placeholder' => 'Fecha de Retiro','id' => 'fechabuscadorpiexrtro']) !!}
                            {!! Form::select('examen', config('options.examenesmedicos'), null, ['class' => 'form-control', 'id' => 'selectbuscador4', 'placeholder' => 'Seleccione un Examen Médico']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        {!! Form::close() !!}

                        @include('Administrador.ExamenMedico.Partials.Table')

                        <p>Existen {{ $examenes -> total() }} registros</p>

                        <center>{!! $examenes->appends(array_except(Request::query(), 'page'))->links() !!}</center>

                        {!! Form::open(['route' => 'admin.examenmedico.consultar.cedula', 'method' => 'GET']) !!}
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