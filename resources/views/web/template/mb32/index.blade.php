@extends('web.template.mb32.layouts.main')
@section('after.js')
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
@section('content')
    <!--banner-->
    <div class="indexbanner">
        <div class="lunbo" style="overflow: hidden;">
            <div class="hd">
                <ul>
                    {{--<li class="on"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>--}}
                    @foreach($banners as $item)
                        <li></li>
                    @endforeach
                </ul>
            </div>

            <div class="bd">
                <ul>
                    @foreach($banners as $item)
                        <li><a href="{{$item->jumpurl}}" target="_blank"><img src="{{ $item->path }}"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{--
                <a class="prev" href="javascript:void(0)"></a>
                <a class="next" href="javascript:void(0)"></a>
            --}}
        </div>

        <div class="index-news">
            <div class="wrap">
                <div class="news-marquee" style="cursor:pointer;color:#fff;">
                    <span class="tit"><img src="{{ asset('/web') }}/mb32/images/title_news.png"></span>
                    <marquee id="mar0" onmouseover="this.stop()" onmouseout="this.start()" direction="left" scrollamount=3  loop="infinite">
                        @foreach($_system_notices as $v)
                            <span>~{{ $v->title }}~</span>
                            <span>{{ $v->content }}</span>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function(){
            $(".lunbo").slide({
                mainCell: ".bd ul",
                autoPlay: true,
                trigger: "click",
                delayTime: 2000,
                interTime: 5000
            });
        });
    </script>

    <div id="content">
        <div class="wrapper">

        </div>

        <div id="home">
            <div class="wrapper">
                <ul id="game-box01">
                    <li data-img="link01"><a></a></li>
                    <li data-img="link02"><a></a></li>
                    <li data-img="link03"><a></a></li>
                </ul>
                <ul id="game-box02">
                    <li data-img="live"><a href="{{ route('web.liveCasino') }}"></a></li>
                    <li data-img="sport"><a href="{{ route('web.esports') }}"></a></li>
                    <li data-img="slot"><a href="{{ route('web.eGame') }}"></a></li>
                    <li data-img="lottery"><a href="{{ route('web.lottory') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="electronic">
        <div class="wrapper">
            <ul class="slot-list">
                <li class="hot active">最热游戏推荐</li>
                <li class="popular">人气游戏推荐</li>
                <li class="classic">经典游戏推荐</li>
            </ul>

            <ul class="game-box hot-box box">
                <a href="{{ route('web.eGame') }}">
                    <li class="hot01" ><img src="{{ asset('/web') }}/mb32/images/game1.png" alt=""><span>千炮捕魚</span></li>
                </a>
                <a href="{{ route('web.eGame') }}">
                    <li class="hot02"><img src="{{ asset('/web') }}/mb32/images/game2.png" alt=""><span>水浒传</span></li></a>
                <a href="{{ route('web.eGame') }}">
                    <li class="hot03" ><img src="{{ asset('/web') }}/mb32/images/game3.png" alt=""><span>五龙争霸</span></li>
                </a>
                <a href="{{ route('web.eGame') }}"><li class="hot04" ><img src="{{ asset('/web') }}/mb32/images/game4.png" alt=""><span>超级斗地主</li></a>
                <a href="{{ route('web.eGame') }}"><li class="hot05" ><img src="{{ asset('/web') }}/mb32/images/game5.png" alt=""><span>金龙卷</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="hot06" ><img src="{{ asset('/web') }}/mb32/images/game6.png" alt=""><span>金鸡报喜</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="hot07" ><img src="{{ asset('/web') }}/mb32/images/game7.png" alt=""><span>银雪驯鹿</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="hot08" ><img src="{{ asset('/web') }}/mb32/images/game8.png" alt=""><span>狂野英雄</span></li></a>
            </ul>

            <ul class="game-box popular-box box-hide">
                <a href="{{ route('web.eGame') }}"><li class="popular01" ><img src="{{ asset('/web') }}/mb32/images/game01.png" alt=""><span>不朽的传奇</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="popular02" ><img src="{{ asset('/web') }}/mb32/images/game02.jpg" alt=""><span>水果拉霸</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="popular03" ><img src="{{ asset('/web') }}/mb32/images/game03.png" alt=""><span>武财神</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="popular04" ><img src="{{ asset('/web') }}/mb32/images/game04.png" alt=""><span>捕魚王</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="popular05" ><img src="{{ asset('/web') }}/mb32/images/game05.png" alt=""><span>斗鸡</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="popular06" ><img src="{{ asset('/web') }}/mb32/images/game06.png" alt=""><span>夜市人生</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="popular07" ><img src="{{ asset('/web') }}/mb32/images/game07.png" alt=""><span>糖果派对</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="popular08" ><img src="{{ asset('/web') }}/mb32/images/game08.png" alt=""><span>连环夺宝</span></li></a>
            </ul>

            <ul class="game-box classic-box box-hide">
                <a href="{{ route('web.eGame') }}"><li class="classic01" ><img src="{{ asset('/web') }}/mb32/images/game001.png" alt=""><span>心跳时刻</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="classic02" ><img src="{{ asset('/web') }}/mb32/images/game002.png" alt=""><span>打破大银行</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="classic03" ><img src="{{ asset('/web') }}/mb32/images/game003.png" alt=""><span>宝石联机</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="classic04" ><img src="{{ asset('/web') }}/mb32/images/game004.png" alt=""><span>摆脱</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="classic05" ><img src="{{ asset('/web') }}/mb32/images/game005.png" alt=""><span>太空神猴</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="classic06" ><img src="{{ asset('/web') }}/mb32/images/game006.png" alt=""><span>发发发</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="classic07" ><img src="{{ asset('/web') }}/mb32/images/game007.png" alt=""><span>森林狂欢季</span></li></a>
                <a href="{{ route('web.eGame') }}"><li class="classic08" ><img src="{{ asset('/web') }}/mb32/images/game008.png" alt=""><span>熊之蜜</span></li></a>
            </ul>

            <div class="jackpot">
                <span>CNY16,774,925.76</span>
            </div>

            <div class="txtMarquee-top">
                <div class="bd">
                    <ul id="award">
                        <li><span class="player">23**45</span>￥<span class="money">2584**</span></li>
                        <li><span class="player">aa**86</span>￥<span class="money">658**</span></li>
                        <li><span class="player">hn**sg</span>￥<span class="money">9542**</span></li>
                        <li><span class="player">w**t8</span>￥<span class="money">1325**</span></li>
                        <li><span class="player">y5**6g</span>￥<span class="money">4856**</span></li>
                        <li><span class="player">s32**ss</span>￥<span class="money">8521**</span></li>
                        <li><span class="player">ww**yh5</span>￥<span class="money">9654**</span></li>
                        <li><span class="player">gg**a</span>￥<span class="money">59**</span></li>
                        <li><span class="player">l***hp</span>￥<span class="money">651**</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(function () {
            $(".txtMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:9,interTime:100,trigger:"hover"});

            $('.slot-list>li').mouseenter(function(){
                var $index=$(this).index();
                $('.slot-list>li').removeClass('active');
                $(this).addClass('active');

                $('#electronic ul.game-box').addClass('box-hide');
                $('#electronic ul.game-box').eq($index).removeClass('box-hide');
            })
        });
    </script>

    <div id="mobile">
        <div class="wrapper">
            <p>
                我们的手机投注平台面向全网玩家，提供近百款老虎机、百家乐、以及彩票游 戏投注，线上存款及线上取款，一键操作，运用3D即时运算创造真实场景结合 立体影像，完整规划的跨系统娱乐平台，整合同步账号和资料传输，达到随时 随地不间断娱乐的享受概念。
            </p>

            <div id="qr">
                <img src="{{ $_system_config->wap_qrcode }}" alt="">
                扫一扫立即下载
            </div>

            <a href="{{ $_system_config->app_link }}" target="_blank"></a>
        </div>
    </div>

    <div class="index-footer"></div>
@endsection
