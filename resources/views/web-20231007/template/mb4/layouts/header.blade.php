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
<!--半透明遮罩层-->
<div class="backdrop"></div>


<div class="header">
    <div class="header_hd">
        <div class="container clear">
            <div class="pullRight">
                @if (Auth::guard('member')->guest())
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <ul class="clear">
                            <li>
                                <div class="input_box">
                                    <span><img src="{{ asset('/web/images/edf_user.png') }}" alt="" height="18px"
                                               style="margin: 0 auto"></span>
                                    <input class="username" type="text" placeholder="请输入用户名" required name="name" tabindex="1">
                                    <a href="">忘记？</a>
                                </div>
                            </li>
                            <li>
                                <div class="input_box">
                                    <input class="psw" type="password" placeholder="请输入密码" required name="password" tabindex="2">
                                    <a href="">忘记？</a>
                                </div>
                            </li>
                            <li>
                                <div class="input_box">
                                    <input type="text" placeholder="请输入验证码" required name="captcha" onfocus="re_captcha();" tabindex="3">
                                    <img onclick="javascript:re_captcha();" src="{{ URL('kit/captcha/1') }}"
                                         id="c2c98f0de5a04167a9e427d883690ff12"
                                         style="display: inline-block;width: 80px;margin-top: -2px;margin-left: 2px;height: 24px;position: relative;">
                                    <script>
                                        function re_captcha() {
                                            $url = "{{ URL('kit/captcha') }}";
                                            $url = $url + "/" + Math.random();
                                            document.getElementById('c2c98f0de5a04167a9e427d883690ff12').src = $url;
                                        }
                                    </script>
                                </div>
                            </li>
                            <li>
                                <button type="button" class="login_btn modal-login_submit ajax-submit-btn">登录</button>
                            </li>
                            <li>
                                <a href="{{ route('web.register_one') }}" class="reg_btn">快速注册</a>
                            </li>
                            <li>
                                <a href="javascript:;" class="navigation_online"
                                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服</a>
                            </li>
                        </ul>
                    </form>
                @else
                    <div class="afterLogin clear">
                        <a href="{{ route('member.logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                           class="quit_btn personal_nav_quit">
                            安全退出
                        </a>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none">
                            {{ csrf_field() }}
                        </form>
                        <div class="pullRight">
                            晚上好，{{ $_member->name }},账户余额：<strong class="money">{{ $_member->all_money }}</strong>剩余码量：<strong class="money">{{ $_member->ml_money }}</strong>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="header_nav">
        <div class="container clear" style="width: 1300px">
            <a href="" class="pullLeft">
                <img src="{{ $_system_config->site_logo}}" alt="" style="margin: 0;">
            </a>
            <ul class="pullRight">
                <li @if($web_route == 'web.index') class="active" @endif>
                    <a href="{{ route('web.index') }}">
                        <strong>首页</strong>
                        <br>
                        <span>Home</span>
                    </a>
                </li>
                <li @if($web_route == 'web.eGame') class="active" @endif>
                    <a href="{{ route('web.eGame') }}">
                        <strong>电子游戏</strong>
                        <br>
                        <span>Slots</span>
                    </a>
                </li>
                <li @if($web_route == 'web.catchFish') class="active" @endif>
                    <a href="{{ route('web.catchFish') }}">
                        <strong>捕鱼达人</strong>
                        <br>
                        <span>Fish Game</span>
                    </a>
                </li>
                <li @if($web_route == 'web.liveCasino') class="active" @endif>
                    <a href="{{ route('web.liveCasino') }}">
                        <strong>真人游戏</strong>
                        <br>
                        <span>Live Casino</span>
                    </a>
                </li>
                <li @if($web_route == 'web.esports') class="active" @endif>
                    <a href="{{ route('web.esports') }}">
                        <strong>体育投注</strong>
                        <br>
                        <span>Sports</span>
                    </a>
                </li>
                <li @if($web_route == 'web.lottory') class="active" @endif>
                    <a href="{{ route('web.lottory') }}">
                        <strong>彩票游戏</strong>
                        <br>
                        <span>Sports</span>
                    </a>
                </li>
                <li @if($web_route == 'web.poker') class="active" @endif>
                    <a href="{{ route('web.poker') }}">
                        <strong>棋牌游戏</strong>
                        <br>
                        <span>Poker</span>
                    </a>
                </li>
                <li @if($web_route == 'web.activityList') class="active" @endif>
                    <a href="{{ route('web.activityList') }}">
                        <strong>优惠活动</strong>
                        <br>
                        <span>Promotions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ $_system_config->app_link }}" target="_blank">
                        <strong>手机投注</strong>
                        <br>
                        <span>Mobile</span>
                    </a>
                </li>
                <li @if($web_route == 'member.userCenter') class="active" @endif>
                    <a href="{{ route('member.userCenter') }}">
                        <strong>个人中心</strong>
                        <br>
                        <span>Personal Center</span>
                    </a>
                </li>
            </ul>
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
