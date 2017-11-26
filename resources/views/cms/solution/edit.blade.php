@extends('cms.layout')

@section('content')
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content-inner">
            <!-- Start .page-content-inner -->
            <div id="page-header" class="clearfix">
                <div class="page-header">
                    <h2>解决方案 - 编辑</h2>
                </div>
            </div>
            <!-- Start .row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default">
                        <!-- Start .panel -->
                        <div class="panel-body pt0 pb0">
                            {{ Form::open(array('route' => ['solution.update',$solution->id], 'class'=>'form-horizontal group-border stripped', 'method'=>'PUT', 'id'=>'form')) }}
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">所属分类</label>
                                <div class="col-lg-10 col-md-9">
                                    <select  name="category" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}"{{ $category->id == $solution->category_id ? ' selected="selected"' : '' }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="help-block" for="category"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">名称</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="name" class="form-control" value="{{$solution->name}}">
                                    <label class="help-block" for="name"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">描述</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea name="desc" class="form-control" rows="6">{!! $solution->desc !!}</textarea>
                                    <label class="help-block" for="desc"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">详情图</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="image" value="{{$solution->image}}" type="hidden" />
                                    <input id="image-explorer" name="file2" type="file" multiple >
                                    <label class="help-block" for="image"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">附件</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="attachment" value="{{$solution->attachment}}" type="hidden" />
                                    <input id="attachment-explorer" name="file1" type="file" multiple >
                                    <label class="help-block" for="attachment"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">排序</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="sort_id" class="form-control" value="{{$solution->sort_id}}">
                                    <label class="help-block" for="description"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label"></label>
                                <div class="col-lg-10 col-md-9">
                                    <button class="btn btn-default ml15" type="submit">提 交</button>
                                    <a class="btn btn-default ml15" href="{{url('admin/page/index')}}">返回</a>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            {{ Form::close() }}
                        </div>
                    </div>
                    <!-- End .panel -->
                </div>
                <!-- col-lg-12 end here -->
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
    $('.select2').select2();
    var file_config = {
        theme: 'explorer',
        uploadUrl: '{{url("cms/file/upload/file1")}}',
        uploadAsync: false,
        maxFileCount: 1,
        overwriteInitial: true,
        initialPreviewAsData: true,
        browseLabel:'选择文件',
        initialPreviewFileType:'image',
        previewFileIcon: '<i class="fa fa-file"></i>',
        fileActionSettings: {
            showUpload: false,
        },
        initialPreview: [
            '<span class="file-other-icon"><i class="fa fa-file"></i></span>',
        ],
        initialPreviewConfig: [
            {previewAsData: false,caption: "附件",size: "{{ filesize(public_path($solution->attachment)) }}", width: "400px", url: "{{url('cms/file/delete')}}", downloadUrl: '{{asset($solution->attachment)}}', key: 1,extra:{name:'{{$solution->attachment}}'}}
        ]
    };
    $("#attachment-explorer").fileinput(file_config).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="attachment"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="attachment"]').val('');
    });
    file_config.uploadUrl = '{{url("cms/file/upload/file2")}}';
    file_config.allowedFileTypes = ["image","video"]
    file_config.initialPreview = ["{{asset($solution->image)}}"];
    file_config.initialPreviewConfig = [
        {caption: "", size: "{{ filesize(public_path($solution->image)) }}", width: "400px", url: "{{url('cms/file/delete')}}", key: 1,extra:{name:'{{$solution->image}}'}}
    ]
    $("#image-explorer").fileinput(file_config).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="image"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="image"]').val('');
    });

    $('#form').ajaxForm({
        dataType: 'json',
        success: function() {
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            location.href='{{route("solution.index")}}';
        },
        error: function(xhr){
            if( xhr.status != 422){
                alert('服务器发送错误');
                return;
            }
            var json = jQuery.parseJSON(xhr.responseText);
            var keys = Object.keys(json.errors);
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            $('#form .form-group').each(function(){
                var name = $(this).find('select').attr('name') || $(this).find('input,textarea').attr('name');
                console.log(name);
                if( jQuery.inArray(name, keys) != -1){
                    $(this).addClass('has-error');
                    $(this).find('.help-block').html(json.errors[name]);
                }
            })
        }
    });
});
</script>
@endsection
