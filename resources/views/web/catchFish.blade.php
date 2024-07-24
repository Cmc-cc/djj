@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/catchFish.css') }}">
    <style>
        @if($mb_path == 'mb41')
        #catch{
            margin-top: 189px;
        }
        @endif
        .mb2{
            margin-top: 193px;
        }
        .mb4{
            margin-top: 97px;
        }
        .mb6{
            margin-top: 167px;
        }
        .mb7{
            margin-top: 72px;
        }
        .mb12{
            margin-top: 112px;
        }
        .mb43{
            margin-top: 181px;
        }
        .mb45{
            margin-top: 98px;
        }
        #mb1{
            top:-151px;
        }
        #mb2,#mb3,#mb4{
            top: -186px;
        }
        #mb6,#mb7,#mb9,#mb10,#mb11,#mb12,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb20,#mb21,#mb24,#mb25,#mb26,#mb27,#mb29,#mb30,#mb31{
            top: -187px;
        }
        #mb32{
            top: -199px;
        }
        #mb23{
            top: -132px;
        }
        #mb8{
            top: -144px;
        }
        #mb28{
            top: -12px;
        }
        #mb33{
            top: -76px;
        }
        #mb34{
            top: -2px;
        }
    </style>
    <script>
        @if($mb_path == 'mb41')
        $(function () {
            $("#header").addClass("ScrollTop");
            $("#header-account").addClass("ScrollTop");
        })
        @endif
    </script>
    <div id="catch">
    <div class="fish-game {{$mb_path}}">
        <div id="logo"></div>
        <div class="notice-row" id="{{$mb_path}}">
            <div class="noticeBox">
                <div class="w">
                    <div class="title">
                        最新公告：
                    </div>
                    <div class="bd2">
                        <div id="memberLatestAnnouncement" style="cursor:pointer;color:#fff;">
                            <marquee id="mar0" scrollamount="4" direction="left" onmouseout="this.start()"
                                     onmouseover="this.stop()">
                                @foreach($_system_notices as $v)
                                    <div class="module" style="display: inline-block;">
                                        <span>~{{ $v->title }}~</span>
                                        <span>{{ $v->content }}</span>
                                    </div>
                                @endforeach
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul id="game-list">

            @if(in_array('AG', $_api_list) && ($_member && $_member->is_ag==1))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/ag.png') }}">
                        <div class="game-text">AG捕魚王</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=AG&game_type=6','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('BBIN', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/bb.png') }}">
                        <div class="game-text">BB捕魚达人</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=BBIN&game_type=2&game_code=ng_bbin_10123','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            @if(in_array('BBIN', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/bb2.png') }}">
                        <div class="game-text">BB捕魚大师</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=6&game_code=38001','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=BBIN&game_type=2&game_code=ng_bbin_10124','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            @if(in_array('GG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/cq9byql.png') }}">
                        <div class="game-text">GG捕魚2</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GG&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=GG&game_type=6','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('MW', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mw.png') }}">
                        <div class="game-text">MW千炮捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MW&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
            @if(in_array('SA', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/sa.png') }}">
                        <div class="game-text">SA鱼乐无穷</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=SA&game_type=6','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('CQ9', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/cq9.png') }}">
                        <div class="game-text">CQ9皇金渔场</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=CQ9&game_type=2&game_code=ng_cq9_10043','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('JDB', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/jdb.png') }}">
                        <div class="game-text">JDB财神捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7003','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=JDB&game_type=2&game_code=ng_jdb_10032','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fg.png') }}">
                        <div class="game-text">FG欢乐捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=FG&game_type=6','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('JDB', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/jdblw.png') }}">
                        <div class="game-text">JDB龙王捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7001','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=JDB&game_type=6&game_code=ng_jdb_10026','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('JDB', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/jdblw2.png') }}">
                        <div class="game-text">JDB龙王捕魚2</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=JDB&game_type=6&game_code=7_7002','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=JDB&game_type=6&game_code=ng_jdb_10034','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgmr.png') }}">
                        <div class="game-text">FG美人捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_mm','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=FG&game_type=6&game_code=ng_fg_10112','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgjnh.png') }}">
                        <div class="game-text">FG捕魚嘉年华</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_3D','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=FG&game_type=6&game_code=ng_fg_10117','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgtt.png') }}">
                        <div class="game-text">FG天天捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_tt','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=FG&game_type=6&game_code=ng_fg_10116','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgbn.png') }}">
                        <div class="game-text">FG捕鸟达人</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_bn','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=FG&game_type=6&game_code=ng_fg_10114','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fglt.png') }}">
                        <div class="game-text">FG雷霆战警</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=FG&game_type=6&game_code=fish_zj','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=FG&game_type=6&game_code=ng_fg_10113','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            {{--@if(in_array('CQ9', $_api_list))
                <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=CQ9&game_type=6&game_code=AD01','','width=1024,height=768')"
                    @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                    <div>
                        <img src="{{ asset('/web/images/catchFish/cq9byql.png') }}">
                        <div class="game-text">CQ9捕魚去喽</div>
                    </div>
                </li>
            @endif--}}
            @if(in_array('MT', $_api_list))
                <li @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                    @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mtlk.png') }}">
                        <div class="game-text">MT李逵捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0011','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
            @if(in_array('MT', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mtjc.png') }}">
                        <div class="game-text">MT金蟾捕魚</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MT&game_type=6&game_code=PTG0045','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
            @if(in_array('PT', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/ptdyj.png') }}">
                        <div class="game-text">PT深海大赢家</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=6&game_code=cashfi','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                                onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=PT&game_type=2&game_code=ng_pt_10090','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                    </div>
                </li>
            @endif
            @if(in_array('SW', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/sw.png') }}">
                        <div class="game-text">SW捕魚多福</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
            @if(in_array('SW', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/swfqsg.png') }}">
                        <div class="game-text">SW福气水果</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SW&game_type=6&game_code=sw_fuqsg','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
        </ul>
    </div>
    </div>
@endsection
