@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nuevo Usuario</div>
                    <div class="panel-body">

                        @include('admin.partials.messages')

                        {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
                            @include('admin.users.partials.fields')
                            <button tyope="submit" class="btn btn-default">Crear Usuario</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection