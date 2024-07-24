<!DOCTYPE html>
<html>
<head>
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <meta name="keywords" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/normalize.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom-modal.css') }}" rel="stylesheet" />

    <link href="{{ asset('web/mb36/css/site.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/BIstyle.css') }}" rel="stylesheet" />

    <!--[if lte IE 9]>
    <script src="{{ asset('web/mb36/js/placeholders.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/html5shiv.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/qrcode.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/biconfig.js') }}"></script>
    <script src="{{ asset('web/mb36/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb36/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb36/js/webMain.js') }}"></script>

    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/js/index1.js') }}"></script>
    <script src="{{ asset('/web/layer/layer.js') }}"></script>
    <script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
    <style>
        .notice-row {
            height: 0;
            line-height: 0;
            position: relative;
            z-index: 1;
            width: 100%;
        }
    </style>
</head>

<body class="layout">
@include('web.template.mb36.layouts.header')
@yield('content')
@include('web.template.mb36.layouts.aside')
@include('web.template.mb36.layouts.footer')
@yield('after.js')

<input type="hidden" id="userNameController" minmoney="1" maxmoney="10000" value="" title="太阳城集团" kfLink="http:\\www.baidu.com" kfPhone="123456" kfQQ="qq10021" kfWX="wx10012" downAndroid="http:\\www.baidu.com" downIos="http:\\www.bilibili.com" systemRepair="False" systemRepairtent="网站正在恢复中！！！！！！！！！！" />
</body>

</html>
<script>
    function Alert(){

        layer.alert('您好！请登录后在点我进入游戏哦!',{icon:7});
    };
    $(function () {
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

    })
    //getMaintain();
    //navtitle();
    //获取游戏大类
    //getGamePlate(1, "");
    //getNotice($("#hot-news marquee"));
    //biCommon.getKeFu();
    //downURL("android","http:\\www.baidu.com");
    //downURL("ios", "http:\\www.bilibili.com");
    //getTitle();
    //biCommon.getUserMoneys();
    //getUserMoney();
</script>
