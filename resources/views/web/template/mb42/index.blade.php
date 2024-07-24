@extends('web.template.mb42.layouts.main')
@section('content')
<link href="{{ asset('web/mb42/css/home.css') }}" rel="stylesheet" />
<div id="banner" class="swiper-container swiper1">
    <div class="swiper-wrapper">
        @foreach($banners as $item)
            <div class="swiper-slide"><img src="{{ $item -> path }}" /></div>
        @endforeach
    </div>
</div>
<div id="news">
    <div class="wrapper">
        <div id="hot-news"><marquee onMouseOut="this.start()" onMouseOver="this.stop()" scrollamount="4">
                @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                @endforeach
            </marquee></div>
    </div>
</div>
<div id="content">
    <div class="wrapper">

        <div id="home">


            <section class="money">
                <span digital digital-min="84252992" id="money"></span>
            </section>

            <section class="slot-games" >
                <div class="slider-left" carousel-slider super-vis="8" >
                    <span class="prev"></span>
                    <span class="next"></span>
                    <div class="main-cell swiper-container swiper2" >
                        <ul id="slot-pager" class="swiper-wrapper clearboth">
                            @if(in_array('AG', $_api_list))
                                <li class="swiper-slide" game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('MG', $_api_list))
                                <li class="swiper-slide" game-box="mg"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('PT', $_api_list))
                                <li class="swiper-slide" game-box="pt"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('SA', $_api_list))
                                <li class="swiper-slide" game-box="sa"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('DT', $_api_list))
                                <li class="swiper-slide" game-box="dt"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2','','width=1024,height=768')">
                                </li>
                            @endif
                            @if(in_array('PNG', $_api_list))
                                <li class="swiper-slide" game-box="png"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('MW', $_api_list))
                                <li class="swiper-slide" game-box="mw"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('SW', $_api_list))
                                <li class="swiper-slide" game-box="sw"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('PP', $_api_list))
                                <li class="swiper-slide" game-box="pp"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('PG', $_api_list))
                                <li class="swiper-slide" game-box="pg"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('JDB', $_api_list))
                                <li class="swiper-slide" game-box="jdb"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('HB', $_api_list))
                                <li class="swiper-slide" game-box="hb"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('ISB', $_api_list))
                                <li class="swiper-slide" game-box="isb"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')"><span></span>
                                </li>
                            @endif
                            @if(in_array('SG', $_api_list))
                                <li class="swiper-slide" game-box="sg"
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="right-area">
                    <div class="th">
                        <span>客户ID</span> <span>金额</span> <span>游戏名称</span>
                    </div>
                    <div class="winners swiper-container swiper3" >
                        <ul class="swiper-wrapper cycle-slideshow" id="winnerList"></ul>
                    </div>
                </div>
                <div class="game-list" id="sliderGame"> </div>
            </section>

            <ul class="links">
                <li class="slot">
                    <div class="pic"></div>
                    <a class="text" href="{{ route('web.eGame') }}">
                    <h3>電子游戏</h3>
                    <h4>高额奖池！</h4>
                    <p>体验上万款游戏带来的刺激Starburst,Millionaire,Genie,Snack Time...</p>
                    <div class="enter">立即玩游戏</div>
                    </a>
                </li>
                <li class="live">
                    <div class="pic"></div>
                    <a class="text" href="{{ route('web.liveCasino') }}">
                    <h3>真人荷官</h3>
                    <h4>美女主播！</h4>
                    <p>享受专业赌场荷官带给您的真正的极限体验</p>
                    <div class="enter">立即玩游戏</div>
                    </a>
                </li>
                <li class="sport">
                    <div class="pic"></div>
                    <a class="text" href="{{ route('web.esports') }}">
                    <h3>运动</h3>
                    <h4>独具特色！</h4>
                    <p>畅玩实时下注、足球、赛马以及更多游戏</p>
                    <div class="enter">立即玩游戏</div>
                    </a>
                </li>
                {{--@*<li class="fish" >
                    <div class="pic"></div>
                    <a class="text" href="javascript:void(0)" onclick="slotOpen('/Web8/Index/GameSlot?id=fish')">
                        <h3>捕魚达人</h3>
                        <h4>高额奖金！</h4>
                        <p>千炮捕魚奖金高达400倍，多样技能、丰富玩法</p>
                        <div class="enter">立即玩游戏</div>
                    </a>
                </li>*@--}}
                <li class="lottery">
                    <div class="pic"></div>
                    <a class="text" href="{{ route('web.lottory') }}">
                    <h3>彩票</h3>
                    <h4>多种玩法！</h4>
                    <p>六合经典，全新进化，官方同步派彩迅速！</p>
                    <div class="enter">立即玩游戏</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
{{--@* 首页弹框 *@
<div id="indexDialog" style="position:relative;  overflow-x: hidden; overflow-y: hidden;">

    <div id="popup-dialog" popup-dialog="" class="ui-dialog-content ui-widget-content" style="display: block; width: auto; min-height: 113px; max-height: none; height: auto;">
        <img src="" id="dialogImg" />
        <div class="dialog-footer">
            （天天免费旋转、百万大奖免费送）上万款游戏丰厚彩金等您来拿，详情查看 <a style="color:#f00;text-decoration:none;" href="@Url.Action("Promotion", "Index")" target="_blank">（优惠活动）</a>
        </div>
    </div><div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
        <div class="ui-dialog-buttonset">
            <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button">
                <span class="ui-button-text" onclick="$('#indexDialog').dialog('close')">关闭</span>
            </button>
        </div>
    </div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
    <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;">
    </div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;">
    </div>
</div>--}}
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
    //biCommon.getDialogContent();
    var m = 84252992;

    $("#money").text(parseFloat(Number(m) + Number(randomNumber(999))).toLocaleString())
    setInterval(function () {
        $("#money").text(parseFloat(Number(m) + Number(randomNumber(999))).toLocaleString())
        m = $("#money").text().replace(/,/g, '');
    }, 3000)
    $(function () {
        swiperLayout(".swiper2", "auto", 4, 1, 2500, true, 'horizontal', '.next', '.prev');
        var li = $('#slot-pager').children("li").get(1);
        var plat_type = $(li).attr('game-box');

        getSliderGame(plat_type.toUpperCase());
        $("#slot-pager li[game-box='"+plat_type+"']").addClass("active");
        indexOver();
        winnerLists(1);
        swiperLayout(".swiper3", "auto", 4, 1, 2500, true, 'vertical', '.next', '.prev');

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
        $("#indexDialog").dialog({
            autoOpen: false,//如果设置为true，则默认页面加载完毕后，就自动弹出对话框；相反则处理hidden状态。
            bgiframe: true, //解决ie6中遮罩层盖不住select的问题
            width:770,
            modal: false,//这个就是遮罩效果
        });

    });
</script>
    @endsection

