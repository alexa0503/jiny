@extends('layouts.app')
@section('content')
<div class="nav-header-01">
    <div class="container">
        <div class="row">
            <ul class="nav navbar-nav">
            <li class="active"><a href="#culture">企业文化</a></li>
            <li class="split"><span>|</span></li>
            <li><a href="#brand">品牌资源</a></li>
            <li class="split"><span>|</span></li>
            <li><a href="#joinus">加入我们</a></li>
          </ul>
        </div>
    </div>
</div>
<div class="container culture">
    <div class="row">
        <h2 id="culture">企业文化</h2>
        <h4>上海杰尼机电技术有限公司</h4>
        <div class="img-culture"><img src="/images/culture.jpg" class="img-responsive"  /></div>
        <div class="content">
            <p>上海杰尼机电技术有限公司（JINY）是专业从事高压清洗设备研究和开发的企业，公司拥有专业设计和服务团队，从2005年开始就为中国市场提供高压水清洗应用方案，十年如一日的努力探索，成功开发多种适合中国市场的系列高压清洗机，并为客户量身定制多种高压水清洗设备。</p>
            <p>公司主要产品有:高压清洗机，高压柱塞泵、高压热水清洗机、试压泵机组、高压旋转喷头、管道疏通系统、高压水射流设备附件与维修服务。</p>
            <p>上海杰尼拥有一个有多年经验的专业化技术研发团队，为公司蓬勃发展提供源源不断的创新力。今年公司还与上海华东理工大学机械学院合作，引入先进的自动化理念，不断改进并创新产品，努力为国内客户提供更安全，更实用，更易操作的高压清洗产品。</p>
        </div>
    </div>
    <div class="row hidden-xs">
        <h2 id="brand">品牌资源</h2>
        <div class="content">
            <p>上海杰尼机电技术有限公司（JINY）是专业从事高压清洗设备研究和开发的企业，公司拥有专业设计和服务团队，从2005年开始就为中国市场提供高压水清洗应用方案，十年如一日的努力探索，成功开发多种适合中国市场的系列高压清洗机，并为客户量身定制多种高压水清洗设备。</p>
            <p>公司主要产品有:高压清洗机，高压柱塞泵、高压热水清洗机、试压泵机组、高压旋转喷头、管道疏通系统、高压水射流设备附件与维修服务。</p>
            <p>上海杰尼拥有一个有多年经验的专业化技术研发团队，为公司蓬勃发展提供源源不断的创新力。今年公司还与上海华东理工大学机械学院合作，引入先进的自动化理念，不断改进并创新产品，努力为国内客户提供更安全，更实用，更易操作的高压清洗产品。</p>
        </div>
    </div>
    <div class="row hidden-xs">
        <h2 id="joinus">加入我们</h2>
        <div class="content">
            <p>上海杰尼机电技术有限公司（JINY）是专业从事高压清洗设备研究和开发的企业，公司拥有专业设计和服务团队，从2005年开始就为中国市场提供高压水清洗应用方案，十年如一日的努力探索，成功开发多种适合中国市场的系列高压清洗机，并为客户量身定制多种高压水清洗设备。</p>
            <p>公司主要产品有:高压清洗机，高压柱塞泵、高压热水清洗机、试压泵机组、高压旋转喷头、管道疏通系统、高压水射流设备附件与维修服务。</p>
            <p>上海杰尼拥有一个有多年经验的专业化技术研发团队，为公司蓬勃发展提供源源不断的创新力。今年公司还与上海华东理工大学机械学院合作，引入先进的自动化理念，不断改进并创新产品，努力为国内客户提供更安全，更实用，更易操作的高压清洗产品。</p>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$().ready(function(){
    $('.navbar-nav li a').on('touchend', function(){
        var id = $(this).attr('href').replace('#','');
        $('.culture .row').addClass('hidden-xs');
        $('#'+id).parents('.row').removeClass('hidden-xs');
        $('.navbar-nav li').removeClass('active');
        $(this).parents('li').addClass('active');
        return false;
    })
})
</script>
@endsection
