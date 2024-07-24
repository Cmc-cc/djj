@extends('web.template.mb18.layouts.main')
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
    <div class="ba_bg">
        <div class="indexbanner">
            <div class="swiper-container" >
                <div class="swiper-wrapper" >
                    {{--<div class="swiper-slide"><img src="{{ asset('/web/mb18/images/s_banner1.jpg') }}" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('/web/mb18/images/s_banner2.jpg') }}" alt=""></div>--}}
                    @foreach($banners as $item)
                        <div class="swiper-slide"><a href="{{$item->jumpurl}}" target="_blank"><img src="{{$item->path}}" alt=""></a></div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <script language="javascript">
                $(function(){
                    var mySwiper = new Swiper('.swiper-container', {
                        pagination: '.swiper-pagination',
                        nextButton: '.swiper-button-next',
                        prevButton: '.swiper-button-prev',
                        effect : 'fade',
                        paginationClickable: true,
                        autoplay: 3000,
                        speed: 800
                    })
                });
            </script>
        </div>
    </div>
    <div class="ba-g" style="height:43px;line-height: 43px;font-size: 14px;padding-left: 20px;color:#FFFFFF;">
        <div class="mg width clear">
            <span class="fl">最新公告</span>
            <div class="fr" id="msg">
                <marquee scrollamount="6" scrolldelay="150" direction="left" onmouseover="this.stop();" onmouseout="this.start();" style="cursor: pointer;">
                    @foreach($_system_notices as $v)
                        <div class="module">
                            <span>~{{ $v->title }}~</span>
                            <span>{{ $v->content }}</span>
                        </div>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>

    <div class="xm_bg">
        <div class="xm_main width">
            <div class="hot-game">
                <div class="main new-box">
                    <div class="new-con">
                        <ul>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot1 hotsymbol fixPng" ></div>
                                    <span>六合彩</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot4 hotsymbol fixPng"></div>
                                    <span>时时彩</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot10 hotsymbol fixPng"></div>
                                    <span>快乐十分</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot9 hotsymbol fixPng"></div>
                                    <span>11选5</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot7 hotsymbol fixPng"></div>
                                    <span>3D</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot11 hotsymbol fixPng"></div>
                                    <span>幸运28</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot5 hotsymbol fixPng"></div>
                                    <span>快3</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot13 hotsymbol fixPng"></div>
                                    <span>重庆时时彩</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot6 hotsymbol fixPng"></div>
                                    <span>北京赛车</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index hot15 hotsymbol fixPng"></div>
                                    <span>广东快乐十分</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index kenopl3 hotsymbol fixPng"></div>
                                    <span>加拿大卑斯</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('web.lottory') }}">
                                    <div class="hot-icon index keno3d hotsymbol fixPng"></div>
                                    <span>北京快乐8</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Game_container">
        <div class="Game_centet">
            <div class="Game_left">
                <!--<div class="zf"></div>-->
                <ul class="cl" style="height:70px;">
                    @if(in_array('PT', $_api_list))
                    <li class="cc">
                        <a href="javascript:void(0)">
                            <div class="Game_title" style="width:250px;">
                                <p><img src="{{ asset('/web/mb18/images/game_ag.png') }}"></p>
                                <span>PT電子</span>
                                <font style="left:-2px;">PLAYTECHGAMING</font>

                            </div>
                        </a>
                    </li>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                    <li>
                        <a href="javascript:void(0)">
                            <div class="Game_title">
                                <p style="margin-left:25px;"><img src="{{ asset('/web/mb18/images/game_bbin.png') }}"></p>
                                <span>BBIN電子</span>
                                <font>BBINGAMING</font>

                            </div>
                        </a>
                    </li>
                    @endif
                    @if(in_array('MG', $_api_list))
                    <li class="cur">
                        <a href="javascript:void(0)">
                            <div class="Game_title">
                                <p><img src="{{ asset('/web/mb18/images/game_dz.png') }}"></p>
                                <span>MG電子</span>
                                <font>MICROGAMING</font>
                            </div>
                        </a>
                    </li>
                    @endif
                    @if(in_array('AG', $_api_list))
                    <li class="">
                        <a href="javascript:void(0)">
                            <div class="Game_title">
                                <p style="margin-left:32px;margin-top: 15px;">
                                <img src="{{ asset('/web/mb18/images/game_ag1.png') }}">
                                </p>
                                <span>AG電子</span>
                                <font style="left:2px;">AGGAME</font>
                            </div>
                        </a>
                    </li>
                        @endif

                </ul>
                <div class="Game_xx">
                    <div class="Game_g1" style="display: none; opacity: 0;">
                        <ul>
                            @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=PT&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/kt_07.png') }}"></p>
                                    <div class="tent">
                                        <span>冰上曲棍球</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=PT&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/kt_10.png') }}"></p>
                                    <div class="tent">
                                        <span>不朽的浪漫</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=PT&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/kt_23.png') }}"></p>
                                    <div class="tent">
                                        <span>宝石之轮</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=PT&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/kt_26.png') }}"></p>
                                    <div class="tent">
                                        <span>银行抢匪2</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                    </div>

                    <div class="Game_g1 bb" style="display: none; opacity: 0;">
                        <ul>
                            @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks4_09.png') }}"></p>
                                    <div class="tent">
                                        <span>糖果派对</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks4_06.png') }}"></p>
                                    <div class="tent">
                                        <span>连环夺宝</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks4_17.png') }}"></p>
                                    <div class="tent">
                                        <span>明星97</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks4_14.png') }}"></p>
                                    <div class="tent">
                                        <span>大话西游</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                        </ul>
                    </div>
                    <div class="Game_g1 bb" style="display: block; opacity: 1;">
                        <ul>
                            @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=MG&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks3_09.png') }}"></p>
                                    <div class="tent">
                                        <span>水果拉霸</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                            @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=MG&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks3_06.png') }}"></p>
                                    <div class="tent">
                                        <span>灵猴献瑞</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=MG&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks3_17.png') }}"></p>
                                    <div class="tent">
                                        <span>杰克高手</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li>
                                <a href="{{route('game.playGame')}}?plat_type=MG&game_type=2" target="_blank">
                                    <p class="pic"><img src="{{ asset('/web/mb18/images/ks3_14.png') }}"></p>
                                    <div class="tent">
                                        <span>齐天大圣</span>
                                        <p class="i_s">
                                            <i></i><i></i><i></i><i></i><i></i>
                                        </p>
                                        <font>立即游戏</font>
                                    </div>
                                </a>
                            </li>
                                    @endif
                        </ul>
                    </div>
                    @if(in_array('AG', $_api_list))
                    <div class="Game_g1" style="display: none; opacity: 0;">
                        <div class="buyc">
                            <a href="{{route('game.playGame')}}?plat_type=AG&game_type=2" target="_blank">
                                <img class="buy" src="{{ asset('/web/mb18/images/kc2_03.jpg') }}">
                                <div class="btn_c"></div>
                            </a>
                        </div>
                    </div>
                        #@endif
                </div>
                <div class="scrolls" id="demo">
                    <ul id="demo1">
                        <li><p><span class="address">深圳</span><font>wjsb***86</font></p><p style="width:165px; margin-left:5px;"><span>冰上曲棍球</span><font>580.00元</font></p></li>
                        <li><p><span class="address">北京</span><font>75****sc</font></p><p style="width:165px; margin-left:5px;"><span>水果老虎机</span><font>680.00元 </font></p></li>
                        <li><p><span class="address">黑龙江</span><font>boj***6</font></p><p style="width:165px; margin-left:5px;"><span>阿瓦隆2</span><font>3,600.00元</font></p></li>
                        <li><p><span class="address">北京</span><font>yul****gh</font></p><p style="width:165px; margin-left:5px;"><span>不朽的浪漫</span><font>480.00元 </font></p></li>
                        <ul id="demo2">
                            <li><p><span class="address">深圳</span><font>wjsb***86</font></p><p style="width:165px; margin-left:5px;"><span>冰上曲棍球</span><font>580.00元</font></p></li>
                            <li><p><span class="address">北京</span><font>75****sc</font></p><p style="width:165px; margin-left:5px;"><span>水果老虎机</span><font>680.00元 </font></p></li>
                            <li><p><span class="address">黑龙江</span><font>boj***6</font></p><p style="width:165px; margin-left:5px;"><span>阿瓦隆2</span><font>3,600.00元</font></p></li>
                            <li><p><span class="address">北京</span><font>yul****gh</font></p><p style="width:165px; margin-left:5px;"><span>不朽的浪漫</span><font>480.00元 </font></p></li>
                            <ul id="demo2"></ul>
                        </ul>
                    </ul></div>
                <div class="Game_left left-bigNum">
                    <div class="lg">
                        <div class="big-num" id="jack">16,387,950.00</div>
                    </div>

                </div>
            </div>

            <div class="Game_people">
                <img class="rww" style="opacity: 0;" src="{{ asset('/web/mb18/images/rw.png') }}">
                <img class="rw_pics" src="{{ asset('/web/mb18/images/ks3_03.png') }}" style="opacity: 0;">
                <img class="buy_pics" src="{{ asset('/web/mb18/images/ks4_03.png') }}" style="opacity: 1;">
                <img class="buy_pic" src="{{ asset('/web/mb18/images/buy.png') }}" style="opacity: 0;">
            </div>
        </div>
    </div>
    <script>
        $(function(){
            function nav(btn,div,pic){
                this.btn=btn;
                this.div=div;
                this.pic=pic;
            }
            nav.prototype.pn=function(){
                var s=$(this.btn);
                var d=$(this.div);
                var c=$(this.pic);
                s.mouseenter(function(){
                    i=$(this).index();
                    s.removeClass('cur');
                    $(this).addClass('cur');
                    if(i<4){
                        d.css({
                            display:'none'
                        });
                        d.css({
                            opacity:0
                        });
                        d.eq(i).css({
                            display:'block'
                        });
                        setTimeout(function(){
                            d.eq(i).css({
                                opacity:1
                            });
                        },10);
                        c.css({
                            opacity:0
                        });
                        c.eq(i).css({
                            opacity:1
                        });
                        $('.btn_c').removeClass('a-fadeinT');
                        if(i==1){
                            $('.btn_c').addClass('a-fadeinT');
                        }
                    }
                })
            }
            var p1=new nav('.Game_left .cl li','.Game_xx .Game_g1','.Game_people img');
            p1.pn();
            var demo=document.getElementById('demo');
            var demo1=document.getElementById('demo1');
            var demo2=document.getElementById('demo2');
            var speed=50
            demo2.innerHTML=demo1.innerHTML;

            function Marquee(){
                if(demo2.offsetHeight-demo.scrollTop<=0)
                    demo.scrollTop-=demo1.offsetHeight
                else{
                    demo.scrollTop++
                }
            }
            var MyMar=setInterval(Marquee,speed)
            demo.onmouseover=function() {
                clearInterval(MyMar)
            }
            demo.onmouseout=function() {
                MyMar=setInterval(Marquee,speed)
            }
            Marquee();
        })
    </script>

    <div class="home-mobile">
        <div class="container1">
            <div class="left-txt">
                <div class="top-txt">
                    <h3 class="title">随时随地 想玩就玩</h3>
                    <p class="en">Mobile Betting Introduction</p>
                </div>
                <p class="cn">全新模式，新颖设计更耐玩，汇集诸多精彩一一呈现；各国博彩精英、世界顶级博彩服务团队打造，享受随时随地、足不出户的博彩“游戏人生”!</p>
                <a href="{{ $_system_config->app_link }}" target="_blank;" class="btn">查看详情<i class="iconfont">➤</i></a>
            </div>
            <div class="right-img">
                <img class="big-img" src="{{ asset('/web/mb18/images/mobile-img.jpg') }}">
            </div>
        </div>
    </div>

    <div class="home-about">
        <div class="container1">
            <div class="top-wrap">
                <h3 class="title"><span>关于我们</span> / About us</h3>
                <p class="cn">{{ $_system_config->site_name }}是一家非牟利的俱乐部组织，负责提供彩票游戏，電子游戏、<br>體育及博彩娱乐。马会由香港政府批准，专营香港的赛马、慈善机<br>构，每年的慈善捐献仅少于东华三院和公益金。2003年起，在马会<br>的鼓励下香港政府通过法例.....</p>
                <img src="{{ asset('/web/mb18/images/about-img.jpg') }}">
            </div>
            <div class="btm-wrap">
                <div class="circle-txt">
                    <ul>
                        <li>
                            <p class="num"><span>3</span>秒</p>
                            <p class="txt">存款到账</p>
                        </li>
                        <li>
                            <p class="num"><span>5</span>秒</p>
                            <p class="txt">取款到账</p>
                        </li>
                        <li>
                            <p class="num"><span>20</span>家</p>
                            <p class="txt">合作银行</p>
                        </li>
                        <li>
                            <p class="num"><span>12</span>家</p>
                            <p class="txt">游戏平台</p>
                        </li>
                    </ul>
                </div>
                <div class="data-txt">
                    <h4 class="title">最近24小时数据</h4>
                    <ul>
                        <li>
                            活跃用户数
                            <div class="line">
                                <span style="width: 65%;" class="num-ren">376,654人</span>
                            </div>
                        </li>
                        <li>
                            累计注单量
                            <div class="line">
                                <span style="width: 75%;" class="num-dan">416,919,864注</span>
                            </div>
                        </li>
                        <li>
                            累计存提款
                            <div class="line">
                                <span style="width: 85%;" class="num-bie">83650笔/30秒每笔</span>
                            </div>
                        </li>
                        <li>
                            累计派彩量
                            <div class="line">
                                <span style="width: 95%;" class="num-money">￥34593340.00元</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function() {

            var num_1 = 79465;
            var $num_1 = $(".num-bie");
            setInterval(function() {
                num_1 += parseInt(Math.random() * 10);
                $num_1.html(num_1 + "笔/30秒每笔");
            }, 500);
            var num_2 = 34545847;
            var $num_2 = $(".num-money");
            setInterval(function() {
                num_2 += parseInt(Math.random() * 100);
                $num_2.html("￥" + num_2 + ".00元");
            }, 500);


            var num_3 = 329543;
            var $num_3 = $(".num-ren");
            setInterval(function() {
                num_3 += parseInt(Math.random() * 100);
                $num_3.html( formatNumber(num_3) + "人");
            }, 500);
            var num_4 = 416873546;
            var $num_4 = $(".num-dan");
            setInterval(function() {
                num_4 += parseInt(Math.random() * 100);
                $num_4.html( formatNumber(num_4) + "注");
            }, 500);




            function formatNumber(num) {
                var decimalPart = '';
                num = num.toString();
                if (num.indexOf('.') != -1) {
                    decimalPart = '.' + num.split('.')[1];
                    num = parseInt(num.split('.')[0]);
                }
                var array = num.toString().split('');
                var index = -3;
                while (array.length + index > 0) {
                    // 从单词的最后每隔三个数字添加逗号
                    array.splice(index, 0, ',');
                    index -= 4;
                }
                return array.join('') + decimalPart;
            };





        }
    </script>
@endsection
