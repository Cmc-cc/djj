
<!DOCTYPE html>
<html  id="ng-app" ng-app="portalApp" meidon-time="2018"  moment-lang="zh-CN"  ng-init="'{{ $_system_config->site_title or 'motoo' }}'">
<head>
    <title>{{ $_system_config->site_title or 'motoo' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="/favicon.ico" />

    <link href="/web/mb31/css/site.css" rel="stylesheet"/>
    @if($web_route == 'web.index')  <link href="/web/mb30/bundles/home.css?v=Z0I1MnqVfQ2Gxw7Nrs0FZ-E7HyV84bcUupfFjChrVWE1" rel="stylesheet"/> @else  @endif

    <link href="{{asset('web/mb22/css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('web/mb22/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('web/mb22/css/common.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/web/mb16/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/vendor.css') }}">

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
    <style>
        .list-group{
            display: block;
        }
    </style>
</head>
<body class="layout" ng-controller="LayoutCtrl">

@include('web.template.mb31.layouts.header')

<div id="banner"></div>
<div class="member-container" style="background-color: #241d17">
    <div class="member-body">
        <div id="layout-top-area">
            <div class="sider-area"><span>会员中心</span></div>
            <ul class="nav-area">
                <li @if(in_array($web_route, ['member.userCenter', 'member.login_psw'])) class="active" @endif>
                    <a href="{{ route('member.userCenter') }}" data-menu="member"><span>会员资料</span></a>
                </li>
                <li @if(in_array($web_route, ['member.finance_center', 'member.ali_pay', 'member.qq_pay', 'member.bank_pay'])) class="active" @endif>
                    <a href="{{ route('member.finance_center') }}" data-menu="recharge"><span>在线存款</span></a></li>
                <li @if(in_array($web_route, ['member.member_drawing'])) class="active" @endif>
                    <a href="{{ route('member.member_drawing') }}" data-menu="draw"><span>在线取款</span></a></li>
                <li @if(in_array($web_route, ['member.indoor_transfer'])) class="active" @endif>
                    <a href="{{ route('member.indoor_transfer') }}" data-menu="exchange"><span>接口余额</span></a></li>
                <li @if(in_array($web_route, ['member.customer_report']) && request()->get('type') == 3) class="active" @endif>
                    <a href="{{ route('member.customer_report',['type'=>3]) }}" data-menu="bet"><span>注单查询</span></a></li>
                <li @if(in_array($web_route, ['member.customer_report']) && request()->get('type') != 3) class="active" @endif>
                    <a href="{{ route('member.customer_report') }}" data-menu="money"><span>资金流水</span></a></li>
                <li @if(in_array($web_route, ['member.service_center', 'member.complaint_proposal', 'member.message_list'])) class="active" @endif>
                    <a href="{{ route('member.service_center') }}" data-menu="message"><span>服务中心</span></a></li>
            </ul>
        </div>
        @yield('content')
    </div>
</div>
@include('web.template.mb31.layouts.aside')

@include('web.template.mb31.layouts.footer')
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


<script src="{{ asset('/web/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('/web/js/index1.js') }}"></script>
<script src="{{ asset('/web/js/yk_modal.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/js/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('/web/js/jquery.fly.min.js') }}"></script>
<script src="{{ asset('/web/js/common.js') }}"></script>
<script src="{{ asset('/web/js/jquery.page.js') }}"></script><!--翻页-->
<script src="{{ asset('/web/My97DatePicker/WdatePicker.js') }}"></script><!--起止时间日历
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
<style>
    .list-group{
        display: block;
    }
</style>
</body>
</html>