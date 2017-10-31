@extends('cms.layout')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2>解决方案分类 - 编辑</h2>
                    </div>
                </div>
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body pt0 pb0">
                                {{ Form::open(array('route' => ['solution_category.update',$category->id], 'class'=>'form-horizontal group-border stripped', 'method'=>'PUT', 'id'=>'form')) }}
                                <div class="form-group">
                                    <label for="text" class="col-lg-2 col-md-3 control-label">分类名称</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                        <label class="help-block" for="name"></label>
                                    </div>
                                </div>
                                <!-- End .form-group  -->
                                <div class="form-group">
                                    <label for="text" class="col-lg-2 col-md-3 control-label">描述</label>
                                    <div class="col-lg-10 col-md-9">
                                        <textarea name="desc" class="form-control">{{$category->desc}}</textarea>
                                        <label class="help-block" for="desc"></label>
                                    </div>
                                </div>
                                <!-- End .form-group  -->
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label" for="">产品缩略图</label>
                                    <div class="col-lg-10 col-md-9">
                                        <div class="thumb-preview">
                                            <a href="{{ asset($category->thumb) }}" target="_blank"><img title="点击查看原图" src="{{ asset($category->thumb) }}" /></a>
                                        </div>
                                        <input type="file" name="thumb" class="filestyle" data-buttonText="选择图片" data-buttonName="btn-danger" data-iconName="fa fa-plus">
                                        <label class="help-block" for="thumb"></label>
                                    </div>
                                </div>
                                <!-- End .form-group  -->
                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label" for="">产品详图</label>
                                    <div class="col-lg-10 col-md-9">
                                        <div class="thumb-preview">
                                            <a href="{{ asset($category->image) }}" target="_blank"><img title="选择图片" src="{{ asset($category->image) }}" /></a>
                                        </div>
                                        <input type="file" name="image" class="filestyle" data-buttonText="上传图片" data-buttonName="btn-danger" data-iconName="fa fa-plus">
                                        <label class="help-block" for="image"></label>
                                    </div>
                                </div>
                                <!-- End .form-group  -->
                                <div class="form-group">
                                    <label for="text" class="col-lg-2 col-md-3 control-label">排序</label>
                                    <div class="col-lg-10 col-md-9">
                                        <input type="text" name="sort_id" class="form-control" value="{{$category->sort_id}}">
                                        <label class="help-block" for="sort_id"></label>
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
    $('.filestyle').change(function(){
        var preview = $(this).parent().find('.thumb-preview');
        preview.html('');
        var reader = new FileReader();
        reader.onload = function (event) {
            preview.append('<img src="'+event.target.result+'" />');
        }
        reader.readAsDataURL(this.files[0]);
    });
    var file_config_bkg = {
        theme: 'explorer',
        uploadUrl: '{{url("cms/file/upload/file-icon")}}',
        uploadAsync: false,
        maxFileCount: 1,
        allowedFileTypes: ["image", "video"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        fileActionSettings: {
            showUpload: false
        }
    };
        $(document).ready(function() {
            $('.select2').select2();
            $('#form').ajaxForm({
                dataType: 'json',
                success: function() {
                    $('#form .form-group .help-block').empty();
                    $('#form .form-group').removeClass('has-error');
                    location.href='{{route("solution_category.index")}}';
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
                        if( jQuery.inArray(name, keys) != -1){
                            $(this).addClass('has-error');
                            $(this).find('.help-block').html(json[name]);
                        }
                    })
                }
            });
        });
</script>
@endsection
