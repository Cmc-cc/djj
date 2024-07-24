@extends('web.template.mb46.layouts.main')
@section('content')
    <link href="{{ asset('web/mb46/css/home.css') }}" rel="stylesheet" />

    <div data-v-b3e09c1e="" data-v-b09f0a36="">
        <div data-v-62a6580a="" data-v-b3e09c1e="" id="hom_body" class="hom_body">
            <div data-v-62a6580a="" class="home_background">
                <div data-v-62a6580a="" class="background1"></div>
                <div data-v-62a6580a="" class="background2"></div>
                <div data-v-62a6580a="" class="background3">
                    <img data-v-62a6580a="" src="{{ asset('web/mb46/images/suc.745484c.png') }}" alt="">
                </div>
            </div>
            <div data-v-62a6580a="" class="Pagebanner">
                <div data-v-62a6580a="" class="mu-carousel swiper-container banner-swiper">

                    <button tabindex="0" type="button" class="mu-button mu-icon-button  mu-carousel-button mu-carousel-button__left swiper-button-prev" style="user-select: none; outline: none; -webkit-appearance: none;">
                        <div class="mu-button-wrapper">
                            <div class="mu-ripple-wrapper"></div>
                            <svg viewBox="0 0 24 24" class="mu-carousel-svg-icon">
                                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                        </div>
                    </button>
                    <button tabindex="0" type="button" class="mu-button mu-icon-button  mu-carousel-button mu-carousel-button__right swiper-button-next" style="user-select: none; outline: none; -webkit-appearance: none;">
                        <div class="mu-button-wrapper">
                            <div class="mu-ripple-wrapper"></div>
                            <svg viewBox="0 0 24 24" class="mu-carousel-svg-icon">
                                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                        </div>
                    </button>

                    <div class="mu-carousel-indicators swiper-pagination banner-pagination">
                    </div>
                    <div class="swiper-wrapper" style="width:1354px;">
                        @foreach($banners as $item)
                        <div data-v-62a6580a="" class="mu-carousel-item swiper-slide" style="">
                            <div data-v-62a6580a="" class="backgrunodSwiper" style="background: rgb(13, 13, 13);">
                                <img data-v-62a6580a="" src="{{ $item -> path }}" alt=""  class="Bannerimg" style="cursor: pointer; left: -427px;">
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
            <div data-v-1105c7f8="" data-v-62a6580a="">
                <div data-v-83d52f84="" data-v-1105c7f8="" class="marquee">
                    <div data-v-83d52f84="" class="marqueeBorder"></div>
                    <div data-v-83d52f84="" class="banner">
                        <div data-v-83d52f84="" class="div">
                            <i data-v-83d52f84="" class="iconfont icon-laba"></i>
                            <span data-v-83d52f84="">公告信息</span>
                        </div>
                        <marquee data-v-83d52f84="" scrollamount="4" scrolldelay="60" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="cursor: pointer;">
                            @foreach($_system_notices as $v)
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            @endforeach
                        </marquee>
                        <div class="swiper-container notice-swiper clearboth">
                            <ul class="swiper-wrapper" id="noticeSiper" >

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div data-v-62a6580a="" class="menu">
                <ul data-v-62a6580a="">
                    <li data-v-62a6580a="" onclick="landingslocation('@Url.Action("Deposit", "Index")')">
                    <span data-v-62a6580a="" data-wow-delay="0s" class="wow rollIn animated animated" style="visibility: visible; animation-delay: 0s;">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/kscz2.975b8c1.png') }}" alt="">
                    </span>
                    <p data-v-62a6580a="">快速充值</p>
                    </li>
                    <li data-v-62a6580a="" onclick="window.location.href='@Url.Action("Promotion", "Index")?index=9'">
                    <span data-v-62a6580a="" data-wow-delay="0.2s" class="wow rollIn animated animated" style="visibility: visible; animation-delay: 0.2s;">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/kscz6.b419510.png') }}" alt="">
                    </span>
                    <p data-v-62a6580a="">优惠活动大厅</p>
                    </li>
                    <li data-v-62a6580a="" onclick="landingslocation('@Url.Action("Partner", "Index")')">
                    <span data-v-62a6580a="" data-wow-delay="0.4s" class="wow rollIn animated animated" style="visibility: visible; animation-delay: 0.4s;">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/kscz1.a01cf43.png') }}" alt="">
                    </span>
                    <p data-v-62a6580a="">代理申请</p>
                    </li>
                    <li data-v-62a6580a="" onclick="window.location.href='@Url.Action("Mobile", "Index")?index=8'">
                    <span data-v-62a6580a="" data-wow-delay="0.6000000000000001s" class="wow rollIn animated animated" style="visibility: visible; animation-delay: 0.6s;">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/kscz3.4822a09.png') }}" alt="">
                    </span>
                    <p data-v-62a6580a="">手机投注</p>
                    </li>
                    <li data-v-62a6580a="" onclick="window.location.href='@Url.Action("AboutUS", "Index")'">
                    <span data-v-62a6580a="" data-wow-delay="0.8s" class="wow rollIn animated animated" style="visibility: visible; animation-delay: 0.8s;">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/gywm.d2aa4d3.png') }}" alt="">
                    </span>
                    <p data-v-62a6580a="">关于我们</p>
                    </li>
                </ul>
            </div>

            <div data-v-62a6580a="" class="live">
                <div data-v-62a6580a="" class="liveHeader">
                    <p data-v-62a6580a="" class="liveP1 wow bounceInLeft animated animated" style="visibility: hidden; animation-name: none;">Live Casino</p>
                    <p data-v-62a6580a="" class="liveP2">
                        <a data-v-62a6580a="" href="#/live" class="">視訊</a>
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/live_bg.png') }}" alt="" class="wow lightSpeedIn animated animated" style="visibility: hidden; animation-name: none;">
                    </p>
                </div>
                <div data-v-62a6580a="" class="liveCenter">
                    <div data-v-62a6580a="" class="live_buttom live_buttom1 swiper-button-prev wow rollIn animated animated" style="visibility: visible;">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/prev_button.png') }}" alt="">
                    </div>
                    <div data-v-62a6580a="" class="live_buttom live_buttom2 swiper-button-next wow rollIn animated animated" style="visibility: visible;">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/next_button.png') }}" alt="">
                    </div>
                    <div data-v-62a6580a="" class="liveover swiper-container live-swiper">
                        <ul data-v-62a6580a="" id="live" class="liveUl liveAnm swiper-wrapper" style="width: 3600px;height: 500px;">

                            @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                            <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif>
                                <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                src=""
                                                                                alt="" class="liveImg1"><img
                                            data-v-62a6580a=""
                                            src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                            class="liveImg2"> <img data-v-62a6580a=""
                                                                   src=""
                                                                   alt="" class="liveImg3">
                                    <p data-v-62a6580a="" class="liveP4">AG視訊</p>
                                    <p data-v-62a6580a="" class="liveP5">Asia Gaming是世界上第一个预售6张牌，VIP私人房间，挤压、互动投标百家乐。</p>
                                    <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                </div>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">BBIN視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('BG', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">BG視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">专业的真人荷官博彩平台,最具公信力及最受玩家欢迎的大型博彩网站之一。</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('SUNBET', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">申博視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('ALLBET', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">欧博視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('LEBO', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEBO&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">欧博視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('SA', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">SA視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('GD', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">GD視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('OG', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">OG視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">专业的真人荷官博彩平台,最具公信力及最受玩家欢迎的大型博彩网站之一。</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('DG', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">DG視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">专业的真人荷官博彩平台,最具公信力及最受玩家欢迎的大型博彩网站之一。</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">MG視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">专业的真人荷官博彩平台,最具公信力及最受玩家欢迎的大型博彩网站之一。</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">PT視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">GPI視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('EBET', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EBET&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">EBET視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('SEXY', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SEXY&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">SEXY視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">Gold DeLuxe博彩平台是一个专业的真人荷官博彩平台。为用户提供个性化的游戏推荐</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                                @if(in_array('CQ9', $_api_list))
                                    <li data-v-62a6580a="" class="liveLi swiper-slide" game-box=""
                                        @if($_member)
                                        onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=1','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                            @endif>
                                        <div data-v-62a6580a="" class="liveLi_img"><img data-v-62a6580a=""
                                                                                        src=""
                                                                                        alt="" class="liveImg1"><img
                                                    data-v-62a6580a=""
                                                    src="{{ asset('web/mb46/images/borderImg.c192a16.png') }}" alt=""
                                                    class="liveImg2"> <img data-v-62a6580a=""
                                                                           src=""
                                                                           alt="" class="liveImg3">
                                            <p data-v-62a6580a="" class="liveP4">CQ9視訊</p>
                                            <p data-v-62a6580a="" class="liveP5">专业的真人荷官博彩平台,最具公信力及最受玩家欢迎的大型博彩网站之一。</p>
                                            <div data-v-62a6580a="" class="liveLi_onGame">进入游戏</div>
                                        </div>
                                    </li>
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div data-v-62a6580a="" class="egame_div ">
                <div data-v-62a6580a="" class="egameHeader">
                    <p data-v-62a6580a="" class="egameP1 wow bounceInLeft animated animated" style="visibility: hidden; animation-name: none;">Game Casino</p>
                    <p data-v-62a6580a="" class="egameP2">
                        <a data-v-62a6580a="" href="javascript:void(0);" class="">電子</a>
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/slotGame_bg.png') }}" alt="" class="wow slideInRight animated animated" style="visibility: hidden; animation-name: none;">
                    </p>
                </div>
                <div data-v-62a6580a="" class="egame_center wow bounceInUp bg-red animated animated" style="visibility: visible;">
                    <ul data-v-62a6580a="" class="egameUl" id="slot">
                        <?php
                        $slot = (new \App\Http\Controllers\Wap\AjaxController()) -> getGames('slot');
                        ?>
                            @foreach($slot as $k => $v )
                        <li data-v-62a6580a="" game-box=""  onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type={{ $v['plat_type'] }}&game_type={{ $v['game_type'] }}','','width=1024,height=768')" class="egameLi ">
                            <img data-v-62a6580a=""
                                 src="/web/mb46/images/game/{{$v['plat_type']}}.png"
                                  alt = "" class="egameImg1 egameImg2" >
                            <span>{{ $v['name'] }}</span>
                        </li>
                                @endforeach
                    </ul>
                </div>
            </div>
            <div data-v-62a6580a="" class="lottery_div ">
                <div data-v-62a6580a="" class="lotteryHeader">
                    <p data-v-62a6580a="" class="lotteryP1 wow slideInRight animated animated" style="visibility: hidden; animation-name: none;">Lottery Casino</p>
                    <p data-v-62a6580a="" class="lotteryP2 wow bounceInLeft animated animated" style="visibility: hidden; animation-name: none;">
                        <a data-v-62a6580a="" href="javascript:void(0);" class="">彩票</a>
                    </p>
                </div>
                <div data-v-62a6580a="" class="lottery_center">
                    <img data-v-62a6580a="" src="{{ asset('web/mb46/images/banneres.3d443f1.png') }}" alt="" class="lottery_banner">
                    <div data-v-62a6580a="" class="lotteryUlbotton swiper-pagination lottery-pagination">

                    </div>
                    <div data-v-62a6580a="" class="lotteryUlBorder swiper-container lottery-swiper">
                        <ul data-v-62a6580a="" class="lotteryUl lotteryAnm swiper-wrapper" style="" id="lottery">
                            @if(in_array('BBIN', $_api_list))
                            <li data-v-62a6580a=""  @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=3','','width=1024,height=768')"
                                @else onclick="Alert();"
                                @endif class="lotteryLi swiper-slide">
                                <img data-v-62a6580a="" src = "/web/mb46/images/lottery/bbin.jpg" alt = "" class="lotteryImg1" ><div data-v-62a6580a="" class="lotteryTitle">BBIN彩票</div>
                            </li>
                                @endif
                                @if(in_array('EG', $_api_list))
                                    <li data-v-62a6580a=""  @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EG&game_type=3','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif class="lotteryLi swiper-slide">
                                        <img data-v-62a6580a="" src = "/web/mb46/images/lottery/eg.jpg" alt = "" class="lotteryImg1" ><div data-v-62a6580a="" class="lotteryTitle">BG彩票</div>
                                    </li>
                                @endif
                                @if(in_array('IG', $_api_list))
                                    <li data-v-62a6580a=""  @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IG&game_type=3&game_code=gfcai','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif class="lotteryLi swiper-slide">
                                        <img data-v-62a6580a="" src = "/web/mb46/images/lottery/ig.jpg" alt = "" class="lotteryImg1" ><div data-v-62a6580a="" class="lotteryTitle">IG彩票</div>
                                    </li>
                                @endif
                                @if(in_array('BG', $_api_list))
                                    <li data-v-62a6580a=""  @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=3','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif class="lotteryLi swiper-slide">
                                        <img data-v-62a6580a="" src = "/web/mb46/images/lottery/bg.jpg" alt = "" class="lotteryImg1" ><div data-v-62a6580a="" class="lotteryTitle">BG彩票</div>
                                    </li>
                                @endif
                                @if(in_array('VR', $_api_list))
                                    <li data-v-62a6580a=""  @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VR&game_type=3','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif class="lotteryLi swiper-slide">
                                        <img data-v-62a6580a="" src = "/web/mb46/images/lottery/vr.jpg" alt = "" class="lotteryImg1" ><div data-v-62a6580a="" class="lotteryTitle">VR彩票</div>
                                    </li>
                                @endif
                                @if(in_array('SGL', $_api_list))
                                    <li data-v-62a6580a=""  @if($_member)
                                    onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SGL&game_type=3','','width=1024,height=768')"
                                        @else onclick="Alert();"
                                        @endif class="lotteryLi swiper-slide">
                                        <img data-v-62a6580a="" src = "/web/mb46/images/lottery/sgl.jpg" alt = "" class="lotteryImg1" ><div data-v-62a6580a="" class="lotteryTitle">SG双赢彩票</div>
                                    </li>
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div data-v-62a6580a="" class="sports_div">
                <div data-v-62a6580a="" class="sportsHeader">
                    <p data-v-62a6580a="" class="sportsP1 wow bounceInLeft animated animated" style="visibility: hidden; animation-name: none;">Sports Casino</p>
                    <p data-v-62a6580a="" class="sportsP2 wow slideInRight animated animated" style="visibility: hidden; animation-name: none;">
                        <a data-v-62a6580a="" href="javascript:void(0);" class="">體育</a>
                    </p>
                </div>
                <div data-v-62a6580a="" class="sports_center">
                    <div data-v-62a6580a="" class="sports_renwu">
                        <img data-v-62a6580a="" src="{{ asset('web/mb46/images/qiux.d984ad4.png') }}" alt="">
                    </div>
                    <div data-v-62a6580a="" class="sports_lunbo" id="sport">

                        @if(in_array('AG', $_api_list))
                            <div  data-v-62a6580a="" class="sports_li" @if($_member)
                            onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                                  @else onclick="Alert();"
                                    @endif>
                                <div data-v-62a6580a="" class="sports_border" >
                                    <div data-v-62a6580a="" class="sports_son1">
                                        <img data-v-62a6580a="" src="/web/mb46/images/sport/ag.png" alt="" class="sportsImg1">
                                        <p data-v-62a6580a="" class="sportsP1">AG體育</p></div><div data-v-62a6580a="" class="sports_son2">
                                        <p data-v-62a6580a="" class="sportsP2">开始游戏</p>
                                    </div>
                                </div>
                            </div >
                        @endif
                            @if(in_array('BBIN', $_api_list))
                                <div  data-v-62a6580a="" class="sports_li" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                                      @else onclick="Alert();"
                                        @endif>
                                    <div data-v-62a6580a="" class="sports_border" >
                                        <div data-v-62a6580a="" class="sports_son1">
                                            <img data-v-62a6580a="" src="/web/mb46/images/sport/bbin.png" alt="" class="sportsImg1">
                                            <p data-v-62a6580a="" class="sportsP1">BBIN體育</p></div><div data-v-62a6580a="" class="sports_son2">
                                            <p data-v-62a6580a="" class="sportsP2">开始游戏</p>
                                        </div>
                                    </div>
                                </div >
                            @endif
                            @if(in_array('NEWBB', $_api_list))
                                <div  data-v-62a6580a="" class="sports_li" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=NEWBB&game_type=4','','width=1024,height=768')"
                                      @else onclick="Alert();"
                                        @endif>
                                    <div data-v-62a6580a="" class="sports_border" >
                                        <div data-v-62a6580a="" class="sports_son1">
                                            <img data-v-62a6580a="" src="/web/mb46/images/sport/bbin.png" alt="" class="sportsImg1">
                                            <p data-v-62a6580a="" class="sportsP1">NEWBB體育</p></div><div data-v-62a6580a="" class="sports_son2">
                                            <p data-v-62a6580a="" class="sportsP2">开始游戏</p>
                                        </div>
                                    </div>
                                </div >
                            @endif
                            @if(in_array('IBC', $_api_list))
                                <div  data-v-62a6580a="" class="sports_li" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"
                                      @else onclick="Alert();"
                                        @endif>
                                    <div data-v-62a6580a="" class="sports_border" >
                                        <div data-v-62a6580a="" class="sports_son1">
                                            <img data-v-62a6580a="" src="/web/mb46/images/sport/ibc.png" alt="" class="sportsImg1">
                                            <p data-v-62a6580a="" class="sportsP1">沙巴體育</p></div><div data-v-62a6580a="" class="sports_son2">
                                            <p data-v-62a6580a="" class="sportsP2">开始游戏</p>
                                        </div>
                                    </div>
                                </div >
                            @endif
                            @if(in_array('SS', $_api_list))
                                <div  data-v-62a6580a="" class="sports_li" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SS&game_type=4','','width=1024,height=768')"
                                      @else onclick="Alert();"
                                        @endif>
                                    <div data-v-62a6580a="" class="sports_border" >
                                        <div data-v-62a6580a="" class="sports_son1">
                                            <img data-v-62a6580a="" src="/web/mb46/images/sport/ss.png" alt="" class="sportsImg1">
                                            <p data-v-62a6580a="" class="sportsP1">三昇體育</p></div><div data-v-62a6580a="" class="sports_son2">
                                            <p data-v-62a6580a="" class="sportsP2">开始游戏</p>
                                        </div>
                                    </div>
                                </div >
                            @endif
                            @if(in_array('IM', $_api_list))
                                <div  data-v-62a6580a="" class="sports_li" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IM&game_type=4','','width=1024,height=768')"
                                      @else onclick="Alert();"
                                        @endif>
                                    <div data-v-62a6580a="" class="sports_border" >
                                        <div data-v-62a6580a="" class="sports_son1">
                                            <img data-v-62a6580a="" src="/web/mb46/images/sport/im.png" alt="" class="sportsImg1">
                                            <p data-v-62a6580a="" class="sportsP1">IM體育</p></div><div data-v-62a6580a="" class="sports_son2">
                                            <p data-v-62a6580a="" class="sportsP2">开始游戏</p>
                                        </div>
                                    </div>
                                </div >
                            @endif
                            @if(in_array('GJ', $_api_list))
                                <div  data-v-62a6580a="" class="sports_li" @if($_member)
                                onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"
                                      @else onclick="Alert();"
                                        @endif>
                                    <div data-v-62a6580a="" class="sports_border" >
                                        <div data-v-62a6580a="" class="sports_son1">
                                            <img data-v-62a6580a="" src="/web/mb46/images/sport/gj.png" alt="" class="sportsImg1">
                                            <p data-v-62a6580a="" class="sportsP1">冠捷體育</p></div><div data-v-62a6580a="" class="sports_son2">
                                            <p data-v-62a6580a="" class="sportsP2">开始游戏</p>
                                        </div>
                                    </div>
                                </div >
                            @endif
                    </div>
                </div>
            </div>
            <div data-v-62a6580a="" class="chess_div">
                <div data-v-62a6580a="" class="chessHeader ">
                    <p data-v-62a6580a="" class="chessP1 wow slideInRight animated animated" style="visibility: hidden; animation-name: none;">Poker Game</p>
                    <p data-v-62a6580a="" class="chessP2 wow bounceInLeft animated animated" style="visibility: hidden; animation-name: none;">
                        <a data-v-62a6580a="" href="javascript:void(0);" class="">棋牌</a>
                    </p>
                </div>
                <div data-v-62a6580a="" class="chess_center">
                    <div data-v-62a6580a="" class="el-carousel el-carousel--horizontal el-carousel--card">
                        <div class="el-carousel__container swiper-container chess-swiper" style="height: 620px;">
                            <button type="button" class="el-carousel__arrow el-carousel__arrow--left swiper-button-prev">
                                <i class="el-icon-arrow-left"></i>
                            </button>
                            <button type="button" class="el-carousel__arrow el-carousel__arrow--right swiper-button-next">
                                <i class="el-icon-arrow-right"></i>
                            </button>
                            <div class="swiper-wrapper" id="chess">
                                @if(in_array('VG', $_api_list))
                                <div data-v-62a6580a=""
                                     onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VG&game_type=7','','width=1024,height=768')"
                                     class="el-carousel__item el-carousel__item--card is-in-stage swiper-slide">
                                    <div class="el-carousel__mask"></div>
                                    <img data-v-62a6580a="" src="/web/mb46/images/board/vg.png"
                                         alt="" class="chessImg1">
                                    <div data-v-62a6580a="" class="onChess"><p data-v-62a6580a="" class="itemName">VG棋牌</p>
                                        <p data-v-62a6580a="" class="itemP2">开始游戏</p></div>
                                </div>
                                @endif
                                    @if(in_array('KY', $_api_list))
                                <div data-v-62a6580a=""
                                     onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"
                                     class="el-carousel__item el-carousel__item--card is-in-stage swiper-slide">
                                    <div class="el-carousel__mask"></div>
                                    <img data-v-62a6580a="" src="/web/mb46/images/board/ky.png"
                                         alt="" class="chessImg1">
                                    <div data-v-62a6580a="" class="onChess"><p data-v-62a6580a="" class="itemName">开元棋牌</p>
                                        <p data-v-62a6580a="" class="itemP2">开始游戏</p></div>
                                </div>
                                    @endif
                                    @if(in_array('LEG', $_api_list))
                                <div data-v-62a6580a=""
                                     onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEG&game_type=7','','width=1024,height=768')"
                                     class="el-carousel__item el-carousel__item--card is-in-stage swiper-slide">
                                    <div class="el-carousel__mask"></div>
                                    <img data-v-62a6580a="" src="/web/mb46/images/board/leg.png"
                                         alt="" class="chessImg1">
                                    <div data-v-62a6580a="" class="onChess"><p data-v-62a6580a="" class="itemName">LEG棋牌</p>
                                        <p data-v-62a6580a="" class="itemP2">开始游戏</p></div>
                                </div>
                                    @endif
                                    @if(in_array('FG', $_api_list))
                                <div data-v-62a6580a=""
                                     onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=7','','width=1024,height=768')"
                                     class="el-carousel__item el-carousel__item--card is-in-stage swiper-slide">
                                    <div class="el-carousel__mask"></div>
                                    <img data-v-62a6580a="" src="/web/mb46/images/board/fg.png"
                                         alt="" class="chessImg1">
                                    <div data-v-62a6580a="" class="onChess"><p data-v-62a6580a="" class="itemName">FG棋牌</p>
                                        <p data-v-62a6580a="" class="itemP2">开始游戏</p></div>
                                </div>
                                        @endif
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div>
            <div data-v-62a6580a="" class="zixun_div">
                <div data-v-62a6580a="" class="zixunHeader">
                    <p data-v-62a6580a="" class="zixunP1 wow slideInRight animated animated" style="visibility: hidden; animation-name: none;">Information</p>
                    <p data-v-62a6580a="" class="zixunP2 wow bounceInLeft animated animated" style="visibility: hidden; animation-name: none;">
                        <a data-v-62a6580a="" href="javascript:void(0);" class="">资讯</a>
                    </p>
                </div>
                <div data-v-62a6580a="" class="zixun_center">
                    <div data-v-62a6580a="" class="zixun_left">
                        <div data-v-62a6580a="" class="zixun_msg">
                        <div data-v-62a6580a="" class="zMsg_left">
                            <i data-v-62a6580a="" class="wow rollIn bg-yellow animated animated" style="visibility: hidden; animation-name: none;">
                                <img data-v-62a6580a="" src="{{ asset('web/mb46/images/qq_contact.png') }}" alt="">
                            </i>
                        </div>
                        <div data-v-62a6580a="" data-wow-delay="0.0s" class="zMsg_right">
                            <p data-v-62a6580a="">客服QQ</p>
                            <p data-v-62a6580a="">{{ $_system_config -> qq }}</p>
                        </div>
                    </div>
                    <div data-v-62a6580a="" class="zixun_msg" onclick="openKuFu(this,1);" urls="{{ $_system_config -> service_link }}">
                    <div data-v-62a6580a="" class="zMsg_left">
                        <i data-v-62a6580a="" class="wow rollIn bg-yellow animated animated" style="visibility: hidden; animation-name: none;">
                            <img data-v-62a6580a="" src="{{ asset('web/mb46/images/skype_contact.png') }}" alt="">
                        </i>
                    </div>
                    <div data-v-62a6580a="" data-wow-delay="0.2s" class="zMsg_right">
                        <p data-v-62a6580a="">在线客服</p>
                        <p data-v-62a6580a="">7×24小时 在线客服</p>
                    </div>
                </div>
                {{--<div data-v-62a6580a="" class="zixun_msg">
                    <div data-v-62a6580a="" class="zMsg_left">
                        <i data-v-62a6580a="" class="wow rollIn bg-yellow animated animated" style="visibility: hidden; animation-name: none;">
                            <img data-v-62a6580a="" src="{{ asset('web/mb46/images/wx_contact.png') }}" alt="">
                        </i>
                    </div>
                    <div data-v-62a6580a="" data-wow-delay="0.4s" class="zMsg_right">
                        <p data-v-62a6580a="">微信</p>
                        <p data-v-62a6580a="">{{ $_system_config -> wx }}</p>
                    </div>
                </div>--}}
                <div data-v-62a6580a="" class="zixun_msg">
                    <div data-v-62a6580a="" class="zMsg_left">
                        <i data-v-62a6580a="" class="wow rollIn bg-yellow animated animated" style="visibility: hidden; animation-name: none;">
                            <img data-v-62a6580a="" src="{{ asset('web/mb46/images/email_contact.png') }}" alt="">
                        </i>
                    </div>
                    <div data-v-62a6580a="" data-wow-delay="0.6s" class="zMsg_right">
                        <p data-v-62a6580a="">客服电话</p>
                        <p data-v-62a6580a="">{{ $_system_config -> phone1 }}</p>
                    </div>
                </div>
                <div data-v-62a6580a="" class="zixun_msg">
                    <div data-v-62a6580a="" class="zMsg_left">
                        <i data-v-62a6580a="" class="wow rollIn bg-yellow animated animated" style="visibility: hidden; animation-name: none;">
                            <img data-v-62a6580a="" src="{{ asset('web/mb46/images/email_contact.png') }}" alt="">
                        </i>
                    </div>
                    <div data-v-62a6580a="" data-wow-delay="0.6s" class="zMsg_right">
                        <p data-v-62a6580a="">客服电话2</p>
                        <p data-v-62a6580a="">{{ $_system_config -> phone2 }}</p>
                    </div>
                </div>
            </div>
            <div data-v-62a6580a="" class="zixun_right">
                <p data-v-62a6580a="" class="zixun_P1">手机投注、精彩无限</p>
                <p data-v-62a6580a="" class="zixun_P2">澳门威尼斯人秉持“打造博彩第一品牌”的态度，积极寻求创新技术及理念，提供近万款老虎机、百家乐以及彩票游戏投注，线上存款及线上取款，一键操作，完整规划跨系统娱乐平台，整合同步账号和资料传输，达到随时随地不间断娱乐的享受概念。</p>
                {{--<p data-v-62a6580a="" class="zixun_P4">
                    <a data-v-62a6580a="" href="@Url.Action("Mobile", "Index")" class="">更多详情</a>
                </p>--}}
            </div>
        </div>
    </div>
    </div>
    </div>


    <script>
        indexSwiper();
        $(window).scroll(function () { //开始监听滚动条
            loadAnimation();
        })
        //biCommon.getDialogContent();//获取首页广告和标题
        $(function () {
            loadAnimation();
            bannerSwiper();
        })
        // getGamePlate(1, "");//首页开通接口展示
        // biCommon.getNotices("#noticeSiper");


    </script>


@endsection
