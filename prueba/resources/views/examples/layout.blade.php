<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel')</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>

<body>

@section('sidebar')
    This is the master sidebar.
@show

@yield('content')

<div class="bottom">
    <hr>
    http://duilio.me
</div>
</body>
</html>
