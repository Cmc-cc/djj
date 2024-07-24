@extends('web.template.mb36.layouts.main')
@section('content')
<link href="/web/mb36/css/swiper.min.css" rel="stylesheet" />
<link href="/web/mb36/css/home.css?v=1599540871108" rel="stylesheet" />
<script src="/web/mb36/js/swiper.min.js"></script>
<div id="content">
    <div class="wrapper">

        <div id="home">

            <section id="slide-banner">
                <div id="imgNames">
                    <img src="{{ asset('web/mb36/images/01.png') }}" />
                </div>
                <div id="ad-pager">
                    <strong>
                        <a href=""></a>
                    </strong>
                </div>
            </section>

            <ul id="game-box">
                <li data-img="slot">
                    <a href="{{ route('web.eGame') }}"></a>
                </li>
                <li data-img="live">
                    <a href="{{ route('web.liveCasino') }}"></a>
                </li>
                <li data-img="sport">
                    <a href="{{ route('web.esports') }}"></a>
                </li>
                <li data-img="lottery">
                    <a href="{{ route('web.lottory') }}"></a>
                </li>
            </ul>
            <div id="home-info">
                <div class="slider-left">
                    <a href="{{ route('web.eGame') }}" class="title">热门電子游艺</a>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                    <div class="main-cell swiper-container">
                        <ul class="game-list swiper-wrapper" id="game-list">
                            @if(in_array('AG', $_api_list))
                            <li class="swiper-slide" game-box="ag"><a href="javascript:;"
                                                                      onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"
                                                                      onmouseover="getSliderGame('AG')">AG電子</a>
                            </li>
                            @endif
                                @if(in_array('MG', $_api_list))
                            <li class="swiper-slide" game-box="mg"><a href="javascript:;"
                                                                      onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"
                                                                      onmouseover="getSliderGame('MG')">MG電子</a>
                            </li>
                                    @endif
                                @if(in_array('PT', $_api_list))
                                    <li class="swiper-slide" game-box="PT"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('PT')">PT電子</a>
                                    </li>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <li class="swiper-slide" game-box="SA"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('SA')">SA電子</a>
                                    </li>
                                @endif
                                @if(in_array('DT', $_api_list))
                                    <li class="swiper-slide" game-box="DT"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('DT')">DT電子</a>
                                    </li>
                                @endif
                                @if(in_array('PNG', $_api_list))
                                    <li class="swiper-slide" game-box="PNG"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('PNG')">PNG電子</a>
                                    </li>
                                @endif
                                @if(in_array('MW', $_api_list))
                                    <li class="swiper-slide" game-box="MW"><a href="javascript:;"
                                                                               onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"
                                                                               onmouseover="getSliderGame('MW')">MW電子</a>
                                    </li>
                                @endif
                                @if(in_array('SW', $_api_list))
                                    <li class="swiper-slide" game-box="SW"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('SW')">SW電子</a>
                                    </li>
                                @endif
                                @if(in_array('PP', $_api_list))
                                    <li class="swiper-slide" game-box="PP"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('PP')">PP電子</a>
                                    </li>
                                @endif
                                @if(in_array('PG', $_api_list))
                                    <li class="swiper-slide" game-box="PG"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('PG')">PP電子</a>
                                    </li>
                                @endif
                                @if(in_array('JDB', $_api_list))
                                    <li class="swiper-slide" game-box="JDB"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('JDB')">JDB電子</a>
                                    </li>
                                @endif
                                @if(in_array('HB', $_api_list))
                                    <li class="swiper-slide" game-box="HB"><a href="javascript:;"
                                                                               onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"
                                                                               onmouseover="getSliderGame('HB')">HB電子</a>
                                    </li>
                                @endif
                                @if(in_array('ISB', $_api_list))
                                    <li class="swiper-slide" game-box="HB"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('ISB')">ISB電子</a>
                                    </li>
                                @endif
                                @if(in_array('SG', $_api_list))
                                    <li class="swiper-slide" game-box="SG"><a href="javascript:;"
                                                                              onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"
                                                                              onmouseover="getSliderGame('SG')">SG電子</a>
                                    </li>
                                @endif
                        </ul>
                    </div>
                </div>
                <div class="slot-box" id="sliderGame">
                </div>

            </div>
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
<script>

    swiperLayout(".swiper-container", 6, 4, 1, 2500000, false, 'horizontal', '.swiper-button-next', '.swiper-button-prev');
    //getSliderGame("");

    //getGamePlate(1, "index");
    //biCommon.getDialogContent();
    $(function () {
        var li = $("#game-list").children("li").get(0);
        var plat_type = $(li).attr('game-box').toUpperCase();
        getSliderGame(plat_type);

    })
</script>
@endsection


