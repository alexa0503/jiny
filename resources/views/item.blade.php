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
                <img src="{{asset($item->thumb)}}" class="img-responsive img-item" />
            </div>
            <div class="col-md-8">
                <h2>{{$item->name}}</h2>
                <div class=" hidden-md hidden-lg item-border">
                    <img src="{{asset($item->thumb)}}" class="img-responsive center-block img-item" />
                </div>
                <div class="rows">
                    <div class="col-md-6 col-lg-6">
                        <ul class="list-unstyled list-item">
                            <li><span>类别：</span>{{$item->getAttributeBody('a1')}}</li>
                            <li><span>型号：</span>{{$item->getAttributeBody('a2')}}</li>
                            <li><span>品牌：</span>{{$item->getAttributeBody('a3')}}</li>
                            <li><span>驱动方式：</span>{{$item->getAttributeBody('a4')}}</li>
                            <li><span>安装方式：</span>{{$item->getAttributeBody('a5')}}</li>
                            <li><span>订货号：</span>{{$item->getAttributeBody('a6')}}</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <ul class="list-unstyled list-item">
                            <li><span>工作压力：</span>{{$item->getAttributeBody('b1')}}</li>
                            <li><span>工作流量：</span>{{$item->getAttributeBody('b4')}}</li>
                            <li><span>马达功率：</span>{{$item->getAttributeBody('b2')}}</li>
                            <li><span>包装尺寸：</span>{{$item->getAttributeBody('b3')}}</li>
                            <li><span>设备重量：</span>{{$item->getAttributeBody('b5')}}</li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row item-detail">
        <h3>产品详情</h3>
        <h4>设备型号<span>{{$item->getAttributeBody('a2')}}</span></h4>
        <div class="item-description-01">
            {!! $item->detail !!}
            <div class="clearfix"></div>
        </div>
        <h4>标准配置</h4>
        <div class="item-description-01">
            {!! $item->standard !!}
        </div>
        @if (count($item->cases) > 0)
        <h4>案例分享</h4>
        <div class="item-description-01">
            <div class="row" id="row-cases">
                @foreach($item->cases as $case)
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    @if( isset($case["url"]) AND isset($case["title"]) )
                    @if(stripos(url($case["url"]), url("/")) !==false )
                    <div style="overflow:hidden;position:relative;">
                        <video style="bottom:0;left:0;position:absolute;width:100%;" src="{{url($case['url'])}}" controls="controls">
                            您的浏览器不支持 video 标签。
                        </video>
                    </div>
                    @else
                    <iframe src="{{url($case['url'])}}" frameborder=0 allowfullscreen></iframe>
                    @endif
                    <h5>{{$case["title"]}}</h5>
                    @endif
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
        @endif
        @if(count($item->options) > 0)
        <h4>可选配置</h4>
        <div class="item-choosable" style="margin-bottom:60px;">
            <div class="slick" id="slick-choosable">
                @foreach( $item->options as $option)
                @php
                $_item = \App\Item::find($option);
                @endphp
                <div class="col-md-2 col-xs-4 col-sm-4  text-center">
                    <a href="/item/{{$_item->id}}"><img src="{{asset($_item->thumb)}}" class="img-responsive" /></a>
                </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
            @if(count($item->options)>6)
            <a class="arrow-prev" data-target-id="slick-choosable" href="#"><img src="/images/arrow-prev.png" /></a>
            <a class="arrow-next" data-target-id="slick-choosable" href="#"><img src="/images/arrow-next.png" /></a>
            @endif
        </div>
        @endif

    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('/plugins/slick/slick.min.js')}}" type="text/javascript"></script>
<script>
$().ready(function(){
    if($( window ).width() < 768 && $('.slick div').length > 3 ){
        $('.slick').slick({
            infinite: true,
            arrows: false,
            autoplay:false,
            swipe:true,
            slidesToShow:3
        });
    }
    else if($('.slick div').length > 6){
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

    $('#row-cases iframe').each(function(){
        var w = $(this).parent('div').width();
        $(this).width(w);
        $(this).height(0.5625*w);
    })
    $('#row-cases video').each(function(){
        var w = $(this).parent('div').width();
        $(this).parent('div').height(0.5625*w);
    })

})
</script>
@endsection
