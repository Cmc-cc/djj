<!doctype html>
<html class="s-app" data-n-head-ssr lang="zh-TW" data-n-head="%7B%22lang%22:%7B%22ssr%22:%22zh-TW%22%7D%7D">
<head>
    <title>{{ $_system_config->site_title}}</title>
    <meta data-n-head="ssr" charset="utf-8">
    <meta data-n-head="ssr" name="viewport" content="width=device-width, initial-scale=1">
    <meta data-n-head="ssr" data-hid="og:url" property="og:url" content="https://q8.bet">
    <meta data-n-head="ssr" data-hid="keywords" name="keywords"
          content="娛樂城體育,娛樂城優惠,線上娛樂城,娛樂城註冊優惠,現金版推薦,現金球版推薦,大發網現金版,WG CLUB娛樂城,歐博,沙龍,dg,super,新鑫寶,真人視訊,百家樂,骰寶,賓果,21點,體育賽事,免費影城,老虎機,樂透,北京賽車,手中寶,任你贏彩票,美女主播, av女優、世界盃,棒球12強賽事">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title"
          content="WG CLUB娛樂城│業界誠信高,多款遊戲線上遊戲平台│體育博彩│真人視訊│百家樂│骰寶│六合彩│老虎機">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description"
          content="WG CLUB爲亞洲最大在線合法網上博弈娛樂平台。安全便利, 信譽最佳保證出金，WG CLUB提供各種最新真人視訊百家樂、電子遊戲、SLOT-game、線上六合彩、高賠率運動賽事等賽事遊戲無限，體育直播以及24小時線上客服。">
    <meta data-n-head="ssr" data-hid="charset" charset="utf-8">
    <meta data-n-head="ssr" data-hid="mobile-web-app-capable" name="mobile-web-app-capable" content="yes">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-capable" name="apple-mobile-web-app-capable" content="yes">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-status-bar-style"
          name="apple-mobile-web-app-status-bar-style" content="default">
    <meta data-n-head="ssr" data-hid="apple-mobile-web-app-title" name="apple-mobile-web-app-title" content="WG CLUB娛樂城">
    <meta data-n-head="ssr" data-hid="description" name="description"
          content="WG CLUB爲亞洲最大在線合法網上博弈娛樂平台。安全便利, 信譽最佳保證出金，WG CLUB提供各種最新真人視訊百家樂、電子遊戲、SLOT-game、線上六合彩、高賠率運動賽事等賽事遊戲無限，體育直播以及24小時線上客服。">
    <meta data-n-head="ssr" data-hid="theme-color" name="theme-color" content="#000000">
    <meta data-n-head="ssr" data-hid="og:type" name="og:type" property="og:type" content="website">
    <meta data-n-head="ssr" data-hid="og:site_name" name="og:site_name" property="og:site_name" content="WG CLUB娛樂城">
        <style>
        .top_nav h5 img {
            margin-top: 10px;
        }
        .v-application .primary--text {
            color: var(--v-primary-base) !important;
            caret-color: var(--v-primary-base) !important;
        }
    </style>
</head>
<body class="s-app">
<div data-server-rendered="true" id="__nuxt"><!---->
    <div id="__layout">
        <div data-fetch-key="0">
            <div data-app="true" id="app" class="v-application v-application--is-ltr theme--dark">
                <div class="v-application--wrap">
                   @include('web.layouts.header_q8')
                       <main class="v-main" data-booted="true">
                           <div class="v-main__wrap">
                               <div role="dialog" class="v-dialog__container UiAnnouncement"></div> 
                                  <div class="container service" id="service">
                                     <div class="mx-auto fill-height v-sheet theme--dark transparent" style="max-width: 1280px;">
                                        <div class="d-flex justify-center align-center pa-4">
                                            <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{trans("lang.bzzx")}} </font></font></h2>
                                        </div>
                                        <hr role="separator" aria-orientation="horizontal" class="v-divider theme--dark"> 
                                        <div class="row">
                                            <div class="col-lg-3 col-12">
                                                <div class="filter v-card v-sheet theme--dark" id="UiFilterLists">
                                                    
                                                     <div role="list" class="v-list v-sheet theme--dark v-list--dense v-list--nav">
                                                          <div role="listbox" class="v-item-group theme--dark v-list-item-group primary--text">
                                                           @foreach($_about as $k => $v)
                                                                <div tabindex="0" role="listitem" class="v-list-item v-list-item--link theme--dark @if (request()->get('type') == $v->id) v-item--active v-list-item--active  @endif ">
                                                                    <div class="v-list-item__content" data-type="{{$v->id}}">
                                                                        <font style="vertical-align: inherit;">
                                                                            <font style="vertical-align: inherit;">{{$v->title}}</font>
                                                                        </font>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            </div>
                                                            </div> 
                                                       </div>
                                                     </div>
                                                     <div class="col-lg-9 col-12">
                                                                        <div class="row row--dense">
                                                                            <div class="col">
                                                                                <div class="v-card v-sheet theme--dark">
                                                                                    <div class="v-responsive">
                                                                                        <div class="v-responsive__content">
                                                                                            <div class="row no-gutters"><!----> 
                                                                                            <div class="col">
                                                                                                <div class="v-card__title">
                                                                                                    <font style="vertical-align: inherit;">
                                                                                                        <font style="vertical-align: inherit;">{{$data->title}}</font>
                                                                                                    </font>
                                                                                                </div>
                                                                                                <div class="v-card__text v-html">
                                                                                                      {!! $data->content !!}
                                                                                                </div></div></div></div></div></div></div></div></div></div></div></div> 


                                <div id="UiMarquee" clipped-right="" app="" bottom=""
                                 class="d-flex align-center v-sheet theme--dark transparent fixed" data-v-0b083737="">
                                <button type="button"
                                        class="v-btn v-btn--flat v-btn--icon v-btn--round theme--dark v-size--small"
                                        data-v-0b083737=""><span class="v-btn__content"><i aria-hidden="true"
                                                                                           class="v-icon notranslate mdi mdi-bullhorn-outline theme--dark"
                                                                                           data-v-0b083737=""></i></span>
                                </button>
                                <div data-v-0b083737="" class="flex-grow-1 marquee-text-wrap">
                                    <div data-v-0b083737="" class="marquee-text-content">
                                        <div data-v-0b083737="" class="marquee-text-text"
                                             style="animation-duration: 176.7s;">
                                            @foreach($_system_notices as $v)
                                            <span data-v-0b083737="" class="ml-0">
                                                <span data-v-0b083737="" class="marquee-category ml-2">
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">{{trans("lang.xtgg")}}</font>
                                                    </font>
                                                </span>
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">{{ $v->title }}</font>
                                                    <font style="vertical-align: inherit;">{{ $v->content }}</font>
                                                </font>
                                            </span>
                                            @endforeach
                                         </div>
                                    </div>
                                </div>
                            </div>

          </div>

                        </main>
                    @include('web.layouts.footer_q8')
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".v-list-item__content").on('click',function(){
        var id = $(this).attr('data-type');
        location.href ="/about?type="+id;
    })
</script>
</body>
</html>
