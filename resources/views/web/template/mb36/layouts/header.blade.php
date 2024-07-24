<div id="header-top">
    <div class="wrapper">
        <ul class="top-nav">
            <li class="promotion" >
                <a href="{{ route('web.activityList') }}" target="_blank">优惠申请大厅</a>
            </li>
            <li class="promotion2">
                <a href="{{ route('web.poker') }}">棋牌游戏</a>
            </li>
            <li class="mobile">
                <a target="_blank" href="{{ $_system_config->service_link }}" class="KFzaixian" >
                    在线客服
                </a>
            </li>
            <!--<li class="mobile">
                <a target="_blank">手机APP安装</a>
                <div class="mobile-down">
                    <div class="layoutdown ios" id="IOSdown"></div>
                    <div class="layoutdown android" id="ANDROIDdown"></div>
                </div>
            </li>-->

        </ul>
        <ul class="top-right">
            <li>

                <div id="news" style="display: block">
                    <div id="hot-news">
                        @foreach($_system_notices as $v)
                            <marquee>{{ $v->title }}~{{ $v->content }}</marquee>
                        @endforeach
                    </div>
                </div>
            </li>
            <li select-language>
                <span></span>
            </li>
        </ul>
    </div>
</div>
<header id="header" scrolltop-fixed="35">
    <div class="wrapper">

        <div id="logo-bg">
            <img src="{{ $_system_config -> site_logo }}" />
            <a href="{{ route('web.index') }}"></a>
        </div>

        <nav id="nav">
            <input type="hidden" id="navIndex" />
            <ul>
                <li @if($web_route == 'web.index') class="active" @endif>
                    <a href="{{ route('web.index') }}">
                        首页
                        <span>HOME</span>
                    </a>
                </li>
                <li class="hot @if($web_route == 'web.eGame') active @endif">
                    <a href="{{ route('web.eGame') }}">
                        電子游艺
                        <span>GAMES</span>
                    </a>
                    <ol class="subnav slot" id="slot">

                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        ?>
                        @foreach($slot as $k => $v)
                            <li game-box="{{ strtolower($k) }}"
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"></li>
                        @endforeach
                    </ol>
                </li>
                <li @if($web_route == 'web.liveCasino') class="active" @endif>
                    <a href="{{ route('web.liveCasino') }}">
                        真人視訊
                        <span>LIVE VIDEO</span>
                    </a>
                    <ol class="subnav live" id="live">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                        @foreach($live as $k => $v)
                            <li game-box="{{ strtolower($k) }}" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif></li>
                        @endforeach
                    </ol>
                </li>
                <li @if($web_route == 'web.esports') class="active" @endif>
                    <a href="{{ route('web.esports') }}">
                        體育投注
                        <span>SPORTS</span>
                    </a>
                    <ol class="subnav sport" id="sport">
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                        @foreach($sports as $k => $v)
                            <li game-box="{{ strtolower($k) }}" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif></li>
                        @endforeach
                    </ol>
                </li>
                <li @if($web_route == 'web.lottory') class="active" @endif>
                    <a href="{{ route('web.lottory') }}">
                        彩票游戏
                        <span>LOTTERY</span>
                    </a>
                    <ol class="subnav lottery" id="lottery">
                        <?php
                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                        ?>
                        @foreach($lottery as $k => $v)
                            <li game-box="{{ strtolower($v['plat_type']) }}" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif></li>
                        @endforeach
                    </ol>
                </li>
                <li @if($web_route == 'web.poker') class="active" @endif>
                    <a href="{{ route('web.poker') }}" >
                        棋牌游戏
                        <span>POKER</span>
                    </a>
                    <ol class="subnav chess" id="chess">
                        <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                        ?>
                        @foreach($poker as $k => $v)
                            <li game-box="{{ strtolower($v['plat_type']) }}"
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                            ></li>
                        @endforeach
                    </ol>
                </li>
                <li class="hot">
                    <a href="{{ route('web.activityList') }}">
                        优惠活动
                        <span>ACTIVITY</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</header>
<div id="header-account" scrolltop-fixed="" class="">
    <div class="wrapper">
        @if (Auth::guard('member')->guest())
        <div id="account-box">
            <form id="login-form" method="POST" action="{{ route('member.login.post') }}">
                <input id="loginUsername" type="text" name="name" placeholder="帐号" required autofocus />

                <input id="loginUserpwd" type="password" name="password" placeholder="密码" required />
                <div id="check-code-wrapper">
                    <input id="loginUsercode" name="captcha" type="text" placeholder="验证码" checkcode-type="Login" required  />
{{--                    <img id="captcha" src="/api/Vaildatacode" onclick="changeCode(this)" />--}}
                    <img id="captcha" src="{{ URL('kit/captcha/1') }}" class="c2c98f0de5a04167a9e427d883690ff6">
                </div>
                <script>
                    $(function () {
                        $('#captcha').click(function () {
                            $url = "{{ URL('kit/captcha') }}";
                            $url = $url + "/" + Math.random();
                            $(this).attr('src',$url)
                        })
                    })

                </script>

                <button id="login-box" class="login-btn ajax-submit-btn">登入</button>
                <button class="join-btn" type="button" onclick="goTo('{{ route('web.register_one') }}')">免费开户</button>
            </form>
        </div>
            @else
            <div id="account-box" class="ng-scope">
                <ul id="account-info">
                    <li>
                        帐号 :
                        <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>
                    </li>
                    <li>
                        账户余额 :
                        <span class="account ng-binding UserAmountController money">{{ $_member -> money }}</span>
                        <div id="callBackAllWallet"></div>
                    </li>
                </ul>

                <ul id="account-nav">
                    @if($_system_config->is_new_center==1)
                        <li title="个人中心">
                            <a href="{{  route('member.userCenter') }} ">个人中心</a>
                        </li>
                        @else
                        @endif
                    {{--<li title="投注记录">
                        <a href="@Url.Action("BetRecord", "Index")">投注记录</a>
                    </li>
                    <li title="线上取款">
                        <a href="@Url.Action("WithdrawApplication", "Index")">线上取款</a>
                    </li>
                    <li title="线上存款">
                        <a href="@Url.Action("Deposit", "Index")">线上存款</a>
                    </li>
                    <li title="交易记录">
                        <a href="@Url.Action("Transaction", "Index")">交易记录</a>
                    </li>
                    <li title="额度转换">
                        <a href="@Url.Action("transfer", "Index")">额度转换</a>
                    </li>
                    <li title="修改取款密码">
                        <a href="@Url.Action("ChangeWithdrawPassword", "Index")">取款密码</a>
                    </li>--}}
                </ul>
                <div id="action-box">
                    <a class="login-btn ng-binding" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
{{--                    <a class="change-btn" href="">修改密碼</a>--}}

                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endif

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
