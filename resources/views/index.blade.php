@extends('layouts.app')
@section('content')
    <router-view></router-view>
@endsection
@section('scripts')
<script src="{{mix('/js/index.js')}}"></script>
@endsection
