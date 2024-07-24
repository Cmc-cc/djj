@extends('web.template.mb37.layouts.main')
@section('content')

    <div id="banner">
        <div class="lb-box" id="lb-1">
            <!-- 轮播内容 -->
            <div class="lb-content">
                @foreach($banners as $k => $item)
                    <div class="lb-item @if($k == 0)active @endif">
                        <a href="{{ $item -> jumpurl }}">
                            <img src="{{ $item->path }}" alt="picture loss">
                            <span>Description 1</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- 轮播标志 -->
            <ol class="lb-sign">
                @foreach($banners as $k =>  $item)
                    <li class="@if($k == 0)active @endif">{{ ++$k }}</li>
                @endforeach
            </ol>
            <!-- 轮播控件 -->
            <div class="lb-ctrl left">＜</div>
            <div class="lb-ctrl right">＞</div>
        </div>









        <div id="news">
            <div class="wrapper">
                <div id="hot-news">
                    <marquee></marquee>
                </div>
            </div>
        </div>
    </div>

    <link href="{{ asset('/web/mb37/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/web/mb37/css/home.css') }}" rel="stylesheet" />
    <script src="{{ asset('/web/mb36/js/swiper.min.js') }}"></script>

    <div id="content">
        <section class="slot-sec" id="home-info">
            <div class="slot-tab">
                <div class="wrapper">
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                    <div class="main-cell swiper-container swiper-container1">
                        <ul class="company-list swiper-wrapper indexGameTuiJian" id="game-list">
                            @if(in_array('AG', $_api_list))
                            <li class="swiper-slide" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('AG')">AG電子</li>
                            @endif
                                @if(in_array('MG', $_api_list))
                            <li class="swiper-slide" game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('MG')">MG電子</li>
                                    @endif
                                @if(in_array('PT', $_api_list))
                                    <li class="swiper-slide" game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('MG')">PT電子</li>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <li class="swiper-slide" game-box="sa" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('PT')">PT電子</li>
                                @endif
                                @if(in_array('DT', $_api_list))
                                    <li class="swiper-slide" game-box="dt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('DT')">DT電子</li>
                                @endif
                                @if(in_array('PNG', $_api_list))
                                    <li class="swiper-slide" game-box="png" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('PNG')">PNG電子</li>
                                @endif
                                @if(in_array('MW', $_api_list))
                                    <li class="swiper-slide" game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('MW')">MW電子</li>
                                @endif
                                @if(in_array('SW', $_api_list))
                                    <li class="swiper-slide" game-box="sw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('SW')">MW電子</li>
                                @endif
                                @if(in_array('PP', $_api_list))
                                    <li class="swiper-slide" game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('PP')">MW電子</li>
                                @endif
                                @if(in_array('PG', $_api_list))
                                    <li class="swiper-slide" game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('PG')">PG電子</li>
                                @endif
                                @if(in_array('GG', $_api_list))
                                    <li class="swiper-slide" game-box="gg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GG&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('GG')">GG電子</li>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <li class="swiper-slide" game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('JDB')">JDB電子</li>
                                @endif
                                @if(in_array('HB', $_api_list))
                                <li class="swiper-slide" game-box="hb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('HB')">HB電子</li>
                                @endif
                                @if(in_array('ISB', $_api_list))
                                    <li class="swiper-slide" game-box="isb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('ISB')">ISB電子</li>
                                @endif
                                @if(in_array('SG', $_api_list))
                                    <li class="swiper-slide" game-box="isb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" onmouseover="getSliderGame('SG')">SG電子</li>
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="slot-bottom">
                <div class="wrapper">
                    <ul class="game-list" id="sliderGame">

                    </ul>
                    <div class="jackpot">100,000,0<i id="jackpot1">00</i>.<i id="jackpot2">00</i></div>
                    <div class="winner">
                        <span>客户ID</span>
                        <span class="money">金额</span>
                        <span>游戏名称</span>
                        <div class="swiper-container winner-list clearboth swiper-container2">
                            <ul class="swiper-wrapper clearboth" id="winnerList"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="game-sec">

            <ul id="game-box">
                <li data-img="live">
                    <a href="{{ route('web.liveCasino') }}"></a>
                </li>
                <li data-img="slot">
                    <a href="{{ route('web.eGame') }}"></a>
                </li>
                <li data-img="sport">
                    <a href="{{ route('web.eGame') }}"></a>
                </li>
                <li data-img="lottery">
                    <a href="{{ route('web.lottory') }}"></a>
                </li>
            </ul>
        </section>
        <section class="app-sec">
            <div class="wrapper" id="ANDROIDdowns">
            </div>
        </section>
    </div>
    <!--首页弹框-->
    <div id="indexDialog" style="position:relative">
        <div id="popup-dialog" popup-dialog="" class="ui-dialog-content ui-widget-content" style="display: block; width: auto; height: 690px; max-height: none; height: auto;">
            <img src="" id="dialogImg">
            <div class="dialog-footer"></div>
        </div>
        <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
            <div class="ui-dialog-buttonset">
                <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" onclick="$('#indexDialog').dialog('close'); "><span class="ui-button-text">关闭</span></button>
            </div>
        </div>
    </div>
    <script>

        swiperLayout(".swiper-container1", 'auto', 1, 1, 2500000, true, 'horizontal', '.swiper-button-next', '.swiper-button-prev', 9);
        ///getSliderGame("");

        //getGamePlate(1, "index");
        winnerLists();
        biCommon.getDialogContent();
        var t1 = "";
        $(function () {
            var li = $("#game-list").children("li").get(0);
            var plat_type = $(li).attr('game-box').toUpperCase();
            getSliderGame(plat_type);
            clearInterval(t1);
            var t1 = setInterval(function () {
                $("#jackpot1").html(randomNumber());
                $("#jackpot2").html(randomNumber());
            },1500)
        });
    </script>


@endsection
