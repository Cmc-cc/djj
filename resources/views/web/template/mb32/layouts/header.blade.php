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
<div class="header">
    <div class="wrap">
        <div class="top">
            <div class="left">
                7X24在线电话客服：&nbsp;<img src="{{ asset('/web') }}/mb32/images/h_icon.png"> &nbsp;{{ $_system_config->phone1}}
            </div>
            <div class="right">
                <a href="javascript:" style="color: white;">美东时间：<em id="mdtime"></em></a>&nbsp;|&nbsp;
                <p class="download-app">
                    <a href="{{ $_system_config->app_link }}" target="_blank">下载APP</a>
                    <span><img src="{{ $_system_config->wap_qrcode }}" alt=""></span>
                </p>&nbsp;|&nbsp;
                <a href="{{ route('game.playGame') }}?plat_type=MG&game_type=2" class="mg-game">MG電子游戏</a>&nbsp;|&nbsp;
                <a href="{{ route('game.playGame') }}?plat_type=PT&game_type=2" class="pt-game">PT電子游戏</a>&nbsp;|&nbsp;
                {{--<a href="{{ route('web.eGame') }}?api_name=BBIN" class="bb-game">BB電子游戏</a>&nbsp;|&nbsp;--}}
                {{--<a href="" class="gns-game">代理登录</a>&nbsp;|&nbsp;--}}
                {{--<a href="javascript:;" class="isb-game"--}}
                {{--@if($_member) onclick="javascript:window.open('{{ route('ag.playGame') }}?gametype=8','','width=1024,height=768')"--}}
                {{--@else onclick="return layer.msg('请先登录!',{icon:6})" @endif>AG電子游戏</a>&nbsp;|&nbsp;--}}
                <a href="{{ route('daili.init') }}" class="auto-game">代理登陆</a>|
                <a href="javascript:;" class="daili_apply">代理加盟</a>
                <a href="javascript:;"><img src="{{ asset('/web') }}/mb32/images/hk.png" title="繁体中文"></a>
                <a href="javascript:;"><img src="{{ asset('/web') }}/mb32/images/cn.png" title="简体中文"></a>
                <a href="javascript:;"><img src="{{ asset('/web') }}/mb32/images/usa.png" title="English"></a>
            </div>
        </div>
        <div class="logo-con">
            <div class="left" style="margin-left: 60px;">
                <a href="javascript:;" class="logo">
                    <img src="{{ $_system_config->site_logo}}" alt="">
                </a>
                <img src="{{ asset('/web') }}/mb32/images/header_img.png" class="headerimg">
            </div>
            @if (Auth::guard('member')->guest())
                <div class="right index-login">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <div class="left">
                            <div class="module">
                                <input class="inp" type="text" placeholder="帐号" name="name">
                                {{--<span class="tit">@sh</span>--}}
                            </div>
                            <div class="module">
                                <input class="inp" type="password" placeholder="密码" name="password">
                                {{--<span class="psw-tit">@sh</span>--}}
                            </div>
                            <div class="module code">
                                <input class="inp" type="text" placeholder="验证码" name="captcha" onclick="javascript:re_captcha();">
                                <a class="vPic" onclick="javascript:re_captcha();"><img class="vertifyCode"
                                                                                        src="{{ URL('kit/captcha/1') }}"
                                                                                        id="c2c98f0de5a04167a9e427d883690ff5"></a>
                                <script>
                                    function re_captcha() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff5').src = $url;
                                    }
                                </script>
                            </div>
                            <button type="button" class="login-btn modal-login_submit ajax-submit-btn">立即登入</button>
                        </div>
                        <div class="right">
                            <a href="{{ route('web.register_one') }}" class="register-btn"></a>
                        </div>
                    </form>
                </div>
            @else
                <div class="after-login">
                    <div class="hd">
                        账号： <span class="yellowCr">{{ $_member->name }}</span>&nbsp;&nbsp;
                        余额： <span class="yellowCr" id="money">{{ $_member->money }}</span>
                        {{--<a href="#"><img src="images/add.png"></a>--}}
                    </div>
                    <div class="bot">
                        @if($_system_config->is_new_center)
                        <a href="{{ route('member.userCenter') }}">会员中心</a>｜
                        @else
                        <a href="javascript:;" onclick="javascript:window.open('{{ route('member.finance_center') }}','','width=1024,height=768')" >线上存款</a>｜
                        <a href="javascript:;" onclick="javascript:window.open('{{ route('member.member_drawing') }}','','width=1024,height=768')">线上取款</a>｜
                        <a href="javascript:;" onclick="javascript:window.open('{{ route('member.message_list') }}','','width=1024,height=768')">未读讯息({{ $_not_read_message_num }})</a> ｜
                        @endif
                        <a href="javascript:;" href="{{ route('member.logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
        </div>

    </div>

    <div id="nav" class="nav">
        <ul class="list">
            <li @if($web_route == 'web.index') class="active" @endif>
                <a href="{{ route('web.index') }}">
                    首页
                    <span class="tit">Home</span>
                </a>
            </li>
            <li @if($web_route == 'web.liveCasino') class="active" @endif>
                <a href="{{ route('web.liveCasino') }}">
                    視訊直播
                    <span class="tit">Live</span>
                </a>
                <img src="{{ asset('/web') }}/images/hot.gif" class="hot">
                <div class="second-nav">
                    <?php
                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                    ?>
                        @if(count($live) > 0)
                            @foreach($live as $v)
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >{{ $v['name'] }}</a>
                            @endforeach
                        @endif
                    {{--@if(in_array('AG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >AG視訊</a>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >BBIN視訊</a>
                    @endif
                    @if(in_array('BG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >BG視訊</a>
                    @endif
                    @if(in_array('SUNBET', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >申博視訊</a>
                    @endif
                    @if(in_array('ALLBET', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >欧博視訊</a>
                    @endif
                    @if(in_array('SA', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >SA視訊</a>
                    @endif
                    @if(in_array('GD', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >GD視訊</a>
                    @endif
                    @if(in_array('OG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >OG視訊</a>
                    @endif
                    @if(in_array('DG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >DG視訊</a>
                    @endif
                    @if(in_array('MG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >MG視訊</a>
                    @endif
                    @if(in_array('PT', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >PT視訊</a>
                    @endif
                    @if(in_array('GPI', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                        >GPI視訊</a>
                    @endif--}}
                </div>
            </li>
            <li @if($web_route == 'web.eGame') class="active" @endif>
                <a href="{{ route('web.eGame') }}" class="blue">
                    電子游艺
                    <span class="tit">Casino</span>
                </a>
                <img src="{{ asset('/web') }}/images/hot.gif" class="hot">
                <div class="second-nav">
                    @if(in_array('PP', $_api_list))
                        <a  target="_blank" href="{{ route('game.playGame') }}?plat_type=PP&game_type=2">PP電子</a>
                    @endif
                    @if(in_array('CQ9', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=CQ9&game_type=2">CQ9電子</a>
                    @endif
                    @if(in_array('MW', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MW&game_type=2">MW電子</a>
                    @endif
                    @if(in_array('SG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SG&game_type=2">SG電子</a>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=JDB&game_type=2">JDB電子</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=FG&game_type=2">FG電子</a>
                    @endif
                    @if(in_array('SA', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SA&game_type=2">SA電子</a>
                    @endif
                    @if(in_array('PT', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=PT&game_type=2">PT電子</a>
                    @endif
                    @if(in_array('MG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MG&game_type=2">MG電子</a>
                    @endif
                    @if(in_array('AG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=AG&game_type=2">AG電子</a>
                    @endif
                    @if(in_array('GPI', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=GPI&game_type=2">GPI電子</a>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <a href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=2">BBIN電子</a>
                    @endif
                    @if(in_array('QT', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=QT&game_type=2">QT電子</a>
                    @endif
                    @if(in_array('SW', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=SW&game_type=2">SW電子</a>
                    @endif
                    @if(in_array('BNG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=BNG&game_type=2">BNG電子</a>
                    @endif
                </div>
            </li>
            <li @if($web_route == 'web.esports') class="active" @endif>
                <a href="{{ route('web.esports') }}" class="green">
                    體育赛事
                    <span class="tit">Sports</span>
                </a>
                <div class="second-nav">
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
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>沙巴體育</a>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BBIN體育</a>
                    @endif
                    @if(in_array('AG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>AG體育</a>
                    @endif
                    @if(in_array('ESB', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>ESB电竞</a>
                    @endif
                    @if(in_array('AVIA', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>泛亚电竞</a>
                    @endif
                    @if(in_array('HC', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HC&game_type=5','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>皇朝电竞</a>
                    @endif
                </div>
            </li>
            <li @if($web_route == 'web.lottory') class="active" @endif>
                <a href="{{ route('web.lottory') }}" class="yellow">
                    彩票游戏
                    <span class="tit">Lottery</span>
                </a>
                <div class="second-nav">
                    <?php
                    $lottery = (new \App\Http\Controllers\Wap\AjaxController())->getGames('lottery');
                    ?>
                        @if(count($lottery) > 0)
                            @foreach($lottery as $k=> $v)
                                <a href="javascript:;"
                                   @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>{{ $v['name'] }}</a>
                            @endforeach
                        @endif
                    {{--@if(in_array('IG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>IG彩票</a>
                    @endif
                    @if(in_array('IG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&game_code=imlotto10059','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>IG六合彩</a>
                    @endif
                    @if(in_array('EG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>EG彩票</a>
                    @endif
                    @if(in_array('VR', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>VR彩票</a>
                    @endif
                    @if(in_array('BG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BG彩票</a>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BBIN彩票</a>
                    @endif--}}
                </div>
            </li>
            <li @if($web_route == 'web.poker') class="active" @endif>
                <a href="{{ route('web.poker') }}">
                    棋牌游戏
                    <span class="tit">Pocker</span>
                </a>
                <div class="second-nav">
                    @if(in_array('KY', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=KY&game_type=7">开元棋牌</a>
                    @endif
                    @if(in_array('MT', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=MT&game_type=7">美天棋牌</a>
                    @endif
                    @if(in_array('VG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=VG&game_type=7">VG棋牌</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=FG&game_type=7">FG棋牌</a>
                    @endif
                    @if(in_array('LEG', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=LEG&game_type=7">LEG棋牌</a>
                    @endif
                    @if(in_array('761', $_api_list))
                        <a target="_blank" href="{{ route('game.playGame') }}?plat_type=761&game_type=7">棋乐游棋牌</a>
                    @endif
                </div>
            </li>
            <li @if($web_route == 'web.catchFish') class="active" @endif>
                <a href="{{ route('web.catchFish') }}">
                    捕魚游戏
                    <span class="tit">Fish</span>
                </a>
                <div class="second-nav">
                    @if(in_array('AG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>AG捕魚王</a>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BB捕魚达人</a>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BB捕魚大师</a>
                    @endif
                    @if(in_array('MW', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>MW千炮捕魚</a>
                    @endif
                    @if(in_array('SA', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>SA鱼乐无穷</a>
                    @endif
                    @if(in_array('CQ9', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>CQ9皇金渔场</a>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7003','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>JDB财神捕魚</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG欢乐捕魚</a>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>JDB龙王捕魚</a>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>JDB龙王捕魚2</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG美人捕魚</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG捕魚嘉年华</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG天天捕魚</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_bn','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG捕鸟达人</a>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_zj','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG雷霆战警</a>
                    @endif
                    @if(in_array('CQ9', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6&game_code=AD01','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>CQ9捕魚去喽</a>
                    @endif
                    @if(in_array('MT', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>MT李逵捕魚</a>
                    @endif
                    @if(in_array('MT', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0045','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>MT金蟾捕魚</a>
                    @endif
                    @if(in_array('PT', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=6&game_code=cashfi','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>PT深海大赢家</a>
                    @endif
                    @if(in_array('SW', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>SW捕魚多福</a>
                    @endif
                    @if(in_array('SW', $_api_list))
                        <a href="javascript:;"
                           @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&game_code=sw_fuqsg','','width=1024,height=768')"
                           @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>SW福气水果</a>
                    @endif

                </div>
            </li>
            <li @if($web_route == 'web.activityList') class="active" @endif>
                <a href="{{ route('web.activityList') }}" class="activity">
                    优惠活动
                    <span class="tit activity">Promotion</span>
                </a>
                <img src="{{ asset('/web') }}/images/hot.gif" class="hot">
            </li>
            <li>
                <a href="{{ $_system_config->app_link }}" target="_blank">
                    手机投注
                    <span class="tit">Service</span>
                </a>
            </li>
        <!-- <li>
                    <a href="javascript:;"
                       onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        <span class="tit">在线客服</span>
                    </a>
                </li> -->
        </ul>
    </div>
</div>

<script type="text/javascript">
    (function ($) {
        $(function () {
            colorChange([{obj: '.mg-game', sourcrCr: 'rgb(236, 215, 19)', afterCr: 'rgb(24, 116, 21)'}, {
                obj: '.pt-game',
                sourcrCr: 'rgb(20, 118, 215)',
                afterCr: 'rgb(141, 8, 231)'
            }, {obj: '.auto-game', sourcrCr: 'rgb(215, 154, 20)', afterCr: 'rgb(255, 255, 255)'}, {
                obj: '.e-game',
                sourcrCr: 'rgb(99, 59, 29)',
                afterCr: 'rgb(255, 0, 0)'
            }, {obj: '.activity', sourcrCr: 'rgb(255, 0, 0)', afterCr: 'rgb(255, 255, 255)'}
                ,{obj:'.splash-yellow',sourcrCr:'rgb(255,255,255)',afterCr:'rgb(255,255,0)'}]);
        });
    })(jQuery);
</script>


<div class="hb_in">
    <a href="{{ route('web.red') }}" target="_blank">
        <img src="{{ asset('/web/images/hb_in.png') }}" alt="">
    </a>
</div>

<div class="notice_layer">
    <h3>公告详情 <span class="close"></span></h3>
    <div class="notice_con">
        @foreach($_system_notices as $v)
            <div class="module">
                <h4>{{ $v->title }}</h4>
                <p>✿{{ $v->content }}</p>
            </div>
        @endforeach
    </div>
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
                    var all = Number($('#money').text()) + Number(data.data);
                    $('#money').text('');
                    $('#money').text(all.toFixed(2));
                }
            }
        })
    })
    @endif
    @endif
</script>
<script>
    $(function () {
        //公告
        $('#mar0').on('click', function () {
            var notice_index = layer.open({
                type: 1,
                title: false,
                closeBtn: 0,
                area: ['680px'],
                skin: 'layui-layer-nobg', //没有背景色
                shadeClose: true,
                content: $('.notice_layer')
            });

            $('.notice_layer').on('click', '.close', function () {
                layer.close(notice_index)
            })
        })

    })
</script>
