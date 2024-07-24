<div id="top-header">
    <div class="wrapper">
        <ul class="left-nav">
            <li class="meiDonNow">
                北京时间 -
                <span>{{ date('Y-m-d') }}</span>
            </li>
        </ul>
        <ul class="right-nav">
            <li class="license">合法牌照展示</li>
            {{--<li class="app">
                下载APP
                <span>
                        <div class="app" id="IOSdown"></div>
                        <div class="board" id="ANDROIDdown"></div>
                    </span>
            </li>--}}
            <li toggle-color>
                <a href="javascript:void (0)" class="daili_apply">代理申请</a>
            </li>
            <li toggle-color>
                <a href="{{ route('web.liveCasino') }}">真人視訊</a>
            </li>
            <li toggle-color>
                <a href="{{ route('web.esports') }}">體育赛事</a>
            </li>
            <li>
                <a href="{{ route('web.lottory') }}">彩票游戏</a>
            </li>
            <li toggle-color>
                <a href="{{ route('web.poker') }}">棋牌大厅</a>
            </li>
            <li>
                <a href="{{ route('web.eGame') }}">電子游戏</a>
            </li>
            <li toggle-color>
                <a href="{{ route('web.activityList') }}">优惠活动</a>
            </li>
        </ul>
    </div>
</div>
<style>
    #logo-bg:before{
        background: url("{{ $_system_config -> site_logo }}");
        height: 69px;
    }
</style>
<header id="header">
    <div class="wrapper">
        <div id="logo-bg">
        </div>
        @if ( ! Auth::guard('member')->guest())
            <div id="account-box" class="is-login ng-scope">
                <ul id="account-info">
                    <li>
                        帐号 :
                        <span class="account" title="{{ $_member ->name }}">{{ $_member -> name }}</span>
                    </li>
                    <li>
                        账户余额 :
                        <span class="account ng-binding UserAmountController my_money">{{ $_member -> money }}</span>


                        <div id="callBackAllWallet"></div>
                    </li>
                </ul>

                <div id="account-nav">
                    <ul>
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
                        </li>
                        <li title="修改登录密码">
                            <a href="@Url.Action("ChangeLoginPassword", "Index")">登录密码</a>
                        </li>--}}
                    </ul>
                </div>
                <div id="action-box">
                    <a class="login-btn ng-binding" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                </div>
                <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @else
            <div id="account-box">
                <form method="POST" action="{{ route('member.login.post') }}">
                    <input id="loginUsername" name="name" type="text" placeholder="帐号" required autofocus />
                    <input id="loginUserpwd" name="password" type="password" placeholder="密码" required />

                    <div id="check-code-wrapper">
                        <input id="loginUsercode" name="captcha" type="text" placeholder="验证码" checkcode-type="Login" required onfocus="$('#captcha').click()" />
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
                    <button id="login-box" class="login-btn ajax-submit-btn" >登入</button>
                </form>
            </div>
        @endif


        <nav id="nav" slide-menu>
            <ul>
                <li>
                    <a href="{{ route('web.index') }}">首页</a>
                </li>
                <li class="has-menu">
                    <a href="{{ route('web.liveCasino') }}">真人視訊</a>
                    <?php
                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                    ?>
                    <ol class="subnav live" id="live">
                        @foreach($live as $k => $v )
                                <li class="" game-box="{{ strtolower($k) }}"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </li>
                <li class="has-menu">
                    <a href="{{ route('web.esports') }}">體育赛事</a>
                    <ol class="subnav sport" id="sport">
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                            @foreach($sports as $k => $v )
                                <li class="" game-box="{{ strtolower($k) }}"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>{{ $v['name'] }}</li>
                            @endforeach
                    </ol>
                </li>
                <li class="has-menu">
                    <a href="{{ route('web.lottory') }}">彩票游戏</a>
                    <ol class="subnav" id="lottery">
                        <?php
                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                        ?>
                            @foreach($lottery as $k => $v )
                                <li class="" game-box="{{ strtolower($v['plat_type']) }}"
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                    @else onclick="Alert();"
                                        @endif>{{ $v['name'] }}</li>
                            @endforeach
                    </ol>
                </li>
                <li class="hot has-menu">
                    <a href="{{ route('web.poker') }}">棋牌大厅</a>
                    <ol class="subnav slot" id="chess">
                        <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                        ?>
                            @foreach($poker as $k => $v)
                                <li class="chess" game-box="{{ strtolower($k) }}"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                            @endforeach
                    </ol>
                </li>
                <li class="hot has-menu">
                    <a href="{{ route('web.eGame') }}">電子游戏</a>
                    <ol class="subnav game slot" id="slot">
                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        ?>
                            @foreach($slot as $k => $v)
                                <li class="chess" game-box="{{ strtolower($k) }}"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                            @endforeach
                    </ol>
                </li>
                <li class="hot" toggle-color>
                    <a href="{{ route('web.activityList') }}">优惠活动</a>
                </li>
                <li>
                    <a href="javascript:void(0)" onclick="openKuFu(this,1)" urls="{{ $_system_config -> service_link }}" class="KFzaixian">在线客服</a>

                </li>
                <li class="promotion">
                    <a href="{{ route('web.activityList') }}"></a>

                </li>
            </ul>
        </nav>
    </div>
</header>
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
                    var all = Number($('.my_money').text()) + Number(data.data);
                    $('.my_money').text('');
                    $('.my_money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
    @endif
    @endif
</script>
