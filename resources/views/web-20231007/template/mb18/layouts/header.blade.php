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


<div id="header">
    <div id="topbox">
        <div class="top_bg zt">
            <div class="top width clear" style="font-size: 12px;">
                <div class="top_l ">
                    <ul style="margin-left:447px;">
                        <a href="javascript:void(0)" style="color: rgb(255, 0, 0);"
                           id="zhuce">会员注册量：941254↑&nbsp;&nbsp;</a>|
                        <a href="{{ $_system_config->app_link }}" target="_blank"
                           style="color:#CCD22F">手机投注&nbsp;&nbsp;</a>|
                        <a href="javascript:void(0);" class="daili_apply" style="color: red;">代理加盟&nbsp;&nbsp;</a>|
                        <a href="javascript:void(0);" style="color: white;">备用网址&nbsp;&nbsp;</a>|
                        <a id="paizhaoA" href="javascript:void(0);" style="color: rgb(255, 255, 255);"
                           onclick="menu_url(39);return false">合法牌照展示
              <span id="paizhaoImg"
                    style="position: absolute; background: rgb(0, 0, 0); border: 6px solid rgb(51, 51, 51); z-index: 99999; top: 35px; display: none;"><img
                          src="{{ asset('/web/mb18/images/paizhao.png') }}" alt=""></span>
                        </a> |
                        <a href="javascript:;">在线客服</a>
                        {{--<a onclick="getPager('-','shiwan_reg');" href="javascript:void(0);">免费试玩</a>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="logo_bg">
            <div class="logo width clear">
                <div class="logo_l fl">
                    <div id="indexLgDIV" style="width:305px;height:103px;margin-top:00px;">
                        <a href="{{ route('web.index') }}"><img src="{{ $_system_config->site_logo}}" class="logoObj"></a>
                    </div>
                </div>
                <div class="logo_ll fl">
                   
                </div>
                @if (Auth::guard('member')->guest())
                    <div class="logo_r fr">
                        <form method="POST" action="{{ route('member.login.post') }}">
                            <div>
                                <ul>
                                    <li>
                                        <input type="text" name="name" id="username" tabindex="1" placeholder='帐户'>
                                        <p><a href="javascript:;" onclick="layer.msg('忘记账号，请联系在线客服人员取回！')">忘记账号</a></p>
                                    </li>
                                    <li>
                                        <input type="password" name="password" tabindex="2" id="password"
                                               placeholder="******">
                                        <p class="logo_r_on"><a href="javascript:;"
                                                                onclick="layer.msg('忘记密码，请联系在线客服人员取回！')">忘记密码</a></p>
                                    </li>
                                    <li>
                                        <div class="logo_yz">
                                            <input name="captcha" type="text" tabindex="3" id="rmNum" placeholder="验证码">
                                           
                                            {{--height="25">--}}
                                            <a href="javascript:;" id="vImg" onclick="javascript:re_captcha();">
                                                <img src="{{ URL('kit/captcha/1') }}"
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
                                        <p><a href="javascript:;" onclick="javascript:re_captcha();">刷新验证码</a></p>
                                    </li>
                                    <li>
                                        <input type="submit" tabindex="4" value="登&nbsp;陆"
                                               class="log_btn modal-login_submit ajax-submit-btn">
                                        <p style="margin-left: 13px;"><a href="javascript:void(0);"
                                                                         class="modal-login_submit ajax-submit-btn">LOGIN</a>
                                        </p>
                                    </li>
                                    <li>
                                        <a class="myie" href="{{ route('web.register_one') }}">注&nbsp;册</a>
                                        <p><a href="{{ route('web.register_one') }}">JOIN US</a></p>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="logo_r fr">
                        <div style="color: #dcdcdc;width: 425px;line-height: 28px; text-align: right;">
                            <span style="margin-right:-6px">帐号：{{ $_member->name }}&nbsp;&nbsp;&nbsp;&nbsp;账户余额：<font
                                        id="user_money" class="money">{{ $_member->all_money }}</font></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;剩余码量：<font
                                        id="user_money" class="money">{{ $_member->ml_money }}</font></span>
                            <br/>
                            @if($_system_config->is_new_center ==1)
                                <a href="{{ route('member.userCenter') }}?type=6" style="color: white;">会员中心</a> |
							  <a href="{{ route('member.userCenter') }}?type=1" style="color: white;">存取款</a> |							 
							  <a href="{{ route('member.userCenter') }}?type=4" style="color: white;">账户记录</a> |
							
							
                                @else

                            <a href="{{ route('member.finance_center') }}" style="color: white;">线上存款</a> |
                            <a href="{{ route('member.member_drawing') }}" style="color: white;">线上取款</a> |
                            <a href="{{ route('member.indoor_transfer') }}" style="color: #ffff00;">接口余额 </a> |
                            <a href="{{ route('member.customer_report') }}" style="color: white;">下注记录</a> |
                            <a href="javascript:;" class="daili_apply" style="color: white;">申请代理</a> |
                            <a href="{{ route('member.userCenter') }}" style="color: white;">会员中心</a> |
                            @endif
                            <a href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               style="color: white;margin-right:5px;">退出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <div class="nav_bg">
        <div class="nav width clear" id="menulist">
            <ul>
                <li class="nav_lion @if($web_route == 'web.index') active @endif">
                    <a href="{{ route('web.index') }}" target="_top">网站首页</a>
                </li>
                <li class="erji @if($web_route == 'web.eGame') active @endif">
                    <a href="{{ route('web.eGame') }}" id="tabdzyy" style="color: rgb(255, 255, 0);">电子游艺</a>
                </li>
                <li class="erji @if($web_route == 'web.liveCasino') active @endif">
                    <a href="{{ route('web.liveCasino') }}">真人娱乐</a>
                </li>
                <li class="erji @if($web_route == 'web.catchFish') active @endif">
                    <a href="{{ route('web.catchFish') }}" id="lottery" style="color: rgb(255, 255, 0);">捕鱼游戏</a>
                    <img src="{{ asset('/web/mb18/images/hot.gif') }}">
                </li>
                <li class="erji @if($web_route == 'web.lottory') active @endif">
                    <a href="{{ route('web.lottory') }}" id="lottery1" style="color: rgb(255, 255, 0);">彩票游戏</a>
                    <img src="{{ asset('/web/mb18/images/hot.gif') }}">
                </li>
                <li class="erji @if($web_route == 'web.esports') active @endif">
                    <a href="{{ route('web.esports') }}">体育竞技</a>
                </li>
                <li class="erji @if($web_route == 'web.poker') active @endif">
                    <a href="{{ route('web.poker') }}">棋牌游戏</a>
                </li>
                <li class="erji @if($web_route == 'web.activityList') active @endif">
                    <a href="{{ route('web.activityList') }}" style="color:lightpink">优惠活动</a>
                    <img src="{{ asset('/web/mb18/images/hot.gif') }}">
                </li>
                <li>
                    <a href="javascript:;"
                       onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        在线客服
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