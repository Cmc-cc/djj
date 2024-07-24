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
 
    <!-- main -->
        <div class="pages-con">
            <div class="registration-c">
				<div class="logo-img">
					<img src = "/new/img/dylogo.png" />
				</div>
                <h1 class="text_583"></h1>
                <div class="line1"></div>
                <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                <form class="form-horizontal" id="form1">
                    <input type="hidden" name="type" value="pc">
                    <table border="0" cellspacing="5" cellpadding="5" class="regTab">
                        <tbody id="setregisterBody">
                       
                        @if($_system_config->is_regtj_1 == 1)
 
						<div class="input-div" id="setmenu">
							<img src="../images/icon_1.png" />
							<input type="text" id="pid"  name="t_name" placeholder="介紹人: 請輸入6-9個字符，並需包含英文字母和數字" readonly="readonly">
						</div>
                        @endif
						<div class="input-div">
							<img src="../images/icon_1.png" />
							<input type="text" id="register-loginName" name="name" value="{{ $register_name }}"  minlength="6"  maxlength="9" placeholder="帳號: 請輸入6-9個字符，並需包含英文字母和數字">
						</div>
						
						<div class="input-div">
							<img src="../images/icon_2.png" />
							<input type="password" id="register-password" name="password" minlength="6" maxlength="12" required="" placeholder="登錄密碼: 請輸入6-12個字符或數字的登錄密碼！">
						</div>
						<div class="input-div">
							<img src="../images/icon_2.png" />
							<input type="password" id="cfmpwd" name="password_confirmation" minlength="6" maxlength="12" equalto:="" "#register-password"=""
                                required="" placeholder="登錄密碼確認: 需與原密碼相同">
						</div>
						<div class="input-div">
							<img src="../images/icon_3.png" />
							<input type="password"  id="registtruename" name="qk_pwd" id="registtruename" minlength="6" maxlength="10" required="required" 
                                required="" placeholder="{{trans('lang.qkmm')}}: 請輸入6-10個字符或數字的{{trans('lang.qkmm')}} ">
						</div>
						
						
						

                        @if($_system_config->is_real_name_1 == 1)
						<div class="input-div">
							<img src="../images/icon_1.png" />
							<input type="text" id="realName" name="real_name" placeholder="真實姓名：請輸入真實姓名，並與銀行卡相同">
						</div>
        
                        @endif
						<div class="input-div">
							<img src="../images/icon_4.png" />
							<input type="text" id="phone" name="phone" minlength="8" maxlength="11" placeholder="手機：請填寫真實手機號碼，密碼找回途徑之一">
							<div class="sty2 phoneCodeBtn">發送驗證碼</div>
						</div>

                          @if($setting->sms_message)
						<div class="input-div">
							<img src="../images/icon_5.png" />
							<input type="text" name="code" placeholder="手機驗證碼">
						</div>
						
                        @endif
						
						<div class="div-bottom">
							<input id="agreeTerms" type="checkbox" required="" style="position: relative; top: 7px;margin-right:5px;">
                                <label> 同意並願意遵守 <a onclick="window.open('/term', '', config='height=580,width=710');">用戶協議</a>
                                    和
                                    <a onclick="window.open('/help', '', config='height=580,width=710');">隱私條款</a>
                                </label>
						</div>
                        <input id="registionSubmit" class="regi-btn btn"   onclick="check_form();" value="立即註冊"
                                                   style="text-align: center;" >
                      
                        </tbody>
                    </table>
					
					
                </form>
            </div>
        </div>
     
    </div>
</div>


<style>

body{
	background: url(/wap/images/main-bg-m-dark.6ea06ca.jpg) no-repeat !important;
	background-size: cover;
	color:#fff !important;
}
.pages-con,.registration-c{
	background:transparent;
}
.logo-img{
	text-align:center;
}
.logo-img img{
	padding:50px 0 20px;
	width:50%;
}
.registration-c h1{
	height:50px;
	line-height:50px;
	text-align: center;
	font-size:18px;
}
.registration-c table{
	margin-top:0;
}
.registration-c{
	width:580px;
}
.input-div {
	align-items: center;
	background:hsla(0,0%,100%,.08);
	display: flex;
    flex-wrap: wrap;
	padding:0 20px;
	border:1px solid #444 !important;
	border-radius: 3px;
	margin-bottom: 20px;
	position: relative;
}
.input-div img{ width:20px; height:20px;}
.input-div input{
	margin-left:10px;
	height: 50px;
	width:500px;
	background: transparent;
	border:none;
	color: #fff;
	font-size: 15px;
}

.registration-c .phoneCodeBtn{
	position: absolute;
    right: 12px;
    background: #a471f7;
    border-radius: 3px;
    height: 36px;
}
.div-bottom{
	font-size:14px;
	color:#c3c3c3;
	text-align: center;
}
.registration-c table{
	width:580px;
}
.registration-c a{
	color:#a471f7;
}
.registration-c a:hover{
	color:#a471f7;
}

a.regi-btn, input.regi-btn, .btn1{
	background:hsla(0,0%,100%,.08);
	color:#fff;
	line-height:50px;
	display:block;
	width: 100%;
    text-align: center;
	margin: 5.56vmin 0;
	border-radius: 0;
}
a.regi-btn:hover, input.regi-btn:hover, .btn1:hover{
	background:hsla(0,0%,100%,.4);
}

.input-div input::-webkit-input-placeholder{
        color: #c3c3c3;
　　}
    .input-div input::-moz-placeholder{
        color: #c3c3c3;
　　}
    .input-div input::moz-placeholder{
        color: #c3c3c3;
　　}
    .input-div input::-ms-input-placeholder{
        color: #c3c3c3;
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