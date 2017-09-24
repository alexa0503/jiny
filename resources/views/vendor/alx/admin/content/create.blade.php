@extends('admin::layout')
@section('breadcrumb')
<li>区块内容</li>
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
                                {{ Form::open(array('route' => ['block.content.store',Request::segment(3)], 'class'=>'form-horizontal group-border stripped', 'id'=>'form')) }}
                                @foreach($fields as $field)
                                    @if($field->type == 'image' || $field->type == 'images')
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-md-3 control-label">{{$field->title}}</label>
                                        <div class="col-lg-10 col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                <a data-input="{{$field->name}}" data-preview="preview-{{$field->name}}" class="{{$field->type}} btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                                </span>
                                                <input id="{{$field->name}}" class="form-control" type="text" name="{{$field->name}}" readonly>
                                            </div>
                                            <div class="preview" id="preview-{{$field->name}}"></div>
                                            <label class="help-block" for="" id="help-thumb"></label>
                                        </div><!-- /.col -->
                                    </div><!-- /form-group -->
                                    @else
                                    <div class="form-group">
                                        <label for="text" class="col-lg-2 col-md-3 control-label">{{$field->title}}</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea class="form-control {{$field->type == 'text'?'article-ckeditor':''}}" name="{{$field->name}}"></textarea>
                                            <label class="help-block" for="title"></label>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label"></label>
                                        <div class="col-lg-10 col-md-9">
                                            <button class="btn btn-default ml15" type="submit">提 交</button>
                                            <a class="btn btn-default ml15" href="{{route('block.content.index',Request::segment(3))}}">返回</a>
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
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>

$(document).ready(function() {
    $('.images').filemanager('image',{prefix:'{!! url("/filemanager") !!}',multiple:'multiple'});
    $('.image').filemanager('image',{prefix:'{!! url("/filemanager") !!}'});
    $('.article-ckeditor').ckeditor({
        filebrowserBrowseUrl: '{!! url("/filemanager") !!}'
    });
    $('.select2').select2();
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
                    if( jQuery.inArray(name, keys) != -1){
                        $(this).addClass('has-error');
                        $(this).find('.help-block').html(json[name]);
                    }
                })
                //return true;
            } catch(e) {
                alert('提交失败，请联系管理员');
                return false;
            }
        }
    });
});
</script>
@endsection
