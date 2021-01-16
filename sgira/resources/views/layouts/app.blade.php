<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SGIRA') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="hold-transition login-page">
    @yield('content')
</body>

</html>
