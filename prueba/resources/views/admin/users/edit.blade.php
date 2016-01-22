@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Usuario: {{ $user->fullname }}</div>
                    <div class="panel-body">

                        @include('admin.partials.messages')

                        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
                        <!--Se puede pasar el id del usuario o el usuario completo como segundo parámetro en route-->
                            @include('admin.users.partials.fields')
                            <button type="submit" class="btn btn-default">Actualizar Usuario</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection