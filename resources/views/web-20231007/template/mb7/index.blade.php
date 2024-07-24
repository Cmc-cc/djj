@extends('web.template.mb7.layouts.main')
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
        <!--电子游戏banner-->
<div class="egame-banner slide slide3 s1">
    <div class="demo">
        <div class="pane">
            <div class="icons">
                <a href="javascript:;"><i class="img1 ico selected"></i></a>
                <a href="javascript:;"><i class="img2 ico"></i></a>
                <a href="javascript:;"><i class="img3 ico"></i></a>
                <a href="javascript:;"><i class="img4 ico"></i></a>
                <a href="javascript:;"><i class="img5 ico"></i></a>
            </div>
        </div>
    </div>

    <div class="slide_bg">
        <div class="slide_bg1 on"><a href="{{ route('web.lottory') }}" style="display: block;height: 100%"></a></div>
        <div class="slide_bg2"><a href="{{ route('web.liveCasino') }}" style="display: block;height: 100%"></a></div>
        <div class="slide_bg3"><a href="{{ route('web.esports') }}" style="display: block;height: 100%"></a></div>
        <div class="slide_bg4"><a href="{{ route('web.eGame') }}" style="display: block;height: 100%"></a></div>
        <div class="slide_bg5"><a href="{{ route('web.catchFish') }}" style="display: block;height: 100%"></a></div>
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
        (function ($) {
            $(function () {
                $('#modal-tit').modal();
            })
        })(jQuery);
    </script>
@endif

<script src="{{ asset('/web/mb7/js/jquery.slide.js') }}"></script>

<script type="text/javascript">
    $(".egame-banner").slidebigbg({mouseWheel: true, resizeWin: true});
</script>
@endsection