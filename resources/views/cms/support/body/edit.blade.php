@extends('cms.layout')

@section('content')
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content-inner">
            <!-- Start .page-content-inner -->
            <div id="page-header" class="clearfix">
                <div class="page-header">
                    <h2>@if($body->support->type_id == 1){{'技术资料'}}@else{{'样本下载'}}@endif - 编辑</h2>
                </div>
            </div>
            <!-- Start .row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default">
                        <div class="panel-heading white-bg">
                            <h3><a href="{{route('support.body.edit', [$body->id,$body->type_id])}}">{{$body->support->title}}</a></h3>
                        </div>
                        <!-- Start .panel -->
                        <div class="panel-body pt0 pb0">
                            {{ Form::open(array('route' => ['support.body.update', $body->support_id,$body->id], 'class'=>'form-horizontal group-border stripped', 'method'=>'PUT', 'id'=>'form')) }}
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">标题</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="title" class="form-control" value="{{$body->title}}">
                                    <label class="help-block" for="title"></label>
                                </div>
                            </div>

                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">图片</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="image" value="{{$body->image}}" type="hidden" />
                                    <input id="image-explorer" name="file" type="file" multiple >
                                    <label class="help-block" for="image"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">排序</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="sort_id" class="form-control" value="{{$body->sort_id}}">
                                    <label class="help-block" for="description"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="txt" class="col-lg-2 col-md-3 control-label">内容</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea name="txt" class="form-control article-ckeditor" rows="6">{{$body->txt}}</textarea>
                                    <label class="help-block" for="txt"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label"></label>
                                <div class="col-lg-10 col-md-9">
                                    <button class="btn btn-default ml15" type="submit">提 交</button>
                                    <a class="btn btn-default ml15" href="javascript:window.history.go(-1);">返回</a>
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
        filebrowserBrowseUrl: '{!! url("/filemanager?type=support") !!}'
    });
    $('.select2').select2();
    var fileConfig = {
        theme: 'explorer',
        uploadUrl: '{{url("cms/file/upload/file")}}',
        uploadAsync: false,
        maxFileCount: 1,
        //allowedFileTypes: ["text"],
        //allowedFileExtensions: ["xlsx","xls","csv","ppt","pptx","zip","tar","doc","docx","txt","pdf"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        browseLabel:'选择文件',
        fileActionSettings: {
            showUpload: false,
        },
        initialPreview: [
            '{{asset($body->image)}}',
        ],
        initialPreviewConfig: [
            {caption: "", size: "{{ filesize(public_path($body->image)) }}", width: "400px", url: "{{url('cms/file/delete')}}", key: 1,extra:{name:'{{$body->image}}'}}
        ]
    };

    $("#image-explorer").fileinput(fileConfig).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="image"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="image"]').val('');
    });
    $('#form').ajaxForm({
        dataType: 'json',
        success: function() {
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            location.href='{{route("support.body.index",Request::segment(3))}}';
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
