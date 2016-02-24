@extends('Menus.menuadministrador')

@section('contenido')
    <div class="rowheight">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">CONSULTAR PERSONAL</h3>
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

                        @include('Administrador.Personal.Partials.Messages')

                        {!! Form::model(Request::all(),['route' => 'admin.personal.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                        <div class="form-group">
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de Personal']) !!}
                            {!! Form::select('jerarquia', config('options.jerarquias'), null, ['class' => 'form-control', 'id' => 'selectbuscador1']) !!}
                            {!! Form::select('cargo', config('options.cargos'), null, ['class' => 'form-control', 'id' => 'selectbuscador2', 'placeholder' => 'Seleccione un Cargo']) !!}
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                        {!! Form::close() !!}

                        @include('Administrador.Personal.Partials.Table')

                        <p>Existen {{ $personals -> total() }} registros</p>

                        <center>{{ $personals -> appends(Request::only(['nombre','cargo','jerarquia']))->render() }}</center>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
@stop

