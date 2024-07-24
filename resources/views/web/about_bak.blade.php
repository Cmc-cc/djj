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
    <link rel="stylesheet" type="text/css" href="/new0404/pc/css/acc.css">
    <link rel="stylesheet" href="/new0404/pc/css/register.css">
    <link rel="stylesheet" href="/new0404/pc/css/activity.css">
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
        <div class="pages-con p-c1">
            <div class="main-bg">
                <h2 class="title-s1 text_671"><span>HELPS</span></h2>
                <div class="helps clear">
                    <div id="helpMenu" class="helpMenu">
                        <ul>
                            @foreach($list as $k => $v)
                                <li @if (request() -> get('type') == $v->id)class="active" @endif><a
                                            href="{{route('web.about',['type'=>$v->id])}}" id="{{$v->id}}">{{$v->title}}<em>&gt;&gt;</em></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="helpWord-c1" class="helpWord-c1">
                        <div class="helpWord" id="GeneralqContent">
                            <div class="subject">{{$data->title}}</div>
                            <div class="main-bd">
                                {!! $data->content !!}
                            </div>
                            <br><br><br><br></div>
                    </div>
                </div>
            </div>
        </div>
        @include('member.layouts.pc_footer')
    </div>
</div>
@include('member.layouts.pc_right')
<script>
    var countdown = 60;

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
        setTimeout(function () {
            settime()
        }, 1000)
    }

    $('.sty2').click(function () {
        if (countdown != 60) {
            return false;
        }
        var phone = $('#phone').val();
        var pattern = /^1[0-9]{10}$/;
        if (!phone) {
            alert("请输入手机号");
            return false
        }
        if (phone.length != 8) {
            alert("手机号格式不正确");
            return false;
        }
        settime();
        $.ajax({
            url: "/m/rmsgcode",
            data: {phone: phone},
            success: function (msg) {
                alert(msg.url + msg.status.msg);
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
            url: "{{ route('wap.register.post') }}",
            type: 'POST',
            data: $("#form1").serialize(),
            success: function (data) {
                if (data.status.errorCode == 0) {
                    location.href = data.url;
                } else {
                    alert(data.status.msg);
                }
            }
        })
        return false;
    }

</script>
</body>
</html>