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


<div class="header">
    <div class="wrap">
        <div class="top">
            <div class="left">
                <a href="javascript:;" class="paizhao">
                    牌照展示：<img style="display: inline-block" src="{{ asset('/web') }}/mb14/images/paizhaoico.png">
                    <div class="paizhao-ercode"></div>
                </a>

                语言选择：
                <a href="javascript:;" class="rightlink06" title="繁体中文"></a>
                <a href="javascript:;" class="rightlink07" title="简体中文"></a>
                <a href="javascript:;" class="rightlink08" title="English"></a>
                {{--<span class="url-icon"></span>--}}
            </div>
            <div class="right">
                {{--<a href="javascript:;" class="rightlink01">备用网址</a>&nbsp;&nbsp;|&nbsp;--}}
                <a href="javascript:;"  class="rightlink02 daili_apply">代理加盟</a>&nbsp;&nbsp;|&nbsp;
                {{--<a href="javascript:;" class="rightlink03">免费试玩</a>&nbsp;&nbsp;|&nbsp;--}}
                {{--<a href="javascript:;" class="rightlink04">DNS防劫持教程</a>&nbsp;&nbsp;|&nbsp;--}}
                <a href="{{route('daili.init')}}" target="_blank" class="rightlink05">代理登录</a>&nbsp;&nbsp;

            </div>
        </div>
    </div>
    <div class="bot">
        <div class="wrap" style="width: 1200px">
            <div class="logo">
                <a href="{{ route('web.index') }}">
                    <div class="logo">
                        <img src="{{ $_system_config->site_logo}}" alt="" width="251" height="78">
                        {{--<object type="application/x-shockwave-flash" id="logo" onmousedown="" data="{{ asset('/web/media/logo.swf') }}" width="251" height="78"><param name="wmode" value="Transparent"></object>--}}
                    </div>
                </a>
            </div>
            <div class="nav">
                <ul>
                    <li class="@if($web_route == 'web.index') active @endif">
                        <a href="{{ route('web.index') }}">
                            <div class="tit">网站首页</div>
                            <div class="eng">HOME</div>
                        </a>
                    </li>
                    <li class="casino @if($web_route == 'web.eGame') active @endif">
                        <a href="{{ route('web.eGame') }}">
                            <div class="tit">电子游艺</div>
                            <div class="eng">SLOTS</div>
                        </a>
                    </li>
                    <li class="livecasino @if($web_route == 'web.liveCasino') active @endif">
                        <a href="{{ route('web.liveCasino') }}">
                            <div class="tit">真人视讯<img src="{{ asset('/web') }}/images/hot.gif" class="tophot"></div>
                            <div class="eng">CASINO</div>
                        </a>
                    </li>
                    <li class="sports @if($web_route == 'web.catchFish') active @endif">
                        <a href="{{ route('web.catchFish') }}">
                            <div class="tit">捕鱼游戏</div>
                            <div class="eng">CATCHFISH</div>
                        </a>
                    </li>
                    <li class="sports @if($web_route == 'web.esports') active @endif">
                        <a href="{{ route('web.esports') }}">
                            <div class="tit">体育赛事</div>
                            <div class="eng">SPORTS</div>
                        </a>
                    </li>
                    <li class="lotterys @if($web_route == 'web.lottory') active @endif">
                        <a href="{{ route('web.lottory') }}">
                            <div class="tit">彩票游戏</div>
                            <div class="eng">LOTTERY</div>
                        </a>
                    </li>
                    <li class="lotterys @if($web_route == 'web.poker') active @endif">
                        <a href="{{ route('web.poker') }}">
                            <div class="tit">棋牌游戏</div>
                            <div class="eng">POKER</div>
                        </a>
                    </li>
                    <li class="promotions @if($web_route == 'web.activityList') active @endif">
                        <a href="{{ route('web.activityList') }}">
                            <div class="tit">优惠活动<img src="{{ asset('/web') }}/images/hot.gif" class="tophot"></div>
                            <div class="eng">PROMOTIONS</div>
                        </a>
                    </li>
                    <li class="mobilbet">
                        <a href="{{ $_system_config->app_link }}" target="_blank">
                            <div class="tit">手机APP<img src="{{ asset('/web') }}/images/hot.gif" class="tophot"></div>
                            <div class="eng">MOBILE BET</div>
                        </a>
                    </li>
                    <li class="service">
                        <a href="javascript:;"
                           onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                            <div class="tit">在线客服</div>
                            <div class="eng">SERVICE</div>
                        </a>
                    </li>
                </ul>
                <div class="animate-module"></div>
            </div>
        </div>
    </div>
    @if (Auth::guard('member')->guest())
        <div class="nav-login">
            <div class="wrap">
                <div class="left url">
                    <img src="{{ asset('/web') }}/mb14/images/title02.png">
                </div>
                <div class="right index-login">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <div class="module">
                            <span class="icon"><img src="{{ asset('/web') }}/mb14/images/login-uesr.png"></span>
                            <input type="text" name="name" class="inp" placeholder="账号">
                        </div>
                        <div class="module">
                            <span class="icon"><img src="{{ asset('/web') }}/mb14/images/login-password.png"></span>
                            <input type="password" name="password" class="inp" placeholder="密码">
                            <span class="tips">
                                <a href="javascript:;" class="forget"
                                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                                    忘记？</a>
                            </span>
                        </div>
                        <div class="module">
                            <input type="text" name="captcha" class="inp" placeholder="验证码">
                            <a class="vPic" onclick="javascript:re_captcha();">
                                <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}"
                                     id="c2c98f0de5a04167a9e427d883690ff6">
                            </a>
                            <script>
                                function re_captcha() {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                }
                            </script>
                        </div>
                        <button class="login-btn modal-login_submit ajax-submit-btn"></button>
                        <a href="{{ route('web.register_one') }}" class="register-btn"></a>
                        <a class="forget" href="javascript:;"
                           onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">忘记密码</a>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="nav-login nav-afterlogin">
            <div class="wrap">
                <div class="left url">
                    <img src="{{ asset('/web') }}/mb14/images/title02.png">
                </div>
                <div class="right">
                    账号： <span class="lightredCr">{{ $_member->name }}</span>&nbsp;
                    系统余额： <span class="lightredCr money">{{ $_member->all_money }}</span>&nbsp;
					<span class="lightredCr"></span>&nbsp;
                    剩余码量： <span class="lightredCr money">{{ $_member->ml_money }}</span>&nbsp;
					
                    {{--<a href="javascript:;"><img src="{{ asset('/web') }}/images/add.png"></a>&nbsp;--}}
                   
					<a href="{{ route('member.userCenter') }}?type=1">存取款</a>&nbsp;&nbsp;|&nbsp;
					 
					<a href="{{ route('member.userCenter') }}?type=4">账户记录</a>&nbsp;&nbsp;|&nbsp;
                    @if(!$_system_config->mz_open)
					<a title="额度转换" href="{{ route('member.indoor_transfer') }}">额度转换</a>&nbsp;&nbsp;|&nbsp;
					@endif
                    <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>&nbsp;&nbsp;|&nbsp;
                    <a class="exit" href="{{ route('member.logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

<div class="hb_in">
    <a href="{{route('web.red')}}" target="_blank">
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
                    $('.money-index').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
</script>