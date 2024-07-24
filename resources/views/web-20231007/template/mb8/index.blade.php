@extends('web.template.mb8.layouts.main')
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
    <div id="index-banner">
        <div class="text"></div>
        <div class="news">
            <div class="box">
                <div class="scrolling">
                    <marquee onmouseout="this.start();" onmouseover="this.stop();" direction="up" scrolldelay="10"
                             scrollamount="1" class="msg-row">
                        @foreach($_system_notices as $v)
                            <div>
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
            </div>

        </div>
    </div>

    <div id="contentbg">
        <div class="gamelists" id="s1">
            <a class="abtn aleft prev" href="#left"></a>
            <div class="items imglist_w">
                <ul class="imglist">
                    <li><a href="{{ route('web.lottory') }}" target="mem_index" class="item01"></a></li>
                    <li><a href="{{ route('web.esports') }}" target="mem_index" class="item02"></a></li>
                    <li><a href="{{ route('web.eGame') }}" target="mem_index" class="item03"></a></li>
                    <li><a href="{{ route('web.liveCasino') }}" target="mem_index" class="item04"></a></li>
                    <li><a href="{{ route('web.lottory') }}" target="mem_index" class="item01"></a></li>
                    <li><a href="{{ route('web.esports') }}" target="mem_index" class="item02"></a></li>
                    <li><a href="{{ route('web.eGame') }}" target="mem_index" class="item03"></a></li>
                    <li><a href="{{ route('web.liveCasino') }}" target="mem_index" class="item04"></a></li>
                </ul>
            </div>
            <a class="abtn aright next" href="#right"></a>
        </div>
    </div>
@endsection