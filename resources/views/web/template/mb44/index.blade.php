@extends('web.template.mb44.layouts.main')
@section('content')
    <div id="banner">
        <section id="slide-banner" class="swiper-container swiper-containerlayou" style="display:none;position: relative; width:100%; height: 520px;overflow:hidden">
            <div class="swiper-wrapper">
                @foreach($banners as $item)
                    <img src="{{ $item -> path }}" class="swiper-slide" />
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </section>
        <div id="news">
            <div class="wrapper">
                <span class="title">最新公告</span>
                <div id="hot-news">
                    最新公告
                    <marquee>
                        @foreach($_system_notices as $v)
                            <span>~{{ $v->title }}~</span>
                            <span>{{ $v->content }}</span>
                        @endforeach
                    </marquee>
                </div>
                <span class="chat KFzaixian" title="在线客服" onclick="openKuFu(this,1);" urls="{{ $_system_config -> service_link }}"></span>
            </div>
        </div>
    </div>
<link href="{{ asset('web/mb44/css/home.css') }}" rel="stylesheet" />
<style>
    .swiper-container-free-mode > .swiper-wrapper {
        -webkit-transition-timing-function: linear;
        -o-transition-timing-function: linear;
        transition-timing-function: linear;
        margin: 0 auto
    }
</style>
<div id="content">
    <div id="home" class="ng-scope">
        <section id="home-info">
            <div class="wrapper">
                <div class="pool">
                    <span class="" id="pools">CNY <span id="bonus"></span></span>

                </div>
                <div class="games">
                    <div class="slot-games">
                        <ul class="game-list" id="game-list">
                            <li class="ag" type="AG" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">AG電子</li>
                            <li class="bbin" type="BBIN" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">BB電子</li>
                            <li class="mg" type="MG" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">MG電子</li>
                            <li class="pt" type="PT" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">PT電子</li>
                            <li class="cq9" type="CQ9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">CQ9電子</li>
                            <li class="dt" type="DT" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DT&game_type=2','','width=1024,height=768')">DT電子</li>
                        </ul>
                        <ul class="game-intro slot" id="tuiJianGameList"></ul>
                    </div>
                    <div class="winner">
                        <div class="tempWrap swiper-container swiper-containerindex" style="overflow:hidden; position:relative; height:350px">
                            <ul class="swiper-wrapper clearboth" id="winnerList"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="game-section">
            <ul id="game-box" class="wrapper">
                <li data-img="lottery">
                    <a href="{{ route('web.lottory') }}"></a>
                </li>
                <li data-img="live">
                    <a href="{{ route('web.liveCasino') }}"></a>
                </li>
                <li data-img="sport">
                    <a href="{{ route('web.esports') }}"></a>
                </li>
            </ul>
        </section>
        <section id="info-section">
            <div class="wrapper">
                <ul class="info-left">
                    <li>
                        <span>BRAND <span class="cn">品牌</span></span>
                        <p>综合实力最强劲，最奢华的实体娱乐场</p>
                    </li>
                    <li>
                        <span>FUNDS <span class="cn">资金</span></span>
                        <p>全程担保会员的每一笔存款和取款安全</p>
                    </li>
                    <li>
                        <span>PRIVACY <span class="cn">隐私</span></span>
                        <p>采用256位SSL加密系统保障安全数据</p>
                    </li>
                </ul>

                <div class="info-content">
                    <span class="">{{ $_system_config -> site_name }}</span>为全球唯一荣膺八项《福布斯旅游指南》五星荣誉的度假酒店，位处澳门市中心交通四通八达，酒店提供尊尚饮食及奢华娱乐选择，加上引领潮流的世界级名店，为宾客提供非凡尊贵的项级度假体验，为澳门最具拉斯维加斯特色和奢华的娱乐场。线上娱乐场为菲律宾首都马尼拉经营及管理，是目前亚洲最具公信力最专业在线娱乐网站。线上设有真人、電子、彩票、棋牌、體育等上万种精彩游戏，获得菲律宾政府认证的合法网上娱乐牌照公司

                </div>

                <ul class="info-right">
                    <li>
                        <span class="cn">VIP <span>NOBLE</span></span>
                        <p>加入即可享受VIP独家尊贵奢华特权</p>
                    </li>
                    <li>
                        <span class="cn">安全 <span>SAFE</span></span>
                        <p>提供各种安全简便的存款及提款选择</p>
                    </li>
                    <li>
                        <span class="cn">速度 <span>SPEED</span></span>
                        <p>存款最快30秒，提款1分钟行业顶尖</p>
                    </li>
                </ul>
            </div>
        </section>
    </div>
    <div class="wrapper"></div>
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
<input type="hidden" value="index" id="indexPage" />
<script>
    // getGamePlate(1, "index");
    // biCommon.getDialogContent();
    winnerLists();
    indexGameList();
    $("#game-list li").eq(0).mouseover();
    var t1 = "";
    var swiper = new Swiper('.swiper-containerindex', {
        freeMode: true,
        autoplay: {
            delay: 0
        },
        direction: 'vertical',
        slidesPerView: 14,
        loop: true,
        observer: true,
        observeParents: true,
    });
</script>
    @endsection

