    <header class="hidden-xs">
        <div class="container">
            <div class="row">
                <div class="text-right language">
                    <span class="active">中文</span>
                    {{-- <span class="divider">|</span>
                    <a href="http://www.jiny.cn/en/">English</a> --}}
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/logo.png')}}" height="74"/>
                    <div class="pull-right icon-contactus"><img src="{{asset('images/icon-contactus.png')}}" height="47" /></div></div>
        </div>
    </header>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="/">
                <img src="{{asset('images/logo.png')}}" height="74"/>
            </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          @if( url()->current() == url('/') )
          <a class="navbar-brand" href="#" >产品中心</a>
          @else
          <a class="navbar-brand" href="#" id="items-button">产品中心</a>
          @endif
        </div>
        <div class="collapse navbar-collapse" id="menu">
          <ul class="nav navbar-nav">
            <li><a href="/">首页</a></li>
            <li class="hidden-md hidden-lg" id="subItemsMenu">
                <a href="#">产品中心</a>
                    <ul class="hidden hidden-md hidden-lg">
                        @foreach ( session('categories') as $category)
                        <li><a href="{{route('items',$category->id)}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
            </li>
            <li><a href="/culture">关于我们</a></li>
            <li><a href="/solutions">解决方案</a></li>
            <li><a href="/supports">技术支持</a></li>
            <li><a href="/news">新闻资讯</a></li>
            <li><a href="/contactus">联系我们</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
        <div class=" hidden-xs hidden-sm hidden" id="items-menu">
            <ul class="list-group">
                @foreach ( session('categories') as $category)
                <li class="list-group-item"><a href="{{route('items',$category->id)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
      </div><!-- /.container-fluid -->
    </nav>
