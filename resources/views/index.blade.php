@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="homepage-topper-01">
            <div class="homepage-list hidden-xs hidden-sm">
                <ul class="list-group">
                    @foreach ($categories as $category)
                  <li class="list-group-item"><a href="{{route('items',$category->id)}}">{{$category->name}}</a></li>
                  @endforeach
                </ul>
            </div>
            <div class="homepage-kv">
                @foreach ($page->kvs as $kv)
                <div><img src="{{asset($kv->header_image)}}" class="img-responsive" /></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-one">
            <div class="nav"><span>最新应用</span><div class="pull-right hidden-xs"><a href="#" class="btn-prev" data-target-id="slick-one"><img style="margin-right:55px;" src="{{asset('/images/btn-prev.jpg')}}" /></a><a href="#" class="btn-next" data-target-id="slick-one"><img src="{{asset('/images/btn-next.jpg')}}" /></a></div></div>
            <div class="content hidden-sm" id="slick-one">

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
    $('.homepage-kv').slick({
        dots: true,
        infinite: true,
        arrows: false,
        autoplay:false
    });
    var a = new Array;
    @foreach ($page->latest as $row)
    a.push('<a href="{{$row->link}}"><img src="{{$row->header_image}}" class="img-responsive" /><span class="center">{{$row->title}}</span></a>');
    @endforeach

    var html = '';
    if($( window ).width() < 768 ){
        $.each(a, function(key,value){
            html += '<div class="rows">'+value+'</div>'
        })
    }
    else{
        html += '<div class="row">'
        $.each(a, function(key,value){
            html += '<div class="col-md-4">'+value+'</div>'
            if(key%3==2 && a.length-1 != key){
                html += '</div><div class="row">'
            }
        })
        html += '</div>'
    }
    $('#slick-one').html(html).slick({
        infinite: true,
        arrows: false,
        autoplay:false
    });

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
