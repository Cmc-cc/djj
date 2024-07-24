<header data-v-20721d2a="" data-v-c108e8f8="">
    <div data-v-20721d2a="" class="header">
        <div data-v-20721d2a="" class="header_left">
            <a data-v-20721d2a="" href="{{ route('web.index') }}" class="logo_a router-link-active">
                <img data-v-20721d2a="" src="{{ $_system_config -> site_logo }}" alt="" class="logo_img">
            </a>
        </div>
        <div data-v-20721d2a="" class="header_right">
            @if (Auth::guard('member')->guest())
                <div data-v-20721d2a="" class="denglu_content" id="login-form">
                    <form action="{{ route('member.login.post') }}" method="post">
                    <div data-v-20721d2a="" class="denglu">
                        <div data-v-20721d2a="" class="inputs" id="userlogin_ip">
                            <i data-v-20721d2a="" class="iconfont icon-yonghuming"></i>
                            <input name="name" data-v-20721d2a="" type="text" placeholder="账号" id="loginUsername" maxlength="9" onkeydown="KeyDown()">
                        </div>
                        {{--<div data-v-20721d2a="" class="inputs sendcodes" style="display:none;">
                            <i data-v-20721d2a="" class="iconfont icon-yonghuming"></i>
                            <input data-v-20721d2a="" type="number" placeholder="手机号码" id="loginUserPhone" oninput="if(value.length>11)value=value.slice(0,11)" maxlength="11" onkeydown="KeyDown()">
                        </div>
                        <div data-v-20721d2a="" class="inputs yzmInputs sendcodes" style="display:none;">
                            <i data-v-20721d2a="" class="iconfont icon-yanzhengma"></i>
                            <input data-v-20721d2a="" id="loginUserPhoneCode" maxlength="4" type="text" placeholder="手机验证码" onkeydown="KeyDown()">
                            <span class="yzmsx" onclick="sendBtn($('#loginUserPhone'),this,1)" id="sendCode" state="1">发送验证码</span>

                        </div>--}}
                        <div data-v-20721d2a="" class="inputs" id="pwdlogin_ip">
                            <i data-v-20721d2a="" class="iconfont icon-mima11"></i>
                            <input name="password" data-v-20721d2a="" type="password" placeholder="密码" id="loginUserpwd">
{{--                            <div data-v-20721d2a="" title="忘记密码请联系客服哦" class="forget" onclick="openKuFu(this,1);">忘记?</div>--}}
                        </div>
                        <div data-v-20721d2a="" class="inputs yzmInputs">
                            <i data-v-20721d2a="" class="iconfont icon-yanzhengma"></i>
                            <input name="captcha" data-v-20721d2a="" id="loginUsercode" onfocus="$('#captcha').click()" maxlength="4" type="text" placeholder="验证码">
                            <img data-v-20721d2a="" id="captcha" src="{{ URL('kit/captcha/1') }}" alt="" class="yzmsx">
                        </div>
                        <div data-v-20721d2a="" class="login_botton buttoncolor1 ajax-submit-btn">登录</div>
                        {{--<div data-v-20721d2a="" class="login_botton buttoncolor1 reg-mobile" state="1" onclick="loginCode(this);" style="display:none;">手机号登录</div>--}}
                        <div data-v-20721d2a="" class="login_botton buttoncolor2">
                            <a data-v-20721d2a="" href="{{ route('web.register_one') }}" class="">注册</a>
                        </div>
                    </div>
                    </form>
                    <script>
                        $(function () {
                            $('#captcha').click(function () {
                                $url = "{{ URL('kit/captcha') }}";
                                $url = $url + "/" + Math.random();
                                $(this).attr('src',$url)
                            })
                        })
                    </script>
                </div>
            @else
                <div data-v-20721d2a="" class="denglu_content VipLogin">
                    <div data-v-20721d2a="" class="denglu_msg" id="account-info">
                        <div data-v-20721d2a="" class="denglu_msg1">用户名：{{ $_member -> name }} <img src="" class="vip-layout" id="vipLayout" /></div>
                        <div data-v-20721d2a="" class="denglu_msg1">用户余额：<span class="UserAmountController my_money">{{ $_member -> money }}</span></div>
{{--                        <div data-v-20721d2a="" class="login_botton buttoncolor5" onclick="yijianzhuanchu(this,1)">刷新余额</div>--}}
                        <div data-v-20721d2a="" class="login_botton buttoncolor6" onclick="window.location.href='{{ route('member.userCenter') }}'">会员专区</div>
                        <div data-v-20721d2a="" class="login_botton buttoncolor7" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出登陆</div>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
            <section data-v-20721d2a="" class="menu" id="nav">
                <input type="hidden" value="@index" id="navIndex" />
                <ul data-v-20721d2a="">
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('web.index') }}" class="">首页</a>
                    </li>
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('web.liveCasino') }}" class="">真人視訊</a>
                    </li>
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('web.eGame') }}" class="">電子游艺</a>
                    </li>
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('web.poker') }}" class="">棋牌</a>
                    </li>
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('web.esports') }}" class="">體育游戏</a>
                    </li>
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('web.lottory') }}" class="">彩票游戏</a>
                    </li>
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('wap.index') }}" class="">手机投注</a>
                    </li>
                    <li data-v-20721d2a="">
                        <a data-v-20721d2a="" href="{{ route('web.activityList') }}">优惠活动</a>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</header>
<script>
    @if (!Auth::guard('member')->guest())
    @if($_member->is_trans_on == 1)
    $(function () {
        $.ajax({
            type:'post',
            url : "{{route('member.api.wallet_balance')}}",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number($('.my_money').text()) + Number(data.data);
                    $('.my_money').text('');
                    $('.my_money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
    @endif
</script>
