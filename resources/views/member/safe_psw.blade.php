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
                            <li><a href="{{ route('member.message_list') }}" class="text_28" oncontextmenu="return false;">
                                    <span class="mail-num" style="display: none;"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('member.userCenter') }}" class="text_29" oncontextmenu="return false;"></a>
                            </li>
                            <li class="select"><a href="javascript:;" class="text_30" oncontextmenu="return false;"></a>
                            </li>
                            <li><a href="{{ route('member.service_center') }}" class="text_31" oncontextmenu="return false;"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="memRight">
                        <div class="nav">
                            <ul class="commonlist">
                                <li style="width: 200px;"><a href="{{ route('member.login_psw') }}" class="text_42" oncontextmenu="return false;"></a></li>
                                <li class="select" style="width: 215px;"><a href="{{ route('member.safe_psw') }}" class="text_43" oncontextmenu="return false;"></a></li>
                            </ul>
                        </div>
                        <div class="memCon memCon1 ">
                            <div class="memHead">
                                <span class="mc-page-top-title text_43"></span>
                                <div class="mc-page-top-tool">
                                    <a href="" oncontextmenu="return false;"></a>
                                </div>
                            </div>
                            <div class="memMain table-mc form-horizontal">
                                <form class="form-horizontal" id="modifyPayPassword">
                                    <div class="control-group" style="margin-bottom: 0px;">
                                        <label class="control-label" style="width: 215px;"><font class="txt-red">*</font><span class="text_48">：</span></label>
                                        <div class="controls">
                                            <input type="password" id="oddPwdPay" class="input-medium" style="background-color: #58575761;width: 300px;" placeholder="請輸入您當前的支付密碼">
                                        </div>
                                    </div>
                                    <div class="text_794" style="font-size: xx-small; color: red; margin: 0px 0px 10px 215px;"></div>
                                    <div class="control-group">
                                        <label class="control-label" style="width: 215px;"><font class="txt-red">*</font><span class="text_49">：</span></label>
                                        <div class="controls">
                                            <input type="password" class="input-medium" id="newPwdPay" style="background-color: #58575761;width: 300px;" placeholder="請輸入您新的支付密碼">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" style="width: 215px;"><font class="txt-red">*</font><span class="text_46">：</span></label>
                                        <div class="controls">
                                            <input type="password" class="input-medium" id="newPwd2Pay" style="background-color: #58575761;width: 300px;" placeholder="請再次輸入新的支付密碼">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" style="width: 215px;"></label>
                                        <div class="controls">
                                            <a onclick="upPw();" class="btn red-btn text_47"> </a>
                                        </div>
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
@include('member.layouts.pc_right')

<script>
    function upPw() {
        var old_password = $('#oddPwdPay').val();
        var password = $('#newPwdPay').val();
        var password_confirmation = $('#newPwd2Pay').val();

        if(!password || !password_confirmation || !old_password){
            alert('請認真填寫信息');return false;
        }
        if(password!=password_confirmation){
            alert('兩次密碼輸入不一致');return false;
        }
        $.ajax({
            url : "{{ route('member.update_qk_password') }}",
            type : 'POST',
            data : {'old_password':old_password,'password':password,'password_confirmation':password_confirmation},
            success : function (data) {
                console.log(data)
                 if(data.status.errorCode == 0){
                    alert('修改成功!');
                }else{
                    alert(data.status.msg);
                }
            }
        })
        return false;
    }
</script>
</body>
</html>