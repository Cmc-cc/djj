<body class="layout" ng-controller="LayoutCtrl" style="margin: 0px ;padding: 0px;">
<style>
    .top-link li {
        cursor: pointer;
    }
</style>
<header id="header">
    <div class="top-nav">
        <div class="wrapper">
            <div class="top-nav-left pull-left" ng-controller="LobbiesCtrl">
                {{--<span class="sel-lang">选择语系：</span>
                <ul class="language" select-language>
                    <li ng-repeat="item in language" data-language="@{{item.Key}}" title="@{{item.Value}}" ng-cloak></li>
                </ul>--}}
                <ul class="top-link">
                    <li class="toggle-red" toggle-color onclick="window.open('{{ route('daili.init') }}','_blank')"><span>代理登陆</span></li>
                    {{--<li class="toggle-yellow" toggle-color><a ng-href="@{{ContactInfo.HttpDetection == '' ? '#' : ContactInfo.HttpDetection}}" target="_blank">线路检测</a></li>
                    <li class="toggle-cyan" toggle-color><a ng-href="@{{ContactInfo.HttpVIP == '' ? '#' : ContactInfo.HttpVIP}}" target="_blank">尊享VIP</a></li>--}}
                    <li class="toggle-green" toggle-color><a href="{{ route('web.activityList') }}" target="_blank">活动大厅</a></li>
                    {{--<li><a ng-href="@{{ContactInfo.HttpAPP == '' ? '#' : ContactInfo.HttpAPP}}" target="_blank">APP资讯端</a></li>--}}
                    <li class="license">牌照展示</li>
                </ul>
            </div>
            <div class="top-nav-right pull-right">
                @if (Auth::guard('member')->guest())
                    <div id="account-box">
                        <form ng-controller="LoginCtrl" method="post" id="login_form" action="{{ route('member.login.post') }}" onkeydown="if(event.keyCode==13)return false;" ng-submit="login(loginParams)" ng-disabled="isProcessing" class="ng-scope ng-pristine ng-invalid ng-invalid-required">
                            <input name="name" id="login_account" type="text" placeholder="帐号" ng-model="loginParams.account" required="" autofocus="" class="ng-pristine ng-invalid ng-invalid-required">
                            <input name="password" id="login_password" type="password" placeholder="密码" ng-model="loginParams.password" required="" class="ng-pristine ng-invalid ng-invalid-required">

                            <div id="check-code-wrapper">
                                <input data-checkcode-retriever="checkCode" onclick="getKey();" name="captcha" checkcode-type="Login" type="text" placeholder="验证码" autocomplete="off" ng-model="loginParams.checkCode" required="" class="ng-pristine ng-invalid ng-invalid-required">
                                <img id="captcha"  style="background-color: burlywood;top: 17px;"onclick="getKey()"/>
                            </div>
                            <button id="login-box" type="button" class="login-btn ajax-submit-btn" ng-disabled="isProcessing" ng-bind="isProcessing ? '登入...' : '登入'">登入</button>
                            {{--<div id="agree" ng-show="loginOver" class="ng-hide">
                                点击登入表示同意<a ng-click="agreement()">用户协议</a>
                            </div>--}}
                            <span class="forget-btn" ng-click="lineChatClick()">忘记密码</span>
                            <span class="separation"> | </span>
                            <a href="{{ route('web.register_one') }}" class="btn-join">加入会员</a>
                        </form>

                    </div>

            </div>
        </div>
    </div>

    <div class="top-nav-right pull-right">
        @else
            <div id="account-box" class="login" ng-controller="AccountCtrl" ng-init="$root.user.isLogin=true">
                <ul id="account-info">
                    <li>
                        帐号 :
                        <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>
                        {{--<a id="mailbox" ng-controller="SiteMailCountCtrl" href="/front/person_center/person_center/news_center" title="{{ trans('welcome.mailbox') }}">
                            <span ng-hide="!(MailIsReadCount.Count > 0)" ng-cloak>@{{MailIsReadCount.Count}}</span>
                        </a>--}}
                    </li>
                    <li style="margin-left: 5px;">
                        账户余额：$
                        <span class="account ng-binding money1"  title="账户余额">{{ $_member -> money }}</span>&nbsp;&nbsp;

                    </li>
                    {{--<li>
                        游戏余额：$
                        <span class="account" ng-init="$root.wallets.my=0.00" ng-bind="$root.wallets.my | currency" title="游戏余额"id="gamemoney">0.00</span>
                    </li>--}}
                </ul>

                <div id="account-nav">
                    <ul>
                        @if($_system_config ->is_new_center == 1)
                            <li title="个人中心">
                                <a href="{{ route('member.userCenter') }}">
                                    个人中心
                                </a>
                            </li>
                        @else
                            <li title="个人中心">
                                <a href="{{ route('member.userCenter') }}">
                                    个人中心
                                </a>
                            </li>
                            <li title="线上存款">
                                <a href="{{ route('member.finance_center') }}">
                                    线上存款
                                </a>
                            </li>
                            <li title="线上取款">
                                <a href="{{ route('member.member_drawing') }}">
                                    线上取款
                                </a>
                            </li>
                            <li title="账户记录">
                                <a href="{{ route('member.customer_report') }}">
                                    账户记录
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <a class="logout" href="{{ route('member.logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="signout-btn">登出</a>
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
</header>


<nav id="nav">
    <div class="wrapper">

        <div id="logo-bg">
            <!--[if !IE | gte IE 9]><!-->
{{--            <iframe src="https://cdn.567.sh/Web.Portal/AF011-01.Portal/Content/Views/Shared/images/logo/logo.html"></iframe>--}}
            <!--<![endif]-->
            <a href="{{ route('web.index') }}">
            <img src="{{ $_system_config->site_logo}}">
            </a>
        </div>
        <ul ng-controller="LobbiesCtrl">
            <li>
                <a href="{{ route('web.index') }}" nav-active>
                    <b>首页</b>
                    <small>HOME</small>
                </a>
            </li>
            <li data-hot="pink">
                <a href="{{ route('web.eGame') }}" nav-active>
                    <b>電子游艺</b>
                    <small>SLOT</small>
                </a>
                <div class="subnav twocol">
                    <ol>
                        <?php
                            $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                            $a=[];
                            foreach ($slot as $v){
                                $a[] = $v;
                            }

                            $a1 = array_slice($a,0,15);
                            $a2 = array_slice($a,15);
                        ?>
                        @foreach($a1 as $v)
                        <li style="text-align: center" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type=2','','width=1024,height=768')">{{ $v['name'] }}</li>
                            @endforeach
                    </ol>
                    <ol>
                        @foreach($a2 as $v)
                            <li style="text-align: center" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type=2','','width=1024,height=768')">{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </div>
            </li>
            {{--<li data-hot="orange" ng-click="toMgFlash()">
                <a class="toggle-red" toggle-color href="javascript:void(0)">
                    <b>MG老虎机</b>
                    <small>MG SLOT</small>
                </a>
                <div class="subnav no-logo">
                    <ol>
                        <li game-box="mg" ng-click="toMgFlash()">摆脱</li>
                        <li game-box="mg" ng-click="toMgFlash()">不朽的浪漫</li>
                        <li game-box="mg" ng-click="toMgFlash()">淑女之夜</li>
                        <li game-box="mg" ng-click="toMgFlash()">银行抢匪</li>
                        <li game-box="mg" ng-click="toMgFlash()">海滨嘉年华</li>
                        <li game-box="mg" ng-click="toMgFlash()">狂欢节</li>
                        <li game-box="mg" ng-click="toMgFlash()">酷派狼人</li>
                        <li game-box="mg" ng-click="toMgFlash()">反转马戏团</li>
                        <li game-box="mg" ng-click="toMgFlash()">春假时光</li>
                    </ol>
                </div>
            </li>--}}
            <li data-hot="red">
                <a class="toggle-red" toggle-color href="{{ route('web.catchFish') }}">
                    <b>捕魚达人</b>
                    <small>FISH GAME</small>
                </a>
                <div class="subnav twocol">
                    <ol>
                        <?php
                        $fish = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('fish');
                        $a=[];
                        foreach ($fish as $v){
                            $a[] = $v;
                        }

                        $a1 = array_slice($a,0,15);
                        $a2 = array_slice($a,15);
                        ?>
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
            <li data-hot="yellow">
                <a class="toggle-red" toggle-color href="{{ route('web.poker') }}">
                    <b>棋牌对战</b>
                    <small>CHESS GAME</small>
                </a>
                <div class="subnav no-logo">
                    <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                    ?>
                    <ol>
                        @foreach($poker as $v)

{{--                        <li class="text-red" data-hot="yellow" game-box="kg" ng-click="toKgHtml()">开元棋牌</li>--}}
                        <li game-box="ap" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </div>
            </li>
            <li>
                <a href="{{ route('web.liveCasino') }}" nav-active>
                    <b>真人視訊</b>
                    <small>LIVE CASINO</small>
                </a>
                <div class="subnav">
                    <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                    ?>
                    <ol>
                        @foreach($live as $v)
                            <li style="text-align: center" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif >{{ $v['name'] }}</li>
                            @endforeach
                        {{--<li game-box="bb" ng-click="toBbLive()">BBIN旗舰厅</li>
                        @if(in_array('ags', $_api_list))<li game-box="ag" ng-click="toAgsLive()">AG国际厅</li>@endif
                        @if(in_array('ag', $_api_list))<li game-box="ag" ng-click="toAgLive()">AG国际厅</li>@endif
                        <li game-box="mg" ng-click="toMgDealer()">MG国际厅</li>
                        <li game-box="og" ng-click="toOgLive()">OG甜心厅</li>
                        <li game-box="pt" ng-click="toPtLive()">PT視訊厅</li>
                        <li game-box="ab" ng-click="toAbLive()">欧博尊爵厅</li>
                        <li game-box="gd" ng-click="toGdLive()">GD奢华厅</li>
                        @if(in_array('sunbet', $_api_list))<li game-box="sb" ng-click="toSunbetLive()">申博梦幻厅</li>@endif
                        @if(in_array('sunbets', $_api_list))<li game-box="sb" ng-click="toSunbetsLive()">申博梦幻厅</li>@endif
                        <li game-box="ebet" ng-click="toEbetLive()">易博世界厅</li>
                        <li game-box="sa" ng-click="toSaLive()">沙龙真人</li>--}}
                    </ol>
                </div>
            </li>
            <li>
                <a href="{{ route('web.esports') }}" nav-active>
                    <b>體育赛事</b>
                    <small>SPORTS</small>
                </a>
                <div class="subnav">
                    <ol class="subnav">
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                            @foreach($sports as $v)
                                <li style="text-align: center" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif >{{ $v['name'] }}</li>
                            @endforeach
                    </ol>
                </div>
            </li>
            <li>
                <a href="{{ route('web.lottory') }}" nav-active>
                    <b>彩票游戏</b>
                    <small>LOTTERY</small>
                </a>
                <div class="subnav">
                    <ol>
                        <?php
                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                        ?>
                            @foreach($lottery as $v)
                                <li style="text-align: center" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}&game_code={{ $v['game_code'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif >{{ $v['name'] }}</li>
                            @endforeach
                    </ol>
                </div>
            </li>
            <li class="prmotion" data-hot="pink">
                <a href="{{ route('web.activityList') }}" nav-active>
                    <b>优惠活动</b>
                    <small>PROMOTIONS</small>
                </a>
                {{--<div class="subnav no-logo">
                    <ol>
                        <li><a ng-href="@{{ContactInfo.HttpAPP == '' ? '#' : ContactInfo.HttpAPP}}" target="_blank">下载APP赠送28</a></li>
                        <li><a ng-href="@{{ContactInfo.HttpAgent == '' ? '#' : ContactInfo.HttpAgent}}" target="_blank">電子代理加盟</a></li>
                        <li><a ng-href="@{{ContactInfo.HttpRedenvelope == '' ? '#' : ContactInfo.HttpRedenvelope}}" target="_blank">天天抢红包</a></li>
                        <li><a ng-href="@{{ContactInfo.HttpVIP == '' ? '#' : ContactInfo.HttpVIP}}" target="_blank">尊享VIP</a></li>
                        <li><a ng-href="@{{ContactInfo.HttpPromotion == '' ? '#' : ContactInfo.HttpPromotion}}" target="_blank">优惠活动办理大厅</a></li>
                    </ol>
                </div>--}}
            </li>
            <li class="chat">
                <a target="_blank" href="{{ $_system_config->service_link }}">
                    <b>在线客服</b>
                    <small>ONLINE CHAT</small>
                </a>
            </li>
        </ul>
    </div>
</nav>
<script>
    function Alert(){

        layer.alert('您好！请登录后在点我进入游戏哦!',{icon:7});
    };
</script>


