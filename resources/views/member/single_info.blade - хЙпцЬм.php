<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/new0404/js/jquery.min.js"></script>
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <link rel="stylesheet" href="/new0404/pc/css/normalize.css">
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
                            <li><a href="{{ route('member.message_list') }}" class="text_28" oncontextmenu="return false;"><span
                                            class="mail-num" style="display: none;"></span></a>
                            </li>
                            <li class="select"><a href="javascript:;" class="text_29"
                                                  oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="{{ route('member.login_psw') }}" class="text_30" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="{{ route('member.service_center') }}" class="text_31" oncontextmenu="return false;"></a></li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li class="select" style="width: 150px;">
                                    <a href="#" class="text_29" oncontextmenu="return false;"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="memCon memCon1 ">
                            <div class="memHead">
                                <span class="mc-page-top-title text_29"></span>
                                <div class="mc-page-top-tool">
                                    <a href="" oncontextmenu="return false;"></a>
                                </div>
                            </div>
                            <form class="form-horizontal" id="modifyInfo">
                                <div class="memMain table-mc form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label text_656">：</label>
                                        <div class="controls">
                                            <p class="form-control-static text-left" id="userName">{{ $_member->name }}</p>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label text_703">：</label>
                                        <div class="controls">
                                            <p class="form-control-static text-left" id="trueName">{{ $_member->real_name }}</p>
                                        </div>
                                    </div>
                                    <!-- <div class="control-group">
                                        <label class="control-label text_704">：</label>
                                        <div class="controls">
                                            <p class="form-control-static text-left" id="email"></p>
                                        </div>
                                    </div> -->
                                    <!-- <div class="control-group">
                                        <label class="control-label">出生日期：</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="birthday" placeholder="年 - 月 - 日">
                                        </div>
                                    </div> -->
                                    <!-- <div class="control-group">
                                        <label class="control-label">性别：</label>
                                        <div class="radio">
                                            <label>
                                            <input type="radio"   value="1" class="form-radio " name="sex"  style="float:none;"> <span style="  padding-left: 3px; ">男
                                           </span>
                                            </label>
                                            <label>
                                            <input type="radio" value="2" class="form-radio  " name="sex"  style="float:none;"><span style="  padding-left: 3px; ">女
                                           </span> </label>
                                            </div>
                                        </div> -->
                                    <div class="control-group">
                                        <label class="control-label text_705">：</label>
                                        <div class="controls">
                                            <p class="form-control-static text-left" id="phone">{{ $_member->phone }}</p>
                                        </div>
                                    </div>
                                    <!-- <div class="control-group">
                                        <label class="control-label">联系QQ：</label>
                                        <div class="controls">
                                          <input type="text" class="form-control" id="qq" placeholder="2546984553">
                                        </div>
                                    </div> -->
                                    <div class="control-group">
                                        <label class="control-label">LINE：</label>
                                        <div class="controls">
                                            <p class="form-control-static text-left" id="line">{{ $_member->qq }}</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           @include('member.layouts.pc_footer')
    </div>
</div>
@include('member.layouts.pc_right')
<!-- main end -->
</body>
</html>