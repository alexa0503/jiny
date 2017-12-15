@extends('layouts.app')
@section('content')
<div class="nav-header-01 hidden-sm hidden-md hidden-lg">
    <div class="container">
        <div class="row" id="topper">
            <ul class="nav navbar-nav">
            <li class="active"><a href="#supports">技术资料</a></li>
            <li class="split"><span></span></li>
            <li><a href="#downloads">样本下载</a></li>
          </ul>
        </div>
    </div>
</div>
<div class="container supports">
    <div class="row">
        <div class="col-md-8" id="supports">
            <h2>技术资料</h2>
            @foreach ($supports[0] as $k => $support)
            <div class="rows">
                <h3{!! $k==0 ? ' class="first"' : '' !!}>{{$support->title}}</h3>
                @if( $support->thumb )
                <div class="row supports-list">
                    <div class="col-md-4">
                        <img src="{{$support->thumb}}" class="center-block img-responsive" />
                    </div>
                    <div class="col-md-8">
                        <p>{{$support->desc}}</p>
                    </div>
                    <div class="supports-more"><a href="{{route('support', $support->id)}}" class="btn-lg btn btn-primary">更多内容</a></div>
                </div>
                @else
                <div class="rows">
                    <p>{{$support->desc}}</p>
                    <div class="supports-text-more"><a href="{{route('support', $support->id)}}" class="btn-lg btn btn-primary">更多内容</a></div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="col-md-4 hidden-xs" id="downloads">
            <h2>样本下载</h2>
            @foreach ($supports[1] as $support)
            <div class="rows">
                <h3 class="media-heading"><a href="{{route('support', $support->id)}}">{{$support->title}}</a></h3>
                <p>{{$support->desc}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$().ready(function(){
    $('#topper li a').on('click', function(){
        $('#downloads,#supports').addClass('hidden-xs');
        var id = $(this).attr('href').replace('#','');
        $('#'+id).removeClass('hidden-xs');
        $('#topper li').removeClass('active');
        $(this).parents('li').addClass('active');
        return false;
    })
})
</script>
@endsection
