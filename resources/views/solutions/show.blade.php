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
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        @if( isset($video["url"]) AND isset($video["title"]) )
                        @if(stripos(url($video["url"]), url("/")) !==false )
                        <div style="overflow:hidden;position:relative;">
                            <video style="bottom:0;left:0;position:absolute;width:100%;" src="{{url($video['url'])}}" controls="controls">
                            您的浏览器不支持 video 标签。
                            </video>
                        </div>
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
            @if (count($solution->items) > 0)
            <h4 style="margin-top:40px;">推荐产品</h4>

            <div class="items-list row">
                @foreach($solution->items as $item)
                <div class="col-md-4">
                    <a href="{{route('item', $item->id)}}"><img src="{{asset($item->thumb)}}" class="img-responsive center-block" /></a>
                    <h5>{{$item->name}}</h5>
                    <div class="item-description rows hidden-xs hidden-sm">
                        <ul>
                            <li><span>型号：{{$item->getAttributeBody('a2')}}</span></li>
                            <li><span>功率：{{$item->getAttributeBody('b2')}}</span></li>
                            <li><span>压力：{{$item->getAttributeBody('b1')}}</span></li>
                            <li><span>流量：{{$item->getAttributeBody('b4')}}</span></li>
                        </ul>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            @endif
            <div class="text-center">
                <div class="bdsharebuttonbox">
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                    <a href="#" class="bds_more" data-cmd="more"></a>
                </div>
                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"{{$solution->name}}","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>

            </div>
            <!--<div class="text-center">
                <a href="{{$solution->attachment}}" class="btn btn-primary" download="{{$solution->attachment}}">文档下载</a>
            </div>-->
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$().ready(function(){
    $('.solutions-videos iframe').each(function(){
        var w = $(this).parent('div').width();
        $(this).width(w);
        $(this).height(0.5625*w);
    })
    $('.solutions-videos video').each(function(){
        var w = $(this).parent('div').width();
        $(this).parent('div').height(0.5625*w);
    })
});
</script>
@endsection
