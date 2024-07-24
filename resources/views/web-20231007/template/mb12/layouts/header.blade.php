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
@if(!in_array($web_route,['web.login','web.register_one']))
    @if (Auth::guard('member')->guest())
        <div class="nav-news">
            <h2><span>会员登录<em>LOGIN</em></span></h2>
            <form method="POST" action="{{ route('member.login.post') }}">
                <div class="line">
                    <span class="tit"><img src="{{ asset('/web') }}/mb12/images/key1.png">帐号</span>
                    <input class="inp" type="text" name="name">
                </div>
                <div class="line">
                    <span class="tit"><img src="{{ asset('/web') }}/mb12/images/key2.png">密码</span>
                    <input class="inp" type="password" name="password">
                </div>
                <div class="line">
                    <span class="tit"><img src="{{ asset('/web') }}/mb12/images/key3.png">验证码</span>
                    <input class="inp" type="text" name="captcha">
                    <a class="vPic" onclick="javascript:re_captcha();"><img src="{{ URL('kit/captcha/1') }}"
                                                                            id="c2c98f0de5a04167a9e427d883690ff6"></a>
                    <script>
                        function re_captcha() {
                            $url = "{{ URL('kit/captcha') }}";
                            $url = $url + "/" + Math.random();
                            document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                        }
                    </script>
                </div>
                <div class="last">
                    <button id="login" class="modal-login_submit ajax-submit-btn"><span class="eng">LOGIN</span>登录
                    </button>
                    <a href="{{ route('web.register_one') }}" id="register">注册<span class="eng">REGISTERED</span></a>
                </div>
            </form>

            @if($web_route == 'web.index')
                <div class="url">
                    <img src="{{ asset('/web') }}/mb12/images/domain.png">
                    <span>{{ $_system_config->site_domain }}</span>
                </div>
                <div class="scroll-news">
                    <img src="{{ asset('/web') }}/mb12/images/news.png">
                    <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="up" scrollamount=1
                             loop="infinite">
                        @foreach($_system_notices as $v)
                            <div>
                                <span>★【{{ $v->title }}】</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
                <div class="icon">
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb12/images/baninfo1.png"></a>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb12/images/baninfo2.png"></a>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb12/images/baninfo3.png"></a>
                </div>
            @endif
        </div>
    @else
        <div class="nav-news afterlogin">
            <h2><span>请查视您的账号</span></h2>
            <div class="user-info">
                <p>账号：{{ $_member->name }}</p>
                <p>
                    账户余额： $<strong class="money">{{ $_member->all_money }}</strong> 剩余码量： $<strong class="money">{{ $_member->ml_money }}</strong>
                    {{--<a href="{{ route('member.userCenter') }}">&nbsp;<img src="{{ asset('/web') }}/images/fresh.png"></a>--}}
                </p>
            </div>
            <div class="btns">
                <a class="quit" href="{{ route('member.logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
                @if($_system_config->is_new_center ==1)
                    <a href="{{ route('member.userCenter') }}" class="change-psw">个人中心</a>
                @else
                    <a href="{{ route('member.login_psw') }}" class="change-psw">修改密码</a>
                @endif
            </div>
            @if($_system_config->is_new_center !=1)
                <div class="links">
                    <p>
                        <a href="{{ route('member.userCenter') }}">用户中心</a>&nbsp;|&nbsp;
                        <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;|&nbsp;
                        <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;|&nbsp;
                        <a href="{{ route('member.customer_report') }}">投注记录</a>
                    </p>
                    <p>
                        <a href="{{ route('member.customer_report') }}">交易记录</a>&nbsp;|&nbsp;
                        <a href="{{ route('member.safe_psw') }}">修改取款密码</a>
                    </p>

                </div>
                @endif
            @if($web_route == 'web.index')
                <div class="url">
                    <img src="{{ asset('/web') }}/mb12/images/domain.png">
                    <span>{{ $_system_config->site_domain }}</span>
                </div>
                <div class="scroll-news">
                    <img src="{{ asset('/web') }}/mb12/images/news.png">
                    <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="up" scrollamount=1
                             loop="infinite">

                        @foreach($_system_notices as $v)
                            <div>
                                <span>★【{{ $v->title }}】</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
                <div class="icon">
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb12/images/baninfo1.png"></a>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb12/images/baninfo2.png"></a>
                    <a href="javascript:;"><img src="{{ asset('/web') }}/mb12/images/baninfo3.png"></a>
                </div>
            @endif
        </div>
    @endif
@endif

<div class="header">
    <div class="wrap">
        <div class="top">
            <div class="left">
                <a target="_blank" href="{{ $_system_config->app_link }}" class="yellowCr">手机下注</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                {{--<a href="javascript:;" class="blueCr">免费试玩</a>&nbsp;&nbsp;|&nbsp;&nbsp;--}}
                <a href="{{ route('web.activityList') }}" class="discount">优惠申请大厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;
              {{--  <a href="javascript:;" class="vipOffice">VIP贵宾厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;--}}
            </div>
            <div class="right">
                <a href="javascript:;" class="cooperate daili_apply">代理合作</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				 <a href="{{route('daili.init')}}" target="_blank" class="rightlink05">代理登录</a>&nbsp;&nbsp;
                {{--  <a href="javascript:;" class="pinkCr">下载专区</a>&nbsp;&nbsp;|&nbsp;&nbsp;--}}
                语言：<a href="javascript:;"><img src="{{ asset('/web/mb12/images/lg2.jpg') }}"
                                               style="display: inline-block"></a>
                <a href="javascript:;"><img src="{{ asset('/web/mb12/images/lg1.jpg') }}" style="display: inline-block"></a>
                <a href="javascript:;"><img src="{{ asset('/web/mb12/images/lg3.jpg') }}" style="display: inline-block"></a>
            </div>
        </div>
        <div class="nav">
            <ul>
                <li>
                    <a href="{{ route('web.index') }}">
                        <h4>官网首页</h4>
                        <p class="eng">HOME</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('web.poker') }}" class="mg-color">
                        <h4>棋牌游戏</h4>
                        <p class="eng">POKER</p>
                        <p class="triggle"><img src="{{ asset('/web/mb12/images/triggle.png') }}"></p>
                    </a>
                    {{--<div class="secondNav">--}}
                        {{--<span class="tipTriggle"></span>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav01.png') }}">摆脱</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav02.png') }}">宝石之轮</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav03.png') }}">花花公子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav04.png') }}">银行抢匪</a>--}}
                    {{--</div>--}}
                </li>
                <li>
                    <a href="{{ route('web.catchFish') }}">
                        <h4>捕鱼游戏</h4>
                        <p class="eng">CATCHFISH</p>
                        <p class="triggle"><img src="{{ asset('/web/mb12/images/triggle.png') }}"></p>
                    </a>
                    {{--<div class="secondNav">--}}
                        {{--<span class="tipTriggle"></span>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav05.png') }}">古怪猴子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav06.png') }}">湛蓝深海</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav07.png') }}">招财进宝</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav08.png') }}">惊喜复活节</a>--}}
                    {{--</div>--}}
                </li>
                <li>
                    <a href="{{ route('web.eGame') }}">
                        <h4>电子游艺</h4>
                        <p class="eng">CASINO</p>
                        <p class="triggle"><img src="{{ asset('/web/mb12/images/triggle.png') }}"></p>
                    </a>
                    {{--<div class="secondNav">--}}
                        {{--<span class="tipTriggle"></span>--}}
                        {{--<p class="tips">天天返水3.0%</p>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav09.png') }}">MG电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav10.png') }}">PT电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav11.png') }}">捕鱼达人</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav12.png') }}">SG电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav13.png') }}">MW电子</a>--}}
                        {{--<a href="{{ route('web.eGame') }}"><img src="{{ asset('/web/images/nav14.png') }}">BBIN电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav15.png') }}">AG电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav16.png') }}">GPI电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav17.png') }}">PRG电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav18.png') }}">GNS电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav19.png') }}">JDB电子</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav20.png') }}">HB电子</a>--}}
                    {{--</div>--}}
                </li>
                <li>
                    <a href="{{ route('web.liveCasino') }}">
                        <h4>真人娱乐</h4>
                        <p class="eng">LIVE DEALER</p>
                        <p class="triggle"><img src="{{ asset('/web/mb12/images/triggle.png') }}"></p>
                    </a>
                    {{--<div class="secondNav">--}}
                        {{--<span class="tipTriggle"></span>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav21.png') }}">AG环亚厅</a>--}}
                        {{--<a href="javascript:;"--}}
                           {{--@if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?gametype=live','','width=1024,height=768')"--}}
                           {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>--}}
                            {{--<img src="{{ asset('/web/images/nav22.gif') }}">--}}
                            {{--BBIN旗舰厅--}}
                        {{--</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav23.gif') }}">MG国际厅</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav24.gif') }}">GPI实训厅</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav25.gif') }}">PT澳门厅</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav26.gif') }}">EVO吉祥厅</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav27.gif') }}">AB真人厅</a>--}}
                    {{--</div>--}}
                </li>
                <li class="pe">
                    <a href="{{ route('web.esports') }}">
                        <h4>体育投注</h4>
                        <p class="eng">SPORT GAME</p>
                        <p class="triggle"><img src="{{ asset('/web/mb12/images/triggle.png') }}"></p>
                    </a>
                    {{--<div class="secondNav">--}}
                        {{--<span class="tipTriggle"></span>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav28.png') }}">皇冠体育</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav29.png') }}">沙巴体育</a>--}}
                        {{--<a href="javascript:;"--}}
                           {{--@if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?gametype=ball','','width=1024,height=768')"--}}
                           {{--@else onclick="return layer.msg('请先登录！',{icon:6})"  @endif>--}}
                            {{--<img src="{{ asset('/web/images/nav30.png') }}">BBIN体育--}}
                        {{--</a>--}}
                    {{--</div>--}}
                </li>
                <li>
                    <a href="{{ route('web.lottory') }}">
                        <h4>彩票游戏</h4>
                        <p class="eng">LOTTERY</p>
                        <p class="triggle"><img src="{{ asset('/web/mb12/images/triggle.png') }}"></p>
                    </a>
                    {{--<div class="secondNav">--}}
                        {{--<span class="tipTriggle"></span>--}}
                        {{--<a href="javascript:;"--}}
                           {{--@if($_member) href="{{ route('bbin.playGame') }}?gametype=ltlottery"--}}
                           {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>--}}
                            {{--<img src="{{ asset('/web/images/nav31.png') }}">BBIN彩票--}}
                        {{--</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav32.png') }}">EG彩票</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav33.png') }}">IG彩票</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav34.png') }}">EG六合彩</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav35.png') }}">IG六合彩</a>--}}
                    {{--</div>--}}
                </li>
                <li>
                    <a href="{{ route('web.activityList') }}" class="activity-color">
                        <h4>优惠活动</h4>
                        <p class="eng">PROMOTION</p>
                        <p class="triggle"><img src="{{ asset('/web/mb12/images/triggle.png') }}"></p>
                    </a>
                    {{--<div class="secondNav">--}}
                        {{--<span class="tipTriggle"></span>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav36.png') }}">一元抢购</a>--}}
                        {{--<a href="javascript:;"><img src="{{ asset('/web/images/nav37.png') }}">金管家</a>--}}
                    {{--</div>--}}
                </li>
                <li>
                    <a href="javascript:;"
                       onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        <h4>在线客服</h4>
                        <p class="eng">SERVICE</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="logo">
            <img src="{{ $_system_config->site_logo }}" alt="">
            {{--<iframe width="250" height="194" src="http://cdn.aliucdn.com:8888/Web.Portal/AF007-01.Portal/Content/Views/Shared/images/logo/LOGO.html"></iframe>--}}
        </div>
    </div>
</div>

<div class="hb_in">
    <a href="{{ route('web.red') }}" target="_blank">
        <img src="{{ asset('/web/mb12/images/hb_in.png') }}" alt="">
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
