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
                账户余额：<span class="orangeCr">{{ $_member->money }}</span>
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
        <div class="left logo" style="position: absolute;">
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
                                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=PP&game_type=2">

                                            <div class="tit"><span>PP電子</span></div>
                                        </a>
                                    </li>
                                @endif
                                    @if(in_array('CQ9', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=CQ9&game_type=2">

                                                <div class="tit"><span>CQ9電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('MW', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MW&game_type=2">

                                                <div class="tit"><span>MW電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SG', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SG&game_type=2">

                                                <div class="tit"><span>SG電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=JDB&game_type=2">

                                                <div class="tit"><span>JDB電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=FG&game_type=2">

                                                <div class="tit"><span>FG電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SA', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SA&game_type=2">

                                                <div class="tit"><span>SA電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=PT&game_type=2">

                                                <div class="tit"><span>PT電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('MG', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MG&game_type=2">

                                                <div class="tit"><span>MG電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=AG&game_type=2">

                                                <div class="tit"><span>AG電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('GPI', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=GPI&game_type=2">

                                                <div class="tit"><span>GPI電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=2">

                                                <div class="tit"><span>BBIN電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('QT', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=QT&game_type=2">

                                                <div class="tit"><span>QT電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SW', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SW&game_type=2">

                                                <div class="tit"><span>SW電子</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BNG', $_api_list))
                                        <li>
                                            <a target="_blank" href="{{ route('game.playGame') }}?plat_type=BNG&game_type=2">

                                                <div class="tit"><span>BNG電子</span></div>
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
                                <?php
                                $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                ?>
                                @if(count($live) > 0)
                                    @foreach($live as $v)
                                            <li>
                                                <a href="javascript:;"
                                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                    <div class="tit"><span>{{ $v['name'] }}</span></div>
                                                </a>
                                            </li>
                                    @endforeach
                                @endif
                                {{--@if(in_array('AG', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                            <div class="tit"><span>AG厅</span></div>
                                        </a>
                                    </li>
                                @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>BBIN厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>BG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SUNBET', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>申博厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('ALLBET', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>欧博厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('LEBO', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEBO&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>LEBO厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SA', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>SA厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('GD', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>GD厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('OG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>OG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('DG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>DG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('MG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>MG厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>PT厅</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('GPI', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                                <div class="tit"><span>GPI厅</span></div>
                                            </a>
                                        </li>
                                    @endif--}}
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist04 @if($web_route == 'web.esports') active @endif">
                    <a href="{{ route('web.esports') }}" class="top">
                        <h4>體育竞技</h4>
                        <div class="eng">SPORTS</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
                                @if(in_array('GJ', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>皇冠體育</span></div>
                                        </a>
                                    </li>
                                @endif
                                    @if(in_array('SS', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>三昇體育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('IBC', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>沙巴體育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BBIN體育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('NEWBB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>NEWBB體育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>AG體育</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('ESB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>ESB电竞</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('AVIA', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>泛亚电竞</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('HC', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HC&game_type=5','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>皇朝电竞</span></div>
                                            </a>
                                        </li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="navlist02 @if($web_route == 'web.catchFish') active @endif">
                    <a href="{{ route('web.catchFish') }}" class="top">
                        <h4>捕魚游戏</h4>
                        <div class="eng">CATCHFISH</div>
                    </a>
                    <div class="secondnav">
                        <div class="wrap">
                            <ul>
                                @if(in_array('AG', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>AG捕魚王</span></div>
                                        </a>
                                    </li>
                                @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BB捕魚达人</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>BB捕魚大师</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('MW', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>MW千炮捕魚</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('SA', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>SA捕魚达人</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('CQ9', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>CQ9皇金渔场</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>JDB财神捕魚</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG欢乐捕魚</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>JDB龙王捕魚</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>JDB龙王捕魚2</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG美人捕魚</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG捕魚嘉年华</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG天天捕魚</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_bn','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG捕鸟达人</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_zj','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG雷霆战警</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('CQ9', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6&game_code=AD01','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>CQ9捕魚去喽</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('MT', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>MT李逵捕魚</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('MT', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0064','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>MT金鲨银鲨</span></div>
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
                                <?php
                                    $lottery = (new \App\Http\Controllers\Wap\AjaxController())->getGames('lottery');
                                ?>
                                    @if(count($lottery) > 0)
                                        @foreach($lottery as $v)
                                            <li>
                                                <a href="javascript:;"
                                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                    <div class="tit"><span>{{ $v['name'] }}</span></div>
                                                </a>
                                            </li>
                                        @endforeach
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
							@if(in_array('MT', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('game.playGame')}}?plat_type=MT&game_type=7','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>美天棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('game.playGame')}}?plat_type=FG&game_type=7','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif

                                    @if(in_array('AP', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('game.playGame')}}?plat_type=AP&game_type=7','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>爱棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('FG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('game.playGame')}}?plat_type=FG&game_type=7','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>FG棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
                                    @if(in_array('VG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('game.playGame')}}?plat_type=VG&game_type=7','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>VG棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif

                                    @if(in_array('LEG', $_api_list))
                                        <li>
                                            <a href="javascript:;"
                                               @if($_member) onclick="javascript:window.open('{{route('game.playGame')}}?plat_type=LEG&game_type=7','','width=1024,height=768')"
                                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                                <div class="tit"><span>LEG棋牌</span></div>
                                            </a>
                                        </li>
                                    @endif
									@if(in_array('KY', $_api_list))
                                    <li>
                                        <a href="javascript:;"
                                           @if($_member) onclick="javascript:window.open('{{route('game.playGame')}}?plat_type=KY&game_type=7','','width=1024,height=768')"
                                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>

                                            <div class="tit"><span>开元棋牌</span></div>
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
    @if($_member->is_trans_on == 1)
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
    @endif
</script>
