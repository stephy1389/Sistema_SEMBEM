@extends('Menus.menuadministrador')

@section('contenido')


    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">MODIFICAR PERSONAL - CAMPOS OBLIGATORIOS (<font color="#DF0101">*</font>)</h3>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('message.tipo') }} alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <p><strong>{{ Session::get('message.msjinicial') }}</strong> {{ Session::get('message.mensaje') }}</p>
                        </div>
                    @endif
                    <div class="panel-body">
                        {!! Form::model(Request::only(['p_cedula']),['route' => 'admin.personal.cedula.mod', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-left', 'role' => 'search']) !!}

                        {!! Form::label('p_cedula', 'Cédula') !!}
                        {!! Form::label('asterisco', '*', ['class' => 'asterisco']) !!}
                        <div>
                            {!! Form::text('p_cedula', null, ['class' => 'form-control input-sm', 'placeholder' => 'Ej: 18752693']) !!}
                            <button type="submit" class="btn btn-primary">Siguiente</button>
                        </div>

                        <div class="colortext"> {{ $errors->first('p_cedula') }} </div>

                        {!! Form::close() !!}

                        {!! Form::open(['route' => 'admin.administrador.index', 'method' => 'GET']) !!}
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
