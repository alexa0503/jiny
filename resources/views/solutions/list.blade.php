@extends('layouts.app')
@section('content')
<div class="container solutions">
    <div class="row">
        <h2>{{$category->name}}</h2>
        <img src="{{$category->image}}" class="img-responsive" />
        <div class="row solutions1-list">
            @foreach ($category->solutions as $solution)
            <div class="col-md-6">
                <div class="solution">
                    <h4>{{$solution->name}}</h4>
                    <p>{{str_limit(strip_tags($solution->desc),150)}}</p>
                    <a href="{{route('solution',$solution->id)}}" class="btn btn-primary btn-">详细内容</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
@section('scripts')
@endsection
