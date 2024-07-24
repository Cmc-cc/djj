@extends('web.layouts.main')
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
    <div class="nivoSlider" id="Sliderbanner">
        <ul id="au" class="mianbanner">
            {{--@foreach($banners as $item)--}}
            {{--<li><a><img src="{{ $item->path }}"/></a></li>--}}
            {{--@endforeach--}}
            <li><a id="img1"><img src="{{ asset('/web/images/444.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/web/images/333.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/web/images/111.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/web/images/222.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/web/images/555.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/web/images/666.jpg') }}"/></a></li>
        </ul>


        <div class="sidecenter" id="middle-pic">


            <ul class="lunbo">
                <li class="active" id="t0"></li>
                <li class="bg" id="t1"></li>
                <li class="bg" id="t2"></li>
                <li class="bg" id="t3"></li>
                <li class="bg" id="t4"></li>
                {{--<li class="bg" id="t5"></li>--}}
            </ul>
        </div>


        <a class="nivo-prevNav">左</a>
        <a class="nivo-nextNav">右</a>


        <!--公告栏组件-->
        <div class="mainNotice" id="NoticeMiddle">
            <div class="mainNoticeCenter">
                <span class="newsIc">最新公告 / news</span>
                <!--公告-->
                <div id="NoticeBoard_Direction_Left_Container_E759m3e3wb" class="Hscrolltxt">
                    <marquee id="mar0" behavior="scroll" direction="left"  onMouseOut="this.start()" onMouseOver="this.stop()">
                        @foreach($_system_notices as $v)
                            <div class="module">
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>

                <!--公告 end-->
            </div>
        </div>
        <!--公告栏组件 end-->


    </div>

    <div class="home-one">
        <div class="container">
            <h2 class="title">{{ $_system_config->site_name }}，最专业的网上博彩平台</h2>
            <p class="address">{{ $_system_config->site_domain }}</p>
            <ul>
                <li>
                    <a hidefocus="true" href="{{route('web.eGame')}}" target="_blank">
                        <img src="{{ asset('/web/images/home-one1.jpg') }}" alt="">
                        <p class="cn">電子游艺</p>
                        <p class="en">Slots</p>
                    </a>
                </li>
                <li>
                    <a hidefocus="true" target="_blank" href="{{route('web.liveCasino')}}"
                       onclick="return Com_Gametree_Cashap.App.getOnlyMemberLogin();">
                        <img src="{{ asset('/web/images/home-one2.jpg') }}" alt="">
                        <p class="cn">真人娱乐</p>
                        <p class="en">Live casino</p>
                    </a>
                </li>
                <li class="center">
                    <img src="{{ asset('/web/images/home-one5.jpg') }}" alt="">
                </li>
                <li>
                    <a hidefocus="true" href="{{route('web.lottory')}}">
                        <img src="{{ asset('/web/images/home-one3.jpg') }}" alt="">
                        <p class="cn">幸运彩票</p>
                        <p class="en">Lottery</p>
                    </a>
                </li>
                <li class="last">
                    <a hidefocus="true" href="{{route('web.esports')}}">
                        <img src="{{ asset('/web/images/home-one4.jpg') }}" alt="">
                        <p class="cn">體育竞猜</p>
                        <p class="en">Sports</p>
                    </a>
                </li>
            </ul>
            <img class="btm-txt" src="{{ asset('/web/images/home-one6.jpg') }}" alt="">
        </div>
    </div>

    <div class="itemwarp">
        <div class="itemcenter clear">
            <a class="itemico01"><strong>奖励多</strong>
                <p>极品奖励刷不停</p></a>
            <a class="itemico02"><strong>人气足</strong>
                <p>5000万注册，百万同时在线</p></a>
            <a class="itemico03"><strong>安全可靠</strong>
                <p>金牌运营，全球领先</p></a>
            <a class="itemico04"><strong>官网负责团队</strong>
                <p>1000人国际精英</p></a>
        </div>
    </div>

    <div class="wrapper">

        <div class="about-tab clearfix">
            <div class="bd">
                <div class="list about">
                    <div class="content">
                        <h2 class="title">公司简介<span class="en">/ Company Profile</span></h2>
                        <p class="txt">{{ $_system_config->site_name }}一切博彩营业行为皆遵从澳门政府博彩条约。
                            我们在越来越热的网络博彩市场中，不断地求新求变，寻找最新的创意，秉持最好的服务。以带给广大游戏玩家高质量的服务、产品、娱乐，是我们企业永恒的宗旨。</p>
                        <span class="onbtn">形象代言：贝克汉姆</span>
                    </div>
                    <img src="{{ asset('/web/images/beckham.jpg') }}" class="img" alt="">
                </div>
            </div>
            <!--第一个选项卡 end-->


            <ul class="tabMune">
                <li class="tabup">
                    <a href="/member/userCenter">
                        <span class="companylogo">会员中心</span>
                        <p class="cn">会员中心</p>
                        <p class="en">VIP Member</p>

                    </a>
                </li>
                <li class="two tabup">
                    <a href="/member/finance_center">
                        <span class="GTlogo">充值中心</span>
                        <p class="cn">充值中心</p>
                        <p class="en">Recharge center</p>

                    </a>
                </li>
                <li class="three tabup">
                    <a href="javascript:;" target="_blank">
                        <span class="AGlogo">官方网址 </span>
                        <p class="cn">官方网址 </p>
                        <p class="en">{{ $_system_config->site_domain }}</p>

                    </a>
                </li>
                <li class="four tabup">
                    <a href="javascript:;" target="_blank">
                        <span class="Servicelogo">每日超高返水</span>
                        <p class="cn">每日超高返水</p>
                        <p class="en">Daily wage weekly salary</p>

                    </a>
                </li>
            </ul>

        </div>


        <!--选项卡 end-->

        <div class="home-mobile">
            <div class="weima">
                <img src="{{ $_system_config->wap_qrcode }}" alt="">
            </div>
            <p class="txt">全新手机服务体验，新颖的设计更好玩更便捷，为玩家呈现了多款平台热门游戏，这里集聚各国精英服务团队，更多的高尚奢华待遇，为您打造随时随地足不出户游戏新人生！</p>
            {{--<a href="javascript:;" class="iconfont">了解更多</a>--}}
        </div>

        <div class="home-msg">
            <img src="{{ asset('/web/images/q-lion1.jpg') }}" alt="" class="hover one">
            <img src="{{ asset('/web/images/q-lion2.jpg') }}" alt="" class="hover two">
            <img src="{{ asset('/web/images/q-lion3.jpg') }}" alt="" class="hover three">
            <img src="{{ asset('/web/images/q-lion4.jpg') }}" alt="" class="hover four">
            <img src="{{ asset('/web/images/q-lion5.jpg') }}" alt="" class="hover five">
            <img src="{{ asset('/web/images/q-lion6.jpg') }}" alt="" class="hover six">
        </div>


    </div>







@endsection
