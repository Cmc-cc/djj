<header id="header">
    <div id="top-header">
        <div class="wrapper">
            <ul class="top-nav">
                <li class="license"></li>
                <li class="language" select-language>
                    语言选择:
                    <span data-language="zh-CN" title="简体中文"></span> <span data-language="zh-TW" title="繁体中文"></span> <span data-language="en-US" title="English" ></span>
                </li>
                <li>

                    <div class="div-meiDonNow">
                        美东时间 -
                        <span id="localtime" ></span>
                    </div>

                    <script type="text/javascript">
                        function showLocale(objD)
                        {
                            var str,colorhead,colorfoot;
                            var yy = objD.getYear();
                            if(yy<1900) yy = yy+1900;
                            var MM = objD.getMonth()+1;
                            if(MM<10) MM = '0' + MM;
                            var dd = objD.getDate();
                            if(dd<10) dd = '0' + dd;
                            var hh = objD.getHours();
                            if(hh<10) hh = '0' + hh;
                            var mm = objD.getMinutes();
                            if(mm<10) mm = '0' + mm;
                            var ss = objD.getSeconds();
                            if(ss<10) ss = '0' + ss;
                            var ww = objD.getDay();
                            if  ( ww==0 )  colorhead="<font color=\"#FF0000\">";
                            if  ( ww > 0 && ww < 6 )  colorhead="<font color=\"#373737\">";
                            if  ( ww==6 )  colorhead="<font color=\"#008000\">";
                            if  (ww==0)  ww="星期日";
                            if  (ww==1)  ww="星期一";
                            if  (ww==2)  ww="星期二";
                            if  (ww==3)  ww="星期三";
                            if  (ww==4)  ww="星期四";
                            if  (ww==5)  ww="星期五";
                            if  (ww==6)  ww="星期六";
                            colorfoot="</font>"
                            str = colorhead + yy + "-" + MM + "-" + dd + " " + hh + ":" + mm + ":" + ss + "  " + ww + colorfoot;
                            return(str);
                        }
                        function tick()
                        {
                            var today;
                            today = new Date();
                            document.getElementById("localtime").innerHTML = showLocale(today);
                            window.setTimeout("tick()", 1000);
                        }
                        tick();
                    </script>

                </li>
            </ul>
            <ul class="top-nav top-right">
                <li><a  target="_blank" href="{{route('daili.init')}}">代理登陆</a></li>
                <li><a class="daili_apply" >代理申请</a></li>
                <li><a ng-href="{{ route('web.activityList') }}" target="_blank">优惠申请大厅</a></li>
                <li class="app"><a ng-href="{{ $_system_config->app_link }}" target="_blank">手机APP下载</a></li>
                <li><a ng-href="{{ route('web.red') }}"target="_blank">VIP抢红包</a></li>
                {{--<li><a ng-href="{{ $_system_config->bywz }}" target="_blank">备用网址</a></li>--}}
            </ul>
        </div>
    </div>
    <div class="wrapper">

        <div id="logo-bg" style="background: none">
            <a href="{{ route('web.index') }}"><img src="{{ $_system_config->site_logo}}"></a>
        </div>

        <nav id="nav">
            <ul ng-controller="LobbiesCtrl">
                <li class="home">
                    <a href="{{ route('web.index') }}">首 页<span>HOME</span></a>
                </li>
                <li class="red hot">
                    <a href="{{route('web.eGame')}}">電子游艺<span>SLOTS</span></a>
                    <div class="subnav">
                        <div class="sub-title">天天返水3.0%</div>
                        <ol>
                            @if(in_array('MG', $_api_list))
                                <li class="sub-hot" game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=MG&game_type=2">MG電子</a>
                                </li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li class="sub-hot" game-box="pt">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=PT&game_type=2">PT電子</a>
                                </li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="sub-hot" game-box="bb">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2">BBIN電子</a>
                                </li>
                            @endif
                            @if(in_array('AG', $_api_list))
                                <li game-box="ag">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=AG&game_type=2">AG電子</a>
                                </li>
                            @endif
                            @if(in_array('PP', $_api_list))
                                <li game-box="ag">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=PP&game_type=2">PP電子</a>
                                </li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li game-box="ag">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=SA&game_type=2">SA電子</a>
                                </li>
                            @endif
                            @if(in_array('QT', $_api_list))
                                <li game-box="ag">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=QT&game_type=2">QT電子</a>
                                </li>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <li game-box="ag">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=SW&game_type=2">SW電子</a>
                                </li>
                            @endif
                            {{--<li class="sub-hot" game-box="mg" ng-click="toMgFlash()">MG電子</li>
                            <li class="sub-hot" game-box="pt" ng-click="toPtFlash()">PT電子</li>
                            <li class="sub-hot" game-box="bb" ng-click="toBbGame()">BBIN電子</li>
                            <li game-box="ag" ng-click="toAgHtml()">AG電子</li>
                            <li game-box="pp" ng-click="toPrgFlash()">PP電子</li>
                            <li game-box="gns" ng-click="toGnsHtml()">SA電子</li>
                            <li game-box="hb" ng-click="toHabaHtml()">QT電子</li>
                            <li game-box="rt" ng-click="toRedTigerHtml()">SW電子</li>--}}
                        </ol>
                        <ol>
                            @if(in_array('CQ9', $_api_list))
                                <li class="sub-hot" game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=CQ9&game_type=2">传奇電子</a>
                                </li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="sub-hot" game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=JDB&game_type=2">夺宝電子</a>
                                </li>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <li game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=MW&game_type=2">MW電子</a>
                                </li>
                            @endif
                            @if(in_array('SG', $_api_list))
                                <li game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=SG&game_type=2">新霸電子</a>
                                </li>
                            @endif
                            @if(in_array('GPI', $_api_list))
                                <li game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=GPI&game_type=2">GPI電子</a>
                                </li>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <li game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=FG&game_type=2">FG電子</a>
                                </li>
                            @endif
                            @if(in_array('BNG', $_api_list))
                                <li game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=BNG&game_type=2">BNG電子</a>
                                </li>
                            @endif
                            {{--<li class="sub-hot" game-box="cq9" ng-click="toCq9Html()">传奇電子</li>
                            <li class="sub-hot" game-box="jdb" ng-click="toJdbHtml()">夺宝電子</li>
                            <li game-box="mw" ng-click="toMwHtml()">MW電子</li>
                            <li game-box="sg" ng-click="toSgFlash()">新霸電子</li>
                            <li game-box="gpi" ng-click="toGpiFlash()">GPI電子</li>
                            <li game-box="ne" ng-click="toNetentHtml()">FG電子</li>
                            <li game-box="isb" ng-click="toIsbHtml()">BNG電子</li>--}}
                        </ol>
                    </div>
                </li>
                <li class="green hot">
                    <a href="{{ route('web.esports') }}">體育赛事<span>SPORT</span></a>
                    <ol class="subnav">
                        @if(in_array('SS', $_api_list))
                            <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>三昇體育</span></li>
                        @endif
                        @if(in_array('SS', $_api_list))
                            <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>皇冠體育</span></li>
                        @endif
                        @if(in_array('IBC', $_api_list))
                            <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>沙巴體育</span></li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <li class="hot"  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BBIN體育</span></li>
                        @endif
                        @if(in_array('AG', $_api_list))
                            <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>AG體育</span></li>
                        @endif
                        @if(in_array('NEWBB', $_api_list))
                            <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"@else onclick="Alert();"@endif><span>NEWBB體育</span></li>
                        @endif
                        @if(in_array('ESB', $_api_list))
                            <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>ESB电竞</span></li>
                        @endif
                        @if(in_array('AVIA', $_api_list))
                            <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>泛亚电竞</span></li>
                        @endif
                        {{--<li class="hot" game-box="3sing" @if($_member) ng-click="toSingSport()"@else onclick="Alert();"@endif><span>三昇體育</span></li>
                        <li class="hot" game-box="cr188" @if($_member) ng-click="toIboSport()"@else onclick="Alert();"@endif><span>皇冠體育</span></li>
                        <li class="hot" game-box="saba" @if($_member) ng-click="toSabaGame()"@else onclick="Alert();"@endif><span>沙巴體育</span></li>
                        <li class="hot" game-box="bb" @if($_member) ng-click="toBbSport()"@else onclick="Alert();"@endif><span>BBIN體育</span></li>
                        <li game-box="cmd" @if($_member) ng-click="toCmdSport()"@else onclick="Alert();"@endif><span>AG體育</span></li>
                        <li game-box="im" @if($_member) ng-click="toImsSport()"@else onclick="Alert();"@endif><span>NEWBB體育</span></li>
                        <li game-box="esb" @if($_member) ng-click="toImSport()"@else onclick="Alert();"@endif><span>ESB电竞</span></li>
                        <li game-box="cr188" @if($_member) ng-click="toIbo1Sport()"@else onclick="Alert();"@endif><span>泛亚电竞</span></li>
                        <li game-box="cr188" @if($_member) ng-click="toIbo2Sport()"@else onclick="Alert();"@endif><span>皇朝电竞</span></li>--}}

                    </ol>
                </li>
                <li class="blue">
                    <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
                    <ol class="subnav">
                        <?php
                        $lottery = (new \App\Http\Controllers\Wap\AjaxController())->getGames('lottery');
                        ?>
                        @if(count($lottery) > 0)
                            @foreach($lottery as $k=> $v)
                                <li class="hot"
                                    @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"@endif>
                                    <span>{{ $v['name'] }}</span>
                                </li>
                            @endforeach
                        @endif
                        {{--@if(in_array('SGL', $_api_list))

                            <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SGL&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>SG双赢彩票</span></li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BBIN彩票</span></li>
                        @endif
                        @if(in_array('IG', $_api_list))
                            <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG彩票</span></li>
                        @endif
                        @if(in_array('IG', $_api_list))
                            <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&game_code=imlotto10059','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG六合彩</span></li>
                        @endif
                        @if(in_array('VR', $_api_list))
                            <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>VR竞速彩票</span></li>
                        @endif
                        @if(in_array('EG', $_api_list))
                            <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>EG彩票</span></li>
                        @endif
                        @if(in_array('BG', $_api_list))
                            <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BG彩票</span></li>
                        @endif--}}
                        {{--<li class="hot" @if($_member) ng-click="toLxLottery()"@else onclick="Alert();"@endif><span>富赢信用彩票</span></li>
                        <li class="hot" @if($_member) ng-click="toRgLottery()"@else onclick="Alert();"@endif><span>富赢传统彩票</span></li>
                        <li class="hot" @if($_member) ng-click="toBbLottery()"@else onclick="Alert();"@endif><span>BBIN彩票</span></li>
                        <li class="hot" @if($_member) ng-click="toIgLottery()"@else onclick="Alert();"@endif><span>IG彩票</span></li>
                        <li class="hot" @if($_member) ng-click="toIgMarkSix()"@else onclick="Alert();"@endif><span>IG六合彩</span></li>
                        <li class="hot" @if($_member) ng-click="toVrLottery()"@else onclick="Alert();"@endif><span>VR竞速彩票</span></li>
                        <li class="hot" @if($_member) ng-click="toIg1MarkSix()"@else onclick="Alert();"@endif><span>EG彩票</span></li>
                        <li class="hot" @if($_member) ng-click="toVr1Lottery()"@else onclick="Alert();"@endif><span>BG彩票</span></li>--}}
                    </ol>
                </li>
                <li class="hot">
                    <a href="{{ route('web.poker') }}">棋牌游戏<span>Card Games</span></a>

                    <ol class="subnav">
                        <li class="sub-title">天天反水 3.0%</li>
                        @if(in_array('AP', $_api_list))
                            <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=AP&game_type=7">AP爱棋牌</a></li>
                        @endif
                        @if(in_array('VG', $_api_list))
                            <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=VG&game_type=7">VG棋牌</a></li>
                        @endif
                        @if(in_array('SG', $_api_list))
                            <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=SG&game_type=7">SG棋牌</a></li>
                        @endif
                        @if(in_array('LEG', $_api_list))
                            <li class="hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=LEG&game_type=7">LEG棋牌</a></li>
                        @endif
                        @if(in_array('MT', $_api_list))
                            <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=MT&game_type=7">美天棋牌</a></li>
                        @endif
                        @if(in_array('KY', $_api_list))
                            <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=KY&game_type=7">开元棋牌</a></li>
                        @endif
                        @if(in_array('FG', $_api_list))
                            <li class="sub-hot"><a target="_blank" href="{{route('game.playGame')}}?plat_type=FG&game_type=7">FG棋牌</a></li>
                        @endif
                        {{--<li class="hot" ng-click="toKgHtml()">开元棋牌</li>
                        <li class="hot" ng-click="toGpkBoard()">美天棋牌</li>
                        <li class="hot" ng-click="toNwBoard()">VG棋牌</li>
                        <li class="hot" ng-click="toGpk2Html()">FG棋牌</li>
                        <li game-box="fg" ng-click="toFsBoard()">乐游棋牌</li>--}}
                    </ol>

                </li>
                <li class="hot">
                    <a href="{{ route('web.catchFish') }}">捕魚游戏<span>Fish Hunter</span></a>
                    <div class="subnav fish">
                        <div class="sub-title">天天反水 3.0%</div>
                        <ol>
                            @if(in_array('FG', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG美人捕魚</li>
                            @endif

                            @if(in_array('FG', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_bn','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG捕鸟达人</li>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG天天捕魚</li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7003','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>JDB财神捕魚</li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>JDB龙王捕魚</li>
                            @endif
                            @if(in_array('AG', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>AG捕魚王</li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>BB捕魚达人</li>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>SW捕魚多福</li>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&game_code=sw_fuqsg','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>SW捕魚多福</li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=6&game_code=cashfi','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>PT深海大赢家</li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>SA鱼乐无穷</li>
                            @endif
                            {{--<li class="hot" game-box="fs-beauty" @if($_member) ng-click="toFsFishBeauty()"@else onclick="Alert();"@endif>FG美人捕魚</li>
                            <li class="hot" game-box="fs-bird" @if($_member) ng-click="toFsFishBird()"@else onclick="Alert();"@endif>FG捕鸟达人</li>
                            <li class="hot" game-box="fs-everyday" @if($_member) ng-click="toFsFishEveryDay()"@else onclick="Alert();"@endif>FG天天捕魚</li>
                            <li class="hot" game-box="rg-king" @if($_member) ng-click="toRgFish2()"@else onclick="Alert();"@endif>JDB财神捕魚</li>
                            <li class="hot" game-box="jdb-dragon" @if($_member) ng-click="toJdbFish()"@else onclick="Alert();"@endif>JDB龙王捕魚</li>
                            <li class="hot" game-box="ag" @if($_member) ng-click="toAgFish()"@else onclick="Alert();"@endif>AG捕魚王</li>
                            <li game-box="bb-expert" @if($_member) ng-click="toBbFish()"@else onclick="Alert();"@endif>BBIN捕魚达人</li>
                            <li game-box="pts" @if($_member) ng-click="toPtsFish()"@else onclick="Alert();"@endif>SW捕魚多福</li>
                            <li game-box="pts" @if($_member) ng-click="toPts2Fish()"@else onclick="Alert();"@endif>SW福气水果</li>
                            <li game-box="pt" @if($_member) ng-click="toPtFish()"@else onclick="Alert();"@endif>PT深海大赢家</li>
                            <li game-box="pg-fishking" @if($_member) ng-click="toPgFish()"@else onclick="Alert();"@endif>SA鱼乐无穷</li>--}}
                        </ol>
                        <ol>
                            @if(in_array('FG', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG欢乐捕魚</li>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_zj','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG雷霆战警</li>
                            @endif
                            @if(in_array('FG', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>FG捕魚嘉年华</li>
                            @endif
                            @if(in_array('CQ9', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>CQ9皇金渔场</li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>JDB龙王捕魚2</li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="sub-hot"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>BBIN捕魚大师</li>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>MW千炮捕魚</li>
                            @endif
                            @if(in_array('MT', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>MT李逵捕魚</li>
                            @endif
                            @if(in_array('MT', $_api_list))
                                <li
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0045','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif>MT金蟾捕魚</li>
                            @endif
                            {{--<li class="hot" game-box="fs-happy" @if($_member) ng-click="toFsFishHappy()"@else onclick="Alert();"@endif>FG欢乐捕魚</li>
                            <li class="hot" game-box="fs-thunder" @if($_member) ng-click="toFsFishThunder()"@else onclick="Alert();"@endif>FG雷霆战警</li>
                            <li class="hot" game-box="fs-thunder" @if($_member) ng-click="toFs2FishThunder()"@else onclick="Alert();"@endif>FG捕魚嘉年华</li>
                            <li class="hot" game-box="cq9" @if($_member) ng-click="toCq9Fish()"@else onclick="Alert();"@endif>CQ9皇金渔场</li>
                            <li class="hot" game-box="gpk-tycoon" @if($_member) ng-click="toRgFish()"@else onclick="Alert();"@endif>CQ9捕魚去喽</li>
                            <li class="hot" game-box="jdb-dragon2" @if($_member) ng-click="toJdbFish2()"@else onclick="Alert();"@endif>JDB龙王捕魚2</li>
                            <li class="hot" game-box="bb-master" @if($_member) ng-click="toBbFish2()"@else onclick="Alert();"@endif>BBIN捕魚大师</li>
                            <li game-box="mw" @if($_member) ng-click="toMwFish()"@else onclick="Alert();"@endif>MW千炮捕魚</li>
                            <li game-box="gns" @if($_member) ng-click="toGnsFish()"@else onclick="Alert();"@endif>MT李逵捕魚</li>
                            <li game-box="pg-all" @if($_member) ng-click="toPgFish2()"@else onclick="Alert();"@endif>MT金蟾捕魚</li>--}}
                        </ol>
                    </div>
                </li>
                <li>
                    <a href="{{ route('web.liveCasino') }}">視訊直播<span>CASINO</span></a>
                    <div class="subnav">
                        <div class="sub-title">天天返水1.2%</div>
                        <ol>
                            @if(in_array('AG', $_api_list))
                                <li class="hot" game-box="ag"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>AG寰亚厅</li>
                            @endif
                            @if(in_array('BG', $_api_list))
                                <li game-box="bg" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>BG尊娱厅</li>
                            @endif
                            @if(in_array('ALLBET', $_api_list))
                                <li game-box="ab" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>AB尊爵厅</li>
                            @endif
                            @if(in_array('GPI', $_api_list))
                                <li game-box="gpi" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>GPI贵宾厅</li>
                            @endif
                            @if(in_array('GD', $_api_list))
                                <li game-box="gd" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>GD奢华厅</li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li game-box="sa" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>沙龙荣耀厅</li>
                            @endif
                                @if(in_array('CQ9', $_api_list))
                                    <li game-box="sa" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>CQ9視訊</li>
                                @endif
                            {{--@if(in_array('AG', $_api_list))
                                <li class="sub-hot" game-box="ag" @if($_member) ng-click="toAgLive()" @else onclick="Alert();"@endif>AG寰亚厅</li>
                            @endif
                            @if(in_array('BG', $_api_list))
                                <li game-box="bg" @if($_member) ng-click="toBgLive()" @else onclick="Alert();"@endif>BG尊娱厅</li>
                            @endif
                            @if(in_array('ALLBET', $_api_list))
                                <li game-box="ab" @if($_member) ng-click="toAbLive()" @else onclick="Alert();"@endif>AB尊爵厅</li>
                            @endif
                            @if(in_array('GPI', $_api_list))
                                <li game-box="gpi" @if($_member) ng-click="toGpiLive()" @else onclick="Alert();"@endif>GPI贵宾厅</li>
                            @endif
                            @if(in_array('GD', $_api_list))
                                <li game-box="gd" @if($_member) ng-click="toGdLive()" @else onclick="Alert();"@endif>GD奢华厅</li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li game-box="sa" @if($_member) ng-click="toSaLive()" @else onclick="Alert();"@endif>沙龙荣耀厅</li>
                            @endif--}}
                        </ol>
                        <ol>
                            @if(in_array('BBIN', $_api_list))
                                <li class="hot" game-box="bb" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>BBIN旗舰厅</li>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <li game-box="mg" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>MG欧美厅</li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li game-box="pt" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>PT国际厅</li>
                            @endif
                            @if(in_array('DG', $_api_list))
                                <li game-box="evo" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>DG尊爵会</li>
                            @endif
                            @if(in_array('SUNBET', $_api_list))
                                <li game-box="sb" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>申博梦幻厅</li>
                            @endif
                            @if(in_array('OG', $_api_list))
                                <li game-box="og" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>OG如意厅</li>
                            @endif
                            {{--@if(in_array('BBIN', $_api_list))
                                <li class="sub-hot" game-box="bb" @if($_member) ng-click="toBbLive()" @else onclick="Alert();"@endif>BBIN旗舰厅</li>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <li game-box="mg" @if($_member) ng-click="toMgLive()" @else onclick="Alert();"@endif>MG欧美厅</li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li game-box="pt" @if($_member) ng-click="toPtLive()" @else onclick="Alert();"@endif>PT国际厅</li>
                            @endif
                            @if(in_array('DG', $_api_list))
                                <li game-box="evo" @if($_member) ng-click="toEvoLive()" @else onclick="Alert();"@endif>DG尊爵会</li>
                            @endif
                            @if(in_array('SUNBET', $_api_list))
                                <li game-box="sb" @if($_member) ng-click="toSunbetLive()" @else onclick="Alert();"@endif>申博梦幻厅</li>
                            @endif
                            @if(in_array('OG', $_api_list))
                                <li game-box="og" @if($_member) ng-click="toOgLive()" @else onclick="Alert();"@endif>OG如意厅</li>
                            @endif--}}
                        </ol>
                    </div>
                </li>

                <li class="red hot">
                    <a href="{{ route('web.activityList') }}">优惠活动<span>PROMOTION</span></a>
                    {{--<ol class="subnav">
                        <li class="sub-hot"><a ng-href="{{ route('web.activityList') }}" target="_blank">活动申请大厅</a></li>
                        <li class="sub-hot"><a ng-href="" target="_blank">欢乐开宝箱</a></li>
                        <li><a ng-href="" target="_blank">银河优越会</a></li>
                        <li><a ng-href="" target="_blank">手机APP下载</a></li>
                    </ol>--}}
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服<span>SERVICE</span></a>
                </li>
            </ul>
        </nav>
    </div>
</header>
@if (Auth::guard('member')->guest())
    <div id="header-bot" class="home">
        <div class="wrapper">

            <div id="account-box" class="wow flipInX">
                <form name="LoginForm" id="LoginForm" action="{{ route('member.login.post') }}" method="POST">
                    <input id="login_account" type="text" placeholder="帐号" name="name" tabindex="1" required title="请输入账号"/>
                    <input id="login_password" type="password" placeholder="密码" name="password" tabindex="2" required title="请输入密码" />
                    <span class="forget-btn" ng-click=""onclick="return layer.alert('您好！忘记密码请联系客服!',{icon:7});">忘记?</span>
                    <div id="check-code-wrapper">
                        <input id="rmNum"  type="text" placeholder="验证码" name="captcha" tabindex="3" onfocus="javascript:re_captcha();"  required title="请输入验证码"/>
                        <img src="{{ URL('kit/captcha/1') }}" id="captcha"  style="background-color: burlywood;"onfocus="javascript:re_captcha();"
                        />
                        <script>
                            function re_captcha() {
                                $url = "{{ URL('kit/captcha') }}";
                                $url = $url + "/" + Math.random();
                                document.getElementById('captcha').src = $url;
                            }
                        </script>
                    </div>
                    <button id="login-box" class="login-btn ajax-submit-btn" ng-disabled="isProcessing" ng-bind="isProcessing ? '登入...' : '登入'">登入</button>
                    <button class="join-btn" onclick="javascript:window.location.href = '{{ route('web.register_one') }}';" type="button">免费开户</button>
                    <a class="freeplay-btn"  ng-click=""onclick="return layer.alert('您好！请联系客服索取试玩帐号!',{icon:7});">免费试玩</a>
                    <div id="agree" ng-show="loginOver" ng-cloak>
                        点击登入表示同意<a ng-click="agreement()">用户协议</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@else

    <div id="header-bot" class="home">
        <div class="wrapper">

            <div id="account-box" class="is-login wow flipInX" ng-controller="AccountCtrl" ng-init="$root.user.isLogin=true">
                <ul id="account-info">
                    <li class="user">
                        帐号 :
                        <span class="account" title="{{ $_member->name }}">{{ $_member->name }}</span>
                        {{--<a id="mailbox" ng-controller="SiteMailCountCtrl" href="/member/FYcenter/12#2" title="站内信">
                            <span>{{ $_not_read_message_num }}</span>
                        </a>--}}
                    </li>
                    <li class="money">
                        账户余额 :
                        <strong class="money1">{{ $_member->money }}</strong>
                    </li>
                </ul>


                <ul id="account-nav">
                    @if($_system_config ->is_new_center == 1)
                        <li title="会员中心">
                            <a href="{{ route('member.userCenter') }}">
                                会员中心
                            </a>
                        </li>
                    @else
                        <li class="deposit">
                            <a href="{{ route('member.finance_center') }}">
                                线上存款
                            </a>
                        </li>
                        <li class="withdraw">
                            <a href="{{ route('member.member_drawing') }}">
                                线上取款
                            </a>
                        </li>
                        <li class="betrecord">
                            <a href="{{ route('member.customer_report') }}">
                                账户记录
                            </a>
                        </li>
                        <li class="record">
                            <a href="{{ route('member.userCenter') }}">
                                账户管理
                            </a>
                        </li>
                        {{--<li class="change">
                            <a id="change-password-btn" href="/member/FYcenter/2#5" class="forget-btn">修改密码</a>
                        </li>
                        <li class="money1">
                            <a href="/member/FYcenter/6#6" title="修改取款密码">
                                修改取款密码
                            </a>
                        </li>--}}
                    @endif
                </ul>
                <div id="action-box">
                    <a href="{{ route('member.logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="login-btn">登出</a>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
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
                        var all = Number($('.money1').text()) + Number(data.data);
                        $('.money1').text('');
                        $('.money1').text(parseInt(all.toFixed(2)));
                    }
                }
            })
        })
        @endif
        @endif
    </script>

@endif

