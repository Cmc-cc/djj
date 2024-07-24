<!DOCTYPE html>
<html id="ng-app" meidon-time="2018/10/24 01:37:13" moment-lang="zh-CN">
<head>
    <title>{{ $_system_config -> site_title }}</title>
    <meta name="keywords" content="{{ $_system_config->keyword  or 'motoo' }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom-modal.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/normalize.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('web/mb42/css/site.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb42/css/BIstyle.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/font-awesome.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('web/mb36/js/swiper.min.js') }}"></script>

    <script src="{{ asset('web/mb42/js/jquery.waterwheelCarousel.min.js') }}"></script>
    <script src="{{ asset('web/mb42/js/biconfig.js') }}"></script>
    <script src="{{ asset('web/mb42/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb42/js/webMain.js') }}"></script>
    <script src="{{ asset('web/mb42/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb36/js/qrcode.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/js/index1.js') }}"></script>
    <script src="{{ asset('/web/layer/layer.js') }}"></script>
    <script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/mystyle.css') }}">

    <script src="{{ asset('/web/js/one.js') }}"></script>
    <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
    <script src="{{ asset('/web/js/jq.page.js') }}"></script>
    <script src="{{ asset('/web/js/weihuan.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
</head>
<body class="layout">
@include('web.template.mb42.layouts.header')

<div id="banner"></div>
<div class="member-container" style="background-color: #241d17">
    @yield('content')
</div>



@include('web.template.mb42.layouts.footer')

@include('web.template.mb42.layouts.aside')
@yield('after.js')
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
    // getGamePlate(1, "");
    // getNotice($("#hot-news marquee"));
    // biCommon.getUserMoneys();
    //biCommon.getKeFu();
    // downURL("android","@systemseting["down_android"]");
    // downURL("ios", "@systemseting["down_ios"]");
    getTitle();
    // getUserMoney();
    $(function () {
        //$(".service-right").Float();
        //$(".service-left").Float();
    });
</script>



