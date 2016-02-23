@extends('Menus.menuadministrador')

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">MODIFICAR PACIENTE IDENTIFICADO - CAMPOS OBLIGATORIOS (<font color="#DF0101">*</font>)</h3>
                    </div>

                    <div class="panel-body">
                        {!! Form::model($persona, ['route' => ['admin.pacienteidentificado.update', $persona], 'method' => 'PUT']) !!}

                        @include('Administrador.PacienteIdentificado.Partials.FieldsModificar')

                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'admin.pacienteidentificado.edit.cedula', 'method' => 'GET']) !!}
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
