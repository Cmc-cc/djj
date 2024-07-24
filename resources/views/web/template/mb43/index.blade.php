@extends('web.template.mb43.layouts.main')
@section('content')
<link href="{{ asset('web/mb43/css/home.css') }}" rel="stylesheet" />
<div class="spacer"></div>

<div id="banner" class="swiper-container swiper1">
    <div class="swiper-wrapper">
        @foreach($banners as $item)
            <div class="swiper-slide"><img src="{{ $item -> path }}" /></div>
        @endforeach
    </div>

</div>
<div id="news">
    <div class="wrapper">
        <div id="hot-news">
            <marquee onMouseOut="this.start()" onMouseOver="this.stop()" scrollamount="4">
                @foreach($_system_notices as $v)
                    <span>~{{ $v->title }}~</span>
                    <span>{{ $v->content }}</span>
                @endforeach
            </marquee>
        </div>
    </div>
</div>
<div id="content">
    <div class="wrapper">

        <div id="home">
            <div class="slot-game">
                <div class="slot-slide ">
                    <span class="prev"></span>
                    <span class="next"></span>
                    <div class="main-cell swiper-container swiper2">
                        <ul class="slot-nav swiper-wrapper clearboth" id="slot-pager">
                            @if(in_array('AG', $_api_list))
                                <li class="swiper-slide" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                                    AG電子
                                </li>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <li class="swiper-slide" game-box="mg"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">MG電子
                                </li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li class="swiper-slide" game-box="pt"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">PT電子
                                </li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li class="swiper-slide" game-box="sa"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=2','','width=1024,height=768')">SA電子
                                </li>
                            @endif
                            @if(in_array('DT', $_api_list))
                                <li class="swiper-slide" game-box="dt"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2','','width=1024,height=768')">DT電子
                                </li>
                            @endif
                            @if(in_array('PNG', $_api_list))
                                <li class="swiper-slide" game-box="png"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">PNG電子
                                </li>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <li class="swiper-slide" game-box="mw"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">MW電子
                                </li>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <li class="swiper-slide" game-box="sw"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=2','','width=1024,height=768')">SW電子
                                </li>
                            @endif
                            @if(in_array('PP', $_api_list))
                                <li class="swiper-slide" game-box="pp"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">PP電子
                                </li>
                            @endif
                            @if(in_array('PG', $_api_list))
                                <li class="swiper-slide" game-box="pg"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">PG電子
                                </li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="swiper-slide" game-box="jdb"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">JDB電子
                                </li>
                            @endif
                            @if(in_array('HB', $_api_list))
                                <li class="swiper-slide" game-box="hb"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">HB電子
                                </li>
                            @endif
                            @if(in_array('ISB', $_api_list))
                                <li class="swiper-slide" game-box="isb"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">ISB電子
                                </li>
                            @endif
                            @if(in_array('SG', $_api_list))
                                <li class="swiper-slide" game-box="sg"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">SG電子
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="winner">
                    <div class="jackpot" digital digital-min="381084682" add time="1000" id="money">1000000</div>
                    <div class="swiper-container swiper4" style="height:186px;">
                        <ul class="jackpot-wrapper swiper-wrapper" id="game_clearboth">
                                <li class="swiper-slide" game-box="ag"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="mg"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="pt"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="sa"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="dt"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="png"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="mw"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="sw"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="pp"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="pg"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="jdb"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="hb"><div class="money"><?php echo rand(5000,10000)?></div></li>
                                <li class="swiper-slide" game-box="isb"><div class="money"><?php echo rand(5000,10000)?></div></li>
                        </ul>
                    </div>


                </div>
                <div class="slot-list" id="sliderGame">
                </div>
            </div>


            <ul id="game-box">
                <li data-img="slot">
                    <a href="{{ route('web.eGame') }}">
                    <div class="text">
                        <div class="title">電子游戏</div>
                        <div class="sub-title">高额奖池！</div>
                        <p>体验上万款游戏带来的刺激Starburst,Millionaire,Genie,Snack Time...</p>
                        <div class="entry">立即游戏</div>
                    </div>
                    </a>
                </li>
                <li data-img="live">
                    <a href="{{ route('web.liveCasino') }}">
                    <div class="text">
                        <div class="title">真人荷官</div>
                        <div class="sub-title">高额奖池！</div>
                        <p>享受专业赌场荷官带给您的真正的极限体验</p>
                        <div class="entry">立即游戏</div>
                    </div>
                    </a>
                </li>
                <li data-img="sport">
                    <a href="{{ route('web.esports') }}">
                    <div class="text">
                        <div class="title">运动</div>
                        <div class="sub-title">高额奖池！</div>
                        <p>畅玩实时下注、足球、赛马以及更多游戏</p>
                        <div class="entry">立即游戏</div>
                    </div>
                    </a>
                </li>
                <li data-img="fish">
                    <a href="{{ route('web.catchFish') }}">
                        <div class="text">
                            <div class="title">捕魚达人</div>
                            <div class="sub-title">高额奖池！</div>
                            <p>千炮捕魚奖金高达400倍，多样技能、丰富玩法</p>
                            <div class="entry">立即游戏</div>
                        </div>
                    </a>
                </li>
                <li data-img="lottery">
                    <a href="{{ route('web.lottory') }}">
                    <div class="text">
                        <div class="title">彩票</div>
                        <div class="sub-title">高额奖池！</div>
                        <p>六合经典，全新进化，官方同步派彩迅速！</p>
                        <div class="entry">立即游戏</div>
                    </div>
                    </a>
                </li>
            </ul>
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
    //getGamePlate(1, "index");
    // biCommon.getDialogContent();
    var money = 378526542;
    $("#money").text(parseFloat(Number(money) + Number(randomNumber(999))).toLocaleString())
    setInterval(function () {
        $("#money").text(parseFloat(Number(money) + Number(randomNumber(999))).toLocaleString())
        $("#money").text().replace(/,/g, '');
    }, 1000)
    $(function () {
        swiperLayout(".swiper2", "auto", 4, 1, 2500, true, 'horizontal', '.next', '.prev');
        var li = $('#slot-pager').children("li").get(1);
        var plat_type = $(li).attr('game-box');

        getSliderGame(plat_type.toUpperCase());
        $("#slot-pager li[game-box='"+plat_type+"']").addClass("active");
        indexOver();
        winnerLists(1);
        swiperLayout(".swiper3", "auto", 4, 1, 2500, true, 'vertical', '.next', '.prev');

        swiperLayout(".swiper4", "auto", 4, 1, 2500, true, 'vertical', '.next1', '.prev1');
        setInterval(function () { addNumber(); }, 3000)

        var swiper = new Swiper(".swiper1", {
            direction: "horizontal",
            slidesPerView: "auto",
            spaceBetween: 4,
            slidesPerGroup: 1,
            observer: true,
            observerParent: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
        });

    });
</script>
<style>


@endsection

