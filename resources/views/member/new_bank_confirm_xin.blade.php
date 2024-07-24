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
<div class="container2">
    <div class="top-box">
       <div data-app="true" id="app" class="v-application v-application--is-ltr theme--dark">
             <div class="v-application--wrap">
                @include('web.layouts.header_q8')
                <div style="width:100%;background: #f7f9fb;">
			<div class="container">
				
			 @include('member.layouts.pc_left_user')
			 <div class="right-container">


			</div>
</div>
</div>
            </div>
        </div>
    </div>
</div>

 @include('web.layouts.footer_q8')
<!-- main end -->
</body>
</html>