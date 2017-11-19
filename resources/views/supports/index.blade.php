@extends('layouts.app')
@section('content')
<div class="nav-header-01 hidden-xs">
    <div class="container">
        <div class="row">
            <ul class="nav navbar-nav">
            <li><a href="#supports">技术资料</a></li>
            <li><span>|</span></li>
            <li><a href="#sample">样本下载</a></li>
          </ul>
        </div>
    </div>
</div>
<div class="container supports">
    <div class="row">
        <div class="col-md-8">
            <h2>技术资料</h2>
            @foreach ($supports[0] as $k => $support)
            <div class="rows">
                <h3{!! $k==0 ? ' class="first"' : '' !!}>{{$support->title}}</h3>
                @if( $support->thumb )
                <div class="row supports-list">
                    <div class="col-md-4">
                        <img src="{{$support->thumb}}" class="center-block img-responsive" />
                    </div>
                    <div class="col-md-8">
                        <p>{{$support->desc}}</p>
                    </div>
                    <div class="supports-more"><a href="{{route('support', $support->id)}}" class="btn-lg btn btn-primary">更多内容</a></div>
                </div>
                @else
                <div class="rows">
                    <p>{{$support->desc}}</p>
                    <div class="supports-text-more"><a href="{{route('support', $support->id)}}" class="btn-lg btn btn-primary">更多内容</a></div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="col-md-4 hidden-xs">
            <h2>样本下载</h2>
            <h5>分类一</h5>
            @foreach ($supports[1] as $support)
            <div class="rows">
                <div class="media">
                    <div class="media-left">
                    <a href="#">
                    <img class="media-object" src="{{asset($support->thumb)}}" alt="...">
                    </a>
                    </div>
                    <div class="media-body">
                    <h4 class="media-heading">{{$support->title}}</h4>
                    <p>{{$support->desc}}</p>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
