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
                <div class="modal-login_line code">
                    <input type="text" placeholder="请输入验证码" required name="code">
                    <img src="" alt="" width="100">
                </div>
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
    <div class="container">
        <div class="header_hd clear">
            <div class="pullLeft" style="padding-left: 50px;line-height: 22px;">
                <a href="javascript:;" class="lang"></a>
                <a href="javascript:;" class="lang" style="background-position: center -41px"></a>
                <a href="javascript:;" class="lang" style="background-position: center -81px"></a>
                <span style="margin-left: 10px;">美东时间: <em id="mdtime"></em></span>
                {{--<a href="" style="color: #0BFD00">MG电子</a>&nbsp;|--}}
                {{--<a href="" style="color: #E91818">在线申请活动</a>&nbsp;|--}}
                {{--<a href="" style="color: #F7EB2B">资讯端下载</a>&nbsp;|--}}
                {{--<a href="" style="color: #CC9494">问卷调查</a>&nbsp;|--}}
                {{--<a href="" style="color: #22C6F0">AG免费试玩</a>--}}
            </div>
            <div class="pullRight">
                <a href="javascript:;" style="max-width: none">菲律宾国际热线 : {{ $_system_config->phone1 }}</a>&nbsp;
				 <a href="javascript:;" class="daili_apply">代理加盟</a>&nbsp;|&nbsp;
                <a href="{{route('daili.init')}}" target="_blank">代理登录</a>&nbsp;|&nbsp;
                {{--<a href="javascript:;" style="color: #F81E6B">下载专区</a>&nbsp;|--}}
                {{--<a href="javascript:;" style="color: #DC9A1D">路线检测</a>--}}
            </div>
        </div>
        <div class="header_bd clear">
            <a href="" class="pullLeft header-logo">
                <img src="{{ $_system_config->site_logo }}" alt="">
            </a>
            <div class="login-warp pullRight">
                @if (Auth::guard('member')->guest())
                    <form method="POST" action="{{ route('member.login.post') }}" class="clear">
                        <div class="pullLeft">
                        <a href="{{ route('web.register_one') }}" class="header-join"></a>
                        </div>
                        <div class="pullLeft login-area">
                            <div class="login-unit login-unit-user">
                                <input type="text" placeholder="用户名" name="name">
                            </div>
                            <div class="login-unit login-unit-psw">
                                <input type="password" placeholder="密码" name="password">
                            </div>
                            <div class="login-unit login-unit-chk">
                                <input type="text" placeholder="验证码" name="captcha">
                                <a class="vPic" onclick="javascript:re_captcha_re();" >
                                <img src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff11"
                                     height="100%">
                                </a>
                                <script>
                                    function re_captcha_re() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff11').src=$url;
                                    }
                                </script>
                            </div>
                            <!--<a href="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768');" class="forget-pw">忘记密码</a>-->
                            <a href="{{route('daili.init')}}" class="forget-pw" target="_blank">代理登录</a>
                            <input type="button" value="" class="login-submit ajax-submit-btn">
                        </div>
                    </form>
                @else
                    <div class="isLogin clear">
                        <div class="mem-info">
                            账号：{{ $_member->name }}&nbsp;&nbsp;&nbsp;
							余额：<strong class="money">{{ $_member->all_money }}</strong>元&nbsp;&nbsp;&nbsp;
							剩余码量：<strong class="money">{{ $_member->ml_money }}</strong>元&nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">登出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <div class="SU-Menual-box">
                            <div class="SU-Menual">
                                <ul>
                                    @if($_system_config ->is_new_center == 1)
                                        <li><a href="{{ route('member.userCenter') }}?type=6">会员中心</a></li>
									 <li><a href="{{ route('member.userCenter') }}?type=1">存取款</a></li>									 
									   <li><a href="{{ route('member.userCenter') }}?type=4">账户记录</a></li>
									
									 
                                    @else
                                    <li><a href="{{ route('member.userCenter') }}">会员中心</a></li>
                                    <li><a href="{{ route('member.finance_center') }}">线上存款</a></li>
                                    <li><a href="{{ route('member.member_drawing') }}">线上取款</a></li>
                                    <li><a href="{{ route('member.indoor_transfer') }}">接口余额</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="header_ft">
            <div class="mainnav">
                <ul class="clear">
                    <li @if($web_route == 'web.index') class="active" @endif>
                        <a href="{{ route('web.index') }}">
                            首页
                            <span>Home</span>
                        </a>
                    </li>
                    <li @if($web_route == 'web.eGame') class="active" @endif>
                        <a href="{{ route('web.eGame') }}" class="header_slideDown">
                            电子游艺
                            <span>CASINO</span>
                        </a>
                        {{--<div class="header_slideDown-item">--}}
                            {{--<a href="{{ route('web.eGame') }}">PT电子</a>--}}
                            {{--<a href="{{ route('web.eGame') }}?api_name=MG">MG电子</a>--}}
                            {{--<a href="{{ route('web.eGame') }}?api_name=BBIN">BB电子</a>--}}
                            {{--<a href="{{ route('web.eGame') }}?api_name=SA">SA电子</a>--}}
                            {{--<a href="{{ route('web.eGame') }}?api_name=DT">DT电子</a>--}}
                            {{--<a href="{{ route('web.eGame') }}">TTG电子</a>--}}
                            {{--<a href="{{ route('web.eGame') }}">AG电子</a>--}}
                        {{--</div>--}}
                    </li>
                    <li @if($web_route == 'web.catchFish') class="active" @endif>
                        <a href="{{ route('web.catchFish') }}" class="header_slideDown">
                            捕鱼游戏
                            <span>CASINO</span>
                        </a>
                        {{--<div class="header_slideDown-item">--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?gametype=6','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>AG捕鱼</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('pt.playGame') }}?gametype=cashfi','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})"  @endif>PT捕鱼</a>--}}
                        {{--</div>--}}
                    </li>
                    <li @if($web_route == 'web.liveCasino') class="active" @endif>
                        <a href="{{ route('web.liveCasino') }}" class="header_slideDown">
                            视讯直播
                            <span>LIVE CASINO</span>
                        </a>
                        {{--<div class="header_slideDown-item">--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('pt.playGame') }}?gametype=vbal','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>PT视讯</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('mg.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>MG视讯</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?gametype=live','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BB视讯</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>SA视讯</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>AG视讯</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('bg.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BG视讯</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('cg.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>CG视讯</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('ab.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>AB视讯</a>--}}
                        {{--</div>--}}
                    </li>
                    <li @if($web_route == 'web.esports') class="active" @endif>
                        <a href="{{ route('web.esports') }}" class="header_slideDown">
                            体育赛事
                            <span>SPORTS</span>
                        </a>
                        {{--<div class="header_slideDown-item">--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?gametype=ball','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录！',{icon:6})"  @endif>BB体育</a>--}}
                            {{--<a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('ibc.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录！',{icon:6})"  @endif>沙巴体育</a>--}}
                        {{--</div>--}}
                    </li>
                    <li @if($web_route == 'web.lottory') class="active" @endif>
                        <a href="{{ route('web.lottory') }}">
                            彩票游戏
                            <span>LOTTERY</span>
                        </a>
                        {{--<div class="header_slideDown-item">--}}
                            {{--<a @if($_member) href="{{ route('bbin.playGame') }}?gametype=ltlottery"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BB彩票</a>--}}
                            {{--<a  @if($_member) href="{{ route('yc.playGame') }}"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>YC彩票</a>--}}
                        {{--</div>--}}
                    </li>
                    <li @if($web_route == 'web.poker') class="active" @endif>
                        <a href="{{ route('web.poker') }}">
                            棋牌游戏
                            <span>POKER</span>
                        </a>
                    </li>
                    <li @if($web_route == 'web.activityList') class="active" @endif>
                        <a href="{{ route('web.activityList') }}">
                            优惠活动
                            <span>LOTTERY</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="javascript:;" onclick="window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                            在线客服
                            <span>ONLINE SERVICE</span>
                        </a>
                    </li> --}}
                </ul>
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