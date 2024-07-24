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


<!-- 头部和导航 -->
<div id="hheader">
    <!--头部 start-->
    <div class="header">
        <div class="w1000">
            <a href="{{ route('web.index') }}" class="logo">
                <img src="{{ $_system_config->site_logo}}" alt="">
            </a>
            <div class="headimg"></div>
            <div class="headright">
                <div class="topbar">
                    <a class="flag" href="javascript:;" title="简体中文">
                        <img src="{{ asset('/web/mb10/images/china.gif') }}" style="display: inline">
                    </a>
                    <span>&nbsp;</span>
                    <a class="flag" href="javascript:;">
                        <img src="{{ asset('/web/mb10/images/usa.gif') }}" style="display: inline">
                    </a>
                    <span>&nbsp;</span>
                    {{--<a id="download1" href="javascript:;" style="color: rgb(244, 179, 0);">太阳城安卓端</a>--}}
                    <span>&nbsp;|&nbsp;
				        <a href="{{route('daili.init')}}" target="_blank">代理登录</a>
                        <span>&nbsp;|&nbsp;</span>
                        <a href="javascript:;" class="daili_apply">代理加盟</a>
                        <span>|&nbsp;</span>
                        <a href="javascript:;" onclick="alert('请联系客服！')">找回密码</a>
                        {{--<span>&nbsp;|</span>--}}
                        {{--<a href="javascript:;">线路检测</a>--}}
			        </span>
                </div>
                @if (Auth::guard('member')->guest())
                    <div id="loginBox">
                        <!--登录前 start-->
                        <div class="login" id="LoginForm">
                            <form method="POST" action="{{ route('member.login.post') }}">
                                <input placeholder="用户名" autocomplete="on" tabindex="1" maxlength="12" name="name"
                                       id="uname"
                                       type="text">
                                <input id="pwd" maxlength="12" placeholder="密码" tabindex="2" type="password"
                                       name="password">
                                <input class="captcha" placeholder="验证码" tabindex="2" type="text" name="captcha">
                                <a href="javascript:;" class="vertifyCode" onclick="javascript:re_captcha();">
                                    <img src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff6">
                                </a>
                                <script>
                                    function re_captcha() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                    }
                                </script>
                                <input value="立即登录" class="sub modal-login_submit ajax-submit-btn" type="button">
                                <a href="{{ route('web.register_one') }}" class="reg">立即开户</a>
                                {{--<a href="javascript:;" class="freeplay" @if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?usertype=4','','width=1024,height=768')"--}}
                                {{--@else onclick="return alert('请先登录！')" @endif>免费试玩</a>--}}
                                <a data-longtxt="忘记？" title="点击重置登录密码" data-shorttxt="？" class="lf-forget"
                                   style="position:absolute; top:63px; padding:0 6px; display:inline-block; height:16px;
                           line-height:16px; text-align:center; border:1px solid #999; background:#e5e5e5; color:#999;
                           -moz-border-radius:2px; -webkit-border-radius:2px; border-radius:2px;right:31px;"
                                   href="javascript:;">忘记？</a>
                            </form>
                        </div>
                    </div>
                @else
                    <div id="loginBox">
                        <!--登录前 start-->
                        <div class="afterLogin">
                            <div class="loginUser">
                                {{--<a href="javascript:;">PC客户端</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">PT客户端</a>--}}
                            </div>
                            <div class="loginUser">{{ $_member->name }},您的余额：<span
                                        class="yellowCr money">{{ $_member->money }}</span>&nbsp;&nbsp;|&nbsp;&nbsp;
                                {{--<a href="javascript:;">刷新</a></div>--}}
                                <div class="loginUser">
                                    @if($_system_config->is_new_center == 1)
                                        <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;|&nbsp;
                                        @else

                                    <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;|&nbsp;
                                    <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;|&nbsp;
                                    <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;|&nbsp;
                                    <a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;|&nbsp;
                                    <a href="{{ route('member.customer_report') }}">往来记录</a>&nbsp;|&nbsp;
                                    <a href="{{ route('member.message_list') }}">未读讯息(<span
                                                class="yellowCr">{{ $_not_read_message_num }}</span>)</a>&nbsp;|&nbsp;@endif
                                    <a href="{{ route('member.logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="clear"></div>
            <div class="nav">
                <ul class="menu">
                    <li class="move" style="left: 0px;"></li>
                    <li id="index" class="@if($web_route == 'web.index') on @endif"><a class="Nav_one" href="{{ route('web.index') }}">首页</a></li>
                    <li id="sports2" class="LS-Ball @if($web_route == 'web.esports') on @endif">
                        <a href="{{ route('web.esports') }}" class="poplogin">體育投注</a>
                        {{--<div class="moveNav pe_nav">
                            <div class="con">
                                <span class="before"></span>
                                @if(in_array('GJ', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>皇冠體育</a>
                                @endif
                                @if(in_array('SS', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>三昇體育</a>
                                @endif
                                @if(in_array('IBC', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    >沙巴體育</a>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    >BBIN體育</a>
                                @endif
                                @if(in_array('NEWBB', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    >NEWBB體育</a>
                                @endif
                                @if(in_array('AG', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    >AG體育</a>
                                @endif
                                @if(in_array('ESB', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    >ESB电竞</a>
                                @endif
                                @if(in_array('AVIA', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    >泛亚电竞</a>
                                @endif
                                @if(in_array('HC', $_api_list))
                                    <a href="javascript:;"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HC&game_type=5','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    >皇朝电竞</a>
                                @endif
                                <span class="after"></span>
                            </div>
                        </div>--}}
                    </li>
                    <li id="live" class="LS-LiveMain @if($web_route == 'web.liveCasino') on @endif">
                        <a href="{{ route('web.liveCasino') }}" class="">真人視訊</a>
                        {{--<div class="moveNav real_nav">
                            <span class="before"></span>
                            @if(in_array('AG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >AG旗舰厅</a>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >BBIN旗舰厅</a>
                            @endif
                            @if(in_array('BG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >BG旗舰厅</a>
                            @endif
                            @if(in_array('SUNBET', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >申博旗舰厅</a>
                            @endif
                            @if(in_array('ALLBET', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >欧博旗舰厅</a>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >SA旗舰厅</a>
                            @endif
                            @if(in_array('GD', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >GD旗舰厅</a>
                            @endif
                            @if(in_array('OG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >OG旗舰厅</a>
                            @endif
                            @if(in_array('DG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >DG旗舰厅</a>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >MG旗舰厅</a>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >PT旗舰厅</a>
                            @endif
                            @if(in_array('GPI', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >GPI旗舰厅</a>
                            @endif
                            <span class="after"></span>
                        </div>--}}
                    </li>
                    <li class="LS-fish @if($web_route == 'web.catchFish') on @endif">
                        <a href="{{ route('web.catchFish') }}" class="poplogin">
                            捕魚王<span id="fishclinent"
                                     style="position: absolute; display: inline-block; margin-left: 2px; font-size: 12px; color: rgb(244, 179, 0);">新!</span>
                        </a>
                        {{--<div class="moveNav fish_nav">
                            <span class="before"></span>
                            @if(in_array('AG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >AG捕魚</a>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >BB捕魚达人</a>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >BB捕魚大师</a>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('cgc.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >MW千炮捕魚</a>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >SA鱼乐无穷</a>
                            @endif
                            @if(in_array('CQ9', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >CQ9皇金渔场</a>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7003','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >JDB财神捕魚</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >FG欢乐捕魚</a>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >JDB龙王捕魚</a>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >JDB龙王捕魚2</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >FG美人捕魚</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >FG捕魚嘉年华</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >FG天天捕魚</a>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_bn','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                >FG捕鸟达人</a>
                            @endif
                            <span class="after"></span>
                        </div>--}}
                    </li>
                    <li id="videoGame" class="LS-Game @if($web_route == 'web.eGame') on @endif">
                        <a href="{{ route('web.eGame') }}">電子游戏</a>
                        {{--<div class="moveNav game_nav">
                            <span class="before"></span>

                            <span class="after"></span>
                        </div>--}}
                    </li>
                    <li class="nav-lottery @if($web_route == 'web.poker') on @endif"">
                        <a href="{{ route('web.poker') }}" class="poplogin">
                            棋牌游戏</a>
                    </li>
                    <li id="lotteryTicket" class="LS-Lottery @if($web_route == 'web.lottory') on @endif">
                        <a href="{{ route('web.lottory') }}">彩票游戏</a>
                        {{--<div class="moveNav cai_nav">
                            <span class="before"></span>
                            @if(in_array('EG', $_api_list))
                                <a @if($_member) href="{{ route('cgc.playGame') }}?api_code=EG"
                                   @else href="javascript:;" onclick="return layer.msg('请先登录!',{icon:6})"
                                   @endif target="_blank">EG彩票</a>
                            @endif
                            @if(in_array('YC', $_api_list))
                                <a @if($_member) href="{{ route('cgc.playGame') }}?api_code=YC"
                                   @else href="javascript:;" onclick="return layer.msg('请先登录!',{icon:6})"
                                   @endif target="_blank">YC彩票</a>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <a @if($_member) href="{{ route('cgc.playGame') }}?api_code=BBIN&gametype=ltlottery"
                                   @else href="javascript:;" onclick="return layer.msg('请先登录!',{icon:6})"
                                   @endif target="_blank">BBIN彩票</a>
                            @endif
                            @if(in_array('VR', $_api_list))
                                <a @if($_member) href="{{ route('cgc.playGame') }}?api_code=VR"
                                   @else href="javascript:;" onclick="return layer.msg('请先登录!',{icon:6})"
                                   @endif target="_blank">VR彩票</a>
                            @endif
                            <span class="after"></span>
                        </div>--}}
                    </li>
                    <li id="tryPlay">
                        <a href="{{ $_system_config->app_link }}" id="tryPlay2" style="color: rgb(255, 241, 0);" target="_blank">手机投注</a>
                    </li>
                    <li id="events" class="@if($web_route == 'web.activityList') on @endif">
                        <a href="{{ route('web.activityList') }}" id="events2" style="color: rgb(255, 241, 0);">优惠活动</a>
                    </li>
                    <li id="appDownload">
                        <a href="javascript:;"
                           onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                            客服中心
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="hb_in">
    <a href="{{route('web.red')}}" target="_blank">
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
