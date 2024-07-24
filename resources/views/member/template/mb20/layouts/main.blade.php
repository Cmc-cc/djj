<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('/web/fonts/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb20/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb20/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/member.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/mb20/css/index1.css') }}">

    <script src="{{ asset('/web/js/jquery-2.1.3.min.js') }}"></script>
</head>
<body>

@include('web.template.mb20.layouts.header')

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
@include('web.template.mb20.layouts.aside')
@include('web.template.mb20.layouts.footer')

<script src="{{ asset('/web/mb20/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('/web/mb20/js/index1.js') }}"></script>
<script src="{{ asset('/web/mb20/js/common.js') }}"></script>
<script src="{{ asset('/web/mb20/js/yk_modal.js') }}"></script>
<script src="{{ asset('/web/mb20/js/jquery.SuperSlide.2.1.1.js') }}"></script>
<script src="{{ asset('/web/layer/layer.js') }}"></script>
<script src="{{ asset('/web/mb20/js/ajax-submit-form.js') }}"></script>
<script src="{{ asset('/web/mb20/js/rendezvous.js') }}"></script><!--日历-->
<script src="{{ asset('/web/mb20/js/jquery.page.js') }}"></script><!--翻页-->
<script src="{{ asset('/web/My97DatePicker/WdatePicker.js') }}"></script><!--起止时间日历 My97DatePicker-->
@yield('after.js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
</script>
</body>
</html>