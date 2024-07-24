@extends('web.template.mb3.layouts.main')
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
    <div class="body" style="overflow: hidden">
        <div class="banner flexslider">
            <ul class="slides">
                {{--<li><img src="{{ asset('/web/mb3/images/banner02.jpg') }}"/></li>
                <li><img src="{{ asset('/web/mb3/images/banner01.jpg') }}"/></li>
                <li><img src="{{ asset('/web/mb3/images/banner03.jpg') }}"/></li>
                <li><img src="{{ asset('/web/mb3/images/banner04.jpg') }}"/></li>--}}
                @foreach($banners as $item)
                    <li><a target="_blank" href="{{$item->jumpurl}}"><img src="{{ $item->path }}"/></a></li>
                @endforeach
            </ul>
        </div>

        <div class="marquee">
            <div class="container">
                <div class="pullLeft">最新公告：</div>
                <marquee class="pullRight" id="mar0" scrollAmount="2" direction="left" onmouseout="this.start()" onmouseover="this.stop()">
                    @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    @endforeach
                </marquee>
            </div>
        </div>

        <div class="page-container">
            <div class="container">
                <div class="first-game">
                    <a href="{{ route('web.liveCasino') }}" class="game_1"></a>
                    <a href="{{ route('web.lottory') }}" class="game_2"></a>
                    <a href="{{ route('web.eGame') }}" class="game_3"></a>
                    <a href="{{ route('web.esports') }}" class="game_4"></a>
                </div>
                <div class="max-btn">
                    <div class="bb-btn-box">
                        <a class="ag-btn" href="javascript:;"></a>
                        <a class="bbin-btn" href="javascript:;"></a>
                        {{--<a class="mg-btn" href="javascript:;"></a>--}}
                        {{--<a class="gns-btn" href="javascript:;"></a>--}}
                    </div>
                </div>
                <div class="mobile-bg">
                    {{--<a href="" class="mobile-btn"></a>--}}
                    <img class="mobile-erweima" src="{{ $_system_config->wap_qrcode }}" alt="">
                </div>
            </div>
        </div>
    </div>




    <script>
        $(function(){
            $('.show-cate').click(function(){
                var url = $(this).attr('data-uri');
                layer.open({
                    type: 2,
                    title: '记录',
                    shadeClose: false,
                    shade: 0.8,
                    area: ['90%', '90%'],
                    content: url
                });
            })
        });
    </script>
    <script>


        (function ($) {
            $(function () {
                $('.flexslider').flexslider({
                    animation: 'fade',
                    directionNav: false
                });

                $('.menuBox').on('click', 'li', function () {
                    var index = $(this).index();
                    var $contentBox_item=$(this).closest('.menuBox').next('.contentBox').find('.contentBox_item');
                    $(this).addClass('active').siblings('li').removeClass('active');
                    $contentBox_item.removeClass('active').eq(index).addClass('active');
                });




                //superslide
                /* jQuery(".txtScroll-top").slide({mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:9,pnLoop:true});*/

                //superslide
                var listMarqueIndex=0;
                var listMarqueShow=7;  //要显示的个数
                var listMarqueLength=$('.txtScroll-top .ntb-egzj li').length;  //总共显示的条数
                console.log(listMarqueLength);
                if(listMarqueLength>listMarqueShow){  //大于要显示的个数才执行动画
                    var listMarque=setInterval(function(){

                        console.log(listMarqueIndex);
                        if(listMarqueLength-listMarqueIndex>listMarqueShow){
                            listMarqueIndex++;
                            $('.txtScroll-top .ntb-egzj li').removeClass('on')
                            $('.txtScroll-top .ntb-egzj li').eq(listMarqueIndex).addClass('on');
                            $('.txtScroll-top .ntb-egzj').animate({
                                "top":"-=45px"
                            },800);
                        }else{
                            $('.txtScroll-top .ntb-egzj').animate({"top":'0'})
                            listMarqueIndex=0;
                            $('.txtScroll-top .ntb-egzj li').removeClass('on')
                            $('.txtScroll-top .ntb-egzj li').eq(listMarqueIndex).addClass('on')
                        }
                    },4000);
                }

                $('.disabled').on('click',function(){
                    layer.msg('暂未开放，敬请期待',{icon:6});
                });

            })
        })(jQuery)
    </script>
    <script id="jsID" type="text/javascript">

    </script>
@endsection
