@extends('cms.layout')

@section('content')

    <div class="padding-md">
        <!--
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    Dashboard
                </div>
                <div class="page-sub-header">
                    Welcome Back, John Doe , <i class="fa fa-map-marker text-danger"></i> London
                </div>
            </div>
            <div class="col-sm-6 text-right text-left-sm p-top-sm">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Select Project <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="index.html#">Project1</a></li>
                        <li><a href="index.html#">Project2</a></li>
                        <li><a href="index.html#">Project3</a></li>
                        <li class="divider"></li>
                        <li><a href="index.html#">Setting</a></li>
                    </ul>
                </div>

                <a class="btn btn-default"><i class="fa fa-cog"></i></a>
            </div>
        </div>
        -->
    </div><!-- ./padding-md -->
@endsection
@section('scripts')
    <!-- Flot -->
    <script src="{{asset('cms/js/jquery.flot.min.js')}}"></script>
    <!-- Morris -->
    <script src="{{asset('cms/js/rapheal.min.js')}}"></script>
    <script src="{{asset('cms/js/morris.min.js')}}"></script>
    <!-- Datepicker -->
    <script src="{{asset('cms/js/uncompressed/datepicker.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('cms/js/sparkline.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('cms/js/uncompressed/skycons.js')}}"></script>
    <!-- Easy Pie Chart -->
    <script src="{{asset('cms/js/jquery.easypiechart.min.js')}}"></script>
    <!-- Sortable -->
    <script src="{{asset('cms/js/uncompressed/jquery.sortable.js')}}"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('cms/js/owl.carousel.min.js')}}"></script>
    <!-- Modernizr -->
    <script src="{{asset('cms/js/modernizr.min.js')}}"></script>
    <script src="{{asset('cms/js/simplify/simplify_dashboard.js')}}"></script>
    <script>
        $(function()	{
        });
    </script>
@endsection
