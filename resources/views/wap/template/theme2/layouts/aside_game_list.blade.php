<table cellspacing="0" cellpadding="0" border="0" class="table table-bordered">
    <tr>
        <td class="tit">
            <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">全部游戏
        </td>
    </tr>
    @if(in_array('PGS', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=PGS&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>PGS电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('PNG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=PNG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>PNG电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('GNS', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GNS&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>GNS电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('PP', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=PP&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>PP电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('SG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=SG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>SG电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('MW', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=MW&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>MW电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('CQ9', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=CQ9&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>CQ9电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('SA', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=SA&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>SA电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('JDB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>JDB电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=FG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>FG电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
   
    @if(in_array('BOG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BOG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>BNG电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('MG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=MG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>MG电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('PT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=PT&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>PT电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	 @if(in_array('AG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>AG电子</span>
                    <i class="icon-angle-right"></i>
                   
                </a>
            </td>
        </tr>
    @endif
    @if(in_array('GPI', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GPI&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>GPI电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('BBIN', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>BB电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('QT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=QT&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>QT电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('DT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=DT&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>DT电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('PG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=PG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>PG电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('GTI', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GTI&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>GTI电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('GA', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GA&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>GA电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('HB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=HB&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>HB电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	 @if(in_array('BS', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BS&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>BS电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	@if(in_array('VT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=VT&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>VT电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('RT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=RT&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>RT电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('ISB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=ISB&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>ISB电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('GG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GG&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>GG电子</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    <tr>
        <td class="space"></td>
    </tr>
    @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>AG视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	@if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AGS"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>AG视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('BBIN', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=live"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>BB视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('BG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BG&gamename=2"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>BG视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	@if(in_array('AB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AB&gamename=2"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>欧博视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('SUNBET', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=SUNBET"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>申博视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('ALLBET', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AB"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>欧博视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('SA', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=SA"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>SA视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('GD', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GD"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>GD视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('OG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=OG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>OG视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('MX', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=MX"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>MX视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('VG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=VG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>VG视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('WM', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=WM"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>WM视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('N2', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=N2"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>N2视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('IGZR', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=IGZR"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>IG视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('DG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=DG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>DG视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
   
    @if(in_array('GPI', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GPI"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>GPI视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('EBET', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=EBET"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>EBET视讯</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    <tr>
        <td class="space"></td>
    </tr>
    
    @if(in_array('EG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=EG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>EG彩票</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('IG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=IG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>IG彩票</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=IG&gamename=imlotto10059"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>IG六合彩</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('WG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=WG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>WG彩票</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	 @if(in_array('SC', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=SC"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>SC彩票</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('VR', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=VR"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>VR彩票</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('BBIN', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=Ltlottery"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>BBIN彩票</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
   
    <tr>
        <td class="space"></td>
    </tr>
    @if(in_array('AG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AG&gamename=6"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>AG捕鱼王</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('BBIN', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=30599"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>BB捕鱼达人</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('BBIN', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=38001"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>BB捕鱼大师</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('GG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GG&game_type=6../images/zhenren/banner.1.jpg"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>GG捕鱼2</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('MW', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=MW&game_type=6../images/zhenren/banner.1.jpg"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>MW千炮捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('SA', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=SA&gamename=FishermenGold"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>SA鱼乐无穷</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('JDB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=7003"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>JDB财神捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=FG&game_type=6"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>FG欢乐捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('JDB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=7003"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>JDB龙王捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('JDB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=7003"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>JDB龙王捕鱼2</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=fish_mm"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>FG美人捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=fish_3D"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>捕鱼来了3D</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=fish_tt"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>FG天天捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=fish_bn"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>FG捕鸟达人</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=fish_zj"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>FG雷霆战警</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('MT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=MT&gamename=IMBG40024"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>MT李逵捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('MT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=MT&gamename=IMBG40025"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>MT金蟾捕鱼</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
  
    <tr>
        <td class="space"></td>
    </tr>
    @if(in_array('761', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=761"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>761棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('NEWVG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=NEWVG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>VG棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('SW', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=SW&gamename=MyGameLobby"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>双赢棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	@if(in_array('TH', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=TH"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>天豪棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	@if(in_array('NW', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=NW"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>新世界棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('JS', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=JS"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>金龙棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	@if(in_array('AS', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AS"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>天发棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	@if(in_array('HG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=HG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>欢乐棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	
    @if(in_array('MT', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=MT&gamename=MyGameLobby&game_code="  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>美天棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('KY', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=KY&game_code="  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>开元棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('FG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=TH&game_code="  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game1.png') }}" alt="">
                    <span>天豪棋牌</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    <tr>
        <td class="space"></td>
    </tr>
    @if(in_array('GJ', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=GJ"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>皇冠体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('SS', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=UG="  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>三昇体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('BBIN', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=ball"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>BB体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
	 @if(in_array('UG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=UG"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>UG体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('IBC', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=IBC"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>沙巴体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('AG', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AG&gamename=TASSPTA"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>AG体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('NEWBB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=NEWBB"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>NEWBB体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('ESB', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=ESB"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>ESB电竞</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('HC', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=HC"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>皇朝电竞</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('AVIA', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=AVIA../images/zhenren/banner.1.jpg"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>泛亚电竞</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
    @if(in_array('IM', $_api_list))
        <tr>
            <td>
                <a href="{{ route('wg.playGame') }}?devices=1&plat_type=IM"  target="_blank">
                    <img src="{{ asset('/wap/images/game/aside_game2.png') }}" alt="">
                    <span>IM体育</span>
                    <i class="icon-angle-right"></i>

                </a>
            </td>
        </tr>
    @endif
</table>