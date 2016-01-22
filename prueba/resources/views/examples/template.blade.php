@extends('examples.layout')

@section('title')
    Curso Laravel duilio.me
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <h2>Curso basico de Laravel 5</h2>
    <p>
        @if (isset ($user))
            Bienvenido {{ $user }}
        @else
            [Login]
        @endif
    </p>
@endsection

@stop