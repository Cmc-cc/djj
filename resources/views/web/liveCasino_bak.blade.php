@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/livecasion.css') }}">
    <style>
        #content {
            background-image: url(../images/bg_welcome.jpg);
        }
        #lobby>ul.game-list{
            padding: 0;
        }
        #lobby>ul.game-list>li{
            padding: 0;
            margin: 0;
        }
        .mb2{
            margin-top: 193px;
        }
        .mb6{
            margin-top: 166px;
        }
        .mb7{
            margin-top: 72px;
        }
        .mb4{
            margin-top: 97px;
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
        #content{
            background: #1b191a;
        }
        #mb1{
            top:-96px;
        }
        #mb2,#mb3,#mb4,#mb5,#mb6,#mb7,#mb9,#mb10,#mb11,#mb12,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb19,#mb20,#mb21,#mb22,#mb24,#mb25,#mb26,#mb27,#mb28,#mb29,#mb30,#mb31{
            top:-131px;
        }
        #mb23{
            top:-77px;
        }
        #mb8{
            top:-91px;
        }
        #mb32{
            top: -144px;
        }
        #mb33{
            top: -20px;
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
    <div class="{{$mb_path}}" style="background: #1b191a;">
        <div id="banner" @if($mb_path == 'mb41') style="margin-top: 189px;" @endif></div>
        <div id="{{$mb_path}}" class="notice-row">
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
        <div id="content">
                <section id="lobby-live" ng-controller="LobbiesCtrl" class="ng-scope">
                    <ul class="game-list">
                        @if(in_array('DG', $_api_list))
                            <li game-box="dg"  >
                                <span>DG視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=DG&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                                <a
                                        onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=DG&game_type=1','','width=1024,height=768')"
                                        class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                            </li>
                        @endif
                        @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                            <li game-box="ag">
                                <span>AG視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                                <a
                                        onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                                        class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                            </li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <li game-box="bb">
                                <span>BBIN視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('BG', $_api_list))
                            <li game-box="bg">
                                <span>BG視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BG&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                                <a
                                        onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=BG&game_type=1','','width=1024,height=768')"
                                        class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                            </li>
                        @endif
                        @if(in_array('SUNBET', $_api_list) || in_array('SUNBETS',$_api_list))
                            <li game-box="sb">
                                <span>申博視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('ALLBET', $_api_list))
                            <li game-box="ab" class="no-margin">
                                <span>欧博視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                                <a
                                        onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                                        class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                            </li>
                        @endif
                        @if(in_array('LEBO', $_api_list))
                            <li game-box="lebo">
                                <span>LEBO視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEBO&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('SA', $_api_list))
                            <li game-box="sa">
                                <span>SA視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                                <a
                                        onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
                                        class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                            </li>
                        @endif
                        @if(in_array('GD', $_api_list))
                            <li game-box="gd">
                                <span>GD視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('OG', $_api_list))
                            <li game-box="og" class="no-margin">
                                <span>OG視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 25%" href="javascript:">进入游戏</a>
                                <a
                                        onclick="javascript:window.open('{{ route('game.demo_login') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                                        class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>
                            </li>
                        @endif
                        
                        @if(in_array('MG', $_api_list))
                            <li game-box="mg">
                                <span>MG視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('PT', $_api_list))
                            <li game-box="pt">
                                <span>PT視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('GPI', $_api_list))
                            <li game-box="gpi" class="no-margin">
                                <span>GPI視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GPI&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        @endif
                        @if(in_array('EBET', $_api_list))
                            <li game-box="ebet" >
                                <span>EBET視訊</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=EBET&game_type=1','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                            @if(in_array('SEXY', $_api_list))
                                <li game-box="sexy" >
                                    <span>SEXY視訊</span>
                                    <a
                                            @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SEXY&game_type=1','','width=1024,height=768')"
                                            @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                            class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                                </li>
                            @endif
                            
{{--                        <li game-box="more"></li>--}}
                        {{--<li game-box="more"></li>--}}
                        {{--<li game-box="more"></li>--}}
                    </ul>
                </section>
        </div>

    </div>
@endsection
