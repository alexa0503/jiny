@extends('cms.layout')

@section('content')
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content-inner">
            <!-- Start .page-content-inner -->
            <div id="page-header" class="clearfix">
                <div class="page-header">
                    <h2>@if(Request::segment(3) == 1){{'技术资料'}}@else{{'样本下载'}}@endif - 编辑</h2>
                </div>
            </div>
            <!-- Start .row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default">
                        <!-- Start .panel -->
                        <div class="panel-body pt0 pb0">
                            {{ Form::open(array('route' => ['support.type.store', Request::segment(3)], 'class'=>'form-horizontal group-border stripped', 'id'=>'form')) }}
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">标题</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="title" class="form-control" value="">
                                    <label class="help-block" for="title"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">描述</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea name="desc" class="form-control" rows="6"></textarea>
                                    <label class="help-block" for="desc"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">缩略图</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="thumb" value="" type="hidden" />
                                    <input id="thumb-explorer" name="file2" type="file" multiple >
                                    <label class="help-block" for="thumb"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            @if(Request::segment(3) == 2)
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">附件</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="attachment" value="" type="hidden" />
                                    <input id="attachment-explorer" name="file1" type="file" multiple >
                                    <label class="help-block" for="attachment"></label>
                                </div>
                            </div>
                            @endif


                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">排序</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="sort_id" class="form-control" value="999">
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
    var fileConfig = {
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
        }
    };

    $("#attachment-explorer").fileinput(fileConfig).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="attachment"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="attachment"]').val('');
    });
    fileConfig.uploadUrl = '{{url("cms/file/upload/file2")}}';
    fileConfig.allowedFileTypes = ["image","video"]

    $("#thumb-explorer").fileinput(fileConfig).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="thumb"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="thumb"]').val('');
    });
    $('#form').ajaxForm({
        dataType: 'json',
        success: function() {
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            location.href='{{route("support.type.index",Request::segment(3))}}';
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
