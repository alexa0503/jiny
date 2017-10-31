@extends('cms.layout')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2>产品管理 - 添加</h2>
                    </div>
                </div>
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body pt0 pb0">
                                {{ Form::open(array('route' => ['item.store'], 'class'=>'form-horizontal group-border stripped', 'id'=>'form')) }}
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">产品名称</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" name="name" class="form-control" value="">
                                            <label class="help-block" for="name"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">产品分类</label>
                                        <div class="col-lg-10 col-md-9">
                                            <select name="categories[]" class="select2 form-control" multiple="multiple">
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <label class="help-block" for="categories[]"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    @foreach ($attributes as $name=>$attribute)
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">{{$attribute}}</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" name="{{$name}}_title" class="form-control" value="" placeholder="输入标题">
                                            <textarea name="{{$name}}_content" class="form-control" rows="5" placeholder="内容"></textarea>
                                            <label class="help-block" for="{{$name}}_title"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    @endforeach
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">产品缩略图</label>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="thumb-preview">
                                            </div>
                                            <input type="file" name="thumbnail" class="filestyle" data-buttonText="Find file" data-buttonName="btn-danger" data-iconName="fa fa-plus">
                                            <label class="help-block" for="thumbnail"></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">产品详情</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea name="description" class="form-control" rows="5" placeholder="请输入"></textarea>
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
    $('#form').ajaxForm({
        dataType: 'json',
        success: function() {
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            location.href='{{route("item.index")}}';
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
                    $(this).find('.help-block').html(json[name]);
                }
            })
        }
    });
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
            uploadUrl: '{{url("admin/file/upload/file-icon")}}',
            uploadAsync: false,
            maxFileCount: 1,
            allowedFileTypes: ["image", "video"],
            overwriteInitial: true,
            initialPreviewAsData: true,
            fileActionSettings: {
                showUpload: false
            }
        };
    $("#file-explorer").fileinput(file_config_bkg).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="icon"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="icon"]').val('');
    });

});
</script>
@endsection
