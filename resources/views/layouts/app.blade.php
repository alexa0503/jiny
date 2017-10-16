<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/plugins/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/plugins/slick/slick-theme.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        var _s = window.screen.width / 640;
        document.write('<meta name="viewport" content="width=640, minimum-scale = ' + _s + ', maximum-scale = ' + _s + ', user-scalable=no, target-densitydpi=device-dpi, shrink-to-fit=no">');
    </script>
</head>
<body class="jiny">
<div id="wrapper">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</div>
<script src="{{asset('js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
@yield('scripts')
</body>
</html>
