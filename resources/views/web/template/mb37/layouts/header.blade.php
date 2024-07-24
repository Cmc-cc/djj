<header id="header">
    <div class="header-top">
        <div class="wrapper">
            <ul class="topnav-left">
                <li class="license">牌照展示</li>

                <li id="div-meiDonNow">
                    北京时间 -
                    <span><?php echo date('Y-m-d')?></span>
                </li>
            </ul>

            <ul class="topnav-right">
                <li>
                    <a href="{{ $_system_config->app_link }}">手机投注</a>
                </li>
                <li class="red">
                    <a href="javascript:void (0)" class="daili_apply">代理申请</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="header-content">
        <div class="wrapper">

            <div id="logo-bg">
                <a href="{{ route('web.index') }}">
                    <img src="{{ $_system_config -> site_logo }}">
                </a>
            </div>

            <nav id="nav">
                <ul>
                    <li>
                        <a href="{{ route('web.index') }}">网站首页<span>HOME</span></a>
                    </li>
                    <li class="hot">
                        <a href="{{ route('web.poker') }}">棋牌游戏<span>CARDS GAME</span></a>
                        <div class="subnav slot col2" style="margin-left: -90px">
                            <ol id="chess1">
                                <?php
                                $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                                ?>
                                @foreach($poker as $k => $v)
                                    <li class="chess" game-box="{{ strtolower($k) }}"
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </li>
                    <li class="hot">
                        <a href="{{ route('web.eGame') }}">電子游艺<span>SLOTS</span></a>
                        <div class="subnav slot col2 game">
                            <?php
                            $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                            ?>
                            <ol id="slot1">
                                <?php
                                    $i =0;
                                ?>
                                @foreach($slot as $k => $v )
                                    <?php
                                            $i ++;
                                        ?>
                                    @if($i <= 13)
                                            <li class="" game-box="{{ strtolower($k) }}"
                                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                                        @endif
                                @endforeach
                            </ol>
                            <ol id="slot2">
                                <?php
                                $i =0;
                                ?>
                                @foreach($slot as $k => $v )
                                    <?php
                                    $i ++;
                                    ?>
                                    @if($i > 13)
                                            <li class="" game-box="{{ strtolower($k) }}"
                                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                                    @endif
                                @endforeach
                            </ol>

                        </div>
                    </li>
                    <li>
                        <a href="{{ route('web.liveCasino') }}">真人視訊<span>CASINO</span></a>
                        <div class="subnav live col2">
                            <?php
                            $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                            ?>
                            <ol id="live1">
                                <?php
                                $i =0;
                                ?>
                                @foreach($live as $k => $v )
                                    <?php
                                    $i ++;
                                    ?>
                                    @if($i <= 8)
                                        <li class="" game-box="{{ strtolower($k) }}"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>{{ $v['name'] }}</li>
                                    @endif
                                @endforeach
                            </ol>
                            <ol id="live2">
                                <?php
                                $i =0;
                                ?>
                                @foreach($live as $k => $v )
                                    <?php
                                    $i ++;
                                    ?>
                                    @if($i > 8)
                                        <li class="" game-box="{{ strtolower($k) }}"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>{{ $v['name'] }}</li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('web.esports') }}">體育投注<span>SPORTS</span></a>
                        <div class="subnav sport">
                            <?php
                            $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                            ?>
                            <ol id="sport1">
                                @foreach($sports as $k => $v )
                                        <li class="" game-box="{{ strtolower($k) }}"
                                            @if($_member)
                                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                            @else onclick="Alert();"
                                                @endif>{{ $v['name'] }}</li>
                                @endforeach
                            </ol>
                            <ol id="sport2"></ol>
                        </div>

                    </li>
                    <li>
                        <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
                        <div class="subnav lottery game">
                            <?php
                            $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                            ?>
                            <ol id="lottery">
                                @foreach($lottery as $k => $v )
                                    <li class="" game-box="{{ strtolower($v['plat_type']) }}"
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>{{ $v['name'] }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </li>
                    <li class="hot">
                        <a href="{{ route('web.activityList') }}">优惠活动<span>PROMOTION</span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="KFzaixian" title="在线客服" onclick="openKuFu(this,1);" urls="{{ $_system_config ->service_link  }}">在线客服<span>SERVICE</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="header-bottom homepage">
    <div class="wrapper">
        @if ( ! Auth::guard('member')->guest())
            <div id="account-box" class="login ng-scope">
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
                    {{--<li title="线上存款">
                        <a href="@Url.Action("Deposit", "Index")">
                        线上存款
                        </a>
                    </li>
                    <li title="交易记录">
                        <a href="@Url.Action("Transaction", "Index")">
                        交易记录
                        </a>
                    </li>
                    <li title="投注记录">
                        <a href="@Url.Action("BetRecord", "Index")">
                        投注记录
                        </a>
                    </li>

                    <li class="home-noline" title="线上取款">
                        <a href="@Url.Action("WithdrawApplication", "Index")">
                        线上取款
                        </a>
                    </li>
                    <li title="额度转换">
                        <a href="@Url.Action("transfer", "Index")">额度转换</a>
                    </li>
                    <li title="修改登录密码">
                        <a href="@Url.Action("ChangeLoginPassword", "Index")">
                        修改密码
                        </a>
                    </li>
                    <li title="修改取款密码">
                        <a href="@Url.Action("ChangeWithdrawPassword", "Index")">
                        修改取款密码
                        </a>
                    </li>--}}
                    <li class="logout-btn" title="退出账户">
                        <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="ng-binding">退出账户</a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @else
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
                    <button class="register-btn" type="button" onclick="goTo('{{ route('web.register_one') }}')">免费开户</button>
                </form>
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
