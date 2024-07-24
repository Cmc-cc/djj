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
        <div class="logo left" style="position: absolute;top:50px;">
            <a href="{{ route('web.index') }}" class="logo-pic">
                <img src="{{ $_system_config->site_logo}}" alt="">
            </a>
        </div>
        <div class="nav">
            <ul>
                <li class="home @if($web_route == 'web.index') active @endif">
                    <a href="{{ route('web.index') }}">
                        <div class="tit">首页</div>
                        <div class="eng">HOME</div>
                    </a>
                </li>
                <li class="casino @if($web_route == 'web.eGame') active @endif">
                    <a href="{{ route('web.eGame') }}">
                        <div class="tit">电子游艺</div>
                        <div class="eng">CASINO</div>
                    </a>
                    <div class="second-nav">
                        @if(in_array('PP', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PP&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >PP电子</a>
                        @endif
                        @if(in_array('CQ9', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=CQ9&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >CQ9电子</a>
                        @endif
                        @if(in_array('VT', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VT&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >VT电子</a>
                        @endif
                        @if(in_array('SG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SG&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >SG电子</a>
                        @endif
                        @if(in_array('JDB', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >JDB电子</a>
                        @endif
						@if(in_array('PTS', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >天风电子</a>
                        @endif
						@if(in_array('FG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >FG电子</a>
                        @endif
						
                        @if(in_array('PG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >PG电子</a>
                        @endif
                        @if(in_array('SA', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >SA电子</a>
                        @endif
                        @if(in_array('PT', $_api_list))
                           <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PT&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >PT电子</a>
                        @endif
                        @if(in_array('MG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MG&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >MG电子</a>
                        @endif
                        @if(in_array('AG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >AG电子</a>
                        @endif
                        @if(in_array('BS', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BS&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >BS电子</a>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >BBIN电子</a>
                        @endif
                        @if(in_array('QT', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=QT&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >QT电子</a>
                        @endif
                        @if(in_array('RT', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=RT&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >RT电子</a>
                        @endif
                        @if(in_array('BOG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BOG&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >BNG电子</a>
                        @endif
						@if(in_array('GGE', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GG&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >GG电子</a>
                        @endif
						@if(in_array('GA', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GA&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >GA电子</a>
                        @endif
						@if(in_array('AE', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AE&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >AE电子</a>
                        @endif
						@if(in_array('ISB', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ISB&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >ISB电子</a>
                        @endif
						
                    </div>
                </li>
                <li class="livecasino @if($web_route == 'web.liveCasino') active @endif">
                    <a href="{{ route('web.liveCasino') }}">
                        <div class="tit">视讯直播<img src="{{ asset('/web') }}/images/hot.gif"></div>
                        <div class="eng">LIVE CASINO</div>
                    </a>
                    <div class="second-nav">
                       @if(in_array('AG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >AG视讯</a>
                        @endif
						
                        @if(in_array('BBIN', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=live','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >BBIN视讯</a>
                        @endif
                        @if(in_array('BG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BG&gamename=2','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >BG视讯</a>
                        @endif
                        @if(in_array('SUNBET', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SUNBET','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >申博视讯</a>
                        @endif
						
						
                        @if(in_array('AB', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AB','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >欧博视讯</a>
                        @endif
						@if(in_array('MX', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MX','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >MX视讯</a>
                        @endif
						@if(in_array('VG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >VG视讯</a>
                        @endif
						@if(in_array('IGZR', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IGZR','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >IG视讯</a>
                        @endif
						@if(in_array('WM', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WM','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >WM视讯</a>
                        @endif
						@if(in_array('SA', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >SA视讯</a>
                        @endif
                        @if(in_array('N2', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=N2','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >N2视讯</a>
                        @endif
                        @if(in_array('GD', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GD','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >GD视讯</a>
                        @endif
                        @if(in_array('OG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=OG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >OG视讯</a>
                        @endif
                        @if(in_array('DG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >DG视讯</a>
                        @endif                                             
                        @if(in_array('GPI', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GPI','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >GPI视讯</a>
                        @endif
                    </div>
                </li>
                <li class="sports @if($web_route == 'web.esports') active @endif">
                    <a href="{{ route('web.esports') }}">
                        <div class="tit">体育竞技</div>
                        <div class="eng">SPORTS</div>
                    </a>
                    <div class="second-nav">
                        @if(in_array('GJ', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GJ','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>皇冠体育</a>
                        @endif
						@if(in_array('IM', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IM','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>IM体育</a>
                        @endif
                        @if(in_array('UG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=UG&gamename=SP3','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>UG体育</a>
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
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BBIN体育</a>
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
						@if(in_array('KG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=KG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>KG电竞</a>
                        @endif
						
                    </div>
                </li>
                <li class="lotterys @if($web_route == 'web.lottory') active @endif">
                    <a href="{{ route('web.lottory') }}">
                        <div class="tit">彩票游戏</div>
                        <div class="eng">LOTTERY</div>
                    </a>
                    <div class="second-nav">
                        @if(in_array('WG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>WG彩票</a>
                        @endif                        
                        @if(in_array('IG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>IG彩票</a>
                        @endif
                        @if(in_array('IG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG&gamename=imlotto10059','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>IG六合彩</a>
                        @endif
						@if(in_array('GBC', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GBC','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>GB彩票</a>
                        @endif
                        @if(in_array('IG2', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG2&gamename=imlotto10059','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>IG六合彩</a>
                        @endif
						
                        @if(in_array('EG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=EG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>EG彩票</a>
                        @endif
						@if(in_array('SWC', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SWC','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>双赢彩票</a>
                        @endif
						
                        @if(in_array('VR', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VR','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>VR彩票</a>
                        @endif
                        @if(in_array('SC', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SC','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>世彩彩票</a>
                        @endif
						@if(in_array('BGC', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BGC','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BG彩票</a>
                        @endif
						
                        @if(in_array('BBIN', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=Ltlottery','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BBIN彩票</a>
                        @endif
                    </div>
                </li>
                <li class="lotterys @if($web_route == 'web.catchFish') active @endif">
                    <a href="{{ route('web.catchFish') }}">
                        <div class="tit">捕鱼游戏</div>
                        <div class="eng">CATCHFISH</div>
                    </a>
                    <div class="second-nav">
                        @if(in_array('AG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=6','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>AG捕鱼王</a>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=30599','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BB捕鱼达人</a>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>BB捕鱼大师</a>
                        @endif
                        
                        @if(in_array('SA', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=FishermenGold','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>SA鱼乐无穷</a>
                        @endif
                        @if(in_array('CQ9', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=CQ9&gamename=AB3','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>CQ9皇金渔场</a>
                        @endif
                        @if(in_array('JDB', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>JDB财神捕鱼</a>
                        @endif
                       
                        @if(in_array('JDB', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7001','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>JDB龙王捕鱼</a>
                        @endif
                        @if(in_array('JDB', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7002','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>JDB龙王捕鱼2</a>
                        @endif
                      
                        @if(in_array('MT', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40024','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>MT李逵捕鱼</a>
                        @endif
                        @if(in_array('MT', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40025','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>MT金蟾捕鱼</a>
                        @endif
                     @if(in_array('PT', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PT&gamename=cashfi','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>PT深海大赢家</a>
                        @endif
                        @if(in_array('PTS', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fufish_intw','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>SW捕鱼多福</a>
                        @endif
						 @if(in_array('PTS', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_hl','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG欢乐捕鱼</a>
                        @endif
                        @if(in_array('SW', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fuqsg','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>SW福气水果</a>
                        @endif
						 @if(in_array('FG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_mm','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG美人捕鱼</a>
                        @endif
                        @if(in_array('FG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_3D','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG捕鱼嘉年华</a>
                        @endif
                        @if(in_array('FG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_tt','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG天天捕鱼</a>
                        @endif
                        @if(in_array('FG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_bn','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG捕鸟达人</a>
                        @endif
                        @if(in_array('FG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_zj','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>FG雷霆战警</a>
                        @endif
                       
                    </div>
                </li>
                <li class="lotterys @if($web_route == 'web.poker') active @endif">
                    <a href="{{ route('web.poker') }}">
                        <div class="tit">棋牌游戏</div>
                        <div class="eng">POKER</div>
                    </a>
                    <div class="second-nav">
                        @if(in_array('KY', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=KY','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>开元棋牌</a>
                        @endif
						@if(in_array('WGQP', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WGQP','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>WG棋牌</a>
                        @endif
						
						@if(in_array('TH', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=TH','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>天豪棋牌</a>
                        @endif
						@if(in_array('DSQP', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DSQP','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>DS棋牌</a>
                        @endif
						
                        @if(in_array('MT', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>美天棋牌</a>
                        @endif
						@if(in_array('SW', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SW&gamename=MyGameLobby','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>双赢棋牌</a>
                        @endif
                        @if(in_array('NEWVG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=NEWVG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>VG棋牌</a>
                        @endif
						@if(in_array('AS', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AS','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>天发棋牌</a>
                        @endif
						@if(in_array('HG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=HG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>欢乐棋牌</a>
                        @endif
						
                        
                        @if(in_array('JS', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JS','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif">金龙棋牌</a>
                        @endif
						@if(in_array('LEG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=LEG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif">乐游棋牌</a>
                        @endif
						@if(in_array('YG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=YG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif">王者棋牌</a>
                        @endif
						@if(in_array('GG', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GG','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif">GG棋牌</a>
                        @endif
						
						@if(in_array('IMQP', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IMQP','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif">IM棋牌</a>
                        @endif
						
						@if(in_array('NW', $_api_list))
                            <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=NW','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif>新世界棋牌</a>
                        @endif
                            @if(in_array('761', $_api_list))
                                <a href="javascript:;"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=761','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif">棋乐游棋牌</a>
                            @endif
                    </div>
                </li>
                <li class="promotions @if($web_route == 'web.activityList') active @endif">
                    <a href="{{ route('web.activityList') }}">
                        <div class="tit">优惠活动<img src="{{ asset('/web') }}/images/hot.gif"></div>
                        <div class="eng">PROMOTIONS</div>
                    </a>
                </li>
                <li class="mobilbet">
                    <a href="{{ $_system_config->app_link }}" target="_blank">
                        <div class="tit">手机投注</div>
                        <div class="eng">MOBILE BET</div>
                    </a>
                </li>
                <li class="service">
                    <a href="javascript:;"
                       onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                        <div class="tit">在线客服</div>
                        <div class="eng">ONLINE SERVICE</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="top">
            <div class="con">
                <a href="{{ route('member.finance_center') }}" class="quick">快捷充值中心</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('web.activityList') }}" class="vip">VIP专属</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('web.activityList') }}" class="discount">优惠办理大厅</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" class="agent daili_apply">代理申请</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{route('daili.init')}}" target="_blank" class="line-check">代理登录</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="javascript:;" class="rightlink01"></a>
                <a href="javascript:;" class="rightlink02"></a>
                <a href="javascript:;" class="rightlink03"></a>
            </div>
            <div class="con-bg">
                <img src="{{ asset('/web') }}/mb17/images/header_list_light.png">
            </div>
        </div>
    </div>

</div>
@if($web_route != 'web.index')
    @if (Auth::guard('member')->guest())
        <div class="nav-login">
            <div class="wrap">
                <div class="left url">
                    <img src="{{ asset('/web') }}/mb17/images/title02.png">
                </div>
                <div class="right index-logins">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <div class="module">
                            <span class="icon"></span>
                            <input type="text" name="name" class="inp" placeholder="账号" tabindex="1">
                        </div>
                        <div class="module">
                            <span class="icon"></span>
                            <input type="password" name="password" class="inp" placeholder="密码" tabindex="2">
                            <span class="tips"><a href="javascript:;" class="forget">忘记？</a></span>
                        </div>
                        <div class="module">
                            <input type="text" name="captcha" class="inp" placeholder="验证码" tabindex="3">
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
                        <button class="login-btn modal-login_submit ajax-submit-btn"></button>
                        <a href="{{ route('web.register_one') }}" class="register-btn"></a>
                        <a class="forget" href="javascript:;">忘记密码</a>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="nav-login nav-afterlogin">
            <div class="wrap">
                <div class="left url">
                    <img src="{{ asset('/web') }}/mb17/images/title02.png">
                </div>
                <div class="right">
                    账号： <span class="lightredCr">{{ $_member->name }}</span>&nbsp;
                    系统余额： <span class="lightredCr money">{{ $_member->all_money }}</span>&nbsp;
					剩余码量： <span class="lightredCr money">{{ $_member->ml_money }}</span>&nbsp;
					
                    {{--<a href="javascript:;"><img src="{{ asset('/web') }}/images/add.png"></a>&nbsp;--}}
                    @if($_system_config->is_new_center)
                        
					         <a href="{{ route('member.userCenter') }}?type=6">会员中心</a>
								 <a href="{{ route('member.userCenter') }}?type=1">存取款</a>							 
							   <a href="{{ route('member.userCenter') }}?type=4">账户记录</a>
                        @else
                    <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;&nbsp;|&nbsp;
                    <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;&nbsp;|&nbsp;
                    <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;&nbsp;|&nbsp;
                    <a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;&nbsp;|&nbsp;
                    <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>&nbsp;&nbsp;|&nbsp;
                    @endif
                    <a class="exit" href="{{ route('member.logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif


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
                    $('.money').text(all.toFixed(2));
                    $('.money-index').text(all.toFixed(2));
                }
            }
        })
    })
    @endif
</script>