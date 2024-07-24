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


<!--header-->
<div>
    <div class="header">
        <div class="w clearfix">
            <a href="javascript:;" class="logo fl">
                <img src="{{ $_system_config->site_logo}}" alt="">
            </a>
            <div class="head-r fr">
                <div class="head-tips">
                    会员大额提现均可在 <br>
                    {{ $_system_config->site_name }}进行提现 <br>
                    单日最高<strong class="l" style="color:#FFCE4B">3000万</strong>澳元
                </div>
                <div class="head-r-links fr">
                    <ul class="head-nav" style="z-index:9999">
                        <li style="margin-top: 7px; margin-left: 20px; cursor: pointer; z-index: 9999;">
                            <a href="javascript:void(0)" style="color: #C5AE80">
                                <img src="{{ asset('/web/mb5/images/paizhao.png') }}">合法牌照展示
                            </a>
                            <div class="hover-img" style="z-index:9999">
                                <img src="{{ asset('/web/mb5/images/pzs.png') }}" style="z-index:9999">
                            </div>
                        </li>
                    </ul>
                    |
                    <a href="{{ route('web.activityList') }}"><span>优惠活动</span></a><em>|</em>
                    <a href="{{ route('web.activityList') }}" target="_blank" class="l"
                       style="display:none;"><span>优惠活动大厅</span></a>
                    <em style="display:none;">|</em>
                    <a href="{{ route('member.userCenter') }}" class="red" target="_blank" style="display:none;"><span>VIP等级查询</span></a>
                    <em style="display:none;">|</em>
                    <a href="javascript:void(0);"><span>最权威娱乐城</span></a>
                    <em>|</em><a href="javascript:void(0);" target="_blank"><span>出款3分钟</span></a>
                    <a href="javascript:;" class="flag"><img src="{{ asset('/web/mb5/images/flag-1.png') }}"/></a>
                    <a href="javascript:;" class="flag"><img src="{{ asset('/web/mb5/images/flag-2.png') }}"/></a>
                    <a href="javascript:;" class="flag"><img src="{{ asset('/web/mb5/images/flag-3.png') }}"/></a>
                </div>
                <div class="h10"></div>

                <div class="head-form">
                    <img src="{{ asset('/web/mb5/images/img1.png') }}" alt="">
                </div>

            </div>
        </div>
    </div>

    <div class="denav">
        <div class="inner">
            <ul>
                <li @if($web_route == 'web.index') class="cur" @endif>
                    <a href="{{ route('web.index') }}" target="_top">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon1.png') }}" alt=""/></p>
                        <p class="denvwz">网站首页</p>
                    </a>
                    <div class=""></div>
                </li>

                <li @if($web_route == 'web.eGame') class="cur" @endif>
                    <a href="{{ route('web.eGame') }}">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon4.png') }}" alt=""/></p>
                        <p class="denvwz">電子游艺</p>
                    </a>
                </li>
                <li @if($web_route == 'web.lottory') class="cur" @endif>
                    <a href="{{ route('web.lottory') }}">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon6.png') }}" alt=""/></p>
                        <p class="denvwz">彩票游戏</p>
                    </a>
                </li>
                <li @if($web_route == 'web.liveCasino') class="cur" @endif>
                    <a href="{{ route('web.liveCasino') }}">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon11.png') }}" alt=""/></p>
                        <p class="denvwz">真人視訊</p>
                    </a>
                </li>
                <li @if($web_route == 'web.esports') class="cur" @endif>
                    <a href="{{ route('web.esports') }}">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon8.png') }}" alt=""/></p>
                        <p class="denvwz">體育投注</p>
                    </a>
                </li>
                <li @if($web_route == 'web.poker') class="cur" @endif>
                    <a href="{{ route('web.poker') }}">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon7.png') }}" alt=""/></p>
                        <p class="denvwz">棋牌游戏</p>
                    </a>
                </li>
                <li @if($web_route == 'web.activityList') class="cur" @endif>
                    <a href="{{ route('web.activityList') }}">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon9.png') }}" alt=""/></p>
                        <p class="denvwz">优惠活动 </p>
                    </a>
                </li>
                <li>
                    <a href="{{ $_system_config->app_link }}" target="_blank">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon12.png') }}" alt=""/></p>
                        <p class="denvwz">手机投注 </p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;"
                       onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        <p class="denimg"><img src="{{ asset('/web/mb5/images/nav_icon10.png') }}" alt=""/></p>
                        <p class="denvwz">在线客服</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @if($web_route != 'web.index')
        <div class="dengbx">
            <div class="inner">
                <div class="gifbx">
                    <img src="{{ asset('/web/mb5/images/title02.png') }}" alt="">
                </div>
                @if (Auth::guard('member')->guest())
                    <form action="{{ route('member.login.post') }}" method="post">
                        <div class="dengul">
                            <ul>
                                <li>
                                    <input type="text" class="denginpt icon1" name="name" placeholder="账号">
                                </li>
                                <li>
                                    <input type="password" class="denginpt icon2" name="password" placeholder="密码">
                                </li>
                                <li>
                                    <input type="text" class="denginpt icon3" name="captcha">
                                    <a onclick="javascript:re_captcha();" title="点击刷新验证码" class="masnx">
                                        <img class="valiCodeImg" src="{{ URL('kit/captcha/1') }}"
                                             id="c2c98f0de5a04167a9e427d883690ff6" style="width: 72px">
                                    </a>
                                    <script>
                                        function re_captcha() {
                                            $url = "{{ URL('kit/captcha') }}";
                                            $url = $url + "/" + Math.random();
                                            document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                        }
                                    </script>
                                </li>
                                <li>
                                    <a href="javascript:;" class="huiyder modal-login_submit ajax-submit-btn">会员登入</a>
                                </li>
                                <li>
                                    <a href="{{ route('web.register_one') }}" class="zhucemb">免费注册</a>
                                </li>
                            </ul>
                        </div>
                    </form>
                @else
                    <div class="dengul">
                        <div class="denghobx" style="display: initial;">
                            <span class="huang pr30">帐号：{{ $_member->name }}  </span>
                            <span class="huang pr30"> 余额： <strong class="money">{{ $_member->money }} </strong></span>
                        </div>
                        @if($_system_config ->is_new_center == 1)
                            <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;
                            @else
                            <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;|&nbsp;
                            <a href="{{ route('member.customer_report') }}">投注记录</a>&nbsp;|&nbsp;
                            <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;|&nbsp;
                            <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;|&nbsp;
                            <a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;|&nbsp;
                            <a href="{{ route('member.customer_report') }}">投注报表</a>
                        @endif
                            <a class="huang" href="{{ route('member.logout') }}" style="color: #fff000"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>


                    </div>
                @endif
            </div>
        </div>
    @endif
</div>

@if($web_route == 'web.index')
    <div class="bandeng">
        <div class="dutltls">
            <img src="{{ asset('/web/mb5/images/dengtlx.png') }}" alt="">
        </div>
        @if (Auth::guard('member')->guest())
            <form action="{{ route('member.login.post') }}" method="post">
                <div class="dengul">
                    <ul>
                        <li>
                            <input type="text" class="denginpt icon1" name="name" placeholder="账号">
                        </li>
                        <li>
                            <input type="password" class="denginpt icon2" name="password" placeholder="密码">
                        </li>
                        <li>
                            <input type="text" class="denginpt icon3" name="captcha">
                            <a onclick="javascript:re_captcha();" title="点击刷新验证码" class="masnx">
                                <img class="valiCodeImg" src="{{ URL('kit/captcha/1') }}"
                                     id="c2c98f0de5a04167a9e427d883690ff6"
                                     style="width: 72px">
                            </a>
                            <script>
                                function re_captcha() {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                }
                            </script>
                        </li>
                    </ul>
                </div>
                <div class="dengbdsm">
                    <a href="javascript:;" class="dengmxsb modal-login_submit ajax-submit-btn"></a>
                    <a href="javascript:;" class="zhusubtnd"></a>
                    <a href="{{ route('web.register_one') }}" class="ksiaibt"></a>
                </div>
            </form>
        @else
            <div class="denghoms">
                <span>帐号 : {{ $_member->name }}</span>
                <br>
                <span style="margin-bottom: 15px;display: block">账户余额 : <strong class="money">{{ $_member->money }}</strong></span>
                @if($_system_config ->is_new_center == 1)
                    <a href="{{ route('member.userCenter') }}">会员中心</a>
                    @else
                <a href="{{ route('member.userCenter') }}">会员中心</a>
                <a href="{{ route('member.customer_report') }}">投注记录</a>
                <a href="{{ route('member.member_drawing') }}">线上取款</a>
                <br>
                <a href="{{ route('member.finance_center') }}">线上存款</a>
                <a href="{{ route('member.indoor_transfer') }}">接口余额</a>
                <a href="{{ route('member.customer_report') }}">投注报表</a>
                @endif
            </div>
            <a class="ansubtn quit_btn" href="{{ route('member.logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();"></a>
            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        @endif
    </div>
@endif

<div class="hb_in">
    <a href="{{ route('web.red') }}" target="_blank">
        <img src="{{ asset('/web/mb5/images/hb_in.png') }}" alt="">
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
{{--<script>--}}
{{--(function ($) {--}}
{{--$(function () {--}}
{{--$('.nav').on('mouseenter', 'li', function () {--}}
{{--var $dl = $(this).find('dl');--}}
{{--if ($dl) {--}}
{{--$dl.stop();--}}
{{--$dl.slideDown(400);--}}
{{--}--}}
{{--}).on('mouseleave', 'li', function () {--}}
{{--var $dl = $(this).find('dl');--}}
{{--if ($dl) {--}}
{{--$dl.stop();--}}
{{--$dl.slideUp(400);--}}
{{--}--}}
{{--});--}}

{{--})--}}
{{--})(jQuery)--}}
{{--</script>--}}