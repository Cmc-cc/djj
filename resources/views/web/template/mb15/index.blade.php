@extends('web.template.mb15.layouts.main')
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
    <div class="wrap">
        <div id="js-ele-slider" class="ele-slider-wrap">
            <object type="application/x-shockwave-flash" data="{{ asset('/web/mb15/media/141195451376.swf') }}" width="530" height="233" id="js-ele-slider-swf" style="visibility: visible;"><param name="wmode" value="transparent"><param name="quality" value="high"><param name="flashvars" value="xml_url=/cl/index.php,MLoopAD"></object>
            <script>
                (function(){
                    $(function(){
                        var flashvars = {},
                                attributes = {},
                                params = {
                                    wmode: 'transparent',
                                    quality: 'high',
                                    flashvars: 'xml_url=/cl/index.php,MLoopAD'
                                };
                        swfobject.embedSWF('web/mb15/media/141195451376.swf', 'js-ele-slider-swf', '530', '233', '8.0.35.0', 'web/mb15/media/141195451376.swf', flashvars, params, attributes);
                    });
                })();
            </script>
        </div>
    </div>
</div>

<!--news-->
<div class="news">
    <div class="wrap">
        <div class="top">
            <span class="tit">公告</span>
            <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="left" scrollamount=3  loop="infinite">
                @foreach($_system_notices as $v)
                    <span>~{{ $v->title }}~</span>
                    <span>{{ $v->content }}</span>
                @endforeach
            </marquee>
        </div>
        <ul class="gamelist">
            <li class="game01">
                <a href="{{ route('web.liveCasino') }}"></a>
            </li>
            <li class="game02">
                <a href="{{ route('web.esports') }}"></a>
            </li>
            <li class="game03">
                <a href="{{ route('web.eGame') }}"></a>
            </li>
            <li class="game04">
                <a href="{{ route('web.lottory') }}"></a>
            </li>
        </ul>
    </div>
</div>
@endsection
