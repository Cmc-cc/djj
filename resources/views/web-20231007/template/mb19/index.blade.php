@extends('web.template.mb19.layouts.main')
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
    <div id="page-container">
        <div id="page-body">
            <!-- 最新消息 -->
            <div class="news-wrap clearfix">
                <div class="news-title"></div>
                <div class="news-item">
                    <marquee id="ele-msgNews" behavior="scroll" scrollamount="1" direction="left" style="height:100%;" onMouseOut="this.start()" onMouseOver="this.stop()">
                        @foreach($_system_notices as $v)
                            <div class="module">
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
                <div class="news-link"></div>
            </div>
            <div class="ad-flash">
                <div id="js-ele-slider-swf" class="ele-slideshow-wrap">
                   <!-- <img src="{{ asset('/web/images/title_first.png') }}" width="242" height="120" alt=""/>-->
                </div>
            </div>
            <div class="first-game-wrap">

                <div class="ele-firstgame-wrap">
                    <div class="clearfix ele-firstgame" id="js-firstgame-slider">
                        {{--视讯--}}
                        <a href="{{ route('web.liveCasino') }}" class="ele-firstgame-1 js-ele-firstgame-fade">
                            <span></span>
                        </a>
                        {{--体育--}}
                        <a href="{{ route('web.esports') }}" class="ele-firstgame-2 js-ele-firstgame-fade">
                            <span></span>
                        </a>
                        {{--电子--}}
                        <a href="{{ route('web.eGame') }}" class="ele-firstgame-3 js-ele-firstgame-fade">
                            <span></span>
                        </a>
                        {{--彩票--}}
                        <a href="{{ route('web.lottory') }}" class="ele-firstgame-4 js-ele-firstgame-fade">
                            <span></span>
                        </a>
                        {{--旗舰厅--}}
                        <a href="{{ route('web.liveCasino') }}" class="ele-firstgame-5 js-ele-firstgame-fade">
                            <span></span>
                        </a>
                        {{--bb体育--}}
                        <a href="{{ route('web.esports') }}" class="ele-firstgame-6 js-ele-firstgame-fade">
                            <span></span>
                        </a>
                    </div>
                </div>
                <script>
                    $('.js-ele-firstgame-fade > span').hover(
                            function () {
                                $(this).css("background-position-x", "-181px")
                                        .parent()
                                        .css("background-position-x", "0");
                            }, function () {
                                $(this).css("background-position-x", "0")
                                        .parent()
                                        .css("background-position-x", "-181px");
                            }
                    );
                </script>
            </div>
        </div>
    </div>
@endsection
