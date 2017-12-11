@extends('cms.layout')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2>页面管理 - {{$page->title}}</h2>
                        <!--<span class="txt"></span>-->
                    </div>

                </div>
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <div class="panel-heading white-bg">
                                <h4 class="panel-title"><a class="btn btn-default" href="{{route('page.block.create', ['page'=>$page->id])}}">新增</a></h4>
                                <div class="panel-controls panel-controls-right"><a href="#" class="panel-refresh"><i class="fa fa-circle-o"></i></a><a href="#" class="toggle panel-minimize"><i class="fa fa-angle-up"></i></a><a href="#" class="panel-close"><i class="fa fa-times"></i></a></div></div>
                            <!-- Start .panel -->
                            <div class="panel-body">
                                <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>区块</th>
                                        <th>标题</th>
                                        <th>排序</th>
                                        <th>是否发布</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td>{{ $blocks[$row->name] }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->sort_id }}</td>
                                        <td>{{ $row->is_posted == '1' ? '是' : '否' }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            <a href="{{route('page.block.edit',['page'=>$row->page_id,'id'=>$row->id])}}" class="label label-info">编辑</a>
                                            <a href="{{route('page.block.destroy',['page'=>$row->page_id,'id'=>$row->id])}}" class="delete label label-info">删除</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="dataTables_paginate paging_bootstrap" id="basic-datatables_paginate">
                                            {!! $rows->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
                </div>
                <!-- End .row -->
            </div>
            <!-- End .page-content-inner -->
        </div>
        <!-- / page-content-wrapper -->
    </div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('.delete').click(function(){
        var url = $(this).attr('href');
        var obj = $(this).parents('td').parent('tr');
        if( confirm('该操作无法返回,是否继续?')){
            $.ajax(url, {
                dataType: 'json',
                type: 'delete',
                success: function(json){
                    if(json.ret == 0){
                        obj.remove();
                    }
                },
                error: function(){
                    alert('请求失败~');
                }
            });
        }
        return false;
    })
    $('.update').click(function(){
        var url = $(this).attr('href');
        var obj = $(this);
        $.ajax(url, {
            dataType: 'json',
            success: function(json){
                if(json.ret == 0){
                    location.reload();
                }
            },
            error: function(){
                alert('请求失败~');
            }
        });
        return false;
    })
});
</script>
@endsection
