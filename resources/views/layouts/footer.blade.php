<footer>
    <div class="container">
        <div class="col-md-4 col-lg-4">
            <div class="part1">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img src="{{asset('images/icon-phone.png')}}" height="49"  />
                        </a>
                    </div>
                    <div class="media-body">
                        <p>热线电话</p>
                        <h4 class="media-heading">400-8833-700</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="part2">
                <p>电话：021-5486 8522</p>
                <p>传真：021-5486 8661</p>
                <p>Email：sales@xianlicleaning.com</p>
                <p>地址：上海市闵行区景谷路398-2号</p>
                <p>邮编：200245</p>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 hidden-xs">
            <div class="part3">
                <p>官方微信</p>
                <img src="{{asset('images/icon-wechat.jpg')}}" />
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>Copyright &copy;2006-{{ date('Y') }} {{ env('APP_NAME') }} All rights resevered.</p>
        <p><a href="https://beian.miit.gov.cn">沪ICP备2020027782号-1</a></p>
    </div>
</footer>
