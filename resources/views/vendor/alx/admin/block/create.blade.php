@extends('admin::layout')
@section('breadcrumb')
<li>区块管理</li>
<li>新增</li>
@endsection
@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body pt0 pb0">
                                {{ Form::open(array('route' => ['block.store'], 'class'=>'form-horizontal group-border stripped', 'id'=>'form')) }}
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">标题</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" name="title" class="form-control" value="">
                                            <label class="help-block" for="title"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">名称[唯一，仅英文数字]</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="text" name="name" class="form-control" value="">
                                            <label class="help-block" for="name"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">描述</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea name="desc" class="form-control"></textarea>
                                            <label class="help-block" for="desc"></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">字段</label>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="row-field">
                                                <div class="row" style="margin-bottom:10px;">
                                                    <div class="col-lg-3 col-md-3">
                                                        <input type="text" name="fields[0][name]" class="form-control" value="" placeholder="请输入字段名/自动生成">
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <input type="text" name="fields[0][title]" class="form-control" value="" placeholder="字段描述">
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <select name="fields[0][type]" class="form-control">
                                                            <option value="">选择字段类型</option>
                                                            @foreach(config('admin.field.types') as $key=>$value)
                                                            <option value="{{$key}}">{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <a href="javascript:;" onclick="fieldRemove($(this));" class="remove-field"><i class="glyphicon glyphicon-minus"></i> 移除</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="rows" style="padding-top:30px;">
                                                <a href="javascript:;" id="add-field"><i class="glyphicon glyphicon-plus"></i> 增加字段</a>
                                            </div>
                                            <label class="help-block" for=""></label>
                                        </div>
                                    </div>
                                    <!-- End .form-group  -->
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label"></label>
                                        <div class="col-lg-10 col-md-9">
                                            <button class="btn btn-default ml15" type="submit">提 交</button>
                                            <a class="btn btn-default ml15" href="{{route('block.index')}}">返回</a>
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
<script src="{{asset('js/jquery.form.js')}}"></script>
<script>
function fieldRemove(obj){
    obj.parent('div').parent('div.row').remove();
}
$(document).ready(function() {
    $('.select2').select2();
    var html = '<div class="row" style="margin-bottom:10px;">'+$('.row-field .row').eq(0).html()+'</div>';
    var i = 0;
    $('#add-field').on('click', function(){
        ++i;
        var _html = html.replace('fields[0]','fields['+i+']');
        $('.row-field').append(_html);
    });
    $('#form').ajaxForm({
        dataType: 'json',
        success: function() {
            $('#form .form-group .help-block').empty();
            $('#form .form-group').removeClass('has-error');
            $('#backUrl').attr('href','{{route("block.index")}}');
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
