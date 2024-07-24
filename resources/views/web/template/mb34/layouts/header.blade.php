<body class="layout" ng-controller="LayoutCtrl" ng-init="$root.userInfo.isLogin=false;$root.userInfo.isTrial=false">
<header id="header" scrolltop-fixed>
    <div class="wrapper">

        <div id="div-meiDonNow">
            美东时间 -
            <span id="localtime"></span>
        </div>
        <ul class="top-nav" ng-controller="LobbiesCtrl">
            {{--<li class="yellowgreen"><a ng-href="@{{ContactInfo.HttpDeposit2==''? '#': ContactInfo.HttpDeposit2}}" target="_blank">快速充值</a></li>--}}
            <li class="purple"><a href="{{ route('web.poker') }}">棋牌PK</a></li>
            <li class="yellow"><a href="javascript:void(0)" ng-click="toMgFlash()">MG電子</a></li>
            <li class="red"><a href="{{ route('web.activityList') }}">活动申请大厅</a></li>
            {{--<li class="green"><a ng-href="@{{ContactInfo.HttpAPP==''? '#': ContactInfo.HttpAPP}}" target="_blank">手机APP下载</a></li>--}}
            <li class="cyan"><a href="{{ route('daili.init') }}" target="_blank">代理登陆</a></li>
            {{--<li><a ng-href="@{{ContactInfo.HttpDetection==''? '#': ContactInfo.HttpDetection}}" target="_blank">备用网址</a></li>--}}

            {{--<li id="language" select-language>
                <span ng-repeat="item in language" data-language="@{{item.Key}}" title="@{{item.Value}}" ng-cloak></span>
            </li>--}}
        </ul>

        <div id="logo-bg">
            <!--[if !IE | gte IE 9]><!-->
{{--            <iframe src="http://cdn.567.sh/Web.Portal/RX001-01.Portal/Content/Views/Shared/images/logo/logo.html"></iframe>--}}
            <!--<iframe src="https://cdn.567.sh/Web.Portal/AR016-01.Portal/Content/Views/Shared/images/Logo/logo.html"></iframe>-->
            <!--<![endif]-->
            <a href="{{ route('web.index') }}" style="top: 30px;">
                <img src="{{ $_system_config -> site_logo }}">
            </a>
        </div>

        <nav id="nav">
            <ul ng-controller="LobbiesCtrl" add-li-title title-subnav>
                <li class="yellow" toggle-color>
                    <a @if($web_route=='web.index') class="active" @endif  href="{{ route('web.index') }}">官网首页<span>HOME</span></a>
                </li>
                <li class="hot">
                    <a nav-active @if($web_route=='web.poker') class="active" @endif href="{{ route('web.poker') }}">棋牌游戏<span>CHESS GAME</span></a>
                    <div class="subnav board"
                         carousel-slider
                         super-vis="8"
                         super-play="true"
                         super-effect="leftLoop">
                        <span class="slide-ctrl prev"></span>
                        <div class="discount bonus-15"></div>
                        <div class="main-cell">
                            <?php
                            $poker = (new \App\Http\Controllers\Wap\AjaxController())->getGames('poker');
                            ?>
                            <ol>
                                @foreach($poker as $v)
                                <li game-box="{{ $v['plat_type'] }}" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                                @endforeach
                                {{--<li game-box="gg" ng-click="toGpkBoard()">GG棋牌</li>
                                <li game-box="ap" ng-click="toCity761Html()">AP爱棋牌</li>
                                <li game-box="fg" ng-click="toFsBoard()">FG乐游棋牌</li>
                                <li game-box="nw" ng-click="toNwBoard()">NW新世界棋牌</li>
                                <li game-box="js" ng-click="toJsBoard()">JS金龙棋牌</li>
                                <li game-box="jdb" ng-click="toJdbBoard()">JDB夺宝棋牌</li>
                                <li game-box="th" ng-click="toThBoard()">TH天豪棋牌</li>
                                <li game-box="mt" ng-click="toMtBoard()">MT美天棋牌</li>
                                <li game-box="ds" ng-click="toDhBoard()">DS棋牌</li>
                                <li game-box="mw" ng-click="toMwBoard()">MW棋牌</li>
                                <li game-box="vg" ng-click="toNewvgBoard()">VG财神棋牌</li>
                                <li game-box="leg" ng-click="toLegBoard()">LEG乐棋牌</li>
                                <li game-box="swqp" ng-click="toGmgBoard()">SW双赢棋牌</li>
                                <li game-box="hgqp" ng-click="toDtBoard()">欢乐棋牌</li>
                                <li game-box="imqp" ng-click="toImBoard()">IM棋牌</li>--}}
                            </ol>
                        </div>
                        <span class="slide-ctrl next"></span>
                    </div>
                </li>
                <li class="hot">
                    <a @if($web_route=='web.liveCasino') class="active" @endif nav-active href="{{ route('web.liveCasino') }}">真人視訊<span>LIVE CASINO</span></a>
                    <div class="subnav live"
                         carousel-slider
                         super-vis="8"
                         super-play="true"
                         super-effect="leftLoop">
                        <span class="slide-ctrl prev"></span>
                        <div class="discount bonus-12"></div>
                        <div class="main-cell">
                            <?php
                            $live = (new \App\Http\Controllers\Wap\AjaxController())->getGames('live');
                            ?>
                            <ol>
                                @foreach($live as $v)
                                <li game-box="{{ $v['plat_type'] }}" @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>{{ $v['name'] }}</li>
                                @endforeach
                                {{--<li game-box="bb" ng-click="toBbLive()">BBIN旗舰厅</li>
                                @if(in_array('ag', $_api_list))<li game-box="ag" ng-click="toAgLive()">AG寰亚厅</li>@endif
                                @if(in_array('ags', $_api_list))<li game-box="ag" ng-click="toAgsLive()">AG寰亚厅</li>@endif
                                <li game-box="dg" ng-click="toMgDealer()">DG国际厅</li>
                                <li game-box="wm" ng-click="toPtLive()">WM視訊厅</li>
                                <li game-box="ab" ng-click="toAbLive()">AB欧博厅</li>
                                <li game-box="se" ng-click="toEvoLive()">MX性感厅</li>
                                <li game-box="gd" ng-click="toGdLive()">GD奢华厅</li>
                                @if(in_array('sunbet', $_api_list))<li game-box="sb" ng-click="toSunbetLive()">SB申博厅</li>@endif
                                @if(in_array('sunbets', $_api_list))<li game-box="sb" ng-click="toSunbetsLive()">SB申博厅</li>@endif
                                <li game-box="og" ng-click="toOgLive()">OG极速厅</li>
                                <li game-box="ebet" ng-click="toEbetLive()">EBET易博厅</li>
                                <li game-box="sa" ng-click="toSaLive()">SA沙龙厅</li>
                                <li game-box="vgzr" ng-click="toIbo2Live()">甜心主播</li>
                                <li game-box="n2" ng-click="toGpkLive()">N2真人厅</li>
                                <li game-box="dszr" ng-click="toSeLive()">DS吉祥厅</li>
                                <li game-box="igzr" ng-click="toSeLive()">IG真人厅</li>--}}
                            </ol>
                        </div>
                        <span class="slide-ctrl next"></span>
                    </div>
                </li>
                <li class="hot" toggle-color>
                    <a @if($web_route=='web.eGame') class="active" @endif nav-active href="{{ route('web.eGame') }}">電子游戏<span>ELEC GAME</span></a>
                    <div class="subnav game"
                         carousel-slider
                         super-vis="8"
                         super-play="true"
                         super-effect="leftLoop">
                        <span class="slide-ctrl prev"></span>
                        <div class="discount  bonus-30"></div>
                        <div class="main-cell">
                            <?php
                            $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                            ?>
                            <ol>
                                @foreach($slot as $v)
                                <li game-box="{{$v['plat_type']}}" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                                @endforeach
                                {{--<li game-box="sg" ng-click="toSgFlash()">SG新霸電子</li>
                                <li game-box="fish" ng-click="toFish()">捕魚达人</li>
                                <li game-box="cq9" ng-click="toCq9Html()">CQ9传奇電子</li>
                                <li game-box="mg" ng-click="toMgFlash()">mg電子</li>
                                <li game-box="ag" ng-click="toAgHtml()">AG電子</li>
                                <li game-box="pt" ng-click="toPtFlash()">PT電子</li>
                                <li game-box="pp" ng-click="toPrgFlash()">PP王者電子</li>
                                <li game-box="mw" ng-click="toMwHtml()">MW電子</li>
                                <li game-box="hb" ng-click="toHabaHtml()">HB電子</li>
                                <li game-box="jdb" ng-click="toJdbHtml()">JDB夺宝電子</li>
                                <li game-box="bs" ng-click="toNetentHtml()">BS電子</li>
                                <li game-box="rt" ng-click="toRedTigerHtml()">RT電子</li>
                                <li game-box="png" ng-click="toPngHtml()">PNG電子</li>
                                <li game-box="sw" ng-click="toPtsHtml()">SW天风電子</li>
                                <li game-box="fg" ng-click="toFsHtml()">FG乐游電子</li>
                                <li game-box="vt" ng-click="toGpk2Html()">VT路虎電子</li>
                                <li game-box="ka" ng-click="toKaHtml()">KA开发電子</li>
                                <li game-box="bb" ng-click="toBbGame()">BBIN電子</li>
                                <li game-box="pg" ng-click="toPgHtml()">PG電子</li>
                                <li game-box="pg" ng-click="toJtnHtml()">PGS電子</li>
                                <li game-box="qt" ng-click="toQtHtml()">QT電子</li>
                                <li game-box="gns" ng-click="toGnsHtml()">BNG電子</li>--}}
                            </ol>
                        </div>
                        <span class="slide-ctrl next"></span>
                    </div>
                </li>
                <li>
                    <a @if($web_route=='web.catchFish') class="active" @endif href="{{ route('web.catchFish') }}" >捕魚达人<span>FISHING</span></a>
                    <div class="subnav fish"
                         carousel-slider
                         super-vis="8"
                         super-play="true"
                         super-effect="leftLoop">
                        <span class="slide-ctrl prev"></span>
                        <div class="discount  bonus-10"></div>
                        <div class="main-cell">
                            <?php
                            $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                            ?>
                            <ol>
                                @foreach($fish as $v)
                                <li game-box="{{ $v['plat_type'] }}" @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>{{$v['name']}}</li>
                                @endforeach

                                lebo gpi isb pgs sw dt gti ga gns pg png gj avia eg fh tcg
                                {{--<li game-box="gpk-monopoly" ng-click="toKaFish()">KA捕魚</li>
                                <li game-box="gpk-monopoly" ng-click="toKaFish()">KA捕魚</li>
                                <li game-box="gpk-cut" ng-click="toPtsFish()">PTS捕魚多福</li>
                                <li game-box="gpk-tycoon" ng-click="toPts2Fish()">PTS福气水果</li>
                                <li game-box="gpk-king" ng-click="toDsFish()">DS吃我一炮</li>
                                <li game-box="fg-thunder" ng-click="toDs2Fish()">DS千炮捕魚</li>
                                <li game-box="jdb-money" ng-click="toJdbFishMoney()">JDB财神捕魚</li>
                                <li game-box="jdb-dragon" ng-click="toJdbFish()">JDB龙王捕魚</li>
                                <li game-box="jdb-dragon2" ng-click="toJdbFish2()">JDB龙王捕魚2</li>
                                <li game-box="js-fish" ng-click="toJdbFishMoney2()">JDB五龙捕魚</li>
                                <li game-box="ap-fish" ng-click="toPtFish()">PT深海大赢家</li>
                                <li game-box="bb-master" ng-click="toBbFish2()">BBIN捕魚大师</li>
                                <li game-box="ap-jinchan" ng-click="toBbFish()">BBIN捕魚達人</li>
                                <li game-box="fg-beauty" ng-click="toFG2Fish()">乐游美人捕魚</li>
                                <li game-box="fg-bird" ng-click="toFG5Fish()">乐游捕鸟达人</li>
                                <li game-box="fg-happy" ng-click="toFGFish()">乐游欢乐捕魚</li>
                                <li game-box="th-lee" ng-click="toFG6Fish()">乐游雷霆战警</li>
                                <li game-box="th-dasheng" ng-click="toFG3Fish()">FG捕魚嘉年华</li>
                                <li game-box="fg-everyday" ng-click="toFG4Fish()">乐游天天捕魚</li>
                                <li game-box="bb-expert" ng-click="toBbFish()">BBIN捕魚达人</li>
                                <li game-box="ag-fish" ng-click="toAgFish()">AG捕魚王</li>
                                <li game-box="mw-fish" ng-click="toMwFish()">MW千炮捕魚</li>
                                <li game-box="th-toad" ng-click="toSaFish()">SA鱼乐无穷</li>
                                <li game-box="gpk-chainLong" ng-click="toCq9FishGo()">CQ9皇金渔场2</li>
                                <li game-box="cq9-fish" ng-click="toCq9Fish()">CQ9皇金渔场</li>
                                <li game-box="th-dasheng" ng-click="toPgFish2()">PG全民捕魚</li>
                                <li game-box="th-lee" ng-click="toPgFish()">PG鱼王争霸</li>
                                <li game-box="th-lee" ng-click="toPgFish3()">PG全民捕魚彩金</li>
                                <li game-box="th-monkey" ng-click="toMtFish2()">MT金蟾捕魚</li>
                                <li game-box="th-monkey2" ng-click="toMtFish()">MT李逵劈鱼</li>--}}
                            </ol>
                        </div>
                        <span class="slide-ctrl next"></span>
                    </div>
                </li>
                {{--<li>
                    <a href="javascript:void(0)" ng-click="toImSport()">ESB电竞<span>ESB GAME</span></a>
                </li>--}}
                <li>
                    <a @if($web_route=='web.esports') class="active" @endif nav-active href="{{ route('web.esports')  }}">體育投注<span>SPORTS</span></a>
                    <div class="subnav">
                        <div class="discount bonus-10"></div>
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                        <ol>
                            @foreach($sports as $v)
                            <li game-box="{{ $v['plat_type'] }}" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif>{{ $v['name'] }}</li>
                            @endforeach
                            {{--<li game-box="3sing" ng-click="toSingSport()">三昇體育</li>
                            <li game-box="bb" ng-click="toBbSport()">BBIN體育</li>
                            <li game-box="saba" ng-click="toSabaGame()">沙巴體育</li>
                            <li game-box="ug" ng-click="toCmdSport()">UG體育</li>
                            <li game-box="esb" ng-click="toImSport()">ESB电竞</li>
                            <li game-box="im" ng-click="toImsSport()">IM體育</li>
                            <li game-box="cr" ng-click="toIboSport()">皇冠體育</li>
                            <li game-box="sabae" ng-click="toSabaESport()">SABA电竞</li>
                            <li game-box="dte" ng-click="toDtESport()">DT泛亚电竞</li>
                            <li game-box="ag" ng-click="toAgSport()">AG體育</li>--}}
                        </ol>
                    </div>
                </li>
                <li>
                    <a @if($web_route=='web.lottery') class="active" @endif nav-active href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
                    <div class="subnav lottery"
                         carousel-slider
                         super-vis="7"
                         super-play="true"
                         super-effect="leftLoop">
                        <span class="slide-ctrl prev"></span>
                        <div class="discount bonus-10"></div>
                        <div class="main-cell">
                            <?php
                            $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                            ?>
                            <ol>
                                @foreach($lottery as $v)
                                <li game-box="{{ $v['plat_type'] }}" @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>{{ $v['name'] }}</li>
                                @endforeach
                                {{--<li game-box="bb" ng-click="toBbLottery()">BBIN彩票</li>
                                <li game-box="ig" ng-click="toIgLottery()">IG彩票</li>
                                <li game-box="ig6" ng-click="toIgMarkSix()">IG六合彩</li>
                                <li game-box="sc" ng-click="toLxLottery()">SC彩票</li>
                                <li game-box="vr" ng-click="toVrLottery()">VR竞速彩票</li>
                                <li game-box="rg" ng-click="toCatLottery()">本站彩票</li>
                                <li game-box="cat" ng-click="toCatLottery()">CAT幸运彩票</li>
                                <li game-box="eg" ng-click="toRgLottery()">EG快乐彩</li>
                                <li game-box="ll" ng-click="toWgLottery()">乐利彩票</li>--}}
                            </ol>
                        </div>
                        <span class="slide-ctrl next"></span>
                    </div>
                </li>
                <li class="hot red" toggle-color>
                    <a @if($web_route=='web.activityList') class="active" @endif href="{{ route('web.activityList') }}">优惠活动<span>PROMOTIONS</span></a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div id="account-bot" class="home" scrolltop-fixed>
    <div class="wrapper">
        @if (Auth::guard('member')->guest())
            <div id="account-box">
                <form ng-controller="LoginCtrl" method="post" id="login_form" action="{{ route('member.login.post') }}" onkeydown="if(event.keyCode==13)return false;"ng-submit="login(loginParams)" ng-disabled="isProcessing">
                    <div class="input-group">
                        <span class="input-icon account"></span>
                        <input name="name" id="login_account" type="text" placeholder="帐号" ng-model="loginParams.account" required autofocus />
                    </div>
                    <div class="input-group">
                        <span class="input-icon password"></span>
                        <input name="password" id="login_password" type="password" placeholder="密码" ng-model="loginParams.password" required />
{{--                        <span class="forget-btn" ng-click="lineChatClick()">忘记密码</span>--}}
                    </div>
                    <div id="check-code-wrapper" class="input-group">
                        <span class="input-icon check"></span>
                        <input name="captcha" data-checkcode-retriever="checkCode" onclick="getKey();" name="captcha" checkcode-type="Login" type="text" placeholder="验证码" autocomplete="off" ng-model="loginParams.checkCode" required="" class="ng-pristine ng-invalid ng-invalid-required">
                        <img src="{{ URL('kit/captcha/1') }}" id="captcha"  style="background-color: burlywood;top: 3px;"onclick="getKey()"/>
                    </div>
                    <button id="login-box" type="button" class="login-btn ajax-submit-btn" ng-disabled="isProcessing" ng-bind="isProcessing ? '立即登入...' : '立即登入'">立即登入</button>
                    <button class="register-btn" onclick="window.location.href='{{ route('web.register_one') }}'" type="button">注册</button>
                    <!--<button class="freeplay-btn" trial-click type="button">免费试玩</button>-->
                    <button class="linechat-btn" onclick="window.location.href='{{$_system_config -> service_link}}'" type="button"></button>
                    {{--<div id="agree" ng-show="loginOver" ng-cloak>
                        点击登入表示同意<a ng-click="agreement()">用户协议</a>
                    </div>--}}
                </form>
            </div>
    </div>
</div>
@else


    <div id="account-box" @if($web_route=='member.userCenter') style="display: none" @endif class="login" ng-controller="AccountCtrl" ng-init="$root.user.isLogin=true">
        <ul id="account-info">
            <li>
                帐号 :
                <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>
                {{--<a id="mailbox" ng-controller="SiteMailCountCtrl" href="/front/person_center/person_center/news_center" title="{{ trans('welcome.mailbox') }}">
                    <span ng-hide="!(MailIsReadCount.Count > 0)" ng-cloak>@{{MailIsReadCount.Count}}</span>
                </a>--}}
            </li>
            <li>
                账户余额：$
                <span class="account ng-binding money1"  title="账户余额">{{ $_member -> money }}</span>&nbsp;&nbsp;

            </li>
            {{--<li>
                游戏余额：$
                <span class="account" ng-init="$root.wallets.my=0.00" ng-bind="$root.wallets.my | currency" title="游戏余额"id="gamemoney">0.00</span>
            </li>--}}
        </ul>

        <ul id="account-nav">
            {{--<li title="投注记录">
                <a href="/front/person_center/person_center/money_bet_history" target="_blank">
                    投注记录
                </a>
            </li>
            <li class="push-right" title="线上取款">
                <a href="/front/person_center/person_center/line_remove" target="_blank">
                    线上取款
                </a>
            </li>
            <li class="no-border" title="线上存款">
                <a href="/front/person_center/person_center/line_recharge" target="_blank">
                    线上存款
                </a>
            </li>
            <li class="push-right" title="交易记录">
                <a href="/front/person_center/person_center/money_remove_history" target="_blank">
                    交易记录
                </a>
            </li>--}}
            @if($_system_config ->is_new_center == 1)
                <li class="no-border" title="个人中心">
                    <a href="{{ route('member.userCenter') }}">
                        个人中心
                    </a>
                </li>
            @else
                <li class="no-border" title="个人中心">
                    <a href="{{ route('member.userCenter') }}">
                        个人中心
                    </a>
                </li>
                <li class="push-right" title="线上存款">
                    <a href="{{ route('member.finance_center') }}">
                        线上存款
                    </a>
                </li>
                <li class="no-border"  title="线上取款">
                    <a href="{{ route('member.member_drawing') }}">
                        线上取款
                    </a>
                </li>
                <li class="push-right" title="账户记录">
                    <a href="{{ route('member.customer_report') }}">
                        账户记录
                    </a>
                </li>
            @endif
        </ul>
        <div id="action-box">
            <a class="signout" href="{{ route('member.logout') }}" ng-bind="isProcessing ? '处理中...' : '退出'"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
            <a class="linechat-btn" href="{{ $_system_config -> service_link }}" target="_blank"></a>
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
