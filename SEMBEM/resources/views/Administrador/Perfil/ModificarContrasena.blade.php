@extends('Menus.menuadministrador')

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">MODIFICAR CONTRASEÑA - CAMPOS OBLIGATORIOS (<font color="#DF0101">*</font>)</h3>
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
                        {!! Form::model($perfil,['route' => ['admin.perfil.update', $perfil], 'method' => 'PUT']) !!}

                        @include('Administrador.Perfil.Partials.FieldsModificarContrasena')

                        {!! Form::hidden('old_password', $perfil->password) !!}

                        <br>
                        <div align="center">
                            <button type="submit" class="btn btn-primary">Modificar</button>
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
