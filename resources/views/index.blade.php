@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="homepage-topper-01">
            <div class="homepage-list hidden-xs hidden-sm">
                <ul class="list-group">
                  <li class="list-group-item"><a href="/items">电动高压清洗机</a></li>
                  <li class="list-group-item"><a href="/items">汽/柴油高压清洗机</a></li>
                  <li class="list-group-item"><a href="/items">防爆高压清洗机</a></li>
                  <li class="list-group-item"><a href="/items">船用高压清洗机</a></li>
                  <li class="list-group-item"><a href="/items">热水高压清洗机</a></li>
                  <li class="list-group-item"><a href="/items">三维旋转清洗系统</a></li>
                  <li class="list-group-item"><a href="/items">高压泵组</a></li>
                  <li class="list-group-item"><a href="/items">试压泵</a></li>
                  <li class="list-group-item"><a href="/items">定制设备</a></li>
                  <li class="list-group-item"><a href="/items">附件</a></li>
                </ul>
            </div>
            <div class="homepage-kv">
                <div><img src="{{asset('images/banner-02.jpg')}}" class="img-responsive" /></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-one">
            <div class="nav"><span>最新应用</span><div class="pull-right"><a href="#" class="btn-prev" data-target-id="slick-one"><img style="margin-right:55px;" src="{{asset('/images/btn-prev.jpg')}}" /></a><a href="#" class="btn-next" data-target-id="slick-one"><img src="{{asset('/images/btn-next.jpg')}}" /></a></div></div>
            <div class="content  slick" id="slick-one">
                <div class="row">
                    <div class="col-md-4"><a href=""><img src="{{asset('/images/index-latest-01.jpg')}}" class="img-responsive" /><span class="center">汽车</span></a></div>
                    <div class="col-md-4"><a href=""><img src="{{asset('/images/index-latest-02.jpg')}}" class="img-responsive" /><span class="center">船舶</span></a></div>
                    <div class="col-md-4"><a href=""><img src="{{asset('/images/index-latest-03.jpg')}}" class="img-responsive" /><span class="center">制药</span></a></div>
                </div>
                <div class="row">
                    <div class="col-md-4"><a href=""><img src="{{asset('/images/index-latest-01.jpg')}}" class="img-responsive" /><span class="center">汽车</span></a></div>
                    <div class="col-md-4"><a href=""><img src="{{asset('/images/index-latest-02.jpg')}}" class="img-responsive" /><span class="center">船舶</span></a></div>
                    <div class="col-md-4"><a href=""><img src="{{asset('/images/index-latest-03.jpg')}}" class="img-responsive" /><span class="center">制药</span></a></div>
                </div>
            </div>
        </div>
        <div class="col-two">
            <div class="nav"><span>新品推荐</span>
                <div class="pull-right"><a href="#" class="btn-prev" data-target-id="slick-two"><img style="margin-right:55px;" src="{{asset('/images/btn-prev.jpg')}}" /></a><a href="#" class="btn-next" data-target-id="slick-two"><img src="{{asset('/images/btn-next.jpg')}}" /></a>
                </div>
            </div>
            <div class="content  slick" id="slick-two">
                <div class="rows">
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-01.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-02.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-03.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                </div>
                <div class="rows">
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-01.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-02.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-03.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-two">
            <div class="nav"><span>标准设备</span>
                <div class="pull-right"><a href="#" class="btn-prev" data-target-id="slick-three"><img style="margin-right:55px;" src="{{asset('/images/btn-prev.jpg')}}" /></a><a href="#" class="btn-next" data-target-id="slick-three"><img src="{{asset('/images/btn-next.jpg')}}" /></a>
                </div>
            </div>
            <div class="content  slick" id="slick-three">
                <div class="rows">
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-01.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-02.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-03.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                </div>
                <div class="rows">
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-01.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-02.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href=""><img src="{{asset('/images/index-equipment-03.jpg')}}" class="center-block img-responsive" /></a>
                            <span>电动高压清洗机</span>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
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
