<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="keywords" content="上海杰尼,高压清洗机,洗舱机,防爆高压清洗机,除漆,除锈,环卫清洗">
    <meta name="description" content="上海杰尼机电技术有限公司专业提供各类高压清洗机,船用洗舱机,清砂机,除锈机,防爆高压清洗机,旋转喷头,水沙喷头,高压水枪,试压泵,高压柱塞泵,高压软管等,广泛应用于化工、工业、工程车、环卫、管道等清洗。">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <link href="{{asset('css/app.css?_=20171215')}}" rel="stylesheet">
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
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
<script>
var w = $( window ).width();
$( window ).resize(function() {
    if( w >= 768 && $( window ).width() <768 ){
        location.reload();
    }
    else if( w < 768 && $( window ).width() >= 768 ){
        location.reload();
    }
});
</script>
@yield('scripts')
<script> var _hmt = _hmt || []; (function() { var hm = document.createElement("script"); hm.src = "https://hm.baidu.com/hm.js?1725fae5e4c5f2560f8a508ed560600c";; var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(hm, s); })(); </script>
<script type="text/javascript" src="//s.union.360.cn/126130.js" async defer></script>
</body>
</html>
