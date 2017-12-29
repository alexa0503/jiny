@extends('layouts.app')
@section('content')
<div class="container solutions">
    <div class="row">
        <h2>解决方案</h2>
        <div class="content">
        </div>
        <div class="clearfix"></div>
        <div class="row text-center row-more"><button class="btn btn-primary">更多方案</button></div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$().ready(function(){
    page();
    $('.row-more').on('click', function(){
        page()
    })
});
var current_page = 1;
var page_url = '/solutions?page=1';
function page()
{
    if(page_url == null || page_url == ''){
        alert('没有更多的方案了')
        return;
    }
    $.getJSON(page_url,function(json){
        var html = '';
        $.each(json.data,function(index,item){
            html += '<div class="col-md-3 solutions-list">';
            html += '<a href="/solutions/'+item.id+'"><img src="/'+item.thumb+'" class="img-responsive" /></a>'
            html += '<h4>'+item.name+'</h4>'
            html += '<p>'+item.desc+'</p></div>';
        })
        page_url = json.next_page_url;
        if(json.next_page_url == null){
            $('.row-more').hide();
        }
        $('.solutions .content').append(html)
        console.log(json);
    })
}
</script>
@endsection
