@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/sport.css') }}">
    <style>
        .mb2{
            margin-top: 193px;
        }
        .mb4{
            margin-top: 97px;
        }
        .mb6{
            margin-top: 165px;
        }
        .mb7{
            margin-top: 72px;
        }
        .mb12{
            margin-top: 112px;
        }
        #mb2,#mb3,#mb4,#mb5,#mb6,#mb7,#mb9,#mb10,#mb11,#mb12,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb19,#mb20,#mb21,#mb22{
            top: -110px;
        }
        #mb8{
            top: -70px;
        }
    </style>
    <div id="banner" class="{{$mb_path}}"></div>
    <div class="notice-row" id="{{$mb_path}}">
        <div class="noticeBox" @if($mb_path=='mb1')style="top: -124px;"@endif>
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
        <div class="wrapper">
            <section id="lobby" ng-controller="LobbiesCtrl" class="ng-scope">
                <ul class="game-list">
                    @if(in_array('GJ', $_api_list))
                        <li game-box="gj">
                            <p>皇冠体育<span>CROWN SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GJ','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
                    

                   @if(in_array('IM', $_api_list))
                            <li game-box="im">
                                <p>IM体育<span>IM SPORTS</span></p>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IM','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                    @if(in_array('IBC', $_api_list))
                    <li game-box="saba">
                        <p>沙巴体育<span>SABA SPORTS</span></p>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IBC','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                    </li>
                    @endif
					@if(in_array('IBC', $_api_list))
                    <li game-box="saba">
                        <p>沙巴体育2<span>SABA SPORTS</span></p>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IBC2','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                    </li>
                    @endif
					
                    @if(in_array('BBIN', $_api_list))
                    <li game-box="bb" class="no-margin">
                        <p>BBIN体育<span>BBIN SPORTS</span></p>
                        <a
                                @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=ball','','width=1024,height=768')"
                                @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                    </li>
                    @endif
                    @if(in_array('NEWBB', $_api_list))
                        <li game-box="newbb">
                            <p>NEWBB体育<span>NEWBB SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=NEWBB','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					@if(in_array('GB', $_api_list))
                        <li game-box="gb">
                            <p>GB体育<span>GB SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GB','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					

                    @if(in_array('AG', $_api_list))
                        <li game-box="ag">
                            <p>AG体育<span>AG SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=TASSPTA','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                            {{--<a
                                    onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=AG&gamename=TASSPTA','','width=1024,height=768')"
                                    class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>--}}
                        </li>
                    @endif
                    @if(in_array('ESB', $_api_list))
                        <li game-box="esb" class="no-margin">
                            <p>ESB电竞<span>ESB 电竞</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ESB','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					
					@if(in_array('UG', $_api_list))
                        <li game-box="bl">
                            <p>UG体育<span>UG SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=UG&gamename=SP3','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
                    @if(in_array('AVIA', $_api_list))
                        <li game-box="avia">
                            <p>泛亚电竞<span>AVIA SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AVIA','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					@if(in_array('KG', $_api_list))
                        <li game-box="kg">
                            <p>KG电竞<span>KG SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=KG','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					
                    @if(in_array('HC', $_api_list))
                        <li game-box="hc">
                            <p>皇朝电竞<span>HC SPORTS</span></p>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=HC','','width=1024,height=768')"
                                    @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
                        @if(in_array('SS', $_api_list))
                            <li game-box="ss" class="no-margin">
                                <p>三升体育<span>SS SPORTS</span></p>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SS','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录！',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        
                   {{-- <li game-box="more" class="no-margin"></li>
					<li game-box="more" class="no-margin"></li>--}}
                </ul>
            </section>
        </div>
    </div>
@endsection