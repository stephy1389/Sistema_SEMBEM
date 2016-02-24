@extends('Menus.menuadministrador')

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">MODIFICAR EXAMEN MÉDICO - CAMPOS OBLIGATORIOS (<font color="#DF0101">*</font>)</h3>
                    </div>

                    <div class="panel-body">
                        <p>A continuación se presenta el Examen Médico perteneciente a <font color="#0000cd"><b>{{ $nombrepac }}</b></font></p>
                        <br>

                        {!! Form::model($examenmedico, ['route' => ['admin.examenmedico.update', $examenmedico], 'method' => 'PUT']) !!}

                        @include('Administrador.ExamenMedico.Partials.FieldsModificarExamen')

                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['admin.examenmedico.mod.filtros', $idpi], 'method' => 'GET']) !!}
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
