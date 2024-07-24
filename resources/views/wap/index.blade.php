@extends('wap.layouts.main')
@section('after.css')

    <link type="text/css" rel="stylesheet" href="{{ asset('/wap/css/main.css') }}">
    <script type="text/javascript" src="{{ asset('/wap/js/layer.js') }}"></script>
@endsection
@section('content')

    @include('wap.layouts.header')
    <style>
        .m_header{
            z-index:100;
        }
        .m_wrapper .m_box.m_box-half{
            float: left;
            width: 25%;
            margin-bottom: 18px;
        }
        .m_wrapper .m_box .m_box-link{
            position: relative;
            display: block;
            color: #FFF;
            font-size: 13px;
            text-align: center;
            text-decoration: none;
        }
        .m_wrapper .m_box img{
            display: block;
            margin: 0 auto;
            width:49px;
        }
        .m_wrapper .m_box .m_box-name_new{
            margin-top: 5px;
            display:block;

        }
        .m_wrapper .m_box .m_box-link{
            background-color:#1b1d1b;
            border:0
        }
        .m_notice{
            margin-top:0
        }
        .category-wrap-placeholder_3S0wB {
            height: 38px;
        }
        .category-wrap_d3wny {
            position: relative;
            height: 38px;
            background-color: #111;
            box-sizing: border-box;
            border-top: solid 1px #2B2825;
            border-bottom: solid 1px #2B2825;
            /*padding-right: 36px;*/
        }
        .category-wrap-placeholder_3S0wB.fixed_24GUJ .category-wrap_d3wny {
            position: fixed;
            top: 46px;
            left: 0;
            z-index: 1000;
            width: 100%;
        }
        .category-wrap_d3wny .category-outer-inner_17KJ5 {
            width: 100%;
            height: 36px;
            overflow-x: scroll;
            -webkit-overflow-scrolling: touch;
        }
        .category-wrap_d3wny .category-name_2VWaa {
            position: relative;
            color: #FFF;
            float: left;
            width: 20%;
            /*height: 36px;*/
            line-height: 36px;
            font-size: 13px;
            text-align: center;
            user-select: none;
            -webkit-user-select: none;
            box-sizing: border-box;
            padding: 0 10px;
        }
        .category-wrap_d3wny .category-name_2VWaa.current_2-Ch8 {
            color: #C72620;
        }
        .category-wrap_d3wny .category-toggle-icon_2RR3B {
            position: absolute;
            top: 0;
            right: 0;
            width: 16px;
            height: 16px;
            background-color: #1B1D1B;
            padding: 10px;
        }
        .fixed_24GUJ .category-wrap_d3wny .category-name_2VWaa{
            line-height:36px;
        }
        .category-wrap_d3wny .category-name_2VWaa a{
            color:#fff;
        }
        .category-wrap_d3wny .category-name_2VWaa a.active{
            color:#C72620;
        }
        .m_wrapper .m_box{
            padding:0;
        }
        .m_category{
            margin-bottom:18px;
        }
    </style>
    <script>
        function choose_game(sign,plat_type,game_type,game_code='',demo_code='') {
            if(sign){
                layer.open({
                    content: '游戏类型选择'
                    ,btn: ['进入游戏', '试玩']
                    ,skin: 'footer'
                    ,yes: function(index){
                                @if($_member)
                        var url = '{{route('wg.playGame')}}?plat_type='+plat_type+'&game_type='+game_type+'&devices=1'+'&game_code='+game_code
                        window.open(url);
                        @else
                            location.href = '{{ route('wap.login') }}';
                        @endif
                        layer.closeAll();
                    }
                    ,no : function(index) {
                        var demo_url = '{{route('wg.demo_login')}}?plat_type='+plat_type+'&game_type='+game_type+'&devices=1'+'&game_code='+demo_code
                        window.open(demo_url)
                    }
                });
            }else{
                layer.open({
                    content: '游戏类型选择'
                    ,btn: ['进入游戏']
                    ,skin: 'footer'
                    ,yes: function(index){
                                @if($_member)
                        var demo_url = '{{route('wg.playGame')}}?plat_type='+plat_type+'&game_type='+game_type+'&devices=1'+'&game_code='+game_code
                        window.open(demo_url);
                        @else
                            location.href = '{{ route('wap.login') }}';
                        @endif
                        layer.closeAll();
                    }
                });
            }

        }
    </script>
    <div class="m_container">
        <div class="m_body">
            <div class="m_banner">
                <div id="slide" class="container-fluid slide">
                    <ul class="bd">
                        @foreach($banners as $item)
                        <li>
                            <a target="_blank" href="{{$item->jumpurl}}">
                                <img class="carousel-inner" src="{{ $item->path }}">
                            </a>
                        </li>
                        @endforeach
                        {{--<li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner2.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner3.jpg') }}"></a>
                        </li>
                        <li><a href="#"><img class="carousel-inner" src="{{ asset('/wap/images/m_banner4.jpg') }}"></a>--}}
                        </li>
                    </ul>
                    <ul class="hd"></ul>
                </div>
            </div>

            <div class="m_notice">
                <span class="notice_logo"></span>
                <div class="pull-left notice_title">
                    系统公告:
                </div>
                <div class="pull-left notice_content">
                    <marquee id="mar0" behavior="scroll" direction="left" scrollamount="4">
                        @foreach($_system_notices as $v)
                            <div class="module" style="display: inline;word-break: keep-all;white-space: nowrap;">
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
            </div>
            @if($_system_config->is_hongbao ==1)
                <div style="padding: 10px;">
                    <a target="_blank" href="{{route('wap.red')}}">
                        <img style="border-radius: 8px" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                    </a>
                </div>
            @endif
            <div class="category-wrap-placeholder_3S0wB">
                <div class="category-wrap_d3wny"><div class="category-outer-inner_17KJ5">
                        <div class="category-inner_ZydHv " style="width: 100%; height: 36px;">
                            <div class="category-name_2VWaa category-name-casino_3hsqT current_2-Ch8"><a href="javascript:void(0)">视讯</a></div>
                            <div class="category-name_2VWaa category-name-live_cYRVv "><a href="javascript:void(0)">电子</a></div>
                            <div class="category-name_2VWaa category-name-card_3g1gp "><a href="javascript:void(0)">彩票</a></div>
                            <div class="category-name_2VWaa category-name-ball_1w8UO "><a href="javascript:void(0)">体育</a></div>
                            <div class="category-name_2VWaa category-name-lottery_J-CBk "><a href="javascript:void(0)">棋牌</a></div>
							
                        </div></div><!--<span class="category-toggle-icon_2RR3B">
			<img class="ga-switch-card" src="/wap/images/100percent/btn_switch_cards_aio3.png" alt=""></span>--></div></div>
            {{--视讯--}}
            <div class="m_wrapper clear">
                <div class="m_category" id="live">
                    视讯直播
                </div>
                @if(in_array('AG', $_api_list) || in_array('AG',$_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                                onclick="choose_game(true,'AG',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_aglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                            AG视讯
                          </span>
                        </a>
                    </div>
                @endif				
				
                @if(in_array('BBIN', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=live&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                           
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_live_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        BB视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('BG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BG&gamename=2&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_bglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        BG视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SUNBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SUNBET&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_sblive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        申博视讯
                      </span>
                        </a>
                    </div>
                @endif
				
				
				@if(in_array('DS', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DS&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/wgds.png') }}" alt="">
                            <span class="m_box-name_new">
                        DS视讯
                      </span>
                        </a>
                    </div>
                @endif
				@if(in_array('XHG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=XHG&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/wgxhg.png') }}" alt="">
                            <span class="m_box-name_new">
                        新皇冠视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('AB', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AB&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                           
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_ablive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        欧博视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('LEBO', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=LEBO&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                           onclick="choose_game(false,'LEBO',1)"
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_evolive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        LEBO视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('SA', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                           
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_salive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        SA视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GD', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GD&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/wggd.png') }}" alt="">
                            <span class="m_box-name_new">
                        GD视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('OG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=OG&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                           
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_oglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        OG视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('DG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DG&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                            >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_dglive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        DG视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('MX', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MX&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                         
                        >
                            <img src="{{ asset('/wap/images/100percent/wgMX.png') }}" alt="">
                            <span class="m_box-name_new">
                        MX视讯
                      </span>
                        </a>
                    </div>
                @endif
				 @if(in_array('VG', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VG&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/wgVG.png') }}" alt="">
                            <span class="m_box-name_new">
                        VG视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('WM', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WM&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                           
                        >
                            <img src="{{ asset('/wap/images/100percent/wgWM.png') }}" alt="">
                            <span class="m_box-name_new">
                        WM视讯
                      </span>
                        </a>
                    </div>
                @endif
				 @if(in_array('IGZR', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IGZR&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/wgIGZR.png') }}" alt="">
                            <span class="m_box-name_new">
                        IG视讯
                      </span>
                        </a>
                    </div>
                @endif
				 @if(in_array('N2', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=N2&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/wgn2.png') }}" alt="">
                            <span class="m_box-name_new">
                        N2视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('GPI', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=gpi&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                           
                        >
                            <img src="{{ asset('/wap/images/100percent/btn_icon_gpilive_n.png') }}" alt="">
                            <span class="m_box-name_new">
                        GPI视讯
                      </span>
                        </a>
                    </div>
                @endif
                @if(in_array('EBET', $_api_list))
                    <div class="m_box m_box-half">
                        <a class="m_box-link"
                          @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=EBET&devices=1','','width=1024,height=768')"
                           @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                          
                        >
                            <img src="{{ asset('/wap/images/100percent/ebet.png') }}" alt="">
                            <span class="m_box-name_new">
                        EBET视讯
                      </span>
                        </a>
                    </div>
                @endif
                {{--电子--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="casino">
                        电子游艺/捕鱼
                    </div>
                    <div class="m_box m_box-half">
                        <a class="m_box-link" href="{{route('wap.index_py')}}">
                            <img src="{{ asset('/wap/images/100percent/btn_icon_fisharea_n.png') }}" alt="">
                            <span class="m_box-name_new">
                            捕鱼机
                          </span>
                        </a>
                    </div>
					
                    @if(in_array('PGS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=pgs&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/pgs.png') }}" alt="">
                                <span class="m_box-name_new">
                            PGS电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PNG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PNG&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/png.png') }}" alt="">
                                <span class="m_box-name_new">
                            PNG电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('GNS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GNS&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/gnscasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            GNS电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PP', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PP&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ppcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            PP电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SG&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_sgcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            SG电子
                          </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('FG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=FG&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/fg.png') }}" alt="">
                                <span class="m_box-name_new">
                            FG电子
                          </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('PTS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/pts.png') }}" alt="">
                                <span class="m_box-name_new">
                            天风电子
                          </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('KA', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=KA&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgka.png') }}" alt="">
                                <span class="m_box-name_new">
                            KA电子
                          </span>
                            </a>
                        </div>
                    @endif
					

                    @if(in_array('MW', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MW&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_mwcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            MW电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('CQ9', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=CQ9&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_cq9casino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            CQ9电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('SA', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_sacasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        SA电子
                        </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('JDB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_jdbcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        JDB电子
                        </span>
                            </a>
                        </div>
                    @endif                    
                    @if(in_array('VT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VT&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgvt.png') }}" alt="">
                                <span class="m_box-name_new">
                        VT电子
                      </span>
                            </a>
                        </div>
                    @endif
					@if(in_array('BS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BS&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgbs.png') }}" alt="">
                                <span class="m_box-name_new">
                        BS电子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BOG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BOG&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_bngcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BNG电子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('MG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MG&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_mgcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            MG电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PT&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ptcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        PT电子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('AG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_agslotcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            AG电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('GPI', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GPI&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_gpicasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            GPI电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_game_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BB电子
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('QT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=QT&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_qtcasino_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            QT电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('DT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DT&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/dt.png') }}" alt="">
                                <span class="m_box-name_new">
                            DT电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('PG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/pg.png') }}" alt="">
                                <span class="m_box-name_new">
                            PG电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('GTI', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GTI&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/gti.png') }}" alt="">
                                <span class="m_box-name_new">
                            GTI电子
                          </span>
                            </a>
                        </div>
                    @endif
					
					 @if(in_array('ISB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ISB&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgisb.png') }}" alt="">
                                <span class="m_box-name_new">
                            ISB电子
                          </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('GA', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GA&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgga.png') }}" alt="">
                                <span class="m_box-name_new">
                            GA电子
                          </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('AE', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AE&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgae.png') }}" alt="">
                                <span class="m_box-name_new">
                            AE电子
                          </span>
                            </a>
                        </div>
                    @endif
					

                    @if(in_array('GGE', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GGE&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wggge.png') }}" alt="">
                                <span class="m_box-name_new">
                            GG电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('HB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=HB&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/hbcasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            HB电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('RT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=RT&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/rtcasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            RT电子
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('ISB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ISB&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/isbcasino.png') }}" alt="">
                                <span class="m_box-name_new">
                            ISB电子
                          </span>
                            </a>
                        </div>
                    @endif
                   
                </div>
                {{--彩票--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="lotter">
                        彩票游戏
                    </div>
                    @if(in_array('WG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WG&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                            >
                                <img src="{{ asset('/wap/images/100percent/wgwg.png') }}" alt="">
                                <span class="m_box-name_new">
                            WG彩票
                          </span>
                            </a>
                        </div>
                    @endif  
					
                    @if(in_array('SC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SC&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            >
                                <img src="{{ asset('/wap/images/100percent/wgsc.png') }}" alt="">
                                <span class="m_box-name_new">
                            世彩彩票
                          </span>
                            </a>
                        </div>
                    @endif  
					 @if(in_array('BGC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BGC&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_bglive_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            BG彩票
                          </span>
                            </a>
                        </div>
                    @endif  
					 @if(in_array('GBC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GBC&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            >
                                <img src="{{ asset('/wap/images/100percent/wggb.png') }}" alt="">
                                <span class="m_box-name_new">
                            GB彩票
                          </span>
                            </a>
                        </div>
                    @endif  
					
                    @if(in_array('EG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=EG&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                                    
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_eglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            EG彩票
                          </span>
                            </a>
                        </div>
                    @endif
					@if(in_array('SWC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SWC&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                                    
                            >
                                <img src="{{ asset('/wap/images/100percent/wgswc.png') }}" alt="">
                                <span class="m_box-name_new">
                            SW彩票
                          </span>
                            </a>
                        </div>
                    @endif
					
                    @if(in_array('IG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            IG彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG&gamename=imlotto10059&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                              
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            IG六合彩
                          </span>
                            </a>
                        </div>
                    @endif
                     @if(in_array('IG2', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG2&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            IG2彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IG2', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IG2&gamename=imlotto10059&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                              
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_iglottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            IG2六合彩
                          </span>
                            </a>
                        </div>
                    @endif
                   
                    @if(in_array('VR', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=VR&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            >
                                <img src="{{ asset('/wap/images/100percent/btn_icon_vrlottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            VR彩票
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('BBIN', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=Ltlottery&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            >
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_lottery_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BB彩票
                      </span>
                            </a>
                        </div>
                    @endif
                   
                </div>

                {{--体育--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="ball">
                        体育赛事
                    </div>
                    @if(in_array('GJ', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GJ&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                             <!--onclick="choose_game(false,'AG',4)"-->
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_gjball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        皇冠体育
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('UG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=UG&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/wgug.png') }}" alt="">
                                <span class="m_box-name_new">
                            UG体育
                          </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('GB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GB&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/wggb.png') }}" alt="">
                                <span class="m_box-name_new">
                            GB体育
                          </span>
                            </a>
                        </div>
                    @endif
					
                    @if(in_array('BBIN', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=ball&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               <!--onclick="choose_game(false,'AG',4)"-->
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        BB体育
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IBC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IBC&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                              <!-- onclick="choose_game(false,'IBC',4)"--->                           
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_ibcball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                        沙巴体育
                      </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('AG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=TASSPTA&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               <!--onclick="choose_game(false,'AG',4)"-->
                            
                                <img src="{{ asset('/wap/images/100percent/btn_icon_agball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            AG体育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('NEWBB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=NEWBB&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                              <!--onclick="choose_game(false,'AG',4)"-->
                            
                                <img src="{{ asset('/wap/images/100percent/btn_icon_bcsport_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            NEWBB体育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('ESB', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=ESB&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                              
                           <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/btn_icon_esbball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            ESB电竞
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('HC', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=HC&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                           <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/btn_icon_hcball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            皇朝电竞
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('AVIA', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AVIA&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/btn_icon_aviaball_n.png') }}" alt="">
                                <span class="m_box-name_new">
                            泛亚电竞
                          </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('KG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=KG&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/wgkg.png') }}" alt="">
                                <span class="m_box-name_new">
                            KG电竞
                          </span>
                            </a>
                        </div>
                    @endif
					
                    @if(in_array('SS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                              @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SS&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                               
                            <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/SS.png') }}" alt="">
                                <span class="m_box-name_new">
                            三昇体育
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('IM', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link"
                               @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IM&devices=1','','width=1024,height=768')"
                               @else onclick="location.href = '{{ route('wap.login') }}'" @endif
                            <!--onclick="choose_game(false,'AG',4)"-->
                                <img src="{{ asset('/wap/images/100percent/im.png') }}" alt="">
                                <span class="m_box-name_new">
                            IM体育
                          </span>
                            </a>
                        </div>
                    @endif
                    
                </div>


                {{--棋牌--}}
                <div class="m_wrapper clear">
                    <div class="m_category" id="kycard">
                        棋牌游戏
                    </div>
					 @if(in_array('KY', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=KY&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_kycard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                              开元棋牌
                          </span>
                            </a>
                        </div>
                    @endif
                   
					@if(in_array('DSQP', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=DSQP&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/wgdsqp.png') }}" alt="">
                                <span class="m_box-name_new">
                                DS棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					@if(in_array('TH', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=TH&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgth.png') }}" alt="">
                                <span class="m_box-name_new">
                              天豪棋牌
                          </span>
                            </a>
                        </div>
                    @endif
					@if(in_array('WGQP', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=WGQP&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgwg.png') }}" alt="">
                                <span class="m_box-name_new">
                              WG棋牌
                          </span>
                            </a>
                        </div>
                    @endif
					@if(in_array('LEG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=LEG&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_legcard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                                乐游棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					
					
                    @if(in_array('761', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=761&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/ap.png') }}" alt="">
                                <span class="m_box-name_new">
                                761棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					
					@if(in_array('YG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=YG&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgyg.png') }}" alt="">
                                <span class="m_box-name_new">
                              王者棋牌
                          </span>
                            </a>
                        </div>
                    @endif
					@if(in_array('GG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=GG&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wggg.png') }}" alt="">
                                <span class="m_box-name_new">
                              GG棋牌
                          </span>
                            </a>
                        </div>
                    @endif
					
					@if(in_array('NW', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=NW&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgnw.png') }}" alt="">
                                <span class="m_box-name_new">
                              新世界棋牌
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('NEWVG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=NEWVG&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/btn_icon_vgcard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                                VG棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					@if(in_array('AS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=AS&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/wgas.png') }}" alt="">
                                <span class="m_box-name_new">
                                天发棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					
					@if(in_array('HG', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=HG&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/wghg.png') }}" alt="">
                                <span class="m_box-name_new">
                                欢乐棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					
                    @if(in_array('SW', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=SW&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/wgsw.png') }}" alt="">
                                <span class="m_box-name_new">
                              双赢棋牌
                          </span>
                            </a>
                        </div>
                    @endif
                    @if(in_array('JS', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=JS&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/wgjs.png') }}" alt="">
                                <span class="m_box-name_new">
                                金龙棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					 @if(in_array('IMQP', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=IMQP&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                {{--<img class="m_isComing" src="{{ asset('/wap/images/m_isComing.png') }}" alt="">--}}
                                <img src="{{ asset('/wap/images/100percent/imqp.png') }}" alt="">
                                <span class="m_box-name_new">
                                IM棋牌
                            </span>
                            </a>
                        </div>
                    @endif
					 
                    @if(in_array('MT', $_api_list))
                        <div class="m_box m_box-half">
                            <a class="m_box-link" @if($_member) onclick="javascript:window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=MyGameLobby&devices=1','','width=1024,height=768')"    @else onclick="location.href = '{{ route('wap.login') }}'" @endif    >  
                                <img src="{{ asset('/wap/images/100percent/btn_icon_mtcard_n.png') }}" alt="">
                                <span class="m_box-name_new">
                              美天棋牌
                          </span>
                            </a>
                        </div>
                    @endif
                   
                </div>

                {{--优惠--}}
                <div class="m_wrapper clear">
                    <div class="m_category">
                        优惠活动
                    </div>
                    <div class="m_box m_box-full">
                        <a class="m_box-link" href="{{ route('wap.activity_list') }}">
                            <img src="{{ asset('/wap/images/m_box-act2.png') }}" alt="" style="width:100%">
                            <span class="m_box-name_new">
                            优惠活动
                          </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            (function ($) {
                $(function () {
                    $('.disabled').on('click', function () {
                        alert('暂未开放，敬请期待！');
                    });
                })
                $(window).scroll(
                    function() {
                        var scrollTop = $(this).scrollTop();
                        var scrollHeight = $(document).height();
                        var windowHeight = $(this).height();
                        if(scrollTop>=170){
                            $(".category-wrap-placeholder_3S0wB").addClass("fixed_24GUJ")
                        }else{
                            $(".category-wrap-placeholder_3S0wB").removeClass("fixed_24GUJ")
                        }
                        var liveTop=$("#live").offset().top;
                        var casinoTop=$("#casino").offset().top;
                        var lotterTop=$("#lotter").offset().top;
                        var ballTop=$("#ball").offset().top;
                        var kycardTop=$("#kycard").offset().top;
                        scrollTop=scrollTop+180;
                        console.log(kycardTop);
                        console.log(scrollTop);
                        if(scrollTop>=liveTop&&scrollTop<casinoTop){
                            $('.category-name_2VWaa').eq(0).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=casinoTop&&scrollTop<lotterTop){
                            $('.category-name_2VWaa').eq(1).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=lotterTop&&scrollTop<ballTop){
                            $('.category-name_2VWaa').eq(2).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=ballTop&&scrollTop<kycardTop){
                            $('.category-name_2VWaa').eq(3).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }else if(scrollTop>=kycardTop){
                            $('.category-name_2VWaa').eq(4).find('a').addClass("active").parent().siblings().find('a').removeClass('active')
                        }
                    }
                );
                $(".category-name_2VWaa a").click(function(){
                    var scrollTop=$(window).scrollTop()
                    var index=$(this).parent().index();
                    console.log(index);
                    switch(index){
                        case 0:
                            scrollTop=$("#live").offset().top;
                            break;
                        case 1:
                            scrollTop=$("#casino").offset().top;
                            break;
                        case 2:
                            scrollTop=$("#lotter").offset().top;
                            break;
                        case 3:
                            scrollTop=$("#ball").offset().top;
                            break;
                        case 4:
                            scrollTop=$("#kycard").offset().top;
                            break;
                    }
                    console.log(scrollTop)
                    document.body.scrollTop =scrollTop-80;
                    $(this).addClass("active").parent().siblings().find('a').removeClass('active')
                })
            })(jQuery)

        </script>

@endsection