@extends('layouts.app')
@section('content')
<div class="container supports">

    <div class="row">
        <div class="col-md-12">
            <h2>新闻咨询</h2>
            @foreach ($posts as $post)
            <div class="rows">
                <h3>{{$post->name}}</h3>
                @if( $post->thumb )
                <div class="row supports-list">
                    <div class="col-md-4">
                        <img src="{{$post->thumb}}" class="img-responsive" />
                    </div>
                    <div class="col-md-8">
                        <p>{{$post->desc}}</p>
                    </div>
                    <div class="supports-more"><a href="{{route('post', $post->id)}}" class="btn-lg btn btn-primary">查看详情</a></div>
                </div>
                @else
                <div class="rows">
                    <p>{{$post->desc}}</p>
                    <div class="text-right"><a href="{{route('post', $post->id)}}" class="btn-lg btn btn-primary">查看详情</a></div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
