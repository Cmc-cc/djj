@extends('web.template.mb41.layouts.main')
@section('content')
<link href="{{ asset('web/mb41/css/home.css') }}" rel="stylesheet" />
<link href="{{ asset('web/mb41/css/reset.css') }}" rel="stylesheet" />
<link href="{{ asset('web/mb41/css/style.css') }}" rel="stylesheet" />
<div id="banner" style="margin-top: 0px;">
    <div class="wrapper">
        <div class="js-captain men top left"></div>
        <div class="js-spiderman top left"></div>
        <div class="black-bg"></div>
        <div class="js-betman top left"></div>
        <div class="banner-slogan"></div>
    </div>
</div>
<div class="wrapper">
    <ul class="game-box">
        <li game-box="slot">
            <a href="{{ route('web.eGame') }}"><span>電子游艺</span></a>
        </li>
        <li game-box="live">
            <a href="{{ route('web.liveCasino') }}"><span>視訊直播</span></a>
        </li>
        <li game-box="sport">
            <a href="{{ route('web.esports') }}"><span>體育赛事</span></a>
        </li>
        <li game-box="lottery">
            <a href="{{ route('web.lottory') }}"><span>彩票游戏</span></a>
        </li>
    </ul>
</div>



<div id="news">
    <div class="wrapper">
        <div id="hot-news">
            <div class="main-cell">
                <marquee>
                    @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    @endforeach
                </marquee>
            </div>
            <div class="option-wrapper"></div>
        </div>
    </div>
</div>

<div id="content">
    <div class="wrapper" id="home-info">
        <div id="home" class="ng-scope">
            <div class="slot-game" id="tuiJianSlot">
                <ul class="slot-nav" id="game-list">
                    @if(in_array('AG', $_api_list))
                        <li class="ag" type="AG" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">AG電子
                        </li>
                    @endif
                        @if(in_array('BBIN', $_api_list))
                            <li class="bbin" type="BBIN" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">BBIN電子
                            </li>
                        @endif
                        @if(in_array('PT', $_api_list))
                            <li class="pt" type="pt" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">PT電子
                            </li>
                        @endif
                        @if(in_array('MG', $_api_list))
                            <li class="mg" type="MG" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">MG電子
                            </li>
                        @endif
                        @if(in_array('CQ9', $_api_list))
                            <li class="cq9" type="CQ9" game-box="cq9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">CQ9電子
                            </li>
                        @endif
                        @if(in_array('DT', $_api_list))
                            <li class="dt" type="DT" game-box="dt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2','','width=1024,height=768')">DT電子
                            </li>
                        @endif

                </ul>
                <div class="slot-board" id="slot-board">
                    <div>
                        <p id="slotIntroduce1"></p>
                        <p id="slotIntroduce2" class="second"></p>
                        <a class="entry" href="javascript:void(0)" goout="" id="goout" onclick="indexGoOut(this)">点击进入游戏</a>
                    </div>

                </div>
                <div class="character"></div>
                <ul class="slot-list" id="tuiJianGameList"></ul>
            </div>
            <div class="sport-game">
                <ul class="sport" id="indexSport">
                    <li class="ag"
                        @if($_member)
                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                        @else onclick="Alert();" @endif
                        platformcode="AG" gametype=""></li>
                    <li class="bbin"
                        @if($_member)
                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                        @else onclick="Alert();" @endif
                        platformcode="BBIN" gametype=""></li>
                    <li class="newbb"
                        @if($_member)
                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"
                        @else onclick="Alert();" @endif
                        platformcode="NEWBB" gametype=""></li>
                </ul>
                <ul class="lottery" id="indexLottery">
                    <li class="bbin"
                        @if($_member)
                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=3','','width=1024,height=768')"
                        @else onclick="Alert();" @endif
                        platformcode="BBIN" gametype=""></li>
                    <li class="eg"
                        @if($_member)
                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3','','width=1024,height=768')"
                        @else onclick="Alert();" @endif
                        platformcode="EG" gametype=""></li>
                </ul>
            </div>
            <div class="home-mobile">
                <div class="mobile-phone"></div>
                <div class="mobile-qr" id="ANDROIDdown"></div>
            </div>
            <div class="home-license"></div>
        </div>

    </div>
</div>
@if($_system_config->is_alert_on == 0)
    <div id="modal-tit" class="modal modal-login">
        <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
            <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
            <a href="javascript:;">
                <img src="{{ $_system_config->alert_img }}" alt="">
            </a>
        </div>
    </div>
    <script>
        (function($){
            $(function(){
                $('#modal-tit').modal();
            })
        })(jQuery);
    </script>
@endif
<script src="{{ asset('web/mb41/js/jquery.parallaxmouse.min.js') }}"></script>
<script>
    //getGamePlate(1, "index");
    //biCommon.getDialogContent();
    $(function () {
        indexGameList();
        $("#game-list li").eq(0).mouseover();

    })
    $(window).parallaxmouse({
        invert: true,
        range: 200,
        elms: [
            { el: $('.js-captain'), rate: 0.1 },
            { el: $('.js-spiderman'), rate: 0.1 },
        ]
    });
    $(window).parallaxmouse({
        invert: true,
        range: 600,
        elms: [
            { el: $('.js-betman'), rate: 0.1 },
        ]
    });
</script>
    @endsection

