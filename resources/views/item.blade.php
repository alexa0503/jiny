@extends('layouts.app')
@section('content')
<div class="container item">
    <div class="row">
        <ul class="nav nav-tabs nav-stacked hidden-md hidden-lg" style="">
            <li>
                <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                    产品中心
                    <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                </a>
                <ul id="systemSetting" class="nav nav-list collapse secondmenu" style="height: 0px;">
                    @foreach ( session('categories') as $category)
                    <li><a href="{{route('items',$category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-4 hidden-xs hidden-sm">
                <img src="/images/item-01.jpg" class="img-responsive img-item" />
            </div>
            <div class="col-md-8">
                <h2>{{$item->name}}</h2>
                <div class=" hidden-md hidden-lg item-border">
                    <img src="/images/item-01.jpg" class="img-responsive center-block img-item" />
                </div>
                <ul class="list-unstyled list-item">
                    <li><span>名称：</span>{{$item->getAttributeBody('a1')}}</li>
                    <li><span>型号：</span>{{$item->getAttributeBody('a2')}}</li>
                    <li><span>压力：</span>{{$item->getAttributeBody('a3')}}</li>
                    <li><span>流量：</span>{{$item->getAttributeBody('a4')}}</li>
                    <li><span>功率：</span>{{$item->getAttributeBody('a5')}}</li>
                    <li><span>驱动：</span>{{$item->getAttributeBody('a6')}}</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row item-detail">
        <h3>产品详情</h3>
        <h4>设备型号<span>{{$item->getAttributeBody('a2')}}</span></h4>
        <div class="item-description-01">
            {!! $item->detail !!}
        </div>
        <h4>标准配置</h4>
        <div class="item-description-01">
            {!! $item->standard !!}
        </div>
        <h4>可选配置</h4>
        <div class="item-choosable">
            <div class="slick" id="slick-choosable">
                @for ($i=0;$i<12;$i++)
                <div class="col-md-2 col-xs-4 col-sm-4  text-center">
                    <a href="/item"><img src="/images/choosable-0{{$i%6+1}}.jpg" class="img-responsive" /></a>
                </div>
                @endfor
            </div>
            <a class="arrow-prev" data-target-id="slick-choosable" href="#"><img src="/images/arrow-prev.png" /></a>
            <a class="arrow-next" data-target-id="slick-choosable" href="#"><img src="/images/arrow-next.png" /></a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('/plugins/slick/slick.min.js')}}" type="text/javascript"></script>
<script>
$().ready(function(){
    if($( window ).width() < 768 ){
        $('.slick').slick({
            infinite: true,
            arrows: false,
            autoplay:false,
            swipe:true,
            slidesToShow:3
        });
    }
    else{
        $('.slick').slick({
            infinite: true,
            arrows: false,
            autoplay:false,
            slidesToShow:6
        });
    }
    $('.btn-prev,.arrow-prev').on('click',function(){
        var id = $(this).attr('data-target-id');
        $('#'+id).slick('slickPrev');
        return false;
    })
    $('.btn-next,.arrow-next').on('click',function(){
        var id = $(this).attr('data-target-id');
        $('#'+id).slick('slickNext');
        return false;
    })
})
</script>
@endsection
