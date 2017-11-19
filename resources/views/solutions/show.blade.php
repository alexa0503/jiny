@extends('layouts.app')
@section('content')
<div class="container solutions">
    <div class="row">
        <h2>{{$solution->name}}</h2>
        <div class="content">
            @if($solution->video_uri)
            <iframe class="video-iframe" src="{{$solution->video_uri}}" frameborder=0 "allowfullscreen"></iframe>
            @else
            <img src="{{$solution->image}}" class="img-responsive" />
            @endif
            <div class="solutions-desc">
                {{$solution->desc}}
            </div>
            <div class="text-center">
                <a href="{{$solution->attachment}}" class="btn btn-primary" download="{{$solution->attachment}}">文档下载</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
