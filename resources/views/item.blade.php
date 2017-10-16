@extends('layouts.app')
@section('content')
<div class="container item">
    <div class="row">
        <div class="row">
            <div class="col-md-4">
                <img src="/images/item-01.jpg" class="img-responsive img-item" />
            </div>
            <div class="col-md-8">
                <h2>电动高压清洗机（新款）工业高压清洗机</h2>
                <ul class="list-unstyled list-item">
                    <li><span>名称：</span>30KW系列</li>
                    <li><span>型号：</span>ED5030电动高压清洗机</li>
                    <li><span>压力：</span>500bar</li>
                    <li><span>流量：</span>30lpm</li>
                    <li><span>功率：</span>30kw</li>
                    <li><span>驱动：</span>电机驱动</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="row item-detail">
        <h3>产品详情</h3>
        <h4>设备型号<span>ED5030</span></h4>
        <div class="item-description-01">
            <img src="/images/table-01.jpg" class="img-responsive" />
        </div>
        <h4>标准配置</h4>
        <div class="item-description-01">
            <img src="/images/table-02.jpg" class="img-responsive" />
        </div>
        <h4>可选配置</h4>
        <div class="item-choosable">
            <div class="slick">
                @for ($i=0;$i<12;$i++)
                @if( $i%6 == 0)
                <div class="row">
                @endif
                    <div class="col-md-2">
                        <a href="/item"><img src="/images/choosable-0{{$i%6+1}}.jpg" class="img-responsive" /></a>
                    </div>
                @if( $i%6 == 5 || $i == 11)
                </div>
                @endif
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('/plugins/slick/slick.min.js')}}" type="text/javascript"></script>
<script>
$().ready(function(){
    $('.slick').slick({
        infinite: true,
        arrows: false,
        autoplay:false
    });
    $('.btn-prev').on('click',function(){
        var id = $(this).attr('data-target-id');
        $('#'+id).slick('slickPrev');
        return false;
    })
    $('.btn-next').on('click',function(){
        var id = $(this).attr('data-target-id');
        $('#'+id).slick('slickNext');
        return false;
    })
})
</script>
@endsection
