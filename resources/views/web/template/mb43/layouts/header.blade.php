<header id="header">
    <div id="top-header">
        <div class="header-top">
            <div class="wrapper">
            <ul class="top-nav top-nav-left">
                <li class="mobile"><a href="{{ route('web.eGame') }}">電子游艺</a></li>
                <li class="atd"><a href="{{ route('web.liveCasino') }}">真人荷官</a></li>
                <li class="wechat"><a href="{{ route('web.esports') }}"></a>體育竞赛</li>
                <li class="qq">
                    <a href="{{ route('web.lottory') }}">彩票游戏</a>
                </li>

                <li class="promotion"><a href="{{ route('web.activityList') }}">活动办理大厅</a></li>

                <li class="download">
                    <a href="javascript:void (0)" class="daili_apply">代理申请</a>
                </li>
            </ul>
            {{--<ul class="topnav-right">
                <li class="lobby-links">
                    <ol>
                        <li data-link="slot"><a><span class="yuLeChengTitle"></span></a></li>
                        <li data-link="live"><a href="@Url.Action("Live", "Index")?index=5"><span class="yuLeChengTitle"></span></a></li>
                    </ol>
                </li>
                <li class="download">
                    <a href="#"></a>
                </li>
                <li class="language">
                    <ol select-language>
                        <li></li>
                    </ol>
                </li>
            </ul>--}}
        </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="wrapper">
        <div id="logo-bg" style="background-image: none">
            <a href="{{ route('web.index') }}">
                <img src="{{ $_system_config -> site_logo }}">
            </a>
        </div>

        @if (!Auth::guard('member')->guest())
                <div id="account-box">
                    <div class="account-wrapper">
                        <ul id="account-info">
                            <li>
                                帐号 :
                                <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>
                            </li>
                            <li>
                                账户余额 :
                                <span class="account UserAmountController my_money" title="{{ $_member -> money }}">{{ $_member -> money }}</span>

                                <div id="callBackAllWallet"></div>
                            </li>
                        </ul>

                        <ul id="account-nav">
                            @if($_system_config->is_new_center==1)
                                <li title="个人中心">
                                    <a  style="color: red" href="{{  route('member.userCenter') }}">个人中心</a>
                                </li>
                            @else
                            @endif
                            {{--<li title="投注记录">
                                <a href="@Url.Action("BetRecord", "Index")">投注记录</a>
                            </li>
                            <li class="withdraw" title="线上取款">
                                <a href="@Url.Action("WithdrawApplication", "Index")">线上取款</a>
                            </li>
                            <li class="deposit" title="线上存款">
                                <a href="@Url.Action("Deposit", "Index")">线上存款</a>
                            </li>
                            <li title="额度转换">
                                <a href="@Url.Action("transfer", "Index")">额度转换</a>
                            </li>
                            <li title="交易记录">
                                <a href="@Url.Action("Transaction", "Index")">交易记录</a>
                            </li>
                            <li title="修改取款密码">
                                <a href="@Url.Action("ChangeWithdrawPassword", "Index")">修改取款密码</a>
                            </li>
                            <li title="修改密码">
                                <a href="@Url.Action("ChangeLoginPassword", "Index")">修改密码</a>
                            </li>--}}
                        </ul>
                    </div>
                    <div id="action-box">
                        <a class="btn-logout" ref="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                    </div>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    </div>
                </div>

        @else
            <div id="account-box">
                <form id="login-form" action="{{ route('member.login.post') }}" method="post">
                    <button class="btn-reg" type="button" onclick="goTo('{{ route('web.register_one') }}')">免费开户</button>
                    <div class="form-wrapper">
                        <div class="input-wrapper input-account " id="disuser">
                            <input name="name" id="loginUsername" type="text" placeholder="帐号" tabindex="1" required autofocus />
                        </div>
                        <div class="input-wrapper input-password" id="dispass">
                            <input name="password" id="loginUserpwd" type="password" placeholder="密码" tabindex="2" required />
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <div class="input-wrapper input-forget">
                            <img id="captcha" src="{{ URL('kit/captcha/1') }}" />
                            <button class="btn-forget" type="button"></button>
                        </div>
                        <div id="check-code-wrapper" class="input-wrapper input-captcha">
                            <input name="captcha" data-checkcode-retriever="checkCode" checkcode-type="Login" type="text" id="loginUsercode" placeholder="验证码" tabindex="3" required onfocus="$('#captcha').click()" />
                            <button id="login-box" class="btn-login ajax-submit-btn" >登入</button>

                        </div>

                    </div>
                </form>
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
        @endif

    </div>
    <div class="header-bottom">
        <div class="wrapper">
            <nav id="nav">
        <ul class="wrapper">
            <li>
                <a href="{{ route('web.index') }}">首页</a>
            </li>
            <li class="hot">
                <a href="{{ route('web.eGame') }}">電子游艺</a>
                <ol class="subnav slot" id="slot">
                    <?php
                    $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                    ?>
                        @foreach($slot as $k => $v )
                    <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                            @endforeach
                </ol>
            </li>
            <li class="hot">
            <a href="{{ route('web.catchFish') }}">捕魚</a>
            <ol class="subnav slot" id="fish"></ol>
            </li>
            {{--@*<li class="hot">
                <a href="javascript:void(0)" onclick="slotOpen('/Web8/Index/GameSlot?id=fish')">捕魚</a>
                <ol class="subnav slot" id="fish"></ol>
            </li>
            <li class="hot">
                <a href="javascript:void(0)" >电竞</a>
                <ol class="subnav slot" id="competition"></ol>
            </li>*@--}}
            <li class="hot">
                <a href="{{ route('web.poker') }}">棋牌游戏</a>
                <ol class="subnav board" id="board">
                    <?php
                    $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                    ?>
                        @foreach($poker as $k => $v )
                            <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                        @endforeach
                </ol>
            </li>
            <li>
                <a href="{{ route('web.liveCasino') }}">真人荷官</a>
                <ol class="subnav live" id="live">
                    <?php
                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                    ?>
                        @foreach($live as $k => $v )
                            <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"@endif>{{ $v['name'] }}</li>
                            @endforeach
                </ol>
            </li>
            <li>
                <a href="{{ route('web.esports') }}">體育竞赛</a>
                <ol class="subnav slot" id="sport">
                    <?php
                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                    ?>
                        @foreach($sports as $k => $v )
                            <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"@endif>{{ $v['name'] }}</li>
                        @endforeach
                </ol>
            </li>
            <li>
                <a href="{{ route('web.lottory') }}">彩票游戏</a>
                <ol class="subnav lottery" id="lottery">
                    <?php
                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                    ?>
                        @foreach($lottery as $k => $v )
                            <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"@endif>{{ $v['name'] }}</li>
                        @endforeach
                </ol>
            </li>

            <li class="hot" toggle-color="300">
                <a href="{{ route('web.activityList') }}">优惠活动</a>
            </li>
            <li>
                <a href="javascript:void(0)" class="KFzaixian" onclick="openKuFu(this,1);" urls="{{ $_system_config -> service_link }}">在线客服</a>
            </li>
        </ul>
    </nav>
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
