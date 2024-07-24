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
                {{--<div class="modal-login_line code">--}}
                {{--<input type="text" placeholder="请输入验证码" required name="code">--}}
                {{--<img src="" alt="" width="100">--}}
                {{--</div>--}}
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
        @if (Auth::guard('member')->guest())
            <div class="index-login left">
                <div class="index-login">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <div class="top">
                            <div class="module">
                                <input type="text" name="name" class="inp" placeholder="账号">
                                {{--<span class="tips">@kz</span>--}}
                            </div>
                            <div class="module ">
                                <input type="password" name="password" class="inp" placeholder="密码">
                            </div>
                            <button class="login-btn modal-login_submit ajax-submit-btn">登入</button>
                        </div>
                        <div class="bot">
                            <div class="module modify">
                                <input type="text" name="captcha" class="inp " placeholder="验证码">
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
                            <a class="forget" href="javascript:;">忘记密码</a>
                            <a class="forget" href="{{ route('web.register_one') }}">免费注册</a>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="after-login left">
                <div>
                    账号：{{ $_member->name }} &nbsp;&nbsp; 余额：<strong class="money">{{ $_member->all_money }}</strong> &nbsp;剩余码量：<strong class="money">{{ $_member->ml_money }}</strong> &nbsp;
					
                    {{--<a href="javascript:;"><img src="images/add.png"></a>--}}
                </div>
                <div>
                    @if($_system_config->is_new_center == 1)
                        <a href="{{ route('member.userCenter') }}?type=6"><img src="{{ asset('/web/mb15/images/user.png') }}">会员中心</a>
					<a href="{{ route('member.userCenter') }}?type=1"><img src="{{ asset('/web/mb15/images/user.png') }}">存取款</a>
					
					<a href="{{ route('member.userCenter') }}?type=4"><img src="{{ asset('/web/mb15/images/user.png') }}">账户记录</a>
                        @else
                    <a href="{{ route('member.userCenter') }}"><img src="{{ asset('/web/mb15/images/user.png') }}">会员中心</a>&nbsp;|&nbsp;
                    <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;|&nbsp;
                    <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;|&nbsp;
                    <a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;|&nbsp;
                    <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>
                    <a class="exit" href="{{ route('member.logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"></a>
                    @endif
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endif
        <div class="logo">
            <div class="con">
                <a href="javascript:;">
                    <img src="{{ $_system_config->site_logo }}" alt="">
                </a>
            </div>
        </div>
        <div class="link right">
            <a href="{{route('daili.init')}}" target="_blank" class="link01">代理登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="{{ route('web.activityList') }}" class="link02">优惠活动办理大厅</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="{{ route('member.finance_center') }}" class="link03">微信、支付宝 一键入款</a>&nbsp;&nbsp;
            <a href="javascript:;" class="link04"><img src="{{ asset('/web') }}/mb15/images/hk.png" title="繁体中文"></a>
            <a href="javascript:;" class="link05"><img src="{{ asset('/web') }}/mb15/images/cn.png" title="简体中文"></a>
            <a href="javascript:;" class="link06"><img src="{{ asset('/web') }}/mb15/images/usa.png" title="English"></a>
        </div>
        <div class="nav">
            <ul class="menu">
                <li class="@if($web_route == 'web.index') on @endif">
                    <a class="Nav_one" href="{{ route('web.index') }}">首页</a>
                </li>
                <li class="LS-Ball @if($web_route == 'web.esports') on @endif">
                    <a href="{{ route('web.esports') }}" class="poplogin">体育赛事</a>
                    {{--<div class="moveNav pe_nav" style="display: block;">--}}
                        {{--<div class="con">--}}
                            {{--<span class="before"></span>--}}
                            {{--@if(in_array('BBIN', $_api_list))--}}
                                {{--<a href="javascript:;"--}}
                                   {{--@if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?gametype=ball','','width=1024,height=768')"--}}
                                   {{--@else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BB体育</a>--}}
                            {{--@endif--}}
                            {{--@if(in_array('IBC', $_api_list))--}}
                                {{--<a href="javascript:;"--}}
                                   {{--@if($_member) onclick="javascript:window.open('{{ route('ibc.playGame') }}','','width=1024,height=768')"--}}
                                   {{--@else onclick="return layer.msg('请先登录！',{icon:6})" @endif>沙巴体育</a>--}}
                            {{--@endif--}}
                            {{--<span class="after"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </li>
                <li class="LS-live @if($web_route == 'web.liveCasino') on @endif">
                    <a href="{{ route('web.liveCasino') }}" class="">视讯直播</a>
                    {{--<div class="moveNav real_nav">--}}
                        {{--<span class="before"></span>--}}
                        {{--@if(in_array('AG', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>AG视讯</a>--}}
                        {{--@endif--}}
                        {{--@if(in_array('BBIN', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('bbin.playGame') }}?gametype=live','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BB视讯</a>--}}
                        {{--@endif--}}
                        {{--@if(in_array('AB', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('ab.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>欧博视讯</a>--}}
                        {{--@endif--}}
                        {{--@if(in_array('MG', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('mg.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>MG视讯</a>--}}
                        {{--@endif--}}
                        {{--@if(in_array('BG', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('bg.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BG视讯</a>--}}
                        {{--@endif--}}
                        {{--@if(in_array('PT', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('pt.playGame') }}?gametype=vbal','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>PT视讯</a>--}}
                        {{--@endif--}}
                        {{--@if(in_array('CG', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('cg.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>CG视讯</a>--}}
                        {{--@endif--}}
                        {{--@if(in_array('SA', $_api_list))--}}
                            {{--<a href="javascript:;"--}}
                               {{--@if($_member) onclick="javascript:window.open('{{ route('sa.playGame') }}','','width=1024,height=768')"--}}
                               {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>SA视讯</a>--}}
                        {{--@endif--}}
                        {{--<span class="after"></span>--}}
                    {{--</div>--}}
                </li>
                <li class="LS-game @if($web_route == 'web.eGame') on @endif">
                    <a href="{{ route('web.eGame') }}" class="">电子游艺</a>
                    {{--<div class="moveNav real_nav">--}}
                        {{--<span class="before"></span>--}}
                        {{--<a href="{{ route('web.eGame') }}?api_name=PT">PT电子</a>--}}
                        {{--<a href="{{ route('web.eGame') }}?api_name=MG">MG电子</a>--}}
                        {{--<a href="{{ route('web.eGame') }}?api_name=BBIN">BB电子</a>--}}
                        {{--<a href="{{ route('web.eGame') }}?api_name=SA">SA电子</a>--}}
                        {{--<a href="{{ route('web.eGame') }}?api_name=DT">DT电子</a>--}}
                        {{--<a href="{{ route('web.eGame') }}?api_name=TTG">TTG电子</a>--}}
                        {{--<a href="javascript:;"--}}
                           {{--@if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?gametype=8','','width=1024,height=768')"--}}
                           {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>AG电子</a>--}}
                        {{--<span class="after"></span>--}}
                    {{--</div>--}}
                </li>
                <li class="LS-ltlottery @if($web_route == 'web.lottory') on @endif">
                    <a href="{{ route('web.lottory') }}" class="">彩票游戏</a>
                </li>
                <li class="LS-mobile  @if($web_route == 'web.poker') on @endif">
                    <a href="{{ route('web.poker') }}">棋牌游戏</a>
                </li>
                <li class="LS-memberexclusiveii @if($web_route == 'web.activityList') on @endif">
                    <a href="{{ route('web.activityList') }}" class="">优惠活动</a>
                </li>
                <li class="LS-service">
                    <a href="javascript:;" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    (function ($) {
        $(function () {
            colorChange([{
                obj: '.index-login .forget',
                sourcrCr: 'rgb(239, 233, 169)',
                afterCr: 'rgb(0, 255, 0)'
            }, {
                obj: '.header .link .link03',
                sourcrCr: '#333',
                afterCr: 'rgb(223, 49, 32)'
            }, {
                obj: '.header .link .link02',
                sourcrCr: 'rgb(235, 20, 185)',
                afterCr: 'rgb(250, 5, 13)'
            }, {obj: 'ul.menu .LS-memberexclusiveii>a', sourcrCr: '#333', afterCr: 'rgb(255, 250, 34)'}]);
        });
    })(jQuery);
</script>


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
                }
            }
        })
    })
    @endif
</script>