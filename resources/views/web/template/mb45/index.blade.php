@extends('web.template.mb45.layouts.main')
@section('content')
    <link href="{{ asset('web/mb36/css/swiper.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb36/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/mb45/css/home.css') }}" rel="stylesheet" />
    <style>
    </style>
    <div class="RBPage-home">
        <main class="ant-layout-content" style="padding-top:95px">
            <div class="RBHomeBanner" style="position:relative">
                <div class="RBPage-home">
                    <div class="RBHomeBanner" style="position: relative; cursor: pointer;">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($banners as $item)
                                <div class="swiper-slide">
                                    <img src="{{ $item -> path }}" width="100%" height="100%" style="display: inherit;">
                                </div>
                                    @endforeach
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ant-row HomeContentDown" id="news">
                <span>公告：</span>
                <div id="hot-news" class="swiper-container notice-swiper clearboth">
                    <marquee class="swiper-wrapper" id="noticeSiper">
                        @foreach($_system_notices as $v)
                            ~{{ $v->title }}~
                            {{ $v->content }}
                        @endforeach
                    </marquee>
                </div>
            </div>
            <div class="Home-sports-content">
                <h1 style="padding:25px 0 0"><i class="icon iconfont icon-icon_lib_soccer" style="vertical-align:middle;font-size:35px"></i> 體育博彩</h1>
                <div class="ant-row" id="home-sport">
                    <div class="ant-col ant-col-4 sports-left" id="sport-list">

                    </div>
                    <div class="ant-col ant-col-9 sports-center">
                        <div class="CenterSET">
                            <div style="text-align: center;">
                                <img src="" id="index-sportimg">
                            </div>
                            <p class="BTI-TEXT" id="index-sport-text"></p>
                            <button type="button" class="ant-btn" id="sport-btn" onclick="window.location.href ='{{ route('web.esports') }}'"><span>立即游戏</span></button>
                        </div>
                    </div>
                    <div class="ant-col ant-col-11 sports-right">
                        <div class="animated fadeInRight" id="index-sportbigimg"></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="ant-row HomeProductadvantages" style="background: rgb(216, 252, 242); padding: 0px 79px;">
                    <div class="ant-col ant-col-6">
                        <div>
                            <a>
                                <div class="HometextContent" style="cursor: pointer;">
                                    <div class="ant-card ant-card-bordered" style="width: 100%;">
                                        <div class="ant-card-body">
                                            <div class="ant-card-meta">
                                                <div class="ant-card-meta-avatar">
                                                    <i class="icon iconfont icon-icon_lib_soccer"></i>
                                                </div>
                                                <div class="ant-card-meta-detail">
                                                    <div class="ant-card-meta-title">首存 棋牌 50% 红利</div>
                                                    <div class="ant-card-meta-description">最高 800 元</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="ant-col ant-col-6">
                        <div>
                            <a>
                                <div class="HometextContent" style="cursor: pointer;">
                                    <div class="ant-card ant-card-bordered" style="width: 100%;">
                                        <div class="ant-card-body">
                                            <div class="ant-card-meta">
                                                <div class="ant-card-meta-avatar">
                                                    <i class="icon iconfont icon-icon_lib_soccer"></i>
                                                </div>
                                                <div class="ant-card-meta-detail">
                                                    <div class="ant-card-meta-title">再存 最狂棋牌优惠</div>
                                                    <div class="ant-card-meta-description">再存 5000％ 红利，只要 1 元投注</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="ant-col ant-col-6">
                        <div>
                            <a>
                                <div class="HometextContent" style="cursor: pointer;">
                                    <div class="ant-card ant-card-bordered" style="width: 100%;">
                                        <div class="ant-card-body">
                                            <div class="ant-card-meta">
                                                <div class="ant-card-meta-avatar">
                                                    <i class="icon iconfont icon-icon_lib_soccer"></i>
                                                </div>
                                                <div class="ant-card-meta-detail">
                                                    <div class="ant-card-meta-title">首存 BTi 體育</div>
                                                    <div class="ant-card-meta-description">100% 红利</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="ant-col ant-col-6">
                        <div>
                            <a>
                                <div class="HometextContent" style="cursor: pointer;">
                                    <div class="ant-card ant-card-bordered" style="width: 100%;">
                                        <div class="ant-card-body">
                                            <div class="ant-card-meta">
                                                <div class="ant-card-meta-avatar">
                                                    <i class="icon iconfont icon-icon_lib_soccer"></i>
                                                </div>
                                                <div class="ant-card-meta-detail">
                                                    <div class="ant-card-meta-title">首存 IM 體育 </div>
                                                    <div class="ant-card-meta-description">100% 红利</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Slot-Content" style="position:relative">
                <div class="ant-breadcrumb" style="height:70px">
                    <span><span class="ant-breadcrumb-link" style="font-size:30px;color:#A14C0C"><i class="icon iconfont icon-icon_lib_Slots" style="font-size:35px"></i>老虎机</span><span class="ant-breadcrumb-separator">/</span></span>
                </div>
                <div class="ant-row">
                    <div class="ant-col ant-col-4 Slot-left" id="game-list">

                    </div>
                    <div id="home-info">
                        <div class="ant-col ant-col-9 Slot-center">
                            <div class="CenterSET">
                                <div style="text-align:center">
                                    <img id="index-gameimg" src="" />

                                </div>
                                <p class="BTI-TEXT" id="index-gametext"></p>
                                <button type="button" class="ant-btn" onclick="window.location.href='{{ route('web.eGame') }}'"><span>立即游戏</span></button>
                            </div>
                        </div>
                        <div class="ant-col ant-col-11 Slot-right BBIN" id="index-gamebigimg"></div>
                    </div>
                </div>
            </div>
            <div style="padding:0 100px;background:white" class="RB88ServerBest">
                <div class="ant-breadcrumb" style="margin:0 0 20px">
                <span>
                    <span class="ant-breadcrumb-link">
                        <div class="server-top-icon"></div>服务优势
                    </span><span class="ant-breadcrumb-separator">/</span>
                </span>
                </div>
                <div class="ant-row HomeServiceadvantage">
                    <div class="ant-col ant-col-6">
                        <div class="circle_process">
                            <div class="Ball-content">
                                <h2>充值平均时间</h2>
                                <p>18秒</p>
                            </div>
                            <svg id="svg" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dashoffset="0"></circle>
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="345" stroke-dashoffset="0" id="bar" style="stroke-dashoffset:-380px"></circle>
                            </svg>
                        </div>
                        <div class="Ball-line"></div>
                    </div>
                    <div class="ant-col ant-col-6">
                        <div class="circle_process">
                            <div class="Ball-content">
                                <h2>结算平均时间</h2>
                                <p>38秒</p>
                            </div>
                            <svg id="svg" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dashoffset="0"></circle>
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="345" stroke-dashoffset="0" id="bar" style="stroke-dashoffset:-450px"></circle>
                            </svg>
                        </div>
                        <div class="Ball-line"></div>
                    </div>
                    <div class="ant-col ant-col-6">
                        <div class="circle_process">
                            <div class="Ball-content">
                                <h2>取款平均时间</h2>
                                <p>186秒</p>
                            </div>
                            <svg id="svg" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dashoffset="0"></circle>
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="345" stroke-dashoffset="0" id="bar" style="stroke-dashoffset:150px"></circle>
                            </svg>
                        </div>
                        <div class="Ball-line"></div>
                    </div>
                    <div class="ant-col ant-col-6">
                        <div class="circle_process">
                            <div class="Ball-content">
                                <h2>优惠平均时间</h2>
                                <p>158秒</p>
                            </div>
                            <svg id="svg" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dashoffset="0"></circle>
                                <circle r="45" cx="50" cy="50" fill="transparent" stroke-dasharray="345" stroke-dashoffset="0" id="bar" style="stroke-dashoffset:200px"></circle>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ant-row HomeRechargeBank">
                <div class="ant-col ant-col-24 BGFather">
                    <div class="Bank-title">
                        <h1>充值提款方式 - 安全稳固为您保驾护航</h1>
                        <p>支持国内各主流银行，全天候为玩家提供安全便捷的充值提款服务。</p>
                        <div class="Bank-list"></div>
                    </div>
                </div>
                <div class="Football-bg"></div>
            </div>
        </main>

    </div>
    {{--<div class="FloatingWindow" id="IndexFloat" style="display:block">
        <span class="close" onclick="closeLeft(this)">X</span>
        <div class="Floating-image" onclick="return landingboard(this);"></div>
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
    <script src="{{ asset('web/mb36/js/swiper.min.js') }}"></script>
    <!-- Initialize Swiper -->
    <script>
        // getGamePlate(1, "index");
        // biCommon.getNotices("#noticeSiper");
        var swipers = new Swiper('.swiper-container', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
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
    </script>

@endsection
