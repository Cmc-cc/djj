@extends('web.template.mb29.layouts.main')
@section('after.js')
    <link href="/bundles/home.css?v=kEJfj5m3p32HDyN-DPIJd3Namr0MZwylZT3l0yoYBLk1" rel="stylesheet"/>
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
                <li style="display: none;"><a><img
                                src="{{ asset('/bundles/images/8.jpg') }}"/></a></li>--}}
            </ul>


            <div class="sidecenter" id="middle-pic">


                <ul class="lunbo">
                    <li class="active" id="t0"></li>
                    <li class="bg" id="t1"></li>
                    <li class="bg" id="t2"></li>
                    <li class="bg" id="t3"></li>
                    {{--<li class="bg" id="t4"></li>
                    <li class="bg" id="t5"></li>
                    <li class="bg" id="t6"></li>
                    <li class="bg" id="t7"></li>--}}
                </ul>
            </div>


            <!-- <a class="nivo-prevNav">左</a>
             <a class="nivo-nextNav">右</a>-->
        </div>


    </div>



    <div id="news" class="mar0">
        <div class="wrapper">
            <marquee onmouseover="this.stop()" onmouseout="this.start()" style="float:left; color:#fff; font-size:14px; line-height:30px;position:relative;left:10px;margin-top:4px;" scrollAmount=5 width=700>
                @foreach($_system_notices as $v)
                    <ul class="news-list" ng-click="newsClick()">
                        ~{{ $v->title }}~{{ $v->content }}

                    </ul>
                @endforeach
            </marquee>
        </div>
    </div>




    <div id="content">


        <div id="home">
            <section class="slot-game" ng-controller="LobbiesCtrl">
                <div class="wrapper">
                    <div class="slider-left"
                         carousel-slider
                         super-vis="8"
                         super-play="false"
                         super-effect="leftLoop"
                         ng-cloak>
                        <span class="prev"></span>
                        <span class="next"></span>
                        <div class="main-cell">
                            <ul class="game-list" ng-init="show='mg'">
                                @if(in_array('MG', $_api_list))
                                <li game-box="mg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" ng-mouseover="show='mg'" ng-class="{'active': show=='mg'}">MG電子</li>
                                @endif
                                    @if(in_array('CQ9', $_api_list))
                                <li game-box="cq9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')" ng-mouseover="show='cq9'" ng-class="{'active': show=='cq9'}">传奇電子</li>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                <li game-box="pt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pt'" ng-class="{'active': show=='pt'}">PT電子</li>
                                    @endif
                                    @if(in_array('BBIN', $_api_list))
                                <li game-box="bb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')" ng-mouseover="show='bb'" ng-class="{'active': show=='bb'}">BBIN電子</li>
                                    @endif
                                    @if(in_array('AG', $_api_list))
                                <li game-box="ag" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')" ng-mouseover="show='ag'" ng-class="{'active': show=='ag'}">AG電子</li>
                                    @endif
                                    @if(in_array('SG', $_api_list))
                                <li game-box="sg" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')" ng-mouseover="show='sg'" ng-class="{'active': show=='sg'}">新霸電子</li>
                                    @endif
                                    @if(in_array('MW', $_api_list))
                                <li game-box="mw" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')" ng-mouseover="show='mw'" ng-class="{'active': show=='mw'}">MW電子</li>
                                    @endif
                                    @if(in_array('PT', $_api_list))
                                <li game-box="pts" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')" ng-mouseover="show='pts'" ng-class="{'active': show=='pts'}">PT電子</li>
                                    @endif
                                    @if(in_array('HB', $_api_list))
                                <li game-box="rt" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')" ng-mouseover="show='rt'" ng-class="{'active': show=='rt'}">红虎電子</li>
                                    @endif
                                    @if(in_array('PNG', $_api_list))
                                <li game-box="png" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')" ng-mouseover="show='png'" ng-class="{'active': show=='png'}">PNG電子</li>
                                    @endif
                                    @if(in_array('JDB', $_api_list))
                                <li game-box="jdb" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')" ng-mouseover="show='jdb'" ng-class="{'active': show=='jdb'}">夺宝電子</li>
                                    @endif
                                    @if(in_array('PP', $_api_list))
                                <li game-box="pp" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')" ng-mouseover="show='pp'" ng-class="{'active': show=='pp'}">PP電子</li>
                                    @endif
                                {{--<li game-box="hb" ng-click="toHabaHtml()" ng-mouseover="show='hb'" ng-class="{'active': show=='hb'}">HB電子</li>--}}
                                    @if(in_array('GPI', $_api_list))
                                <li game-box="gpi" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')" ng-mouseover="show='gpi'" ng-class="{'active': show=='gpi'}">GPI電子</li>
                                        @endif
                            </ul>
                        </div>
                    </div>
                    <div class="winner">
                        <div class="winner-title"><span>客户ID</span><span>游戏名称</span><span>金额</span></div>
                        <div class="winner-list">
                            <ul>
                                <li><span class="user">db***s4</span><span>MG電子</span><span class="num">82800.98</span></li>
                                <li><span class="user">chia***i</span><span>MG電子</span><span class="num">229058.25</span></li>
                                <li><span class="user">lid***78</span><span>传奇電子</span><span class="num">195134.34</span></li>
                                <li><span class="user">a6***15</span><span>PT電子</span><span class="num">142301.12</span></li>
                                <li><span class="user">zhi***2</span><span>MW電子</span><span class="num">292916.3</span></li>
                                <li><span class="user">di***un</span><span>PNG電子</span><span class="num">24222.83</span></li>
                                <li><span class="user">hu1***5</span><span>LG赛马游戏</span><span class="num">254690.35</span></li>
                                <li><span class="user">am***314</span><span>PG電子</span><span class="num">104053.5</span></li>
                                <li><span class="user">ni***29</span><span>GA電子</span><span class="num">250827.95</span></li>
                                <li><span class="user">lia***88</span><span>ISB電子</span><span class="num">238539.57</span></li>
                                <li><span class="user">jun***g5</span><span>GPI電子</span><span class="num">241416.35</span></li>
                                <li><span class="user">zgy5***3</span><span>NE電子</span><span class="num">170452.58</span></li>
                                <li><span class="user">qiu***10</span><span>HB電子</span><span class="num">112372.86</span></li>
                                <li><span class="user">yl8***6</span><span>GPK糖果</span><span class="num">133324.15</span></li>
                                <li><span class="user">lds***25</span><span>PP電子</span><span class="num">120855.35</span></li>
                                <li><span class="user">ab1***32</span><span>夺宝電子</span><span class="num">218046.67</span></li>
                                <li><span class="user">jj1***27</span><span>GNS電子</span><span class="num">242827.26</span></li>
                                <li><span class="user">Zhw***uf</span><span>RT電子</span><span class="num">30063.68</span></li>
                                <li><span class="user">fei***22</span><span>PNG電子</span><span class="num">13541.92</span></li>
                                <li><span class="user">ba***mei</span><span>MW電子</span><span class="num">213411.1</span></li>
                                <li><span class="user">li***93</span><span>天风電子</span><span class="num">279860.57</span></li>
                                <li><span class="user">qq1***11</span><span>BBIN電子</span><span class="num">111201.05</span></li>
                                <li><span class="user">zdy***46</span><span>AG電子</span><span class="num">155124.95</span></li>
                                <li><span class="user">Qim***08</span><span>新霸電子</span><span class="num">39664.09</span></li>
                                <li><span class="user">ya***n00</span><span>PT電子</span><span class="num">171983.88</span></li>
                                <li><span class="user">wan***91</span><span>AG電子</span><span class="num">237711.65</span></li>
                                <li><span class="user">vv***27</span><span>GNS電子</span><span class="num">114689.28</span></li>
                                <li><span class="user">xio***34</span><span>PT電子</span><span class="num">90579.05</span></li>
                                <li><span class="user">cp1***79</span><span>新霸電子</span><span class="num">256232.62</span></li>
                                <li><span class="user">y***99</span><span>RT電子</span><span class="num">123702.82</span></li>
                                <li><span class="user">zds***5</span><span>MG電子</span><span class="num">123435.36</span></li>
                                <li><span class="user">yy***17</span><span>PT電子</span><span class="num">87990.69</span></li>
                                <li><span class="user">hy***ete</span><span>MG電子</span><span class="num">112800.28</span></li>
                                <li><span class="user">rrf***34</span><span>PT電子</span><span class="num">329058.15</span></li>
                                <li><span class="user">yfe***86</span><span>传奇電子</span><span class="num">495134.38</span></li>
                                <li><span class="user">hhh***3r</span><span>新霸電子</span><span class="num">742301.12</span></li>
                                <li><span class="user">egr***66</span><span>AG電子</span><span class="num">492916.13</span></li>
                                <li><span class="user">dgx***3g</span><span>BBIN電子</span><span class="num">24222.83</span></li>
                                <li><span class="user">jnk***55</span><span>MW電子</span><span class="num">654690.35</span></li>
                                <li><span class="user">lop***04</span><span>天风電子</span><span class="num">904053.5</span></li>
                                <li><span class="user">fvd***21</span><span>RT電子</span><span class="num">350827.95</span></li>
                                <li><span class="user">fdg***88</span><span>PNG電子</span><span class="num">138539.57</span></li>
                                <li><span class="user">h436***lp</span><span>夺宝電子</span><span class="num">441416.35</span></li>
                                <li><span class="user">grg***d</span><span>GNS電子</span><span class="num">370452.58</span></li>
                                <li><span class="user">znd***ety</span><span>PP電子</span><span class="num">712372.86</span></li>
                                <li><span class="user">iou***tt</span><span>GPK糖果</span><span class="num">33324.15</span></li>
                                <li><span class="user">eges***ht</span><span>NE電子</span><span class="num">620855.35</span></li>
                                <li><span class="user">gdb***97</span><span>HB電子</span><span class="num">318046.67</span></li>
                                <li><span class="user">htvd***u</span><span>ISB電子</span><span class="num">142827.26</span></li>
                                <li><span class="user">flm***ryg</span><span>GPI電子</span><span class="num">90063.68</span></li>
                                <li><span class="user">mhh***ef</span><span>GA電子</span><span class="num">63541.92</span></li>
                                <li><span class="user">nfb***h</span><span>PG電子</span><span class="num">413411.1</span></li>
                                <li><span class="user">tt4***09</span><span>PNG電子</span><span class="num">311201.05</span></li>
                                <li><span class="user">jf5***34</span><span>PP電子</span><span class="num">255124.95</span></li>
                                <li><span class="user">gdd***j6</span><span>AG電子</span><span class="num">59664.09</span></li>
                                <li><span class="user">l7p***8ug</span><span>传奇電子</span><span class="num">571983.88</span></li>
                                <li><span class="user">lij***7u</span><span>PT電子</span><span class="num">737711.65</span></li>
                                <li><span class="user">tst***dg</span><span>MG電子</span><span class="num">214689.28</span></li>
                                <li><span class="user">thr***teh</span><span>MG電子</span><span class="num">100579.05</span></li>
                                <li><span class="user">jg5***53</span><span>夺宝電子</span><span class="num">156232.62</span></li>
                                <li><span class="user">yu2***yg</span><span>RT電子</span><span class="num">183702.82</span></li>
                                <li><span class="user">t53g***68</span><span>PP電子</span><span class="num">133435.36</span></li>
                                <li><span class="user">teg5***53</span><span>AG電子</span><span class="num">187990.69</span></li>
                            </ul>
                        </div>
                    </div>
                    @if(in_array('SG', $_api_list))
                    <ul class="game-show sg" ng-show="show=='sg'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>旺旺公主</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>斧头帮</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>发发发2</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>汪旺财</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>森林之王</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>大明帝国</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>齐天大胜</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')"><span>潘精灵</span></li>
                    </ul>
                    @endif
                    {{--<ul class="game-show fish" ng-show="show=='fish'" ng-cloak>
                        <li data-img="01" ng-click="toAgFish()"><span>捕魚王2代</span></li>
                        <li data-img="02" ng-click="toMwFish()"><span>千炮捕魚</span></li>
                        <li data-img="03" ng-click="toJdbFish()"><span>龙王捕魚</span></li>
                        <li data-img="04" ng-click="toGnsFish()"><span>寻宝捕魚王</span></li>
                        <li data-img="05" ng-click="toPtFish()"><span>深海大赢家</span></li>
                        <li data-img="06" ng-click="toPgFish()"><span>鱼王争霸</span></li>
                        <li data-img="07" ng-click="toBbFish()"><span>捕魚达人</span></li>
                        <li data-img="08" ng-click="toPgFish2()"><span>全民捕魚</span></li>
                    </ul>--}}
                    @if(in_array('CQ9', $_api_list))
                    <ul class="game-show cq9" ng-show="show=='cq9'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>金玉满堂</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>金鸡报喜</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>甜蜜蜜</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>跳起来</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>钟馗运财</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>钻石水果王</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>水世界</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=2','','width=1024,height=768')"><span>火烧连环船</span></li>
                    </ul>
                    @endif
                    @if(in_array('MG', $_api_list))
                    <ul class="game-show mg" ng-show="show=='mg'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>摆脱</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>不朽的浪漫</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>银行抢匪2</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>阿瓦隆</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>燃烧的欲望</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>宝石之轮</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>淑女之夜</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')"><span>狂欢节</span></li>
                    </ul>
                    @endif
                    @if(in_array('AG', $_api_list))
                    <ul class="game-show ag" ng-show="show=='ag'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>XIN哥来了</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>阿里巴巴</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>神奇宝石</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>金拉霸</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>性感女仆</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>水果拉霸</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>金龙珠</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')"><span>灵猴献瑞</span></li>
                    </ul>
                    @endif
                    @if(in_array('PT', $_api_list))
                    <ul class="game-show pt" ng-show="show=='pt'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>深海大赢家</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>古怪猴子</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>湛蓝深海</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>招财童子</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>龙龙龙</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>疯狂麻将</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>熊之舞</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>宝石女王</span></li>
                    </ul>
                    @endif
                    @if(in_array('GNS', $_api_list))
                    <ul class="game-show gns" ng-show="show=='gns'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>名车排名赛</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>祥狮夺宝</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>招福钱龟</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>草原争霸战</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>古埃及之神</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>金龙卷</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>大红包</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GNS&game_type=2','','width=1024,height=768')"><span>金虎殿</span></li>
                    </ul>
                    @endif
                    @if(in_array('GPI', $_api_list))
                    <ul class="game-show gpi" ng-show="show=='gpi'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>甜蜜相待</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>埃及艳后</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>哪吒闹海</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>摇钱树</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>赌神</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>海盗寻宝</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>幸运骰子</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=2','','width=1024,height=768')"><span>招财猫</span></li>
                    </ul>
                    @endif
                    @if(in_array('PP', $_api_list))
                    <ul class="game-show pp" ng-show="show=='pp'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>8条龙</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>法力无边</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>5雄狮</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>猴子疯狂</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>黄金野狼</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>幸运新年</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>矮人黄金2</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')"><span>财源滚滚</span></li>
                    </ul>
                    @endif
                    @if(in_array('MW', $_api_list))
                    <ul class="game-show mw" ng-show="show=='mw'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>超级斗地主</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>森林舞会</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>五龙争霸</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>水浒传</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>黄金777</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>经典水果机</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>太极</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=2','','width=1024,height=768')"><span>好运5扑克</span></li>
                    </ul>
                    @endif
                    @if(in_array('HB', $_api_list))
                    <ul class="game-show hb" ng-show="show=='hb'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>四大神兽</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>街头乐队</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>炸弹追击</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>发财神</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>鲤鱼门</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>十二生肖</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>海洋之音</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>凤凰</span></li>
                    </ul>
                    @endif
                    @if(in_array('JDB', $_api_list))
                    <ul class="game-show jdb" ng-show="show=='jdb'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>直播变脸</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>变脸</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>金鸡报囍</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>麻雀无双</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>王牌特工</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>亿万富翁</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>月光秘宝</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=2','','width=1024,height=768')"><span>幸运赛车</span></li>
                    </ul>
                    @endif
                    {{--<ul class="game-show ne" ng-show="show=='ne'" ng-cloak>
                        <li data-img="01" ng-click="toNetentHtml()"><span>星爆</span></li>
                        <li data-img="02" ng-click="toNetentHtml()"><span>翻转卷轴</span></li>
                        <li data-img="03" ng-click="toNetentHtml()"><span>贡多的冒险</span></li>
                        <li data-img="04" ng-click="toNetentHtml()"><span>极速驱动</span></li>
                        <li data-img="05" ng-click="toNetentHtml()"><span>杰克哈姆斯</span></li>
                        <li data-img="06" ng-click="toNetentHtml()"><span>圣诞惊喜</span></li>
                        <li data-img="07" ng-click="toNetentHtml()"><span>小野狼</span></li>
                        <li data-img="08" ng-click="toNetentHtml()"><span>芬恩的炫涡</span></li>
                    </ul>--}}
                    @if(in_array('HB', $_api_list))
                    <ul class="game-show rt" ng-show="show=='rt'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>矿洞奇遇</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>神秘水果</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>龙之谕</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>财富满屋</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>麒麟送宝</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>深海宝藏</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>水果大爆炸</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=HB&game_type=2','','width=1024,height=768')"><span>宝石暴走</span></li>
                    </ul>
                    @endif

                    {{--<ul class="game-show ga" ng-show="show=='ga'" ng-cloak>
                        <li data-img="01" ng-click="toGameArtHtml()"><span>种钱得钱2</span></li>
                        <li data-img="02" ng-click="toGameArtHtml()"><span>财源滚滚</span></li>
                        <li data-img="03" ng-click="toGameArtHtml()"><span>寻金之旅</span></li>
                        <li data-img="04" ng-click="toGameArtHtml()"><span>海之女王</span></li>
                        <li data-img="05" ng-click="toGameArtHtml()"><span>三王</span></li>
                        <li data-img="06" ng-click="toGameArtHtml()"><span>雷声鸟</span></li>
                        <li data-img="07" ng-click="toGameArtHtml()"><span>国王的财富</span></li>
                        <li data-img="08" ng-click="toGameArtHtml()"><span>皇帝財富</span></li>
                    </ul>

                    <ul class="game-show pg" ng-show="show=='pg'" ng-cloak>
                        <li data-img="01" ng-click="toPgHtml()"><span>小玛莉</span></li>
                        <li data-img="02" ng-click="toPgHtml()"><span>奔驰宝马</span></li>
                        <li data-img="03" ng-click="toPgHtml()"><span>猴子爬树</span></li>
                        <li data-img="04" ng-click="toPgFish2()"><span>全民捕魚</span></li>
                        <li data-img="05" ng-click="toPgHtml()"><span>西游争霸</span></li>
                        <li data-img="06" ng-click="toPgHtml()"><span>动物星球</span></li>
                        <li data-img="07" ng-click="toPgFish()"><span>鱼王争霸</span></li>
                        <li data-img="08"><span>查看更多</span></li>
                    </ul>

                    <ul class="game-show isb" ng-show="show=='isb'" ng-cloak>
                        <li data-img="01" ng-click="toIsbHtml()"><span>百万分</span></li>
                        <li data-img="02" ng-click="toIsbHtml()"><span>财富树</span></li>
                        <li data-img="03" ng-click="toIsbHtml()"><span>重赏百万</span></li>
                        <li data-img="04" ng-click="toIsbHtml()"><span>皇家现金</span></li>
                        <li data-img="05" ng-click="toIsbHtml()"><span>幸运3</span></li>
                        <li data-img="06" ng-click="toIsbHtml()"><span>守护之眼</span></li>
                        <li data-img="07" ng-click="toIsbHtml()"><span>旋转卷轴</span></li>
                        <li data-img="08" ng-click="toIsbHtml()"><span>少林旋转</span></li>
                    </ul>--}}
                    @if(in_array('BBIN', $_api_list))
                    <ul class="game-show bb" ng-show="show=='bb'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>糖果派对</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>连环夺宝</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>糖果派对2</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>连环夺宝2</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>开心消消乐</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>趣味台球</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>明星97</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')"><span>发大财</span></li>
                    </ul>
                    @endif
                    @if(in_array('PNG', $_api_list))
                    <ul class="game-show png" ng-show="show=='png'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>宝石巫师</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>富二代</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>火焰小丑</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>神秘小丑</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>五彩宝石</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>月亮守护者</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>维京人世界</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PNG&game_type=2','','width=1024,height=768')"><span>好运招财猫</span></li>
                    </ul>
                    @endif
                    @if(in_array('PT', $_api_list))
                    <ul class="game-show pts" ng-show="show=='pts'" ng-cloak>
                        <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>百搭雄狮</span></li>
                        <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>捕魚多福</span></li>
                        <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>财神爷</span></li>
                        <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>送财童子</span></li>
                        <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>幸运金蟾</span></li>
                        <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>招财蟾蜍</span></li>
                        <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>奥兹的魔法</span></li>
                        <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')"><span>东风之战</span></li>
                    </ul>
                        @endif
                </div>
            </section>
            <section class="casino-link">
                <div class="wrapper">
                    <ul class="casino-tab" ng-init="tab='live'">
                        <li class="live" ng-mouseover="tab='live'" ng-class="{'active': tab=='live'}">
                            <a href="{{ route('web.liveCasino') }}">
                                真人視訊
                                <span>LIVE CASINO</span>
                                <div class="arrow"></div>
                            </a>
                        </li>
                        <li class="sport" ng-mouseover="tab='sport'" ng-class="{'active': tab=='sport'}">
                            <a href="{{ route('web.esports') }}">
                                體育赛事
                                <span>SPORT BET</span>
                                <div class="arrow"></div>
                            </a>
                        </li>
                        <li class="lottery" ng-mouseover="tab='lottery'" ng-class="{'active': tab=='lottery'}">
                            <a href="{{ route('web.lottory') }}">
                                彩票游戏
                                <span>LOTTERYS</span>
                                <div class="arrow"></div>
                            </a>
                        </li>
                    </ul>
                    <div class="mid-img" ng-class="tab"></div>
                    <div class="right-area">
                        <p>
                            <span>太阳城集团</span>手机APP完美上线，汇聚全球顶级平台额度无需转换。提供近万款電子游艺、真人視訊、时时彩、棋牌对战、捕魚达人、體育投注。支持手机一键存/取款，方便快捷，财富尽在掌握！
                        </p>
                        <div class="mobile-qr">
                            {{--<div>
                                <img src="https://cdn.igsttech.com/Web.Portal/LC001-01.Portal/Content/Views/Home/images/casino/qr.png" />
                            </div>--}}
                            <img src="https://cdn.igsttech.com/Web.Portal/LC001-01.Portal/Content/Views/Home/images/casino/mobile.png" />
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="wrapper">



        </div>
    </div>


@endsection
