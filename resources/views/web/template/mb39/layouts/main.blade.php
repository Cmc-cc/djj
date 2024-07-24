<!DOCTYPE html>
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
    <link href="{{ asset('web/mb39/css/site.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb39/css/BIstyle.css') }}" rel="stylesheet" />
    <script src="{{ asset('web/mb36/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/qrcode.min.js') }}"></script>
{{--    <script src="~/Areas/Web5/Scripts/float.js"></script>--}}
    <script src="{{ asset('web/mb39/js/webConfig.js') }}"></script>
    <script src="{{ asset('web/mb39/js/bicommon.js') }}"></script>
    <script src="{{ asset('web/mb39/js/webMain.js') }}"></script>
    <!--[if lte IE 9]>
    <script src="{{ asset('web/mb36/js/placeholders.min.js') }}"></script>
    <script src="{{ asset('web/mb36/js/html5shiv.js') }}"></script>
    <![endif]-->


    <link rel="stylesheet" href="{{ asset('/web/css/yk_modal.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/index1.css') }}">
    <link rel="stylesheet" href="{{ asset('/web/css/style.css') }}">

    <script src="{{ asset('/web/js/yk_modal.js') }}"></script>
    <script src="{{ asset('/web/js/index1.js') }}"></script>
    <script src="{{ asset('/web/layer/layer.js') }}"></script>
    <script src="{{ asset('/web/js/ajax-submit-form.js') }}"></script>
</head>
<body class="layout ng-scope">
@include('web.template.mb39.layouts.header')

<div id="banner" @if($web_route == 'web.eGame' || $web_route == 'web.poker' || $web_route == 'web.liveCasino' || $web_route == 'web.esports' || $web_route == 'web.lottory' || $web_route == 'web.activityList' || $web_route == "web.login" || $web_route == "web.register_one" || $web_route == 'web.catchFish') style="display:block;height:500px;background-image: url('{{ asset('web/mb39/images/banner.jpg') }}')" @endif>
    <div class="wrapper">
        <div id="header-bot">
            @if ( ! Auth::guard('member')->guest())
                <div id="account-box" class="is-login ng-scope">
                    <ul id="account-info">
                        <ul id="account-info">
                            <li>
                                帐号 :
                                <span class="account" title="{{ $_member ->name }}">{{ $_member -> name }}</span>
                            </li>
                            <li>
                                账户余额 :
                                <span class="account ng-binding UserAmountController my_money">{{ $_member -> money }}</span>


                                <div id="callBackAllWallet"></div>
                            </li>
                        </ul>
                    </ul>

                    <ul id="account-nav">
                        @if($_system_config->is_new_center==1)
                            <li title="个人中心">
                                <a href="{{  route('member.userCenter') }} ">个人中心</a>
                            </li>
                        @else
                        @endif
                        {{--<li title="投注记录">
                            <a href="@Url.Action("BetRecord", "Index")">投注记录</a>
                        </li>
                        <li title="线上取款">
                            <a href="@Url.Action("WithdrawApplication", "Index")">线上取款</a>
                        </li>
                        <li title="线上存款">
                            <a href="@Url.Action("Deposit", "Index")">线上存款</a>
                        </li>
                        <li title="交易记录">
                            <a href="@Url.Action("Transaction", "Index")">交易记录</a>
                        </li>
                        <li title="额度转换">
                            <a href="@Url.Action("transfer", "Index")">额度转换</a>
                        </li>
                        <li title="修改取款密码">
                            <a href="@Url.Action("ChangeWithdrawPassword", "Index")">取款密码</a>
                        </li>--}}
                    </ul>
                    <div id="action-box">
                        <a class="logout-btn ng-binding" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>

                    </div>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
                @else

                <div id="account-box">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <input id="loginUsername" name="name" type="text" placeholder="帐号" required autofocus />
                        <input id="loginUserpwd" name="password" type="password" placeholder="密码" required />

                        <div id="check-code-wrapper">
                            <input id="loginUsercode" name="captcha" type="text" placeholder="验证码" checkcode-type="Login" required onfocus="$('#captcha').click()" />
                            <img id="captcha" src="{{ URL('kit/captcha/1') }}" class="c2c98f0de5a04167a9e427d883690ff6">
                        </div>
                        <script>
                            $(function () {
                                $('#captcha').click(function () {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    $(this).attr('src',$url)
                                })
                            })

                        </script>
                        <button id="login-box" class="login-btn ajax-submit-btn" >登入</button>
                        <button class="reg-btn" type="button" onclick="goTo('{{ route('web.register_one') }}')">立即注册</button>
                    </form>
                </div>
                @endif

        </div>
    </div>

    <div id="news" style="display: none">
        <div class="wrapper">
            <span class="title">最新公告</span>
            <div id="hot-news" news-marquee="" news-assign="home-up-4000">
                <div class="main-cell" style="height: 50px;">
                    <div class="js-marquee-wrapper">
                        <div class="js-marquee">
                            <marquee direction="up" onMouseOut="this.start()" onMouseOver="this.stop()" scrollamount="4">
                                @foreach($_system_notices as $v)
                                    {{ $v->title }}~~
                                    {{ $v->content }}
                                @endforeach
                                </marquee>
                        </div>
                    </div>
                </div>
                <div class="option-wrapper" ng-transclude=""></div>
            </div>
        </div>
    </div>
</div>
@yield('content')
@include('web.template.mb39.layouts.aside')
@include('web.template.mb39.layouts.footer')

@yield('after.js')
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
<input type="hidden" id="userNameController" minmoney="@systemseting["minmoney"]" maxmoney="@systemseting["maxmoney"]" value="@ViewBag.UserName" title="@systemseting["title"]" kfLink="@systemseting["kf_link"]" kfPhone="@systemseting["kf_phone"]" kfQQ="@systemseting["kf_qq"]" kfWX="@systemseting["kf_wx"]" downAndroid="@systemseting["down_android"]" downIos="@systemseting["down_ios"]" systemRepair="@systemseting["system_repair"]" systemRepairtent="@systemseting["system_repairtent"]" />

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
    //getMaintain();
    //getGamePlate(1, "");
    //biCommon.getKeFu();
    getTitle();
    //getNotice($("#hot-news marquee"));
    //biCommon.getUserMoneys();
    //getUserMoney();
    $(function () {

    })
</script>
<script>
    //getMaintain();
    //getGamePlate(1, "");
    //biCommon.getKeFu();
    getTitle();
    //getNotice($("#hot-news marquee"));
    //biCommon.getUserMoneys();
    //getUserMoney();
    $(function () {
        //$(".services").Float();
    })
</script>
