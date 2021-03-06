@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="homepage-topper-01">
            <div class="homepage-list hidden-xs hidden-sm">
                <ul class="list-group">
                    @foreach ( session('categories') as $category)
                    <li class="list-group-item"><a href="{{route('items',$category->id)}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="homepage-kv">
                @foreach ($page->kvs as $kv)
                <div><a href="{{$kv->link}}"><img src="{{asset($kv->header_image)}}" class="img-responsive" /></a></div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-one">
            <div class="nav"><span>最新应用</span><div class="pull-right hidden-xs"><a href="#" class="btn-prev" data-target-id="slick-one"><img style="margin-right:55px;" src="{{asset('/images/btn-prev.jpg')}}" /></a><a href="#" class="btn-next" data-target-id="slick-one"><img src="{{asset('/images/btn-next.jpg')}}" /></a></div></div>
            <div class="content hidden-sm slick" id="slick-one">
                @foreach ($page->latest as $row)
                <div class="col-md-4"><a href="{{$row->link}}"><img src="{{$row->header_image}}" class="img-responsive" /><span class="center">{{$row->title}}</span></a></div>
                @endforeach
            </div>
        </div>
        <div class="col-two">
            <div class="nav"><span>新品推荐</span>
                <div class="pull-right"><a href="#" class="btn-prev" data-target-id="slick-two"><img style="margin-right:55px;" src="{{asset('/images/btn-prev.jpg')}}" /></a><a href="#" class="btn-next" data-target-id="slick-two"><img src="{{asset('/images/btn-next.jpg')}}" /></a>
                </div>
            </div>
            <div class="content  slick" id="slick-two">
                @foreach ($items1 as $item)
                <div class="col-md-4 text-center">
                    <a href="{{route('item', $item->id)}}"><img src="{{asset($item->thumb)}}" class="center-block img-responsive" /></a><span>{{$item->name}}</span>
                </div>
                @endforeach
            </div>
            <a class="arrow-prev" data-target-id="slick-two" href="#"><img src="/images/arrow-prev.png" /></a>
            <a class="arrow-next" data-target-id="slick-two" href="#"><img src="/images/arrow-next.png" /></a>
        </div>
        <div class="col-two">
            <div class="nav"><span>热销产品</span>
                <div class="pull-right"><a href="#" class="btn-prev" data-target-id="slick-three"><img style="margin-right:55px;" src="{{asset('/images/btn-prev.jpg')}}" /></a><a href="#" class="btn-next" data-target-id="slick-three"><img src="{{asset('/images/btn-next.jpg')}}" /></a>
                </div>
            </div>
            <div class="content  slick" id="slick-three">
                @foreach ($items2 as $item)
                <div class="col-md-4 text-center">
                    <a href="{{route('item', $item->id)}}"><img src="{{asset($item->thumb)}}" class="center-block img-responsive" /></a><span>{{$item->name}}</span>
                </div>
                @endforeach
            </div>
            <a class="arrow-prev" data-target-id="slick-three" href="#"><img src="/images/arrow-prev.png" /></a>
            <a class="arrow-next" data-target-id="slick-three" href="#"><img src="/images/arrow-next.png" /></a>
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
        autoplay:true
    });

    if($( window ).width() < 768 ){
        $('#slick-one').slick({
            infinite: true,
            arrows: false,
            autoplay:true,
            swipe:true
        });
        $('#slick-two,#slick-three').slick({
            infinite: true,
            arrows: false,
            autoplay:false,
            swipe:true
        });
    }
    else{
        $('#slick-one').slick({
            infinite: true,
            arrows: false,
            autoplay:true,
            slidesToShow:3
        });
        $('#slick-two,#slick-three').slick({
            infinite: true,
            arrows: false,
            autoplay:false,
            slidesToShow:3
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
