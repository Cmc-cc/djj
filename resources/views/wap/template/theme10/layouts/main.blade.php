<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8" />
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width" />
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">
    <link rel="stylesheet" type="text/css" href="{{ asset('wap/theme10/css/style2.css') }}" />
    <link href="{{ asset('/wap/theme10/css/vendor.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme10/css/app.css') }}" />
    <link href="{{ asset('/wap/theme10/css/bistyle.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme10/css/app2.css') }}" />
    <script type="text/javascript" src="{{ asset('/wap/theme10/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('wap/theme10/js/wapConfig.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme10/js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wap/theme10/js/core.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wap/theme10/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/theme10/js/tpl.js') }}"></script>
    <script src="{{ asset('/wap/theme10/js/bicommon.js') }}"></script>
    <script src="{{ asset('/wap/theme3/js/mobileJS.js') }}"></script>
    <script src="{{ asset('/wap/theme10/js/wapMain.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/wap/js/wap_ajax-submit-form.js') }}"></script>
    <script type="text/javascript" src="/skip.js?v=3123"></script>
</head>

<body class="common_style">

@yield('content')

<div class="layout-bottom">
    <div class="common-container money-menu more-moneylist" id="Moneymenu">

        <div>
            <a href="javascript: void (0)" onclick="@if($_member) window.location.href='{{route('wap.recharge')}}' @else notify('请先登陆！') @endif" tabindex="1" style="outline-style: none;">
            <span aria-hidden="true" class="glyphicon glyphicon-piggy-bank icon"></span>
            <p>線上存款</p>
            </a>

        </div>
        <div>
            <a href="javascript: void (0)" onclick="@if($_member) window.location.href='{{route('wap.drawing')}}' @else notify('请先登陆！') @endif" tabindex="1" style="outline-style: none;">
            <span aria-hidden="true" class="glyphicon glyphicon-new-window icon"></span>
            <p>線上取款</p>
            </a>
        </div>

    </div>
    <div class="main-menu-area navbar-nav">

        <div class="dropup more-menu" data-id="home" style="width: 20%;">

            <a href="{{ route('wap.index') }}" tabindex="1" style="outline-style: none;">

            <span aria-hidden="true" class="menu-icon fa fa-home"></span>

            <span>首頁</span>

            </a>

        </div>

        <div class="dropup more-menu" data-id="yh" style="width: 20%;">

            <a href="{{ route('wap.activity_list') }}" tabindex="1" style="outline-style: none;">

            <span aria-hidden="true" class="menu-icon glyphicon glyphicon-gift"></span>

            <span>優惠活動</span>

            </a>

        </div>

        <div class="dropup more-menu" data-id="money" style="width: 20%;">

            <a href="javascript:;" onclick="OpenOrCloseMoney()" tabindex="1" style="outline-style: none;">

                <span aria-hidden="true" class="menu-icon icon icon-uniE617"></span>

                <span>充值提現</span>
            </a>
        </div>

        <div class="dropup more-menu" data-id="exchange" style="width: 20%;">
            <a href="{{ route('wap.transfer') }}" onclick="return landingslocation();" tabindex="1" style="outline-style: none;">
            <span aria-hidden="true" class="menu-icon glyphicon glyphicon-transfer"></span>
            <span>額度轉換</span>
            </a>
        </div>

        <div class="dropup more-menu" data-id="wo" style="width: 20%;">

            <div class="menu-mask"></div>
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <span aria-hidden="true" class="menu-icon fa fa-user"></span>
                <span>我</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right diy-scrollbar" style="overflow: hidden;">

                <li style="transition-property: transform; transform-origin: 0px 0px; transform: translate(0px, 0px) translateZ(0px);">
                    <ul style="list-style:none;padding:0;margin:0;">

                        @if($_system_config->is_fs==1)
                            <li>
                                <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.user_fs')}}'; @else notify('请先登陆！') @endif">
                                <span style="padding:10px 0;margin:0;">
                                            <span aria-hidden="true" class="icon glyphicon glyphicon-calendar"></span>
                                            <span class="item-name">實时返水</span>
                                        </span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.user_fsjl')}}'; @else notify('请先登陆！') @endif">
                                <span style="padding:10px 0;margin:0;">
                                    <span aria-hidden="true" class="icon glyphicon glyphicon-calendar"></span>
                                    <span class="item-name">返水記錄</span>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.recharge_record')}}'; @else notify('请先登陆！') @endif">


                            <span style="padding:10px 0;margin:0;">
                                        <span aria-hidden="true" class="icon glyphicon glyphicon-usd"></span>
                                        <span class="item-name">充值記錄</span>
                                    </span>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.drawing_record')}}'; @else notify('请先登陆！') @endif">


                            <span style="padding:10px 0;margin:0;">
                                        <span aria-hidden="true" class="icon glyphicon glyphicon-usd"></span>
                                        <span class="item-name">提款記錄</span>
                                    </span>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.transfer_record')}}'; @else notify('请先登陆！') @endif">


                            <span style="padding:10px 0;margin:0;">
                                        <span aria-hidden="true" class="icon glyphicon glyphicon-usd"></span>
                                        <span class="item-name">轉換記錄</span>
                                    </span>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.game_record')}}'; @else notify('请先登陆！') @endif">

                            <span style="padding:10px 0;margin:0;">

                                        <span aria-hidden="true" class="icon glyphicon glyphicon-list-alt"></span>
                                        <span class="item-name">遊戲記錄</span>
                                    </span>

                            </a>
                        </li>

                        <li id="mailbox">
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.msg')}}'; @else notify('请先登陆！'); @endif">

                            <span style="padding:10px 0;margin:0;">
                                        <b></b>
                                        <span aria-hidden="true" class="icon glyphicon glyphicon-envelope"></span>
                                        <span class="item-name">消息中心</span>
                                    </span>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.agent')}}' @else notify('请先登陆！') @endif">
                            <span style="padding:10px 0;margin:0;">
                                        <span aria-hidden="true" class="icon fa fa-users glyphicon-partner"></span>
                                        <span class="item-name">代理中心</span>
                                    </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.reset_password')}}' @else notify('请先登陆！') @endif">

                            <span style="padding:10px 0;margin:0;">
                                        <span aria-hidden="true" class="icon glyphicon glyphicon-lock"></span>
                                        <span class="item-name">修改密碼</span>
                                    </span>

                            </a>
                        </li>
                        <li>
                            <a href="javascript:void (0)" onclick="@if($_member) window.location.href='{{route('wap.userinfo')}}' @else notify('请先登陆！') @endif">

                            <span style="padding:10px 0;margin:0;">
                                        <span aria-hidden="true" class="icon iconfont icon-huiyuan"></span>
                                        <span class="item-name">會員中心</span>
                                    </span>

                            </a>
                        </li>
                        <li>
                            <a href="{{ $_system_config -> service_link }}">

                            <span style="padding:10px 0;margin:0;">
                                        <span aria-hidden="true" class="icon icon-uniE615"></span>
                                        <span class="item-name">線上客服</span>
                                    </span>

                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="wechat()">

                                <span style="padding:10px 0;margin:0;">
                                    <img src="/wap/images/wechat.png" style="width: 32px;height: 32px;min-height: 32px;">
                                    <span class="item-name">微信</span>
                                </span>

                            </a>
                        </li>
                        <li>
                            <!--<a href="#" onclick="tapCopy('url_whats')" data-clipboard-target="#url">-->
                            <a href="#" onclick="whats()">

                                <span style="padding:10px 0;margin:0;">
                                        <img src="/wap/images/whatsapp.png" style="width: 32px;height: 32px;min-height: 32px;">
                                        <span class="item-name">whats</span>
                                    </span>
                                
                            </a>
                        </li>
                        @if (!Auth::guard('member')->guest())
                                <li>
                                    <!--<a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();localStorage.username='';localStorage.password='';">-->
                                    <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <span style="padding:10px 0;margin:0;">
                                            <span aria-hidden="true" class="icon fa fa-sign-out"></span>
                                            <span class="item-name">安全退出</span>
                                        </span>
                                    </a>
                                </li>
                            <form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endif
                    </ul>
                </li>

            </ul>
        </div>

    </div>
</div>

<div class="modal" id="modalWaring">
    <div class="modal-dialog message-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">系统提示</h4>
            </div>
            <div class="modal-body">
                <div class="line-info">
                    <div class="info-caption">
                        <span class="glyphicon glyphicon-alert alert-icon" aria-hidden="true"></span>
                    </div>
                    <div class="info-left">
                        <pre id="messageWaring">用户名不能为空</pre>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm-btn" onclick="sureWaring()">确定</button>
            </div>
        </div>
    </div>
</div>
<div class="mask" onclick="OpenOrCloseMoney()" style="background-color: rgb(0, 0, 0); opacity: 0.3; z-index: 9999; display: none;"></div>
<!--公告弹框-->
<div class="notice-dialog clearboth hide" id="marquee-wrapper">
    <div class="notice-content clearboth hide">
        <div class="notice-header clearboth">
            <button onclick="closeMessageDioag()">×</button>
            <p>最新消息</p>
        </div>
        <ul class="notice-list clearboth" id="newsBags"></ul>
        <div class="notice-footer">
            <button onclick="closeMessageDioag()">关闭</button>
        </div>
    </div>
</div>
<!--公告详情-->
<div id="announcement-content" announcement-dialog-content="" obj="content" more="true" class="ng-scope ng-isolate-scope hide" style="">
    <div class="modal-announcement-content announcement-content-bg">
        <div class="mac-title">
            <img class="fa-reply" src="{{ asset('/wap/theme3/images/return.png') }}" onclick="closeNoticeContent()" />
            <img class="fa-times" src="{{ asset('wap/theme3/images/closeNotice.png') }}" onclick="closeNotices()" />
            <span class="ng-binding" id="notice-tittle"></span>
        </div>
        <div class="mac-body announcement-content-color">
            <section class="ng-binding">
                <p id="notice-content">尊敬的会员您好：通知您〜北京时间：</p>
            </section>
        </div>
        {{--<div class="mac-footer" ng-show="more"><button type="button" class="btn btn-lg btn-primary" onclick="moreNotice()">更多公告</button></div>--}}
    </div>
</div>
<span id="url_whats" style="opacity: 0;">67604785</span>
</body>


</html>

<script>
    function wechat(){
        layer.open({
            content: '<img src="{{$_system_config->wx_pic}}" style="width:200px;height:200px;">'
            ,btn: '我知道了'
        });
    }
    function whats(){
        layer.open({
            content: 'whats:  67604785'
            ,btn: '我知道了'
        });
    }
    //biCommon.getUserMoneys();
    //getMaintain();//网站维护
    //getGamePlate(4);
    //whetherOpenSMS();
    //judgeOldAndNew();//老带新判断
    //getUserMoney();//获取用户余额，每隔六秒请求一次
</script>