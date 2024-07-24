<header id="header">
    <div class="header-top">
        <div class="wrapper" style="width: 1100px;">

            <div id="logo-bg" style="background-image: none;top: 60px">
                <a href="{{ route('web.index') }}" >
                    <img src="{{ $_system_config -> site_logo }}">
                </a>
            </div>
            <ul class="top-nav top-nav-left">
                <li class="domain"></li>
                <li class="meidon">
                    北京时间 -
                    <span><?php echo date('Y-m-d')?></span>
                </li>
            </ul>
            <ul class="top-nav top-nav-right ng-scope">
                <li class="detection">
                    <a href="">代理申请</a>
                </li>
                <li class="board">
                    <a href="{{ route('web.poker') }}">棋牌游戏</a>
                </li>
                <li class="partner">
                    <a href="{{ route('web.liveCasino') }}">真人視訊</a>
                </li>

                <li class="promotion">
                    <a href="{{ route('web.activityList') }}">优惠申请</a>
                </li>
                <li class="information">
                    <a href="{{ route('web.esports') }}">體育游戏</a>
                </li>
                <li class="detection">
                    <a href="{{ route('web.lottory') }}">彩票游戏</a>
                </li>
                {{--<li class="language" select-language="">
                    <span title="简体中文" data-language="zh-CN" class="ng-scope"></span>
                    <span title="繁体中文" data-language="zh-TW" class="ng-scope"></span>
                    <span title="English" data-language="en-US" class="ng-scope"></span>
                    <span title="ภาษาไทย" data-language="th" class="ng-scope"></span>
                </li>--}}
            </ul>
        </div>
    </div>
    <div class="header-middle">

        <nav id="nav">
            <ul class="ng-scope">
                <li class="home">
                    <a href="{{ route('web.index') }}">首页</a>
                </li>
                <li class="hot slot">
                    <a href="{{ route('web.eGame') }}">電子游艺</a>
                    <div class="subnav col3 slot">
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
                        <ol class="last-ol" id="slot2">
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
                <li class="red board">
                    <a href="{{ route('web.poker') }}">棋牌大厅</a>
                    <ol class="subnav slot chess" id="chess">
                        <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                        ?>
                        @foreach($poker as $k => $v)
                            <li class="chess" game-box="{{ strtolower($k) }}"
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </li>
                <li class="live">
                    <a href="{{ route('web.liveCasino') }}">視訊直播</a>
                    <div class="subnav live col2">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                        <ol class="last-ol" id="live2">
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
                        <ol class="first-ol" id="live1">
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
                <li class="hot fish">
                    <a href="{{ route('web.catchFish') }}">捕魚达人</a>
                    <div class="subnav slot col2 fish">
                        <ol id="fish1"></ol>
                        <ol class="last-ol" id="fish2"></ol>
                    </div>
                </li>
                <li class="lottery">
                    <a href="{{ route('web.lottory') }}">彩票游戏</a>
                    <?php
                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                    ?>
                    <ol class="subnav lottery" id="lottery">
                        @foreach($lottery as $k => $v )
                            <li class="" game-box="{{ strtolower($v['plat_type']) }}"
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif>{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </li>
                <li class="sport">
                    <a href="{{ route('web.esports') }}">體育赛事</a>
                    <?php
                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                    ?>
                    <ol class="subnav sport" id="sport">
                        @foreach($sports as $k => $v )
                            <li class="" game-box="{{ strtolower($k) }}"
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif>{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </li>
                <li class="hot promotion">
                    <a href="{{ route('web.activityList') }}">优惠活动</a>

                </li>
                <li class="chat">
                    <a href="javascript:void(0)" class="KFzaixian" title="在线客服" onclick="openKuFu(this,1);" urls="{{ $_system_config -> service_link }}">在线客服</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header-bottom">
        <div class="wrapper">

            @if ( ! Auth::guard('member')->guest())
                <div id="account-box" class="ng-scope">
                    <ul id="account-info">
                        <li class="account">
                            帐号 :
                            <span title="{{ $_member -> name }}">{{ $_member -> name }}</span>

                        </li>
                        <li class="balance">
                            账户余额 :
                            <span class="ng-binding UserAmountController my_money">{{ $_member -> money }}</span>


                            <div id="callBackAllWallet"></div>
                        </li>
                    </ul>
                    <div id="account-nav">
                        @if($_system_config->is_new_center==1)
                            <ul>
                                <li title="个人中心">
                                    <a href="{{  route('member.userCenter') }}">个人中心</a>
                                </li>
                            </ul>
                            @else
                            @endif
                        {{--<ul>
                            <li title="投注记录">
                                <a href="@Url.Action("BetRecord", "Index")">投注记录</a>
                            </li>
                            <li title="线上取款">
                                <a href="@Url.Action("WithdrawApplication", "Index")">线上取款</a>
                            </li>
                            <li title="线上存款">
                                <a href="@Url.Action("Deposit", "Index")">线上存款</a>
                            </li>
                        </ul>
                        <ul>
                            <li title="交易记录">
                                <a href="@Url.Action("Transaction", "Index")">交易记录</a>
                            </li>
                            <li title="额度转换">
                                <a href="@Url.Action("transfer", "Index")">额度转换</a>
                            </li>
                            <li title="修改取款密码">
                                <a href="@Url.Action("ChangeWithdrawPassword", "Index")">取款密码</a>
                            </li>
                        </ul>--}}
                    </div>
                    <div id="action-box">
                        <a class="btn-logout ng-binding" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                    </div>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    {{--<div id="action-box">
                        <a class="btn-logout ng-binding" href="@Url.Action("ChangeLoginPassword", "Index")">修改登录密码</a>
                    </div>--}}
                </div>
            @else
                <div id="account-box">
                    <div class="slogan"></div>
                    <form class="ng-scope ng-invalid ng-invalid-required ng-dirty" action="{{ route('member.login.post') }}" method="post">
                        <div class="input-wrapper input-account">
                            <input id="loginUsername" type="text" name="name" placeholder="帐号" required="" autofocus="" class="ng-dirty ng-valid ng-valid-required">
                        </div>
                        <div class="input-wrapper input-password">
                            <input id="loginUserpwd" type="password" name="password" placeholder="密码" required />

                        </div>
                        <div id="check-code-wrapper" class="input-wrapper input-captcha">
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
                        <div class="input-wrapper input-login">
                            <button id="login-box" class="btn-login ng-binding ajax-submit-btn" onclick="login()">登入</button>
                            <button class="btn-reg" type="button" onclick="goTo('{{ route('web.register_one') }}')">注册</button>
                        </div>
                    </form>
                </div>
            @endif
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
