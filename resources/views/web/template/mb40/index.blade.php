@extends('web.template.mb40.layouts.main')
@section('content')
    <link href="{{ asset('web/mb36/css/swiper.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('web/mb36/js/swiper.min.js') }}"></script>
    <link href="{{ asset('web/mb40/css/home.css') }}" rel="stylesheet" />
    <style>
        /*.game-item ul{
        display:none;
        }
        .jackpotList span{
            display: none;
        }*/

    </style>
    <div id="banner" >
        <div class="swiper-container">
            <div  class="swiper-wrapper">

                @foreach($banners as $item)
                <div class="swiper-slide"><img src="{{ $item -> path }}" /></div>
                    @endforeach
            </div>
        </div>
    </div>
    <div id="content">
        <div class="wrapper">
        </div>
        <div id="hot-game">
            <div class="wrapper" >
                <div id="jackpotList">
                    <span class="jackpot" digital digital-min="9203575" jackpot="gg">10</span>
                    <span class="jackpot bb" digital digital-min="10133776" jackpot="bb">5646464</span>
                    <span class="jackpot ag" digital digital-min="10191335" jackpot="ag">6876</span>
                    <span class="jackpot mg" digital digital-min="10221425" jackpot="mg">65464</span>
                </div>
{{--                @*<span  class="jackpot sg" digital digital-min="10256126" jackpot="bb"></span>*@--}}
                <div class="slide-game">
                    <span class="prev"></span>
                    <span class="next"></span>
                    <div class="main-cell swiper-container"  >
                        <ul class="game-list swiper-wrapper" id="ul">
                            @if(in_array('AG', $_api_list))
                                <li class="swiper-slide" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('AG')">AG電子
                                </li>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <li class="swiper-slide" game-box="mg"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('MG')">MG電子
                                </li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li class="swiper-slide" game-box="pt"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('PT')">PT電子
                                </li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li class="swiper-slide" game-box="sa"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('SA')">SA電子
                                </li>
                            @endif
                            @if(in_array('DT', $_api_list))
                                <li class="swiper-slide" game-box="dt"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('DT')">DT電子
                                </li>
                            @endif
                            @if(in_array('PNG', $_api_list))
                                <li class="swiper-slide" game-box="png"
                                                                           onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"
                                                                           onmouseover="getSliderGame('PNG')">PNG電子
                                </li>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <li class="swiper-slide" game-box="mw"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('MW')">MW電子
                                </li>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <li class="swiper-slide" game-box="sw"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('SW')">SW電子
                                </li>
                            @endif
                            @if(in_array('PP', $_api_list))
                                <li class="swiper-slide" game-box="pp"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('PP')">PP電子
                                </li>
                            @endif
                            @if(in_array('PG', $_api_list))
                                <li class="swiper-slide" game-box="pg"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('PG')">PP電子
                                </li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="swiper-slide" game-box="jdb"
                                                                           onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"
                                                                           onmouseover="getSliderGame('JDB')">JDB電子
                                </li>
                            @endif
                            @if(in_array('HB', $_api_list))
                                <li class="swiper-slide" game-box="hb"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('HB')">HB電子
                                </li>
                            @endif
                            @if(in_array('ISB', $_api_list))
                                <li class="swiper-slide" game-box="isb"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('ISB')">ISB電子
                                </li>
                            @endif
                            @if(in_array('SG', $_api_list))
                                <li class="swiper-slide" game-box="sg"
                                                                          onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"
                                                                          onmouseover="getSliderGame('SG')">SG電子
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="game-item" id="sliderGame"></div>
                <div class="slide-img swiper-container2">
                    <ul class="slide swiper-wrapper">
                        <li class="swiper-slide"><img src="{{ asset('web/mb40/images/slide_05.jpg') }}" /></li>
                        <li class="swiper-slide"><img src="{{ asset('web/mb40/images/slide_05.jpg') }}" /></li>
                        <li class="swiper-slide"><img src="{{ asset('web/mb40/images/slide_05.jpg') }}" /></li>
                        <li class="swiper-slide"><img src="{{ asset('web/mb40/images/slide_05.jpg') }}" /></li>
                        <li class="swiper-slide"><img src="{{ asset('web/mb40/images/slide_05.jpg') }}" /></li>
                        <li class="swiper-slide"><img src="{{ asset('web/mb40/images/slide_05.jpg') }}" /></li>
                    </ul>
                    <ul class="pager"></ul>
                </div>
                <div  id="briefIntroduction"></div>
                <div class="winner clearboth">
                    <span class="name">客户ID</span>
                    <span class="money">金额</span>
                    <span class="game">游戏名称</span>
                    <span class="name">客户ID</span>
                    <span class="money">金额</span>
                    <span class="game">游戏名称</span>
                    <div class="main-cell swiper-container1 clearboth" style="height:45px;overflow:hidden" >
                        <ul class="swiper-wrapper clearboth" id="winnerList"></ul>
                    </div>
                </div>
            </div>
        </div>
        <ul id="game-box">
            <li data-img="live"><a href="{{ route('web.liveCasino') }}"></a></li>
            <li data-img="lottery"><a href="{{ route('web.lottory') }}"></a></li>
            <li data-img="sport"><a href="{{ route('web.esports') }}"></a></li>
        </ul>
        <div class="about-area"></div>
        <div class="mobile-area"><a href="#" target="_blank"></a></div>
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

    <script>
        swiperLayout(".swiper-container", "auto", 0, 1, 2500, true, 'horizontal', '.next', '.prev');

        indexOver();
        //$("#ul").eq(2).addClass("active");


        //getGamePlate(1, "index");
        //biCommon.getDialogContent();
        $(function () {
            var li = $("#ul").children("li").get(0);
            var plat_type = $(li).attr('game-box');
            $("#ul li[game-box='"+ plat_type +"']").addClass("active");
            getSliderGame(plat_type.toUpperCase());
            briefIntroduction(plat_type.toUpperCase());
            winnerLists();
            $(".jackpot").text("176,362,1" + randomNumber());
            $("#jackpotList span").hide();
            $("#jackpotList span").eq(3).show();
            var swiper = new Swiper('.swiper-container2', {
                slidesPerView: "auto",
                spaceBetween: 0,
                slidesPerGroup: 1,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
            var swiper1 = new Swiper('.swiper-container1', {
                direction: 'vertical',
                slidesPerView: '3',
                loop: true,
                observer: true,
                observeParents: true,
                autoplay: {
                    delay: 500,
                    disableOnInteraction: false
                },
            });

        });

    </script>


@endsection
