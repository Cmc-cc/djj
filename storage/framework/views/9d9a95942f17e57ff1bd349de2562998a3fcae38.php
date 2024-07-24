<html class=" js cssgradients generatedcontent" style="" language="tw"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
    <script src="/new0404/pc/js/jquery-1.12.4.js"></script>
    <script src="/new0404/pc/js/jquery-ui.js"></script>
    <script src="/new0404/pc/js/modernizr.custom.js"></script>
    <script src="/new0404/pc/js/velocity.min.js"></script>
    <script src="/new0404/pc/js/ImgPreload.js"></script>
    <script src="/new0404/pc/js/parallax.min.js"></script>
    <script src="/new0404/pc/js/script.js"></script>
    <link href="/new0404/pc/css/normalize.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/main.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/live.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/loading.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/main-1440.css?202205020105" rel="stylesheet"
          media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">
</head>
<body>

<div class="container">
    <div class="top-box">
        <?php echo $__env->make('member.layouts.pc_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- main -->
        <div class="live-container loading">
            <div class="loadingTracker">
                <div class="loadingSymbol">
                    <div class="logo2"></div>
                </div>
            </div>
            <div class="live-main">
                <!-- <div class="live-item live-item05"></div> -->
            </div>
            <div class="live-game-btns-wrap2">
                <a groupid="35" class="game-btns og1 openGame toplay" gamename="OG" gametype="0" 
                   oncontextmenu="return false;" <?php if($_member): ?> data-url="/game/playGame?plat_type=OB&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="OB"></a>
                <a groupid="114" class="game-btns EVO openGame toplay" gamename="EVO" gametype="" gameid="" <?php if($_member): ?> data-url="/game/playGame?plat_type=EVO&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="EVO"></a>
                <a groupid="70" class="game-btns DG openGame toplay" gamename="DG" gametype="1" <?php if($_member): ?> data-url="/game/playGame?plat_type=DG&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="DG"></a>
                   
                <a groupid="21" class="game-btns lixin openGame toplay" gamename="Lixinlive" <?php if($_member): ?> data-url="/game/playGame?plat_type=WM&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="WM"></a>
                <a groupid="113" class="game-btns SEXYLIVE openGame toplay" gamename="SEXYLIVE" gametype="LIVE"
                   gameid="SEXYBCRT" <?php if($_member): ?> data-url="/game/playGame?plat_type=SEXY&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="SEXY"></a>   
                
                   
                <a groupid="26" class="game-btns ebet openGame toplay" gamename="EBet" gametype="1" <?php if($_member): ?> data-url="/game/playGame?plat_type=SEXY&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="BBIN"></a>
                   
                <!--<a groupid="19" class="game-btns ag openGame toplay" gamename="Agin" gametype="0" target="_blank"-->
                <!--   oncontextmenu="return false;" ></a>-->
                   
                <!--<a groupid="7" class="game-btns mg openGame toplay" gamename="Mg" gametype="SMG_titaniumLiveGames_Baccarat"-->
                <!--   target="_blank" oncontextmenu="return false;" style="display: none;"></a>-->
                   
                <!-- <a groupid="55" class="game-btns SB openGame toplay" gameName='SHENBO' gameType='Sunbet_Lobby' target='_blank' gameid="SB"></a> -->
                <!--<a groupid="14" class="game-btns allbet openGame toplay" gamename="Allbet" gametype="1" target="_blank"-->
                <!--   oncontextmenu="return false;" style="display: none;"></a>-->
                   
                
                   
                <!-- <a groupid="59" class="game-btns SA openGame toplay" gameName='SA' gameType=' ' target='_blank'></a> -->
                
                   
                
            </div>
        </div>
        <?php echo $__env->make('member.layouts.pc_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php echo $__env->make('member.layouts.pc_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>