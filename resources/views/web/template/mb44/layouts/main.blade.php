<!DOCTYPE html>
<head>
    <title>{{ $_system_config -> site_title }}</title>
    <meta name="keywords" content="{{ $_system_config->keyword  or 'motoo' }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/swiper.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('web/mb36/js/swiper.min.js') }}"></script>
    <link href="{{ asset('web/mb36/css/normalize.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/custom-modal.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb44/css/site.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb44/css/BIstyle.css') }}" rel="stylesheet" />
    <!--[if lte IE 9]>
    <script src="{{ asset('web/mb36/js/placeholders.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/html5shiv.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/mb44/js/biconfig.js') }}"></script>
    <script src="{{ asset('web/mb44/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb44/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb44/js/webMain.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('/web/css/qqq5595.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/js/index1.js') }}"></script>
    <script src="{{ asset('/web/layer/layer.js') }}"></script>
    <script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
</head>
<body class="layout ng-scope">
@include('web.template.mb44.layouts.header')

@yield('content')

@include('web.template.mb44.layouts.footer')

@include('web.template.mb44.layouts.aside')
@yield('after.js')

<input type="hidden" id="userNameController" minmoney="@systemseting["minmoney"]" maxmoney="@systemseting["maxmoney"]" value="@ViewBag.UserName" title="@systemseting["title"]" kfLink="@systemseting["kf_link"]" kfPhone="@systemseting["kf_phone"]" kfQQ="@systemseting["kf_qq"]" kfWX="@systemseting["kf_wx"]" downAndroid="@systemseting["down_android"]" downIos="@systemseting["down_ios"]" systemRepair="@systemseting["system_repair"]" systemRepairtent="@systemseting["system_repairtent"]" />

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
    // getMaintain();
    // getGamePlate(1, "");
    //biCommon.getKeFu();
    // downURL("android", "@systemseting["down_android"]");
    // downURL("ios","@systemseting["down_ios"]");
    getTitle();
    // getNotice($("#hot-news marquee"));
    // biCommon.getUserMoneys();
    // getUserMoney();
    $(function () {
        $(".service-right").hover(function () {
            $(".service-right").addClass("show");
        }, function () {
            $(".service-right").removeClass("show");
        });
    })
    $("#slide-banner").show();
    swiperLayout(".swiper-containerlayou", 1, 0, 1, 3500, true, 'horizontal', '.swiper-button-next', '.swiper-button-prev');
    /*if ($("#indexPage").val() == "index") {
        $("#slide-banner").show();
        swiperLayout(".swiper-containerlayou", 1, 0, 1, 3500, true, 'horizontal', '.swiper-button-next', '.swiper-button-prev');
    }*/
</script>
