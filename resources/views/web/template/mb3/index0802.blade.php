<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/new0404/js/jquery.min.js"></script>
    <title>{{ $_system_config->site_title  or 'motoo' }}</title>
    <link rel="stylesheet" href="/new0404/pc/css/normalize.css">
    <link rel="stylesheet" href="/new0404/pc/css/main.css">
    
    <link rel="stylesheet" href="/new0404/pc/css/sports2.css">
    <link rel="stylesheet" href="/new0404/pc/css/lottery.css">
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').on('click', '.activity-box-header', function () {
                $(this).parents(".activity-content").siblings().find(".activity-box-body").hide();
                var body = $(this).next(".activity-box-body");
                body.toggle();
                var height = body.find('iframe').contents().height();
                body.find('iframe').css('height', height);
            });
        });

        function resize(obj) {
            var ifrm = obj.contentWindow.document.body;
            ifrm.style.cssText = "margin:0px;padding:0px;overflow:hidden";
            var div = document.createElement("img");
            div.src = obj.src;
            obj.height = div.height;
            obj.width = div.width;
        }
    </script>
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
                    <div class="banner" style="height:430px;">
                        <div class="wrapper" style="width: 100%;">
                            <div class="banner-img">

                                <div class="banner-item" style="position: absolute;background: url({{ asset('/web/mb3/images/banner01.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>
                                <div class="banner-item" style="display:none;position: absolute;background: url({{ asset('/web/mb3/images/banner001.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>
                                <div class="banner-item" style="display:none;position: absolute;background: url({{ asset('/web/mb3/images/banner002.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>
                                <div class="banner-item" style="display:none;position: absolute;background: url({{ asset('/web/mb3/images/banner003.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>
                                <div class="banner-item" style="display:none;position: absolute;background: url({{ asset('/web/mb3/images/banner0103.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>
                                <div class="banner-item" style="display:none;position: absolute;background: url({{ asset('/web/mb3/images/banner03.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>
                                <div class="banner-item" style="display:none;position: absolute;background: url({{ asset('/web/mb3/images/banner04.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>
                                <div class="banner-item" style="display:none;position: absolute;background: url({{ asset('/web/mb3/images/banner05.jpg') }}) no-repeat center center;background-size: 100% 100%;"></div>

                            </div>
                        </div>
                        <!--<div class="knobbox" style="bottom:115px;">-->
                        <!--    <div class="knob active"></div>-->
                        <!--    <div class="knob"></div>-->
                        <!--    <div class="knob"></div>-->
                        <!--    <div class="knob"></div>-->

                        <!--</div>-->
                        <div class="under-line-gray">
                            <div class="main">
                                <div class="mq">
                                    <div class="mq-mask" id="mews">
                                        <marquee style="line-height:30px;">好消息！！！限時優惠來襲！！！活動內容：每日首充贈送10%：4月28日-5月2日有任何疑問請聯繫24小時在線客服，多款優惠不定時推出，敬請留意！期待您的參與，謝謝支持！</marquee>
<!--                                        <div id="contect" style="width:100%;overflow: hidden;white-space: nowrap;display: flex;align-items: center;height: 100%;" data-duration="15000"><div style="margin-left: 100px; animation: 5s linear 0.5s infinite normal none running marqueeAnimation-7884575;" class="js-marquee-wrapper"><div class="js-marquee" style="margin-right: 0px; float: left;">好消息！！！-->
<!--限時優惠來襲！！！-->
<!--活動內容：每日首充贈送10%-->
<!--活動時間：4月28日-5月2日-->
<!--有任何疑問請聯繫24小時在線客服，多款優惠不定時推出，敬請留意！期待您的參與，謝謝支持！</div><style>@-webkit-keyframes marqueeAnimation-7884575  { 100%  {margin-left:-0px}}</style></div></div>-->
                                    </div>
                                </div>
                                <div id="marquee-contect" class="mq-window-bg transfer">
                                    <div class="mq-window mq-window-1" style="height:initial;">
                                        <a class="close" oncontextmenu="return false;"></a>
                                        <div class="mq-w-title text_2"></div>
                                        <table class="mq-mem" style="width:100%;" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mt10">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text_3"></th>
                                                                    <th class="text_4"></th>
                                                                    <th class="text_5"></th>
                                                                    <th class="text_6"></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="mq-windowDetail"><tr><td width="8%"> <font color="#000">1</font></td><td width="20%"> <font color="#059C74">《勁爆好消息》</font></td><td width="52%"><font color="#000">好消息！！！
限時優惠來襲！！！
活動內容：每日首充贈送10%
活動時間：4月28日-5月2日
有任何疑問請聯繫24小時在線客服，多款優惠不定時推出，敬請留意！期待您的參與，謝謝支持！</font></td><td width="20%"> <font color="#059C74">2022-04-25 12:42:09</font></td></tr></tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- <div class="confirm-box clearfix" style='width: 100%; bottom: 0px;'><a class="confirm">确定</a>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <a href="livechat.html" target="_blank" class="btn-livehelp"></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="banner_bottom_box">
                        <div class="banner_2">
                            <a groupid="21" class="banner_2_list openGame toplay" gamename="Lixinlive" gametype="1" oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=WM&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="WM">
                                <img class="banner_2_A_00" alt="">
                                <div class="banner_title">WM真人</div>
                            </a>
                            <a groupid="138" class="banner_2_list openGame toplay" gamename="OBSPORT" gametype="0" oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=SBO&game_type=5&devices=1" @else data-url="" @endif data-code="SBO">
                                <img class="banner_2_A_01" alt="">
                                <div class="banner_title">SBO体育</div>
                            </a>
                            <a groupid="25" class="banner_2_list openGame toplay" gamename="SBO" gametype="0" target="_blank" oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=5&game_code=&devices=1" @else data-url="" @endif data-code="BBIN">
                                <img class="banner_2_A_07" alt="">
                                <div class="banner_title">BBIN体育</div>
                            </a>
                            <a groupid="113" class="banner_2_list openGame toplay" gamename="SEXYLIVE" gametype="LIVE" gameid="SEXYBCRT" target="_blank" oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=SEXY&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="SEXY">
                                <img class="banner_2_A_02" alt="">
                                <div class="banner_title">SEXY视讯</div>
                            </a>
                            <a groupid="70" class="banner_2_list openGame toplay" gamename="DG" gametype="1" target="_blank" oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=DG&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="DG">
                                <img class="banner_2_A_03" alt="">
                                <div class="banner_title">DG真人</div>
                            </a>
                            <a groupid="114" class="banner_2_list openGame toplay" gamename="EVO" gametype="" target="_blank" oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=EVO&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="EVO">
                                <img class="banner_2_A_04" alt="">
                                <div class="banner_title">EVO真人</div>
                            </a>
                            <a groupid="116" class="banner_2_list openGame toplay"  oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="JDB">
                                <img class="banner_2_A_05" alt="">
                                <div class="banner_title">JDB电子</div>
                            </a>
                            <a groupid="171" class="banner_2_list openGame toplay" gamename="GAMEONE" gametype="0" target="_blank" oncontextmenu="return false;" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=6&game_code=&devices=1" @else data-url="" @endif data-code="KY">
                                <img class="banner_2_A_06" alt="">
                                <div class="banner_title">开元棋牌</div>
                            </a>
                        </div>
                        <div class="button_group">
                            <div id="btn-left" class="left_btn">
                                <span>&lt;</span>
                            </div>
                            <div id="btn-right" class="right_btn">
                                <span>&gt;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @include('member.layouts.pc_footer')
    </div>
</div>
@include('member.layouts.pc_right')
<script>
    var countdown=60;
    function settime() {
        if (countdown == 0) {
            $('.sty2').attr("disabled", false);
            $('.sty2').text("{{trans('lang.hqyzm')}}");
            countdown = 60;
            return;
        } else {
            $('.sty2').attr("disabled", 'disabled');
            $('.sty2').text("{{trans('lang.cxfs')}}(" + countdown + ")");
            countdown--;
        }
        setTimeout(function() { settime() },1000)
    }

    $('.sty2').click(function(){
        if (countdown != 60) {
            return false;
        }
        var phone = $('#phone').val();
        var pattern = /^1[0-9]{10}$/;
        if (!phone) {alert("请输入手机号");return false}
        if(phone.length != 8){
            alert("手机号格式不正确");
            return false;
        }
        settime();
        $.ajax({
            url:"/m/rmsgcode",
            data:{phone:phone},
            success:function(msg){
                alert(msg.url+msg.status.msg);
                settime()
            }
        });
        return false;
    })

    function check_form() {
        if (!$("#agreeTerms")[0].checked) {
            alert("未同意用户协议及条款");
            return false;
        }
        $.ajax({
            url : "{{ route('wap.register.post') }}",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                    location.href=data.url;
                }else{
                    alert(data.status.msg);
                }
            }
        })
        return false;
    }
    $('#btn-left').on('click', function (){
        $(".banner_2").append($(".banner_2 a").first());
    });
    $('#btn-right').on('click', function (){
        $(".banner_2").prepend($(".banner_2 a").last());
    });
    
</script>
</body>
</html>