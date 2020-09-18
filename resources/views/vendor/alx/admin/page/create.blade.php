@extends('admin::layout')
@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body pt0 pb0">
                                {{ Form::open(array('route' => ['page.store'], 'class'=>'form-horizontal group-border stripped', 'id'=>'form')) }}
                                    <div class="form-group">
                                        <label for="title" class="col-lg-2 col-md-3 control-label">标题</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input id="title" type="text" name="title" class="form-control" value="">
                                            <label class="help-block" for="title"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alias" class="col-lg-2 col-md-3 control-label">[限英文]别名</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input id="alias" type="text" name="alias" class="form-control" value="">
                                            <label class="help-block" for="alias"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc" class="col-lg-2 col-md-3 control-label">描述</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea class="form-control" name="desc" id="desc"></textarea>
                                            <label class="help-block" for="desc"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="desc" class="col-lg-2 col-md-3 control-label">显示菜单</label>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="row">
                                            <div class="col-lg-3 col-md-3"><select name="menu_display" class="form-control" id="menu_display">
                                                <option value="1">是</option>
                                                <option value="0">否</option>
                                            </select></div>
                                            <div class="col-lg-9 col-md-9"><label class="help-block" for="menu_display"></label></div></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alias" class="col-lg-2 col-md-3 control-label">排序</label>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3"><input id="sort_id" type="text" name="sort_id" class="form-control" value="0"></div>
                                                <div class="col-lg-9 col-md-9"><label class="help-block" for="sort_id"></label></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="body" class="col-lg-2 col-md-3 control-label">内容</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea class="form-control article-ckeditor" name="body" id="body"></textarea>
                                            <label class="help-block" for="body"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-10 col-md-9 col-lg-offset-2 col-md-offset-3">
                                            <button class="btn btn-default ml15" type="submit">提 交</button>
                                            <a class="btn btn-default ml15" href="javascript:window.history.go(-1);">返回</a>
                                        </div>
                                    </div>
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
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
$(document).ready(function() {
    $('.article-ckeditor').ckeditor({
        filebrowserBrowseUrl: '{!! url('filemanager/index.html') !!}'
    });
    $('.select2').select2();

    $('#form').ajaxForm({
        dataType: 'json',
        success: function() {
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            $('#backUrl').attr('href','{{route("page.index")}}');
            $('#modal-tip').modal('show');
        },
        error: function(xhr){
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            try {
                var json = jQuery.parseJSON(xhr.responseText);
                var keys = Object.keys(json);
                $('#form .form-group .help-block').empty();
                $('#form .form-group').removeClass('has-error');
                $('#form .form-group').each(function(){
                    var name = $(this).find('select').attr('name') || $(this).find('input,textarea').attr('name');
                    //console.log(name);
                    if( jQuery.inArray(name, keys) != -1){
                        $(this).addClass('has-error');
                        $(this).find('.help-block').html(json[name]);
                    }
                })
                //return true;
            } catch(e) {
                alert('提交失败，请联系管理员');
                //console.log(e);
                return false;
            }
        }
    });
});
</script>
@endsection
