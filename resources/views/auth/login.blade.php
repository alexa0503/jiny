<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} | 登录</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown" id="login">
        <div>
            <h3>Welcome to Admin</h3>
            <!--<p>Login in. To see it in action.</p>-->
            <login></login>
            <p class="m-t"> <small>Alexa &copy; 2017</small> </p>
        </div>
    </div>

    <script src="{{mix('js/login.js')}}"></script>
</body>
</html>
