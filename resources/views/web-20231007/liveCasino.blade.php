@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/livecasion.css') }}">
    <style>
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
        #mb1{
            top:-96px;
        }
        #mb2,#mb3,#mb4,#mb5,#mb6,#mb7,#mb9,#mb10,#mb11,#mb12,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb19,#mb20,#mb21,#mb22{
            top:-131px;
        }
        #mb8{
            top:-91px;
        }

    </style>
    <div class="{{$mb_path}}" style="background: #1b191a;">
        <div id="banner"></div>
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
                <section id="lobby" ng-controller="LobbiesCtrl" class="ng-scope">
                    <ul class="game-list">
                       
						@if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                            <li game-box="ag">
                                <span>AG视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                           class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            
                            </li>
                        @endif
                        @if(in_array('BBIN', $_api_list))
                            <li game-box="bb">
                                <span>BBIN视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=live','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('BG', $_api_list))
                            <li game-box="bg">
                                <span>BG视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BG&gamename=2','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                          class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        
                            </li>
                        @endif
						@if(in_array('XHG', $_api_list))
                            <li game-box="xhg">
                                <span>新皇冠视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=XHG,'','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                          class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                           
                            </li>
                        @endif
						@if(in_array('DS', $_api_list))
                            <li game-box="ds">
                                <span>DS视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DS','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                          class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            
                            </li>
                        @endif
                        @if(in_array('SUNBET', $_api_list))
                            <li game-box="sb">
                                <span>申博视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SUNBET','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
						
						
                        @if(in_array('AB', $_api_list))
                            <li game-box="ab" class="no-margin">
                                <span>欧博视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AB','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                         class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            
                            </li>
                        @endif
                       
                       
                        @if(in_array('GD', $_api_list))
                            <li game-box="gd">
                                <span>GD视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GD','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                        @if(in_array('OG', $_api_list))
                            <li game-box="og">
                                <span>OG视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=OG','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                          class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                             
                            </li>
                        @endif
                        @if(in_array('DG', $_api_list))
                            <li game-box="dg"  class="no-margin">
                                <span>DG视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DG','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            
                            </li>
                        @endif
						@if(in_array('IGZR', $_api_list))
                            <li game-box="igzr">
                                <span>IG视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IGZR','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        @endif
                        @if(in_array('EBET', $_api_list))
                           <li game-box="ebet">
                                <span>EBET视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=EBET','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                         @if(in_array('MX', $_api_list))
                            <li game-box="mx">
                                <span>MX视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MX','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                         @endif
						 @if(in_array('SA', $_api_list))
                            <li game-box="sa">
                                <span>SA视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                          class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                             
                            </li>
                        @endif
						 @if(in_array('WM', $_api_list))
                            <li game-box="wm">
                                <span>WM视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WM','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif                        
						 @if(in_array('N2', $_api_list))
                            <li game-box="n2">
                                <span>N2视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=N2','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                        @endif
						@if(in_array('VG', $_api_list))
                            <li game-box="vg">
                                <span>VG视讯</span>
                                <a
                                        @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VG','','width=1024,height=768')"
                                        @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                        class="game-btn play-btn game_show" data-url="" style="top: 40%" href="javascript:">进入游戏</a>
                            </li>
                        @endif
                         </li>
                    </ul>
                </section>
        </div>

    </div>
@endsection