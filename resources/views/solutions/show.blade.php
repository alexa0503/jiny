@extends('layouts.app')
@section('content')
<div class="container solutions">
    <div class="row">
        <h2>{{$solution->name}}</h2>
        <div class="content">
            @if($solution->video_uri)
            <iframe class="video-iframe" src="{{asset($solution->video_uri)}}" frameborder=0 "allowfullscreen"></iframe>
            @else
            <img src="{{asset($solution->image)}}" class="img-responsive" />
            @endif
            <div class="solutions-desc">
                {!! $solution->body !!}
            </div>
            @if (count($solution->videos) > 0)
            <h4>视频</h4>
            <div class="solutions-videos">
                <div class="row" id="row-cases">
                    @foreach($solution->videos as $video)
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="height:170px;overflow:hidden;position:relative;">
                        @if( isset($video["url"]) AND isset($video["title"]) )
                        @if(stripos(url($video["url"]), url("/")) !==false )
                        <video style="bottom:0;left:0;position:absolute;width:100%;" src="{{url($video['url'])}}" controls="controls">
                        您的浏览器不支持 video 标签。
                        </video>
                        @else
                        <iframe src="{{url($video['url'])}}" frameborder=0 allowfullscreen></iframe>
                        @endif
                        <h5>{{$video["title"]}}</h5>
                        @endif
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            </div>
            @endif
            <div class="text-center">
                <!--<a href="http://service.weibo.com/share/share.php?appkey=&title={{urlencode($solution->name)}}&url={{urlencode(url()->current())}}&pic=&searchPic=false&style=simple" target="_blank">微博分享</a>-->
                <div class="bdsharebuttonbox">
                <a href="#" class="bds_weixin" data-cmd="weixin"></a>
                <a href="#" class="bds_tsina" data-cmd="tsina"></a>
                <a href="#" class="bds_tqq" data-cmd="tqq"></a>
                    <a href="#" class="bds_qzone" data-cmd="qzone"></a>
                    <a href="#" class="bds_renren" data-cmd="renren"></a>
                    <a href="#" class="bds_more" data-cmd="more"></a>
                </div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"{{$solution->name}}","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["weixin","tsina","tqq","qzone","renren"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
            </div>
            <!--<div class="text-center">
                <a href="{{$solution->attachment}}" class="btn btn-primary" download="{{$solution->attachment}}">文档下载</a>
            </div>-->
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/share.js')}}" charset="utf-8"></script>
<script>
$().ready(function(){
    $('.solutions-videos iframe').each(function(){
        var w = $(this).width();
        $(this).height(0.5625*w);
    })
});
</script>
@endsection
