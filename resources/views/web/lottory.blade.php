<html class=" js cssgradients generatedcontent" style="" language="tw"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <script src="/new0404/js/jquery.min.js"></script>
    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/pc/js/jquery.marquee.min.js"></script>
    <script src="/new0404/pc/js/jquery.colorbox.js"></script>
    <link href="/new0404/pc/css/normalize.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/main.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/game.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/loading.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/main-1440.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/slotgame.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/playtech.css?202205020105" rel="stylesheet">

    <link href="/new0404/pc/css/slot777.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/mg.css?202205020105" rel="stylesheet"
          media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">
    <style>
        .banner {
            position: relative;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-box">
    @include('member.layouts.pc_header')
    <!-- main -->
        <div class="main_wrap">
            <div class="loadingTracker">
                <div class="loadingSymbol">
                    <div class="logo2"></div>
                </div>
            </div>
            <div class="content">
                <div class="banner game-banner">
                    <div class="wrapper">
                        <div class="banner">
                            <div class="wrapper">
                                <div class="banner-img">
                                    <div class="banner-item item7" style="display: block; position: relative;"></div>
                                </div>
                            </div>
                            <div class="line-gray">
                                <div class="main">
                                    <div id="marquee-contect" class="mq-window-bg transfer">
                                        <div class="mq-window mq-window-1" style="height:initial;">
                                            <a class="close" oncontextmenu="return false;"></a>
                                            <div class="mq-w-title text_2"></div>
                                            <table class="mq-mem" style="width:100%;" border="0" cellpadding="0"
                                                   cellspacing="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                                               class="mt10">
                                                            <thead>
                                                            <tr>
                                                                <th class="text_3"></th>
                                                                <th class="text_4"></th>
                                                                <th class="text_5"></th>
                                                                <th class="text_6"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="mq-windowDetail"></tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="foot">
                                                        <b>&nbsp;</b>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="confirm-box clearfix" style="width: 100%; bottom: 0px;"><a
                                                        class="confirm text_7" oncontextmenu="return false;"></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slotgameMenu-bg" style="height:400px;">
                    <div class="slotgameMenu-all">
                        <div class="slot-Menu">

                            <div class="game-content" id="game-list">
                                <div class="ag-fish game-2" style="width: 1000px; display: block;margin:0;">
                                     
                                    <div class="CQ9-fish-bg" id="CQ9-fish-bg" groupid="65"
                                         style="height: 245px;float: left;text-align: initial; margin-left: 25px;">
                                        <div class="fishTbar fishTbar_CQ9" style="    background-size: 100% 100%;    width: 100%;">
                                            <a groupid="65" class="btn-fish btn-bet toplay" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AB3&devices=1" @else data-url="" @endif data-code="CQ9" oncontextmenu="return false;">
                                                <div class="text_956"></div>
                                            </a>
                                            <a groupid="65" class="btn-fish2 btn-bet toplay" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AT01&devices=1" @else data-url="" @endif data-code="CQ9" oncontextmenu="return false;">
                                                <div class="text_957"></div>
                                            </a>
                                            
                                            <a groupid="65" class="btn-fish3 btn-bet toplay" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AT05&devices=1" @else data-url="" @endif data-code="CQ9" oncontextmenu="return false;">
                                                <div >C欢乐捕鱼</div>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="jdb-fish-bg" id="jdb-fish-bg" groupid="56"
                                         style="width: 960px;text-align: initial;float: left; height: 480px;">
                                        <div class="fishTbar fishTbar_jdb">
                                            <a groupid="56" class="btn-fish btn-bet toplay" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7001&devices=1" @else data-url="" @endif data-code="JDB" oncontextmenu="return false;" oncontextmenu="return false;">
                                                <div class="text_958"></div>
                                            </a>
                                            <a groupid="56" class="btn-fish1 btn-bet toplay" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7002&devices=1" @else data-url="" @endif data-code="JDB" oncontextmenu="return false;">
                                                <div class="text_959"></div>
                                            </a>
                                            <a groupid="56" class="btn-fish2 btn-bet toplay" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7003&devices=1" @else data-url="" @endif data-code="JDB" oncontextmenu="return false;">
                                                <div class="text_960"></div>
                                            </a>
                                            <a groupid="56" class="btn-fish3 btn-bet toplay" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7004&devices=1" @else data-url="" @endif data-code="JDB" oncontextmenu="return false;">
                                                <div class="text_962"></div>
                                            </a>
                                            
                                            
                                          <!--  <a groupid="56" class="btn-fish btn-bet toplay" data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7005&devices=1"  data-code="JDB" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new/img/img/bb2.png) 40px 0 no-repeat;">
                                                <div>JDB捕鱼一路发</div>
                                            </a>
                                            <a groupid="56" class="btn-fish1 btn-bet toplay" data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7006&devices=1"  data-code="JDB" oncontextmenu="return false;" style="background:url(/new/img/img/bb.png) 40px 0 no-repeat;">
                                                <div>JDB猎龙高手</div>
                                            </a>
                                            <a groupid="56" class="btn-fish2 btn-bet toplay" data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7007&devices=1"  data-code="JDB" oncontextmenu="return false;" style="background:url(/new/img/img/bb2.png) 40px 0 no-repeat;">
                                                <div>JDB捕鱼迪斯可</div>  
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div style="width: 960px;text-align: initial;float: left; ">
                                        <div class="fishTbar">
                                            <a groupid="56" class="btn-fish btn-bet toplay" data-url="/game/playGame?plat_type=BBIN&game_type=2&game_code=0&devices=1"  data-code="BBIN" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new/img/img/bb2.png) 40px 0 no-repeat;">
                                                <div>BBIN捕鱼大厅</div>
                                            </a>
                                            <a groupid="56" class="btn-fish1 btn-bet toplay" data-url="/game/playGame?plat_type=LEG&game_type=2&game_code=510&devices=1"  data-code="LEG" oncontextmenu="return false;" style="background:url(/new/img/img/bb.png) 40px 0 no-repeat;">
                                                <div>LEG捕鱼大作战</div>
                                            </a>
                                            <a groupid="56" class="btn-fish2 btn-bet toplay" data-url='/game/playGame?plat_type=OB&game_type=2&game_code=200&devices=1' data-code="OB" oncontextmenu="return false;" style="background:url(/new/img/img/bb2.png) 40px 0 no-repeat;">
                                                <div>OB欢乐捕鱼王</div>
                                            </a>
                                            <a groupid="56" class="btn-fish btn-bet toplay" data-url='/game/playGame?plat_type=OB&game_type=6&game_code=200&devices=1' data-code="OB" oncontextmenu="return false;" oncontextmenu="return false;" style="background:url(/new/img/img/bb.png) 40px 0 no-repeat;">
                                                <div>OB海王捕鱼</div>
                                            </a>
                                            <a groupid="56" class="btn-fish1 btn-bet toplay" data-url="/game/playGame?plat_type=KY&game_type=2&game_code=510&devices=1"  data-code="KY" oncontextmenu="return false;" style="background:url(/new/img/img/bb2.png) 40px 0 no-repeat;    margin-top: 30px;">
                                                <div>KY红包捕鱼</div>
                                            </a>
                                            <a groupid="56" class="btn-fish2 btn-bet toplay" data-url="/game/playGame?plat_type=KY&game_type=2&game_code=520&devices=1"  data-code="KY" oncontextmenu="return false;" style="background:url(/new/img/img/bb.png) 40px 0 no-repeat;">
                                                <div>KY李逵捕鱼</div> --> 
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <!--<div class="mw-fish-bg" id="mw-fish-bg" groupid="48" style="float: left;">-->
                                    <!--    <div class="fishTbar fishTbar_mw">-->
                                    <!--        <a groupid="48" class="btn-fish btn-bet toplay" data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7001&devices=1"  data-code="JDB" oncontextmenu="return false;">-->
                                    <!--            <div class="text_961"></div>-->
                                    <!--        </a>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class='ag-fish-bg' id='ag-fish-bg' groupid="33" style="width: 255px;height: 245px;float: left;text-align: initial;">-->
                                    <!--    <div class="fishTbar fishTbar_ag">-->
                                    <!--        <a groupid="33" class="btn-fish btn-bet toplay" data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7002&devices=1"  data-code="JDB"><div>捕鱼王</div></a>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class='pt-fish-bg' id='pt-fish-bg' groupid="49" style="width: 230px;height: 245px;float: left;text-align: initial;margin-left: 25px;">-->
                                    <!--    <div class="fishTbar fishTbar_pt">-->
                                    <!--        <a groupid="49" class="btn-fish1 btn-bet toplay" gamename="Playtech" gametype="cashfi" target="_blank"><div>深海大赢家</div></a>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                    
                                    <!--<div class='SHENBO-fish-bg' id='SHENBO-fish-bg' groupid="51">-->
                                    <!--    <div><a groupid="51" class="btn-fish btn-bet" gamename="SHENBO" gametype="GDFFishing_King" target="_blank"></a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('member.layouts.pc_footer')
    </div>
</div>
@include('member.layouts.pc_right')
<script src="/new0404/pc/js/game.js"></script>
<script src="/new0404/pc/js/playngo.js"></script>
<script src="/new0404/pc/js/micg-list.js"></script>
<script src="/new0404/pc/js/slotgame.js"></script>
<script src="/new0404/pc/js/slot777.js"></script>
<script src="/new0404/pc/js/jquery.colorbox.js"></script>
<script src="/new0404/pc/js/jquery.marquee.min.js"></script>
</body>
</html>