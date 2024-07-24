<!DOCTYPE html>
<html>
<head>
    <title>{{ $_system_config->site_title or '标题' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="generator" content="{{ $_system_config->site_title or '标题' }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/swiper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/game.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/wap/theme2/css/red.css') }}">
    <script src="{{ asset('/wap/theme2/js/iconfont.js') }}"></script>
</head>
<body>
   <!-- <div id="loadingbg">
        <div class="loading">
            <img src="Public/Home/picture/three-dots.svg" width="60" alt="">
        </div>
    </div>-->
    <div class="App">
        <header>
            <div class="AppHeader is-fixed">
                <div class="AppHeader-inner">
                    <a class="AppHeader-logo" href="javascript:void(0)">
                        <img src="{{ $_system_config->m_site_logo }}" width="145" height="40">
                    </a>
                        <div class="AppHeader-actions">
							@if (Auth::guard('member')->guest())
							<a class="AppHeader-white" href="{{ route('wap.login') }}">登录</a>
                            <a class="AppHeader-yellow" href="{{ route('wap.register') }}">注册</a>
							@else
							{{--<span class="my-icon">
                                <svg class="icon" aria-hidden="true">
                                   <!-- <use xlink:href="#icon-weidenglutouxiang"></use>-->
                                </svg>
                            </span>--}}

							@endif


                        </div>
                </div>
            </div>
        </header>
        <main>
            <div class="AppMain">
                <div class="AppMain-banner">
                    <style type="text/css">
                        .swiper-container {
                            width: 100%;
                            height: 100%;
                        }

                        .swiper-slide {
                            text-align: center;
                            font-size: 18px;
                            background: #fff;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: -webkit-flex;
                            display: flex;
                            -webkit-box-pack: center;
                            -ms-flex-pack: center;
                            -webkit-justify-content: center;
                            justify-content: center;
                            -webkit-box-align: center;
                            -ms-flex-align: center;
                            -webkit-align-items: center;
                            align-items: center;
                        }
                    </style>
                    <div class="swiper-container" id="banner">
                        <div class="swiper-wrapper">
                            @foreach($banners as $item)
						  <div class="swiper-slide">
                              <a target="_blank" href="{{$item->jumpurl}}"><img width="100%" src="{{ $item->path }}" alt=""></a>
                          </div>
                            @endforeach
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="AppMain-notice">
                    <span class="AppMain-notice-icon">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-notice"></use>
                        </svg>
                    </span>
                    <div class="AppMain-notice-list">
<?php
							$n_str = '';
							foreach ($system_notices as $item)
								$n_str .= $item->content . '&nbsp;&nbsp;&nbsp;';
							?>
                                                    <marquee id="msgNews" scrollamount="4" scrolldelay="100" direction="left"  style="font-size:8px;">{{ $n_str }}     </marquee>

                    </div>

                </div>
                @if($_system_config->is_hongbao ==1)
                    <div style="padding: 10px;">
                        <a target="_blank" href="{{route('wap.red')}}">
                            <img style="border-radius: 8px;width: 100%" src="{{asset('wap/images/hongbao/qiang.jpg')}}">
                        </a>
                    </div>
                @endif
                @if(in_array('AG', $_api_list) || in_array('AG',$_api_list))
                    <div class="AppMain-webmaster gamelist-h">
                        <div class="gameitem">
                            <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                            <div class="gametxtbox">
                                <div class="gametxtbox-info">
                                    <div class="gametitle"><i class="icon-webmaster"></i>AG视讯</div>
                                    <div class="gameinfo">
                                        <i class="gamestar star-6"></i>
                                        <div class="gameonline"><span class="cred">1000</span>人在玩</div>
                                    </div>
                                    <div class="gamebtns">
                                        



                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=ag&devices=1','_blank')"@endif>进入</a>
                                    </div>
                                </div>
                                <div class="gametxtbox-activity"><i class="iconact"></i>女优厅</div>
                            </div>
                        </div>
                    </div>

                @endif
				@if(in_array('WG', $_api_list) || in_array('WG',$_api_list))
                    <div class="AppMain-webmaster gamelist-h">
                        <div class="gameitem">
                            <div class="gameicon"><i class="icon-games icon-games-WG icon-zoom80"></i></div>
                            <div class="gametxtbox">
                                <div class="gametxtbox-info">
                                    <div class="gametitle"><i class="icon-webmaster"></i>WG彩票</div>
                                    <div class="gameinfo">
                                        <i class="gamestar star-6"></i>
                                        <div class="gameonline"><span class="cred">5000</span>人在玩</div>
                                    </div>
                                    <div class="gamebtns">
                                        



                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=wg&devices=1','_blank')"@endif>进入</a>
                                    </div>
                                </div>
                                <div class="gametxtbox-activity"><i class="iconact"></i>最全彩票</div>
                            </div>
                        </div>
                    </div>

                @endif
				
				 @if(in_array('SUNBET', $_api_list))
                    <div class="AppMain-webmaster gamelist-h">
                        <div class="gameitem">
                            <div class="gameicon"><i class="icon-games icon-games-SUNBET icon-zoom80"></i></div>
                            <div class="gametxtbox">
                                <div class="gametxtbox-info">
                                    <div class="gametitle"><i class="icon-webmaster"></i>申博视讯</div>
                                    <div class="gameinfo">
                                        <i class="gamestar star-6"></i>
                                        <div class="gameonline"><span class="cred">1000</span>人在玩</div>
                                    </div>
                                    <div class="gamebtns">

                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SUNBET&devices=1','_blank')"@endif>进入</a>
                                    </div>
                                </div>
                                <div class="gametxtbox-activity"><i class="iconact"></i>女优厅</div>
                            </div>
                        </div>
                    </div>

                @endif
				
                      @if(in_array('DG', $_api_list))
                        <div class="AppMain-webmaster gamelist-h">
                            <div class="gameitem">
                                <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                <div class="gametxtbox">
                                    <div class="gametxtbox-info">
                                        <div class="gametitle">
                                            <i class="icon-webmaster"></i>BB视讯</div>
                                        <div class="gameinfo">
                                            <i class="gamestar star-6"></i>
                                            <div class="gameonline"><span class="cred">1974</span>人在玩</div>
                                        </div>
                                        <div class="gamebtns">
                                          


                                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=bbin&gamename=live&devices=1')"@endif>进入</a>
                                        </div>
                                    </div>
                                    <div class="gametxtbox-activity"><i class="iconact"></i>全网热推主播品牌</div>
                                </div>
                            </div>
                        </div>
						 @endif

            </div>
            <div class="AppMain-game">
                <div class="gametab">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide active"><span>全部</span></div>
                                    <div class="swiper-slide"><span>电子</span></div>
                                    <div class="swiper-slide"><span>视讯</span></div>
                                    <div class="swiper-slide"><span>彩票</span></div>
                                    <div class="swiper-slide"><span>捕鱼</span></div>
                                    <div class="swiper-slide"><span>棋牌</span></div>
                                    <div class="swiper-slide"><span>体育</span></div>
                        </div>
                    </div>
                </div>
                <div class="gamelist-container">
                    <div class="swiper-container gameslist" id="gameslist">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gamelist gamelist-v">

												  @if(in_array('AG', $_api_list) || in_array('AG',$_api_list))
								                     <div class="gameitem new"  @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=ag')" @endif data-game="">
                                                        <div class="gameicon">
                                                            <i class="icon-games icon-games-AG icon-zoom80"></i>
                                                        </div>
                                                        <div class="gametitle">AG视讯</div>
                                                        <i class="gamestar star-4"></i>
                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>

                                                    </div>
													@endif
                                                   
												  @if(in_array('BBIN', $_api_list))

													 <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=bbin&gamename=live')" @endif data-game="">
                                                        <div class="gameicon">
                                                            <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                                        </div>
                                                        <div class="gametitle">BB视讯</div>
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">12578</span>人在玩</div>
														 </div>
												  @endif
                                                      @if(in_array('BG', $_api_list))

                                                          <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=bg&gamename=2')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-BG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">BG视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">12528</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('SUNBET', $_api_list))

                                                          <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SUNBET')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SUNBET icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">申博 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">5968</span>人在玩</div>
                                                          </div>
                                                      @endif
													 
													  
													  @if(in_array('XHG', $_api_list))

                                                          <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=XHG')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-XHG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">新皇冠 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">12578</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('DS', $_api_list))

                                                          <div class="gameitem burst" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=DS')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-DS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">DS 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">14285</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('AB', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=AB')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-ALLBET icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">欧博 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">8687</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('SA', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SA')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SA icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">SA 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">6858</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('GD', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GD')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GD icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GD 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">3685</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('OG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=OG')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-OG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">OG 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">3987</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('DG', $_api_list))
													 <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=DG')" @endif data-game="">
                                                        <div class="gameicon">
                                                            <i class="icon-games icon-games-DG icon-zoom80"></i>
                                                        </div>
                                                        <div class="gametitle">DG 视讯</div>
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">1586</span>人在玩</div>
														 </div>
														 @endif                                                                                                         
                                                      @if(in_array('N2', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=N2')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-N2 icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">N2 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">3854</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('MX', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=MX')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-MX icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">MX 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">4523</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('WM', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=WM')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-WM icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">WM 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">4523</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('VG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=VG')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-VG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">VG 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">6854</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('IGZR', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IGZR')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-IGZR icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">IG 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">4258</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('EBET', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=EBET')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-EBET icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">EBET 视讯</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">3684</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('PGS', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PGS&gamename=MyGameLobby')"   @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-PGS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">PGS 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2578</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('PNG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PNG&gamename=MyGameLobby')"   @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-PNG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">PNG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2689</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('KA', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=KA&gamename=MyGameLobby')"   @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-KA icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">KA 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">6889</span>人在玩</div>
                                                          </div>
                                                      @endif
													  
                                                      @if(in_array('GNS', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GNS&gamename=MyGameLobby')"   @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GNS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GNS 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2654</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                     @if(in_array('PTS', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PTS&gamename=MyGameLobby')"   @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-PTS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">天风 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">6654</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                     
                                                      @if(in_array('PP', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PP&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GPE icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">PP 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('VT', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=VT&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-VT icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">VT 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('GGE', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GGE&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1238</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('ISB', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=ISB&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-ISB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">ISB 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1658</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('AE', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=AE&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-AE icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">AE 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('GA', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GA&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GA icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GA 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                                          </div>
                                                      @endif
													  
                                                      @if(in_array('MW', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=MW&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-MW icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">MW 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1589</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('CQ9', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=CQ9&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">CQ9 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1647</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('SA', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SA&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SA icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">SA 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1289</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('JDB', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-JDB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">JDB 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1478</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('FG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=FG&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-FG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">FG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1675</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                     
                                                      @if(in_array('BOG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BOG&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-BNG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">BNG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">3584</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('MG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=MG&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-MGE icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">MG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">3248</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('PT', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PT&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-AMB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">PT 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1875</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('AG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=AG&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-AG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">AG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2584</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('GPI', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GPI&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GPI icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GPI 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2978</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('BBIN', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=game')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">BB 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">8954</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('QT', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=QT&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-QT icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">QT 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2587</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('DT', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=DT&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-DT icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">DT 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2685</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('PG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PG&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-PG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">PG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2869</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('BS', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BS&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-BS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">BS 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">24758</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('GTI', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GTI&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GTI icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GTI 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2645</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('GA', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GA&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GA icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GA 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2148</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('HB', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=HB&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-HBE icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">HB 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1589</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('MW', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=MW&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-MW icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">大满贯 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('RT', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=RT&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-RT icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">RT 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">1228</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('ISB', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=ISB&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-ISB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">ISB 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">3685</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('GG', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GG&gamename=MyGameLobby')"   @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">GG 电子</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2140</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('WG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=WG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-WG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> WG 彩票</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('SC', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SC','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SC icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> SC 彩票</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('EG', $_api_list))

                                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=EG','_blamk')" @endif data-game="">
                                                        <div class="gameicon">
                                                            <i class="icon-games icon-games-CG icon-zoom80"></i>
                                                        </div>
                                                        <div class="gametitle"> EG 彩票</div>
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
													</div>
														 @endif
														  @if(in_array('BGC', $_api_list))

                                                    <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BGC','_blamk')" @endif data-game="">
                                                        <div class="gameicon">
                                                            <i class="icon-games icon-games-BG icon-zoom80"></i>
                                                        </div>
                                                        <div class="gametitle"> BG 彩票</div>
                                                        <i class="gamestar star-5"></i>
                                                        <div class="gameonline"><span class="cred">31212</span>人在玩</div>
													</div>
														 @endif
														 
                                                      @if(in_array('IG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-IG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> IG 彩票</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('IG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IG&gamename=imlotto10059','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-IG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> IG 六合彩</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
       
                                                      @if(in_array('VR', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=VR','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-VR icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> VR 彩票</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('GBC', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GBC','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> GB 彩票</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('SWC', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SWC','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SWC icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 双赢 彩票</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  
                                                      @if(in_array('BBIN', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=Ltlottery','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> BB 彩票</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                              

                                                      @if(in_array('GJ', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GJ','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GJ icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 皇冠 体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('UG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=UG&gamename=SP3','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-UG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> UG 体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('BBIN', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=ball','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> BB 体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('IBC', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IBC','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SPTT icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 沙巴 体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('AG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=AG&gamename=TASSPTA','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-AG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> AG 体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('NEWBB', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=NEWBB','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-BBIN icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> NEWBB 体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('SS', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SS','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 三昇体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('GB', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GB','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> GB体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">62212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  
                                                      @if(in_array('ESB', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=ESB','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-ESB icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> ESB 电竞</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   
                                                      @if(in_array('HC', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=HC','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-HC icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 皇朝 电竞</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('AVIA', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=AVIA','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-AVIA icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 泛亚 电竞</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('IM', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IM','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-IM icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> IM 体育</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('KG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=KG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-KG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> KG 电竟</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">23212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('TH', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=TH','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-TH icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 天豪 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('DSQP', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=DSQP','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-DSQP icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> DS 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('WGQP', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=WGQP','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-WG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> WG 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('KY', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=KY','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-KY icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 开元 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('LEG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=LEG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-LEG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 乐游 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  
                                                      @if(in_array('761', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=761','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-AP icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 761 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('NEWVG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=NEWVG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-NEWVG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> VG 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                       @if(in_array('SW', $_api_list))
                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SW&gamename=MyGameLobby')"  @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-SW icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 双赢棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">2058</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('JS', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=JS','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-JS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 金龙 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('IMQP', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IMQP','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-IMQP icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> IM 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  
													  @if(in_array('AS', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=AS','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-AS icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 天发 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  @if(in_array('HG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=HG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-HG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">幸运 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('YG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=YG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-YG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">王者 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													   @if(in_array('HG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=HG','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-HG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle">幸运 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
													  
                                                      @if(in_array('GG', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GG&gamename=MyGameLobby','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-GG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> GG 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                     
													  @if(in_array('NW', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=NW','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-NW icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> 新世界 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                                      @if(in_array('FGS', $_api_list))

                                                          <div class="gameitem" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=TH','_blamk')" @endif data-game="">
                                                              <div class="gameicon">
                                                                  <i class="icon-games icon-games-FG icon-zoom80"></i>
                                                              </div>
                                                              <div class="gametitle"> FG 棋牌</div>
                                                              <i class="gamestar star-5"></i>
                                                              <div class="gameonline"><span class="cred">31212</span>人在玩</div>
                                                          </div>
                                                      @endif
                                </div>
                            </div>
                                    <div class="swiper-slide">
                                        <div class="gamelist gamelist-h">

                                            
                                                @if(in_array('GNS', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GNS icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">GNS电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GNS&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('PP', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GPE icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">PP电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PP&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												@if(in_array('MW', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-MW icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">大满贯电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=MW&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('VT', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-VT icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">VT电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=VT&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												@if(in_array('KA', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-KA icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">KA电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=KA&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												
												 @if(in_array('SG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-SGE icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">SG电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SG&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('BS', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-BS icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">BS电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BS&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('CQ9', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GB icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">CQ9电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=CQ9&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                               
                                                @if(in_array('JDB', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">JDB电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=JDB&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												@if(in_array('PTS', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-PTS icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">天风电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PTS&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">PT电子最新产品</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('FG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">FG电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=FG&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                               
                                                @if(in_array('BOG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-BNG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">BNG电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BOG&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('MG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-MGE icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">MG电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=MG&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('PT', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-AMB icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">PT电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PT&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">AG电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=AG&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('GPI', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GPIicon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">GPI电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GPI&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('BBIN', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">BB电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=BBIN&gamename=game','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('QT', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-QT icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">QT电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=QT&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('DT', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-DT icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">DT电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=DT&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('PG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-PSE icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">PG电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=PG&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('GTI', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GTI icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">GTI电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GTI&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('GA', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GA icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">GA电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GA&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('HB', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-HB icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">HB电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=HB&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('RT', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-RT icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">RT电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=RT&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												 @if(in_array('SA', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-SA icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">SA电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=SA&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('ISB', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-ISB icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">ISB电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=ISB&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('GG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">GG电子</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-5"></i>
                                                                        <div class="gameonline"><span class="cred">9412</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">


                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=GG&gamename=MyGameLobby','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">全球经典电子游戏</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gamelist gamelist-h">

													  @if(in_array('AG', $_api_list))
                                                  <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">AG视讯</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">36713</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                           
                                                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=ag&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">G44E推荐</div>
                                                            </div>
                                                        </div>
                                                    </div>
													@endif
          @if(in_array('BBIN', $_api_list))
              <div class="gameitem">
                  <div class="gametop">
                      <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                      <div class="gametxtbox">
                          <div class="gametxtbox-info">
                              <div class="gametitle">BBIN视讯</div>
                              <div class="gameinfo">
                                  <i class="gamestar star-4"></i>
                                  <div class="gameonline"><span class="cred">18690</span>人在玩</div>
                              </div>
                              <div class="gamebtns">
                                  <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=live&devices=1','_blank')"@endif>进入</a>
                              </div>
                          </div>
                          <div class="gametxtbox-activity">集团推荐</div>
                      </div>
                  </div>
              </div>
          @endif
          @if(in_array('BG', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-BG icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">BG视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">16689</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                            
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BG&gamename=2&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
      @if(in_array('SUNBET', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-SUNBET icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">申博视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">16856</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SUNBET&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif

	  
	   @if(in_array('XHG', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-XHG icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">新皇冠视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">8065</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=XHG&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
	   @if(in_array('DS', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-DS icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">DS视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">6086</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=DS&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
      @if(in_array('AB', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-ALLBET icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">欧博视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">16845</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=AB&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
      @if(in_array('SA', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-SA icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">SA视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">16845</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                             
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SA&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
      @if(in_array('GD', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-GD icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">GD视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">16585</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=GD&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
      @if(in_array('OG', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-OG icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">OG视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">25066</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                             
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=OG&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
	   @if(in_array('MX', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-MX icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">MX视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">23520</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                             
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=MX&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
	   @if(in_array('VG', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-VG icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">VG视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">5892</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                             
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=VG&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
	   @if(in_array('WM', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-WM icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">WM视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">3685</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=WM&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
	   @if(in_array('N2', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-N2 icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">N2视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">4896</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=N2&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
	   @if(in_array('IGZR', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-IGZR icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">IG视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">6895</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                             
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=IGZR&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
      @if(in_array('DG', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-DG icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">DG视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">9857</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              <a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=DG&devices=1" target="_blank">试玩</a>
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=DG&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
     
      @if(in_array('GPI', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-GPI icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">GPI视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">7865</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=GPI&devices=1" target="_blank">试玩</a>--}}
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=GPI&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
      @if(in_array('EBET', $_api_list))
          <div class="gameitem">
              <div class="gametop">
                  <div class="gameicon"><i class="icon-games icon-games-EBET icon-zoom80"></i></div>
                  <div class="gametxtbox">
                      <div class="gametxtbox-info">
                          <div class="gametitle">EBET视讯</div>
                          <div class="gameinfo">
                              <i class="gamestar star-4"></i>
                              <div class="gameonline"><span class="cred">7865</span>人在玩</div>
                          </div>
                          <div class="gamebtns">
                              {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                              <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=EBET&devices=1','_blank')"@endif>进入</a>
                          </div>
                      </div>
                      <div class="gametxtbox-activity">集团推荐</div>
                  </div>
              </div>
          </div>
      @endif
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gamelist gamelist-h">
    @if(in_array('WG', $_api_list))
        <div class="gameitem">
            <div class="gametop">
                <div class="gameicon"><i class="icon-games icon-games-WG icon-zoom80"></i></div>
                <div class="gametxtbox">
                    <div class="gametxtbox-info">
                        <div class="gametitle">WG彩票</div>
                        <div class="gameinfo">
                            <i class="gamestar star-4"></i>
                            <div class="gameonline"><span class="cred">7153</span>人在玩</div>
                        </div>
                        <div class="gamebtns">
                            {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=WG&devices=1','_blank')"@endif>进入</a>
                        </div>
                    </div>
                    <div class="gametxtbox-activity">集团推荐</div>
                </div>
            </div>
        </div>
    @endif
        @if(in_array('SC', $_api_list))
            <div class="gameitem">
                <div class="gametop">
                    <div class="gameicon"><i class="icon-games icon-games-SC icon-zoom80"></i></div>
                    <div class="gametxtbox">
                        <div class="gametxtbox-info">
                            <div class="gametitle">世彩彩票</div>
                            <div class="gameinfo">
                                <i class="gamestar star-4"></i>
                                <div class="gameonline"><span class="cred">3698</span>人在玩</div>
                            </div>
                            <div class="gamebtns">
                                {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SC&devices=1','_blank')"@endif>进入</a>
                            </div>
                        </div>
                        <div class="gametxtbox-activity">集团推荐</div>
                    </div>
                </div>
            </div>
        @endif
		  @if(in_array('GBC', $_api_list))
            <div class="gameitem">
                <div class="gametop">
                    <div class="gameicon"><i class="icon-games icon-games-GB icon-zoom80"></i></div>
                    <div class="gametxtbox">
                        <div class="gametxtbox-info">
                            <div class="gametitle">GB彩票</div>
                            <div class="gameinfo">
                                <i class="gamestar star-4"></i>
                                <div class="gameonline"><span class="cred">8698</span>人在玩</div>
                            </div>
                            <div class="gamebtns">
                                {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=GBC&devices=1','_blank')"@endif>进入</a>
                            </div>
                        </div>
                        <div class="gametxtbox-activity">集团推荐</div>
                    </div>
                </div>
            </div>
        @endif
		 @if(in_array('SWC', $_api_list))
            <div class="gameitem">
                <div class="gametop">
                    <div class="gameicon"><i class="icon-games icon-games-SWC icon-zoom80"></i></div>
                    <div class="gametxtbox">
                        <div class="gametxtbox-info">
                            <div class="gametitle">双赢彩票</div>
                            <div class="gameinfo">
                                <i class="gamestar star-4"></i>
                                <div class="gameonline"><span class="cred">8698</span>人在玩</div>
                            </div>
                            <div class="gamebtns">
                                {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SWC&devices=1','_blank')"@endif>进入</a>
                            </div>
                        </div>
                        <div class="gametxtbox-activity">集团推荐</div>
                    </div>
                </div>
            </div>
        @endif
		
		@if(in_array('BGC', $_api_list))
            <div class="gameitem">
                <div class="gametop">
                    <div class="gameicon"><i class="icon-games icon-games-BG icon-zoom80"></i></div>
                    <div class="gametxtbox">
                        <div class="gametxtbox-info">
                            <div class="gametitle">BG彩票</div>
                            <div class="gameinfo">
                                <i class="gamestar star-4"></i>
                                <div class="gameonline"><span class="cred">5898</span>人在玩</div>
                            </div>
                            <div class="gamebtns">
                                {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BGC&devices=1','_blank')"@endif>进入</a>
                            </div>
                        </div>
                        <div class="gametxtbox-activity">集团推荐</div>
                    </div>
                </div>
            </div>
        @endif
        @if(in_array('EG', $_api_list))
            <div class="gameitem">
                <div class="gametop">
                    <div class="gameicon"><i class="icon-games icon-games-EG icon-zoom80"></i></div>
                    <div class="gametxtbox">
                        <div class="gametxtbox-info">
                            <div class="gametitle">EG彩票</div>
                            <div class="gameinfo">
                                <i class="gamestar star-4"></i>
                                <div class="gameonline"><span class="cred">5986</span>人在玩</div>
                            </div>
                            <div class="gamebtns">
                                {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=EG&devices=1','_blank')"@endif>进入</a>
                            </div>
                        </div>
                        <div class="gametxtbox-activity">集团推荐</div>
                    </div>
                </div>
            </div>
        @endif
            @if(in_array('IG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">IG彩票</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">15864</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=IG&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">集团推荐</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('IG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">IG六合彩</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">3652</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IG&gamename=imlotto10059','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">集团推荐</div>
                        </div>
                    </div>
                </div>
            @endif
           @if(in_array('IG2', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">IG彩票</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">15864</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=IG2&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">集团推荐</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('IG2', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-IG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">IG六合彩</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">3652</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?devices=1&plat_type=IG2&gamename=imlotto10059','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">集团推荐</div>
                        </div>
                    </div>
                </div>
            @endif
          
            @if(in_array('VR', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-VR icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">VR彩票</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">15784</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=VR&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">集团推荐</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('BBIN', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">BBIN彩票</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">4586</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=Ltlottery&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">集团推荐</div>
                        </div>
                    </div>
                </div>
            @endif
          

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gamelist gamelist-h">

                                            @if(in_array('AG', $_api_list))
                                                <div class="gameitem">
                                                    <div class="gametop">
                                                        <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                                                        <div class="gametxtbox">
                                                            <div class="gametxtbox-info">
                                                                <div class="gametitle">AG捕鱼王</div>
                                                                <div class="gameinfo">
                                                                    <i class="gamestar star-4"></i>
                                                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                                                </div>
                                                                <div class="gamebtns">
                                                                   {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=6&devices=1','_blank')"@endif>进入</a>
                                                                </div>
                                                            </div>
                                                            <div class="gametxtbox-activity">AG捕鱼王</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                    @if(in_array('BBIN', $_api_list))
                        <div class="gameitem">
                            <div class="gametop">
                                <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                                <div class="gametxtbox">
                                    <div class="gametxtbox-info">
                                        <div class="gametitle">BB捕鱼达人</div>
                                        <div class="gameinfo">
                                            <i class="gamestar star-4"></i>
                                            <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                        </div>
                                        <div class="gamebtns">
                                            {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=BBIN&gamename=30599&devices=1" target="_blank">试玩</a>--}}
                                            <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=30599&devices=1','_blank')"@endif>进入</a>
                                        </div>
                                    </div>
                                    <div class="gametxtbox-activity">BB捕鱼达人</div>
                                </div>
                            </div>
                        </div>
                    @endif
                @if(in_array('BBIN', $_api_list))
                    <div class="gameitem">
                        <div class="gametop">
                            <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                            <div class="gametxtbox">
                                <div class="gametxtbox-info">
                                    <div class="gametitle">BB捕鱼大师</div>
                                    <div class="gameinfo">
                                        <i class="gamestar star-4"></i>
                                        <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                    </div>
                                    <div class="gamebtns">
                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                        <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=38001&devices=1','_blank')"@endif>进入</a>
                                    </div>
                                </div>
                                <div class="gametxtbox-activity">BB捕鱼大师</div>
                            </div>
                        </div>
                    </div>
                @endif
           @if(in_array('FG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">FG欢乐捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                  
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_hl&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">FG欢乐捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
			
            @if(in_array('FG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">FG美人捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_mm&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">FG美人捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('FG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">FG捕鱼嘉年华</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                   
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_3D&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">FG捕鱼嘉年华</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('FG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">FG天天捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                   
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_tt&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">FG天天捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('FG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">FG捕鸟达人</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_bn&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">FG捕鸟达人</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('FG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-FG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">FG雷霆战警</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                   
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=FG&gamename=fish_zj&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">FG雷霆战警</div>
                        </div>
                    </div>
                </div>
            @endif
           
        
            @if(in_array('SA', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-SA icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">SA鱼乐无穷</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                     {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SA&gamename=FishermenGold&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">SA鱼乐无穷</div>
                        </div>
                    </div>
                </div>
            @endif
			@if(in_array('BG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-BG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">BG捕鱼大师</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                     {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BG&gamename=1&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">BG捕鱼大师</div>
                        </div>
                    </div>
                </div>
            @endif
			@if(in_array('PG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-PG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">PG鱼王争霸</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                     {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=4001&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">PG鱼王争霸</div>
                        </div>
                    </div>
                </div>
            @endif
			@if(in_array('PG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-PG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">PG全民捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                     {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=PG&gamename=4004&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">PG全民捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('JDB', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">JDB财神捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">JDB财神捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
            
            @if(in_array('JDB', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">JDB龙王捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">JDB龙王捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('JDB', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">JDB龙王捕鱼2</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">JDB龙王捕鱼2</div>
                        </div>
                    </div>
                </div>
            @endif
			 @if(in_array('MW', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-MW icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">MW千炮捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                   
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=MW&gamename=1051&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">MW千炮捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
			 @if(in_array('DSQP', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-DSQP icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">DS海霸王</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=DSQP&gamename=1001&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">DS海霸王</div>
                        </div>
                    </div>
                </div>
            @endif
			  @if(in_array('DSQP', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-DSQP icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">DS吃我一炮</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=DSQP&gamename=1002&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">DS吃我一炮</div>
                        </div>
                    </div>
                </div>
            @endif
			 
			 @if(in_array('JDB', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-JDB icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">JDB龙王捕鱼2</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=JDB&gamename=7003&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">JDB龙王捕鱼2</div>
                        </div>
                    </div>
                </div>
            @endif
			 @if(in_array('PTS', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-PTS icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">捕鱼多福</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fufish_intw&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">捕鱼多福</div>
                        </div>
                    </div>
                </div>
            @endif
			 @if(in_array('PTS', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-PTS icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">捕鱼多福奖池</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fufish-jp&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">捕鱼多福奖池</div>
                        </div>
                    </div>
                </div>
            @endif
			
			@if(in_array('PTS', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-PTS icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">福气水果</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fuqsg&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">福气水果</div>
                        </div>
                    </div>
                </div>
            @endif
			@if(in_array('PTS', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-PTS icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">福气水果奖池</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=PTS&gamename=sw_fqsg_jp&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">福气水果奖池</div>
                        </div>
                    </div>
                </div>
            @endif
			
			 @if(in_array('MT', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-MT icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">MT李逵捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=MT&gamename=IMBG40025&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40025&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">MT李逵捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('MT', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-MT icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">MT金蟾捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=MT&gamename=IMBG40024&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=IMBG40024&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">MT金蟾捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif
			<!-- @if(in_array('GG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-GG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">GG捕鱼2</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    <a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=GG&game_type=6&devices=1" target="_blank">试玩</a>
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=GG&game_type=6&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">GG捕鱼2</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('MW', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-MW icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">MW千炮捕鱼</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">66823</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=MW&game_type=6&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=MW&game_type=6&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">MW千炮捕鱼</div>
                        </div>
                    </div>
                </div>
            @endif-->
			
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gamelist gamelist-h">

                                            @if(in_array('761', $_api_list))
                                                <div class="gameitem">
                                                    <div class="gametop">
                                                        <div class="gameicon"><i class="icon-games icon-games-AP icon-zoom80"></i></div>
                                                        <div class="gametxtbox">
                                                            <div class="gametxtbox-info">
                                                                <div class="gametitle">761棋牌</div>
                                                                <div class="gameinfo">
                                                                    <i class="gamestar star-4"></i>
                                                                    <div class="gameonline"><span class="cred">4251</span>人在玩</div>
                                                                </div>
                                                                <div class="gamebtns">
                                                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                     <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=761&devices=1','_blank')"@endif>进入</a>
                                                                </div>
                                                            </div>
                                                            <div class="gametxtbox-activity">761棋牌</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
											@if(in_array('DSQP', $_api_list))
                                                <div class="gameitem">
                                                    <div class="gametop">
                                                        <div class="gameicon"><i class="icon-games icon-games-DSQP icon-zoom80"></i></div>
                                                        <div class="gametxtbox">
                                                            <div class="gametxtbox-info">
                                                                <div class="gametitle">DS棋牌</div>
                                                                <div class="gameinfo">
                                                                    <i class="gamestar star-4"></i>
                                                                    <div class="gameonline"><span class="cred">4251</span>人在玩</div>
                                                                </div>
                                                                <div class="gamebtns">
                                                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                     <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=DSQP&devices=1','_blank')"@endif>进入</a>
                                                                </div>
                                                            </div>
                                                            <div class="gametxtbox-activity">DS棋牌</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
											
											 @if(in_array('TH', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-TH icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">天豪棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">6875</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=TH&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">天豪棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												@if(in_array('KY', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-KY icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">开元棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">9865</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=KY&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">开元棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                               @if(in_array('WGQP', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-WG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">WG棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">19865</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=WGQP&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">WG棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                               
                                                @if(in_array('NEWVG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-NEWVG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">VG棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">7542</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=NEWVG&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">VG棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('SW', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-SW icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">双赢棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">3542</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SW&gamename=MyGameLobby&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">双赢棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if(in_array('JS', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-JS icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">金龙棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">2598</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=JS&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">金龙棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												@if(in_array('YG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-YG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">王者棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">6898</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=YG&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">王者棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												@if(in_array('GG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-GG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">GG棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">2598</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=GG&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">GG棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												
												 @if(in_array('LEG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-LEG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">乐游棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">2598</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=LEG&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">乐游棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												 @if(in_array('IMQP', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-JS icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">IM棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">2598</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=IMQP&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">IM棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												
												@if(in_array('AS', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-AS icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">天发棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">2598</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=AS&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=AS&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">天发棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												@if(in_array('HG', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-HG icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">欢乐棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">2598</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=HG&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=HG&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">欢乐棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												
												 @if(in_array('NW', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-NW icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">新世界棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">6875</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=NW&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">新世界棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
												
                                                @if(in_array('MT', $_api_list))
                                                    <div class="gameitem">
                                                        <div class="gametop">
                                                            <div class="gameicon"><i class="icon-games icon-games-MT icon-zoom80"></i></div>
                                                            <div class="gametxtbox">
                                                                <div class="gametxtbox-info">
                                                                    <div class="gametitle">美天棋牌</div>
                                                                    <div class="gameinfo">
                                                                        <i class="gamestar star-4"></i>
                                                                        <div class="gameonline"><span class="cred">2458</span>人在玩</div>
                                                                    </div>
                                                                    <div class="gamebtns">
                                                                        {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                                                         <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=MT&gamename=MyGameLobby&devices=1','_blank')"@endif>进入</a>
                                                                    </div>
                                                                </div>
                                                                <div class="gametxtbox-activity">美天棋牌</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="gamelist gamelist-h">
        @if(in_array('GJ', $_api_list))
            <div class="gameitem">
                <div class="gametop">
                    <div class="gameicon"><i class="icon-games icon-games-GJ icon-zoom80"></i></div>
                    <div class="gametxtbox">
                        <div class="gametxtbox-info">
                            <div class="gametitle">皇冠体育</div>
                            <div class="gameinfo">
                                <i class="gamestar star-4"></i>
                                <div class="gameonline"><span class="cred">2547</span>人在玩</div>
                            </div>
                            <div class="gamebtns">
                                {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=GJ&devices=1','_blank')"@endif>进入</a>
                            </div>
                        </div>
                        <div class="gametxtbox-activity">皇冠体育</div>
                    </div>
                </div>
            </div>
        @endif
            @if(in_array('UG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-UG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">UG体育</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=UG&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">UG体育</div>
                        </div>
                    </div>
                </div>
            @endif	
      @if(in_array('SS', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-SS icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">三升体育</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=SS&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">三升体育</div>
                        </div>
                    </div>
                </div>
            @endif				
            @if(in_array('BBIN', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-BBIN icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">BBIN体育</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">5635</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=BBIN&gamename=ball&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">BBIN体育</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('IBC', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-IBC icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">沙巴体育</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">15867</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=IBC&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">沙巴体育</div>
                        </div>
                    </div>
                </div>
            @endif
			 @if(in_array('GB', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-GB icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">GB体育</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">15867</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=GB&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">GB体育</div>
                        </div>
                    </div>
                </div>
            @endif
			
            @if(in_array('AG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-AG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">AG体育</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">8675</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=AG&gamename=TASSPTA&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">AG体育</div>
                    </div>
                </div>
        </div>
@endif
            @if(in_array('IM', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-IM icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">IM体育</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">4856</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=IM&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">IM体育</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('ESB', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-ESB icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">ESB电竞</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">2587</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=ESB&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">ESB电竞</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('HC', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-HC icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">皇朝电竞</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">2456</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=HC&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">皇朝电竞</div>
                        </div>
                    </div>
                </div>
            @endif
            @if(in_array('AVIA', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-AVIA icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">泛亚电竞</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=AVIA&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">泛亚电竞</div>
                        </div>
                    </div>
                </div>
            @endif
			 @if(in_array('KG', $_api_list))
                <div class="gameitem">
                    <div class="gametop">
                        <div class="gameicon"><i class="icon-games icon-games-KG icon-zoom80"></i></div>
                        <div class="gametxtbox">
                            <div class="gametxtbox-info">
                                <div class="gametitle">KG电竞</div>
                                <div class="gameinfo">
                                    <i class="gamestar star-4"></i>
                                    <div class="gameonline"><span class="cred">1258</span>人在玩</div>
                                </div>
                                <div class="gamebtns">
                                    {{--<a class="gamebtn-try" href="{{route('wg.demo_login')}}?plat_type=EBET&devices=1" target="_blank">试玩</a>--}}
                                    <a class="gamebtn-go" href="javascript:void('')" @if (Auth::guard('member')->guest()) onclick="javascript: alerthd();" @else onclick="window.open('{{ route('wg.playGame') }}?plat_type=KGKG&devices=1','_blank')"@endif>进入</a>
                                </div>
                            </div>
                            <div class="gametxtbox-activity">KG电竞</div>
                        </div>
                    </div>
                </div>
            @endif
			
      
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
                <div class="AppFooter is-fixed">
                  @if (Auth::guard('member')->guest())
					<a class="nav-item" href="{{route('wap.activity_list')}}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-liwu"></use>
                        </svg>
                        <span>优惠活动</span>
                    </a>
                    <a class="nav-item" href="{{ route('wap.register') }}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zhuce"></use>
                        </svg>
                        <span>立即注册</span>
                    </a>
                    <a class="nav-item" href="{{ route('wap.login') }}" id="memberstatus">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-denglu"></use>
                        </svg>
                        <span>立即登录</span>
                    </a>
                    <a class="nav-item" href="{{ $_system_config->service_link }}" target="_blank">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zaixiankefu"></use>
                        </svg>
                        <span>在线客服</span>
                    </a>
					@else
					<a class="nav-item" href="{{ route('wap.recharge') }}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-qian"></use>
                        </svg>
                        <span style="color:#e2ff00;"><b>快速充值</b></span>
                    </a>
                    <a class="nav-item" href="{{ route('wap.drawing') }}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-tixian1"></use>
                        </svg>
                        <span>线上取款</span>
                    </a>
                    {{--<a class="nav-item" href="{{ route('wap.transfer') }}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-huhuan"></use>
                        </svg>
                        <span>额度转换</span>
                    </a>--}}
                    <a class="nav-item " href="{{ route('wap.userinfo') }}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-yonghuguanlixiugaibeizhu"></use>
                        </svg>
                        <span>会员中心</span>
                    </a>
					 <a class="nav-item " href="{{ route('wap.activity_list') }}">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-yonghuguanlixiugaibeizhu"></use>
                        </svg>
                        <span>优惠活动</span>
                    </a>

                    <a class="nav-item" href="{{ $_system_config->service_link }}" target="_blank">
                        <svg class="icon" aria-hidden="true">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zaixiankefu"></use>
                        </svg>
                        <span>在线客服</span>
                    </a>

					@endif

                </div>
        </footer>
    </div>
@if (Auth::guard('member')->guest())@else
<div class="AppSidebar" style="right: -240px;">
            <div class="AppSidebar-top">
                <div class="usericon">

                    <img src="https://gpimage.dns88888.com/cl/tpl/newwap/common/images/t2.png">
                </div>
                <div class="userinfo">
                    <div class="username">
                        <span class="name">{{ $_member->name }}</span>
                        <span class="close-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-guanbi"></use>
                            </svg>
                        </span>
                    </div>
                    <div class="money">
                        <span class="balance">余额：{{ $_member->all_money }}</span>
                        <span class="refresh-icon" onclick="javascript: RefreshBalance();">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-shuaxin"></use>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="AppSidebar-quickbtn">
                <a class="AppHeader-green" href="{{ route('wap.recharge') }}">充值</a>
                <a class="AppHeader-yellow" href="{{ route('wap.bind_bank') }}">取款</a>
			    <a class="AppHeader-white" href="{{ route('wap.transfer') }}">额度转换</a> 
            </div>
            <div class="AppSidebar-userlink">








			    <a href="">APP下载</a>

				<a href="{{ route('wap.recharge_record') }}">充值记录</a>
				<a href="{{ route('wap.drawing_record') }}">提款记录</a>
				<a href="{{ route('wap.reset_password') }}">修改密码</a>
				<a href="{{ $_system_config->service_link }}">在线客服</a>
				<a href="{{ route('wap.agent') }}">代理中心</a>
				<a href="{{ route('wap.index') }}">返回首页</a>
				<a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">安全退出</a>
				<form id="logout-form" action="{{ route('wap.logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>

            </div>
            {{--<div class="AppSidebar-nav">
                <div class="navgroup">
                    <a href="mqqwpa://im/chat?chat_type=wpa&amp;uin=123456&amp;version=1&amp;src_type=web&amp;web_src=baidu.com" target="_blank">
                        <span class="icons qqservice-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-web-icon-"></use>
                            </svg>
                        </span>
                        <span class="txt">客服QQ;{{ $_system_config->qq }}</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
                    </a>
                    <a href="{{ $_system_config->service_link }}" target="_blank">
                        <span class="icons service-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-zaixiankefu"></use>
                            </svg>
                        </span>
                        <span class="txt">在线客服</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
                    </a>
                </div>
              <div class="navgroup">
                    <a href="#" target="_blank">
                        <span class="icons linetest-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-xianlujiance"></use>
                            </svg>
                        </span>--
                        <span class="txt">线路检测</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>

					 </div>
                    <a href="https://fir.im/9wn4" target="_blank">
                        <span class="icons appdownload-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-shouji"></use>
                            </svg>
                        </span>
                        <span class="txt">app下载</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
                    </a>
			</div>--}}



              <div class="navgroup">
                    <a href="{{ route('wap.logout') }}">
                        <span class="icons loginout-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-tuichu"></use>
                            </svg>
                        </span>
                        <span class="txt">退出登录</span>
                        <span class="go-icon">
                            <svg class="icon" aria-hidden="true">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-arrow-right-copy-copy-copy"></use>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
@endif
    <script src="{{ asset('/wap/theme2/js/swiper.min.js') }}"></script>
    <script src="{{ asset('/wap/theme2/js/common.js') }}"></script>
        <script>
           /* $(document).dialog({
                type: 'image',
                closeBtnShow: true,
                titleShow: true,
                content: '<img src="Public/Home/picture/phone5402323236305518242.jpg" width="100%" height="380"/>',
            }); */
        </script>
    <script type="text/javascript">

        $(function () {
            $('.gametab .swiper-slide:first-child').click();
                        var content_height = $(".gamelist").eq(0).height();
                        var slide_height = $("#gameslist>.swiper-slide").eq(0).height(content_height);
            $("#gameslist>.swiper-wrapper").css("height", content_height);
            $("#gameslist>.swiper-container").css("height", content_height)

        })

                function ReSetBalance(str) {
                    if (str != -2) {
                $(".balance").html("余额：" + str.toFixed(2));
                    } else {
                $(".balance").html("刷新失败");
                    }
                }


                function alertSet(obj, t, type) {
                    var tt = t,
                        n = $("#" + obj);
                    var circletime = setInterval(function () {
                        if (0 == t) {
                            //判断是否继续长龙，不是就remove掉此
                            clearTimeout(circletime);
                            if (type == "真人") {
                                n.parent().parent().append('<span class="status">开牌中</span>');
                                setTimeout(function () {
                                    // n.parent().parent().children(":last-child").remove();
                                    // n.parent().parent().append('<span class="status xian">闲</span>');
                                    // setTimeout(function(){
                                    n.parent().parent().parent().remove();
                                    // },3000);
                                }, 3000);
                            } else if (type == "彩票") {
                                n.parent().parent().append('<span class="status">开奖中</span>');
                                setTimeout(function () {
                                    n.parent().parent().parent().remove();
                                }, 3000);
                            } else if (type == "电子") {
                                n.parent().parent().append('<span class="status">已结束</span>');
                                setTimeout(function () {
                                    n.parent().parent().parent().remove();
                                }, 3000);
                            }
                        } else {
                            t -= 1;
                            var e = Math.round(t / tt * 200);
                            n.css("strokeDashoffset", e - 200);
                        }
                    }, 1000);
                }

                var datas = [
            { id: "1", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "长庄", goodroadstyle: "cz", tablenum: "DG01", roundnum: "B030951" }] },
            { id: "2", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "大路单挑", goodroadstyle: "dldt", tablenum: "DG05", roundnum: "B030964" }] },
            { id: "3", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "一庄两闲", goodroadstyle: "yzlx", tablenum: "DG04", roundnum: "B030961" }] },
            { id: "4", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "一闲两庄", goodroadstyle: "yxlz", tablenum: "DG03", roundnum: "B030959" }] },
            { id: "5", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: "大路双挑", goodroadstyle: "dlst", tablenum: "DG02", roundnum: "B030957" }] }
        ]
        //setInterval(function () {//里面轮询提示
        //    var items = datas;
        //    var item = items[Math.floor(Math.random() * items.length)];
        //    createHtml(item);
        //}, 3000);

        function createHtml(data) {
            var gettype = $(".poppage-menu .swiper-slide.active").data("type");
            var timestamp = new Date().getTime();
            if (data.gametype == "真人") {
                var zrhtml = '';
                if (gettype == data.gametype || gettype == "推荐") {
                    zrhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '">';
                } else {
                    zrhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '" style="display:none;">';
                }
                zrhtml += '<div class="popitem-logo">';
                zrhtml += '<i class="hlicon icon-games icon-games-' + data.gameiconname + '"></i>';
                zrhtml += '<svg class="icon-circle" width="64" height="64">';
                zrhtml += '<circle cx="32" cy="32" r="29" fill="#FFF" stroke="#fb5050" stroke-width="3"></circle>';
                zrhtml += '<circle id="zr' + timestamp + '" class="icon-sec-circle" cx="32" cy="32" r="29" fill="transparent" stroke="#fedcdc" stroke-width="4" transform="rotate(-90 32 32)"></circle>';
                zrhtml += '</svg>';
                zrhtml += '</div>';
                zrhtml += '<div class="popitem-hl">';
                zrhtml += '<span class="hlname">' + data.detail[0].goodroad + '</span>';
                zrhtml += '<div class="hlimgbox">';
                zrhtml += '<span class="hlimg ' + data.detail[0].goodroadstyle + '"></span>';
                zrhtml += '</div>';
                zrhtml += '</div>';
                zrhtml += '<div class="popitem-gameinfo">';
                zrhtml += '<span class="tablenum">桌号：' + data.detail[0].tablenum + '</span>';
                zrhtml += '<span class="roundnum">局号：' + data.detail[0].roundnum + '</span>';
                zrhtml += '</div>';
                zrhtml += '<div class="popitem-btnbox">';
                zrhtml += '<a class="trybtn" onclick="trygame(\'' + data.gameplat + '\')">试玩</a>';
                zrhtml += '<a class="enterbtn" onclick="javascript:window.open(\'GotoGame?GameType=' + data.gameplat + '&uid=&gameid=' + data.detail[0].gameid + "_" + data.detail[0].tableid + '#\');">进入</a>';
                zrhtml += '</div>';
                zrhtml += '</div>';

                $(".poppage-list").prepend(zrhtml);
                alertSet("zr" + timestamp, data.timeleft, "真人");
            } else if (data.gametype == "彩票") {
                var cphtml = '';
                if (gettype == data.gametype || gettype == "推荐") {
                    cphtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '">';
                } else {
                    cphtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '" style="display:none;">';
                }
                cphtml += '<div class="popitem-logo">';
                cphtml += '<i class="hlicon icon-games icon-games-' + data.gameiconname + '"></i>';
                cphtml += '<svg class="icon-circle" width="64" height="64">';
                cphtml += '<circle cx="32" cy="32" r="29" fill="#FFF" stroke="#fb5050" stroke-width="3"></circle>';
                cphtml += '<circle id="cp' + timestamp + '" class="icon-sec-circle" cx="32" cy="32" r="29" fill="transparent" stroke="#fedcdc" stroke-width="4" transform="rotate(-90 32 32)"></circle>';
                cphtml += '</svg>';
                cphtml += '</div>';
                cphtml += '<div class="popitem-hl">';
                cphtml += '<span class="hlname">' + data.gamename + '</span>';
                cphtml += '<div class="hlimgbox">';
                cphtml += '<span class="hltxt">' + data.detail[0].playmethod + '</span>';
                cphtml += '</div>';
                cphtml += '</div>';
                cphtml += '<div class="popitem-gameinfo">';
                cphtml += '<span class="roundnum">第' + data.detail[0].period + '期</span>';
                cphtml += '<span class="roundnum importblue">连' + data.detail[0].batter + '期</span>';
                cphtml += '</div>';
                cphtml += '<div class="popitem-btnbox">';
                cphtml += '<a class="trybtn" onclick="trygame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">试玩</a>';
                cphtml += '<a class="enterbtn" onclick="gotogame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">进入</a>';
                cphtml += '</div>';
                cphtml += '</div>';

                $(".poppage-list").prepend(cphtml);
                alertSet("cp" + timestamp, data.timeleft, "彩票");
            } else if (data.gametype == "电子") {
                var dzhtml = '';
                if (gettype == data.gametype || gettype == "推荐") {
                    dzhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '">';
                } else {
                    dzhtml += '<div class="poppage-item" data-type="' + data.gametype + '" data-game="' + data.gamename + '" style="display:none;">';
                }
                dzhtml += '<div class="popitem-logo">';
                dzhtml += '<i class="hlicon icon-games icon-games-' + data.gameiconname + '"></i>';
                dzhtml += '<svg class="icon-circle" width="64" height="64">';
                dzhtml += '<circle cx="32" cy="32" r="29" fill="#FFF" stroke="#fb5050" stroke-width="3"></circle>';
                dzhtml += '<circle id="dz' + timestamp + '" class="icon-sec-circle" cx="32" cy="32" r="29" fill="transparent" stroke="#fedcdc" stroke-width="4" transform="rotate(-90 32 32)"></circle>';
                dzhtml += '</svg>';
                dzhtml += '</div>';
                dzhtml += '<div class="popitem-hl">';
                dzhtml += '<span class="hlname">' + data.gamename + '电子</span>';
                dzhtml += '<div class="hlimgbox">';
                dzhtml += '<span class="hltxt">' + data.detail[0].name + '</span>';
                dzhtml += '</div>';
                dzhtml += '</div>';
                dzhtml += '<div class="popitem-gameinfo">';
                dzhtml += '<span class="roundnum"><font style="color:red">' + data.detail[0].gameact + '</font></span>';
                dzhtml += '</div>';
                dzhtml += '<div class="popitem-btnbox">';
                dzhtml += '<a class="trybtn" onclick="trygame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">试玩</a>';
                dzhtml += '<a class="enterbtn" onclick="gotogame(\'' + data.gameplat + '\',\'' + data.detail[0].gameid + '\')">去抢</a>';
                dzhtml += '</div>';
                dzhtml += '</div>';

                $(".poppage-list").prepend(dzhtml);
                alertSet("dz" + timestamp, data.timeleft, "电子");
            }
        }

        $(".poppage-menu .swiper-slide").each(function () {
            $(this).click(function () {
                $(".poppage-menu .swiper-slide").removeClass('active');
                $(this).addClass('active');
                if ($(this).data("type") == "推荐") {
                    $(".poppage-list .poppage-item").show();
                } else {
                    $(".poppage-list .poppage-item").hide();
                    $(".poppage-list .poppage-item[data-type='" + $(this).data("type") + "']").show();
                }
            });
        });
        var windata = [
        { game: "MGE", player: "s8**1", win: "288888" },
        { game: "GB", player: "aa**4", win: "32888" },
        { game: "QT", player: "b1**d", win: "12580" },
        { game: "DT", player: "ca**y", win: "68888" },
        { game: "MGE", player: "gt**8", win: "64666" },
        { game: "HB", player: "c9**1", win: "12388" },
        { game: "GP", player: "d2**5", win: "37488" },
        { game: "QT", player: "s8**3", win: "218888" },
        { game: "DT", player: "a1**4", win: "32488" },
        { game: "MGE", player: "e1**3", win: "13580" },
        { game: "HB", player: "cc**y", win: "62888" },
        { game: "MGE", player: "g1**8", win: "61666" },
        { game: "HB", player: "n9**1", win: "12288" },
        { game: "AMB", player: "g2**2", win: "37388" },
        { game: "MGE", player: "y8**1", win: "278888" },
        { game: "AMB", player: "al**4", win: "32488" },
        { game: "MW", player: "al**4", win: "32488" },
        { game: "MW", player: "as**t", win: "54860" },
        { game: "GB", player: "as**t", win: "8486" },
        ]
        var setwin = setInterval(function () {
            for (i = 0; i < $("span.cred").length; i++) {
                var rand = Math.floor(Math.random() * 10 + 1);
        var onliners = $("span.cred:eq(" + i + ")").html();
                $("span.cred:eq(" + i + ")").html(Number(onliners) + Number(rand));
            }
            var items = windata;
        var item = items[Math.floor(Math.random() * items.length)];
        winning(item);
        }, 3000);
        var datahtml = [];
        var datagames = [];

        function winning(data) {
            var winhtml = '';
            winhtml += '<div class="bigwin">';
            winhtml += '<div class="wincon winA">';
            winhtml += '<span class="wintit">恭 喜</span>';
            winhtml += '<span class="wintxt">玩家' + data.player + '</span>';
            winhtml += '</div>';
            winhtml += '<div class="wincon winB">';
            winhtml += '<span class="wintit">BIG WIN</span>';
            winhtml += '<span class="wintxt">' + data.win + '</span>';
            winhtml += '</div>';
            winhtml += '<div class="winbg"></div>';
            winhtml += '</div>';
            datahtml.push(winhtml);
            datagames.push(data.game);
            setInterval(function () {
                removegame();
            }, 1)
        }
        var j = 0;
        var m = 0;
        var c = [];
        var d = [];
        function removegame() {
            if (datagames.length > 0) {
                if ($(".gamelist-v .gameitem[data-game='" + datagames[0] + "'] .bigwin").length > 0) {
                    $.each(datagames, function (i) {
                        if (!$(".gamelist-v .gameitem[data-game='" + datagames[i] + "'] .bigwin").length > 0) {
                            $(".gamelist-v .gameitem[data-game='" + datagames[i] + "']").append(datahtml[i]);
                            j++;
                            var p = { id: j, game: datagames[i] };
                        c.push(p);
                        datagames.splice(i, 1);
                        datahtml.splice(i, 1);

                        setTimeout(function () {
                            if (c.length > 0) {
                                    $(".gamelist-v .gameitem[data-game='" + c[0].game + "'] .bigwin").remove();
                                c.splice(0, 1);
                            }
                        }, 5000);
                    }
                });
            } else {
                    $(".gamelist-v .gameitem[data-game='" + datagames[0] + "']").append(datahtml[0]);
                m++;
                var q = { id: m, game: datagames[0] };
            d.push(q);
            datagames.splice(0, 1);
            datahtml.splice(0, 1);
            setTimeout(function () {
                if (d.length > 0) {
                            $(".gamelist-v .gameitem[data-game='" + d[0].game + "'] .bigwin").remove();
                    d.splice(0, 1);
                }

            }, 5000);
        }
            }
        }
    </script>
    <script>
        function alert(message) {
            $(document).dialog({
                titleText: '温馨提示',
                content: message,
            });
        }
        function alerthd() {
                $(document).dialog({
                type: 'confirm',
                    closeBtnShow: true,
                    titleText: '温馨提示',
                    content: '请登录后, 再进行游戏!',
                    buttonTextConfirm: '登录',
                    buttonTextCancel: '注册',
                    onClickConfirmBtn: function () {
                    window.location.href = '{{ route('wap.login') }}';
                },
                    onClickCancelBtn: function () {
                    window.location.href = '{{ route('wap.register') }}';
                },
                    onClickCloseBtn: function () {
                }
            });
        }
        var swiper = new Swiper('#banner', {

        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {

          delay: 2500,
          disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
    var noticeswiper = new Swiper('#notice', {
      centeredSlides: true,
      direction:"vertical",
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });
    var noticeswiper = new Swiper('.bigwinlist .swiper-container', {
      centeredSlides: true,
      direction:"vertical",
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      }
    });
	var mySwiper = new Swiper('.gametab .swiper-container', {

        freeMode: true,
        freeModeMomentumRatio: 0.5,
        slidesPerView: 'auto',

	});
        var mySwiper = new Swiper('.poppage-menu .swiper-container', {
            freeMode: true,
            freeModeMomentumRatio: 0.5,
            slidesPerView: 'auto',

        });
        $(window).load(function () {
            $("#loadingbg").fadeOut(200);
        });

        $(function () {
            var winh = $(window).height();
        var plisth = winh - 94;
            $(".poppage-list").css("height", plisth + "px");
            $(".btn-more").click(function () {
                $(".poppage").fadeIn(300);
        });
            $(".poppage-head .icon-close").click(function () {
                $(".poppage").fadeOut(300);
        });
            $(".botpop-top .icon-close").click(function () {
                $(".botpop").css("bottom", "-204px");
        });
            //setInterval(function () {  //弹提示框
            //    $(".botpop").css("bottom", "56px");
            //}, 5000);
	    var status ='';
        if (status == "1") {
            $(document).dialog({
            titleText: '1231',
                content: '123123',
            });
        } else if (status == "2") {
            $(document).dialog({
            type: 'image',
                closeBtnShow: true,
                titleShow: true,
                titleText: '123',
                content: '<img src="Public/Home/picture/banner.png" />',
            });
        } else {
        }
    	$(".my-icon").click(function(){
    		$(".AppSidebar").css("right","0");
    		$(".AppMask").fadeIn(300);
        });
        $(".huiyuan").click(function () {
            $(".AppSidebar").css("right", "0");
            $(".AppMask").fadeIn(300);
        });
    	$(".AppMask,.close-icon").click(function(){
    		$(".AppSidebar").css("right","-240px");
    		$(".AppMask").fadeOut(300);
        });
	    var gamesSwiper = new Swiper('#gameslist');
        gamesSwiper.on('slideChange', function () {
            var j = gamesSwiper.activeIndex;
            $('.gametab .swiper-slide').removeClass('active').eq(j).addClass('active');

            var content_height = $(".gamelist").eq(j).height();
            var slide_height = $("#gameslist>.swiper-slide").eq(j).height(content_height);
            $("#gameslist>.swiper-wrapper").css("height", content_height);
            $("#gameslist>.swiper-container").css("height", content_height);
        });
	    /*列表切换*/
	    $('.gametab .swiper-slide').on('click', function (e) {
            e.preventDefault();
            //得到当前索引
            var i = $(this).index();
	        $('.gametab .swiper-slide').removeClass('active').eq(i).addClass('active');

            var content_height = $(".gamelist").eq(i).height()+20;
            var slide_height = $("#gameslist>.swiper-slide").eq(i).height(content_height);
	        $("#gameslist>.swiper-wrapper").css("height", content_height);
	        $("#gameslist>.swiper-container").css("height", content_height);
            gamesSwiper.slideTo(i, 1000, false);

        });
            $(".gamelist-v .gameitem[data-game='LOTTERY']").click(function () {
            gamesSwiper.slideTo(3, 1000, false);
        });
        })
    </script>
    {{--<script src="Public/Home/page_js/jquery.signalr-2.2.3.min.js"></script>
    <script src="Public/Home/page_js/6a3170c110734d979040a0f71b67ee4d.js"></script>
    <script>

        var uid = '';
        var isSignal = 'True';
        if (uid == "" || uid == null ||isSignal== 'False') { } else {
                $(function () {
                    jQuery.support.cors = true;
                    $.connection.hub.url = "https://signalr.cgamings.com/signalr";
                    var chat = $.connection.messageHub;
                    $.connection.hub.start().done(function () {
                        chat.server.sendLogin('','ws');
        })
                    chat.client.sendMessage = function (name, message) {
            var json = JSON.parse(message);
            if (json.cmd == 1015) {
                var data = dgpar(json.seat, json.tableId);
                            $(".bt-content").html("<p>DG梦幻厅第" + data[0].tablename + "桌，游戏：" + data[0].game + "，<span class=\"hl\">" + data[0].hltype + "</span></p>")
                            $(".btn-bet").attr("href", "/Mobile/GotoGame?GameType=DG&uid=&gameid=" + data[0].gameid + "_" + json.tableId+ "#")
                            $(".botpop").css("bottom", "56px");
                var dgdata = { id: "1", gametype: "真人", gameplat: "DG", gamename: "DG", gameiconname: "DG", timeleft: "15", detail: [{ goodroad: data[0].hltype, goodroadstyle: data[0].hlstyle, tablenum: data[0].tablename, roundnum: json.gameNo, gameid: data[0].gameid, tableid: json.tableId}] };
            createHtml(dgdata);
        }
                    }
                });
            }
    </script>--}}

</body>
</html>