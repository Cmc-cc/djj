@php($path = 'web.template.'.$mb_path.'.layouts.main')
@extends($path)
@section('content')
    <link rel="stylesheet" href="{{ asset('/web/css/pocker.css') }}">
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
            margin-top: 160px;
        }
        #mb1{
            top:84px;
        }
        #mb2,#mb3,#mb4,#mb5,#mb6,#mb7,#mb9,#mb10,#mb11,#mb13,#mb14,#mb15,#mb16,#mb17,#mb18,#mb19,#mb20,#mb21,#mb22{
            top: 49px;
        }
        #mb8{
            top: 91px;
        }
        @if($mb_path == 'mb8' || $mb_path == 'mb9' || $mb_path == 'mb18' || $mb_path=='mb5' || $mb_path=='mb6' || $mb_path=='mb21' || $mb_path='mb22')
            #lobby ul.game-list>li{
            padding-top: 0px;
        }
        @endif
    </style>
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
        <div class="wrapper" style="width:100%;height:auto">

            <section id="lobby" ng-controller="LobbiesCtrl" class="ng-scope">
                <ul class="game-list en-gamelist" ng-init="show='kg'" style="display:none">
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
					@if(in_array('AS', $_api_list))
                        <li plat-type="fg" game-box="fg" onclick="getGameList('as')"></li>
                    @endif
					@if(in_array('YG', $_api_list))
                        <li plat-type="fg" game-box="fg" onclick="getGameList('yg')"></li>
                    @endif
					@if(in_array('GG', $_api_list))
                        <li plat-type="fg" game-box="fg" onclick="getGameList('gg')"></li>
                    @endif
					
					
                </ul>
                <iframe  src="/qipai/"  width="100%" style="height:1850px !important"  marginwidth="0" marginheight="0" frameborder="0" scrolling="no" ></iframe>
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
        var url = "{{route('wg.playGame')}}?plat_type=" + plat_type + "&game_type=7";
        //$("#gameFrame").attr("src", url);
    });
    function getGameList(plat_type) {
        var url = "{{route('wg.playGame')}}?plat_type=" + plat_type + "&game_type=7";
        $("#gameFrame").attr("src", url);//
    }
</script>


@endsection