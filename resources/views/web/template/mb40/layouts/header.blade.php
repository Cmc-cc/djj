<header id="header">
    <div class="wrapper" style="width: 1224px">

        <div id="div-meiDonNow">
            北京时间:
            <span ><?php echo date('Y-m-d')?></span>
        </div>
        <ul class="top-nav">
            <li class="red"><a href="{{ route('web.eGame') }}">電子游艺</a></li>
            <li class="green"><a href="{{ route('web.liveCasino') }}">真人視訊</a></li>
            <li class="purple"><a href="{{ route('web.esports') }}">體育投注</a></li>
            <li><a href="{{ route('web.lottory') }}">时时彩</a></li>
            <li><a href="{{ route('web.activityList') }}">活动申请大厅</a></li>


            <li class="download">
                <a href="javascript:void (0)" class="daili_apply">代理申请</a>
            </li>

            {{--<li id="language" select-language>
                <span ng-cloak></span>
            </li>--}}
        </ul>

        <div id="logo-bg">
            <a href="{{ route('web.index') }}" style="background: none">
                <img src="{{ $_system_config -> site_logo }}">
            </a>
        </div>
        @if ( ! Auth::guard('member')->guest())
            <div id="account-box" class="login" >
                <ul id="account-info">
                    <li>
                        帐号 :
                        <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>
                    </li>
                    <li>
                        账户余额 :
                        <span class="account ng-binding UserAmountController my_money">{{ $_member -> money }}</span>
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
                        <a href="@Url.Action("BetRecord", "Index")">
                        投注记录
                        </a>
                    </li>
                    <li title="交易记录">
                        <a href="@Url.Action("Transaction", "Index")">
                        交易记录
                        </a>
                    </li>
                    <li title="修改取款密码">
                        <a href="@Url.Action("ChangeWithdrawPassword", "Index")">
                        修改取款密码
                        </a>
                    </li>
                    <li title="额度转换">
                        <a href="@Url.Action("transfer", "Index")">
                        额度转换
                        </a>
                    </li>
                    <li title="线上取款">
                        <a href="@Url.Action("WithdrawApplication", "Index")">
                        线上取款
                        </a>
                    </li>
                    <li title="线上存款">
                        <a href="@Url.Action("Deposit", "Index")">
                        线上存款
                        </a>
                    </li>
                    <li title="修改密码">
                        <a href="@Url.Action("ChangeLoginPassword", "Index")">修改密码</a>
                    </li>--}}
                </ul>
                <div id="action-box">
                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出系统</a>
                </div>
                <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @else
            <div id="account-box">
                <form method="post" id="login-form" action="{{ route('member.login.post') }}">
                    <input id="loginUsername" type="text" placeholder="帐号" required="" autofocus="" class="ng-dirty ng-valid ng-valid-required">

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
                    <button class="register-btn" type="button" onclick="goTo('{{ route('web.register_one') }}')">免费开户</button>

                </form>
            </div>

        @endif

        <nav id="nav">
            <ul >
                <li>
                    <a href="{{ route('web.index') }}">首页</a>
                </li>
                <li class="red">
                    <a href="{{ route('web.catchFish') }}">捕魚游戏</a>
                </li>
                <li class="hot">
                    <a href="{{ route('web.eGame') }}">電子游艺</a>
                    <ol class="game subnav" id="slot">
                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        ?>
                            @foreach($slot as $k => $v)
                        <li class="swiper-slide" game-box="{{ strtolower($k) }}"><span
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</span>
                        </li>
                                @endforeach
                    </ol>
                </li>
                <li class="hot">
                    <a href="{{ route('web.poker') }}">棋牌</a>
                    <ol class="game subnav" id="board">
                        <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                        ?>
                        @foreach($poker as $k => $v)
                            <li class="swiper-slide" game-box="{{ strtolower($k) }}"><span
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</span>
                            </li>
                        @endforeach
                    </ol>
                </li>
                <li class="hot">
                    <a href="{{ route('web.liveCasino') }}">真人視訊</a>
                    <ol class="live subnav" id="live">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                            @foreach($live as $k => $v)
                        <li game-box="{{ strtolower($k) }}"><span
                                    @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif
                                    class="slide swiper-slide">{{ $v['name'] }}</span></li>
                                @endforeach
                    </ol>
                </li>
                <li>
                    <a href="{{ route('web.esports') }}">體育投注</a>
                    <ol class="sport subnav" id="sport">
                        <?php
                        $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                        ?>
                        @foreach($sports as $k => $v)
                            <li game-box="{{ strtolower($k) }}"><span
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif
                                        class="slide swiper-slide">{{ $v['name'] }}</span></li>
                        @endforeach
                    </ol>
                </li>
                <li>
                    <a href="{{ route('web.lottory') }}">彩票游戏</a>
                    <ol class="lottery subnav" id="lottery">
                        <?php
                        $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                        ?>
                            @foreach($lottery as $k => $v)
                                <li game-box="{{ strtolower($v['plat_type']) }}"><span
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                            @endif
                                            class="slide swiper-slide">{{ $v['name'] }}</span></li>
                            @endforeach
                    </ol>
                </li>
                <li class="promotion hot">
                    <a href="{{ route('web.activityList') }}">优惠活动</a>
                </li>
                <li class="chat">
                    <a href="javascript:void(0)" onclick="openKuFu(this,1);" class="KFzaixian" urls="{{ $_system_config -> service_link }}">线上客服</a>
                </li>
            </ul>
        </nav>
    </div>

    <div id="news" >
        <div class="wrapper">
            <div id="hot-news"><marquee  onMouseOut="this.start()" onMouseOver="this.stop()" scrollamount="4" style="color:red">
                    @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    @endforeach
                </marquee></div>
        </div>
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
