<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">     <!--Para agregar estilos personalizados en caso de que los necesitemos-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">duilio.me</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">@lang('auth.home_title')</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())    <!--Para saber si no ha iniciado sesi?n-->
                    <li><a href="{{ route('login') }}">@lang('auth.login_title')</a></li>
                    <li><a href="{{ route('register') }}">@lang('auth.register_title')</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->fullname }} <span class="caret"></span>
                        </a>    <!--Si el usuario est[a logueado se muestra su nombre-->
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('logout') }}">@lang('auth.logout_button')</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Scripts, se referencian los CDN de js de bootstrap y jquery -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
@yield('scripts')     <!--Para js extras-->
</body>
</html>