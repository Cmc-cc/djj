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
        <div class="pages-con">
            <div class="registration-c">
                <h1 class="text_583"></h1>
                <div class="line1"></div>
                <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                <form class="form-horizontal" id="form1">
                    <input type="hidden" name="type" value="pc">
                    <table border="0" cellspacing="5" cellpadding="5" class="regTab">
                        <tbody id="setregisterBody">
                        <tr>
                            <td width="160">&nbsp;</td>
                            <td></td>
                        </tr>
                        @if($_system_config->is_regtj_1 == 1)
                        <tr id="setmenu">
                            <td align="right" style="width:195px;">介紹人：</td>
                            <td><input type="text" id="pid" class="inp" name="t_name"
                                       style="background-color: #c9c9c9;" placeholder="可選擇填寫" readonly="readonly"></td>
                        </tr>
                        @endif
                        <tr>
                            <td align="right" style="width:195px;">帳號：</td>
                            <td><input type="text" class="inp" id="register-loginName" name="name" value="{{ $register_name }}"
                                       minlength="6"  maxlength="9" style="background-color: #c9c9c9;" required=""><span
                                        style="margin-left: 7px;color: #FFEB3B; white-space: nowrap;">請輸入6-9個字符，並需包含英文字母和數字</span><span
                                        id="reUsername"></span></td>
                            <td><span style="color:#ce8b00" id="valid-status-loginName"></span></td>
                        </tr>
                        <tr>
                            <td align="right" style="width:195px;">登錄密碼：</td>
                            <td><input type="password" class="inp" id="register-password" name="password" minlength="6" maxlength="12"
                                       style="background-color: #c9c9c9;" required=""><span
                                        style="margin-left: 7px;color: #FFEB3B; white-space: nowrap;">請輸入6-12個字符或數字的登錄密碼！</span>
                            </td>
                            <td><span style="color:#ce8b00" id="valid-status-pwd"></span></td>
                        </tr>
                        <tr>
                            <td align="right" style="width:195px;">登錄密碼確認：</td>
                            <td><input type="password" class="inp" id="cfmpwd" name="password_confirmation" minlength="6" maxlength="12"
                                       style="background-color: #c9c9c9;" equalto:="" "#register-password"=""
                                required=""><span
                                        style="margin-left: 7px;color: #FFEB3B; white-space: nowrap;">需與原密碼相同</span>
                            </td>
                            <td><label for="password2" style="color:#ce8b00" id="valid-status-cfmpwd"></label></td>
                        </tr>
                       <tr>
                            <td align="right" style="width:195px;">{{trans('lang.qkmm')}}：</td>
                            <td>
                                <input type="password" class="inp" id="registtruename" name="qk_pwd" 
                                       style="background-color: #c9c9c9;" id="registtruename" minlength="6" maxlength="10" required="required" 
                                required="">
                                <span style="margin-left: 7px;color: #FFEB3B; white-space: nowrap;">請輸入6-10個字符或數字的{{trans('lang.qkmm')}} </span>
                            </td>
                            <td><label for="password2" style="color:#ce8b00" id="valid-status-registtruename"></label></td>
                        </tr>
                        @if($_system_config->is_real_name_1 == 1)
                        <tr>
                            <td align="right" style="width:195px;">真實姓名：</td>
                            <td><input type="text" class="inp" id="realName" name="real_name"
                                       style="background-color: #c9c9c9;" placeholder="可選擇填寫"><span
                                        style="margin-left: 7px;color: #FFEB3B; white-space: nowrap;">請輸入真實姓名，並與銀行卡相同</span>
                            </td>
                            <td><span style="color:#ce8b00" id="valid-status-realName"></span></td>
                        </tr>
                        @endif
                        <tr>
                            <td align="right" style="width:195px;">手機：</td>
                            <td><input type="text" class="inp" id="phone" name="phone" minlength="8" maxlength="11"
                                       style="background-color: #c9c9c9; width: 215px;"><span
                                        style="margin-left: 7px;color: #FFEB3B; white-space: nowrap;">請填寫真實手機號碼，密碼找回途徑之一</span>
                            </td>
                            <td><span style="color:#ce8b00" id="valid-status-phone"></span></td>
                        </tr>
                          @if($setting->sms_message)
                        <tr>
                            <td align="right" style="width:195px;"></td>
                            <td style="padding: 0px 0px 10px 11px;">
                                <div class="sty2 phoneCodeBtn">發送驗證碼</div>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" style="width:195px;">手機驗證碼：</td>
                            <td><input type="text" class="inp" name="code" style="background-color: #c9c9c9;"></td>
                        </tr>
                        @endif
                        <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="2">
                                <input id="agreeTerms" type="checkbox" required="" style="position: relative; top: 7px;">
                                <label> 同意並願意遵守 <a onclick="window.open('/term', '', config='height=580,width=710');">用戶協議</a>
                                    和
                                    <a onclick="window.open('/help', '', config='height=580,width=710');">隱私條款</a>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2"><input id="registionSubmit" class="regi-btn btn"   onclick="check_form();" value="立即註冊"
                                                   style="text-align: center;" ></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        @include('member.layouts.pc_footer')
    </div>
</div>
@include('member.layouts.pc_right')

<style>
.header-top,.header,.fix_layout,.bottom-info-main,.footer{ display:none;}
body{
	background: url(/wap/images/main-bg-m-dark.6ea06ca.jpg) no-repeat !impotant;
	background-size: cover;
	color:#fff !important;
}
</style>
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
        var pattern = /^[0-9]{8,11}$/;
        if (!phone) {alert("手機號為8-11個數字!");return false}
        if(phone.length >11 || phone.length <8){
            alert("手機號為8-11個數字!");
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
            alert("未同意用户协议及条款!");
            return false;
        }
        var password = $("#register-password").val();
        var cfmpwd = $("#cfmpwd").val();
        var registtruename = $("#registtruename").val();
       var loginName = $("#register-loginName").val();
        var phone = $('#phone').val();
         if (!loginName) {
            alert("請輸入帳號!");
            return false;
        }
        
         if (!password) {
            alert("請輸入登錄密碼!");
            return false;
        }
        if (!cfmpwd) {
            alert("請輸入確認登錄密碼!");
            return false;
        }
        if (password　!= cfmpwd) {
            alert("兩次密碼輸入不一致!");
            return false;
        }
      
         if (!registtruename) {
            alert("請輸入{{trans('lang.qkmm')}}!");
            return false;
        }
        if (!phone) {
            alert("請輸入手機號碼!");
            return false;
        }
        var pattern = /^[0-9]{8,11}$/;
        if (!phone) {alert("手機號為8-11個數字222!");return false}
        $.ajax({
            url : "{{ route('wap.register.post') }}",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                  location.href='/';
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