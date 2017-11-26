@extends('layouts.app')
@section('content')
<div class="container support">
    <div class="row">
        <h2>{{$support->title}}</h2>
        <div class="content">
            {!! $support->body !!}
        </div>
        @if($support->attachment AND $support->type_id == 2)
        <div class="rows text-center">
            <a href="{{$support->attachment}}" class="btn-lg btn btn-primary">样本下载</a>
        </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
@endsection
