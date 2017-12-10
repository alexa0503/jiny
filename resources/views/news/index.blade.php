@extends('layouts.app')
@section('content')
<div class="container supports">

    <div class="row">
        <div class="col-md-12">
            <h2>新闻资讯</h2>
            @foreach ($posts as $post)
            <div class="rows">
                <h3>{{$post->title}}</h3>
                @if( $post->thumb )
                <div class="row supports-list">
                    <div class="col-md-4">
                        <img src="{{$post->thumb}}" class="img-responsive" />
                    </div>
                    <div class="col-md-8">
                        <p>@if($post->desc){{$post->desc}}@else{{ str_limit(strip_tags($post->body),200,'…') }}@endif</p>
                    </div>
                    <div class="supports-more"><a href="{{route('post', $post->id)}}" class="btn-lg btn btn-primary">查看详情</a></div>
                </div>
                @else
                <div class="rows">
                    <p>@if($post->desc){{$post->desc}}@else{{ str_limit(strip_tags($post->body),200,'…') }}@endif</p>
                    <div class="text-right"><a href="{{route('post', $post->id)}}" class="btn-lg btn btn-primary">查看详情</a></div>
                </div>
                @endif
            </div>
            @endforeach
            <div class="paging_bootstrap">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
