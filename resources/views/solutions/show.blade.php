@extends('layouts.app')
@section('content')
<div class="container solutions">
    <div class="row">
        <h2>{{$solution->name}}</h2>
        <img src="{{$solution->image}}" class="img-responsive" />
        <div class="solutions1-list">
            {{$solution->desc}}
        </div>
        <div class="text-center">
            <a href="{{$solution->attachment}}" class="btn btn-primary" download="{{$solution->attachment}}">文档下载</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
