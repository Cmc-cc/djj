<div class="header-top">
    <div class="wrapper">
        <ul class="left-nav">
            <li class="language">
                <ul id="select-language" select-language>
                    <li data-language="zh-CN" title="简体中文" class="ng-scope">简体中文<i class="fa fa-caret-down" aria-hidden="true"></i></li>
                    <li data-language="zh-TW" title="繁体中文" class="ng-scope">繁体中文</li>
                    <li data-language="en-US" title="English" class="ng-scope">English</li>
                </ul>
            </li>
            <li class="slot-butler"><a href="{{route('daili.init')}}" target="_blank">代理登录</a></li>
            <li><a ng-href="{{ route('web.red') }}" target="_blank">抢红包</a></li>
            {{--<li><a ng-href="{{ $_system_config->kscz}}" target="_blank">快速充值</a></li>--}}
            <li><a ng-href="{{ $_system_config->app_link }}" target="_blank">手机APP下载</a></li>
        </ul>
        <ul class="right-nav" ng-controller="LobbiesCtrl">
            <li class="pt"><a href="{{route('web.eGame')}}" target="_blank">電子游戏</a></li>
            {{--<li class="time"><a href="/Promotion">时时返水</a></li>--}}
            <li class="kg"><a target="_blank" href="{{route('web.poker')}}">棋牌游戏</a></li>
            <li class="lottery"><a target="_blank" href="{{ route('web.lottory') }}">时时彩</a></li>
            <li><a href="/m">手机投注</a></li>
            {{--<li><a ng-href="{{ $_system_config->bywz }}" target="_blank">备用网址</a></li>--}}
            <li class="wechat"><a href="javascript:void(0)" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服</a></li>
        </ul>
    </div>
</div>
<header id="header" scrolltop-fixed="46">
    <div class="wrapper">

        <div id="logo-bg" style="background: none">
            <a href="/">
                <img src="{{ $_system_config->site_logo}}">
            </a>
        </div>

        <nav id="nav">
            <ul ng-controller="LobbiesCtrl">
                <li>
                    <a href="/">首页<span>HOME</span></a>
                </li>
                <li class="slot hot">
                    <a href="{{route('web.eGame')}}">電子游艺<span>SLOTS</span></a>
                    <div class="subnav">
                        <div class="discount">天天返水3.0%</div>
                        <ol>
                            @if(in_array('MG', $_api_list))
                                <li class="hot" game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=MG&game_type=2">MG電子</a>
                                </li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li class="hot" game-box="pt">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=PT&game_type=2">PT電子</a>
                                </li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="hot" game-box="bb">
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
                            {{--<li class="hot" game-box="mg" ng-click="toMgFlash()">MG電子</li>
                            <li class="hot" game-box="pt" ng-click="toPtFlash()">PT電子</li>
                            <li class="hot" game-box="bb" ng-click="toBbGame()">BBIN電子</li>
                            <li game-box="ag" ng-click="toAgHtml()">AG電子</li>
                            <li game-box="pp" ng-click="toPrgFlash()">PP電子</li>
                            <li game-box="gns" ng-click="toGnsHtml()">SA電子</li>
                            <li game-box="hb" ng-click="toHabaHtml()">QT電子</li>
                            <li game-box="rt" ng-click="toRedTigerHtml()">SW電子</li>--}}
                        </ol>
                        <ol>
                            @if(in_array('CQ9', $_api_list))
                                <li class="hot" game-box="mg">
                                    <a target="_blank" href="{{route('game.playGame')}}?plat_type=CQ9&game_type=2">传奇電子</a>
                                </li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="hot" game-box="mg">
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
                            {{--<li class="hot" game-box="cq9" ng-click="toCq9Html()">传奇電子</li>
                            <li class="hot" game-box="jdb" ng-click="toJdbHtml()">夺宝電子</li>
                            <li game-box="mw" ng-click="toMwHtml()">MW電子</li>
                            <li game-box="sg" ng-click="toSgFlash()">新霸電子</li>
                            <li game-box="gpi" ng-click="toGpiFlash()">GPI電子</li>
                            <li game-box="ne" ng-click="toNetentHtml()">FG電子</li>
                            <li game-box="isb" ng-click="toIsbHtml()">BNG電子</li>--}}
                        </ol>
                    </div>
                </li>
                <li class="mg-slot hot">
                    <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
                    <div class="subnav">
                        <div class="discount">天天返水3.0%</div>
                        <ol>
                            @if(in_array('SGL', $_api_list))

                                <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SGL&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>SG双赢彩票</span></li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                                <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BBIN彩票</span></li>
                            @endif
                            @if(in_array('IG', $_api_list))
                                <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG彩票</span></li>
                            @endif
                            {{--<li class="hot" @if($_member) ng-click="toLxLottery()"@else onclick="Alert();"@endif><span>富赢信用彩票</span></li>
                            <li class="hot" @if($_member) ng-click="toRgLottery()"@else onclick="Alert();"@endif><span>富赢传统彩票</span></li>
                            <li class="hot" @if($_member) ng-click="toBbLottery()"@else onclick="Alert();"@endif><span>BBIN彩票</span></li>
                            <li class="hot" @if($_member) ng-click="toIgLottery()"@else onclick="Alert();"@endif><span>IG彩票</span></li>--}}
                        </ol>
                        <ol>
                            @if(in_array('IG', $_api_list))
                                <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&game_code=imlotto10059','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG六合彩</span></li>
                            @endif
                                @if(in_array('IG', $_api_list))
                                    <li class="hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&game_code=gfcai','','width=1024,height=768')"@else onclick="Alert();"@endif><span>IG官方彩</span></li>
                                @endif
                            @if(in_array('VR', $_api_list))
                                <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>VR竞速彩票</span></li>
                            @endif
                            @if(in_array('EG', $_api_list))
                                <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>EG彩票</span></li>
                            @endif
                            @if(in_array('BG', $_api_list))
                                <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>BG彩票</span></li>
                            @endif
                                @if(in_array('FH', $_api_list))
                                    <li class="sub-hot" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FH&game_type=3','','width=1024,height=768')"@else onclick="Alert();"@endif><span>FH乐利彩票</span></li>
                                @endif
                            {{--<li class="hot" @if($_member) ng-click="toIgMarkSix()"@else onclick="Alert();"@endif><span>IG六合彩</span></li>
                            <li class="hot" @if($_member) ng-click="toVrLottery()"@else onclick="Alert();"@endif><span>VR竞速彩票</span></li>
                            <li class="hot" @if($_member) ng-click="toIg1MarkSix()"@else onclick="Alert();"@endif><span>EG彩票</span></li>
                            <li class="hot" @if($_member) ng-click="toVr1Lottery()"@else onclick="Alert();"@endif><span>BG彩票</span></li>--}}
                        </ol>
                    </div>
                </li>

                <li class="board hot">
                    <a href="{{route('web.poker')}}">棋牌对战<span>CARD GAMES</span></a>
                    <div class="subnav one-col">
                        <div class="discount">天天返水2.0%</div>
                        <ol>
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
                    </div>
                </li>
                <li>
                    <a href="{{ route('web.catchFish') }}">捕魚达人<span>FISH</span></a>
                    <div class="subnav fish">
                        <div class="discount">天天返水2.0%</div>
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
                    <a href="{{ route('web.liveCasino') }}">真人視訊<span>CASINO</span></a>
                    <div class="subnav">
                        <div class="discount">天天返水0.8%</div>
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
                            {{--@if(in_array('AG', $_api_list))
                                <li class="hot" game-box="ag" @if($_member) ng-click="toAgLive()" @else onclick="Alert();"@endif>AG寰亚厅</li>
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
                                <li class="hot" game-box="bb" @if($_member) ng-click="toBbLive()" @else onclick="Alert();"@endif>BBIN旗舰厅</li>
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
                <li>
                    <a href="{{ route('web.esports') }}">體育投注<span>SPORT</span></a>
                    <div class="subnav">
                        <div class="discount">天天返水1.2%</div>
                        <ol>
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
                            {{--<li class="hot" game-box="3sing" @if($_member) ng-click="toSingSport()"@else onclick="Alert();"@endif><span>三昇體育</span></li>
                            <li class="hot" game-box="cr188" @if($_member) ng-click="toIboSport()"@else onclick="Alert();"@endif><span>皇冠體育</span></li>
                            <li class="hot" game-box="saba" @if($_member) ng-click="toSabaGame()"@else onclick="Alert();"@endif><span>沙巴體育</span></li>
                            <li class="hot" game-box="bb" @if($_member) ng-click="toBbSport()"@else onclick="Alert();"@endif><span>BBIN體育</span></li>
                            <li game-box="im" @if($_member) ng-click="toImsSport()"@else onclick="Alert();"@endif><span>NEWBB體育</span></li>--}}

                        </ol>
                        <ol>
                            @if(in_array('ESB', $_api_list))
                                <li  @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ESB&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>ESB电竞</span></li>
                            @endif
                            @if(in_array('AVIA', $_api_list))
                                <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AVIA&game_type=5','','width=1024,height=768')"@else onclick="Alert();"@endif><span>泛亚电竞</span></li>
                            @endif
                            {{--<li game-box="cmd" @if($_member) ng-click="toCmdSport()"@else onclick="Alert();"@endif><span>AG體育</span></li>
                            <li game-box="esb" @if($_member) ng-click="toImSport()"@else onclick="Alert();"@endif><span>ESB电竞</span></li>
                            <li game-box="cr188" @if($_member) ng-click="toIbo1Sport()"@else onclick="Alert();"@endif><span>泛亚电竞</span></li>
                            <li game-box="cr188" @if($_member) ng-click="toIbo2Sport()"@else onclick="Alert();"@endif><span>皇朝电竞</span></li>--}}
                        </ol>
                    </div>
                </li>
                <li class="promo hot">
                    <a href="{{ route('web.activityList') }}">优惠活动<span>ACTIVITY</span></a>
                    {{--<div class="subnav one-col">
                        <ol>
                            <li><a ng-href="" target="_blank">活动大厅</a></li>
                            <li><a ng-href="" target="_blank">VIP贵宾会</a></li>
                            <li><a ng-href="" target="_blank">抢红包</a></li>
                            <li><a ng-href="" target="_blank">升级模式</a></li>
                        </ol>
                    </div>--}}
                </li>
                <li class="cq9-slot hot">
                    <a href="javascript:void(0)" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服<span>SERVICE</span></a>

                </li>
            </ul>
        </nav>
    </div>
</header>

@if (Auth::guard('member')->guest())
    <div id="account-box" class="home" scrolltop-fixed="46">
        <div class="wrapper">
            <form name="LoginForm" id="LoginForm" action="{{ route('member.login.post') }}" method="POST">
                <input id="login_account" type="text" placeholder="帐号" name="name" maxlength="16"
                       tabindex="1" pattern="[a-zA-Z0-9]{4,15}" required autofocus />
                <input id="login_password" type="password" placeholder="密码" name="password" maxlength="13" tabindex="2" pattern="[a-zA-Z0-9]{6,13}" required />
                <span class="forget-btn" ng-click="lineChatClick()">忘记?</span>

                <div id="check-code-wrapper">
                    <input name="captcha" type="text" id="rmNum" size="7" maxlength="4"
                           title="( 点选此处产生新验证码 )"
                           class="yzm" onfocus="javascript:re_captcha();"  tabindex="3" pattern="\d{4}" required="" placeholder="验证码"  required />
                    <img id="captcha"  style="background-color: burlywood;"
                    />
                    <script>
                        function re_captcha() {
                            $url = "{{ URL('kit/captcha') }}";
                            $url = $url + "/" + Math.random();
                            document.getElementById('captcha').src = $url;
                        }
                    </script>
                </div>
                <button id="login-box" ng-disabled="isProcessing" ng-bind="isProcessing ? '登录...' : '登录'" class="login-btn ng-binding ng-binding  modal-login_submit ajax-submit-btn">登录</button>

                <button id="reg-box" class="login-btn" type="button" ng-click=""onclick="javascript:window.location.href = '{{ route('web.register_one') }}';">免费开户</button>
                <span class="trial-btn"ng-click=""onclick="return layer.alert('您好！请联系客服索取试玩帐号!',{icon:7});">免费试玩</span>
                <span class="forget-btn" ng-click=""onclick="return layer.alert('您好！忘记密码请联系客服!',{icon:7});">忘记?</span>

                <div id="agree" ng-show="loginOver" ng-cloak>
                    点击登入表示同意<a ng-click="agreement()">用户协议</a>
                </div>
            </form>
        </div>
    </div>
@else

    <div id="account-box" class="home is-login" scrolltop-fixed="46" ng-controller="AccountCtrl" ng-init="$root.user.isLogin=true">
        <div class="wrapper">
            <ul id="account-info">
                <li class="info-account">
                    帐号 :
                    <span class="account" title="{{ $_member->name }}">{{ $_member->name }}</span>
                    {{--<a id="mailbox" ng-controller="SiteMailCountCtrl" href="/member/FYcenter/12#12" title="站内信">
                        <span ng-hide="!(MailIsReadCount.Count > 0)" ng-cloak></span>
                    </a>--}}
                </li>
                <li class="info-balance">
                    账户余额 :
                    <span class="money" title="$ {{ $_member->money }}">{{ $_member->money }}</span>

                    <div id="callBackAllWallet" ng-click="callBackAllWallet()"></div>
                </li>
            </ul>

            <div id="account-nav">
                <ul>
                    @if($_system_config ->is_new_center == 1)
                        <li class="deposit" title="个人中心">
                            <a href="{{ route('member.userCenter') }}">
                                个人中心
                            </a>
                        </li>
                        @else

                    <li class="deposit" title="个人中心">
                        <a href="{{ route('member.userCenter') }}">
                            个人中心
                        </a>
                    </li>
                    <li class="withdraw" title="线上存款">
                        <a href="{{ route('member.finance_center') }}">
                            线上存款
                        </a>
                    </li>
                    <li class="transaction" title="线上取款">
                        <a href="{{ route('member.member_drawing') }}">
                            线上取款
                        </a>
                    </li>
                    <li class="bet-record" title="账户记录">
                        <a href="{{ route('member.customer_report') }}">
                            账户记录
                        </a>
                    </li>
                    {{--<li class="change-pw" title="修改密码">
                        <a href="/member/FYcenter/2#5">
                            修改密码
                        </a>
                    </li>
                    <li class="change-money" title="修改取款密码">
                        <a href="/member/FYcenter/6#6">
                            修改取款密码
                        </a>
                    </li>--}}
                        @endif
                </ul>
            </div>
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
@endif
