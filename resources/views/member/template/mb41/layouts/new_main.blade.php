<html>
<head>
    <title>{{ $_system_config -> site_title }}</title>
    <meta name="keywords" content="{{ $_system_config->keyword  or 'motoo' }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/normalize.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom-modal.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/font-awesome.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('web/mb41/css/site.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb41/css/BIstyle.css') }}" rel="stylesheet" />

    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/qrcode.min.js') }}"></script>

    <script src="{{ asset('web/mb41/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb41/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb41/js/webMain.js') }}"></script>
<!--[if lte IE 9]>
    <script src="{{ asset('web/mb36/js/placeholders.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/html5shiv.js') }}"></script>
    <![endif]-->

    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/js/index1.js') }}"></script>
    <script src="{{ asset('/web/layer/layer.js') }}"></script>
    <script src="{{ asset('/web/js/ajax-submit-form-mb41.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/mystyle.css') }}">

    <script src="{{ asset('/web/js/one.js') }}"></script>
    <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
    <script src="{{ asset('/web/js/jq.page.js') }}"></script>
    <script src="{{ asset('/web/js/weihuan_mb41.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
</head>
<script>
    $(function () {
        $("#header").addClass("ScrollTop");
        $("#header-account").addClass("ScrollTop");
    })
</script>
<body class="layout ng-scope">
@include('web.template.mb41.layouts.header')
<div id="banner" style="margin-top: 189px"></div>
<div class="member-container" style="background-color: #241d17">
    @yield('content')
</div>
@include('web.template.mb41.layouts.footer')
@yield('after.js')
<script>


    (function ($) {
        $(function () {

            //公告
            $('#mar0').on('click', function () {
                var notice_index = layer.open({
                    offset: ['40%'],
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
<input type="hidden" id="userNameController" minmoney="@systemseting["minmoney"]" maxmoney="@systemseting["maxmoney"]" value="@ViewBag.UserName" title="@systemseting["title"]" kfLink="@systemseting["kf_link"]" kfPhone="@systemseting["kf_phone"]" kfQQ="@systemseting["kf_qq"]" kfWX="@systemseting["kf_wx"]" downAndroid="@systemseting["down_android"]" downIos="@systemseting["down_ios"]" systemRepair="@systemseting["system_repair"]" systemRepairtent="@systemseting["system_repairtent"]" />

</body>
</html>

<script>

    //getMaintain();
    //getGamePlate(1, "");
    //biCommon.getKeFu();
    //downURL("android","@systemseting["down_android"]");
    //downURL("ios", "@systemseting["down_ios"]");
    //getTitle();
    //getNotice($("#hot-news marquee"));
    //biCommon.getUserMoneys();
    //getUserMoney();
    function Alert(){

        layer.open({
            offset: ['30%', '40%'],
            title: '信息'
            ,content: '您好！请登录后在点我进入游戏哦!'
        });
    };
    $(function () {
        @if ($web_route == 'web.index')

        $(window).scroll(function () { //开始监听滚动条
            var topp = $(document).scrollTop();
            if (topp > 40) {
                $("#header").addClass("ScrollTop");
                $("#header-account").addClass("ScrollTop");
            } else {
                $("#header").removeClass("ScrollTop");
                $("#header-account").removeClass("ScrollTop");
            }
        })
        @endif
    })
</script>
