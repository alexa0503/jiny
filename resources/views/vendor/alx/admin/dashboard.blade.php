@extends('admin::layout')

@section('content')
    <div class="padding-md" id="page-content">
    </div><!-- ./padding-md -->
@endsection
@section('scripts')
<script src="{{asset('js/simplify/simplify_dashboard.js')}}"></script>
<script src="{{asset('js/simplify/simplify.js')}}"></script>
<script src="{{mix('/js/vue.min.js')}}"></script>
<script src="{{mix('/js/axios.min.js')}}"></script>
<script src="{{mix('/js/admin.js')}}"></script>
@endsection
