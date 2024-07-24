<!DOCTYPE html>
<html  id="ng-app" ng-app="portalApp" meidon-time="2018"  moment-lang="zh-CN"  ng-init="'{{ $_system_config->site_title or 'motoo' }}'">
<head>
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="/favicon.ico" />

    <link href="{{asset('web/mb22/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('web/mb22/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/mb22/css/common.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/web/mb16/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/web/css/vendor.css') }}">--}}
    <script src="{{asset('web/js/jquery-2.1.3.min.js')}}"></script>

    <script src="{{asset('web/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <script src="{{asset('web/mb22/js/wow.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('/web/css/one.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/mystyle.css') }}">

    <script src="{{ asset('/web/js/one.js') }}"></script>
    <script src="{{ asset('/web/layui/layui.all.js') }}"></script>
    <script src="{{ asset('/web/js/jq.page.js') }}"></script>
    <script src="{{ asset('/web/js/weihuan.js') }}"></script>
    <link href="/web/mb27/css/site.css" rel="stylesheet"/>

    <script src="/web/mb23/js/jquery.min.js"></script>

    <script src="/web/mb23/js/jquery.marquee.min.js"></script>

    <script src="/web/mb23/js/jquery-ui.min.js"></script>

    <script src="/web/mb23/bundles/common.js?v=HNgwom0Dzrx_ZWnmf34LgV_TQUJqznH90A6VSugf2eM1"></script>

    <script src="/web/mb23/js/angular.min.js"></script>

    <script src="/web/mb23/js/moment-with-locales.min.js"></script>

    <script src="/web/mb23/js/moment-timezone-with-data.min.js"></script>

    <script src="/web/mb23/js/jquery.signalR-2.2.0.min.js"></script>



    <!--[if lte IE 9]>
    <script src="/web/mb23/js/placeholders.min.js"></script>
    <script src="/web/mb23/js/html5shiv.js"></script>
    <![endif]-->

</head>
<body class="layout" ng-controller="LayoutCtrl">

@include('web.template.mb27.layouts.header')

<div id="banner"></div>
@yield('content')
@include('web.template.mb27.layouts.aside')
<script src="{{asset('web/mb22/js/common.js')}}"></script>
@include('web.template.mb27.layouts.footer')
<script src="https://cdn.igsttech.com/Web.Portal/_Common/Scripts/angular-animate/v1.2.14/angular-animate.min.js"></script>

<script src="/web/mb23/js/ui-bootstrap-custom-tpls-0.10.0.min.js"></script>

<script src="/web/mb23/Scripts/_site.js"></script>
<script src="/web/mb23/bundles/environment.js?v=Sre_8bGZaXimeK2YCmr6RnY-uXP9_R8xIoUe5rN9spE1"></script>

<script src="/web/mb23/Scripts/_config.js?version=20180117"></script>
<script src="/web/mb23/Scripts/i18n/labels_zh-CN.js"></script>
<script src="/web/mb23/js/angular-services.js?v=xyS-EheotkV8v-wdjby6bg-IWjEt_QrwXtAziZJAbBg1"></script>

<script src="/web/mb23/js/angular-controllers.js?v=GjlNbpztu87jUS-Hv4d-WGODPxxT3eeYi2dzmiOKFXc1"></script>

<script src="/web/mb23/js/angular-directives.js?v=agA_5MsASKuCuZnnudjzArmMB0Hg9A0aIc_PlABHIFY1"></script>

<script src="/web/mb23/js/angular-filters.js?v=MeeQJovOHWNSkHRSyl6Jkj407IAV6G2P3C98wCBb83I1"></script>

<script src="/web/mb23/bundles/portal-shared.js?v=1Qym7_7BFPaXQLvJzrHwUYSZT9__RyZpz431AkFTpQQ1"></script>



<script src="/web/mb23/js/common.min.js"></script>
<script src="/web/mb23/js/jquery.cycle2.js"></script>

<script src="{{ asset('/web/js/jq.page.js') }}"></script>
<script src="/web/mb23/Scripts/each-site/wow.js"></script>
<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
            }
        }
    );
    wow.init();
    jQuery(".winner").slide({ mainCell: "ul", autoPlay: true, effect: "topMarquee", vis: 6, interTime: 70, trigger: "click" });
</script>


<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/mb16/js/yk_modal.js') }}"></script>
@yield('after.js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('after.js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function AddFavorite(sURL, sTitle) {
        try {
            window.external.addFavorite(sURL, sTitle);
        } catch (e) {
            try {
                window.sidebar.addPanel(sTitle, sURL, "");
            } catch (e) {
                alert("加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    }
    function Alert(){

        layer.alert('您好！请登录后在点我进入游戏哦!',{icon:7});
    };

</script>

</body>
</html>