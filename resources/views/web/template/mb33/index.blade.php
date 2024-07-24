@extends('web.template.mb33.layouts.main')
@section('css_js')
    <link href="/web/mb33/css/cute-slider-style.css" rel="stylesheet" />


@endsection
@section('content')
    <div id="banner">


        <section id="cuteslider_3_wrapper" class="cs-circleslight" ng-controller="HomeCtrl">

            <div custom-cuteslider="@{{slideImgs}}" id="cuteslider_3" class="cute-slider" data-width="1920" data-height="550" data-overpause="true">
                <ul id="imgNames" data-type="slides"></ul>
                <ul data-type="controls">
                    <li data-type="captions"></li>
                    <li data-type="link"></li>
                    <li data-type="video"></li>
                    <li data-type="slideinfo"></li>
                    <li data-type="circletimer"></li>

                    <li data-type="slidecontrol" data-thumb="true" data-thumbalign="up"></li>
                </ul>
            </div>
        </section>

    </div>

    <div id="content" class="my_content">
        <div class="wrapper">


            <div id="home" ng-controller="LobbiesCtrl">

                <div class="slot">
                    <div class="game-box" ng-init="show='sg'">
                        <span class="hot-game" ng-mouseover="show='hot'" ng-class="{'active': show=='hot'}"></span>
                        <div class="slot-list"
                             carousel-slider
                             super-vis="7"
                             super-play="false"
                             super-effect="leftLoop">
                            <span class="prev"></span>
                            <div class="main-cell">
                                <ul class="game-list">
                                    @if(in_array('SG', $_api_list))
                                    <li game-box="sg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-class="{'active': show=='sg'}">SG</li>
                                    @endif
                                   {{-- <li game-box="fish" ng-click="toFish()" ng-mouseover="show='fish'" ng-class="{'active': show=='fish'}">FISH</li>--}}
                                        @if(in_array('CQ9', $_api_list))
                                    <li game-box="cq9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')" ng-mouseover="show='cq9'" ng-class="{'active': show=='cq9'}">CQ9</li>
                                        @endif
                                        @if(in_array('MG', $_api_list))
                                    <li game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" ng-mouseover="show='mg'" ng-class="{'active': show=='mg'}">MG</li>
                                        @endif
                                        @if(in_array('AG', $_api_list))
                                    <li game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" ng-mouseover="show='ag'" ng-class="{'active': show=='ag'}">AG</li>
                                        @endif
                                        @if(in_array('PT', $_api_list))
                                    <li game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pt'" ng-class="{'active': show=='pt'}">PT</li>
                                        @endif
                                        @if(in_array('GNS', $_api_list))
                                    <li game-box="gns" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')" ng-mouseover="show='gns'" ng-class="{'active': show=='gns'}">GNS</li>
                                        @endif
                                        @if(in_array('GPI', $_api_list))
                                    <li game-box="gpi" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')" ng-mouseover="show='gpi'" ng-class="{'active': show=='gpi'}">GPI</li>
                                        @endif
                                        @if(in_array('PP', $_api_list))
                                    <li game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" ng-mouseover="show='pp'" ng-class="{'active': show=='pp'}">PP</li>
                                        @endif
                                        @if(in_array('MW', $_api_list))
                                    <li game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" ng-mouseover="show='mw'" ng-class="{'active': show=='mw'}">MW</li>
                                        @endif
                                        @if(in_array('HB', $_api_list))
                                    <li game-box="hb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" ng-mouseover="show='hb'" ng-class="{'active': show=='hb'}">HB</li>
                                        @endif
                                        @if(in_array('JDB', $_api_list))
                                    <li game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" ng-mouseover="show='jdb'" ng-class="{'active': show=='jdb'}">JDB</li>
                                        @endif
                                    {{--<li game-box="ne" ng-click="toNetentHtml()" ng-mouseover="show='ne'" ng-class="{'active': show=='ne'}">NE</li>--}}
                                        @if(in_array('RT', $_api_list))
                                    <li game-box="rt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')" ng-mouseover="show='rt'" ng-class="{'active': show=='rt'}">RT</li>
                                        @endif
                                        @if(in_array('GA', $_api_list))
                                    <li game-box="ga" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')" ng-mouseover="show='ga'" ng-class="{'active': show=='ga'}">GA</li>
                                        @endif
                                        @if(in_array('PG', $_api_list))
                                    <li game-box="pg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')" ng-mouseover="show='pg'" ng-class="{'active': show=='pg'}">PG</li>
                                        @endif
{{--                                    <li game-box="lg" ng-click="toLgHtml()" ng-mouseover="show='lg'" ng-class="{'active': show=='lg'}">LG</li>--}}
                                        @if(in_array('ISB', $_api_list))
                                    <li game-box="isb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')" ng-mouseover="show='isb'" ng-class="{'active': show=='isb'}">ISB</li>
                                        @endif
                                        @if(in_array('PNG', $_api_list))
                                    <li game-box="png" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')" ng-mouseover="show='png'" ng-class="{'active': show=='png'}">PNG</li>
                                        @endif
                                    {{--<li game-box="pts" ng-click="toPtsHtml()" ng-mouseover="show='pts'" ng-class="{'active': show=='pts'}">PTS</li>--}}
                                        @if(in_array('BBIN', $_api_list))
                                    <li game-box="bb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')" ng-mouseover="show='bb'" ng-class="{'active': show=='bb'}">BBIN</li>
                                            @endif
                                </ul>
                            </div>
                            <span class="next"></span>
                        </div>
                        <div class="slot-body">
                            <div class="jackpot" game-box="@{{show}}">
                                <div class="jackpot-title" ng-cloak>
                                    <span ng-if="show!=='cq9'&&show!=='fish'">@{{show}}</span><span ng-if="show=='cq9'">传奇</span><span ng-if="show=='fish'">捕魚达人</span>大彩池
                                </div>
                                <div class="digital dig-2" digital not-point not-thousandth digital-min="345" digital-max="999"></div>
                                <div class="digital dig-1" digital not-point not-thousandth digital-min="5570040" digital-max="9999999"></div>
                            </div>
                            <div class="slot-panel">
                                @if(in_array('SG', $_api_list))
                                <ul ng-show="show=='sg'" ng-cloak>
                                    <li data-img="sg-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">发发发</li>
                                    <li data-img="sg-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">太空神猴</li>
                                    <li data-img="sg-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">新发大财</li>
                                    <li data-img="sg-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">森林狂欢季</li>
                                    <li data-img="sg-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">熊之蜜</li>
                                    <li data-img="sg-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">财源广进</li>
                                    <li data-img="sg-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">财神888</li>
                                    <li data-img="sg-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">黄金黥鱼</li>
                                </ul>
                                @endif
                                {{--<ul ng-show="show=='fish'" ng-cloak>
                                    <li data-img="fish-5" ng-click="toAgFish()">AG捕魚王</li>
                                    <li data-img="fish-6" ng-click="toBbFish2()">BBIN捕魚大师</li>
                                    <li data-img="fish-7" ng-click="toBbFish()">BBIN捕魚达人</li>
                                    <li data-img="fish-8" ng-click="toGnsFish()">GNS寻宝捕魚王</li>
                                    <li data-img="fish-1" ng-click="toJdbFish()">JDB龙王捕魚</li>
                                    <li data-img="fish-2" ng-click="toMwFish()">MW千炮捕魚</li>
                                    <li data-img="fish-3" ng-click="toPgFish2()">PG全民捕魚</li>
                                    <li data-img="fish-4" ng-click="toPtFish()">PT深海大赢家</li>
                                </ul>--}}
                                    @if(in_array('CQ9', $_api_list))
                                <ul ng-show="show=='cq9'" ng-cloak>
                                    <li data-img="cq9-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">五福临门</li>
                                    <li data-img="cq9-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">武圣</li>
                                    <li data-img="cq9-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">甜蜜蜜</li>
                                    <li data-img="cq9-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">皇金渔场</li>
                                    <li data-img="cq9-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">跳起來</li>
                                    <li data-img="cq9-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">跳高高</li>
                                    <li data-img="cq9-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">金玉滿堂</li>
                                    <li data-img="cq9-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')">金雞報喜</li>
                                </ul>
                                    @endif
                                    @if(in_array('MG', $_api_list))
                                <ul ng-show="show=='mg'" ng-cloak>
                                    <li data-img="mg-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">抢劫银行</li>
                                    <li data-img="mg-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">舞龙</li>
                                    <li data-img="mg-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">摆脱</li>
                                    <li data-img="mg-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">宝石连线</li>
                                    <li data-img="mg-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">东方珍兽</li>
                                    <li data-img="mg-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">篮球巨星</li>
                                    <li data-img="mg-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">淑女之夜</li>
                                    <li data-img="mg-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">比基尼派对</li>
                                </ul>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                <ul ng-show="show=='ag'" ng-cloak>
                                    <li data-img="ag-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">侏罗纪</li>
                                    <li data-img="ag-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">冰河世界</li>
                                    <li data-img="ag-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">复古花园</li>
                                    <li data-img="ag-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">性感女仆</li>
                                    <li data-img="ag-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">捕魚王2</li>
                                    <li data-img="ag-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">水果拉霸</li>
                                    <li data-img="ag-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">灵猴献瑞</li>
                                    <li data-img="ag-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">齐天大圣</li>
                                </ul>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                <ul ng-show="show=='pt'" ng-cloak>
                                    <li data-img="pt-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">圣诞奇迹</li>
                                    <li data-img="pt-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">大明帝国</li>
                                    <li data-img="pt-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">招财童子</li>
                                    <li data-img="pt-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">樱桃之恋</li>
                                    <li data-img="pt-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">湛蓝深海</li>
                                    <li data-img="pt-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">白狮王</li>
                                    <li data-img="pt-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">非常幸运</li>
                                    <li data-img="pt-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">黑豹之月</li>
                                </ul>
                                    @endif
                                    @if(in_array('GNS', $_api_list))
                                <ul ng-show="show=='gns'" ng-cloak>
                                    <li data-img="gns-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">五行传说</li>
                                    <li data-img="gns-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">奢华生活</li>
                                    <li data-img="gns-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">女帝崛起</li>
                                    <li data-img="gns-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">妖精传奇</li>
                                    <li data-img="gns-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">星际探索：猎户座</li>
                                    <li data-img="gns-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">神枪独角兽</li>
                                    <li data-img="gns-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">维京人传奇</li>
                                    <li data-img="gns-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')">罗宾大探险</li>
                                </ul>
                                    @endif
                                    @if(in_array('GPI', $_api_list))
                                <ul ng-show="show=='gpi'" ng-cloak>
                                    <li data-img="gpi-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">2014足球老虎机</li>
                                    <li data-img="gpi-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">四大美女</li>
                                    <li data-img="gpi-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">水果乐园</li>
                                    <li data-img="gpi-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">海底世界</li>
                                    <li data-img="gpi-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">海盗寻宝</li>
                                    <li data-img="gpi-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">深海探险</li>
                                    <li data-img="gpi-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">罗马帝国</li>
                                    <li data-img="gpi-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')">黑手党</li>
                                </ul>
                                    @endif
                                    @if(in_array('PP', $_api_list))
                                <ul ng-show="show=='pp'" ng-cloak>
                                    <li data-img="pp-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">奔跑吧!猴子</li>
                                    <li data-img="pp-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">女神戈帝梵</li>
                                    <li data-img="pp-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">星际矿业</li>
                                    <li data-img="pp-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">法老的宝藏</li>
                                    <li data-img="pp-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">矮人黄金</li>
                                    <li data-img="pp-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">西游记</li>
                                    <li data-img="pp-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">贝奥武夫</li>
                                    <li data-img="pp-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">野生动物园</li>
                                </ul>
                                    @endif
                                    @if(in_array('MW', $_api_list))
                                <ul ng-show="show=='mw'" ng-cloak>
                                    <li data-img="mw-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">好运5扑克</li>
                                    <li data-img="mw-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">明星97</li>
                                    <li data-img="mw-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">水浒传</li>
                                    <li data-img="mw-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">水浒英雄</li>
                                    <li data-img="mw-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">百乐牛牛</li>
                                    <li data-img="mw-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">经典水果机</li>
                                    <li data-img="mw-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">超级斗地主</li>
                                    <li data-img="mw-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')">黄金777</li>
                                </ul>
                                    @endif
                                    @if(in_array('HB', $_api_list))
                                <ul ng-show="show=='hb'" ng-cloak>
                                    <li data-img="hb-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">12生肖</li>
                                    <li data-img="hb-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">凤凰</li>
                                    <li data-img="hb-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">巫婆大财</li>
                                    <li data-img="hb-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">惊喜秀</li>
                                    <li data-img="hb-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">海洋之音</li>
                                    <li data-img="hb-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">罗马帝国</li>
                                    <li data-img="hb-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">鲤鱼门</li>
                                    <li data-img="hb-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')">龙之宝座</li>
                                </ul>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                <ul ng-show="show=='jdb'" ng-cloak>
                                    <li data-img="jdb-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">变脸</li>
                                    <li data-img="jdb-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">台湾黑熊</li>
                                    <li data-img="jdb-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">唐伯虎点秋香</li>
                                    <li data-img="jdb-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">拿破仑</li>
                                    <li data-img="jdb-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">月光秘宝</li>
                                    <li data-img="jdb-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">江山美人</li>
                                    <li data-img="jdb-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">芝麻开门</li>
                                    <li data-img="jdb-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')">过新年</li>
                                </ul>
                                    @endif
                                {{--<ul ng-show="show=='ne'" ng-cloak>
                                    <li data-img="ne-1" ng-click="toNetentHtml()">双重旋转</li>
                                    <li data-img="ne-2" ng-click="toNetentHtml()">吸血鬼</li>
                                    <li data-img="ne-3" ng-click="toNetentHtml()">宝石炫光</li>
                                    <li data-img="ne-4" ng-click="toNetentHtml()">富小猪</li>
                                    <li data-img="ne-5" ng-click="toNetentHtml()">小红帽</li>
                                    <li data-img="ne-6" ng-click="toNetentHtml()">星爆</li>
                                    <li data-img="ne-7" ng-click="toNetentHtml()">水果商店</li>
                                    <li data-img="ne-8" ng-click="toNetentHtml()">热带岛屿</li>
                                </ul>--}}
                                    @if(in_array('RT', $_api_list))
                                <ul ng-show="show=='rt'" ng-cloak>
                                    <li data-img="rt-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">五福临门</li>
                                    <li data-img="rt-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">凤凰涅槃</li>
                                    <li data-img="rt-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">华夏祥瑞</li>
                                    <li data-img="rt-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">宝石暴走</li>
                                    <li data-img="rt-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">西游寻宝</li>
                                    <li data-img="rt-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">财富满屋</li>
                                    <li data-img="rt-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">财神</li>
                                    <li data-img="rt-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=RT&game_type=2','','width=1024,height=768')">龙之谕</li>
                                </ul>
                                    @endif
                                    @if(in_array('GA', $_api_list))
                                <ul ng-show="show=='ga'" ng-cloak>
                                    <li data-img="ga-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">三王</li>
                                    <li data-img="ga-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">国王的财富</li>
                                    <li data-img="ga-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">宝玉</li>
                                    <li data-img="ga-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">寻金之旅</li>
                                    <li data-img="ga-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">种钱得钱2</li>
                                    <li data-img="ga-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">老虎的心</li>
                                    <li data-img="ga-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">雷声鸟</li>
                                    <li data-img="ga-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')">魔龙</li>
                                </ul>
                                    @endif
                                    @if(in_array('PG', $_api_list))
                                <ul ng-show="show=='pg'" ng-cloak>
                                    <li data-img="pg-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">動物星球</li>
                                    <li data-img="pg-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">猴子爬樹</li>
                                    <li data-img="pg-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">皇冠列車</li>
                                    <li data-img="pg-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">西遊爭霸</li>
                                    <li data-img="pg-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">迎財神</li>
                                    <li data-img="pg-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">魚王爭霸</li>
                                    <li data-img="pg-more" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">敬请期待</li>
                                    <li data-img="pg-more" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PG&game_type=2','','width=1024,height=768')">敬请期待</li>
                                </ul>
                                    @endif
                                {{--<ul ng-show="show=='lg'" ng-cloak>
                                    <li data-img="lg-1" ng-click="toLgHtml()">即时自行车赛</li>
                                    <li data-img="lg-2" ng-click="toLgHtml()">及时赛马</li>
                                    <li data-img="lg-3" ng-click="toLgHtml()">虚拟网球赛</li>
                                    <li data-img="lg-4" ng-click="toLgHtml()">虚拟自行车赛</li>
                                    <li data-img="lg-5" ng-click="toLgHtml()">虚拟赛狗</li>
                                    <li data-img="lg-6" ng-click="toLgHtml()">虚拟赛车</li>
                                    <li data-img="lg-7" ng-click="toLgHtml()">虚拟赛马赛</li>
                                    <li data-img="lg-8" ng-click="toLgHtml()">虚拟足球比赛</li>
                                </ul>--}}
                                    @if(in_array('ISB', $_api_list))
                                <ul ng-show="show=='isb'" ng-cloak>
                                    <li data-img="isb-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">少林旋转</li>
                                    <li data-img="isb-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">幸运-3</li>
                                    <li data-img="isb-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">旋转卷轴</li>
                                    <li data-img="isb-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">樱桃三拼</li>
                                    <li data-img="isb-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">疯狂钻石</li>
                                    <li data-img="isb-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">百万分</li>
                                    <li data-img="isb-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">皇家现金</li>
                                    <li data-img="isb-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ISB&game_type=2','','width=1024,height=768')">霓虹卷轴</li>
                                </ul>
                                    @endif
                                    @if(in_array('PNG', $_api_list))
                                <ul ng-show="show=='png'" ng-cloak>
                                    <li data-img="png-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">七宗罪</li>
                                    <li data-img="png-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">五彩宝石</li>
                                    <li data-img="png-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">好运招财猫</li>
                                    <li data-img="png-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">月亮守护者</li>
                                    <li data-img="png-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">火焰小丑</li>
                                    <li data-img="png-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">维京人世界</li>
                                    <li data-img="png-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">美人鱼的宝石</li>
                                    <li data-img="png-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')">能量小精灵</li>
                                </ul>
                                    @endif
                                {{--<ul ng-show="show=='pts'" ng-cloak>
                                    <li data-img="pts-1" ng-click="toPtsHtml()">布法罗的河岸</li>
                                    <li data-img="pts-2" ng-click="toPtsHtml()">幸运金蟾</li>
                                    <li data-img="pts-3" ng-click="toPtsHtml()">玄武</li>
                                    <li data-img="pts-4" ng-click="toPtsHtml()">百搭雄狮</li>
                                    <li data-img="pts-5" ng-click="toPtsHtml()">神奇九龙</li>
                                    <li data-img="pts-6" ng-click="toPtsHtml()">神龙宝石</li>
                                    <li data-img="pts-7" ng-click="toPtsHtml()">蝠在眼钱</li>
                                    <li data-img="pts-8" ng-click="toPtsHtml()">送财童子</li>
                                </ul>--}}
                                    @if(in_array('BBIN', $_api_list))
                                <ul ng-show="show=='bb'" ng-cloak>
                                    <li data-img="bb-1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">三国</li>
                                    <li data-img="bb-2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">喜福猴年</li>
                                    <li data-img="bb-3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">开心消消乐</li>
                                    <li data-img="bb-4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">惑星战记</li>
                                    <li data-img="bb-5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">沙灘排球</li>
                                    <li data-img="bb-6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">糖果派对</li>
                                    <li data-img="bb-7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">趣味台球</li>
                                    <li data-img="bb-8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">鬥雞</li>
                                </ul>
                                        @endif
                            </div>
                        </div>
                        <div class="slot-des">
                            <h1>產品服務</h1>
                            <p>
                                MACAO VENETIAN为您提供最好的服务，<br />
                                享受最激娱乐体验，<br />
                                并提供卓越的视觉效果。
                            </p>
                        </div>
                    </div>
                </div>
                <div class="intro"></div>
            </div>


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
            (function($){
                $(function(){
                    $('#modal-tit').modal();
                })
            })(jQuery);
        </script>
    @endif
@endsection
