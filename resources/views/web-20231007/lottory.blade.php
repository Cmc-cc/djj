@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    {{--<link rel="stylesheet" href="{{ asset('/web/css/caipiao.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/web/css/lottery.css') }}">
    <style>
        .mb2{
            margin-top: 193px;
        }
        .mb4{
            margin-top: 97px;
        }
        .mb6{
            margin-top: 166px;
        }
        .mb7{
            margin-top: 72px;
        }
        .mb12{
            margin-top: 112px;
        }
        #mb1{
            top:-320px;
        }
        #mb2,#mb3,#mb4,#mb5,#mb6,#mb7,#mb9,#mb10,#mb11,#mb12,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb19,#mb20,#mb21,#mb22{
            top:-355px;
        }
        #mb8{
            top:-315px;
        }
    </style>
    <div id="banner" class="{{$mb_path}}"></div>
    <div class="notice-row">
        <div class="noticeBox" id="{{$mb_path}}">
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
                    
                     @if(in_array('WG', $_api_list))
                        <li game-box="sgl">
                            <div class="pic"></div>
                            <div class="info"><span class="title">WG彩票</span>最火爆彩票投注平台，口碑最好，用户好评率最高的平台</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WG','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					 @if(in_array('GBC', $_api_list))
                        <li game-box="bg">
                            <div class="pic"></div>
                            <div class="info"><span class="title">GB彩票</span>知名顶级的彩票平台之一</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GBC','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                           <!-- <a
                                    onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BG','','width=1024,height=768')"
                                    class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>-->
                        </li>
                    @endif
					
                    @if(in_array('EG', $_api_list))
                        <li game-box="eg">
                            <div class="pic"></div>
                            <div class="info"><span class="title">EG彩票</span>提供丰富的游戏玩法</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=EG','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
                    @if(in_array('IG', $_api_list))
                        <li game-box="ig">
                            <div class="pic"></div>
                            <div class="info">
                                <span class="title">IG彩票</span>亚洲最大最流行的彩票平台之一
                            </div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif

                    @if(in_array('IG', $_api_list))
                        <li game-box="ig6">
                            <div class="pic"></div>
                            <div class="info">
                                <span class="title">IG六合彩</span>亚洲最大最流行的彩票平台之一
                            </div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG&gamename=imlotto10059','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
                   @if(in_array('IG2', $_api_list))
                        <li game-box="ig">
                            <div class="pic"></div>
                            <div class="info">
                                <span class="title">IG2彩票</span>亚洲最大最流行的彩票平台之一
                            </div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG2','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif

                    @if(in_array('IG2', $_api_list))
                        <li game-box="ig6">
                            <div class="pic"></div>
                            <div class="info">
                                <span class="title">IG2六合彩</span>亚洲最大最流行的彩票平台之一
                            </div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG2&gamename=0','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
                   
                    @if(in_array('VR', $_api_list))
                        <li game-box="vr">
                            <div class="pic"></div>
                            <div class="info"><span class="title">VR彩票</span>即时开奖，即时投注，分分都刺激</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VR','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					@if(in_array('SWC', $_api_list))
                        <li game-box="swc">
                            <div class="pic"></div>
                            <div class="info"><span class="title">双赢彩票</span>即时开奖，即时投注，分分都刺激</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SWC','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					
                    @if(in_array('BBIN', $_api_list))
                        <li game-box="bb">
                            <div class="pic"></div>
                            <div class="info"><span class="title">BBIN彩票</span>亚洲最大最流行的彩票平台之一</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=Ltlottery','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
                    @if(in_array('SC', $_api_list))
                        <li game-box="bg">
                            <div class="pic"></div>
                            <div class="info"><span class="title">世彩彩票</span>知名顶级的彩票平台之一</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SC','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                           <!-- <a
                                    onclick="javascript:window.open('{{ route('wg.demo_login') }}?plat_type=BG','','width=1024,height=768')"
                                    class="game-btn try-btn game_show" style="top: 55%" href="javascript:">试玩</a>-->
                        </li>
                    @endif
					@if(in_array('BGC', $_api_list))
                        <li game-box="vr">
                            <div class="pic"></div>
                            <div class="info"><span class="title">BG彩票</span>即时开奖，即时投注，分分都刺激</div>
                            <a
                                    @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BGC','','width=1024,height=768')"
                                    @else
                                    onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    class="game-btn play-btn game_show" data-url="" style="top: 45%" href="javascript:">进入游戏</a>
                        </li>
                    @endif
					


                    {{--<li game-box="more">
                        <div class="pic"></div>
                        <div class="info"><span class="title">敬请期待</span>COMING SOON</div>
                    </li>
                    <li game-box="more">
                        <div class="pic"></div>
                        <div class="info"><span class="title">敬请期待</span>COMING SOON</div>
                    </li>
                    <li game-box="more">
                        <div class="pic"></div>
                        <div class="info"><span class="title">敬请期待</span>COMING SOON</div>
                    </li>--}}
                </ul>
            </section>
        </div>
    </div>
@endsection