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
                            {{ Form::open(array('route' => ['support.type.update', $support->type_id,$support->id], 'class'=>'form-horizontal group-border stripped', 'method'=>'PUT', 'id'=>'form')) }}
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">标题</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="title" class="form-control" value="{{$support->title}}">
                                    <label class="help-block" for="title"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">描述</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea name="desc" class="form-control" rows="6">{!! $support->desc !!}</textarea>
                                    <label class="help-block" for="desc"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">缩略图</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="thumb" value="{{$support->thumb}}" type="hidden" />
                                    <input id="thumb-explorer" name="file2" type="file" multiple >
                                    <label class="help-block" for="thumb"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            @if($support->type_id == 2)
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">附件</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="attachment" value="{{$support->attachment}}" type="hidden" />
                                    <input id="attachment-explorer" name="file1" type="file" multiple >
                                    <label class="help-block" for="attachment"></label>
                                </div>
                            </div>
                            @endif

                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-md-3 control-label">内容</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea name="body" class="form-control article-ckeditor" rows="20" placeholder="请输入">{{$support->body}}</textarea>
                                    <label class="help-block" for=""></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">排序</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="sort_id" class="form-control" value="{{$support->sort_id}}">
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
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="{{asset('assets/cms/js/jquery.form.js')}}"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
$(document).ready(function() {
    $('.article-ckeditor').ckeditor({
        filebrowserBrowseUrl: '{!! url("/filemanager?type=items") !!}'
    });
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
        allowedPreviewTypes:null,
        //previewFileIcon: '<i class="fa fa-file"></i>',
        previewFileIconSettings: {
           'doc': '<i class="fa fa-file-word-o text-primary"></i>',
           'xls': '<i class="fa fa-file-excel-o text-success"></i>',
           'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
           'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
           'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
           'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
           'htm': '<i class="fa fa-file-code-o text-info"></i>',
           'txt': '<i class="fa fa-file-text-o text-info"></i>',
           'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
           'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
       },
       previewFileExtSettings: {
            'doc': function(ext) {
                return ext.match(/(doc|docx)$/i);
            },
            'xls': function(ext) {
                return ext.match(/(xls|xlsx)$/i);
            },
            'ppt': function(ext) {
                return ext.match(/(ppt|pptx)$/i);
            },
            'jpg': function(ext) {
                return ext.match(/(jp?g|png|gif|bmp)$/i);
            },
            'zip': function(ext) {
                return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
            },
            'htm': function(ext) {
                return ext.match(/(php|js|css|htm|html)$/i);
            },
            'txt': function(ext) {
                return ext.match(/(txt|ini|md)$/i);
            },
            'mov': function(ext) {
                return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
            },
            'mp3': function(ext) {
                return ext.match(/(mp3|wav)$/i);
            },
        },
        fileActionSettings: {
            showUpload: false,
        },
        initialPreview: [
            '<span class="file-other-icon"><i class="fa fa-file"></i></span>',
        ],
        initialPreviewConfig: [
            {previewAsData: false,caption: "附件",size: "{{ filesize(public_path($support->attachment)) }}", width: "400px", url: "{{url('cms/file/delete')}}", downloadUrl: '{{asset($support->attachment)}}', key: 1,extra:{name:'{{$support->attachment}}'}}
        ]
    };

    $("#attachment-explorer").fileinput(fileConfig).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="attachment"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="attachment"]').val('');
    });
    fileConfig.uploadUrl = '{{url("cms/file/upload/file2")}}';
    fileConfig.allowedFileTypes = ["image","video"]
    fileConfig.initialPreview = ["{{asset($support->thumb)}}"];
    fileConfig.initialPreviewConfig = [
        {caption: "", size: "{{ filesize(public_path($support->thumb)) }}", width: "400px", url: "{{url('cms/file/delete')}}", key: 1,extra:{name:'{{$support->thumb}}'}}
    ]
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
            location.href='{{route("support.type.index",$support->type_id)}}';
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
