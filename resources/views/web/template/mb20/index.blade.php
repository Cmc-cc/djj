@extends('web.template.mb20.layouts.main')
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
<div class="banner">
    <div class="index-news">
        <div class="wrap">
            <div class="news-marquee">
                <span class="tit"><img src="{{ asset('/web') }}/mb20/images/title_news.png"></span>
                <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="left" scrollamount=3  loop="infinite">
                    @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</div>

<!--main-->
<div class="main">
    <div class="wrap">
        <div class="top"><img src="{{ asset('/web') }}/mb20/images/jp_bg.png"></div>
        <div class="game-con">
            <a href="/m" class="mobile-bet"></a>
            <a href="{{ route('web.liveCasino') }}" class="live-casino"></a>
            <a href="{{ route('web.lottory') }}" class="lottery"></a>
            <a href="{{ route('web.esports') }}" class="sports"></a>
            <a href="{{ route('web.eGame') }}" class="casino"></a>
        </div>
    </div>
</div>

<!--news-->
<div class="news">
    <div class="wrap">

        <ul class="gamelist">
            <li class="game01">
                <a href="javascript:;" ></a>
            </li>
            <li class="game02">
                <a href="javascript:;" ></a>
            </li>
            <li class="game03">
                <a href="javascript:;" ></a>
            </li>
            <li class="game04">
                <a href="javascript:;" ></a>
            </li>
        </ul>
    </div>
</div>
@endsection
