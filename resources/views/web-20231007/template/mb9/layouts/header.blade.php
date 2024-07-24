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


<div id="mainBody">
    <div class="header">
        <div class="headerTop clearfix wrap">
            <div class="left logo">
                <a href="{{ route('web.index') }}"><img src="{{ $_system_config->site_logo}}"></a>
            </div>
            <div class="right">
                <div class="header-link clearfix">
                    <a target="_blank" href="{{route('daili.init')}}">代理登录</a> &nbsp;|&nbsp;
                    <a href="javascript:void(0)" class="daili_apply">代理申请</a> &nbsp;|&nbsp;
                    {{--<a href="javascript:;">备用网址</a> &nbsp;|&nbsp;--}}
                    {{--<a href="javascript:;">新手指南</a> &nbsp;|&nbsp;--}}
                    <a href="javascript:;" class="country-icon country-icon1"></a>
                    <a href="javascript:;" class="country-icon country-icon2"></a>
                    <a href="javascript:;" class="country-icon country-icon3"></a>
                </div>
                @if (Auth::guard('member')->guest())
                    <div class="login-wrap">
                        <form name="LoginForm" id="LoginForm" action="{{ route('member.login.post') }}" method="POST">
                            <p class="login-unit login-unit-user">
                                <input name="name" type="text" size="12" id="username" title="请填写 6-14 位大小写英数字"
                                       maxlength="14"
                                       class="login-input login-acc" tabindex="1" pattern="[a-zA-Z0-9]{6,14}"
                                       required=""
                                       placeholder="帐号">
                                {{--<span id="js-acc-unicode" class="acc-unicode">@123</span>--}}
                            </p>
                            <p class="login-unit login-unit-pwd">
                                <input name="password" type="password" autocomplete="off" size="13" id="passwd"
                                       title="请填写 6-12 位大小写英数字"
                                       maxlength="13" class="login-input" tabindex="2" pattern="[a-zA-Z0-9]{6,13}"
                                       required=""
                                       placeholder="密码">
                            </p>
                            <p class="login-unit login-unit-chk">
                                <input name="captcha" type="text" id="rmNum" size="7" maxlength="4"
                                       title="( 点选此处产生新验证码 )"
                                       class="login-input" onfocus="getKey();" tabindex="3" pattern="\d{4}" required=""
                                       placeholder="验证码">
                                <a onclick="javascript:re_captcha();"><img class="vertifyCode vPic"
                                                                           src="{{ URL('kit/captcha/1') }}"
                                                                           id="c2c98f0de5a04167a9e427d883690ff6"></a>
                                <script>
                                    function re_captcha() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                    }
                                </script>
                                {{--<img src="https://p1.xf0371.com/cl/tpl/commonFile/images/transparentNo.gif?v=ver15.88" id="vPic"--}}
                                {{--alt="( 点选此处产生新验证码 )" title="( 点选此处产生新验证码 )" onclick="getKey();" width="40" height="18">--}}
                            </p>
                            <input class="login-submit modal-login_submit ajax-submit-btn" name="Submit" type="button"
                                   value="登录" tabindex="4">
                            <a class="header-join" href="{{ route('web.register_one') }}">立即注册</a>
                            <a class="forget-pw" href="javascript:;"
                               onclick="window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">忘记密码?</a>
                        </form>
                    </div>
                @else
                    <div class="after-login">
                        <div class="top">
                            <span class="account">账号：<span class="name">{{ $_member->name }}</span></span>
                            <span class="account">账户余额：<strong class="money">{{ $_member->all_money }}</strong> &nbsp;&nbsp;
							 <span class="account">剩余码量：<strong class="money">{{ $_member->ml_money }}</strong> &nbsp;&nbsp;
							
                                {{--<a href="javascript:;"><img src="{{ asset('/web/images/add.png') }}" alt="" /></a>--}}
                            </span>
                        </div>
                        <div class="bot">
                            @if($_system_config -> is_new_center ==1)
                              
							<a href="{{ route('member.userCenter') }}?type=6">会员中心</a>｜
								 <a href="{{ route('member.userCenter') }}?type=1">存取款</a>｜							  
							   <a href="{{ route('member.userCenter') }}?type=4">账户记录</a>｜
                                @else

                            <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;&nbsp;|&nbsp;
                            <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;&nbsp;|&nbsp;
                            <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;&nbsp;|&nbsp;
                            <a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;&nbsp;|&nbsp;
                            <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>&nbsp;&nbsp;|&nbsp;
                            @endif
                            <a href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               class="quit">退出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="mainnav-wrap clear">
            <div class="placeholder-block clearfix">
                <div class="mainnav">
                    <ul class="clearfix">
                        <li id="LS-first" class="LS-first">
                            <a href="{{  route('web.index') }}" class="@if($web_route == 'web.index') current @endif"
                               title="首页">首页</a>
                        </li>
                        <li id="LS-ball" class="LS-ball">
                            <a href="{{  route('web.esports') }}"
                               class=" @if($web_route == 'web.esports') current @endif" title="体育赛事">体育竞技</a>
                            {{--<div class="moreNav">
                                @if(in_array('GJ', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GJ','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>皇冠体育</a>
                                @endif
                                    @if(in_array('SS', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=UG&gamename=SP3','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>三昇体育</a>
                                    @endif
                                    @if(in_array('IBC', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IBC','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>沙巴体育</a>
                                    @endif
									 @if(in_array('GB', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GB','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>GB体育</a>
                                    @endif
									
                                @if(in_array('BBIN', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=ball','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BB体育</a>
                                @endif
                                    @if(in_array('NEWBB', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=NEWBB','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>NEWBB体育</a>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=TASSPTA','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>AG体育</a>
                                    @endif
                                    @if(in_array('ESB', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ESB','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>ESB电竞</a>
                                    @endif
                                    @if(in_array('AVIA', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AVIA','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>泛亚电竞</a>
                                    @endif
                                    @if(in_array('HC', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=HC','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>皇朝电竞</a>
                                    @endif
                            </div>--}}
                        </li>
                        <li id="LS-live" class="LS-live">
                            <a href="{{ route('web.liveCasino') }}"
                               class=" @if($web_route == 'web.liveCasino') current @endif" title="视讯直播">视讯直播</a>
                            {{--<div class="moreNav">
                                @if(in_array('AG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=AG','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>AG视讯</a>
                                @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=BBIN&gamename=live','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BBIN视讯</a>
                                    @endif
                                    @if(in_array('BG', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=BG&gamename=2','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>BG视讯</a>
                                    @endif
                                    @if(in_array('SUNBET', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=SUNBET','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>申博视讯</a>
                                    @endif
                                    @if(in_array('ALLBET', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=AB','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>欧博视讯</a>
                                    @endif
                                    @if(in_array('SA', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=SA','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>SA视讯</a>
                                    @endif
                                    @if(in_array('GD', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=GD','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>GD视讯</a>
                                    @endif
                                    @if(in_array('OG', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=OG','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>OG视讯</a>
                                    @endif
                                    @if(in_array('DG', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=DG','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>DG视讯</a>
                                    @endif
                                    @if(in_array('MG', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=MG','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>MG视讯</a>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=PT','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>PT视讯</a>
                                    @endif
                                    @if(in_array('GPI', $_api_list))
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=GPI','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>GPI视讯</a>
                                    @endif
                            </div>--}}
                        </li>
                        <li id="LS-game" class="LS-game">
                            <a href="{{ route('web.eGame') }}"
                               class=" @if($web_route == 'web.eGame') current @endif"
                               title="电子游艺">电子游艺</a>
                        </li>
                        <li>
                            <a href="{{ route('web.catchFish') }}"
                               class=" @if($web_route == 'web.catchFish') current @endif" title="幸运六合彩">捕鱼游戏</a>
                        </li>
                        <li id="LS-ltlottery" class="LS-ltlottery">
                            <a href="{{  route('web.lottory') }}"
                               class=" @if($web_route == 'web.lottory') current @endif" title="彩票游戏">幸运彩票</a>
                        </li>
                        <li id="LS-mobile" class="LS-mobile">
                            <a href="{{  route('web.poker') }}"
                               class=" @if($web_route == 'web.poker') current @endif"  title="棋牌游戏">
                                棋牌游戏
                            </a>
                        </li>
                        <li id="LS-memberexclusiveii" class="LS-memberexclusiveii">
                            <a href="{{  route('web.activityList') }}"
                               class="js-article-color color-change @if($web_route == 'web.activityList') current @endif"
                               data-color="#FFF|#FF0000" title="优惠活动"
                               style="color: rgb(255, 255, 255);">优惠活动</a>
                        </li>
                        <li id="LS-mobile" class="LS-mobile">
                            <a href="{{ $_system_config->app_link }}" class="" title="手机下注" target="_blank">手机下注</a>
                        </li>
                        <li id="LS-service" class="LS-service">
                            <a href="javascript:;" class="js-article-color" title="在线客服"
                               onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服</a>
                        </li>
                       <!-- <li id="LS-joinmember" class="LS-joinmember">
                            <a href="{{  route('web.register_one') }}"
                               class="@if($web_route == 'web.register_one') current @endif" title="立即注册">立即注册</a>
                        </li>-->
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