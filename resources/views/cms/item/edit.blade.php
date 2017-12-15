@extends('cms.layout')

@section('content')
<div class="page-content sidebar-page right-sidebar-page clearfix">
    <!-- .page-content-wrapper -->
    <div class="page-content-wrapper">
        <div class="page-content-inner">
            <!-- Start .page-content-inner -->
            <div id="page-header" class="clearfix">
                <div class="page-header">
                    <h2>产品管理 - 编辑</h2>
                </div>
            </div>
            <!-- Start .row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default">
                        <!-- Start .panel -->
                        <div class="panel-body pt0 pb0">
                            {{ Form::open(array('route' => ['item.update',$item->id], 'class'=>'form-horizontal group-border stripped', 'method'=>'PUT', 'id'=>'form')) }}
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">产品名称</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="name" class="form-control" value="{{$item->name}}">
                                    <label class="help-block" for="name"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">产品分类</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="category" class="select2 form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if ($category->id == $item->category_id)){{' selected="selected"'}}@endif>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="help-block" for="categories"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">产品属性</label>
                                <div class="col-lg-10 col-md-9">
                                    <div class="rows">
                                        @foreach ($attributes as $name=>$value)
                                        <?php $attribute = $item->getItemAttribute($name);?>
                                        <div class="col-md-4">
                                            <label for="text" class="col-lg-3 col-md-4 control-label">{{$value}}</label>
                                            <div class="col-lg-9 col-md-8">
                                                <textarea name="attributes[{{$name}}]" class="form-control" rows="2" placeholder="请输入">{{$attribute->body}}</textarea>
                                                <label class="help-block" for=""></label>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">详情图</label>
                                <div class="col-lg-10 col-md-9">
                                    <input name="thumb" value="{{$item->thumb}}" type="hidden" />
                                    <input id="thumb-explorer" name="file1" type="file" multiple >
                                    <label class="help-block" for="thumb"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">产品详情</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea name="detail" class="form-control article-ckeditor" rows="20" placeholder="请输入">{{$item->detail}}</textarea>
                                    <label class="help-block" for="detail"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">标准配置</label>
                                <div class="col-lg-10 col-md-9">
                                    <textarea name="standard" class="form-control article-ckeditor" rows="20" placeholder="请输入">{{$item->standard}}</textarea>
                                    <label class="help-block" for="standard"></label>
                                </div>
                            </div>

                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">案例分享</label>
                                <div class="col-lg-10 col-md-9">
                                    @for($i=0; $i<6; $i++)
                                    <div class="row" style="margin-bottom:10px;">
                                        <div class="col-lg-2 col-md-2">
                                            案例{{$i+1}}:
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <input type="text" name="cases[{{$i}}][title]" class="form-control" value="@if(isset($item->cases[$i]) AND isset($item->cases[$i]['title']) ){{$item->cases[$i]['title']}}@endif" placeholder="输入标题">
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="input-group">
                                              <span class="input-group-btn">
                                                <a data-input="inputCase{{$i}}" data-preview="holder2" class="lfm btn btn-primary">
                                                  <i class="fa fa-file-o"></i> 选择
                                                </a>
                                              </span>
                                              <input name="cases[{{$i}}][url]" id="inputCase{{$i}}" class="form-control" type="text" value="@if(isset($item->cases[$i]) AND isset($item->cases[$i]['url'])){{$item->cases[$i]['url']}}@endif" name="filepath" placeholder="输入视频URL/或者点击左侧上传">
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    <label class="help-block" for="optional"></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="text" class="col-lg-2 col-md-3 control-label">可选配置</label>
                                <div class="col-lg-10 col-md-9">
                                    <select name="options[]" class="select2 form-control" multiple="multiple">
                                        @foreach($options as $option)
                                        <option value="{{$option->id}}"@if(in_array($option->id,$item->options)){{' selected="selected"'}}@endif>{{$option->name}}</option>
                                        @endforeach
                                    </select>
                                    <label class="help-block" for=""></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-md-3 control-label">排序</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="sort_id" class="form-control" value="{{$item->sort_id}}">
                                    <label class="help-block" for=""></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-md-3 control-label">推荐[留空不显示,从小到大]</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="recommended_id" class="form-control" value="{{$item->recommended_id}}">
                                    <label class="help-block" for=""></label>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label for="" class="col-lg-2 col-md-3 control-label">热销[留空不显示,从小到大]</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" name="hot_id" class="form-control" value="{{$item->hot_id}}">
                                    <label class="help-block" for=""></label>
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
    $('.lfm').filemanager('files',{prefix:'{!! url("/filemanager") !!}'});
    $('.article-ckeditor').ckeditor({
        filebrowserBrowseUrl: '{!! url("/filemanager?type=items") !!}'
    });
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
    var file_config = {
        theme: 'explorer',
        uploadUrl: '{{url("cms/file/upload/file1")}}',
        uploadAsync: false,
        maxFileCount: 1,
        //allowedFileTypes: ["text"],
        //allowedFileExtensions: ["xlsx","xls","csv","ppt","pptx","zip","tar","doc","docx","txt","pdf"],
        overwriteInitial: true,
        initialPreviewAsData: true,
        browseLabel:'选择文件',
        fileActionSettings: {
            showUpload: true,
        },
        initialPreview: [
            '{{asset($item->thumb)}}',
        ],
        initialPreviewConfig: [
            {caption: "", size: "{{ filesize(public_path($item->thumb)) }}", width: "400px", url: "{{url('cms/file/delete')}}", key: 1,extra:{name:'{{$item->thumb}}'}}
        ]
    };
    $("#thumb-explorer").fileinput(file_config).on('filebatchuploadsuccess', function(event, data) {
        $('input[name="thumb"]').val(data.response.initialPreviewConfig[0].value);
    }).on('filedeleted',function () {
        $('input[name="thumb"]').val('');
    });
});
</script>
@endsection
