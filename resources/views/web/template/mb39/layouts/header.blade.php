<header id="header">
    <div class="wrapper">

        <div id="logo-bg">
            <img src="{{ $_system_config -> site_logo }}" />
            <a href="{{ route('web.index') }}"></a>
        </div>
        <ul class="top-nav left ng-scope">
            <li class="yellow toggle-color color">
                <a href="{{ route('web.eGame') }}">电 子 游 戏</a>
            </li>
            <li class="red toggle-color color">
                <a href="{{ route('web.liveCasino') }}">真 人 游 戏</a>
            </li>
            <li>
                <a href="{{ route('web.lottory') }}">彩 票 游 戏</a>
            </li>
            <li>
                <a href="{{ route('web.esports') }}">体 育 游 戏</a>
            </li>
        </ul>
        <ul class="top-nav right ng-scope">
            <li class="white-red toggle-color color">
                <a href="{{ route('web.poker') }}">棋 牌 游 戏</a>
            </li>
            <li class="blue toggle-color color" toggle-color="">
                <a class="daili_apply" href="javascript:void (0)">代理申请</a>
            </li>
            <li class="blue toggle-color color" toggle-color="">
                <a target="_blank" href="">优惠活动</a>
            </li>
            {{--<li>
                <ul id="language" select-language="">
                    <li data-language="zh-CN" title="简体中文" class="ng-scope"></li>
                </ul>
            </li>--}}
        </ul>

        <nav id="nav">
            <ul class="ng-scope">
                <li>
                    <a href="{{ route('web.index') }}">首页<span>HOME</span></a>
                </li>
                <li class="menu hot">
                    <a href="{{ route('web.eGame') }}">電子游戏<span>SLOTS</span></a>
                    <ol class="subnav slot" id="slot" style="width: 241px;">
                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        ?>
                        @foreach($slot as $k => $v)
                            <li class="chess" game-box="{{ strtolower($k) }}"
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </li>
                <li class="menu hot">
                    <a href="{{ route('web.poker') }}">棋牌游戏<span>CARD</span></a>
                    <ol class="subnav" id="chess">
                        <?php
                        $poker = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('poker');
                        ?>
                        @foreach($poker as $k => $v)
                            <li class="chess" game-box="{{ strtolower($k) }}"
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{$v['plat_type']}}&game_type={{ $v['game_type'] }}','','width=1024,height=768')">{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </li>
                <li class="pull-right menu">
                    <a href="{{ route('web.liveCasino') }}">真人視訊<span>CASINO</span></a>
                    <ol class="subnav" id="live">
                        <?php
                        $live = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('live');
                        ?>
                        @foreach($live as $k => $v )
                            <li class="" game-box="{{ strtolower($k) }}"
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')"
                                @else onclick="Alert();"
                                    @endif>{{ $v['name'] }}</li>
                        @endforeach
                    </ol>
                </li>
                <li class="hot menu">
                    <a href="{{ route('web.esports') }}">體育游戏<span>SPORTS</span></a>
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
                <li class="menu">
                    <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a>
                    <ol class="subnav lottery" id="lottery">
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
                <li class="menu hot on">
                    <a href="{{ route('web.activityList') }}">优惠活动<span>PROMOTIONS</span></a>
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
