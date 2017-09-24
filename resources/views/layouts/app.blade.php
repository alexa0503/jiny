<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
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
    <header class="hidden-xs">
        <div class="container">
            <div class="row">
                <div class="text-right language">
                    <span class="active">中文</span>
                    <span class="divider">|</span>
                    <a href="/">English</a>
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/logo.png')}}" height="74"/>
                    <div class="pull-right icon-contactus"><img src="{{asset('images/icon-contactus.png')}}" height="47" /></div></div>
        </div>
    </header>
    <router-view name="menu"></router-view>
    @yield('content')
</div>
@yield('scripts')
</body>
</html>
