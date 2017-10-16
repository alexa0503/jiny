@extends('layouts.app')
@section('content')
<div class="container support">
    <div class="row">
        <h2>{{$support->name}}</h2>
        <div class="content">
            {!! $support->body !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
