<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Promissory Note Mangement System') }}</title>
     {{-- Favicon --}}
    <link rel="icon" href="{{asset('images/logo/no bg.png')}}" type="image/icon">

    {{-- Google Fonts --}}
    <link href="{{asset('fonts/cyrillic_ext.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('fonts/Material_Icons.css')}}" rel="stylesheet" type="text/css">

    {{-- Bootstrap Core Css --}}
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    @yield('links')
</head>
<body class="@yield('theme')">
    @yield('content')
    @yield('scripts')
</body>
</html>