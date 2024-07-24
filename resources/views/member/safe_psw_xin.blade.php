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
        
		
<div class="page-wrapper">
<div class="member-container">
	<div class="member-body">
		<div id="layout-main-area"><div style="height: 100%; background-color: rgb(255, 255, 255); display: block;" id="layout-main-area-div">
				<div id="main-container1">
	<div class="module-top">
		<div class="top-menu-area">
			<a class="switchroute" href="login_psw_xin">{{trans("lang.xgdenglumima")}}</a>
			<a href="javascript:void(0)" class="active">{{trans("lang.xgqkmm")}}</a>
		</div>
	</div>		
	<div class="module-main" style="margin-top:25px">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<input name="old_password" type="password"  id="oddPwdPay" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" placeholder="{{trans("lang.srjmm")}}" maxlength="4">
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<input name="password" type="password" id="newPwdPay" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" placeholder="（{{trans("lang.qikuangmm")}}）" maxlength="4">
				</div>
				<!-- <div class="col-xs-3 info">
					* 4位数取款密码
				</div> -->
			</div>
			<div class="form-group">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<input id="newPwd2Pay" name="password_confirmation" type="password" class="form-control" oninput="value=value.replace(/[^\d]/g,'')" placeholder="{{trans("lang.qrxmm")}}" maxlength="4">
				</div>
				<!-- <div class="col-xs-3 info">
					* 4位数取款密码
				</div> -->
			</div>
			<div class="form-group" style="margin-top:35px">
				<label class="col-xs-3 control-label"></label>
				<div class="col-xs-6">
					<button type="button" class="ajax-submit-btn" style="width: 100%;height: 46px;font-size: 16px;color:#fff;font-weight: 800;border: 0px solid #EB5D4D;background: linear-gradient(90deg,#d2b496,#e6ceb6);border-radius: 4px;"  onclick="upPw();">{{trans("lang.quedihng")}}</button>
				</div>
			</div>
		</form>
	</div>
</div>
			</div></div><span></span>
    </div>
</div>
</div> 

   </div>
</div>
</div>
            </div>
        </div>
    </div>
</div>
<script>
    function upPw() {
        var old_password = $('#oddPwdPay').val();
        var password = $('#newPwdPay').val();
        var password_confirmation = $('#newPwd2Pay').val();

        if(!password || !password_confirmation || !old_password){
            chenggong_alert(2,'{{trans("lang.qrztxxx")}}');
            return false;
        }
        if(password!=password_confirmation){
        	 chenggong_alert(2,'{{trans("lang.liangcimimabuyizhi")}}');
        	 return false;
        }
        $.ajax({
            url : "{{ route('member.update_qk_password') }}",
            type : 'POST',
            data : {'old_password':old_password,'password':password,'password_confirmation':password_confirmation},
            success : function (data) {
                console.log(data)
                 if(data.status.errorCode == 0){
                     chenggong_alert(1,'{{trans("lang.xgcg")}}');
                }else{
                	chenggong_alert(2,data.status.msg);
                }
            }
        })
        return false;
    }
</script>
<style>
.top-menu-area{padding: 10px 10px;}
</style>
 @include('web.layouts.footer_q8')
<!-- main end -->
</body>
</html>