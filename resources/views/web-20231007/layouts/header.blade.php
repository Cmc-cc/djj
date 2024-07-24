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


<div class="header" id="totop">
    <div class="top">
        <div class="loginmeun_btn">
            <span class="pic01"></span>
            <span>澳门服务热线：<em class="yellow">{{ $_system_config->phone1 }}</em>   </span>
        </div>
        <ul class="topList">
            {{--<li><a href="javascript:;">下载<em style="color:#ff0000;"> app送5595</em>元</a></li>--}}
            {{--<li><a href="{{route('member.weixin_pay')}}"><em style="color:#00b050;"> 微信秒充值</em></a></li>--}}
            {{--<li><a href="{{route('member.ali_pay')}}"><em--}}
            {{--style="color:#00b0f0;">支付宝秒充值</em></a></li>--}}
          
            <li class="onlinePic">
                <a class="online"
                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服
                    <i class="iconfont">&#xe601;</i>
                </a>
            </li>
        </ul>
    </div>

    <!-- top end-->
    <div class="navbar">
        <h1 class="logo">
            <a href="{{ route('web.index') }}">
                <img src="{{ $_system_config->site_logo}}" alt="">
            </a>
        </h1>
        <ul class="nav">
            <li>
                <a href="{{ route('web.index') }}" @if($web_route == 'web.index') class="current" @endif>首页 <span
                            class="en">Home</span> </a>
            </li>

            <!--电子游戏-->
            <li>
                <a href="{{ route('web.eGame') }}"
                   class="blinkRed @if($web_route == 'web.eGame') current @endif">电子游戏<span class="en">Slots</span>
                </a>
                <span class="hotpic">
                    <img src="{{ asset('/web/images/hot.gif') }}"/>
                </span>
            </li>
            <!--电子游戏 end-->

            <!--千炮捕鱼-->
            <li>
                <a href="{{ route('web.catchFish') }}"
                   class="blinkRed @if($web_route == 'web.catchFish') current @endif">捕鱼游戏 <span
                            class="en">Catch fish</span> </a>
                <span class="hotpic"><img src="{{ asset('/web/images/hot.gif') }}"/></span>
            </li>
            <!--千炮捕鱼 end-->

            <!--真人娱乐-->
            <li>
                <a href="{{ route('web.liveCasino') }}" @if($web_route == 'web.liveCasino') class="current" @endif>真人娱乐
                    <span class="en">Live casino</span> </a>
                <span class="hotpic"><img src="{{ asset('/web/images/hot.gif') }}"/></span>
            </li>
            <!--真人娱乐 end-->

            <!--幸运彩票-->
            <li>
                <a id="cashap-lottery-menu" title="幸运彩票" href="{{ route('web.lottory') }}"
                   @if($web_route == 'web.lottory') class="current" @endif>
                    幸运彩票<span class="en">Lottery</span> </a>
            </li>
            <!--幸运彩票 end-->

            <!--体育竞猜-->
            <li>
                <a href="{{ route('web.esports') }}" @if($web_route == 'web.esports') class="current" @endif>体育竞技 <span
                            class="en">Sports</span> </a>
            </li>
            {{--<!--体育竞猜 end-->--}}
            <li>
                <a href="{{ route('web.poker') }}" @if($web_route == 'web.poker') class="current" @endif>
                    棋牌游戏 <span class="en">Poker</span>
                </a>
            </li>

            <!--手机投注-->
            <li class="mobWid slideDown">
                <a href="{{ $_system_config->app_link }}" target="_blank" class="blinkGreen">
                    手机投注 <span class="en">Mobile Betting</span>
                </a>
                <span class="hotpic"><img src="{{ asset('/web/images/fast.gif') }}"/></span>
            </li>
            <!--手机投注 end-->
            <li>
                <a title="优惠活动" href="{{ route('web.activityList') }}"
                   class="blinkRed @if($web_route == 'web.activityList') current @endif">优惠活动 <span class="en">Promotions</span>
                </a>
                <span class="hotpic"><img src="{{ asset('/web/images/hot.gif') }}"/></span>
            </li>
        </ul>
    </div>

    <!--header End-->
    <div class="header-login">
        <div class="container">
            <div class="address-slide">
                <span class="webTxt yellow"><i class="iconfont yellow">&#xe621;</i>官方网址：</span>
                <ul class="webAdd yellow">
                    <li>{{ $_system_config->site_domain }}</li>
                </ul>
            </div>

            <!-- 网站顶部固定导航登录组件 -->
            <div id="E74vqk4bnn" class="loginBox">
                @if (Auth::guard('member')->guest())
                    <div class="ember-view  loginbar">
                        <form class="form-horizontal" method="POST" action="{{ route('member.login.post') }}">
                            <fieldset>
                                <div class="input-prepend">
                                    <input class="input-large span8 accountIco01 username" name="name" type="text"
                                           placeholder="账号:"
                                           autocomplete="off"
                                           required="required" data-cashap-tips='{"style":"down"}'>
                                </div>
                                <div class="input-prepend">
                                    <!--<span class="cell_input_notice">密码:</span>-->
                                    <input class="input-large span8 accountIco02 psw" name="password" type="password"
                                           required="required" placeholder="密码:">
                                    <!--<a data-cashap-id="MemberLogin_Form_forgetpwd" class="Fgcode" href="#">wnsr</a>-->
                                </div>
                                <div class="input-prepend">
                                    <!--<span class="cell_input_notice">密码:</span>-->
                                    <input class="input-large span8 psw" name="captcha" type="text" required="required"
                                           placeholder="验证码:" style="width: 100px;padding-left: 10px">
                                    <a onclick="javascript:re_captcha();"><img class="vertifyCode"
                                                                               src="{{ URL('kit/captcha/1') }}"
                                                                               id="c2c98f0de5a04167a9e427d883690ff6"></a>
                                    <script>
                                        function re_captcha() {
                                            $url = "{{ URL('kit/captcha') }}";
                                            $url = $url + "/" + Math.random();
                                            document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                        }
                                    </script>
                                    <!--<a data-cashap-id="MemberLogin_Form_forgetpwd" class="Fgcode" href="#">wnsr</a>-->
                                </div>

                                <!--<div class="input-prepend" data-cashap-id="MemberLogin_Form_verifyArea">-->
                                <!--<input class="input-large span2" name="vcode" type="text" maxlength="4" pattern="^\d{4}$"-->
                                <!--required="required"-->
                                <!--placeholder="验证码" autocomplete="off" data-cashap-tips='{"style":"down","autoWidth":true}'>-->
                                <!--<img data-cashap-id="MemberLogin_Form_verify" src="" alt="点我换验证码" title="点我换验证码" class="verifypic">-->
                                <!--</div>-->
                                <div class="btn-prepend">
                                    <button type="button" class="primary modal-login_submit ajax-submit-btn">立即登入
                                    </button>
                                    <a href="{{ route('web.register_one') }}" class="register">免费开户</a>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                @else
                    <div class="ember-view memberinfo">
                        <div class="memberMeun">
                            <?php
		 use App\Models\SystemConfig;
		 $sys = SystemConfig::findOrfail(1);
		 $mz_open=$sys->mz_open;
		 if(!$mz_open){
		?>
			<a title="额度转换" href="{{ route('member.indoor_transfer') }}">额度转换</a>|
		 <?php } ?>
                            <a title="我要存款" href="{{ route('member.finance_center') }}">我要存款</a>|
                            <a title="我要取款" href="{{ route('member.member_drawing') }}">我要取款</a>|
                            <a title="账户记录" href="{{ route('member.customer_report') }}">账户记录</a>|
                            <a title="账户管理" href="{{ route('member.userCenter') }}">账户管理</a>|
                            <a class="logoutbtn quit_btn" href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>

                        <div class="membe-left">
                            <!--<div class="MesPic">-->
                            <!--<div id="Status_PrivateMessage_Container_E75596gcd5">-->
                            <!--<a class="line_Message" href="#" title="个人讯息"  ><span></span></a>-->
                            <!--</div>-->
                            <!--</div>-->
                            <!-- 个人信息 -->
                            <span class="name">会员帐号：<strong>{{ $_member->name }}</strong></span>
                            <div class="balance">余额：<strong class="money">{{ $_member->all_money }}</strong></div>
                            {{--<a href="#" data-cashap-id="Profile_BaseInfo_refreshBalance" title="刷新余额"--}}
                            {{--class="update"></a>--}}

                        </div>
                    </div>
                @endif
            </div>


            <!-- 网站顶部固定导航登录组件 end-->
        </div>
    </div>
</div>


<div class="hb_in">
    <a href="{{ route('web.red') }}" target="_blank">
        <img src="{{ asset('/web/images/hb_in.png') }}" alt="">
    </a>
</div>
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