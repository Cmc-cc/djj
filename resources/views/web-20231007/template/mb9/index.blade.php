@extends('web.template.mb9.layouts.main')
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
            <div class="first-main">
                <div class="ad-flash-wrap clearfix">
                    <div class="ad-flash">
                        <div id="js-ele-slider-swf" class="ele-slideshow-wrap" style="visibility: visible;">
                            <img src="{{ asset('/web/mb9/images/slider.png') }}" alt="" height="268" width="412"></div>
                        {{--<script>--}}
                            {{--(function () {--}}
                                {{--$(function () {--}}
                                    {{--var flashvars = {},--}}
                                            {{--attributes = {},--}}
                                            {{--params = {--}}
                                                {{--wmode: 'transparent',--}}
                                                {{--quality: 'high',--}}
                                                {{--flashvars: 'xml_url=/cl/index.php,MLoopAD'--}}
                                            {{--};--}}
                                    {{--swfobject.embedSWF('media/147934747210.swf', 'js-ele-slider-swf', '412', '268', '8.0.35.0', 'media/expressInstall.swf', flashvars, params, attributes);--}}

                                {{--})--}}
                            {{--})();--}}
                        {{--</script>--}}
                    </div>
                </div>
                <!-- 最新消息 -->
                <div class="first-news-set clearfix">
                    <div class="first-news-wrap clearfix">
                        <div class="first-news-title">最新消息</div>
                        <div class="first-news-item">
                            <div class="picScroll-top">
                                <div class="bd">
                                    <ul class="picList">
                                        @foreach($_system_notices as $v)
                                            <li>
                                                <span>{{ $v->title }}</span>
                                                <span>{{ $v->content }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="first-game-wrap">
                    <div class="ele-firstgame-wrap">
                        <div class="clearfix ele-firstgame" id="js-firstgame-slider">
                            <a href="{{ route('web.liveCasino') }}" target="_blank"
                               class="ele-firstgame-1 js-ele-firstgame-fade">
                                <span></span>
                            </a>
                            <a href="{{ route('web.esports') }}" target="_blank"
                               class="ele-firstgame-2 js-ele-firstgame-fade">
                                <span></span>
                            </a>
                            <a href="{{ route('web.eGame') }}" target="_blank"
                               class="ele-firstgame-3 js-ele-firstgame-fade">
                                <span></span>
                            </a>
                            <a href="{{ route('web.lottory') }}" target="_blank"
                               class="ele-firstgame-4 js-ele-firstgame-fade">
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>

                <script>
                    $(function(){
                        $('.js-ele-firstgame-fade > span').hover(
                            function () {
                                $(this).css("background-position-x", "-174px")
                                    .parent()
                                    .css("background-position-x", "0");
                            }, function () {
                                $(this).css("background-position-x", "0")
                                    .parent()
                                    .css("background-position-x", "-174px");
                            }
                        );
                        jQuery(".picScroll-top").slide({
                            titCell: ".hd ul",
                            mainCell: ".bd ul",
                            autoPage: true,
                            effect: "top",
                            autoPlay: true,
                            vis: 1,
                            trigger: "click"
                        });
                    });
                </script>
            </div>
        </div>
    </div>

@endsection
