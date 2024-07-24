<!DOCTYPE html>
<html>
<head>
    <title class="jsx-3526929741 next-head">{{ $_system_config -> site_title }}</title>
    <meta charset="utf-8" class="jsx-3526929741 next-head">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" class="jsx-3526929741 next-head">
    <meta name="viewport" content="width=device-width, initial-scale=0,user-scalable=yes,maximum-scale=1.0" class="jsx-3526929741 next-head">
    <meta name="description" content="{{ $_system_config -> site_title }}" class="jsx-3526929741 next-head">
    <meta name="Keywords" content="{{ $_system_config->keyword  or 'motoo' }}" class="jsx-3526929741 next-head">
    <link href="{{ asset('web/mb36/css/swiper.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('web/mb45/css/antd.min.css') }}" class="jsx-3526929741 next-head">
    <link href="{{ asset('web/mb45/css/iconfont.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('web/mb45/css/style.css') }}">
    <link href="{{ asset('web/mb45/css/BIstyle.css') }}" rel="stylesheet" />

    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>
    {{--    <script src="~/Areas/Web13/Scripts/qrcode.min.js"></script>--}}
    <script src="{{ asset('web/mb45/js/biconfig.js') }}"></script>
    <script src="{{ asset('web/mb45/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb45/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb45/js/publicJS.js') }}"></script>
    <script src="{{ asset('web/mb45/js/webMain.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">--}}
    {{--        <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">--}}
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

<body style="">
<div id="__next">
    <div>
        @include('web.template.mb45.layouts.header')
        <div id="banner" style="margin-top: 98px"></div>
        <div class="member-container" style="background-color: #241d17">
            @yield('content')
        </div>
        @include('web.template.mb45.layouts.footer')

    </div>
</div>
@include('web.template.mb45.layouts.aside')
@yield('after.js')
<!--消息弹框-->

<style>
</style>
<div id="marquee-wrapper" class="hide">
    <aside id="marquee">
        <header>
            <h2>消息详情</h2>
        </header>
        <ul id="newsBags"></ul>
        <footer>
            <span onclick="closeMessageDioag()">关闭</span>
        </footer>
    </aside>
</div>

<input type="hidden" id="userNameController" minmoney="@systemseting["minmoney"]" maxmoney="@systemseting["maxmoney"]" value="@ViewBag.UserName" kfLink="@systemseting["kf_link"]" kfPhone="@systemseting["kf_phone"]" kfQQ="@systemseting["kf_qq"]" kfWX="@systemseting["kf_wx"]" downAndroid="@systemseting["down_android"]" downIos="@systemseting["down_ios"]" systemRepair="@systemseting["system_repair"]" systemRepairtent="@systemseting["system_repairtent"]" title="@systemseting["title"]" />

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
    timerID = setInterval("dispTime()", 1000);
    // getMaintain();
    navtitle();
    getGamePlate(1, "");
    // downURL("android","@systemseting["down_android"]");
    // downURL("ios", "@systemseting["down_ios"]");
    getTitle();
    biCommon.getUserMoneys();
    getUserMoney();
    whetherOpenSMS();
    judgeOldAndNew();//老带新判断
    function goTop() {
        document.body.scrollTop = document.documentElement.scrollTop = 0;
    }
</script>
