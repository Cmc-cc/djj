@extends('web.template.mb39.layouts.main')
@section('content')
    <link href="{{ asset('web/mb36/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb39/css/home.css') }}" rel="stylesheet" />
    <script src="{{ asset('web/mb36/js/swiper.min.js') }}"></script>
    <style>
        .swiper-container-free-mode > .swiper-wrapper {
            -webkit-transition-timing-function: linear;
            -o-transition-timing-function: linear;
            transition-timing-function: linear;
            margin: 0 auto
        }
    </style>
    <div id="content">
        <div class="wrapper">

            <div id="home">
                <ul class="home-nav">
                    <li class="reg">
                        <a href="{{ route('web.register_one') }}"></a>
                    </li>
                    <li class="net">
                        <a href="{{ route('web.catchFish')}}"></a>
                    </li>
                    <li class="agent">
                        <a target="_blank" href="{{ route('web.poker') }}"></a>
                    </li>
                    <li class="promotion">
                        <a href="{{ route('web.activityList') }}"></a>
                    </li>
                </ul>
                <div class="winner ng-scope clearboth">
                    <div style="height:20px;width:100%"></div>
                    <div class="swiper-container list-area clearboth swiper-container2">
                        <ul class="swiper-wrapper cycle-slideshow clearboth" id="winnerList"></ul>
                    </div>
                </div>
                <div class="bonus">
                    <ul id="bonus"></ul>
                </div>
                <div class="slot-machine cycle-slideshow ng-scope swiper-container swiper-container1"  style="height: 226px;" id="home-info">
                    <div class="cycle-carousel-wrap swiper-wrapper">
                        <ul class="slot cycle-slide swiper-slide" id="mgIndex"></ul>
                        <ul class="slot cycle-slide swiper-slide" id="ptIndex"></ul>
                        <ul class="slot cycle-slide swiper-slide" id="cqIndex"></ul>
                        <ul class="slot cycle-slide swiper-slide" id="bbIndex"></ul>
                        <ul class="slot cycle-slide swiper-slide" id="agIndex"></ul>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <ul class="slot-btn">
                    <li class="mg">
                        <span></span>
                    </li>
                    <li class="pt">
                        <span></span>
                    </li>
                    <li class="cq9">
                        <span></span>
                    </li>
                    <li class="bbin">
                        <span></span>
                    </li>
                    <li class="ag">
                        <span></span>
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
    <!--首页弹框-->
    {{--<div id="indexDialog" style="position:relative">
        <div id="popup-dialog" popup-dialog="" class="ui-dialog-content ui-widget-content" style="display: block; width: auto; height: 690px; max-height: none; height: auto;">
            <img src="" id="dialogImg">
            <div class="dialog-footer"></div>
        </div>
        <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
            <div class="ui-dialog-buttonset">
                <button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" onclick="$('#indexDialog').dialog('close'); "><span class="ui-button-text">关闭</span></button>
            </div>
        </div>
    </div>--}}
    <script>
        winnerLists();//中奖玩家
        getSliderGame();
        var t1 = "";
        //biCommon.getDialogContent();
        $(function () {
            clearInterval(t1);
            jackpotLists();//累计奖池
            var swiper1 = new Swiper('.swiper-container1', {
                direction: 'vertical',
                slidesPerView: "auto",
                spaceBetween: 0,
                observer: true,
                observerParent: true,
                slidesPerGroup: 1,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false
                },
                on: {
                    slideChangeTransitionStart: function () {
                        $(".slot-btn li").removeClass("cycle-pager-active");
                        $(".slot-btn li").eq(this.realIndex).addClass("cycle-pager-active")
                    }
                }
            });
            $(".slot-btn li").click(function () {
                $(".slot-btn li").removeClass("cycle-pager-active");
                $(".slot-btn li").eq($(this).index()).addClass("cycle-pager-active")
                swiper1.slideToLoop($(this).index(), 1000, false);//切换到第一个slide，速度为1秒
            })
            var swiper2 = new Swiper('.swiper-container2', {
                freeMode: true,
                autoplay: {
                    delay: 0
                },
                direction: 'vertical',
                slidesPerView: 8,
                loop: true,
                observer: true,
                observeParents: true,
            });
        })
    </script>


@endsection
