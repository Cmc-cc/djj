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


<div id="page-header">
    <div class="header">
        <div class="header-top-wrap">
            <!-- 自訂連結 -->
            <div class="top-link-wrap">
            </div>
            {{--<a class="license" href="javascript:;" target="_blank" data-color="#FFD700|#FFF">合法牌照展示</a>--}}
                    <!-- est -->
            <div class="est-wrap">
            </div>
            @if (Auth::guard('member')->guest())
                    <!-- 登入 -->
            <div class="login-wrap">
                <form id="LoginForm" method="POST" action="{{ route('member.login.post') }}">
                    <label for="username" class="login-placeholder">帐号</label>
                    <p class="login-unit login-unit-user">
                        <input name="name" type="text" size="12" id="username" title="帐号"
                               maxlength="15"
                               class="login-input login-acc" tabindex="1" required/>
                        {{--<span id="js-acc-unicode" class="acc-unicode">@855</span>--}}
                    </p>
                    <label for="passwd" class="login-placeholder">密码</label>
                    <p class="login-unit login-unit-pwd">
                        <input name="password" type="password" autocomplete="off" size="13" id="passwd"
                               title="请填写 6-12 位大小写英数字"
                               maxlength="13" class="login-input" tabindex="2" pattern="[a-zA-Z0-9]{6,13}" required/>
                    </p>
                    <label for="rmNum" class="login-placeholder">验证码</label>
                    <p class="login-unit login-unit-chk">
                        <input name="captcha" type="text" id="rmNum" size="7" maxlength="4" title="( 点选此处产生新验证码 )"
                               class="login-input" tabindex="3" required/>
                        <a onclick="javascript:re_captcha();" class="vPic">
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
                    </p>
                    <button class="login-submit modal-login_submit ajax-submit-btn" type="button">登入</button>
                    <a href="javascript:;" class="login-forgot">忘记密码?</a>
                    <a href="{{ route('web.register_one') }}" class="login-join">注册</a>
                </form>
            </div>
            @else
                    <!-- 登入 -->
            <div class="mem-info">
                请检视您的帐户:&nbsp;&nbsp;
                <style>
                    .ele-accinfo {
                        display: inline-block;
                        padding-right: 5px;
                    }

                    .ele-accinfo .fa {
                        padding: 0 2px;
                        font-size: 14px;
                    }

                    .ele-first-balance {
                        display: inline-block;
                    }

                    .ele-acc-unit {
                        display: inline-block;
                    }

                    .ele-obalance-wrap {
                        position: relative;
                        display: inline-block;
                    }

                    .ele-other-balance {
                        cursor: pointer;
                    }
                </style>

                <div class="ele-accinfo ele-acc-name"><span>帐号：</span><strong>{{ $_member->name }}</strong></div>
                <div class="ele-acc-unit">
                    <div id="_bbsportBalance" class="ele-accinfo ele-first-balance">
                        <span>余额：</span>
                        <strong class="money">{{ $_member->money }}</strong>
                    </div>
                </div>
            </div>
            <!--  sub  -->
            <div class="SU-Menual">
                <ul class="login-Menual">
                    @if($_system_config->is_new_center ==1)
                        <li>
                            <a id="su-macenter" href="{{ route('member.userCenter') }}" title="会员中心">会员中心</a>
                            ｜
                        </li>
                        @else
                    <li>
                        <a id="su-macenter" href="{{ route('member.userCenter') }}" title="会员中心">会员中心</a>
                        ｜
                    </li>
                    <li>
                        <a id="su-deposite" href="{{ route('member.finance_center') }}" title="线上存款">线上存款</a>
                        ｜
                    </li>
                    <li>
                        <a id="su-withdraw" href="{{ route('member.member_drawing') }}" title="线上取款">线上取款</a>
                        ｜
                    </li>
                    <li>
                        <a id="su-switch" href="{{ route('member.indoor_transfer') }}" title="接口余额">接口余额</a>
                        ｜
                    </li>
                    <li>
                        <a id="su-msg" href="{{ route('member.message_list') }}" title="未读讯息">未读讯息</a>
                        (<span id="MsgNotReadCount">{{ $_not_read_message_num }}</span>) ｜
                    </li>
                    @endif
                    <li>
                        <a id="su-logout" href="{{ route('member.logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();" title="登出">登出</a>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
            @endif
        </div>
        <div class="header-bottom-wrap clearfix">
            <!-- LOGO -->
            <div class="header-logo">
                <div id="ele-logo-wrap">
                    <a href="javascript:;" id="ele-logo-img">
                        <img src="{{ $_system_config->site_logo }}" alt="">
                    </a>
                </div>
            </div>

            <!-- 主選單 -->
            <div class="mainnav-wrap">
                <div class="mainnav" data-lsub-style="fade" data-lsub-y="8">
                    <ul class="clearfix">
                        <li id="LS-first" class="LS-first @if($web_route == 'web.index') current @endif">
                            <div class="nav-img"></div>
                            <a href="{{ route('web.index') }}"
                               class="" title="本站首页">本站首页</a>
                            <!-- 子選單 -->
                        </li>
                        <li id="LS-live" class="LS-live @if($web_route == 'web.liveCasino') current @endif">
                            <div class="nav-img"></div>
                            <a href="{{ route('web.liveCasino') }}"
                               class="" title="視訊直播"
                            >視訊直播</a>
                        </li>
                        <li id="LS-ball" class="LS-ball @if($web_route == 'web.esports') current @endif">
                            <div class="nav-img"></div>
                            <a href="{{ route('web.esports') }}"
                               class="" title="體育赛事">體育赛事</a>
                        </li>
                        <li id="LS-game" class="LS-game @if($web_route == 'web.eGame') current @endif">
                            <div class="nav-img"></div>
                            <a href="{{ route('web.eGame') }}"
                               class="" title="電子游艺"
                            >電子游艺</a>
                        </li>
                        <li id="LS-ltlottery" class="LS-ltlottery @if($web_route == 'web.lottory') current @endif">
                            <div class="nav-img"></div>
                            <a href="{{ route('web.lottory') }}"
                               class="" title="彩票游戏"
                            >彩票游戏</a>
                            <!-- 子選單 -->
                        </li>
                        <li id="LS-game" class="LS-poker @if($web_route == 'web.poker') current @endif">
                            <div class="nav-img"></div>
                            <a href="{{ route('web.poker') }}"
                               class="" title="棋牌游戏"
                            >棋牌游戏</a>
                        </li>
                        <li id="LS-memberexclusiveii"
                            class="LS-memberexclusiveii @if($web_route == 'web.activityList') current @endif">
                            <div class="nav-img"></div>
                            <a href="{{ route('web.activityList') }}"
                               class="" title="优惠活动"
                            >优惠活动</a>
                            <!-- 子選單 -->
                        </li>
                        <li id="LS-mobile" class="LS-mobile ">
                            <div class="nav-img"></div>
                            <a href="javascript:;"
                               class="" title="手机下注"
                            >手机下注</a>
                            <!-- 子選單 -->
                        </li>
                        <li id="LS-service" class="LS-service">
                            <div class="nav-img"></div>
                            <a href="javascript:;"
                               onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')"
                               class="" title="在线客服">在线客服</a>
                            <!-- 子選單 -->
                        </li>
                    </ul>
                </div>
            </div>
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
    @if($_member->is_trans_on == 1)
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
    @endif
</script>