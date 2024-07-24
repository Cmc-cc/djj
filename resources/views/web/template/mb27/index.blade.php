@extends('web.template.mb27.layouts.main')
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


    <div id="banner" style="background: none">
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
            <!-- <li style="display: none;"><a><img
                            src="{{ asset('/bundles/images/08.jpg') }}"/></a></li>-->--}}
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
                    <!-- <li class="bg" id="t7"></li>-->
                </ul>
            </div>


            <!-- <a class="nivo-prevNav">左</a>
             <a class="nivo-nextNav">右</a>-->
        </div>


    </div>

    <div id="news" class="mar0">
        <div class="wrapper">
            <div id="hot-news">
                <marquee  direction=up onmouseover="this.stop()" onmouseout="this.start()" style="color:#fff; " scrollAmount=3>
                    @foreach($_system_notices as $v)
                        <ul  ng-click="newsClick()">
                            ~{{ $v->title }}~{{ $v->content }}

                        </ul>
                    @endforeach
                </marquee>

            </div>

        </div>
    </div>

    <div id="content">
        <div class="wrapper animated animteeh">

            <div id="home">

                <section class="slot-game" ng-controller="LobbiesCtrl" ng-cloak>
                    <div class="slot-tab wow bounceinT">
                        <div class="slide-click prev"></div>
                        <div class="tab-list" ng-init="show='kg'">
                            <ul class="cycle-slideshow"
                                data-cycle-fx="carousel"
                                data-cycle-timeout="0"
                                data-cycle-slides="li"
                                data-cycle-next=".slide-click.next"
                                data-cycle-prev=".slide-click.prev"
                                data-cycle-carousel-visible="5"
                                data-cycle-carousel-vertical="true"
                                data-cycle-allow-wrap="false">
                                @if(in_array('KY', $_api_list))
                                <li game-box="kg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')" ng-mouseover="show='kg'" ng-class="{'active': show=='kg'}">KG棋牌游艺<span>KG CHESS GAMING</span></li>
                                @endif
                                    @if(in_array('MG', $_api_list))
                                <li game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" ng-mouseover="show='mg'" ng-class="{'active': show=='mg'}">MG電子游艺<span>MG SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                <li game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pt'" ng-class="{'active': show=='pt'}">PT電子游艺<span>PT SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                <li game-box="bb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')" ng-mouseover="show='bb'" ng-class="{'active': show=='bb'}">BB電子游艺<span>BBIN SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('CQ9', $_api_list))
                                <li game-box="cq9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')" ng-mouseover="show='cq9'" ng-class="{'active': show=='cq9'}">传奇電子游艺<span>CQ9 SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('SG', $_api_list))
                                <li game-box="sg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-class="{'active': show=='sg'}">新霸電子游艺<span>SG SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('GA', $_api_list))
                                <li game-box="ga" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')" ng-mouseover="show='ga'" ng-class="{'active': show=='ga'}">GA電子游艺<span>GA SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('HB', $_api_list))
                                <li game-box="hb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" ng-mouseover="show='hb'" ng-class="{'active': show=='hb'}">HB電子游艺<span>HB SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('MW', $_api_list))
                                <li game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" ng-mouseover="show='mw'" ng-class="{'active': show=='mw'}">MW電子游艺<span>MW SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                <li game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" ng-mouseover="show='jdb'" ng-class="{'active': show=='jdb'}">夺宝電子游艺<span>JDB SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('GNS', $_api_list))
                                <li game-box="gns" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')" ng-mouseover="show='gns'" ng-class="{'active': show=='gns'}">GNS電子游艺<span>GNS SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('PP', $_api_list))
                                <li game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" ng-mouseover="show='pp'" ng-class="{'active': show=='pp'}">PP電子游艺<span>PP SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                <li game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" ng-mouseover="show='ag'" ng-class="{'active': show=='ag'}">AG電子游艺<span>AG SLOT GAMING</span></li>
                                    @endif
                                    @if(in_array('GPI', $_api_list))
                                <li game-box="gpi" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')" ng-mouseover="show='gpi'" ng-class="{'active': show=='gpi'}">GPI電子游艺<span>GPI SLOT GAMING</span></li>
                                        @endif


                            </ul>
                        </div>
                        <div class="slide-click next"></div>
                    </div>

                    <div class="slot-wrapper">

                        @if(in_array('KY', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='kg'">
                            <li data-img="kg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="text">抢庄牛牛</div></li>
                            <li data-img="kg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="text">德州扑克</div></li>
                            <li data-img="kg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="text">三公</div></li>
                            <li data-img="kg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="text">抢庄牌九</div></li>
                            <li data-img="kg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="text">押庄龙虎</div></li>
                            <li data-img="kg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"><div class="text">通比牛牛</div></li>
                        </ul>
                        @endif
                            @if(in_array('MG', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='mg'">
                            <li data-img="mg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">摆脱</div></li>
                            <li data-img="mg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">不朽的浪漫</div></li>
                            <li data-img="mg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">百万美人鱼</div></li>
                            <li data-img="mg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">抢银行</div></li>
                            <li data-img="mg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">丛林杀手</div></li>
                            <li data-img="mg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><div class="text">招财鞭炮</div></li>
                        </ul>
                            @endif
                            @if(in_array('PT', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='pt'">
                            <li data-img="pt01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">招财进宝</div></li>
                            <li data-img="pt02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">深海大赢家</div></li>
                            <li data-img="pt03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">古怪猴子</div></li>
                            <li data-img="pt04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">龙龙龙</div></li>
                            <li data-img="pt05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">三倍猴子</div></li>
                            <li data-img="pt06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><div class="text">四灵</div></li>
                        </ul>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='bb'">
                            <li data-img="bb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">五行</div></li>
                            <li data-img="bb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">糖果派对</div></li>
                            <li data-img="bb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">喜福猴年</div></li>
                            <li data-img="bb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">糖果派对2</div></li>
                            <li data-img="bb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">连环夺宝</div></li>
                            <li data-img="bb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><div class="text">沙滩排球</div></li>
                        </ul>
                            @endif
                            @if(in_array('CQ9', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='cq9'">
                            <li data-img="cq901" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><div class="text">1945</div></li>
                            <li data-img="cq902" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><div class="text">棋聖</div></li>
                            <li data-img="cq903" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><div class="text">森林泰后</div></li>
                            <li data-img="cq904" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><div class="text">血之吻</div></li>
                            <li data-img="cq905" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><div class="text">金大款</div></li>
                            <li data-img="cq906" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><div class="text">鑽石水果王</div></li>
                        </ul>
                            @endif
                            @if(in_array('SG', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='sg'">
                            <li data-img="sg01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">五龙吐珠</div></li>
                            <li data-img="sg02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">发发发</div></li>
                            <li data-img="sg03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">大福小福</div></li>
                            <li data-img="sg04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">太空神猴</div></li>
                            <li data-img="sg05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">森林狂欢季</div></li>
                            <li data-img="sg06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><div class="text">黄金黥鱼</div></li>
                        </ul>
                            @endif
                            @if(in_array('GA', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='ga'">
                            <li data-img="ga01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="text">88年财富</div></li>
                            <li data-img="ga02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="text">三王</div></li>
                            <li data-img="ga03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="text">卡里古拉</div></li>
                            <li data-img="ga04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="text">国王的财富</div></li>
                            <li data-img="ga05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="text">宝玉</div></li>
                            <li data-img="ga06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GA&game_type=2','','width=1024,height=768')"><div class="text">老虎的心</div></li>
                        </ul>
                            @endif
                            @if(in_array('HB', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='hb'">
                            <li data-img="hb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">发财神</div></li>
                            <li data-img="hb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">炸弹追击</div></li>
                            <li data-img="hb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">鲤鱼门</div></li>
                            <li data-img="hb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">海洋之音</div></li>
                            <li data-img="hb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">双喜熊猫</div></li>
                            <li data-img="hb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><div class="text">雷鸟</div></li>
                        </ul>
                            @endif
                            @if(in_array('MW', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='mw'">
                            <li data-img="mw01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">千炮捕魚</div></li>
                            <li data-img="mw02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">水浒传</div></li>
                            <li data-img="mw03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">洪福齐天</div></li>
                            <li data-img="mw04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">百家牛牛</div></li>
                            <li data-img="mw05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">好运5扑克</div></li>
                            <li data-img="mw06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><div class="text">黄金777</div></li>
                        </ul>
                            @endif
                            @if(in_array('JDB', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='jdb'">
                            <li data-img="jdb01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">龙王捕魚</div></li>
                            <li data-img="jdb02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">变脸</div></li>
                            <li data-img="jdb03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">金鸡报囍</div></li>
                            <li data-img="jdb04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">亿万富翁</div></li>
                            <li data-img="jdb05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">台湾黑熊</div></li>
                            <li data-img="jdb06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><div class="text">月光秘宝</div></li>
                        </ul>
                            @endif
                            @if(in_array('GNS', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='gns'">
                            <li data-img="gns01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">招福钱龟</div></li>
                            <li data-img="gns02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">妖精传奇</div></li>
                            <li data-img="gns03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">古埃及之神</div></li>
                            <li data-img="gns04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">糖果粉碎大战</div></li>
                            <li data-img="gns05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">沙漠妖姬</div></li>
                            <li data-img="gns06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><div class="text">金鸡报喜</div></li>
                        </ul>
                            @endif
                            @if(in_array('PP', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='pp'">
                            <li data-img="pp01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">GPK发发发龙</div></li>
                            <li data-img="pp02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">888GPK</div></li>
                            <li data-img="pp03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">西游记</div></li>
                            <li data-img="pp04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">野狼黄金</div></li>
                            <li data-img="pp05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">女神戈帝梵</div></li>
                            <li data-img="pp06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><div class="text">精灵翅膀</div></li>
                        </ul>
                            @endif
                            @if(in_array('AG', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='ag'">
                            <li data-img="ag01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">捕魚王2代</div></li>
                            <li data-img="ag02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">水果拉霸</div></li>
                            <li data-img="ag03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">杰克高手</div></li>
                            <li data-img="ag04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">太空漫游</div></li>
                            <li data-img="ag05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">复古花园</div></li>
                            <li data-img="ag06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><div class="text">关东煮</div></li>
                        </ul>
                            @endif
                            @if(in_array('GPI', $_api_list))
                        <ul class="slot-content animated" ng-show="show=='gpi'">
                            <li data-img="gpi01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="text">四大神兽</div></li>
                            <li data-img="gpi02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="text">经典老虎机</div></li>
                            <li data-img="gpi03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="text">幸运炸弹人</div></li>
                            <li data-img="gpi04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="text">招财猫</div></li>
                            <li data-img="gpi05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="text">摇钱树</div></li>
                            <li data-img="gpi06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><div class="text">埃及艳后</div></li>
                        </ul>
                            @endif

                       {{-- <ul class="slot-content animated" ng-show="show=='ne'">
                            <li data-img="ne01" ng-click="toNetentHtml()"><div class="text">双重旋转</div></li>
                            <li data-img="ne02" ng-click="toNetentHtml()"><div class="text">吸血鬼</div></li>
                            <li data-img="ne03" ng-click="toNetentHtml()"><div class="text">宝石炫光</div></li>
                            <li data-img="ne04" ng-click="toNetentHtml()"><div class="text">小红帽</div></li>
                            <li data-img="ne05" ng-click="toNetentHtml()"><div class="text">星爆</div></li>
                            <li data-img="ne06" ng-click="toNetentHtml()"><div class="text">水果商店</div></li>
                        </ul>

                        <ul class="slot-content animated" ng-show="show=='rt'">
                            <li data-img="rt01" ng-click="toRedTigerHtml()"><div class="text">五福临门</div></li>
                            <li data-img="rt02" ng-click="toRedTigerHtml()"><div class="text">凤凰涅槃</div></li>
                            <li data-img="rt03" ng-click="toRedTigerHtml()"><div class="text">华夏祥瑞</div></li>
                            <li data-img="rt04" ng-click="toRedTigerHtml()"><div class="text">宝石暴走</div></li>
                            <li data-img="rt05" ng-click="toRedTigerHtml()"><div class="text">西游寻宝</div></li>
                            <li data-img="rt06" ng-click="toRedTigerHtml()"><div class="text">龙之谕</div></li>
                        </ul>

                        <ul class="slot-content animated" ng-show="show=='pg'">
                            <li data-img="pg01" ng-click="toPgHtml()"><div class="text">動物星球</div></li>
                            <li data-img="pg02" ng-click="toPgHtml()"><div class="text">猴子爬樹</div></li>
                            <li data-img="pg03" ng-click="toPgHtml()"><div class="text">皇冠列車</div></li>
                            <li data-img="pg04" ng-click="toPgHtml()"><div class="text">西遊記</div></li>
                            <li data-img="pg05" ng-click="toPgHtml()"><div class="text">迎財神</div></li>
                            <li data-img="pg06" ng-click="toPgFish()"><div class="text">魚王爭霸</div></li>
                        </ul>

                        <ul class="slot-content animated" ng-show="show=='isb'">
                            <li data-img="isb01" ng-click="toIsbHtml()"><div class="text">幸运 3</div></li>
                            <li data-img="isb02" ng-click="toIsbHtml()"><div class="text">樱桃三拼</div></li>
                            <li data-img="isb03" ng-click="toIsbHtml()"><div class="text">疯狂钻石</div></li>
                            <li data-img="isb04" ng-click="toIsbHtml()"><div class="text">绝对超级旋转</div></li>
                            <li data-img="isb05" ng-click="toIsbHtml()"><div class="text">霓虹卷轴</div></li>
                            <li data-img="isb06" ng-click="toIsbHtml()"><div class="text">高清百万分</div></li>
                        </ul>

                        <ul class="slot-content animated" ng-show="show=='fish'">
                            <li data-img="fish01" ng-click="toJdbFish()"><div class="text">JDB龙王捕魚</div></li>
                            <li data-img="fish02" ng-click="toPgFish()"><div class="text">PG鱼王争霸</div></li>
                            <li data-img="fish03" ng-click="toGnsFish()"><div class="text">GNS寻宝捕魚王</div></li>
                            <li data-img="fish04" ng-click="toMwFish()"><div class="text">MW千炮捕魚</div></li>
                            <li data-img="fish05" ng-click="toPtFish()"><div class="text">PT深海大赢家</div></li>
                            <li data-img="fish06" ng-click="toRgFish()"><div class="text">GPK捕魚大亨</div></li>
                        </ul>--}}
                    </div>

                    <div class="slot-right">
                        <div class="jackpot"><span digital digital-min="18054736" add word="CNY"></span></div>
                        <div class="winner" ng-controller="WinnerListCtrl">
                            <div class="winner-list">
                                <ul>
                                    <li ng-repeat="item in winnersList track by $index" ng-cloak>
                                        <div class="user"><span ng-bind="item.user"></span></div>
                                        <div class="money"><span ng-bind="item.money"></span></div>
                                        <div class="game"><span ng-bind="item.game"></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <ul id="game-box" ng-controller="LobbiesCtrl">
                    <li data-img="slot" class="wow bouncein" data-wow-delay="0.2s"><a href="{{ route('web.eGame') }}"></a></li>
                    <li data-img="fish" class="wow bouncein" data-wow-delay="0.4s"><a href="{{ route('web.catchFish') }}"></a></li>
                    <li data-img="live" class="wow bouncein" data-wow-delay="0.6s"><a href="{{ route('web.liveCasino') }}"></a></li>
                    <li data-img="lottery" class="wow bouncein" data-wow-delay="0.8s"><a href="{{ route('web.lottory') }}"></a></li>
                    <li data-img="sport" class="wow bouncein" data-wow-delay="1s"><a href="{{ route('web.esports') }}"></a></li>
                </ul>

                <ul class="home-info">
                    <li class="advantage wow fadeinB" data-wow-delay="0.3s">
                        <h4>真人娱乐</h4>
                        <p>我们的真人娱乐玩法众多。如百家乐，骰宝，龙虎以及轮盘。您可以畅游真人娱乐的精彩世界。当然，您也可以选择容易上手的线上老虎机或小游戏消遣时光。</p>
                        <h4>运动博弈</h4>
                        <p>我们提供您最爱投注的體育赛事。如足球五大联赛、世界杯、欧洲冠军杯、各大洲际杯赛和其他所有球类赛事，我们也提供其它的博彩项目。</p>
                        <h4>電子游艺</h4>
                        <p>我们的游戏包括轮盘、電子扑克、老虎机等在线娱乐场游戏。此外您更有机会赢得累积超级奖金。</p>
                        <h4>彩票游戏</h4>
                        <p>彩票游戏玩法简单、赔率多样化、福彩3D、体彩排列三、各地区时时彩及香港特区六合彩，连线同步即时开彩。</p>
                    </li>
                    <li class="process wow fadeinB" data-wow-delay="0.6s"></li>
                    <li class="other wow fadeinB" data-wow-delay="0.9s">
                        <ul class="data">
                            <li class="member">活跃用户数<span class="word"><span digital digital-min="128892468" add not-point></span>人</span></li>
                            <li class="bet">累计注单量<span class="word"><span digital digital-min="528363658" add not-point></span>注</span></li>
                            <li class="deposit">累计存提款<span class="word"><span digital digital-min="684142" add not-point></span>笔/9分30秒每笔</span></li>
                            <li class="money">累计派彩量<span class="word">￥<span digital digital-min="1556702296" add not-point></span>元</span></li>
                        </ul>
                        <ul class="contact">
                            <li class="wechat">微信号：<span ng-bind="{{ $_system_config->phone1 }}"></span></li>
                            <li class="qq">客服QQ：<span ng-bind="{{ $_system_config->qq }}" ></span></li>
                            <li class="mail">邮箱：<span ng-bind="{{ $_system_config->agent_qq }}">{{ $_system_config->agent_qq }}</span></li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>
    </div>


@endsection
