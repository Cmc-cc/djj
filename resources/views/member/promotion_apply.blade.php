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
                <h2 class="title-s1 text_165"><span>FINANCIAL CENTER</span></h2>
                <div class="line1"></div>
                <div class="memcenter clear">
                    <div class="memMenu">
                        <ul class="commonlist">
                            <li><a href="/member/bank" class="text_166" oncontextmenu="return false;"></a></li>
                            <li class="select"><a href="/member/promotion_apply" class="text_167" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/acc-transfer" class="text_122" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/customer_report" class="text_168" oncontextmenu="return false;"></a></li>
                            <li><a href="/member/customer_report_3" class="text_169" oncontextmenu="return false;"></a></li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li class="select" style="width: 195px;"><a href="/member/promotion_apply" class="text_211" oncontextmenu="return false;"></a></li>
                               <!-- <li style="width: 195px;"><a href="/member/npromotion" class="text_212" oncontextmenu="return false;"></a></li>-->
                            </ul>
                        </div>
                        <div class="memRight" style="width:100%;">
                            <div class="memCon memCon1 ">
                                <div class="memHead">
                                    <span class="mc-page-top-title text_213"></span>
                                    <div class="mc-page-top-tool">
                                        <a href="" oncontextmenu="return false;"></a>
                                    </div>
                                </div>
                                       <form id="apply">
                                    <div class="promotion">
                                        <div class="clear" style="clear:both; padding: 5px 5px 5px 5px;  "></div>
                                        <table width="693" border="0" cellpadding="4" cellspacing="1" bgcolor="525252" style="padding: 15px 0 15px 10px;">
                                            <tbody>

                                            @foreach($data as $item)
                                                <tr>
                                                    <td spancol="5" style="color:#000;background-color:#fff; font-size:16px;" class="">
                                                        活动标题：{{ $item->activity->title }}
                                                            @if($item->status == 3)
                                                                <font color="red">你的活动申请未通过，原因：{{ $item->fail_reason }}</font>
                                                            @endif
                                                            @if($item->status == 2)
                                                                恭喜你，你的活动申请已审核通过，赠送金额已发放到你的账户，请查收！
                                                            @endif
                                                            @if($item->status == 1)
                                                                <font color="blue">你的活动申请正在审核，请耐心等耐！</font>
                                                            @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('member.layouts.pc_footer')
    </div>
</div>
<!-- main end -->
@include('member.layouts.pc_right')

<script>
    var type = 0;
    $('.bindbankcard').click(function () {
        type = 1;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(1).show();
        $(".control-group").eq(2).show();
    });
    $('.bindfps').click(function () {
        type = 2;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(3).show();
    });
    $('.bindusdterc20').click(function () {
        type = 3;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(4).show();
    });
    $('.bindusdttrc20').click(function () {
        type = 4;
        $(".control-group").hide();
        $(".control-group").eq(0).show();
        $(".control-group").eq(5).show();
    });


    function saveBank() {
        var bank = $("#Bankname").val();
        var username = $("#username").val();
        var card = $("#bankcode").val();
        if (username.length < 2) {
            alert('請輸入真實姓名');
            return;
        }
        if (card.length < 8) {
            alert('請輸入您的銀行卡號');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'bank': bank, 'card': card, 'username': username, 'type': 1},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }

    function saveFps() {
        var fps = $("#FPSAccount").val();
        var username = $("#username").val();
        if (username.length < 2) {
            alert('請輸入真實姓名');
            return;
        }
        if (fps.length < 8) {
            alert('請輸入轉數快號碼');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'fps': fps, 'username': username, 'type': 2},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }

    function saveErc20() {
        var erc20 = $("#USDTAccount").val();
        var username = $("#username").val();
        if (username.length < 2) {
            alert('請輸入真實姓名');
            return;
        }
        if (erc20.length < 8) {
            alert('請輸入USDT帳號');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'erc20': erc20, 'username': username, 'type': 3},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }

    function saveTrc20() {
        var trc20 = $("#USDTAccountTRC20").val();
        var username = $("#username").val();
        if (username.length < 2) {
            alert('请输入真實姓名');
            return;
        }
        if (trc20.length < 8) {
            alert('請輸入USDT帳號');
            return;
        }
        $.ajax({
            url: "{{route('wap.set_bank')}}",
            type: 'POST',
            data: {'trc20': trc20, 'username': username, 'type': 4},
            success: function (data) {
                alert(data.status.msg);
                if (data.status.errorCode == 0) {
                    setTimeout(function () {
                        location.reload();
                    }, 200)
                }
            }
        })
        return false;
    }


    function add() {
        if (type < 1) {
            alert('请选择要绑定的项目！');
            return false;
        }
        switch (type) {
            case 1:
                saveBank();
                break;
            case 2:
                saveFps();
                break;
            case 3:
                saveErc20();
                break;
            case 4:
                saveTrc20();
                break;
        }
    }
</script>
</body>
</html>