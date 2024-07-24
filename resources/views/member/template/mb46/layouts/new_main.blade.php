<!DOCTYPE html>
<html>
<head>
    <title>{{ $_system_config -> site_title }}</title>
    <meta name="keywords" content="{{ $_system_config->keyword  or 'motoo' }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.theme.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb46/css/publicMain.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb46/css/BIstyle.css') }}" rel="stylesheet" />

    <link href="{{ asset('web/mb46/css/app.v235.css') }}" rel="stylesheet" />
<!--[if lte IE 9]>
    <script src="{{ asset('web/mb36/js/placeholders.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/html5shiv.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/swiper.min.js') }}"></script>
    <script src="{{ asset('web/mb46/js/biconfig.js') }}"></script>
    <script src="{{ asset('web/mb46/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb46/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb46/js/publicJS.js') }}"></script>
    <script src="{{ asset('web/mb46/js/webMain.js') }}"></script>

    <script src="{{ asset('web/mb46/js/commconfig.js') }}"></script>

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
    <style>
        .box img, .box p{
            width: auto;
        }
        .box img{
            display: inline-block;
            height: auto;
        }
    </style>
</head>

<body>
<div data-v-4329dbaa="" id="app">
    <div data-v-4329dbaa="" class="app">
        <div data-v-b09f0a36="" data-v-4329dbaa="" id="index">
            <div data-v-c108e8f8="" data-v-b09f0a36="">
                @include('web.template.mb46.layouts.hearder')
            </div>
            {{-- <div data-v-8c401528="" data-v-b09f0a36="">
                 <div data-v-1a5cd18f="" data-v-8c401528="" id="sidebar">
                     <aside data-v-1a5cd18f="">
                         <li data-v-1a5cd18f="" data-wow-delay="0.2s" onclick="pageScroll()">
                             <i data-v-1a5cd18f=""><img data-v-1a5cd18f="" src="~/Areas/Web14/Content/images/returntop.png" alt=""></i>
                             <p data-v-1a5cd18f="">返回顶部</p>
                         </li>
                         <li data-v-1a5cd18f="" data-wow-delay="0.4s" class="asideQQ" onclick="openKuFu(this,2);" urls="@systemseting["kf_qq"]">
                         <i data-v-1a5cd18f="">
                             <img data-v-1a5cd18f="" src="~/Areas/Web14/Content/images/QQ.png" alt="">
                         </i>
                         <p data-v-1a5cd18f="">@systemseting["kf_qq"]</p>
                         </li>
                         <li data-v-1a5cd18f="" data-wow-delay="0.6s" class="asideSkype" onclick="openKuFu(this,1);" urls="@systemseting["kf_link"]">
                         <i data-v-1a5cd18f=""><img data-v-1a5cd18f="" src="~/Areas/Web14/Content/images/skype.png" alt=""></i>
                         <p data-v-1a5cd18f="">在线客服</p>
                         </li>
                         <li data-v-1a5cd18f="" data-wow-delay="0.8s" class="asideWeixin" urls="@systemseting["kf_link"]">
                         <i data-v-1a5cd18f=""><img data-v-1a5cd18f="" src="~/Areas/Web14/Content/images/wx.png" alt=""></i>
                         <p data-v-1a5cd18f="">@systemseting["kf_wx"]</p>
                         </li>
                     </aside>
                 </div>
             </div>--}}
            <div id="banner"></div>
            <div class="member-container" style="background-color: #241d17">
                @yield('content')
            </div>


            @include('web.template.mb46.layouts.footer')

            @yield('after.js')
        </div>
    </div>
</div>
@include('web.template.mb46.layouts.aside')
<div data-v-0236727e="" id="alert" tabindex="0" class="box alert" style="display:none;">
    <div data-v-0236727e="" class="alerts" style="border-radius: 5px;">
            <span data-v-0236727e="" class="conx" onclick="closeMsgAlert()">
                <i data-v-0236727e="" class="iconfont icon-cuo"></i>
            </span>
        <div data-v-0236727e="" class="title"> 提示</div>
        <div data-v-0236727e="" class="center">
            <i data-v-0236727e="" class="iconfont icon-alert-circle"></i>
            <div data-v-0236727e="" id="msgContent"></div>
        </div>
        <span data-v-0236727e="" class="button" style="background: rgb(64, 158, 255);" onclick="closeMsgAlert()">确定</span>
    </div>
</div>
<!--消息弹框-->


</body>

</html>

<script>
    function Alert(){

        layer.alert('您好！请登录后在点我进入游戏哦!',{icon:7});
    };
    // navtitle();
    // biCommon.getUserMoneys();
    // getUserMoney();
    // whetherOpenSMS();//手机验证码接口
    // getMaintain();//网站维护
</script>
