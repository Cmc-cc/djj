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


<div id="headerbg">
    <div class="header">
        <div class="top">
            <div class="logo">
                <span id="logoID">
                    <img src="{{ $_system_config->site_logo }}" alt="">
                </span>
            </div>
            <div class="login">
                <div class="up">
                    <ul>
                        <li><a style="color: white;" href="javascript:;" class="daili_apply">代理申请</a></li>
                        <li class="line">|</li>
                        <li><a style="color: white" href="{{route('daili.init')}}" target="_blank">代理登录</a></li>
                        {{--<li class="line">|</li>--}}
                        {{--<li><a href="javascript:void(0);">加入最爱</a></li>--}}
                        <li><a href="#"><img src="{{ asset('/web/mb8/images/icon_lang01.jpg') }}"/></a></li>
                        <li><a href="#"><img src="{{ asset('/web/mb8/images/icon_lang02.jpg') }}"/></a></li>
                        <li><a href="#"><img src="{{ asset('/web/mb8/images/icon_lang03.jpg') }}"/></a></li>
                    </ul>
                </div>
                <div class="down">
                    @if (Auth::guard('member')->guest())
                        <form method="post" action="{{ route('member.login.post') }}">
                            <table>
                                <tr>
                                    <td>
                                        <input type="text" tabindex="1" placeholder="用户名:"
                                               maxlength="12" name="name" id="username"
                                               class="text" size="12">
                                    </td>
                                    <td>
                                        <input type="password" tabindex="2" placeholder="密码:"
                                               class="text" name="password">
                                    </td>
                                    <td rowspan="2">
                                        <div class="submit">
                                            <a href="javascript:;" class="sub modal-login_submit ajax-submit-btn"></a>
                                        </div>
                                    </td>
                                    <td rowspan="2">
                                        <div class="reg">
                                            <a href="{{ route('web.register_one') }}" class="register">立即注册</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" title="( 点选此处产生新验证码 )" tabindex="3" maxlength="4" size="4"
                                               placeholder="验证码:" class="text code" name="captcha">
                                        <a href="javascript:;" onclick="javascript:re_captcha();">
                                            <img class="form-yzm-img vm" id="c2c98f0de5a04167a9e427d883690ff6"
                                                 alt="点击更换"
                                                 src="{{ URL('kit/captcha/1') }}">
                                        </a>
                                        <script>
                                            function re_captcha() {
                                                $url = "{{ URL('kit/captcha') }}";
                                                $url = $url + "/" + Math.random();
                                                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                            }
                                        </script>
                                    </td>
                                    <td><a href="javascript:void(0);" onclick="alert('请联系在线客服');"
                                           class="forget">忘记密码?</a></td>
                                </tr>
                            </table>
                        </form>
                        <!--登录前 end-->
                    @else
                        <style>
                            .userImfo a{
                                color: white;
                            }
                        </style>
                        <p class="userImfo">
                            帐号：<font class="col-yellow">{{ $_member->name }}</font>&nbsp|&nbsp
                            系统余额：<font class="col-yellow money" id="user_money">{{ $_member->money }}</font><span>&nbsp;|&nbsp;</span>

                            {{--投注金额：<font class="col-yellow" id="tz_money">3</font><br/>--}}

                            @if($_system_config->is_new_center ==1)
                                <a href="{{ route('member.userCenter') }}">会员中心</a><span>&nbsp;|&nbsp;</span>
                            @else
                                <br/>
                            <a href="{{ route('member.userCenter') }}">会员中心</a><span>&nbsp;|&nbsp;</span>
                            <a href="{{ route('member.finance_center') }}">线上存款 </a><span>&nbsp;|&nbsp;</span>
                            <a href="{{ route('member.member_drawing') }}">线上取款 </a><span>&nbsp;|&nbsp;</span>
                            <a href="{{ route('member.indoor_transfer') }}" class="nav-promotion">接口余额</a><span>&nbsp;|&nbsp;</span>
                            <a href="{{ route('member.customer_report') }}">往来记录 </a><span>&nbsp;|&nbsp;</span>
                            <a href="{{route('daili.init')}}" target="_blank">代理中心 </a><span>&nbsp;|&nbsp;</span>
                            <a href="javascript:;" title="申请代理" class="daili_apply">申请代理</a><span>&nbsp;|&nbsp;</span>
                            <a href="{{ route('member.message_list') }}">
                                未读讯息(
                                <font class="col_money" id="user_num" style="color: #fff">
                                    {{ $_not_read_message_num }}
                                </font>
                                )
                            </a><span>&nbsp;|&nbsp;</span>
                            @endif
                            <a href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                        </p>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <!--登录后 end-->
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="nav">
        <ul>
            <li class="move"></li>
            <li id="LS-first" class="@if($web_route == 'web.index') on @endif">
                <a href="{{ route('web.index') }}" id="index">首页</a>
            </li>
            <li id="LS-ageng" class="@if($web_route == 'web.eGame') on @endif">
                <a href="{{ route('web.eGame') }}">電子游戏</a>
            </li>
            <li id="LS-sports" class="game list1 @if($web_route == 'web.esports') on @endif">
                <a href="{{ route('web.esports') }}">體育赛事</a>
            </li>
            <li id="LS-LiveMain" class="game list2 LS-LiveMain @if($web_route == 'web.liveCasino') on @endif">
                <a href="{{ route('web.liveCasino') }}">真人娱乐</a>
            </li>
            <li id="LS-Lottery" class="game list3 @if($web_route == 'web.lottory') on @endif">
                <a href="{{ route('web.lottory') }}">彩票游戏</a>
            </li>
            <li id="LS-Game" class="game LS-Game @if($web_route == 'web.catchFish') on @endif">
                <a href="{{ route('web.catchFish') }}">捕魚游戏</a>
            </li>
            <li id="LS-poker" class="hot @if($web_route == 'web.poker') on @endif">
                <a href="{{ route('web.poker') }}">棋牌游戏</a>
                <span></span>
            </li>
            <li id="LS-pre" class="hot @if($web_route == 'web.activityList') on @endif">
                <a href="{{ route('web.activityList') }}">优惠活动</a>
                <span></span>
            </li>
            <li>
                <a href="{{ $_system_config->app_link }}" target="_blank">手机投注</a>
            </li>
        </ul>
        <a href="javascript:void(0);" class="online"
           onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">online</a>
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