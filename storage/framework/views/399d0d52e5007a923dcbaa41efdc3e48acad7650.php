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
    <link href="/new0404/pc/css/sports2.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/loading.css?202205020105" rel="stylesheet">
    <link href="/new0404/pc/css/main-1440.css?202205020105" rel="stylesheet"
          media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">
</head>
<body>
<style>
    .asas:hover{
        background:url(/new0404/pc/images/OBSPORT01.png);
    }
</style>
<div class="container">
    <div class="top-box">
    <?php echo $__env->make('member.layouts.pc_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- main -->
        <div class="main_wrap">
            <div class="loadingTracker">
                <div class="loadingSymbol">
                    <div class="logo2"></div>
                </div>
            </div>
            <div class="content" style="">
                <div class="sports-site">
                   <div class="sport-playbtnCMD toplay" groupid="45" <?php if($_member): ?> data-url="/game/playGame?plat_type=TFG&game_type=7&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="TFG" style="left: 970px;top: 93px;">
                        <a groupid="45" class="openGame" gamename="TFG" gametype="0" oncontextmenu="return false;"></a>
                    </div>
                    <div class="sport-playbtn2 toplay" groupid="25" <?php if($_member): ?> data-url="/game/playGame?plat_type=IA&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="IA">
                        <a groupid="25" class="openGame" gamename="IA" gametype="0"  oncontextmenu="return false;"></a>
                    </div>
                    <div class="sport-playbtnOBSPORT toplay asas" groupid="138" <?php if($_member): ?> data-url="/game/playGame?plat_type=OB&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="OB">
                        <a groupid="138" class="openGame" gamename="OBSPORT" gametype="0" target="_blank"
                           oncontextmenu="return false;"></a>
                    </div>
                    <div class="sport-playbtnBBIN toplay asas" groupid="4" <?php if($_member): ?> data-url="/game/playGame?plat_type=HG&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="HG">
                        <a groupid="4" class="openGame" gamename="HG" gametype="FT"  oncontextmenu="return false;"></a>
                    </div>
                    <div class="sport-playbtn toplay asas" groupid="91" <?php if($_member): ?> data-url="/game/playGame?plat_type=CMD&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="CMD" style="top: 35px;">
                         <a groupid="91" class="openGame" gamename="CMD" gametype="0"  oncontextmenu="return false;"></a>
                    </div>
                    <div class="sport-playbtnCRSPORT toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=SBO&game_type=5&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="SBO" style="top: 35px;">
                            <a groupid="214" class="openGame" gamename="SBO" gametype="0" target="_blank" oncontextmenu="return false;"></a>
                    </div>
                        
                        
                    <!--<div class="sport-playbtnm8 toplay" groupid="36" <?php if($_member): ?> data-url="/game/playGame?plat_type=TFG&game_type=1&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="TFG">-->
                    <!--    <a groupid="36" class="openGame" gamename="M8" gametype="0" oncontextmenu="return false;"></a>-->
                    <!--</div>-->
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
        <?php echo $__env->make('member.layouts.pc_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php echo $__env->make('member.layouts.pc_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>