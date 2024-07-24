@extends('web.template.mb23.layouts.main')
@section('after.js')

    @if($_system_config->is_alert_on == 0)
        <div id="modal-tit" class="modal modal-login">
            <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
                <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
                <a href="javascript:;">
                    <img style="width: 100%;" src="{{ $_system_config->alert_img }}" alt="">
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



    <div id="news">
          <div class="wrapper">
           <marquee onmouseover="this.stop()" onmouseout="this.start()" style="float:left; color:#fff; font-size:14px; line-height:30px;position:relative;left:10px;margin-top:4px;" scrollAmount=5 width=760>
		   @foreach($_system_notices as $v)
			 <ul class="news-list" ng-click="newsClick()">
~{{ $v->title }}~{{ $v->content }}

                        </ul>
						@endforeach
						</marquee>
            <div class="domain">
                <a href="javascript:void(0)">官网网址：<span>{{ $_system_config->site_domain }}</span></a>
            </div>
        </div>
    </div>

          <div id="banner">
    <div class="nivoSlider" id="Sliderbanner">
        <ul id="au" class="mianbanner">
            {{--@foreach($banners as $item)--}}
            {{--<li><a><img src="{{ $item->path }}"/></a></li>--}}
            {{--@endforeach--}}
            @foreach($banners as $item)
                <li>
                    <a id="img1">
                        <img src="{{$item->path}}"/></a>
                </li>
            @endforeach
            {{--<li>
                <a id="img1">
                    <img src="{{ asset('/bundles/images/01.jpg') }}"/></a>
            </li>
            <li style="display: none;">
                <a><img src="{{ asset('/bundles/images/02.jpg') }}"/>
                </a>
            </li>
            <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/03.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/04.jpg') }}"/></a></li>
            <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/05.jpg') }}"/></a></li>--}}
          <!--  <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/06.jpg') }}"/></a></li>
			 <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/07.jpg') }}"/></a></li>
			 <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/08.jpg') }}"/></a></li>-->
        </ul>


        <div class="sidecenter" id="middle-pic">


            <ul class="lunbo">
                <li class="active" id="t0"></li>
                <li class="bg" id="t1"></li>
                <li class="bg" id="t2"></li>
                <li class="bg" id="t3"></li>
{{--
                <li class="bg" id="t4"></li>
--}}
               <!-- <li class="bg" id="t5"></li>
				<li class="bg" id="t6"></li>
                <li class="bg" id="t7"></li>-->
            </ul>
        </div>


       <!-- <a class="nivo-prevNav">左</a>
        <a class="nivo-nextNav">右</a>-->
 </div>


    </div>


    <div id="content">
        <div class="wrapper">


<div id="home" ng-controller="LobbiesCtrl">
    <div class="slider-left wow fadeInUp"
         carousel-slider
         super-vis="8"
         super-play="true"
         super-effect="leftLoop">
        <span class="prev"></span>
        <span class="next"></span>
        <div class="main-cell">
            <ul class="game-list">
                @if(in_array('MG', $_api_list))
                <li game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" ng-mouseover="show='mg'" ng-class="{'active': show=='mg'}"><span></span>MG電子</li>
                @endif
                    @if(in_array('PT', $_api_list))
                <li game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pt'" ng-class="{'active': show=='pt'}">PT電子</li>
                    @endif
                    @if(in_array('AG', $_api_list))
                <li game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" ng-mouseover="show='ag'" ng-class="{'active': show=='ag'}">AG電子</li>
                    @endif
                    @if(in_array('MW', $_api_list))
                <li game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" ng-mouseover="show='mw'" ng-class="{'active': show=='mw'}">MW電子</li>
                    @endif
                    @if(in_array('SG', $_api_list))
                <li game-box="sg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-class="{'active': show=='sg'}">新霸電子</li>
                    @endif
                    @if(in_array('HB', $_api_list))
                <li game-box="hb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-mouseover="show='hb'" ng-class="{'active': show=='hb'}">HB電子</li>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                <li game-box="bb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')" ng-mouseover="show='bb'" ng-class="{'active': show=='bb'}">BBIN電子</li>
                    @endif
                    @if(in_array('JDB', $_api_list))
                <li game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" ng-mouseover="show='jdb'" ng-class="{'active': show=='jdb'}">夺宝電子</li>
                    @endif
                    @if(in_array('PP', $_api_list))
                <li game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" ng-mouseover="show='prg'" ng-class="{'active': show=='prg'}">PP電子</li>
                    @endif
                    @if(in_array('CQ9', $_api_list))
                <li game-box="cq9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')" ng-mouseover="show='cq9'" ng-class="{'active': show=='cq9'}">传奇電子</li>
                        @endif

            </ul>
        </div>
    </div>
    <div id="hotgame" ng-init="show='mg'">
        @if(in_array('MG', $_api_list))
        <ul class="mggame wow flipInX" ng-show="show=='mg'">
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>冰上曲棍球</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>宝石之轮</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>抢劫银行</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>黄金工厂</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>狂欢节</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>丛林快讯</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>打破大银行</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>海滨嘉年华</span></p>
            </li>
        </ul>
        @endif
            @if(in_array('PT', $_api_list))
        <ul class="ptgame" ng-show="show=='pt'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>日日进财</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>三倍猴子</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>深海大赢家</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>四象</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>好事成双</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>招财童子</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>金钱蛙</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>湛蓝深海</span></p>
            </li>
        </ul>
            @endif
            @if(in_array('AG', $_api_list))
        <ul class="aggame" ng-show="show=='ag'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>布袋和尚</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>疯狂马戏团</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>复古花园</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>鬼马小丑</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>海底漫游</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>海洋剧场</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>欢乐时光</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>灵猴献瑞</span></p>
            </li>
        </ul>
            @endif
            @if(in_array('MW', $_api_list))
        <ul class="mwgame" ng-show="show=='mw'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>HUGA</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>百乐牛牛</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>超级斗地主</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>好运5扑克</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>洪福齐天</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>黄金777</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>经典水果机</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>明星97</span></p>
            </li>
        </ul>
            @endif
            @if(in_array('SG', $_api_list))
        <ul class="sggame" ng-show="show=='sg'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>爸爸飞那儿</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>财神宝宝</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>发发发</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>黄金黥鱼</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>清龙白虎</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>新金靴世界杯</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>新父女战殭屍</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>新魔幻宝石</span></p>
            </li>
        </ul>
            @endif
            @if(in_array('HB', $_api_list))
        <ul class="hbgame" ng-show="show=='hb'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>百家乐零佣金</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>超级龙卷风</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>触电的小鸟</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>凤凰</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>公鸡王</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>海洋之音</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>黑手党</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>惊喜秀</span></p>
            </li>
        </ul>
            @endif
            @if(in_array('BBIN', $_api_list))
        <ul class="bbgame" ng-show="show=='bb'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>捕魚传奇</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>超级7</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>丛林</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>大红帽与小野狼</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>斗大</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>斗鸡</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>疯狂水果盘</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>海豚世界</span></p>
            </li>
        </ul>
            @endif
            @if(in_array('JDB', $_api_list))
        <ul class="jdbgame" ng-show="show=='jdb'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>飞龙在天</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>过新年</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>金鸡报囍</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>骆马大冒险</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>齐天大圣</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>唐伯虎点秋香</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>悟空</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>芝麻开门</span></p>
            </li>
        </ul>
            @endif

        <ul class="fishgame" ng-show="show=='fish'" ng-cloak>
            <li class="img1" ng-click="toAgFish()">
                <div class="pic"></div>
                <p><span>AG捕魚王</span></p>
            </li>
            <li class="img2" ng-click="toPgFish()">
                <div class="pic"></div>
                <p><span>PG鱼王争霸</span></p>
            </li>
            <li class="img3" ng-click="toMwFish()">
                <div class="pic"></div>
                <p><span>MW千炮捕魚</span></p>
            </li>
            <li class="img4" ng-click="toPtFish()">
                <div class="pic"></div>
                <p><span>PT深海大赢家</span></p>
            </li>
            <li class="img5" ng-click="toJdbFish()">
                <div class="pic"></div>
                <p><span>JDB龙王捕魚</span></p>
            </li>
            <li class="img6" ng-click="toGnsFish()">
                <div class="pic"></div>
                <p><span>GNS寻宝捕魚</span></p>
            </li>
        </ul>
        <ul class="gnsgame" ng-show="show=='gns'" ng-cloak>
            <li class="img1" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>冰上世界</span></p>
            </li>
            <li class="img2" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>草原争霸战</span></p>
            </li>
            <li class="img3" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>恐龙历险记</span></p>
            </li>
            <li class="img4" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>罗宾大探险</span></p>
            </li>
            <li class="img5" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>女帝崛起</span></p>
            </li>
            <li class="img6" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>女王争霸</span></p>
            </li>
            <li class="img7" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>欧足冠军杯</span></p>
            </li>
            <li class="img8" ng-click="toGnsHtml()">
                <div class="pic"></div>
                <p><span>啤酒盛宴</span></p>
            </li>
        </ul>
        <ul class="gpigame" ng-show="show=='gpi'" ng-cloak>
            <li class="img1" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>招财猫</span></p>
            </li>
            <li class="img2" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>四大神兽</span></p>
            </li>
            <li class="img3" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>经典老虎机</span></p>
            </li>
            <li class="img4" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>赌神</span></p>
            </li>
            <li class="img5" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>甜蜜蜜</span></p>
            </li>
            <li class="img6" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>财神到</span></p>
            </li>
            <li class="img7" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>英雄崛起</span></p>
            </li>
            <li class="img8" ng-click="toGpiFlash()">
                <div class="pic"></div>
                <p><span>摇钱树</span></p>
            </li>
        </ul>
            @if(in_array('PP', $_api_list))
        <ul class="prggame" ng-show="show=='prg'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>财神黄金</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>侏罗纪巨兽</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>GPK发发发龙</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>888GPK</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>GPK金列车</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>西游记</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>龙8</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>永恒钻石3线</span></p>
            </li>
        </ul>
            @endif
            @if(in_array('CQ9', $_api_list))
        <ul class="cq9game" ng-show="show=='cq9'" ng-cloak>
            <li class="img1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>钻石水果王</span></p>
            </li>
            <li class="img2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>跳起来</span></p>
            </li>
            <li class="img3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>抢银行</span></p>
            </li>
            <li class="img4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>钟馗运财</span></p>
            </li>
            <li class="img5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>跳高高</span></p>
            </li>
            <li class="img6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>跳起来2</span></p>
            </li>
            <li class="img7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>金鸡报喜</span></p>
            </li>
            <li class="img8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">
                <div class="pic"></div>
                <p><span>飞天</span></p>
            </li>
        </ul>
            @endif
        <ul class="negame" ng-show="show=='ne'" ng-cloak>
            <li class="img1" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>翻转卷轴</span></p>
            </li>
            <li class="img2" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>富小猪</span></p>
            </li>
            <li class="img3" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>贡多的冒险</span></p>
            </li>
            <li class="img4" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>墨西哥派对</span></p>
            </li>
            <li class="img5" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>权力水晶</span></p>
            </li>
            <li class="img6" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>热带岛屿</span></p>
            </li>
            <li class="img7" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>双重旋转</span></p>
            </li>
            <li class="img8" ng-click="toNetentHtml()">
                <div class="pic"></div>
                <p><span>星爆</span></p>
            </li>
        </ul>
        <ul class="rtgame" ng-show="show=='rt'" ng-cloak>
            <li class="img1" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>水果大爆炸</span></p>
            </li>
            <li class="img2" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>龙之谕</span></p>
            </li>
            <li class="img3" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>宝石暴走</span></p>
            </li>
            <li class="img4" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>五福临门</span></p>
            </li>
            <li class="img5" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>西游寻宝</span></p>
            </li>
            <li class="img6" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>幸运大转盘</span></p>
            </li>
            <li class="img7" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>财神</span></p>
            </li>
            <li class="img8" ng-click="toRedTigerHtml()">
                <div class="pic"></div>
                <p><span>凤凰涅槃</span></p>
            </li>
        </ul>
        <ul class="gagame" ng-show="show=='ga'" ng-cloak>
            <li class="img1" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>老虎的心</span></p>
            </li>
            <li class="img2" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>雷声鸟</span></p>
            </li>
            <li class="img3" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>种钱得钱2</span></p>
            </li>
            <li class="img4" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>魔龙</span></p>
            </li>
            <li class="img5" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>国王的财富</span></p>
            </li>
            <li class="img6" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>宝玉</span></p>
            </li>
            <li class="img7" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>寻金之旅</span></p>
            </li>
            <li class="img8" ng-click="toGameArtHtml()">
                <div class="pic"></div>
                <p><span>88年财富</span></p>
            </li>
        </ul>
        <ul class="pggame" ng-show="show=='pg'" ng-cloak>
            <li class="img1" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>西遊爭霸</span></p>
            </li>
            <li class="img2" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>迎財神</span></p>
            </li>
            <li class="img3" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>皇冠列車</span></p>
            </li>
            <li class="img4" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>動物星球</span></p>
            </li>
            <li class="img5" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>魚王爭霸</span></p>
            </li>
            <li class="img6" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>猴子爬樹</span></p>
            </li>
            <li class="img7" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>福祿壽喜</span></p>
            </li>
            <li class="img8" ng-click="toPgHtml()">
                <div class="pic"></div>
                <p><span>骰寶</span></p>
            </li>
        </ul>
        <div class="winner wow fadeInUp">
            <span>客户ID</span>
            <span>金额</span>
            <span>游戏名称</span>
            <div class="main-cell">
                <ul>
                    <li><span>db***s4</span><span class="num">82800.00</span><span>宝石联机</span></li>
                    <li><span>chia***olei</span><span class="num">229058.74</span><span>钻石列车</span></li>
                    <li><span>lid***78</span><span class="num">195134.48</span><span>足球拉霸</span></li>
                    <li><span>a6***15</span><span class="num">142301.41</span><span>蒸气炸弹</span></li>
                    <li><span>zhi***ua12</span><span class="num">292916.59</span><span>战火佳人</span></li>
                    <li><span>di***un</span><span class="num">242220.92</span><span>月光宝盒</span></li>
                    <li><span>hu1***9705</span><span class="num">254690.86</span><span>玉蒲团</span></li>
                    <li><span>am***314</span><span class="num">104053.17</span><span>鱼虾蟹</span></li>
                    <li><span>ni***29</span><span class="num">250827.13</span><span>夜市人生</span></li>
                    <li><span>lia***8888</span><span class="num">238539.33</span><span>幸运财神</span></li>
                    <li><span>jun***g105</span><span class="num">241416.61</span><span>星际大战</span></li>
                    <li><span>zgy5***223</span><span class="num">170452.97</span><span>喜福牛年</span></li>
                    <li><span>qiu***6310</span><span class="num">112372.99</span><span>喜福猴年</span></li>
                    <li><span>yl8***6</span><span class="num">133324.93</span><span>西游记</span></li>
                    <li><span>lds***225</span><span class="num">120855.02</span><span>王牌5PK</span></li>
                    <li><span>ab13***422352</span><span class="num">218046.58</span><span>外星争霸</span></li>
                    <li><span>jj1***59527</span><span class="num">242827.75</span><span>外星战记</span></li>
                    <li><span>Zhw***uf</span><span class="num">30063.79</span><span>筒子拉霸</span></li>
                    <li><span>fei***fei1122</span><span class="num">13541.8</span><span>天山侠侣传</span></li>
                    <li><span>ba***mei</span><span class="num">213411.69</span><span>特务危机</span></li>
                    <li><span>li***93</span><span class="num">279860.36</span><span>糖果派对</span></li>
                    <li><span>qq1***311</span><span class="num">111201.6</span><span>水果乐园</span></li>
                    <li><span>zdy***6146</span><span class="num">155124.7</span><span>水果拉霸</span></li>
                    <li><span>Qim***0608</span><span class="num">39664.07</span><span>尸乐园</span></li>
                    <li><span>ya***ng5200</span><span class="num">171983.74</span><span>圣兽传说</span></li>
                    <li><span>wan***nxin91</span><span class="num">237711.67</span><span>圣诞派对</span></li>
                    <li><span>vv***4327</span><span class="num">114689.48</span><span>神舟27</span></li>
                    <li><span>xio***34</span><span class="num">90579.81</span><span>沙滩排球</span></li>
                    <li><span>cp1***79</span><span class="num">256232.41</span><span>三国拉霸</span></li>
                    <li><span>y***999</span><span class="num">123702.79</span><span>三国</span></li>
                    <li><span>zds***345</span><span class="num">123435.15</span><span>热带风情</span></li>
                    <li><span>yy***1217</span><span class="num">87990.16</span><span>奇幻花园</span></li>
                </ul>
            </div>
            <span id="supermoney" digital add digital-min="7355781" time="500"></span>
        </div>
    </div>

    <ul class="step wow bounceInUp">
        <li data-img="01">免费开户</li>
        <li data-img="02">绑定资料</li>
        <li data-img="03">账户存款</li>
        <li data-img="04">投注游戏</li>
        <li data-img="05">提款到账</li>
    </ul>
</div>



        </div>

    <div id="mobile-section">

        <ul id="game-box">
            <li data-img="lottery">
                <a href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY GAME</span></a>
            </li>
            <li data-img="live">
                <a href="{{ route('web.liveCasino') }}">真人娱乐<span>LIVE CASINO</span></a>
            </li>
            <li data-img="sport">
                <a href="{{ route('web.esports') }}">體育赛事<span>ONLINE SPORTS</span></a>
            </li>
        </ul>
        <div class="mobile-img"></div>
        <div class="mobile-info">
            <p>手机投注平台面向全网玩家，提供近万款電子游艺、老虎机、百家乐以及彩票游戏、體育投注，线上存款及线上取款，一键操作， 运用3D即时运算创造真实场景结合立体影像，完整规划的跨系统娱乐平台，整合同步账号和资料传输，达到随时随地不间断娱乐的享受概念。</p>
            <ul class="qrcode">
                <li class="ios">ios客户端下载</li>
                <li class="and">Android客户端下载</li>
            </ul>
        </div>
    </div>
    <div id="aboutus">
        <div class="wrapper">
            <span class="title wow flipInX"></span>
            <p class="wow flipInX">
                澳门<span>凯旋门</span>的娱乐场部分名为<span>凯旋门</span>娱乐场（葡萄牙语：Casino L'Arc），是澳门首间（也是现时唯一一间）集合于住宅、酒店、商场内的一间娱乐场，由澳门博彩持牌；娱乐场已于2009年9月21日开业；娱乐场位于该大楼的首三层，开设183张赌桌（其中30张为贵宾厅赌桌，153张为中场赌台）以及420台角子机。
            </p>
            <ul class="wow flipInX">
                <li data-img="01">世界博彩龙头企业</li>
                <li data-img="02">2016年度诚信网站</li>
                <li data-img="03">澳门政府授权</li>
                <li data-img="04">资金安全有保障</li>
                <li data-img="05">存取款极速到账</li>
            </ul>
            <span class="left-img wow flipInX"></span>
            <span class="right-img wow flipInX"></span>
        </div>
    </div>

    </div>





@endsection
