<body class="layout" ng-controller="LayoutCtrl">
<header id="header">
    <div class="wrapper">
        {{--<ul class="top-nav top-nav-left">
            <!--<li class="domain"></li>-->
            <li class="language" select-language="">
                <a class="abox" href="/zh-cn"><img src="img02.png"></a>
                <a class="abox" href="/zh-tw"><img src="img01.png"></a>
                <a class="abox" href="/en"><img src="img03.png"></a>
            </li>
        </ul>--}}
        <ul class="top-nav top-nav-right" ng-controller="LobbiesCtrl">
            <li class="slot" toggle-color><a href="{{ route('web.eGame') }}" >電子游戏</a></li>
            <li class="promotion" toggle-color><a href="{{ route('web.activityList') }}">优惠活动</a></li>
            {{--<li class="agent" toggle-color><a href="/front/cheap_activity/cheap_activity/red_index">{{
            trans('welcome.Red') }}</a></li>--}}
            <li class="agent" toggle-color><a target="_blank" href="{{ route('daili.init') }}">代理登陆</a></li>
            {{--<li class="detection" toggle-color><a ng-href="@{{ContactInfo.HttpDetection2 == '' ? '#' : ContactInfo.HttpDetection2}}" target="_blank">{{ trans('welcome.AlternateURL') }}</a></li>
            <li class="freeplay" toggle-color><a ng-href="@{{ContactInfo.HttpDetection == '' ? '#' : ContactInfo.HttpDetection}}" target="_blank">{{ trans('welcome.MACAOVENETIAN') }}-<span ng-bind="ContactInfo.Detection"></span></a></li>--}}
        </ul>
        <div class="slogan"></div>
        <nav id="nav">
            <ul ng-controller="LobbiesCtrl">
                <li>
                    <a href="{{ route('web.index') }}" nav-active>首页</a>
                </li>
                <li class="hot" slide-nav toggle-hot>
                    <a href="{{ route('web.eGame') }}" nav-active>電子游艺</a>
                    <div class="subnav col2">
                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        $a=[];
                        foreach ($slot as $v){
                            $a[] = $v;
                        }

                        $a1 = array_slice($a,0,15);
                        $a2 = array_slice($a,15);
                        ?>
                        <ol>
                            @foreach($a1 as $v)
                                <li style="text-align: center" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                            @endforeach

                        </ol>
                        <ol>
                            @foreach($a2 as $v)
                                <li style="text-align: center" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                            @endforeach

                        </ol>
                    </div>
                </li>
                <li slide-nav>
                    <a href="{{ route('web.liveCasino') }}" nav-active>視訊直播</a>
                    <?php
                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                    ?>
                    <ol class="subnav">
                        @foreach($live as $v)
                            <li style="text-align: center" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif >{{ $v['name'] }}</li>
                        @endforeach
                        {{--<li class="hot" game-box="bb" ng-click="toBbLive()">BBIN {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="ag" ng-click="toAgLive()">AG {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="ag" ng-click="toAgsLive()">AG {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="sb" ng-click="toSunbetsLive()">申博  {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="sb" ng-click="toSunbetLive()">申博  {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="ebet" ng-click="toEbetLive()">Ebet  {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="ab" ng-click="toAbLive()">AB {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="og" ng-click="toOgLive()">OG {{ trans('welcome.Live') }}</li>
                        <li class="hot" game-box="gd" ng-click="toGdLive()">GD {{ trans('welcome.Live') }}</li>
                        <li game-box="bg" ng-click="toBgLive()">BG {{ trans('welcome.Live') }}</li>
                        <li game-box="sa" ng-click="toSaLive()">Sa {{ trans('welcome.Live') }}</li>
                        <li game-box="dg" ng-click="toDgLive()">DG {{ trans('welcome.Live') }}</li>
                        <li game-box="mx" ng-click="toMxLive()">MX {{ trans('welcome.Live') }}</li>
                        <li game-box="vg" ng-click="toVgLive()">VG {{ trans('welcome.Live') }}</li>
                        <li game-box="wm" ng-click="toWmLive()">WM {{ trans('welcome.Live') }}</li>
                        <li game-box="n2" ng-click="toN2Live()">N2 {{ trans('welcome.Live') }}</li>--}}
                    </ol>
                </li>
                <li slide-nav>
                    <a href="{{ route('web.esports') }}" nav-active>體育赛事</a>
                    <?php
                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                    ?>
                    <ol class="subnav">
                        @foreach($sports as $v)
                            <li style="text-align: center" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif >{{ $v['name'] }}</li>
                        @endforeach
                        {{--<li class="hot" game-box="gj" ng-click="toGjSport()">GJ {{ trans('welcome.Sports') }}</li>
                        <li class="hot" game-box="bb" ng-click="toBbSport()">BBIN {{ trans('welcome.Sports') }}</li>
                        <li class="hot" game-box="3sing" ng-click="toSingSport()">Sing {{ trans('welcome.Sports') }}</li>
                        <li class="hot" game-box="saba" ng-click="toSabaGame()">Ibc {{ trans('welcome.Sports') }}</li>
                        <li game-box="cmd" ng-click="toCmdSport()">UG {{ trans('welcome.Sports') }}</li>
                        <li game-box="im" ng-click="toImsSport()">IM {{ trans('welcome.Sports') }}</li>
                        <li game-box="esb" ng-click="toImSport()">ESB {{ trans('welcome.Gaming') }}</li>
                        <li game-box="ag" ng-click="toAgSport()">AG {{ trans('welcome.Sports') }}</li>--}}

                    </ol>
                </li>
                <li class="pull-right" slide-nav>
{{--                    <a href="javascript:void(0)" ng-click="lineChatClick(ContactInfo.Live800LinkComputer)">{{ trans('welcome.SERVICE') }}</a>--}}
                    <a href="{{ route('web.catchFish') }}">捕魚游戏</a>
                    <div class="subnav col2">
                        <?php
                        $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                        $a=[];
                        foreach ($fish as $v){
                            $a[] = $v;
                        }

                        $a1 = array_slice($a,0,11);
                        $a2 = array_slice($a,11);
                        ?>
                        <ol>
                            @foreach($a1 as $v)
                                <li style="text-align: center" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>{{ $v['name'] }}</li>
                            @endforeach

                        </ol>
                        <ol>
                            @foreach($a2 as $v)
                                <li style="text-align: center" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif >{{ $v['name'] }}</li>
                            @endforeach

                        </ol>
                    </div>
                </li>
                <li class="pull-right hot" slide-nav>
                    <a href="{{ route('web.poker') }}">棋牌游戏</a>
                    <?php
                    $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                    ?>
                    <ol class="subnav">
                        @foreach($poker as $v)

                            {{--                        <li class="text-red" data-hot="yellow" game-box="kg" ng-click="toKgHtml()">开元棋牌</li>--}}
                            <li onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                        @endforeach
                        {{--<li class="hot" game-box="kg" ng-click="toKgHtml()">KG {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="nw" ng-click="toNwBoard()">Nw {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="sw" ng-click="toFsBoard()">Sw {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="th" ng-click="toThBoard()">Th {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="js" ng-click="toJsBoard()">Js {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="ap" ng-click="toCity761Html()">Ap {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="vg" ng-click="toNewvgBoard()">Newvg {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="mt" ng-click="toMtBoard()">Mt {{ trans('welcome.Board') }}</li>
                        <li class="hot" game-box="leg" ng-click="toLegHtml()">Leg {{ trans('welcome.Board') }}</li>--}}
                    </ol>
                </li>
                <li class="promotion hot pull-right" toggle-hot>
                    <a href="{{ route('web.activityList') }}" nav-active>优惠活动</a>
                </li>
                <li class="pull-right" slide-nav>
                    <a href="{{ route('web.lottory') }}" nav-active>彩票游戏</a>
                    <?php
                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                    ?>
                    <ol class="subnav">
                        @foreach($lottery as $v)
                            <li style="text-align: center" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif >{{ $v['name'] }}</li>
                    @endforeach
                       {{-- @if(in_array('cat', $opens))<li game-box="cat" ng-click="toCatLottery()">CAT {{ trans('welcome.Lottery') }}</li>@endif--}}
                        {{--<li game-box="bb" ng-click="toBbLottery()">BBIN {{ trans('welcome.Lottery') }}</li>
                        <li game-box="ig" ng-click="toIgLottery()">IG {{ trans('welcome.Lottery') }}</li>
                        <li game-box="lx" ng-click="toLxLottery()">SC {{ trans('welcome.Lottery') }}</li>
                        <li game-box="vr" ng-click="toVrLottery()">VR {{ trans('welcome.Lottery') }}</li>
                        <li game-box="rg" ng-click="toRgLottery()">EG {{ trans('welcome.Lottery') }}</li>--}}
                    <!--<li game-box="wg" ng-click="toWgLottery()">WG {{ trans('welcome.Lottery') }}</li>-->
                    </ol>
                </li>
            </ul>
        </nav>

        <div id="logo-bg" style="top: 70px;margin-left: -121px;">
            <!--[if !IE | gte IE 9]><!-->
            <!--<![endif]-->
            <a href="{{ route('web.index') }}">
                {{--<iframe src="http://cdn.567.sh/Web.Portal/RX001-01.Portal/Content/Views/Shared/images/logo/logo.html"></iframe>--}}
                <img src="{{ $_system_config -> site_logo }}">
            </a>
        </div>
    </div>
</header>


