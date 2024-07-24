@extends('web.template.mb24.layouts.main')
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
        <section id="slide-banner" ng-controller="LobbiesCtrl" ng-cloak
                 slide-banner
                 slide-delay="500"
                 slide-duration="3000"
                 slide-effect="fold"
                 slide-ease="swing"
                 slide-trigger="click">
            <div class="slide"></div>
            <ul class="slide-pager"></ul>
            <a class="slide-click prev"><</a>
            <a class="slide-click next">></a>
        </section>
    </div>



    <div id="news" class="mar0">
        <div class="wrapper" data-title="最新公告">

            <div id="hot-news"  ng-click="newsClick()"><marquee onmouseover="this.stop()" onmouseout="this.start()" ng-click="newsClick()" style="float:left; color:#fff; font-size:14px; line-height:30px;position:relative;left:10px;margin-top:4px;" scrollAmount=5 width=780>@foreach($_system_notices as $v)
                        ~{{ $v->title }}~{{ $v->content }}@endforeach
                </marquee></div>
        </div>
    </div>

    <div id="content">
        <div class="wrapper">


            <div id="home">
                <div class="jackpot">
                    <span digital digital-min="9210628" add word="¥"></span>
                </div>

                <ul id="game-box" ng-controller="LobbiesCtrl">
                    <li data-img="slot">
                        <a href="{{ route('web.eGame') }}"></a>
                        <ul>
                            <li game-box="1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">摆脱</li>
                            <li game-box="2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">幸运双星</li>
                            <li game-box="3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">宝石之轮</li>
                            <li game-box="4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">花花公子</li>
                            <li game-box="5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">连环夺宝</li>
                            <li game-box="6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">糖果派对</li>
                            <li game-box="7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">喜福猴年</li>
                            <li game-box="8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">招财童子</li>
                            <li game-box="9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">淑女之夜</li>
                        </ul>
                    </li>

                    <li data-img="live">
                        <a href="{{ route('web.liveCasino') }}"></a>
                        <ul>
                            @if(in_array('BBIN', $_api_list))
                            <li game-box="1" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>百家乐</li>
                            @endif
                                @if(in_array('BBIN', $_api_list))
                            <li game-box="2" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>轮盘</li>
                                @endif
                                @if(in_array('BBIN', $_api_list))
                            <li game-box="3" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>骰宝</li>
                                @endif
                                @if(in_array('SUNBET', $_api_list))
                            <li game-box="4" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>龙虎斗</li>
                                @endif
                                @if(in_array('OG', $_api_list))
                            <li game-box="5" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>二八杠</li>
                                @endif
                                @if(in_array('GPI', $_api_list))
                            <li game-box="6" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>番摊</li>
                                @endif
                            {{--<li game-box="7">色碟</li>--}}
                                @if(in_array('AG', $_api_list))
                            <li game-box="8" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>牛牛</li>
                                @endif
                                @if(in_array('SUNBET', $_api_list))
                            <li game-box="9" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')" @else onclick="Alert();"@endif>三公</li>
                                    @endif
                        </ul>
                    </li>
                    <li data-img="board">
                        <a href="{{ route('web.poker') }}"></a>
                        <ul>
                            <li game-box="1" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')">通比牛牛</li>
                            <li game-box="2" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">抢红包</li>
                            <li game-box="3" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">21点</li>
                            <li game-box="4" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">押庄老虎</li>
                            <li game-box="5" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">三公</li>
                            <li game-box="6" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">炸金花</li>
                            <li game-box="7" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">抢庄牛牛</li>
                            <li game-box="8" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">德州扑克</li>
                            <li game-box="9" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">二八杠</li>
                        </ul>
                    </li>
                    <li data-img="fish">
                        <a href="{{ route('web.catchFish') }}">
                            <ul>
                                <li game-box="1">捕魚大亨</li>
                                <li game-box="2">皇金渔场</li>
                                <li game-box="3">龙王捕魚</li>
                                <li game-box="4">龙王捕魚2</li>
                                <li game-box="5">捕魚王</li>
                                <li game-box="6">千炮捕魚</li>
                                <li game-box="7">捕魚大师</li>
                                <li game-box="8">捕魚达人</li>
                                <li game-box="9">捕魚多福</li>
                            </ul>
                        </a>
                    </li>
                </ul>
                <div class="about">
                    <p>
                        <span>{{ $_system_config->site_title or 'motoo' }}</span>是位于澳门新口岸区的一家实地赌场,于2004年5月18日开幕，总投资逾2.4亿美元，现时为澳门最大的娱乐场。2009年5月18日<span>{{ $_system_config->site_title or 'motoo' }}</span>与BBIN平台达成合作协议 正式开放线上投注娱乐，<span>{{ $_system_config->site_title or 'motoo' }}</span>由此步入互联网博彩时代。从一个实地酒店赌场到线上博彩第一门户的巨大跨越，逐渐发展为囊括PC端、网页娱乐、手机投注全品类，网络、移动全渠道，覆盖产品全生命周期的博彩娱乐集团。
                        {{--<a href="/AboutUS">MORE</a>--}}
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
