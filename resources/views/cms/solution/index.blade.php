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
                        <div class="panel-heading white-bg">
                            <form class="form-inline" id="search-form" action="" method="get" role="form" style="margin: 4px 0;">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                    <select id="category" class="select2" name="category" style="line-height: 24px;height: 30px;">
                                        <option value="">所有/选择</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}"{{ $category->id == Request::get('category') ? ' selected="selected"' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="panel-body">
                            <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>图片</th>
                                        <th>名称</th>
                                        <th>描述</th>
                                        <th>排序</th>
                                        <th>附件</th>
                                        <th>创建时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $row)
                                    <tr>
                                        <td><a href="{{ asset($row->image) }}"><img style="max-width:200px;max-height:200px;" src="{{ asset($row->image) }}" target="_blank" title="点击查看大图" /></a></td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ str_limit($row->desc,60) }}</td>
                                        <td>{{ $row->sort_id }}</td>
                                        <td><a href="{{ asset($row->attachment) }}" class="label label-info">下载</a></td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            <a href="{{route('solution.edit',['id'=>$row->id])}}" class="label label-info">编辑</a>
                                            <a href="{{route('solution.destroy',['id'=>$row->id])}}" class="delete label label-info">删除</a></td>
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
