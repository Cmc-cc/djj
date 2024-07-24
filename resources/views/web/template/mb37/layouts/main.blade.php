<!DOCTYPE html>
<html>
<head>
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/normalize.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom-modal.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb37/css/site.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb37/css/BIstyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb37/css/lb.css') }}" rel="stylesheet" />

    <!--[if lte IE 9]>
    <script src="{{ asset('web/mb36/js/placeholders.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/html5shiv.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/mb37/js/float.js') }}"></script>
    <script src="{{ asset('web/mb36/js/qrcode.min.js') }}"></script>
    <script src="{{ asset('web/mb37/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb37/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb37/js/webMain.js') }}"></script>
    <script src="{{ asset('web/mb37/js/lb.js') }}"></script>


    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/js/index1.js') }}"></script>
    <script src="{{ asset('/web/layer/layer.js') }}"></script>
    <script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
</head>

<body class="layout" style="overflow-x: hidden">
@include('web.template.mb37.layouts.header')
@yield('content')
@include('web.template.mb37.layouts.aside')
@include('web.template.mb37.layouts.footer')
@yield('after.js')

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
<input type="hidden" id="userNameController" minmoney="@systemseting["minmoney"]" maxmoney="@systemseting["maxmoney"]" value="@ViewBag.UserName" title="@systemseting["title"]" kfLink="@systemseting["kf_link"]" kfPhone="@systemseting["kf_phone"]" kfQQ="@systemseting["kf_qq"]" kfWX="@systemseting["kf_wx"]" downAndroid="@systemseting["down_android"]" downIos="@systemseting["down_ios"]" systemRepair="@systemseting["system_repair"]" systemRepairtent="@systemseting["system_repairtent"]" />

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
    // getMaintain();
    getGamePlate(1, "");
    //biCommon.getKeFu();
    // downURL("android","@systemseting["down_android"]");
    // downURL("ios", "@systemseting["down_ios"]");
    getTitle();
    getNotice($("#hot-news marquee"));
    // biCommon.getUserMoneys();
    // getUserMoney();
    $(function () {
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 463) {
                $(".header-bottom").addClass("ScrollTop");
                $(".header-bottom").removeClass("homepage");
            } else {
                $(".header-bottom").addClass("homepage");
                $(".header-bottom").removeClass("ScrollTop");
            }
        });
        $(".service-right").Float();
        $(".service-left").Float();
    })
</script>

<script>
    window.onload = function () {
        // 轮播选项
        const options = {
            id: 'lb-1',              // 轮播盒ID
            speed: 600,              // 轮播速度(ms)
            delay: 1500,             // 轮播延迟(ms)
            direction: 'left',       // 图片滑动方向
            moniterKeyEvent: true,   // 是否监听键盘事件
            moniterTouchEvent: true  // 是否监听屏幕滑动事件
        }
        const lb = new Lb(options);
        lb.start();
    }
</script>
