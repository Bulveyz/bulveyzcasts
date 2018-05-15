<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog</title>
    {{--Fonts--}}
    <link rel="stylesheet" href="{{asset('libs/font-awesome.min.css')}}">
    
    {{--Libs Styles--}}
    <link rel="stylesheet" href="{{asset('libs/bootstrap.css')}}">
    
    {{--Main Styles--}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    @yield('css')
</head>
<body>

{{--Header--}}
<header class="header">
    @include('layouts.header')
</header>

{{--Content--}}
<main class="main container">
    @yield('main')
</main>

{{--Libs JS--}}
<script src="{{asset('libs/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('libs/bootstrap.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

{{--Main JS--}}
<script src="{{asset('js/main.js')}}"></script>
@yield('js')
</body>
</html>
