<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/new0404/js/jquery.min.js"></script>
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <link rel="stylesheet" href="./new0404/pc/css/normalize.css">
    <link rel="stylesheet" href="/new0404/pc/css/main.css">
    <link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
    <link rel="stylesheet" href="/new0404/pc/css/register.css">
    <link rel="stylesheet" href="/new0404/pc/css/loadingTrack.css">
    <link rel="stylesheet" href="/new0404/pc/css/loading.css">
    <link rel="stylesheet" href="/new0404/pc/css/main-1440.css" media="screen and (max-width:1600px)">
    <link rel="stylesheet" href="/new0404/pc/css/language_tw.css" id="languageCss">

    <script src="/new0404/js/jquery-ui.js"></script>
    <script src="/new0404/js/jquery.marquee.min.js"></script>
    <script src="/new0404/js/jquery.knob.js"></script>
    <script src="/new0404/js/modernizr.custom.js"></script>
    <script src="/new0404/js/ImgPreload.js"></script>
    <script src="/new0404/js/banner.js"></script>
    <script src="/new0404/js/script.js"></script>
</head>
<body>
<div class="container">
    <div class="top-box">
    @include('member.layouts.pc_header')
        <!-- main -->
        <div class="pages-con p-c1">
            <div class="main-bg">
                <h2 class="title-s1 text_27"><span>MEMBER CENTER</span></h2>
                <div class="line1"></div>
                <div class="memcenter clear">
                    <div class="memMenu">
                        <ul class="commonlist">
                            <li class="select"><a href="javascript:;" class="text_28" oncontextmenu="return false;">
                                    <span class="mail-num" style="display: none;"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('member.userCenter') }}" class="text_29" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="{{ route('member.login_psw') }}" class="text_30" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="{{ route('member.service_center') }}" class="text_31" oncontextmenu="return false;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="memRight">
                       <!-- <div class="nav">
                            <ul class="commonlist">
                                <li class="select">
                                    <a href="../mem/acc-news.html" id="unread" class="text_32" oncontextmenu="return false;"></a>
                                </li>
                                <li>
                                    <a href="../mem/acc-news1.html" id="read" class="text_33" oncontextmenu="return false;"></a>
                                </li>
                                <li>
                                    <a href="../mem/acc-news2.html" id="allread" class="text_34" oncontextmenu="return false;"></a>
                                </li>
                            </ul>
                        </div>-->
                        <div class="memCon clearfix">
                            <div class="unread">
                                <table width="730" border="0" cellspacing="0" cellpadding="0" class="mt10 email">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%; word-break: normal;" class="text_3"></th>
                                        <th style="width: 59%;" class="text_4"></th>
                                        <th style="width: 12%;" class="text_35"></th>
                                        <th style="width: 19%;" colspan="2" class="text_36"></th>
                                    </tr>
                                    </thead>
                                    <tbody><tr><td colspan="4" style="text-align: center;" class="text_723"></td></tr></tbody>
                                </table>
                                <br>
                                <ul class="pagination"></ul>
                                <div class="mail-detail">

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
</body>
</html>