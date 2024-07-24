<!DOCTYPE html>
<html id="ng-app"  meidon-time="2018/10/29 05:48:34" moment-lang="zh-CN">
<head>
    <title >{{ $_system_config -> site_title }}</title>
    <meta name="keywords" content="{{ $_system_config->keyword  or 'motoo' }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.theme.min.css') }}" rel="stylesheet" />


    <link href="{{ asset('web/mb36/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom-modal.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb40/css/site.css') }}" rel="stylesheet" />

    <link href="{{ asset('web/mb40/css/BIstyle.css') }}" rel="stylesheet" />
    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('web/mb40/js/biconfig.js') }}"></script>
    <script src="{{ asset('web/mb40/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb40/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb40/js/webMain.js') }}"></script>


    <link href="{{ asset('web/mb36/css/font-awesome.min.css') }}" rel="stylesheet" />


    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/js/index1.js') }}"></script>
    <script src="{{ asset('/web/layer/layer.js') }}"></script>
    <script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
{{--    <script src="~/Areas/Web6/Scripts/qrcode.min.js?v=@ViewBag.timeStamp"></script>--}}
{{--    <script src="~/Areas/Web6/Scripts/float.js?v=@ViewBag.timeStamp"></script>--}}
</head>
<body class="layout">
@include('web.template.mb40.layouts.header')
@yield('content')
@include('web.template.mb40.layouts.aside')
@include('web.template.mb40.layouts.footer')

@yield('after.js')
<div id="service-luckywheel" class="open-luckywheel" open-luckywheel></div>
<div id="marquee-wrapper" >
    <aside id="marquee">
        <header>
            <h2>公告</h2>
        </header>
        <ul id="newsBags">
            <li></li>
        </ul>
        <footer>
            <span >关闭</span>
        </footer>
    </aside>
</div>
<div id="popup-dialog" popup-dialog ng-cloak></div>
<div id="announcement-dialog" announcement-dialog></div>

<div style="display:none"></div>
<div class="notice_layer">
    <h3>公告详情 <span class="close"></span></h3>
    <div class="notice_con">
        @foreach($_system_notices as $v)
            <div class="module">
                <h4>{{ $v->title }}</h4>
                <p>✿{{ $v->content }}</p>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
<script>


    (function ($) {
        $(function () {

            //公告
            $('#mar0').on('click', function () {
                var notice_index = layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    area: ['680px'],
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: $('.notice_layer')
                });

                $('.notice_layer').on('click', '.close', function () {
                    layer.close(notice_index)
                })
            })

        })
    })(jQuery)
</script>
<script>
    function Alert(){

        layer.alert('您好！请登录后在点我进入游戏哦!',{icon:7});
    };
    //getMaintain();
    navtitle();
    //getGamePlate(1, "");
    //getNotice($("#hot-news marquee"));
    //biCommon.getUserMoneys();
    //biCommon.getKeFu();
    //downURL("android","@systemseting["down_android"]");
    //downURL("ios", "@systemseting["down_ios"]");
    getTitle();
    //getUserMoney();
    $(function () {
        // $(".service-right").Float();
        $(".services").hover(function () {
            $(".service-right").addClass("active");

        }, function () {
            $(".service-right").removeClass("active");
        });


        //$(".service-left").Float();
    });
</script>


