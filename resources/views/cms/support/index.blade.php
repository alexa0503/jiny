@extends('cms.layout')

@section('content')
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content-inner">
            <!-- Start .page-content-inner -->
            <div id="page-header" class="clearfix">
                <div class="page-header">
                    <h2></h2>
                    <span class="txt"></span>
                </div>

            </div>
            <!-- Start .row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default">
                        <!-- Start .panel -->
                        <div class="panel-body">
                            <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>图片</th>
                                        <th>标题</th>
                                        <th>描述</th>
                                        <th>排序</th>
                                        @if(Request::segment(3) == 2)<th>附件</th>@endif
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td>@if($row->thumb)<a href="{{ asset($row->thumb) }}"><img style="max-width:200px;max-height:200px;" src="{{ asset($row->thumb) }}" target="_blank" title="点击查看大图" /></a>@else{{ '--' }}@endif</td>
                                        <td>{{ $row->title }}</td>

                                        <td>{{ str_limit($row->desc,40) }}</td>
                                        <td>{{ $row->sort_id }}</td>
                                        @if(Request::segment(3) == 2)<td><a href="{{ asset($row->attachment) }}" class="label label-info">下载</a></td>@endif
                                        
                                        <td>
                                            <a href="{{route('support.type.edit',['type'=>$row->type_id,'id'=>$row->id])}}" class="label label-info">编辑</a>
                                            <a href="{{route('support.type.destroy',['type'=>$row->type_id,'id'=>$row->id])}}" class="delete label label-info">删除</a></td>
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
        $('#category').on('change', function () {
            $('#search-form').submit();
        });
        //$('.select2').select2();
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
    });
    </script>
    @endsection
