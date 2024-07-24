<header id="header">
    <div class="header-top">
        <div class="wrapper" style="width: 1145px;">
            <div id="div-meiDonNow">
                北京时间 -
                <span>{{ date('Y-m-d') }}</span>
            </div>
            <ul class="top-nav ng-scope">
                <li class="green-style">
                    <a class="daili_apply" href="javascript:void (0)">代理申请</a>
                </li>
                @if(in_array('AG',$_api_list))
                <li class="green-style" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                    <span class="gold">.</span>AG電子
                </li>
                @endif
                @if(in_array('BBIN',$_api_list))
                <li class="green-style" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                    <span class="gold">.</span>BBIN電子
                </li>
                @endif
                @if(in_array('MG',$_api_list))
                <li class="green-style" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                    <span class="gold">.</span>MG電子
                </li>
                @endif
                @if(in_array('PT',$_api_list))
                <li class="green-style" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                    <span class="gold">.</span>PT電子
                </li>
                @endif
                <li class="cyanblue-style" onclick="slotOpen('{{ route('web.catchFish') }}')">
                    <span class="gold">.</span>捕魚游戏
                </li>
                <li class="yellow-style"><a href="{{ route('web.eGame') }}">電子游艺</a></li>
                <li class="red-style"><a href="{{ route('web.liveCasino') }}">真人視訊</a></li>
                <li>
                    <a href="{{ route('web.activityList') }}">优惠申请大厅</a>
                </li>
                <li>
                    <a href="{{ route('web.poker') }}">棋牌游戏</a>
                </li>
                <li>
                    <a href="{{ route('web.esports') }}">體育投注</a>
                </li>
                <li>
                    <a href="{{ route('web.lottory') }}">彩票游戏</a>
                </li>

                {{--<li class="lang">
                    <div select-language="">
                        <span data-language="zh-CN" title="简体中文" class="ng-scope"></span>
                        <span data-language="zh-TW" title="繁体中文" class="ng-scope"></span>
                        <span data-language="en-US" title="English" class="ng-scope"></span>
                        <span data-language="th" title="ภาษาไทย" class="ng-scope"></span>
                    </div>
                </li>--}}
            </ul>
            <div class="header-account">
                @if (!Auth::guard('member')->guest())
                    <div id="account-box" class="ng-scope">
                        <ul id="account-info">
                            <li>
                                您好！会员
                                <span class="account" title="{{ $_member -> name }}">{{ $_member -> name }}</span>
                            </li>
                            <li class="balance">
                                余额：
                                <span class="account ng-binding UserAmountController my_money">{{ $_member -> money }}</span>

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
                            <li title="修改提款密码">
                                <a href="@Url.Action("ChangeLoginPassword", "Index")">登录密码</a>
                            </li>--}}
                        </ul>
                        <div id="action-box">
                            <a class="logout-btn ng-binding" href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a>
                        </div>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @else
                    <div id="account-box">
                        <form class="ng-scope ng-pristine ng-invalid ng-invalid-required" method="post" action="{{ route('member.login.post') }}">
                            <input name="name" id="loginUsername" type="text" placeholder="帐号" required="" autofocus="" class="ng-pristine ng-invalid ng-invalid-required">
                            <div class="sendcodes">
                                <input id="loginUserPhone" type="number" placeholder="手机号码" checkcode-type="Login" required maxlength="11" />
                            </div>
                            <div class="sendcodes">
                                <input id="loginUserPhoneCode" type="number" placeholder="手机验证码" checkcode-type="Login" required maxlength="4" />
                                <span class="reg-code" onclick="sendBtn($('#loginUserPhone'),this,1)" id="sendCode" state="1">发送验证码</span>
                            </div>
                            <input name="password" id="loginUserpwd" type="password" placeholder="密码" required="" class="ng-pristine ng-invalid ng-invalid-required">

                            <div id="check-code-wrapper">
                                <input name="captcha" data-checkcode-retriever="checkCode" id="loginUsercode" onfocus="$('#captcha').click()" checkcode-type="Login" type="text" placeholder="验证码" required="" class="ng-pristine ng-invalid ng-invalid-required">
                                <img id="captcha" src="{{ URL('kit/captcha/1') }}" onclick="$('#captcha').click()">
                            </div>
                            <button id="login-box" class="login-btn ajax-submit-btn" >会员登录</button>
                            <span class="register-btn"><a href="javascript:;" onclick="goTo('{{ route('web.register_one') }}')">会员注册</a></span>
                        </form>
{{--                        <p class="reg-mobile" onclick="loginCode(this);" state="1">手机号登录</p>--}}
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
        </div>
    </div>

    <div class="header-bottom">
        <div class="wrapper" style="width: 1145px">
            <div id="logo-bg" style="background-image: none">
                <a href="{{ route('web.index') }}">
                    <img src="{{ $_system_config -> site_logo }}">
                </a>
            </div>

            <nav id="nav">
                <ul class="ng-scope">
                    <li>
                        <a href="{{ route('web.index') }}">首页<span>HOME</span></a>
                    </li>
                    <li class="hot">
                        <a href="{{ route('web.eGame') }}">電子游艺<span>SLOTS</span></a>
                        <div class="subnav slots slot full multi-ol">
                            <div class="wrapper" id="slot">
                                <ol>
                                    <?php
                                    $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                                    ?>
                                    @foreach($slot as $k => $v )
                                        <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li class="hot">
                        <a href="{{ route('web.poker') }}">棋牌游戏<span>BOARD</span></a>
                        <ol class="subnav slot chess no-full" id="chess">
                            <?php
                            $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                            ?>
                            @foreach($poker as $k => $v )
                                <li class="chess" game-box="{{ strtolower($v['plat_type']) }}" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                            @endforeach
                        </ol>
                    </li>
                    <li>
                        <a href="{{ route('web.catchFish') }}" >捕魚游戏<span>FISHES</span></a>
{{--                        <ol class="subnav fish no-full" id="fish"></ol>--}}
                    </li>
                    <li class="hot">
                        <a href="{{ route('web.liveCasino') }}">真人視訊<span>CASINO</span></a>
                        <div class="subnav live full multi-ol">
                            <div class="wrapper" id="live">
                                <ol>
                                    <?php
                                    $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                                    ?>
                                    @foreach($live as $k => $v )
                                        <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                            @else onclick="Alert();"@endif>{{ $v['name'] }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('web.esports') }}">體育投注<span>SPORTS</span></a>
                        <div class="subnav sports sport multi-ol full">
                            <div class="wrapper" id="sport">
                                <ol>
                                    <?php
                                    $sports = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('sports');
                                    ?>
                                    @foreach($sports as $k => $v )
                                        <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                            @else onclick="Alert();"@endif>{{ $v['name'] }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
                        <div class="subnav lottery full multi-ol">
                            <div class="wrapper" id="lottery">
                                <ol>
                                    <?php
                                    $lottery = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('lottery');
                                    ?>
                                    @foreach($lottery as $k => $v )
                                        <li class="swiper-slide" game-box="{{ strtolower($v['plat_type']) }}" @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                            @else onclick="Alert();"@endif>{{ $v['name'] }}</li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('web.activityList') }}">优惠活动<span>PROMOTIONS</span></a>
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

