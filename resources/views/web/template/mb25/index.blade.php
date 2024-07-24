@extends('web.template.mb25.layouts.main')
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


    <div id="news" class="mar0">
        <div class="wrapper">
            <marquee onmouseover="this.stop()" onmouseout="this.start()" style="float:left; color:#fff; font-size:14px; line-height:30px;position:relative;left:10px;margin-top:0px;" scrollAmount=5 width=900>
                @foreach($_system_notices as $v)
                    <ul id="hot-news" ng-click="newsClick()">
                        ~{{ $v->title }}~{{ $v->content }}

                    </ul>
                @endforeach
            </marquee>
        </div>
    </div>


    <div id="banner">
        <section id="slide-banner" ng-controller="LobbiesCtrl" ng-cloak
                 slide-banner
                 slide-delay="500"
                 slide-duration="3000"
                 slide-effect="fold"
                 slide-ease="swing"
                 slide-trigger="click"
                 default-url="/Promotion">
            <div class="slide"></div>
            <ul class="slide-pager"></ul>

        </section>
    </div>


    <div id="content">
        <div class="wrapper">

            <div id="home">
                <div id="game-list" class="wrapper" ng-controller="LobbiesCtrl">
                    <ul id="game-box" ng-init="game='mg'">
                        @if(in_array('MG', $_api_list))
                        <li data-img="mg" ng-mousemove="game='mg'" ng-class="{'active': game=='mg'}">MG電子游艺</li>
                        @endif
                            @if(in_array('PT', $_api_list))
                        <li data-img="pt" ng-mousemove="game='pt'" ng-class="{'active': game=='pt'}">PT電子游艺</li>
                            @endif
                            @if(in_array('SG', $_api_list))
                        <li data-img="sg" ng-mousemove="game='sg'" ng-class="{'active': game=='sg'}">新霸電子游艺</li>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                        <li data-img="bbin" ng-mousemove="game='bbin'" ng-class="{'active': game=='bbin'}">BB電子游艺</li>
                            @endif
                            @if(in_array('AG', $_api_list))
                        <li data-img="ag" ng-mousemove="game='ag'" ng-class="{'active': game=='ag'}">AG電子游艺</li>
                                @endif
                    </ul>
                    <div id="game-lobby">
                        @if(in_array('MG', $_api_list))
                        <ul class="mg game-show" ng-show="game=='mg'">
                            <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">摆脱<span></span></li>
                            <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">银行破坏家<span></span></li>
                            <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">伴娘<span></span></li>
                            <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">丛林杀手<span></span></li>
                            <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">招财鞭炮<span></span></li>
                            <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">黄金工厂<span></span></li>
                            <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">不朽的爱情<span></span></li>
                            <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">心跳音符<span></span></li>
                            <li data-img="09" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">狐狸爵士<span></span></li>
                            <li data-img="10" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">雷神<span></span></li>
                        </ul>
                        @endif
                            @if(in_array('PT', $_api_list))
                        <ul class="pt game-show" ng-show="game=='pt'" ng-cloak>
                            <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">梦幻赛马<span></span></li>
                            <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">甲壳虫宾果<span></span></li>
                            <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">海宾嘉年华<span></span></li>
                            <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">夏洛克的秘密<span></span></li>
                            <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">百慕大三角洲<span></span></li>
                            <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">船长的宝藏<span></span></li>
                            <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">全景电影<span></span></li>
                            <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">沙漠宝藏<span></span></li>
                            <li data-img="09" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">东方神奇<span></span></li>
                            <li data-img="10" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">艾丽卡<span></span></li>
                        </ul>
                            @endif
                            @if(in_array('SG', $_api_list))
                        <ul class="sg game-show" ng-show="game=='sg'" ng-cloak>
                            <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">财神888<span></span></li>
                            <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">美人鱼<span></span></li>
                            <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">太空神猴<span></span></li>
                            <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">阿里巴巴<span></span></li>
                            <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">超吉猫<span></span></li>
                            <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">五龙吐珠<span></span></li>
                            <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">新法老宝藏<span></span></li>
                            <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">新下水道小魔兽<span></span></li>
                            <li data-img="09" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">新父女战殭屍<span></span></li>
                            <li data-img="10" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SG&game_type=2','','width=1024,height=768')">金狮拜年<span></span></li>
                        </ul>
                            @endif
                            @if(in_array('BBIN', $_api_list))
                        <ul class="bbin game-show" ng-show="game=='bbin'" ng-cloak>
                            <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">糖果派对<span></span></li>
                            <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">连环夺宝<span></span></li>
                            <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">斗鸡<span></span></li>
                            <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">明星97<span></span></li>
                            <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">喜福猴年<span></span></li>
                            <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">惑星战记<span></span></li>
                            <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">捕魚传奇<span></span></li>
                            <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">酷搜马戏团<span></span></li>
                            <li data-img="09" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">大话西游<span></span></li>
                            <li data-img="10" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">嗜血一族<span></span></li>
                        </ul>
                            @endif
                            @if(in_array('AG', $_api_list))
                        <ul class="ag game-show" ng-show="game=='ag'" ng-cloak>
                            <li data-img="01" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">捕魚王2代<span></span></li>
                            <li data-img="02" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">水果拉霸<span></span></li>
                            <li data-img="03" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">灵猴献瑞<span></span></li>
                            <li data-img="04" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">关东煮<span></span></li>
                            <li data-img="05" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">性感女仆2<span></span></li>
                            <li data-img="06" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">天空守护者<span></span></li>
                            <li data-img="07" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">杰克高手<span></span></li>
                            <li data-img="08" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">太空漫游<span></span></li>
                            <li data-img="09" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">极速幸运轮<span></span></li>
                            <li data-img="10" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">齐天大圣<span></span></li>
                        </ul>
                            @endif
                        <div id="winner">
                            <ul>
                                <li><span class="name">lj***2</span><span class="money1">42057.00</span><span class="game">摆脱</span></li>
                                <li><span class="name">zh***4</span><span class="money1">56846.00</span><span class="game">古怪猴子</span></li>
                                <li><span class="name">by***1</span><span class="money1">21001.00</span><span class="game">幸运锦鲤</span></li>
                                <li><span class="name">jj***3</span><span class="money1">98886.00</span><span class="game">魔法美人鱼</span></li>
                                <li><span class="name">da***6</span><span class="money1">123763.00</span><span class="game">明星97</span></li>
                                <li><span class="name">lq***3</span><span class="money1">84754.00</span><span class="game">复仇者刮刮</span></li>
                                <li><span class="name">xh***0</span><span class="money1">56657.00</span><span class="game">古怪猴子</span></li>
                                <li><span class="name">yf***3</span><span class="money1">25685.00</span><span class="game">灵猴献瑞</span></li>
                                <li><span class="name">ex***42</span><span class="money1">90668.00</span><span class="game">糖果派对</span></li>
                                <li><span class="name">xl***2</span><span class="money1">61552.00</span><span class="game">宝石联机</span></li>
                                <li><span class="name">db***6</span><span class="money1">256145.00</span><span class="game">淑女之夜</span></li>
                                <li><span class="name">xh***8</span><span class="money1">26153.00</span><span class="game">沉默的武士</span></li>
                                <li><span class="name">mm***1</span><span class="money1">75595.00</span><span class="game">AG捕魚王</span></li>
                                <li><span class="name">as***4</span><span class="money1">15412.00</span><span class="game">明星97</span></li>
                                <li><span class="name">qq***1</span><span class="money1">52453.00</span><span class="game">宝石联机</span></li>
                            </ul>
                        </div>
                        <div id="money1">
                            <span class="game-show" ng-show="game=='mg'" ng-cloak>MG彩金奖池<span digital word="CNY" digital-min="9804765" digital-max="10402860"></span></span>
                            <span class="game-show" ng-show="game=='pt'" ng-cloak>PT彩金奖池<span digital word="CNY" digital-min="9804765" digital-max="10402860"></span></span>
                            <span class="game-show" ng-show="game=='sg'" ng-cloak>SG彩金奖池<span digital word="CNY" digital-min="9804765" digital-max="10402860"></span></span>
                            <span class="game-show" ng-show="game=='bbin'" ng-cloak>BBIN彩金奖池<span digital word="CNY" digital-min="9804765" digital-max="10402860"></span></span>
                            <span class="game-show" ng-show="game=='ag'" ng-cloak>AG彩金奖池<span digital word="CNY" digital-min="9804765" digital-max="10402860"></span></span>
                        </div>
                    </div>
                </div>
                <div id="item">
                    <ul class="game-item">
                        <li data-img="01"><a href="{{route('web.eGame')}}"><span>老虎机100倍奖金一拉即中 , 等你来战</span></a></li>
                        <li data-img="02"><a href="{{ route('web.liveCasino') }}"><span>汇聚全球最顶尖的真人娱乐平台</span></a></li>
                        <li data-img="03"><a href="{{ route('web.lottory') }}"><span>全球最佳彩票网站系统</span></a></li>
                        <li data-img="04"><a href="{{ route('web.esports') }}"><span>每日为你精选3000场热门比赛</span></a></li>
                    </ul>
                    <ul class="game-info wrapper">
                        <li class="account">注册<span>Registered</span></li>
                        <li>绑定<span>Binding</span></li>
                        <li>存款<span>Deposit</span></li>
                        <li>游戏<span>Play</span></li>
                        <li>提款<span>Withdraw</span></li>
                        <li>到账<span>Arrival</span></li>
                    </ul>
                </div>
                <div id="about">
                    <div class="wrapper">
                        <div class="slide">
                            <ul class="cycle-slideshow"
                                data-cycle-slides="> li"
                                data-cycle-pager=".cycle-pager"
                                data-cycle-speed="200">
                                <li data-img="01"></li>
                                <li data-img="02"></li>
                                <li data-img="03"></li>
                            </ul>
                            <div class="cycle-pager"></div>
                        </div>
                        <div class="about-content">
                            <span>永利皇宮</span>邀您开启瑰丽之旅!耗资41亿美元精心打造,设有1,706间优雅华贵的客房及套房,让宾客恍如置身于宏伟的皇宫之中。空调观光缆车带您横越占地三万平方米的表演湖,投入充满惊喜的梦幻国度...
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



@endsection
