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
    <link href="/new0404/pc/css/lottery.css?202205020105" rel="stylesheet">
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
        <div class="main_wrap">
            <div class="loadingTracker">
                <div class="loadingSymbol">
                    <div class="logo2"></div>
                </div>
            </div>
            <div class="content">
                <div class="banner lottery" style="height:45%;">
                    <div class="banner-container loading">
                        <div class="banner-main">
                            <div class="banner-box">
                                <div class="Chessgame-banner">
                                    <ul class="Chessgame-nav commonlist drag">
                                        
                                        <li groupid="132" class="toplay" <?php if($_member): ?> data-url="/api/gamelist?api_code=BL&game_type=6&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="BL">
                                            <a groupid="132" class="openGame" gamename="BOLE" gametype="" >
                                                <img class="BOLE-item" alt="">
                                                <span>博樂棋牌</span>
                                            </a>
                                        </li>
                                        <li groupid="60" class="toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=KY&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="KY">
                                            <a groupid="60" class="openGame" gamename="KAIYUAN" gametype="0" >
                                                <img class="Kaiyuan-item" alt="">
                                                <span class="text_102"></span>
                                            </a>
                                        </li>
                                        <li groupid="72" class="toplay" <?php if($_member): ?> data-url="/game/playGame?plat_type=LEG&game_type=6&game_code=&devices=1" <?php else: ?> data-url="" <?php endif; ?> data-code="LEG">
                                            <a groupid="72" class="openGame" gamename="LEG" gametype="0">
                                                <img class="LEG-item" alt="">
                                                <span class="text_751"></span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="under-line-gray">
                        <div class="main">
                            <div class="mq">
                                <div class="mq-mask" id="mews">
                                    <div id="contect"
                                         style="width:100%;overflow: hidden;white-space: nowrap;display: flex;align-items: center;height: 100%;"
                                         data-duration="15000">
                                        <div style="margin-left: 1164px; animation: 15s linear 1s infinite normal none running marqueeAnimation-8254837;"
                                             class="js-marquee-wrapper">
                                            <div class="js-marquee" style="margin-right: 0px; float: left;"></div>
                                            <style>@-webkit-keyframes marqueeAnimation-8254837 {
                                                       100% {
                                                           margin-left: -0px
                                                       }
                                                   }</style>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        </tbody>
                                    </table>
                                    <!-- <div class="confirm-box clearfix" style='width: 100%; bottom: 0px;'>
                                        <a class="confirm text_7"></a>
                                    </div> -->
                                </div>
                            </div>
                            <a href="livechat.htm" target="_blank" class="btn-livehelp"
                               oncontextmenu="return false;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('member.layouts.pc_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
<?php echo $__env->make('member.layouts.pc_right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>