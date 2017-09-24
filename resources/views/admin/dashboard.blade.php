@extends('admin.layout')
@section('content')
    <div class="row" id="main-content">
        <router-view></router-view>
    </div>
@endsection
@section('scripts')
<script src="{{mix('js/admin/admin.js')}}"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
@endsection
