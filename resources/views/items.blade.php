@extends('layouts.app')
@section('content')
<div class="container items">
    <div class="row">
        <h2>电动压清洗机</h2>
        <div class="row items-list">
            @for ($i=0;$i<9;$i++)
            <div class="col-md-4">
                <a href="/item"><img src="/images/item-01.jpg" class="img-responsive" /></a>
                <h3>电动高压清洗机</h3>
                <div class="item-description rows">
                    <ul>
                        <li><span>型号：EF3521DA</span></li>
                        <li><span>功率：15KW</span></li>
                        <li><span>压力：350bar</span></li>
                        <li><span>流量：21 L/min</span></li>
                    </ul>
                </div>
            </div>
            @endfor
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
