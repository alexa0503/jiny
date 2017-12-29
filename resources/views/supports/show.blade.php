@extends('layouts.app')
@section('content')
<div class="container support">
    <div class="row">
        <h2>{{$support->title}}</h2>
        <div class="content" style="margin-left:20px;">
            {!! $support->body !!}
        </div>
        @if($support->attachment AND $support->type_id == 2)
        <div class="rows" style="margin-top:20px;margin-left:20px;">
            <a href="{{asset($support->attachment)}}" class="btn-lg btn btn-primary">下载</a>
        </div>
        @endif
    </div>
</div>
@endsection
@section('scripts')
@endsection
