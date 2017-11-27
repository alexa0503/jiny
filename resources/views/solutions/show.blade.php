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
                {{$solution->desc}}
            </div>
            @if (count($solution->videos) > 0)
            <h4>视频</h4>
            <div class="solutions-videos">
                <div class="row" id="row-cases">
                    @foreach($solution->videos as $video)
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        @if( isset($video["url"]) AND isset($video["title"]) )
                        @if(stripos(url($video["url"]), url("/")) !==false )
                        <video style="width:100%" src="{{url($video['url'])}}" controls="controls">
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
        var w = $(this).width();
        $(this).height(0.5625*w);
    })
});
</script>
@endsection
