@extends('wap.template.theme2.layouts.main')
@section('after.css')
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/mmenu.all.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/ssc.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/theme2/css/member.css') }}">
@endsection
@section('before.js')
    <script type="text/javascript" src="{{ asset('/wap/js/mmenu.all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/member.js') }}"></script>
@endsection
@section('content')
    <div class="container-fluid gm_main">
        <div class="head">
            <a class="f_l" href="#u_nav"><img src="{{ asset('/wap/images/user_menu.png') }}" alt=""></a>
            <span>在线充值</span>
            <a class="f_r" href="#type"><img src="{{ asset('/wap/images/user_game.png') }}" alt=""></a>
        </div>
        @include('wap.template.theme2.layouts.aside')
        <div id="type" style="display: none">
            <ul class="g_type">
                <li>
                    @include('wap.template.theme2.layouts.aside_game_list')
                </li>
            </ul>
        </div>
        <img src="{{ asset('/wap/images/pay_online_bg.jpg') }}" alt="" style="max-width: 100%;margin-top: 8px;">
        <div class="wrap">
            @if($_system_config->is_thirdpay_on == 0)
            <div align="center" class="pay-style">
                <!-- 网银支付-->
                <a href="{{ route('wap.third_bank_pay') }}">
                    <img src="{{ asset('/wap/images/m_unipay.png') }}" class="pic"/>
                    <div class="text">第三方支付</div>
                </a>
            </div>
            @endif
            @if($_system_config->is_wechat_on == 0)
            <div align="center" style="padding-bottom:15px">
                <!-- 微信转账-->
                <a href="{{ route('wap.weixin_pay') }}">
                    <img src="{{ asset('/wap/images/weixin.jpg') }}" width="100%" height="auto"/>
                </a>
            </div>
                @endif
                @if($_system_config->is_alipay_on == 0)
            <div align="center" style="padding-bottom:15px">
                <!-- 支付宝转账-->
                <a href="{{ route('wap.ali_pay') }}">
                    <img src="{{ asset('/wap/images/alipay.jpg') }}" width="100%" height="auto"/>
                </a>
            </div>
                @endif
				@if($_system_config->is_qq_on == 0)
                        <div align="center" class="pay-style">
                            <!-- 支付宝转账-->
                            <a href="{{ route('wap.qq_pay') }}">
                                <img src="{{ asset('/wap/images/m_qqpay.png') }}" class="pic"/>
                                <div class="text">QQ转账</div>
                            </a>
                        </div>
                    @endif
                @if($_system_config->is_bankpay_on == 0)
            <div align="center">
                <!-- 银行卡转账-->
                <a href="{{ route('wap.bank_pay') }}">
                    <img src="{{ asset('/wap/images/gs1.jpg') }}" width="100%" height="auto"/>
                </a>
            </div>
                    @endif
        </div>
    </div>
@endsection