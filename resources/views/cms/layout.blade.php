<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>后台管理 - {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- ionicons -->
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('cms/css/bootstrap-theme.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('cms/css/font-awesome.4.6.0.css')}}">
    <!-- Morris -->
    <link href="{{asset('cms/css/morris.css')}}" rel="stylesheet"/>
    <!-- Datepicker -->
    <link href="{{asset('cms/css/datepicker.css')}}" rel="stylesheet"/>
    <!-- Animate -->
    <link href="{{asset('cms/css/animate.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{asset('cms/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('cms/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css')}}" rel="stylesheet">
    <!-- Simplify -->
    <link href="{{asset('cms/css/simplify.css')}}" rel="stylesheet">
    <!-- Scripts -->
    <!-- Jquery -->
    <script src="{{asset('cms/js/jquery-2.1.1.min.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        $().ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': window.Laravel
                }
            });
        })
    </script>
</head>
<body class="overflow-hidden">
<div class="wrapper preload">
    @include('cms.sidebar-right')
    @include('cms.header')
    @include('cms.aside')
        <div class="main-container">
            <div class="padding-md">
                <ul class="breadcrumb">
    				<li><span class="primary-font"><i class="icon-home"></i></span><a href="/admin"> Home</a></li>
    				<!--<li>Table</li>
    				<li>Static Table</li>-->
    			</ul>
                @yield('content')
            </div><!-- ./padding-md -->
        </div><!-- /main-container -->
        @include('cms.footer')
</div>
    <a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>
    @yield('popup')
    <!-- Bootstrap -->
    <script src="{{asset('cms/js/bootstrap.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('cms/js/jquery.slimscroll.min.js')}}"></script>
    <!-- Popup Overlay -->
    <script src="{{asset('cms/js/jquery.popupoverlay.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Simplify -->
    <script src="{{asset('cms/js/simplify/simplify.js')}}"></script>
    @yield('scripts')
</div>

</body>
</html>
