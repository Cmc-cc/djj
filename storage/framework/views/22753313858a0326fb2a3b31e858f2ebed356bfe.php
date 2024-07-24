<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="robots" content="noindex,nofollow">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="/new0404/js/jquery.min.js"></script>
    <title><?php echo e(isset($_system_config->site_title) ? $_system_config->site_title : 'motoo'); ?></title>
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
    <video class="videoBg" autoplay="" loop="" muted="muted">
	<source src="/images/football2.mp4" type="video/mp4">
</video>
<div class="container">
    <div class="top-box">
 
    <!-- main -->
        <div class="pages-con">
            <div class="registration-c">
				<div class="logo-img">
					<img src = "/new/img/dylogo.png" />
				</div>
                <h1 class=""><?php echo e(trans('lang.zhuce')); ?></h1>
                <div class="line1"></div>
                <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                <form class="form-horizontal" id="form1">
                    <input type="hidden" name="type" value="pc">
                    <table border="0" cellspacing="5" cellpadding="5" class="regTab">
                        <tbody id="setregisterBody">
                       
                        <?php if($_system_config->is_regtj_1 == 1): ?>
 
						<div class="input-div" id="setmenu">
							<img src="../images/icon_user1.png" />
							<input type="text" id="pid"  name="t_name" placeholder="<?php echo e(trans('lang.jieshaoren')); ?>: <?php echo e(trans('lang.p-6-12')); ?><?php echo e(trans('lang.jieshaoren')); ?>！" readonly="readonly">
						</div>
                        <?php endif; ?>
						<div class="input-div">
							<img src="../images/icon_user1.png" />
							<input type="text" id="register-loginName" name="name" value="<?php echo e($register_name); ?>"  minlength="6"  maxlength="9" placeholder="<?php echo e(trans('lang.zanghao')); ?>: <?php echo e(trans('lang.p-6-12')); ?><?php echo e(trans('lang.zanghao')); ?>！">
						</div>
						
						<div class="input-div">
							<img src="../images/icon_password.png" />
							<input type="password" id="register-password" name="password" minlength="6" maxlength="12" required="" placeholder="<?php echo e(trans('lang.denglumima')); ?>:  <?php echo e(trans('lang.p-6-12')); ?><?php echo e(trans('lang.denglumima')); ?>！">
						</div>
						<div class="input-div">
							<img src="../images/icon_password.png" />
							<input type="password" id="cfmpwd" name="password_confirmation" minlength="6" maxlength="12" equalto:="" "#register-password"=""
                                required="" placeholder="<?php echo e(trans('lang.denglumimaqueren')); ?>: <?php echo e(trans('lang.xuyuyuanmimaxiangtong')); ?>">
						</div>
						<div class="input-div">
							<img src="../images/icon_password.png" />
							<input type="password"  id="registtruename" name="qk_pwd" id="registtruename" minlength="6" maxlength="10" required="required" 
                                required="" placeholder="<?php echo e(trans('lang.qkmm')); ?>: <?php echo e(trans('lang.p-6-12')); ?><?php echo e(trans('lang.qkmm')); ?> ">
						</div>
	
						<div class="input-div">
							<img src="../images/icon_user1.png" />
							<input type="text" id="realName" name="real_name" placeholder="<?php echo e(trans('lang.zhenshixingming')); ?>：<?php echo e(trans('lang.zhengquezhenshixingming')); ?>">
						</div>
						<div class="input-div">
							<img src="../images/sj.png" />
							<input type="text" id="phone" name="phone" minlength="8" maxlength="11" placeholder="<?php echo e(trans('lang.sjh')); ?>：<?php echo e(trans('lang.qingtianxiezhengquedeshoujihao')); ?>">
							<div class="sty2 phoneCodeBtn"><?php echo e(trans('lang.hqyzm')); ?></div>
						</div>

                          <?php if($setting->sms_message): ?>
						<div class="input-div">
							<img src="../images/sj.png" />
							<input type="text" name="code" placeholder="<?php echo e(trans('lang.yzm')); ?>">
						</div>
						
                        <?php endif; ?>
						
						<div class="div-bottom">
							<input id="agreeTerms" type="checkbox" required="" style="position: relative; top: 7px;margin-right:5px;">
                                <label><?php echo e(trans('lang.tongyizunxuan')); ?> <a onclick="window.open('/term', '', config='height=580,width=710');"><?php echo e(trans('lang.yonghuxieyi')); ?></a>
                                    <?php echo e(trans('lang.he')); ?>

                                    <a onclick="window.open('/help', '', config='height=580,width=710');"><?php echo e(trans('lang.yinsitiaokuan')); ?></a>
                                </label>
						</div>
                        <input id="registionSubmit" class="regi-btn btn"   onclick="check_form();" value="<?php echo e(trans('lang.lijizhuce')); ?>"
                                                   style="text-align: center;" readonly>
                      
                        </tbody>
                    </table>
					
					
                </form>
            </div>
        </div>
     
    </div>
</div>


<style>
.login_img{
    padding-top: 40px;
}
.login_img img{
    width: 100%;
}
#yuyan{
	position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
	z-index: 9999;
	display:flex;
	justify-content: center;
    align-items: center;
	display:none;
}
#yuyan ul{
	width: 300px;
    height: 800px;
	max-height: 40%;
    height: 20%;
    padding: 0;
    margin: 0;
    background: #fff;
    color: #333;
    padding-top: 10px;
    overflow-y: auto;
	    border-radius: 9px;
}
#yuyan ul li{
	list-style: none;
    line-height: 39px;
    text-align: center;

}
#yuyan ul li.on{
	color: red;
	font-weight:bold;
}

.nav-btn{
	text-align: center;
	
}
.nav-btn a{
	margin:0 15px;
	font-size: 15px;
}
body{

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
	padding:calc((100vh - 850px)/2) 0 20px;
	width:50%;
}
.registration-c h1{
	height:50px;
	line-height:50px;
	text-align: center;
	font-size:18px;
	padding-left: 0;
	position: relative;
}
.registration-c h1 img{
	position: absolute;
    width: 27px;
    right: 0;
    top: 11px;
	cursor: pointer;
}
.registration-c table{
	margin-top:0;
}
.registration-c{
	width:300px;
}
input::-webkit-input-placeholder{ color:#fff!important; }
.input-div {
	     position: relative;
    display: flex;
    align-items: center;
    width: 93%;
    height: 40px;
    flex-flow: row nowrap;
    justify-content: flex-start;
    line-height: 40px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 0 1px 15px 0 #fff;
    border: 1px solid #fff;
    background-color: hsla(0,0%,100%,.5);
    padding: 0 13px;
}
.input-div img{ width:25px; height:25px;}
.input-div input{
	margin-left:10px;
	height: 50px;
	width:420px;
	background: transparent;
	border:none;
	color: #fff;
	font-size: 14px;
}

.registration-c .phoneCodeBtn{
	position: absolute;
    right: 1px;
    background: #d2b496;
    border-radius: 3px;
    height: 39px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    top: 1;
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
	background: transparent;
	color: #c3c3c3;
}
.registration-c a:hover{
    background: transparent;
	color: #c3c3c3;
}

a.regi-btn, input.regi-btn, .btn1{
    margin-top: 20px;
    height: 40px;
    line-height: 40px;
    border: none;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 4px 6px 4px rgba(219,198,177,.24);
    background: linear-gradient(99deg,#dccab8,#d2b496);
    font-size: 14px;
    color: #fff;
    box-sizing: border-box;
    cursor: pointer;
    outline: none;
}
a.regi-btn:hover, input.regi-btn:hover, .btn1:hover{
    background: linear-gradient(99deg,#dccab8,#d2b496);
}
#verifi{
	width:100px;
	height: 42px;
	position: absolute;
    right: 1px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
}
#registionSubmit{font-size: 16px;}
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
	
.videoBg { position:fixed;position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: 0;}
</style>
<script>
    var countdown=60;
    function settime() {
        if (countdown == 0) {
            $('.sty2').attr("disabled", false);
            $('.sty2').text("<?php echo e(trans('lang.hqyzm')); ?>");
            countdown = 60;
            return;
        } else {
            $('.sty2').attr("disabled", 'disabled');
            $('.sty2').text("<?php echo e(trans('lang.cxfs')); ?>(" + countdown + ")");
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
        if (!phone) {alert("<?php echo e(trans('lang.zhuce_shouji')); ?>");return false}
        if(phone.length >11 || phone.length <8){

			chenggong_alert(2,"<?php echo e(trans('lang.zhuce_shouji')); ?>");
            return false;
        }
        settime();
        $.ajax({
            url:"/m/rmsgcode",
            data:{phone:phone},
            success:function(msg){
      
				chenggong_alert(1,msg.url+msg.status.msg);
                settime()
            }
        });
        return false;
    })

    function check_form() {
        if (!$("#agreeTerms")[0].checked) {
            chenggong_alert(2,"<?php echo e(trans('lang.weitongyiyonghuxieyi')); ?>");
            return false;
        }
        var password = $("#register-password").val();
        var cfmpwd = $("#cfmpwd").val();
        var registtruename = $("#registtruename").val();
       var loginName = $("#register-loginName").val();
        var phone = $('#phone').val();
            var realName = $('#realName').val();
         if (!loginName) {
			chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?>!");
            return false;
        }
        
         if (!password) {
			chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.denglumima')); ?>!");
            return false;
        }
        if (!cfmpwd) {
			chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.querenmima')); ?>!");
            return false;
        }
        if (password　!= cfmpwd) {
  
			chenggong_alert(2,"<?php echo e(trans('lang.liangcimimabuyizhi')); ?>!");
            return false;
        }
      
         if (!registtruename) {
 
			chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?>{trans('lang.qkmm')}}!");
            return false;
        }
        if (!phone) {

			chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.sjh')); ?>!");
            return false;
        }
        
        if (!realName) {
			 chenggong_alert(2,"<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zhengquezhenshixingming')); ?>!");
            return false;
        }
        var pattern = /^[0-9]{8,11}$/;
        if (!phone) {chenggong_alert(2,"<?php echo e(trans('lang.zhuce_shouji')); ?>!"); return false}
        $.ajax({
            url : "<?php echo e(route('wap.register.post')); ?>",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                  location.href='/';
                }else{
 
					chenggong_alert(2,data.status.msg);
                }
            }
        })
        return false;
    }

</script>
</body>
</html>