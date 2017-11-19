@extends('layouts.app')
@section('content')
<div class="container support">
    <div class="row">
        <h2>{{$support->title}}</h2>
        <div class="content">
            @if( count($support->bodies) > 0)
            @foreach($support->bodies as $k=> $body)
            @if( $k%2 == 0)
            <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="{{asset($body->image)}}">
                </div>
                <div class="col-md-6 support-desc">
                    <h4>{{$body->title}}</h4>
                    {!! $body->txt !!}
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-md-6 support-desc">
                    <h4>{{$body->title}}</h4>
                    {!! $body->txt !!}
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="{{asset($body->image)}}">
                </div>
            </div>
            @endif
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
