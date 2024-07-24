@extends('web.template.mb30.layouts.main')
@section('after.js')
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
    <div id="banner">
        <div class="nivoSlider" id="Sliderbanner">
            <ul id="au" class="mianbanner">
                @foreach($banners as $item)
                    <li>
                        <a id="img1">
                            <img src="{{$item->path}}"/></a>
                    </li>
                @endforeach
                {{--@foreach($banners as $item)--}}
                {{--<li><a><img src="{{ $item->path }}"/></a></li>--}}
                {{--@endforeach--}}
                {{--<li><a id="img1"><img src="{{ asset('/bundles/images/1.jpg') }}"/></a></li>
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
            <!--<li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/8.jpg') }}"/></a></li>-->--}}
            </ul>
            <div class="sidecenter" id="middle-pic">
                <ul class="lunbo">
                    <li class="active" id="t0"></li>
                    <li class="bg" id="t1"></li>
                    <li class="bg" id="t2"></li>
                    <li class="bg" id="t3"></li>
                    {{--<li class="bg" id="t4"></li>
                    <li class="bg" id="t5"></li>
                    <li class="bg" id="t6"></li>--}}
                    <!--  <li class="bg" id="t7"></li>-->
                </ul>
            </div>
            <!-- <a class="nivo-prevNav">左</a>
             <a class="nivo-nextNav">右</a>-->
        </div>
    </div>
    <!--
    <div id="news">
        <div class="wrapper">
     <marquee onmouseover="this.stop()" onmouseout="this.start()" style="float:left; color:#fff; font-size:14px; line-height:30px;position:relative;left:10px;margin-top:4px;" scrollAmount=5 width=700>
		   @foreach($_system_notices as $v)
        <ul class="hot-news" ng-click="newsClick()">
        ~{{ $v->title }}~{{ $v->content }}
                </ul>
@endforeach
            </marquee>
            </div>
        </div>
-->

    <div id="news" class="mar0">
        <div class="wrapper">
            @foreach($_system_notices as $v)
                <div id="hot-news" style="color:#fff;" ng-click="newsClick()"> <marquee direction="left" align="bottom" height="25" width="100%" style="font-size:14px;margin-top:10px;"scrollamount="5" scrolldelay="1">~{{ $v->title }}~{{ $v->content }}</marquee></div>
            @endforeach
        </div>
    </div>




    <div id="content">
        <div id="home-slot" ng-controller="LobbiesCtrl">
            <div class="wrapper">
                <div class="slot-list wow fadeInUp"
                     carousel-slider
                     super-vis="9"
                     super-play="true"
                     super-effect="leftLoop">
                    <span class="prev"></span>
                    <span class="next"></span>
                    <div class="main-cell">
                        <ul class="game-list" ng-init="show='mg'">
                            @if(in_array('MG', $_api_list))
                            <li game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" ng-mouseover="show='mg'" ng-class="{'active': show=='mg'}">MG電子</li>
                            @endif
                                @if(in_array('AG', $_api_list))
                            <li game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" ng-mouseover="show='ag'" ng-class="{'active': show=='ag'}">AG電子</li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li game-box="bb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')" ng-mouseover="show='bb'" ng-class="{'active': show=='bb'}">BBIN電子</li>
                                @endif
                                @if(in_array('PT', $_api_list))
                            <li game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pt'" ng-class="{'active': show=='pt'}">PT電子</li>
                                @endif
                                @if(in_array('MW', $_api_list))
                            <li game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" ng-mouseover="show='mw'" ng-class="{'active': show=='mw'}">MW電子</li>
                                @endif
                                @if(in_array('CQ9', $_api_list))
                            <li game-box="cq9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')" ng-mouseover="show='cq9'" ng-class="{'active': show=='cq9'}">传奇電子</li>
                                @endif
                                @if(in_array('JDB', $_api_list))
                            <li game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" ng-mouseover="show='jdb'" ng-class="{'active': show=='jdb'}">夺宝電子</li>
                                @endif
                                @if(in_array('SG', $_api_list))
                            <li game-box="sg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-class="{'active': show=='sg'}">新霸電子</li>
                                @endif
                                @if(in_array('FG', $_api_list))
                            <li game-box="fg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')" ng-mouseover="show='fg'" ng-class="{'active': show=='fg'}">乐游電子</li>
                                @endif
                                @if(in_array('HB', $_api_list))
                            <li game-box="hb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" ng-mouseover="show='hb'" ng-class="{'active': show=='hb'}">HB電子</li>
                                @endif
                                @if(in_array('PP', $_api_list))
                            <li game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" ng-mouseover="show='prg'" ng-class="{'active': show=='prg'}">PP電子</li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li game-box="gpi" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')" ng-mouseover="show='gpi'" ng-class="{'active': show=='gpi'}">GPI電子</li>
                                @endif
                                @if(in_array('KY', $_api_list))
                            <li game-box="kg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')" ng-mouseover="show='kg'" ng-class="{'active': show=='kg'}">开元棋牌</li>
                                @endif
                                @if(in_array('PNG', $_api_list))
                            <li game-box="png" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')" ng-mouseover="show='png'" ng-class="{'active': show=='png'}">PNG電子</li>
                                @endif
                                @if(in_array('SW', $_api_list))
                            <li game-box="sw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=2','','width=1024,height=768')" ng-mouseover="show='sw'" ng-class="{'active': show=='sw'}">天风電子</li>
                                    @endif
                        </ul>
                    </div>
                </div>
                <div class="slot-panel wow flipInX">
                    @if(in_array('MG', $_api_list))
                    <ul ng-show="show=='mg'">
                        <li class="mg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>冰上曲棍球</span></p></li>
                        <li class="mg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>宝石连线</span></p></li>
                        <li class="mg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>胸围银行</span></p></li>
                        <li class="mg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>不朽的浪漫</span></p></li>
                        <li class="mg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>伴娘我最大</span></p></li>
                        <li class="mg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>海滨嘉年华</span></p></li>
                        <li class="mg07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>淑女之夜</span></p></li>
                        <li class="mg08" ng-click="toMgFlash()"><div class="img"></div><p><span>舞龙</span></p></li>
                    </ul>
                    @endif
                        @if(in_array('AG', $_api_list))
                    <ul ng-show="show=='ag'" ng-cloak>
                        <li class="ag01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>捕魚王2代</span></p></li>
                        <li class="ag02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>灵猴献瑞</span></p></li>
                        <li class="ag03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>水果拉霸</span></p></li>
                        <li class="ag04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>复古花园</span></p></li>
                        <li class="ag05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>太空漫游</span></p></li>
                        <li class="ag06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>金拉霸</span></p></li>
                        <li class="ag07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>街机游戏</span></p></li>
                        <li class="ag08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>飞禽走兽</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                    <ul ng-show="show=='bb'" ng-cloak>
                        <li class="bb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>糖果派对</span></p></li>
                        <li class="bb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>连环夺宝</span></p></li>
                        <li class="bb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>糖果派对2</span></p></li>
                        <li class="bb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>喜福猴年</span></p></li>
                        <li class="bb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>斗鸡</span></p></li>
                        <li class="bb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>喜福牛年</span></p></li>
                        <li class="bb07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>金瓶梅2</span></p></li>
                        <li class="bb08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>疯狂水果盘</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('PT', $_api_list))
                    <ul ng-show="show=='pt'" ng-cloak>
                        <li class="pt01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>三倍猴子</span></p></li>
                        <li class="pt02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>古怪猴子</span></p></li>
                        <li class="pt03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>湛蓝深海</span></p></li>
                        <li class="pt04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>龙龙龙</span></p></li>
                        <li class="pt05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>宝石女王</span></p></li>
                        <li class="pt06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>招财进宝</span></p></li>
                        <li class="pt07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>熊之舞</span></p></li>
                        <li class="pt08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>热力宝石</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('MW', $_api_list))
                    <ul ng-show="show=='mw'" ng-cloak>
                        <li class="mw01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>千炮捕魚</span></p></li>
                        <li class="mw02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>超级斗地主</span></p></li>
                        <li class="mw03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>森林舞会</span></p></li>
                        <li class="mw04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>水浒传</span></p></li>
                        <li class="mw05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>黄金777</span></p></li>
                        <li class="mw06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>五龙吐珠</span></p></li>
                        <li class="mw07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>百乐牛牛</span></p></li>
                        <li class="mw08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>洪福齐天</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('CQ9', $_api_list))
                    <ul ng-show="show=='cq9'" ng-cloak>
                        <li class="cq901" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>魔龙传奇</span></p></li>
                        <li class="cq902" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>金鸡报喜</span></p></li>
                        <li class="cq903" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>跳高高</span></p></li>
                        <li class="cq904" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>跳起来</span></p></li>
                        <li class="cq905" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>鸿福齐天</span></p></li>
                        <li class="cq906" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>钻石水果王</span></p></li>
                        <li class="cq907" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>點夜公爵</span></p></li>
                        <li class="cq908" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>金元宝</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('JDB', $_api_list))
                    <ul ng-show="show=='jdb'" ng-cloak>
                        <li class="jdb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>唐伯虎</span></p></li>
                        <li class="jdb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>宝石物语</span></p></li>
                        <li class="jdb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>台湾黑熊</span></p></li>
                        <li class="jdb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>齐天大圣</span></p></li>
                        <li class="jdb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>过新年</span></p></li>
                        <li class="jdb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>变脸</span></p></li>
                        <li class="jdb07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>幸运龙</span></p></li>
                        <li class="jdb08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>芝麻开门</span></p></li>
                    </ul>
                        @endif
                    {{--<ul ng-show="show=='fish'" ng-cloak>
                        <li class="fish-ag" ng-click="toAgFish()"><div class="img"></div><p><span>AG 捕魚王</span></p></li>
                        <li class="fish-cq9" ng-click="toCq9Fish()"><div class="img"></div><p><span>CQ9 皇金渔场</span></p></li>
                        <li class="fish-jdb01" ng-click="toJdbFish()"><div class="img"></div><p><span>JDB 龙王捕魚</span></p></li>
                        <li class="fish-jdb02" ng-click="toJdbFish2()"><div class="img"></div><p><span>JDB 龙王捕魚2</span></p></li>
                        <li class="fish-fg" ng-click="toFsFishBeauty()"><div class="img"></div><p><span>FG 美人捕魚</span></p></li>
                        <li class="fish-bb01" ng-click="toBbFish()"><div class="img"></div><p><span>BBIN 捕魚达人</span></p></li>
                        <li class="fish-bb02" ng-click="toBbFish2()"><div class="img"></div><p><span>BBIN 捕魚大师</span></p></li>
                        <li class="fish-rg" ng-click="toRgFish()"><div class="img"></div><p><span>GPK 捕魚大亨</span></p></li>
                    </ul>--}}
                        @if(in_array('SG', $_api_list))
                    <ul ng-show="show=='sg'" ng-cloak>
                        <li class="sg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>财神888</span></p></li>
                        <li class="sg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>天降财神</span></p></li>
                        <li class="sg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>深林狂欢节</span></p></li>
                        <li class="sg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>五龙吐珠</span></p></li>
                        <li class="sg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>狮心王SA</span></p></li>
                        <li class="sg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>发发发</span></p></li>
                        <li class="sg07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>潘金莲 特别版</span></p></li>
                        <li class="sg08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>爸爸飞哪儿</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('FG', $_api_list))
                    <ul ng-show="show=='fg'" ng-cloak>
                        <li class="fg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>金瓶梅</span></p></li>
                        <li class="fg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>荣耀王者</span></p></li>
                        <li class="fg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>愤怒的小鸟</span></p></li>
                        <li class="fg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>粉红女郎</span></p></li>
                        <li class="fg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>黄金右脚</span></p></li>
                        <li class="fg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>红楼梦</span></p></li>
                        <li class="fg07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>西游</span></p></li>
                        <li class="fg08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>埃及女王</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('HB', $_api_list))
                    <ul ng-show="show=='hb'" ng-cloak>
                        <li class="hb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>龙之宝座</span></p></li>
                        <li class="hb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>太空宝藏</span></p></li>
                        <li class="hb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>炸弹追击</span></p></li>
                        <li class="hb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>发财神</span></p></li>
                        <li class="hb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>鬼屋</span></p></li>
                        <li class="hb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>十二生肖</span></p></li>
                        <li class="hb07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>海洋之音</span></p></li>
                        <li class="hb08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>凤凰</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('PP', $_api_list))
                    <ul ng-show="show=='prg'" ng-cloak>
                        <li class="pp01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>神龙界</span></p></li>
                        <li class="pp02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>土匪老虎机</span></p></li>
                        <li class="pp03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>幸运龙</span></p></li>
                        <li class="pp04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>西游记</span></p></li>
                        <li class="pp05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>野狼黄金</span></p></li>
                        <li class="pp06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>极速糖果</span></p></li>
                        <li class="pp07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>无敌金刚</span></p></li>
                        <li class="pp08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>荣耀罗马</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('GA', $_api_list))
                    <ul ng-show="show=='ga'" ng-cloak>
                        <li class="ga01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>88年财富</span></p></li>
                        <li class="ga02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>三王</span></p></li>
                        <li class="ga03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>卡里古拉</span></p></li>
                        <li class="ga04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>种钱得钱2</span></p></li>
                        <li class="ga05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>雷声鸟</span></p></li>
                        <li class="ga06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>魔龙</span></p></li>
                        <li class="ga07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>老虎的心</span></p></li>
                        <li class="ga08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>寻金之旅</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('GNS', $_api_list))
                    <ul ng-show="show=='gns'" ng-cloak>
                        <li class="gns01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>神枪独角兽</span></p></li>
                        <li class="gns02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>女帝崛起</span></p></li>
                        <li class="gns03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>草原争霸</span></p></li>
                        <li class="gns04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>五行传说</span></p></li>
                        <li class="gns05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>啤酒盛宴</span></p></li>
                        <li class="gns06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>熊猫发财记</span></p></li>
                        <li class="gns07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>妖精传说</span></p></li>
                        <li class="gns08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>招福钱龟</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('GPI', $_api_list))
                    <ul ng-show="show=='gpi'" ng-cloak>
                        <li class="gpi01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>金瓶梅</span></p></li>
                        <li class="gpi02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>四大美女</span></p></li>
                        <li class="gpi03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>经典老虎机</span></p></li>
                        <li class="gpi04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>摇钱树</span></p></li>
                        <li class="gpi05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>甜蜜蜜</span></p></li>
                        <li class="gpi06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>海盗寻宝</span></p></li>
                        <li class="gpi07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>夜店</span></p></li>
                        <li class="gpi08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="img"></div><p><span>招财猫</span></p></li>
                    </ul>
                        @endif
                    {{--<ul ng-show="show=='rt'" ng-cloak>
                        <li class="rt01" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>五福临门</span></p></li>
                        <li class="rt02" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>凤凰涅槃</span></p></li>
                        <li class="rt03" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>龙之谕</span></p></li>
                        <li class="rt04" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>西游寻宝</span></p></li>
                        <li class="rt05" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>恭贺新禧</span></p></li>
                        <li class="rt06" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>灰姑娘</span></p></li>
                        <li class="rt07" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>水果大爆炸</span></p></li>
                        <li class="rt08" ng-click="toRedTigerHtml()"><div class="img"></div><p><span>三国争霸</span></p></li>
                    </ul>
                    <ul ng-show="show=='ne'" ng-cloak>
                        <li class="ne01" ng-click="toNetentHtml()"><div class="img"></div><p><span>小红帽</span></p></li>
                        <li class="ne02" ng-click="toNetentHtml()"><div class="img"></div><p><span>吸血鬼</span></p></li>
                        <li class="ne03" ng-click="toNetentHtml()"><div class="img"></div><p><span>贡多的冒险</span></p></li>
                        <li class="ne04" ng-click="toNetentHtml()"><div class="img"></div><p><span>星爆</span></p></li>
                        <li class="ne05" ng-click="toNetentHtml()"><div class="img"></div><p><span>热带岛屿</span></p></li>
                        <li class="ne06" ng-click="toNetentHtml()"><div class="img"></div><p><span>富小猪</span></p></li>
                        <li class="ne07" ng-click="toNetentHtml()"><div class="img"></div><p><span>金字塔</span></p></li>
                        <li class="ne08" ng-click="toNetentHtml()"><div class="img"></div><p><span>丧尸</span></p></li>
                    </ul>--}}
                    {{--<ul ng-show="show=='pg'" ng-cloak>
                        <li class="pg01" ng-click="toPgHtml()"><div class="img"></div><p><span>动物星球</span></p></li>
                        <li class="pg02" ng-click="toPgHtml()"><div class="img"></div><p><span>福禄寿喜</span></p></li>
                        <li class="pg03" ng-click="toPgHtml()"><div class="img"></div><p><span>猴子爬树</span></p></li>
                        <li class="pg04" ng-click="toPgFish2()"><div class="img"></div><p><span>全民捕魚</span></p></li>
                        <li class="pg05" ng-click="toPgHtml()"><div class="img"></div><p><span>西游争霸</span></p></li>
                        <li class="pg06" ng-click="toPgHtml()"><div class="img"></div><p><span>迎财神</span></p></li>
                        <li class="pg07" ng-click="toPgFish()"><div class="img"></div><p><span>鱼王争霸</span></p></li>
                        <li class="more" ng-click="toPgHtml()"><div class="img"></div><p><span>查看更多</span></p></li>
                    </ul>
                    <ul ng-show="show=='isb'" ng-cloak>
                        <li class="isb01" ng-click="toIsbHtml()"><div class="img"></div><p><span>百万分</span></p></li>
                        <li class="isb02" ng-click="toIsbHtml()"><div class="img"></div><p><span>财富树</span></p></li>
                        <li class="isb03" ng-click="toIsbHtml()"><div class="img"></div><p><span>凯撒的礼物</span></p></li>
                        <li class="isb04" ng-click="toIsbHtml()"><div class="img"></div><p><span>忍者大师</span></p></li>
                        <li class="isb05" ng-click="toIsbHtml()"><div class="img"></div><p><span>森林狂欢会</span></p></li>
                        <li class="isb06" ng-click="toIsbHtml()"><div class="img"></div><p><span>少年旋转</span></p></li>
                        <li class="isb07" ng-click="toIsbHtml()"><div class="img"></div><p><span>幸运3</span></p></li>
                        <li class="isb08" ng-click="toIsbHtml()"><div class="img"></div><p><span>皇家现金</span></p></li>
                    </ul>--}}
                        @if(in_array('KY', $_api_list))
                    <ul ng-show="show=='kg'" ng-cloak>
                        <li class="kg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>21点</span></p></li>
                        <li class="kg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>押庄龙虎</span></p></li>
                        <li class="kg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>三公</span></p></li>
                        <li class="kg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>炸金花</span></p></li>
                        <li class="kg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>抢庄牛牛</span></p></li>
                        <li class="kg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>德州扑克</span></p></li>
                        <li class="kg07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>二八杠</span></p></li>
                        <li class="kg08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>查看更多</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('PNG', $_api_list))
                    <ul ng-show="show=='png'" ng-cloak>
                        <li class="png01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>好运招财猫</span></p></li>
                        <li class="png02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>宝石巫师</span></p></li>
                        <li class="png03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>月亮守护者</span></p></li>
                        <li class="png04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>富二代</span></p></li>
                        <li class="png05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>圣诞小丑</span></p></li>
                        <li class="png06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>火焰小丑</span></p></li>
                        <li class="png07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>神祕小丑</span></p></li>
                        <li class="png08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>五彩宝石</span></p></li>
                    </ul>
                        @endif
                        @if(in_array('SW', $_api_list))
                    <ul ng-show="show=='sw'" ng-cloak>
                        <li class="sw01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>丛林翻倍赢</span></p></li>
                        <li class="sw02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>财神爷</span></p></li>
                        <li class="sw03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>百搭雄狮</span></p></li>
                        <li class="sw04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>神龙宝石</span></p></li>
                        <li class="sw05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>捕魚多福</span></p></li>
                        <li class="sw06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>神奇九龙</span></p></li>
                        <li class="sw07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>幸运金蟾</span></p></li>
                        <li class="sw08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=7','','width=1024,height=768')"><div class="img"></div><p><span>送财童子</span></p></li>
                    </ul>
                        @endif
                    {{--<ul ng-show="show=='gpk'" ng-cloak>
                        <li class="gpk01" ng-click="toGpkSlot()"><div class="img"></div><p><span>糖果嘉年华</span></p></li>
                        <li class="gpk02" ng-click="toRgBoard()"><div class="img"></div><p><span>GPK射龙门</span></p></li>
                        <li class="more"><div class="pic"></div><div class="img"></div><p><span>敬請期待</span></p></li>
                        <li class="more"><div class="pic"></div><div class="img"></div><p><span>敬請期待</span></p></li>
                        <li class="more"><div class="pic"></div><div class="img"></div><p><span>敬請期待</span></p></li>
                        <li class="more"><div class="pic"></div><div class="img"></div><p><span>敬請期待</span></p></li>
                        <li class="more"><div class="pic"></div><div class="img"></div><p><span>敬請期待</span></p></li>
                        <li class="more"><div class="pic"></div><div class="img"></div><p><span>敬請期待</span></p></li>
                    </ul>
                    <ul ng-show="show=='gpk2'" ng-cloak>
                        <li class="gpk201" ng-click="toGpk2Html()"><div class="img"></div><p><span>一路发</span></p></li>
                        <li class="gpk202" ng-click="toGpk2Html()"><div class="img"></div><p><span>石器时代</span></p></li>
                        <li class="gpk203" ng-click="toGpk2Html()"><div class="img"></div><p><span>科学怪犬</span></p></li>
                        <li class="gpk204" ng-click="toGpk2Html()"><div class="img"></div><p><span>捉鬼</span></p></li>
                        <li class="gpk205" ng-click="toGpk2Html()"><div class="img"></div><p><span>金矿山</span></p></li>
                        <li class="gpk206" ng-click="toGpk2Html()"><div class="img"></div><p><span>印加酋长</span></p></li>
                        <li class="gpk207" ng-click="toGpk2Html()"><div class="img"></div><p><span>火箭人</span></p></li>
                        <li class="gpk208" ng-click="toGpk2Html()"><div class="img"></div><p><span>博物馆</span></p></li>
                    </ul>--}}
                </div>
                <div class="slot-winner wow fadeInUp">
                    <div class="winner-list" ng-controller="WinnerListCtrl">
                        <p class="winner-title"><span>客户ID</span><span>游戏名称</span><span>金额</span></p>
                        <div class="main-cell">
                            <ul>
                                <li ng-repeat="item in winnerList track by $index" ng-cloak>
                                    <span class="account" ng-bind="item.account"title=""></span><span class="money"ng-bind="item.money" title=""></span><span class="game" ng-bind="item.game" title=""></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="jackpot" ng-cloak>
                        <span digital digital-min="86895416" add word="CNY" add-min="1" add-max="1" time="300" not-point></span>.<span digital digital-min="10" digital-max="99" not-point time="70"></span>
                    </div>
                </div>
                <ul id="home-info" class="wow flipInX">
                    {{--<li class="info01"><a ng-href="{{ route('web.dating') }}" target="_blank">优惠申请大厅</a></li>--}}
                    <li class="info02"><a ng-href="" target="_blank">電子升级榜</a></li>
                    <li class="info03"><a ng-href="{{ $_system_config->kscz}}" target="_blank">快速充值</a></li>
                    <li class="info04"><a href="{{ route('web.catchFish') }}">捕魚大厅</a></li>
                    <li class="info05"><a href="{{ route('web.lottory') }}" target="_blank">彩票游戏</a></li>
                    <li class="info06"><a href="javascript:;" class="daili_apply">代理加盟</a></li>
                    <li class="info07"><a target="_blank" href="{{route('daili.init')}}">代理登入</a></li>
                    <li class="info08"><a ng-href="{{ $_system_config->app_link }}" target="_blank">手机APP下载</a></li>
                </ul>
            </div>
        </div>
        <ul id="game-box">
            <li class="wow fadeInUp" data-wow-delay="0.2s" data-img="live"><a href="{{ route('web.liveCasino') }}"></a></li>
            <li class="wow fadeInUp" data-wow-delay="0.4s" data-img="sport"><a href="{{ route('web.esports') }}"></a></li>
            <li class="wow fadeInUp" data-wow-delay="0.6s" data-img="slot"><a href="{{ route('web.eGame') }}"></a></li>
            <li class="wow fadeInUp" data-wow-delay="0.8s" data-img="lottery"><a href="{{ route('web.lottory') }}"></a></li>
        </ul>
        <div id="home-mobile">
            <div class="wrapper wow flipInX">
                <p><span>{{ $_system_config->site_title or 'motoo' }}</span>致力呈献多元化环球娱乐，客人不论身处何地，也能畅快投入最优质的精采玩乐之中，提供近万款老虎机·百家乐·捕魚达人·以及彩票、棋牌游戏投注，线上存款及线上取款，一键操作，整合同步账号和资料传输，达到随时随地不间断娱乐的享受概念。 【高端呈献·唯您尊享】</p>
                <ul>
                    <li class="ios">
                        <img ng-src="{{ $_system_config->wap_qrcode }}" width="104" onerror="this.style.display='none'"/>
                        <i></i>ios客户端下载
                    </li>
                    <li class="android">
                        <img ng-src="{{ $_system_config->pic_link }}" width="104" onerror="this.style.display='none'" />
                        <i></i>Android客户端下载
                    </li>
                </ul>
                <a ng-href="{{ $_system_config->app_link }}" target="_blank">手机直接打开 <span ng-bind="ContactInfo.APP"></span>即可下载</a>
            </div>
        </div>


        <div class="wrapper">



        </div>
    </div>



@endsection
