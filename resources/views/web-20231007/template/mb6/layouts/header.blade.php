<!--登录模态框-->
<div id="login" class="modal modal-login">
    <div class="modal-content">
        <form method="POST" action="{{ route('member.login.post') }}">
            <a href="" class="close bg-icon"></a>
            <div class="modal-login_form">
                <h2>用户登录</h2>
                <div class="modal-login_line">
                    <input class="username" type="text" placeholder="请输入用户名" required name="name">
                </div>
                <div class="modal-login_line">
                    <input class="psw" type="password" placeholder="请输入密码" required name="password">
                </div>
                <!-- <div class="modal-login_line code">
                    <input type="text" placeholder="请输入验证码" required name="code">
                    <img src="" alt="" width="100">
                </div> -->
                <div class="modal-login_line">
                    <button class="modal-login_submit ajax-submit-btn" type="button">登录</button>
                </div>
                <div class="modal-login_link clear">
                    <p class="pullRight">
                        还没有账号？
                        <a href="{{ route('web.register_one') }}">点击注册</a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

{{--手机投注模态框--}}
<div id="mobileBet" class="modal modal-mobileBet">
    <div class="modal-content">
        <a href="" class="close bg-icon"></a>
        111
    </div>
</div>

<!--半透明遮罩层-->
<div class="backdrop"></div>


<header class="header" id="totop">
    <div class="top">
        <div class="topnavC">
            <img src="{{ asset('/web/mb6/images/img/1607051414574293.png') }}" class="pic01"/>
            <div class="EasternTime">
                <span>美东时间:</span> <span id="mdtime"></span>
            </div>
            <div class="loginmeun_btn">
                <style>
                    .head-nav {
                        width: 101px;
                        float: left;
                    }

                    .head-nav li {
                        display: inline-block;
                        height: 12px;
                        /*border-right: 1px solid #706161;*/
                        border-right: 1px solid #393939;
                        padding: 0 6px;
                        line-height: 12px;
                        position: relative;
                        *float: left;
                        *top: 10px;
                    }

                    .head-nav li:last-child {
                        border-right: none;
                    }

                    .head-nav li a {
                        color: #999;
                    }

                    .head-nav li a img {
                        margin-bottom: -1px;
                    }

                    .head-nav li a:hover {
                        color: #e9dd84;
                    }

                    .head-nav li .hover-img {
                        position: absolute;
                        width: 305px;
                        max-width: none;
                        z-index: 99;
                        left: -100px;
                        top: 0;
                        display: none;
                        padding-top: 20px;
                    }

                    .head-nav li:hover .hover-img {
                        display: block;
                    }
                </style>
                <ul class="head-nav">
                    <li style="top: 1px;">
                        <a href="javascript:void(0)" style="color: #ffdfa6">
                            <img src="{{ asset('/web/mb6/images/img/head-nav-icon.jpg') }}" style="display: inline-block">
                            合法牌照展示
                        </a>
                        <div class="hover-img">
                            <img src="{{ asset('/web/mb6/images/img/head-hover_03.png') }}">
                        </div>
                    </li>
                </ul>
                {{--<span>|</span> <a id="qk" href="javascript:;" target="_blank">支付宝扫码</a><span>|</span>--}}
                {{--<a id="blink" href="javascript:;">MG电子返水1.8%起</a><span>|</span>--}}
                {{--<a id="vip" href="javascript:;" target="_blank">抢红包</a><span>|</span>--}}
                {{--<a id="wlzb" href="javascript:;" target="_blank">封神榜</a><span>|</span>--}}

                <a id="zxd" href="{{route('daili.init')}}" target="_blank">代理登录</a><span>|</span>
				 <a href="javascript:;" class="daili_apply">代理加盟</a><span>|</span>
               
                <span>|</span>
                <a class="Fgcode" href="javascript:;" onclick="alert('忘记账号密码，请联系在线客服人员取回！')">忘记密码?</a>
            </div>
        </div>
        <!--topnavC end-->
    </div>
    <!--top end-->
    @if (Auth::guard('member')->guest())
            <!--登录前-->
    <div class="topCenter">
        <h1 class="logo">
            <a href="javascript:void(0)">
                <img src="{{ $_system_config->site_logo}}" alt="">
            </a>
        </h1>
        <div class="topRight">
            <!-- 网站顶部固定导航登录组件 -->
            <div id="E74vqk4bnn" class="loginBox">
                <!--登录前-->
                <style type="text/css">
                    input::-webkit-input-placeholder {
                        color: #f1d896;
                    }

                    input:-moz-placeholder {
                        color: #f1d896;
                    }

                    input::-moz-placeholder {
                        color: #f1d896;
                    }

                    input:-ms-input-placeholder {
                        color: #f1d896;
                    }
                </style>

                <div id="MemberLogin_Form_E74vs5uqc6" class="ember-view  loginbar">
                    <form name="LoginForm" id="LoginForm" action="{{ route('member.login.post') }}" method="POST"
                          style="margin: 0" autocomplete="off">
                        <fieldset>
                            <div class="input-prepend">
                                <input class="input-large span8 accountIco01" value=""
                                       type="text" placeholder="账号" name="name" id="username"
                                       tabindex="1" maxlength="15" autocomplete="off">
                            </div>

                            <div class="input-prepend">
                                <input class="input-large span8 accountIco02" placeholder="密码"
                                       type="password" name="password" id="userpassword" tabindex="2"
                                       maxlength="13" autocomplete="off">
                            </div>

                            <div class="input-prepend">
                                <input class="input-large span2" placeholder="验证码" type="text"
                                       name="captcha" id="code" tabindex="3" maxlength="4" autocomplete="off">
                                <a onclick="javascript:re_captcha();"><img class="vertifyCode"
                                                                           src="{{ URL('kit/captcha/1') }}"
                                                                           id="c2c98f0de5a04167a9e427d883690ff6"
                                                                           width="50px" height="25px"></a>
                                <script>
                                    function re_captcha() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                    }
                                </script>
                            </div>
                            <input type="hidden" name="action" value="login"/>
                            <div class="mebBtn">
                                <button type="submit" class="primary modal-login_submit ajax-submit-btn">登录</button>
                                <a title="加入会员" href="{{route('web.register_one')}}" class="register">加入会员</a>
                            </div>

                        </fieldset>
                    </form>
                </div>

            </div>

            <!-- 网站顶部固定导航登录组件 end-->
        </div>

    </div>
    @else
            <!--登陆后-->
    {{--<div id="have_login" style="display: none;"></div>--}}
    <div class="topCenter">
        <h1 class="logo">
            <a href="javascript:void(0)">
                <img src="{{ $_system_config->site_logo}}" alt="">
            </a>
        </h1>
        <div class="topRight">
            <!-- 网站顶部固定导航登录组件 -->
            <div id="E74vqk4bnn" class="loginBox">
                <!--登录后-->
                <div id="Profile_BaseInfo_E74vs5v15f" class="ember-view memberinfo">
                    {{--<div style="position: absolute; top: 10px; right: 300px;">
                        <a href="{{ route('member.message_list') }}">
                            <span class="name">站内信&nbsp;(<span style="color: yellow">{{ $_not_read_message_num }}</span>)
							</span>
                        </a>
                    </div>--}}
                    <div class="membe-left">
                        <!-- 个人信息 -->

                        <span class="name">会员帐号：<strong>{{ $_member->name }}</strong></span>
                        <div class="balance" id="">
                            总账户余额：<strong id="user_money" class="money">{{ $_member->all_money }}</strong>
							剩余码量：<strong id="user_money" class="money">{{ $_member->ml_money }}</strong>
							
                        </div>
                        <a href="javascript:void(0)" class="update"></a>
                    </div>
                    <div class="memberMeun">
                        @if($_system_config ->is_new_center == 1)
                            <a href="{{ route('member.userCenter') }}?type=6" title="会员中心">会员中心</a>
						 <a href="{{ route('member.userCenter') }}?type=1" title="我要存款">存取款</a>						 
						   <a href="{{ route('member.userCenter') }}?type=4" title="账户记录">账户记录</a>
						
						
						
                            @else

                        <a href="{{ route('member.userCenter') }}" title="会员中心">会员中心</a>|
                        <a href="{{ route('member.indoor_transfer') }}" title="额度转换">额度转换</a>|
                        <a href="{{ route('member.finance_center') }}" title="线上存款">我要存款</a>|
                        <a href="{{ route('member.member_drawing') }}" title="额度转换">我要取款</a>|
                        <a href="{{ route('member.customer_report') }}" title="账户记录">账户记录</a>|
                        <a href="{{ route('member.finance_center') }}" id="kscz">快速充值</a>|
                        <a href="{{ route('member.logout') }}" class="logoutbtn"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 网站顶部固定导航登录组件 end-->
        </div>

    </div>
    @endif

            <!-- topCenter end-->
    <style type="text/css">
        .slotSub .submenu li span {
            left: 70px;
        }

        .liveSub .submenu li span {
            left: 22px;
        }

        .lotterySub .submenu li span {
            left: 54px;
        }

        .cfSub .submenu li {
            position: relative;
            width: 500px;
            height: 150px;
        }
    </style>
    <div class="navbar">
        <ul class="nav">
            <li>
                <a class="@if($web_route == 'web.index') current @endif" href="{{ route('web.index') }}">官网首页</a>
            </li>
            <li>
                <a id="blinkss" class="GT-slotGames @if($web_route == 'web.eGame') current @endif"
                   href="{{ route('web.eGame') }}">电子游戏</a>
                <span class="hotpic"><img src="{{ asset('/web/mb6/images/img/1608180949484523.gif') }}"/></span>
            </li>
            <!--电子游戏end-->

            {{--捕鱼达人--}}
            <li>
                <a class="@if($web_route == 'web.catchFish') current @endif"
                   href="{{ route('web.catchFish') }}">捕鱼达人</a>
                <span class="hotpic"><img src="{{ asset('/web/mb6/images/img/1608180949484523.gif') }}"/></span>
            </li>

            <!--真人视讯-->
            <li>
                <a class="@if($web_route == 'web.liveCasino') current @endif"
                   href="{{ route('web.liveCasino') }}">真人娱乐</a>
                <span class="hotpic"><img src="{{ asset('/web/mb6/images/img/1607220951257531.gif') }}"/></span>
            </li>
            <!--真人视讯end-->

            <li>
                <a class="@if($web_route == 'web.esports') current @endif" href="{{ route('web.esports') }}">体育游戏</a>
            </li>
            <!--体育博彩 end-->

            <li>
                <a class="@if($web_route == 'web.lottory') current @endif" href="{{ route('web.lottory') }}">彩票游戏</a>
            </li>

            <li>
                <a class="@if($web_route == 'web.poker') current @endif" href="{{ route('web.poker') }}">棋牌游戏</a>
            </li>

            <li class="navColor">
                <a class="@if($web_route == 'web.activityList') current @endif" href="{{ route('web.activityList') }}"
                   id="blinks">优惠活动</a>
            </li>

            <li>
                <a href="{{ $_system_config->app_link }}" target="_blank" title="手机下注">手机下注</a>
            </li>

            <li class="noBackground">
                <a href="javascript:void(0)"
                   onclick="window.open('{{ $_system_config->service_link }}', '', 'height=500,width=700,top=200,left=500,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">在线客服</a>
            </li>
        </ul>
    </div>
</header>

<div class="hb_in">
    <a href="{{route('web.red')}}" target="_blank">
        <img src="{{ asset('/web/mb6/images/hb_in.png') }}" alt="">
    </a>
</div>

<script>


    $(function () {

        //========== 首页轮播 end
        $(document).ready(function () {

            // Skitter Tester
            $('.box_skitter_large').skitter({
                fullscreen: true,
                interval: '4000'
            });
            //banner end
            $('.TabMeunBox').Tabs({
                auto: 3000
//        event: 'click'
            });
            //tab选项 end


        });
        //========== 首页轮播 end

    });
</script>
<script>
    @if (!Auth::guard('member')->guest())
    $(function () {
        $.ajax({
            type:'post',
            url : "{{route('member.api.wallet_balance')}}",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number($('.money').text()) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
</script>