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


<div class="header">
    <div class="wrap">
        <div class="left">
            <span><a href="javascript:;" class="daili_apply"><img
                            src="{{ asset('/web') }}/mb16/images/pagcor.png">代理加盟</a></span>
            <span><a href="{{route('daili.init')}}" target="_blank"><img src="{{ asset('/web') }}/mb16/images/luntan.png">代理登录</a></span>
        </div>
        @if (Auth::guard('member')->guest())
            <div class="right">
                <form class="nav-login" method="POST" action="{{ route('member.login.post') }}">
                    <input type="text" name="name" class="inp" placeholder="用户名">
                    <input type="password" name="password" class="inp" placeholder="请输入密码">
                <span style="position: relative;">
                    <input type="text" name="captcha" class="inp" placeholder="验证码">
                    <a class="vPic" onclick="javascript:re_captcha();">
                        <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff6">
                    </a>
                <script>
                    function re_captcha() {
                        $url = "{{ URL('kit/captcha') }}";
                        $url = $url + "/" + Math.random();
                        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                    }
                </script>
                </span>
                    <button class="login-btn modal-login_submit ajax-submit-btn" type="button">登录</button>
                    {{--<a href="javascript:;" class="forget">忘记密码？</a>--}}
                    <a href="{{ route('web.register_one') }}" class="register-btn">免费注册</a>
                </form>
            </div>
        @else
            <div class="right afterlogin">
                欢迎回来：{{ $_member->name }} &nbsp;
                普通会员 &nbsp;
                账户余额：<span class="orangeCr">{{ $_member->all_money }}</span>
				剩余码量：<span class="orangeCr">{{ $_member->ml_money }}</span>
				
                {{--<a class="reflesh" href="javascript:;"><img src="images/reflesh.png"></a>--}}
                &nbsp;
                {{--签到月余额 <span class="orangeCr">0.0</span>元 &nbsp;--}}
                <a class="nav-usercenter" href="{{ route('member.userCenter') }}">个人中心</a>&nbsp;
                {{--<a href="javascript:;" class="sign">签到</a>&nbsp;--}}
                {{--<a href="{{ route('member.message_list') }}">站内信(<span--}}
                            {{--class="">{{ $_not_read_message_num }}</span>)&nbsp;</a>--}}
                <a class="exit" href="{{ route('member.logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <img src="{{ asset('/web/mb16/images/exit.png') }}">
                    退出
                </a>
                <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @endif
    </div>
</div>

<div class="nav">
    <div class="wrap">
        <div class="left logo">
            <a href="{{ route('web.index') }}"><img style="width: 245px" src="{{ $_system_config->site_logo }}"></a>
        </div>
        <div class="right">
            <ul class="navlist">
                <li class="navlist01 @if($web_route == 'web.index') active @endif">
                    <a href="{{ route('web.index') }}" class="top">
                        <h4>首页</h4>
                        <div class="eng">HOME</div>
                    </a>
                </li>
                <li class="navlist02 @if($web_route == 'web.eGame') active @endif">
                    <a href="{{ route('web.eGame') }}" class="top">
                        <h4>老虎机游戏</h4>
                        <div class="eng">SLOT GAMES</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
                                @if(in_array('PP', $_api_list))
                                    <li>
                                         <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PP&gamename=MyGameLobby','','width=1024,height=768')"
										  @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>PP电子</span></div>
                                        </a>
                                    </li>
                                @endif								
                                    @if(in_array('CQ9', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=CQ9&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>CQ9电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BS', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BS&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                               <div class="tit"><span>BS电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SG', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SG&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>SG电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BS', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BS&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>BS电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('PG', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>PG电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SA', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>SA电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PT&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>PT电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('MG', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MG&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>MG电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=8','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>AG电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('RT', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=RT&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>RT电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=game','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>BBIN电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('QT', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=QT&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>QT电子</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('JDB', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>JDB电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('PTS', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>天风电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                     @if(in_array('FG', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>FG电子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    
                                    @if(in_array('BOG', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BOG','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>BNG电子</span></div>
                                            </a>
                                        </li>
                                    @endif
									 @if(in_array('GGE', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GGE&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>GG电子</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('GA', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GA&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>GA电子</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('AE', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AE&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>AE电子</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('ISB', $_api_list))
                                        <li>
                                           <a href="javascript:;" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ISB&gamename=MyGameLobby','','width=1024,height=768')"
                                                 @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>ISB电子</span></div>
                                            </a>
                                        </li>
                                    @endif
									
									
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist02 @if($web_route == 'web.liveCasino') active @endif">
                    <a href="{{ route('web.liveCasino') }}" class="top">
                        <h4>真人娱乐</h4>
                        <div class="eng">LIVE</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
                                @if(in_array('AG', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                            <div class="tit"><span>AG厅</span></div>
                                        </a>
                                    </li>
                                @endif
								 @if(in_array('AGS', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AGS','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                            <div class="tit"><span>AG厅</span></div>
                                        </a>
                                    </li>
                                @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=live','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>BBIN厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BG&gamename=2','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>BG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SUNBET', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SUNBET','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>申博厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('SUNBETS', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SUNBETS','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>申博厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                    @if(in_array('AB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AB','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>欧博厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('MX', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MX','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>MX厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('VG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>VG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('WM', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WM','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>WM厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('N2', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=N2','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>N2厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('IGZR', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IGZR','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>IG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('AB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AB','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>欧博厅</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                    @if(in_array('LEBO', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=LEBO','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>LEBO厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SA', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>SA厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('GD', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GD','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>GD厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('OG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=OG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>OG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('DG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>DG厅</span></div>
                                            </a>
                                        </li>
                                    @endif 
									
                                   
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist04 @if($web_route == 'web.esports') active @endif">
                    <a href="{{ route('web.esports') }}" class="top">
                        <h4>体育竞技</h4>
                        <div class="eng">SPORTS</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
                                @if(in_array('GJ', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GJ','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>皇冠体育</span></div>
                                        </a>
                                    </li>
                                @endif
                                    @if(in_array('UG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=UG&gamename=SP3','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>UG体育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('IBC', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IBC','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>沙巴体育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=ball','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BBIN体育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('IM', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IM','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>IM体育</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('GB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GB','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>GB体育</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                    @if(in_array('AG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=TASSPTA','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>AG体育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('ESB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ESB','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>ESB电竞</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('AVIA', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AVIA','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>泛亚电竞</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('HC', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=HC','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>皇朝电竞</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('KG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=KGKG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>KG电竞</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist02 @if($web_route == 'web.catchFish') active @endif">
                    <a href="{{ route('web.catchFish') }}" class="top">
                        <h4>捕鱼游戏</h4>
                        <div class="eng">CATCHFISH</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
                                @if(in_array('AG', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=6','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>AG捕鱼王</span></div>
                                        </a>
                                    </li>
                                @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=30599','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BB捕鱼达人</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BB捕鱼大师</span></div>
                                            </a>
                                        </li>
                                    @endif
                                   @if(in_array('PG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=4001','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>PG 鱼王争霸 </span></div>
                                            </a>
                                        </li>
                                    @endif
									
									 @if(in_array('PG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=4004','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>PG 全民捕鱼 </span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                    @if(in_array('SA', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=FishermenGold','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>SA捕鱼达人</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('CQ9', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=CQ9&gamename=AB3','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>CQ9皇金渔场</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>JDB财神捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
                                   
                                    @if(in_array('JDB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7001','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>JDB龙王捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7002','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>JDB龙王捕鱼2</span></div>
                                            </a>
                                        </li>
                                    @endif
                                  
                                   
                                    @if(in_array('MT', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40024','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>MT李逵捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
									 @if(in_array('MT', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40025','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>MT金蝉捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
									 @if(in_array('MW', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MW&gamename=1051','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>MW千炮捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                   @if(in_array('DSQP', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DSQP&gamename=1001','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>DS海霸王</span></div>
                                            </a>
                                        </li>
                                    @endif
                                   @if(in_array('DSQP', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DSQP&gamename=1002','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>DS吃我一炮</span></div>
                                            </a>
                                        </li>
                                    @endif
                                  
									  @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_mm','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG美人捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_3D','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG捕鱼嘉年华</span></div>
                                            </a>
                                        </li>
                                    @endif
									 @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_hl','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG欢乐捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
									 @if(in_array('MW', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MW&gamename=1051','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>MW千炮捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_tt','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG天天捕鱼</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_bn','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG捕鸟达人</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_zj','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG雷霆战警</span></div>
                                            </a>
                                        </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist02 @if($web_route == 'web.lottory') active @endif">
                    <a href="{{ route('web.lottory') }}" class="top">
                        <h4>彩票游戏</h4>
                        <div class="eng">LOTTORY</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
                                
                                    @if(in_array('WG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>WG彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('IG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>IG彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('IG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG&gamename=imlotto10059','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>IG六合彩</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('IG2', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG2','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>IG彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('IG2', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG2&gamename=imlotto10059','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>IG六合彩</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                    @if(in_array('EG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=EG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>EG彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
									 @if(in_array('SWC', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SWC','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>双赢彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                    @if(in_array('VR', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VR','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>VR彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SC', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SC','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>世彩彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('BGC', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BGC','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BG彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=Ltlottery','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BBIN彩票</span></div>
                                            </a>
                                        </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist02 @if($web_route == 'web.poker') active @endif">
                    <a href="{{ route('web.poker') }}" class="top">
                        <h4>棋牌游戏</h4>
                        <div class="eng">POKER</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
							
									@if(in_array('TH', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=TH','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>天豪棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('DSQP', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=DSQP','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>DS棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									
                                   @if(in_array('KY', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=KY','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>开元棋牌</span></div>
                                        </a>
                                    </li>
                                @endif
								 @if(in_array('WGQP', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=WGQP','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>WG棋牌</span></div>
                                        </a>
                                    </li>
                                @endif
								
                                    @if(in_array('761', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=761','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>爱棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('MT', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=MT&gamename=MyGameLobby','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>美天棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									 @if(in_array('JS', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=SW&gamename=MyGameLobby','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>双赢棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('LEG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=LEG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>乐游棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('YG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=YG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>王者棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('GG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=GG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>GG棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									
									@if(in_array('IMQP', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=IMQP','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>IM棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									
									@if(in_array('TH', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=TH','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>天豪棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('NW', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=NW','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>新世界棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('NEWVG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=NEWVG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>VG棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    
                                    @if(in_array('JS', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=JS','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>金龙棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('AS', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=AS','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>天发棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('HG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('wg.playGame')}}?plat_type=HG','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>欢乐棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									
									
                                    
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist06 @if($web_route == 'web.activityList') active @endif">
                    <a href="{{ route('web.activityList') }}" class="top">
                        <h4>优惠活动</h4>
                        <div class="eng">DISCOUNT</div>
                    </a>
                </li>
                <li class="navlist08">
                    <a href="javascript:;" class="top">
                        <h4>APP下载 <img src="{{ asset('/web') }}/mb16/images/triggle.png"></h4>
                    </a>
                    <div class="ercode">
                        <div class="left">
                            <div class="tit">苹果客户端</div>
                            <img src="{{ $_system_config->wap_qrcode }}">
                        </div>
                        <div class="right">
                            <div class="tit">安卓客户端</div>
                            <img src="{{ $_system_config->wap_qrcode }}">
                        </div>
                        <div class="url"> 手机打开：{{ $_system_config->app_link }}</div>
                    </div>
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
                    var all = Number($('.orangeCr').text()) + Number(data.data);
                    $('.orangeCr').text('');
                    $('.orangeCr').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
</script>