@extends('layouts.app')
@section('content')
<div class="container support">
    <div class="row">
        <h2>{{$post->name}}</h2>
        <div class="content">
            {!! $post->body !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
