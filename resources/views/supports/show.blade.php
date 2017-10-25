@extends('layouts.app')
@section('content')
<div class="container support">
    <div class="row">
        <h2>{{$support->name}}</h2>
        <div class="content">
            <!--{!! $support->body !!}-->
            <div class="row">
                <div class="col-md-6">
                    <img class="img-responsive" src="/images/support-02.jpg">
                </div>
                <div class="col-md-6 support-desc">
                    <h4>第一代产品</h4>
                    <ul>
                        <li>同步皮带传动。</li>
                        <li>普通Y型进水过滤器。</li>
                        <li>两轮设计。</li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
