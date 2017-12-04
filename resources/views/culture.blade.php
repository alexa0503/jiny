@extends('layouts.app')
@section('content')
<div class="nav-header-01">
    <div class="container">
        <div class="row">
            <ul class="nav navbar-nav">
            <li class="active"><a href="#culture">企业文化</a></li>
            <li class="split"><span>|</span></li>
            <li><a href="#block14">品牌资源</a></li>
            <li class="split"><span>|</span></li>
            <li><a href="#block13">加入我们</a></li>
          </ul>
        </div>
    </div>
</div>
<div class="container culture">
    @foreach($page->graphic as $block)
    <div class="row">
        <h2 id="culture">{{$block->title}}</h2>
        <h4>{{$block->description}}</h4>
        <div class="img-culture"><img src="{{asset($block->header_image)}}" class="img-responsive"  /></div>
        <div class="content">
            {!! $block->content !!}
        </div>
    </div>
    @endforeach
    @foreach($page->texts as $text)
    <div class="row hidden-xs">
        <h2 id="#block{{$text->id}}">{{$text->title}}</h2>
        <div class="content">
            @php
            $content = explode("\n",$text->content);
            @endphp
            <p>{!! implode('</p><p>', $content)!!}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('scripts')
<script>
$().ready(function(){
    $('.navbar-nav li a').on('touchend', function(){
        var id = $(this).attr('href').replace('#','');
        $('.culture .row').addClass('hidden-xs');
        $('#'+id).parents('.row').removeClass('hidden-xs');
        $('.navbar-nav li').removeClass('active');
        $(this).parents('li').addClass('active');
        return false;
    })
})
</script>
@endsection
