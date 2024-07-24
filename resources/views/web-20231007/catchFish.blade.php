@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/catchFish.css') }}">
    <style>
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
        #mb1{
            top:-151px;
        }
        #mb2,#mb3,#mb4{
            top: -186px;
        }
        #mb6,#mb7,#mb9,#mb10,#mb11,#mb12,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb20,#mb21{
            top: -187px;
        }
        #mb8{
            top: -144px;
        }
    </style>
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
            @if(in_array('AG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/ag.png') }}">
                        <div class="game-text">AG捕鱼王</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=6','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                 class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            @if(in_array('BBIN', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/bb.png') }}">
                        <div class="game-text">BB捕鱼达人</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=30599','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=30599','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            @if(in_array('BBIN', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/bb2.png') }}">
                        <div class="game-text">BB捕鱼大师</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            
            @if(in_array('SA', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/sa.png') }}">
                        <div class="game-text">SA鱼乐无穷</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=FishermenGold','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                               class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            @if(in_array('CQ9', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/cq9.png') }}">
                        <div class="game-text">CQ9皇金渔场</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=CQ9&gamename=AB3','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            @if(in_array('JDB', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/jdb.png') }}">
                        <div class="game-text">JDB财神捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                 class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
           
            @if(in_array('JDB', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/jdblw.png') }}">
                        <div class="game-text">JDB龙王捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7001','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                 class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif
            @if(in_array('JDB', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/jdblw2.png') }}">
                        <div class="game-text">JDB龙王捕鱼2</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7002','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                 class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        {{--<a
                                onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BBIN&gamename=38001','','width=1024,height=768')"
                                class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                    </div>
                </li>
            @endif			

			
            @if(in_array('MT', $_api_list))
                <li @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40024','','width=1024,height=768')"
                    @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mtlk.png') }}">
                        <div class="game-text">MT李逵捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40024','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
            @if(in_array('MT', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mtjc.png') }}">
                        <div class="game-text">MT金蟾捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40025','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
			  @if(in_array('PG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mtjc.png') }}">
                        <div class="game-text">PG 鱼王争霸</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=4001','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
			 @if(in_array('PG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mtjc.png') }}">
                        <div class="game-text">PG 全民捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=4004','','width=1024,height=768')"
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
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PT&gamename=cashfi','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                       
                        
                    </div>
                </li>
            @endif
			 
           @if(in_array('PTS', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/sw.png') }}">
                        <div class="game-text">PTS捕鱼多福</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fufish_intw','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
            @if(in_array('PTS', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/swfqsg.png') }}">
                        <div class="game-text">PTS福气水果</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fuqsg','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                    </div>
                </li>
            @endif
			@if(in_array('DSQP', $_api_list))
               
				<li>
                    <div class="game-logo">
                       <img src="{{ asset('/web/images/catchFish/cq9byql.png') }}">
                        <div class="game-text">DS</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DSQP&game_type=1001','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
								 <a
                    </div>
                </li>
            @endif
			@if(in_array('DSQP', $_api_list))
               
				<li>
                    <div class="game-logo">
                       <img src="{{ asset('/web/images/catchFish/cq9byql.png') }}">
                        <div class="game-text">DS千炮捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DSQP&game_type=1002','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
								 <a
                    </div>
                </li>
            @endif
			
			
            @if(in_array('MW', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/mw.png') }}">
                        <div class="game-text">MW千炮捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MW&game_type=1051','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
								 <a
                    </div>
                </li>
            @endif
			 @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fg.png') }}">
                        <div class="game-text">FG欢乐捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&game_type=fish_hl','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                              
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgmr.png') }}">
                        <div class="game-text">FG美人捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_mm','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                               
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgjnh.png') }}">
                        <div class="game-text">FG捕鱼嘉年华</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_3D','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                               
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgtt.png') }}">
                        <div class="game-text">FG天天捕鱼</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_tt','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                          
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fgbn.png') }}">
                        <div class="game-text">FG捕鸟达人</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_bn','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                               
                    </div>
                </li>
            @endif
            @if(in_array('FG', $_api_list))
                <li>
                    <div class="game-logo">
                        <img src="{{ asset('/web/images/catchFish/fglt.png') }}">
                        <div class="game-text">FG雷霆战警</div>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_zj','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                        <a
                              
                    </div>
                </li>
            @endif
            
        </ul>
    </div>
    </div>
@endsection