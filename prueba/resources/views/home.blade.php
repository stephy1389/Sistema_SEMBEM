@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('auth.welcome_title')</div>
                    <div class="panel-body">
                        <p>@lang('auth.welcome_text')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection