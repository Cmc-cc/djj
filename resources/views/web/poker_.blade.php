@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')

    <link rel="stylesheet" href="{{ asset('/web/css/pocker.css') }}">
    <style>
        @if($mb_path == 'mb41')
        #content{
            margin-top: 189px;
        }
        @endif
        #content > .wrapper {
            width: 1020px;
        }
        #lobby>ul.game-list>li{
            border: none;
            background-color: #212025;
            margin: 0px;
        }
        #lobby>ul.game-list {
            padding: 0px;
            font-size: 0;
            text-align: center;
        }
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
            margin-top: 160px;
        }
        .mb34{
            margin-top: 160px;
        }
        .mb43{
            margin-top: 181px;
        }
        .mb45{
            margin-top: 98px;
        }
        #mb1{
            top:84px;
        }
        #mb2,#mb3,#mb4,#mb5,#mb6,#mb7,#mb9,#mb10,#mb11,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb19,#mb20,#mb21,#mb22,#mb24,#mb25,#mb26,#mb27,#mb29,#mb30,#mb31,#mb37,#mb46{
            top: 49px;
        }
        #mb8{
            top: 91px;
        }
        #mb23{
            top: 102px;
        }
        #mb32{
            top: 36px;
        }
        #mb33{
            top: 159px;
        }
        #mb34{
            top: 233px;
        }
        #mb35{
            top: 214px;
        }
        #mb38{
            top: 200px;
        }
        #mb42,#mb43,#mb44{
            top: 50px;
        }
        #mb45{
            top: 145px;
        }
        @if($mb_path == 'mb8' || $mb_path == 'mb9' || $mb_path == 'mb18' || $mb_path=='mb5' || $mb_path=='mb6' || $mb_path=='mb21' || $mb_path=='mb22')
            #lobby ul.game-list>li{
            padding-top: 0px;
        }
        @endif

    </style>
    <script>
        @if($mb_path == 'mb41')
        $(function () {
            $("#header").addClass("ScrollTop");
            $("#header-account").addClass("ScrollTop");
        })
        @endif
    </script>
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
    <div id="content" class="{{$mb_path}}">
        <div class="wrapper">

            <section id="lobby" ng-controller="LobbiesCtrl" class="ng-scope">
                <ul class="game-list en-gamelist" ng-init="show='kg'">
                    @if(in_array('AP', $_api_list))
                        <li plat-type="ap" game-box="city761" onclick="getGameList('ap')"></li>
                    @endif
                    @if(in_array('VG', $_api_list))
                        <li plat-type="vg" game-box="vg" onclick="getGameList('vg')"></li>
                    @endif
                    @if(in_array('SGP', $_api_list))
                        <li plat-type="sgp" game-box="sgp" onclick="getGameList('sgp')"  ></li>
                    @endif
                    @if(in_array('LEG', $_api_list))
                        <li plat-type="leg" game-box="leg" onclick="getGameList('leg')"></li>
                    @endif
                    @if(in_array('MT', $_api_list))
                        <li plat-type="mt" game-box="mt" onclick="getGameList('mt')"></li>
                    @endif
                    @if(in_array('KY', $_api_list))
                        <li plat-type="ky" game-box="ky" onclick="getGameList('ky')"  ></li>
                    @endif
                    @if(in_array('FG', $_api_list))
                        <li plat-type="fg" game-box="fg" onclick="getGameList('fg')"></li>
                    @endif
                        @if(in_array('NW', $_api_list))
                            <li plat-type="nw" game-box="nw" onclick="getGameList('nw')"></li>
                        @endif
                        @if(in_array('RMG', $_api_list))
                            <li plat-type="rmg" game-box="rmg" onclick="getGameList('rmg')"></li>
                        @endif
                </ul>
                <iframe id="gameFrame" src="" ng-show="show=='kg'" class="ng-animate" style=""></iframe>
            </section>
        </div>
    </div>
<script>
    $(function () {
        $('.en-gamelist li').click(function () {
            $(this).addClass('active');
            $(this).siblings('li').removeClass('active');
        })
        var plat_type_obj = $("#lobby").find("ul li").first();
        $(plat_type_obj).css('margin-left','110px');
        $(plat_type_obj).addClass('active');
        var plat_type = $(plat_type_obj).attr('plat-type');
        var url = "{{route('game.playGame')}}?plat_type=" + plat_type + "&game_type=7";
        $("#gameFrame").attr("src", url);
    });
    function getGameList(plat_type) {
        var url = "{{route('game.playGame')}}?plat_type=" + plat_type + "&game_type=7";
        $("#gameFrame").attr("src", url);//
    }
</script>


@endsection
