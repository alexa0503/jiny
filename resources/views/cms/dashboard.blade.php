@extends('cms.layout')

@section('content')
    <div class="page-content sidebar-page right-sidebar-page clearfix">
        <!-- .page-content-wrapper -->
        <div class="page-content-wrapper">
            <div class="page-content-inner">
                <!-- Start .page-content-inner -->
                <div id="page-header" class="clearfix">
                    <div class="page-header">
                        <h2>控制面板首页</h2>
                        <span class="txt">点击左侧菜单查看详细</span>
                    </div>
                    <div class="header-stats">
                        <div class="spark clearfix">
                        </div>
                        <!--<div class="spark clearfix">
                            <div class="spark-info"><span class="number">17345</span>Views</div>
                            <div id="spark-templateviews" class="sparkline"></div>
                        </div>
                        <div class="spark clearfix">
                            <div class="spark-info"><span class="number">3700$</span>Sales</div>
                            <div id="spark-sales" class="sparkline"></div>
                        </div>-->
                    </div>
                </div>
                <!-- Start .row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="panel panel-default">
                            <!-- Start .panel -->
                            <div class="panel-body pt0 pb0">
                                {{ Form::open(array('url' => '/cms/site/update', 'class'=>'form-horizontal group-border stripped', 'method'=>'PUT', 'id'=>'form')) }}
                                @foreach($site_configs as $site_config)
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 col-md-3 control-label">{{ $site_config->descr }}</label>
                                        <div class="col-lg-10 col-md-9">
                                            <textarea name="body[{{ $site_config->id }}]" class="form-control" rows="4" placeholder="请输入">{{ $site_config->body }}</textarea>
                                            <label class="help-block" for=""></label>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label class="col-lg-2 col-md-3 control-label"></label>
                                    <div class="col-lg-10 col-md-9">
                                        <button class="btn btn-default ml15" type="submit">更新网站设置</button>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                        <!-- End .panel -->
                    </div>
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
        $().ready(function () {
            $('#form').ajaxForm({
                dataType: 'json',
                success: function(json) {
                    if( json && json.ret === 0 ){
                        alert('提交成功');
                    }
                    else{
                        alert(json.msg);
                    }
                },
                error: function(xhr){
                    alert('提交失败，请联系管理员');
                }
            });
        })
    </script>
@endsection
