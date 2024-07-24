@extends('web.template.mb28.layouts.main')
@section('after.js')
    <link href="/bundles/home.css?v=kEJfj5m3p32HDyN-DPIJd3Namr0MZwylZT3l0yoYBLk1" rel="stylesheet"/>
    @if($_system_config->is_alert_on == 0)
        <div id="modal-tit" class="modal modal-login">
            <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
                <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
                <a href="javascript:;">
                    <img style="width: 100%" src="{{ $_system_config->alert_img }}" alt="">
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

    <!--
             <div id="banner">
    <div class="nivoSlider" id="Sliderbanner">
        <ul id="au" class="mianbanner">
            {{--@foreach($banners as $item)--}}
    {{--<li><a><img src="{{ $item->path }}"/></a></li>--}}
    {{--@endforeach--}}
            <li><a id="img1"><img src="{{ asset('/bundles/images/1.jpg') }}"/></a></li>
           <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/2.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/3.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/4.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/5.jpg') }}"/></a></li>
         <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/6.jpg') }}"/></a></li>
			  <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/7.jpg') }}"/></a></li>
			<!-- <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/08.jpg') }}"/></a></li>--
        </ul>


        <div class="sidecenter" id="middle-pic">


            <ul class="lunbo">
                <li class="active" id="t0"></li>
                 <li class="bg" id="t1"></li>
                <li class="bg" id="t2"></li>
                <li class="bg" id="t3"></li>
                <li class="bg" id="t4"></li>
               <li class="bg" id="t5"></li>
				<li class="bg" id="t6"></li>
               <!-- <li class="bg" id="t7"></li>--
            </ul>
        </div>


       <!-- <a class="nivo-prevNav">左</a>
        <a class="nivo-nextNav">右</a>--
 </div>


    </div>
-->
    <div id="banner">




        <section id="slide-banner" ng-controller="LobbiesCtrl"
                 slide-banner
                 slide-delay="500"
                 slide-duration="3000"
                 slide-effect="fold"
                 slide-ease="swing"
                 slide-trigger="click">
            <div class="slide"></div>
            <ul class="slide-pager"></ul>
        </section>

    </div>



    <div id="news" popup-news class="home-news mar0">
        <div class="wrapper" news-position >

            <marquee onmouseover="this.stop()" onmouseout="this.start()" style="float:left; color:#fff; font-size:14px; line-height:30px;position:relative;left:80px;margin-top:-35px;" scrollAmount=5 width=913>
                @foreach($_system_notices as $v)
                    <ul id="hot-news" ng-click="newsClick()">
                        ~{{ $v->title }}~{{ $v->content }}

                    </ul>
                @endforeach
            </marquee>

        </div>


    </div>




    <div id="content">
        <div class="wrapper">


            <div id="home" ng-controller="LobbiesCtrl">
                <div class="slider-left wow fadeInUp"
                     carousel-slider
                     super-vis="10"
                     super-play="true"
                     super-effect="leftLoop">
                    <span class="prev"></span>
                    <span class="next"></span>
                    <div class="main-cell">
                        <ul class="game-list">
                            @if(in_array('SG', $_api_list))
                            <li game-box="sg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-class="{'active': show=='sg'}">新霸 電子</li>
                            @endif
                            <li game-box="fish" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')" ng-mouseover="show='fish'" ng-class="{'active': show=='fish'}">捕魚达人</li>
                                @if(in_array('CQ9', $_api_list))
                            <li game-box="cq9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')" ng-mouseover="show='cq9'" ng-class="{'active': show=='cq9'}">传奇電子</li>
                                @endif
                                @if(in_array('MG', $_api_list))
                            <li game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" ng-mouseover="show='mg'" ng-class="{'active': show=='mg'}"><span></span>MG電子</li>
                                @endif
                                @if(in_array('AG', $_api_list))
                            <li game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" ng-mouseover="show='ag'" ng-class="{'active': show=='ag'}">AG電子</li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pt'" ng-class="{'active': show=='pt'}">PT電子</li>
                                @endif
                                @if(in_array('GNS', $_api_list))
                            <li game-box="gns" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')" ng-mouseover="show='gns'" ng-class="{'active': show=='gns'}">GNS電子</li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li game-box="gpi" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')" ng-mouseover="show='gpi'" ng-class="{'active': show=='gpi'}">GPI電子</li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" ng-mouseover="show='prg'" ng-class="{'active': show=='prg'}">PP電子</li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" ng-mouseover="show='mw'" ng-class="{'active': show=='mw'}">MW電子</li>
                                @endif
                                @if(in_array('HB', $_api_list))
                            <li game-box="hb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" ng-mouseover="show='hb'" ng-class="{'active': show=='hb'}">HB電子</li>
                                @endif
                                @if(in_array('JDB', $_api_list))
                            <li game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" ng-mouseover="show='jdb'" ng-class="{'active': show=='jdb'}">夺宝電子</li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li game-box="bb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')" ng-mouseover="show='bb'" ng-class="{'active': show=='bb'}">BBIN電子</li>
                                    @endif
                        </ul>
                    </div>
                </div>
                <div id="hotgame" ng-init="show='sg'">
                    @if(in_array('SG', $_api_list))
                    <ul class="sggame wow flipInX" ng-show="show=='sg'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>财神888</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>天降财神</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>深林狂欢季</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>五龙吐珠</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>狮心王SA</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>发发发</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>潘金莲 特别版</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>爸爸飞那儿</span></p>
                        </li>
                    </ul>
                    @endif
                        @if(in_array('MG', $_api_list))
                    <ul class="mggame" ng-show="show=='mg'">
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>摆脱</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>宝石连线</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>胸围银行</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>不朽的浪漫</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>伴娘我最大</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>海滨嘉年华</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>淑女之夜</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>心跳时刻</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('PT', $_api_list))
                    <ul class="ptgame" ng-show="show=='pt'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>深海大赢家</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>古怪猴子</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>湛蓝深海</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>招财童子</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>白狮王</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>招财进宝</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>熊之舞</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>船长的宝藏</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('AG', $_api_list))
                    <ul class="aggame" ng-show="show=='ag'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>捕魚王2代</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>灵猴献瑞</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>水果拉霸</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>复古花园</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>性感女仆</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>海底漫游</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>海盗王</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>海洋剧场</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('MW', $_api_list))
                    <ul class="mwgame" ng-show="show=='mw'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>千炮捕魚</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>超级斗地主</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>森林舞会</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>水浒传</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>黄金777</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>五龙吐珠</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>百乐牛牛</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>洪福齐天</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('HB', $_api_list))
                    <ul class="hbgame" ng-show="show=='hb'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>龙之宝座</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>太空宝藏</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>炸弹追击</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>发财神</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>鬼屋</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>十二生肖</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>海洋之音</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>凤凰</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                    <ul class="bbgame" ng-show="show=='bb'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>糖果派对</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>连环夺宝</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>糖果派对2</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>喜猴福年</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>沙滩排球</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>喜福牛年</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>西游记</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>疯狂水果盘</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('JDB', $_api_list))
                    <ul class="jdbgame" ng-show="show=='jdb'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>唐伯虎</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>飞龙在天</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>台湾黑熊</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>齐天大圣</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>过新年</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>悟空</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>幸运龙</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>芝麻开门</span></p>
                        </li>
                    </ul>
                        @endif
                    <ul class="fishgame" ng-show="show=='fish'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>龙王捕魚</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>捕魚王</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>千炮捕魚</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>深海大赢家</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>龙王捕魚2</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>全民捕魚</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>鱼王争霸</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('web.catchFish') }}','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>寻宝捕魚王</span></p>
                        </li>
                    </ul>
                        @if(in_array('GNS', $_api_list))
                    <ul class="gnsgame" ng-show="show=='gns'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>神枪独角兽</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>女帝崛起</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>草原争霸</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>五行传说</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>啤酒盛宴</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>熊猫发财记</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>妖精传奇</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>招福钱龟</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('GPI', $_api_list))
                    <ul class="gpigame" ng-show="show=='gpi'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>金瓶梅</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>四大美女</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>经典老虎机</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>摇钱树</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>甜蜜蜜</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>海盗寻宝</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>夜店</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>招财猫</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('PP', $_api_list))
                    <ul class="prggame" ng-show="show=='prg'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>神龙界</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>永恒钻石 3线</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>龙8</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>西游记</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>野狼黄金</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>极速糖果</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>无敌金刚</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>女神戈帝梵</span></p>
                        </li>
                    </ul>
                        @endif
                        @if(in_array('CQ9', $_api_list))
                    <ul class="cq9game" ng-show="show=='cq9'" ng-cloak>
                        <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>金玉满堂</span></p>
                        </li>
                        <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>金鸡报喜</span></p>
                        </li>
                        <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>五福临门</span></p>
                        </li>
                        <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>跳起来</span></p>
                        </li>
                        <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>钟馗运财</span></p>
                        </li>
                        <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>钻石水果王</span></p>
                        </li>
                        <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>水世界</span></p>
                        </li>
                        <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                            <div class="pic"></div>
                            <p><span>火烧连环船</span></p>
                        </li>
                    </ul>
                        @endif
                    {{--<ul class="negame" ng-show="show=='ne'" ng-cloak>
                        <li class="img1" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>小红帽</span></p>
                        </li>
                        <li class="img2" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>吸血鬼</span></p>
                        </li>
                        <li class="img3" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>贡多的冒险</span></p>
                        </li>
                        <li class="img4" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>星爆</span></p>
                        </li>
                        <li class="img5" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>热带岛屿</span></p>
                        </li>
                        <li class="img6" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>富小猪</span></p>
                        </li>
                        <li class="img7" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>金字塔</span></p>
                        </li>
                        <li class="img8" ng-click="toNetentHtml()">
                            <div class="pic"></div>
                            <p><span>丧尸</span></p>
                        </li>
                    </ul>
                    <ul class="rtgame" ng-show="show=='rt'" ng-cloak>
                        <li class="img1" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>五福临门</span></p>
                        </li>
                        <li class="img2" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>凤凰涅槃</span></p>
                        </li>
                        <li class="img3" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>龙之谕</span></p>
                        </li>
                        <li class="img4" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>西游寻宝</span></p>
                        </li>
                        <li class="img5" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>恭贺新禧</span></p>
                        </li>
                        <li class="img6" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>灰姑娘</span></p>
                        </li>
                        <li class="img7" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>水果大爆炸</span></p>
                        </li>
                        <li class="img8" ng-click="toRedTigerHtml()">
                            <div class="pic"></div>
                            <p><span>三国争霸</span></p>
                        </li>
                    </ul>
                    <ul class="gagame" ng-show="show=='ga'" ng-cloak>
                        <li class="img1" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>88年财富</span></p>
                        </li>
                        <li class="img2" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>三王</span></p>
                        </li>
                        <li class="img3" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>卡里古拉</span></p>
                        </li>
                        <li class="img4" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>种钱得钱2</span></p>
                        </li>
                        <li class="img5" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>雷声鸟</span></p>
                        </li>
                        <li class="img6" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>魔龙</span></p>
                        </li>
                        <li class="img7" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>老虎的心</span></p>
                        </li>
                        <li class="img8" ng-click="toGameArtHtml()">
                            <div class="pic"></div>
                            <p><span>寻金之旅</span></p>
                        </li>
                    </ul>
                    <ul class="pggame" ng-show="show=='pg'" ng-cloak>
                        <li class="img1" ng-click="toPgHtml()">
                            <div class="pic"></div>
                            <p><span>动物星球</span></p>
                        </li>
                        <li class="img2" ng-click="toPgHtml()">
                            <div class="pic"></div>
                            <p><span>福禄寿喜</span></p>
                        </li>
                        <li class="img3" ng-click="toPgHtml()">
                            <div class="pic"></div>
                            <p><span>猴子爬树</span></p>
                        </li>
                        <li class="img4" ng-click="toPgFish()">
                            <div class="pic"></div>
                            <p><span>全民捕魚</span></p>
                        </li>
                        <li class="img5" ng-click="toPgHtml()">
                            <div class="pic"></div>
                            <p><span>西游争霸</span></p>
                        </li>
                        <li class="img6" ng-click="toPgHtml()">
                            <div class="pic"></div>
                            <p><span>迎财神</span></p>
                        </li>
                        <li class="img7" ng-click="toPgFish()">
                            <div class="pic"></div>
                            <p><span>鱼王争霸</span></p>
                        </li>
                        <li class="img8" ng-click="toPgHtml()">
                            <div class="pic"></div>
                            <p><span>查看更多</span></p>
                        </li>
                    </ul>
                    <ul class="lggame" ng-show="show=='lg'" ng-cloak>
                        <li class="img1" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>即时马车赛</span></p>
                        </li>
                        <li class="img2" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>即时赛车</span></p>
                        </li>
                        <li class="img3" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>即时赛马</span></p>
                        </li>
                        <li class="img4" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>即时自行车赛</span></p>
                        </li>
                        <li class="img5" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>虚拟马车赛</span></p>
                        </li>
                        <li class="img6" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>虚拟赛车</span></p>
                        </li>
                        <li class="img7" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>虚拟赛马</span></p>
                        </li>
                        <li class="img8" ng-click="toLgHtml()">
                            <div class="pic"></div>
                            <p><span>虚拟网球赛</span></p>
                        </li>
                    </ul>
                    <ul class="isbgame" ng-show="show=='isb'" ng-cloak>
                        <li class="img1" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>百万分</span></p>
                        </li>
                        <li class="img2" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>财富树</span></p>
                        </li>
                        <li class="img3" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>凯撒的礼物</span></p>
                        </li>
                        <li class="img4" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>忍者大</span></p>
                        </li>
                        <li class="img5" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>森林狂欢会</span></p>
                        </li>
                        <li class="img6" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>少年旋转</span></p>
                        </li>
                        <li class="img7" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>幸运3</span></p>
                        </li>
                        <li class="img8" ng-click="toIsbHtml()">
                            <div class="pic"></div>
                            <p><span>皇家现金</span></p>
                        </li>
                    </ul>--}}
                </div>
                <div id="slide-img" class="wow fadeInUp">
                    <div class="main-cell">
                        <ul>
                            <li>
                                玩家 tr77***999
                                <br />在不朽的浪漫 游戏 赢得56644 元
                            </li>
                            <li>
                                玩家 QGS2***926
                                <br />在胸围银行 游戏 赢得43535 元
                            </li>
                            <li>
                                玩家 tg32***321
                                <br />在摆脱 游戏 赢得454345 元
                            </li>
                            <li>
                                玩家 deS1***333
                                <br />在丛林快讯 游戏 赢得645646 元
                            </li>
                            <li>
                                玩家 dje***456
                                <br />在招财进宝 游戏 赢得456500 元
                            </li>
                            <li>
                                玩家 yt34***933
                                <br />在三倍猴子 游戏 赢得768500 元
                            </li>
                            <li>
                                玩家 tr67***457
                                <br />在招财进宝 游戏 赢得677500 元
                            </li>
                            <li>
                                玩家 er56***238
                                <br />在湛蓝深海 游戏 赢得565570 元
                            </li>
                            <li>
                                玩家 yy77***123
                                <br />在复古花园 游戏 赢得376500 元
                            </li>
                            <li>
                                玩家 kk78***756
                                <br />在太空漫游 游戏 赢得567800 元
                            </li>
                            <li>
                                玩家 a546***768
                                <br />在麻将老虎机 游戏 赢得78800 元
                            </li>
                            <li>
                                玩家 l454***996
                                <br />在水果拉霸 游戏 赢得80000 元
                            </li>
                            <li>
                                玩家 k556***980
                                <br />在AG捕魚王 游戏 赢得78999 元
                            </li>
                            <li>
                                玩家 u867***656
                                <br />在糖果派对 游戏 赢得787890 元
                            </li>
                            <li>
                                玩家 l657***575
                                <br />在连环夺宝 游戏 赢得688800 元
                            </li>
                            <li>
                                玩家 l657***643
                                <br />在糖果派对2 游戏 赢得786666 元
                            </li>
                            <li>
                                玩家 UUY6***667
                                <br />在白狮王 游戏 赢得460000 元
                            </li>
                            <li>
                                玩家 UYH4***764
                                <br />在三倍猴子 游戏 赢得40000 元
                            </li>
                            <li>
                                玩家 tr67***854
                                <br />在招财进宝 游戏 赢得200000 元
                            </li>
                            <li>
                                玩家 er56***568
                                <br />在招财进宝 游戏 赢得120000 元
                            </li>
                            <li>
                                玩家 YY7***100
                                <br />在千炮捕魚 游戏 赢得36000 元
                            </li>
                            <li>
                                玩家 k888***566
                                <br />在百家乐 游戏 赢得780000 元
                            </li>
                            <li>
                                玩家 a546***999
                                <br />在百家乐 游戏 赢得565000 元
                            </li>
                            <li>
                                玩家 l454***909
                                <br />在百家乐 游戏 赢得800000 元
                            </li>
                            <li>
                                玩家 k556***965
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 u867***567
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 Y665***543
                                <br />在百家乐 游戏 赢得765700 元
                            </li>
                            <li>
                                玩家 U877***667
                                <br />在百家乐 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k845***566
                                <br />在百家乐 游戏 赢得780000 元
                            </li>
                            <li>
                                玩家 a546***777
                                <br />在百家乐 游戏 赢得565000 元
                            </li>
                            <li>
                                玩家 l454***909
                                <br />在百家乐 游戏 赢得800000 元
                            </li>
                            <li>
                                玩家 k556***965
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 u867***567
                                <br />在百家乐 游戏 赢得130000 元
                            </li>
                            <li>
                                玩家 Y665***543
                                <br />在百家乐 游戏 赢得765700 元
                            </li>
                            <li>
                                玩家 U877***667
                                <br />在百家乐 游戏 赢得570000 元
                            </li>
                            <li>
                                玩家 k838***566
                                <br />在百家乐 游戏 赢得780000 元
                            </li>
                            <li>
                                玩家 a546***777
                                <br />在百家乐 游戏 赢得565000 元
                            </li>
                            <li>
                                玩家 l454***909
                                <br />在百家乐 游戏 赢得800000 元
                            </li>
                            <li>
                                玩家 k556***965
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 u867***567
                                <br />在百家乐 游戏 赢得355000 元
                            </li>
                            <li>
                                玩家 Y665***543
                                <br />在百家乐 游戏 赢得765700 元
                            </li>
                            <li>
                                玩家 U807***667
                                <br />在百家乐 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k098***566
                                <br />在百家乐 游戏 赢得780000 元
                            </li>
                            <li>
                                玩家 a546***666
                                <br />在百家乐 游戏 赢得565000 元
                            </li>
                            <li>
                                玩家 l454***909
                                <br />在百家乐 游戏 赢得800000 元
                            </li>
                            <li>
                                玩家 k556***965
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 u867***567
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 Y665***543
                                <br />在百家乐 游戏 赢得765700 元
                            </li>
                            <li>
                                玩家 U843***667
                                <br />在百家乐 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k998***566
                                <br />在百家乐 游戏 赢得789000 元
                            </li>
                            <li>
                                玩家 a546***555
                                <br />在百家乐 游戏 赢得565000 元
                            </li>
                            <li>
                                玩家 l454***909
                                <br />在百家乐 游戏 赢得800000 元
                            </li>
                            <li>
                                玩家 liu6***965
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 u867***567
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 Y665***543
                                <br />在百家乐 游戏 赢得765700 元
                            </li>
                            <li>
                                玩家 U887***667
                                <br />在百家乐 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k878***566
                                <br />在百家乐 游戏 赢得780000 元
                            </li>
                            <li>
                                玩家 a546***444
                                <br />在百家乐 游戏 赢得565000 元
                            </li>
                            <li>
                                玩家 l454***909
                                <br />在百家乐 游戏 赢得890000 元
                            </li>
                            <li>
                                玩家 zhang***965
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 u867***567
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 Y665***543
                                <br />在百家乐 游戏 赢得765700 元
                            </li>
                            <li>
                                玩家 li77***667
                                <br />在百家乐 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k088***566
                                <br />在百家乐 游戏 赢得780000 元
                            </li>
                            <li>
                                玩家 a546***333
                                <br />在百家乐 游戏 赢得565000 元
                            </li>
                            <li>
                                玩家 l454***909
                                <br />在百家乐 游戏 赢得800000 元
                            </li>
                            <li>
                                玩家 k665***977
                                <br />在百家乐 游戏 赢得1000000 元
                            </li>
                            <li>
                                玩家 u858***567
                                <br />在百家乐 游戏 赢得100000 元
                            </li>
                            <li>
                                玩家 Y565***776
                                <br />在百家乐 游戏 赢得765700 元
                            </li>
                            <li>
                                玩家 t656***665
                                <br />在百家乐 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k333***533
                                <br />在彩票 游戏 赢得230000 元
                            </li>
                            <li>
                                玩家 wzw3***444
                                <br />在彩票 游戏 赢得535000 元
                            </li>
                            <li>
                                玩家 l353***404
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 k553***435
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 u332***532
                                <br />在彩票 游戏 赢得200000 元
                            </li>
                            <li>
                                玩家 Y335***533
                                <br />在彩票 游戏 赢得235200 元
                            </li>
                            <li>
                                玩家 U322***332
                                <br />在彩票 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k335***533
                                <br />在彩票 游戏 赢得230000 元
                            </li>
                            <li>
                                玩家 a533***222
                                <br />在彩票 游戏 赢得535000 元
                            </li>
                            <li>
                                玩家 l353***404
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 kk53***435
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 u332***532
                                <br />在彩票 游戏 赢得330000 元
                            </li>
                            <li>
                                玩家 Y335***533
                                <br />在彩票 游戏 赢得235200 元
                            </li>
                            <li>
                                玩家 U322***332
                                <br />在彩票 游戏 赢得520000 元
                            </li>
                            <li>
                                玩家 k678***530
                                <br />在彩票 游戏 赢得230000 元
                            </li>
                            <li>
                                玩家 a533***222
                                <br />在彩票 游戏 赢得535000 元
                            </li>
                            <li>
                                玩家 l353***404
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 k553***435
                                <br />在彩票 游戏 赢得303000 元
                            </li>
                            <li>
                                玩家 u302***532
                                <br />在彩票 游戏 赢得304000 元
                            </li>
                            <li>
                                玩家 Y335***533
                                <br />在彩票 游戏 赢得235200 元
                            </li>
                            <li>
                                玩家 U302***332
                                <br />在彩票 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k043***533
                                <br />在彩票 游戏 赢得230000 元
                            </li>
                            <li>
                                玩家 a533***333
                                <br />在彩票 游戏 赢得535000 元
                            </li>
                            <li>
                                玩家 l353***404
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 k553***435
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 u332***532
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 Y335***533
                                <br />在彩票 游戏 赢得235200 元
                            </li>
                            <li>
                                玩家 U333***332
                                <br />在彩票 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 wang3***533
                                <br />在彩票 游戏 赢得234000 元
                            </li>
                            <li>
                                玩家 cheng3***55
                                <br />在彩票 游戏 赢得535000 元
                            </li>
                            <li>
                                玩家 l353***404
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 mei53***435
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 gao32***532
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 Yt5***533
                                <br />在彩票 游戏 赢得235200 元
                            </li>
                            <li>
                                玩家 U332***332
                                <br />在彩票 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k323***533
                                <br />在彩票 游戏 赢得230000 元
                            </li>
                            <li>
                                玩家 a333***333
                                <br />在彩票 游戏 赢得535000 元
                            </li>
                            <li>
                                玩家 l353***404
                                <br />在彩票 游戏 赢得340000 元
                            </li>
                            <li>
                                玩家 k553***435
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 u302***532
                                <br />在彩票 游戏 赢得350000 元
                            </li>
                            <li>
                                玩家 Y335***533
                                <br />在彩票 游戏 赢得235200 元
                            </li>
                            <li>
                                玩家 U322***332
                                <br />在彩票 游戏 赢得500000 元
                            </li>
                            <li>
                                玩家 k003***533
                                <br />在彩票 游戏 赢得230000 元
                            </li>
                            <li>
                                玩家 a503***333
                                <br />在彩票 游戏 赢得535000 元
                            </li>
                            <li>
                                玩家 l053***404
                                <br />在彩票 游戏 赢得300000 元
                            </li>
                            <li>
                                玩家 k035***422
                                <br />在彩票 游戏 赢得3200000 元
                            </li>
                            <li>
                                玩家 u053***532
                                <br />在彩票 游戏 赢得306000 元
                            </li>
                            <li>
                                玩家 Y035***223
                                <br />在彩票 游戏 赢得230000 元
                            </li>
                            <li>
                                玩家 t053***335
                                <br />在彩票 游戏 赢得509000 元
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <audio src="https://cdn.igsttech.com/Web.Portal/MH001-01.Portal/Content/Views/Home/images/ms.1.mp3" style="display:none;" controls autoplay></audio>


        </div>
    </div>


@endsection
