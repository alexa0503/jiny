@extends('layouts.app')
@section('content')
<div class="container solutions">
    <div class="row">
        <h2>解决方案</h2>
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-3 solutions-list">
                <a href="{{route('solutions',$category->id)}}"><img src="{{asset($category->thumb)}}" class="img-responsive" /></a>
                <h4>{{$category->name}}</h4>
                <p>{{$category->desc}}</p>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
        <div class="row text-center row-more"><button class="btn btn-primary">更多方案</button></div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
