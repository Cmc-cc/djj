@extends('web.template.mb34.layouts.main')
@section('css_js')

<style>
    #hot-news span {
        display: inline-block;
        vertical-align: top;
        margin: 0 5px;
        color: #fffad2;
        font-size: 12px;
        text-decoration: none;
        line-height: 32px;
    }
    #banner:after {
        content: '';
        position: absolute;
        left: 50%;
        margin-left: -610px;
        bottom: 10px;
        width: 705px;
        height: 202px;
        z-index: 1;
        background: url('/web/mb34/images/banner_img.png') no-repeat center center;
    }
</style>
@endsection
@section('content')

    <div id="banner">

        <section id="slide-banner" >
            <div class="slide">
                <ul id="au" class="mianbanner">
                    @foreach($banners as $item)
                        <li><a target="_blank" href="{{$item->jumpurl}}"><img src="{{ $item->path }}"/></a></li>
                    @endforeach
                    {{--<li><a id="img1"><img src="{{ asset('/web/images/444.jpg') }}"/></a></li>
                    <li style="display: none;"><a><img
                                    src="{{ asset('/web/images/333.jpg') }}"/></a></li>
                    <li style="display: none;"><a><img
                                    src="{{ asset('/web/images/111.jpg') }}"/></a></li>
                    <li style="display: none;"><a><img
                                    src="{{ asset('/web/images/222.jpg') }}"/></a></li>
                    <li style="display: none;"><a><img
                                    src="{{ asset('/web/images/555.jpg') }}"/></a></li>
                    <li style="display: none;"><a><img
                                    src="{{ asset('/web/images/666.jpg') }}"/></a></li>--}}
                </ul>
            </div>
        </section>

    </div>


    <div id="news" popup-news>
        <div class="wrapper">
            <div id="hot-news">
                <marquee id="mar0" onmouseover="$(this).find('span').css('text-decoration','underline');this.stop()" onmouseout="$(this).find('span').css('text-decoration','none');this.start()" direction="left" scrollamount=3  loop="infinite">
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




        </div>

        <section class="homepage" ng-controller="LobbiesCtrl">
            <div class="game">
                <div class="game-list">
                    <ul>
                        <li class="litx1">
                            <a href="{{ route('web.poker') }}"><img src="/web/mb34/images/li1.png" alt=""></a>
                            <div class="lititl">
                                <span class="lispa">棋牌游戏</span>
                                <span class="liems">CARDS GAME</span>
                            </div>
                        </li>
                        <li class="litx2">
                            <a href="{{ route('web.liveCasino') }}"><img src="/web/mb34/images/li2.png" alt=""></a>
                            <div class="lititl">
                                <span class="lispa">真人視訊</span>
                                <span class="liems">LIVE DEALER</span>
                            </div>
                        </li>
                        <li class="litx3">
                            <a href="{{ route('web.eGame') }}"><img src="/web/mb34/images/li3.png" alt=""></a>
                            <div class="lititl">
                                <span class="lispa">電子游艺</span>
                                <span class="liems">SLOTS GAME</span>
                            </div>
                        </li>
                        <li class="litx4">
                            <a href="{{ route('web.esports') }}"><img src="/web/mb34/images/li4.png" alt=""></a>
                            <div class="lititl">
                                <span class="lispa">體育赛事</span>
                                <span class="liems">SPORT GAME</span>
                            </div>
                        </li>
                        <li class="litx5">
                            <a href="{{ route('web.lottory') }}"><img src="/web/mb34/images/li5.png" alt=""></a>
                            <div class="lititl">
                                <span class="lispa">彩票游戏</span>
                                <span class="liems">LOTTERY</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mobile-bet">
                    <div class="wrapper">
                        提供近百款棋牌游戏、老虎机、百家乐以及彩票游戏投注、线上存款及线上取款、一键操作，运用3D即时运算创造真实场景、结合立体影像完整规画的跨系统娱乐平台，整合同步账号和资料传输，达到随时随地不间断娱乐的享受概念。
                        <img src="{{ $_system_config->wap_qrcode }}" />
                    </div>
                </div>
            </div>
        </section>

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
@endsection