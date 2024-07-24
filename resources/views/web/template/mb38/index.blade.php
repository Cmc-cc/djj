@extends('web.template.mb38.layouts.main')
@section('content')
<link href="{{ asset('web/mb38/css/htmleaf-demo.css') }}" rel="stylesheet" />
<link href="{{ asset('web/mb38/css/home.css') }}" rel="stylesheet" />
<div id="">
    <div class="htmleaf-container">
        <div class="banner" id="banner1">
            <div class="banner-view"></div>
            <div class="banner-btn" style="display:none"></div>
            <div class="banner-number"></div>
            <div class="banner-progres"></div>
        </div>
    </div>
</div>
<div id="news">
    <div class="wrapper">
        <div id="hot-news" news-marquee>
            <marquee id="mar0">
                @foreach($_system_notices as $v)
                    <span>~{{ $v->title }}~</span>
                    <span>{{ $v->content }}</span>
                @endforeach
            </marquee>
        </div>
    </div>
</div>
<div id="content">
    <div id="home">
        <section class="slot-machine">
            <div class="jackpot">
                超级奖池
                <span>CNY 11,868,8<i id="jackpot1">00</i></span>.<i id="jackpot2">00</i>
                <span></span>
            </div>
            <ul class="top-list">
                <li class="quick">
                    <a target="_blank"></a>
                </li>
                <li class="vip">
                    <a target="_blank"></a>
                </li>
                <li class="envelope">
                    <a target="_blank"></a>
                </li>
                <li class="competition">
                    <a target="_blank"></a>
                </li>
                <li class="betting-lobby">
                    <a target="_blank"></a>
                </li>
            </ul>
            <ul id="game-box" style="margin: auto">
                <li data-img="slot" class="bounceInLeft" data-wow-duration="0.8s">
                    <a href="{{ route('web.eGame') }}">汇集全网最火爆的電子娱乐平台</a>
                </li>
                <li data-img="live" class="bounceInLeft" data-wow-duration="0.8s">
                    <a href="{{ route('web.liveCasino') }}">最完善的真人娱乐 众多美女陪您畅游</a>
                </li>
                <li data-img="board" class="bounceInDown" data-wow-duration="0.8s">
                    <a href="{{ route('web.poker') }}">全球顶级棋牌娱乐中心</a>
                </li>
                <li data-img="sport" class="bounceInRight" data-wow-duration="0.8s">
                    <a href="{{ route('web.esports') }}">最专业的體育投注平台 覆盖全球各大主要體育赛事</a>
                </li>
                <li data-img="lottery" class="bounceInRight" data-wow-duration="0.8s">
                    <a href="{{ route('web.lottory') }}">各种丰富彩票玩法任君选择</a>
                </li>
            </ul>
        </section>
        <section class="home-bottom">
            <ul>
                <li bottom-bg="left">
                    <span class="deposit" digital digital-min="10" digital-max="19" not-point></span>
                    <span class="withdraw" digital digital-min="27" digital-max="55" not-point></span>

                </li>
                <li bottom-bg="center">
                    <h3>電子游艺</h3>
                    <p>游戏玩法丰富，高返奖高赔率，中奖率更高，为用户提供更激情的体验</p>
                    <h3>真人視訊</h3>
                    <p>提供真人百家乐、骰宝、龙虎斗、轮盘、欧美真人百家乐...等多种精彩真人視訊游戏 面向全球玩家</p>
                    <h3>棋牌游戏</h3>
                    <p>打破传统概念,全新玩法,超多金币棋牌游戏，精彩刺激,玩棋牌 体会与万千玩家真实对战的乐趣!</p>
                </li>
                <li bottom-bg="right"></li>
            </ul>
        </section>
    </div>
    <div class="wrapper">
    </div>

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
<script src="{{ asset('web/mb38/js/indexBanner.js') }}"></script>
<script>
    var a =  '<?php echo json_encode($banners)?>';
    a = JSON.parse(a);
    var imgs = [];
    for (let key in a){
        //console.log(a[key].path);
        imgs.push(a[key].path);
    }
    var banner = new FragmentBanner({
        container: "#banner1",//选择容器 必选
        imgs: imgs,//图片集合 必选
        size: {
            width: window.innerWidth-18,
            height: 450
        },//容器的大小 可选
        //行数与列数 可选
        grid: {
            line: 12,
            list: 20
        },
        index: 0,//图片集合的索引位置 可选
        type: 2,//切换类型 1 ， 2 可选
        boxTime: 5000,//小方块来回运动的时长 可选
        fnTime: 10000//banner切换的时长 可选
    });
    var t1 = "";
    //biCommon.getDialogContent();
    $(function () {
        clearInterval(t1);
        var t1 = setInterval(function () {
            $("#jackpot1").html(randomNumber());
            $("#jackpot2").html(randomNumber());
        }, 1500)
    })
</script>
@endsection

