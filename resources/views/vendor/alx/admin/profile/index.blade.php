@extends('admin::layout')
@section('content')
    <div class="smart-widget widget-purple">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                {{ Form::open(array('url' => '/admin/profile', 'class'=>'form-horizontal', 'method'=>'PUT', 'id'=>'post-form')) }}
                <div class="form-group">
                    <label for="password" class="col-sm-2 col-md-2 control-label">密码</label>
                    <div class="col-sm-6 col-md-6">
                        <input value="" name="password" type="password" class="form-control" id="password" placeholder="">
                    </div><!-- /.col -->
                    <div class="col-lg-4 col-md-4"><label class="help-block" for="" id="help-name"></label></div>
                </div><!-- /form-group -->
                <div class="form-group">
                    <label for="repassword" class="col-sm-2 col-md-2 control-label">密码确认</label>
                    <div class="col-sm-6 col-md-6">
                        <input value="" name="repassword" type="password" class="form-control" id="repassword" placeholder="">
                    </div><!-- /.col -->
                    <div class="col-lg-4 col-md-4">
                        <label class="help-block" for="" id="help-repassword"></label>
                    </div>
                </div><!-- /form-group -->
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10 col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-success btn-sm">提交</button>
                    </div><!-- /.col -->
                </div><!-- /form-group -->
                {{ Form::close() }}
            </div>
        </div><!-- ./smart-widget-inner -->
    </div>
@endsection
@section('scripts')
    <script>
        $('#post-form').ajaxForm({
            dataType: 'json',
            success: function(json) {
                $('#post-form').modal('hide');
                location.href= json.url;
            },
            error: function(xhr){
                var json = jQuery.parseJSON(xhr.responseText);
                if (xhr.status == 200){
                    $('#post-form').modal('hide');
                    location.href= json.url;
                }
                $('.help-block').html('');
                $.each(json, function(index,value){
                    $('#'+index).parents('.form-group').addClass('has-error');
                    $('#help-'+index).html(value);
                    //$('#'+index).next('.help-block').html(value);
                });
            }
        });
    </script>
@endsection