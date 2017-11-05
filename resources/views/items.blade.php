@extends('layouts.app')
@section('content')
<div class="container items">
    <div class="row">
        <ul class="nav nav-tabs nav-stacked hidden-md hidden-lg" style="">
            <li>
                <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                    产品中心
                    <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul id="systemSetting" class="nav nav-list collapse secondmenu" style="height: 0px;">
                    @foreach ( session('categories') as $category1)
                    <li><a href="{{route('items',$category->id)}}">{{$category1->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <h2>{{$category->name}}</h2>
        <div class="items-list">
            @foreach($category->items as $item)
            <div class="col-md-4">
                <a href="{{route('item', $item->id)}}"><img src="{{$item->thumb}}" class="img-responsive center-block" /></a>
                <h3>{{$item->name}}</h3>
                <div class="item-description rows hidden-xs hidden-sm">
                    <ul>
                        <li><span>型号：{{$item->getAttributeBody('a2')}}</span></li>
                        <li><span>功率：{{$item->getAttributeBody('b2')}}</span></li>
                        <li><span>压力：{{$item->getAttributeBody('b1')}}</span></li>
                        <li><span>流量：{{$item->getAttributeBody('b4')}}</span></li>
                    </ul>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

@endsection
