@extends('layouts.app')
@section('content')
<div class="nav-header-01">
    <div class="container">
        <div class="row">
            <ul class="nav navbar-nav" id="topper">
                @foreach($page->blocks as $k=> $block)
                <li{{$k==0?' class="active"':''}}><a href="#block{{$block->id}}">{{$block->title}}</a></li>
                @if($k+1 != count($page->blocks))
                <li class="split"><span></span></li>
                @endif
                @endforeach
          </ul>
        </div>
    </div>
</div>
<div class="container culture">
    @foreach($page->blocks as $k=>$block)
    <div class="row{{$k!=0?' hidden':''}}">
        <h2 id="block{{$block->id}}">{{$block->title}}</h2>
        @if($block->name == 'text')
        <div class="content">
            @php
            $content = explode("\n",$block->content);
            @endphp
            <p>{!! implode('</p><p>', $content)!!}</p>
        </div>
        @else
        <h4>{{$block->description}}</h4>
        <div class="img-culture"><img src="{{asset($block->header_image)}}" class="img-responsive"  /></div>
        <div class="content">
            {!! $block->content !!}
        </div>
        @endif
    </div>
    @endforeach
</div>
@endsection
@section('scripts')
<script>
$().ready(function(){
    $('#topper li a').on('click', function(){
        var id = $(this).attr('href').replace('#','');
        $('.culture .row').addClass('hidden');
        $('#'+id).parents('.row').removeClass('hidden');
        $('#topper li').removeClass('active');
        $(this).parents('li').addClass('active');
        return false;
    })
})
</script>
@endsection
