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
    	<script type="text/javascript" src="/wap/js/layer.js"></script>
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
					<img src = "/new/img/dylogo.png" class />
					
				</div>
                <h1 class="">{{trans('lang.denglu')}}<img src="{{trans('lang.png')}}" onclick="$('#yuyan').css({'display':'flex'});"/></h1>
                <div class="line1"></div>
                <input type="hidden" value="" name="recaptcha_response" id="recaptchaResponse">
                <form id="loginForm" oncontextmenu="return false;">
                    <input type="hidden" name="type" value="pc">

						<div class="input-div">
							<img src="../images/icon_user1.png" />
							<input type="text" id="account" name="name" placeholder="{{trans('lang.zanghao')}}">
				
						</div>
						
						<div class="input-div">
							<img src="../images/icon_password.png" />
							<input type="password" id="password"  name="password" placeholder="{{trans('lang.mima')}}"   class="form-underline">
						</div>
		
						<div class="input-div">
							<img src="../images/sj.png" />
							<input type="test" id="captcha" name="captcha" placeholder="{{trans('lang.yzm')}}" class="input_tip input_tip_45">
							<img id="verifi" onclick="re_captcha()"  src="{{ URL('kit/captcha/1') }}">
						</div>
						
						

						<div class="nav-btn">
						<a class="" data-toggle="cs" style="color: #c3c3c3;"  onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')" oncontextmenu="return false;">{{trans("lang.wjmm")}}</a>
							|
                             <a id="login" class="btn-member" href="/r">{{trans("lang.user")}}{{trans("lang.zhuce")}}</a>
						</div>
						
                        <input id="registionSubmit" class="regi-btn btn"   onclick="doLogin();" value="{{trans('lang.denglu')}}"
                                                   style="text-align: center;" readonly>
                                                   
                                                   
                        <div class="login_img">
                            <img src = "/images/sponsor.png" />
                        </div>
       
					
					
                </form>
            </div>
        </div>
     
    </div>
</div>
<div id="yuyan" >
	<ul>
		<li class="lang on" data-lang="ft">中文(繁體)</li>
		<li class="lang" data-lang="zh_cn">中文(简体)</li>
		<li class="lang" data-lang="en">English</li>
	</ul>
</div>
 <script>
 	$(function(){
			if(localStorage.lang){
				$(".lang").each(function(){
				if($(this).attr('data-lang')==localStorage.lang){
					$(".lang").removeClass('on');
					$(this).addClass('on');
				}
			});
		}
		
    	if(localStorage.username && localStorage.password){
            $('#account').val(localStorage.username);
            $('#password').val(localStorage.password);
        }
	})
 $(document).on('click', '#yuyan', function(event) {
	$(this).hide();
  	event.preventDefault();
  	/* Act on the event */
  });


$(document).on('click', '#yuyan ul li', function(event) {
	console.log($(this).text());
  	event.preventDefault();
  	/* Act on the event */
  	  	layer.open({type: 2});
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            success:function(res){
            	localStorage.lang = lang;
                location.reload();
            }
        })
        return false;
  });
  
  
	function re_captcha() {
		$url = "{{ URL('kit/captcha') }}";
		$url = $url + "/" + Math.random();
		document.getElementById('verifi').src = $url;
	}
	 function doLogin(){
		if (!$("#account").val()) {

			chenggong_alert(2,"{{trans('lang.qingshuru')}}{{trans('lang.zanghao')}}");
			return false;
		}
		if (!$("#password").val()) {
			chenggong_alert(2,"{{trans('lang.qingshuru')}}{{trans('lang.mima')}}");
			return false;
		}
		if (!$("#captcha").val()) {
			chenggong_alert(2,"{{trans('lang.qingshuru')}}{{trans('lang.yzm')}}");
			return false;
		}
		$.ajax({
			url : "{{ route('member.login.post') }}",
			type : 'POST',
			data : $("#loginForm").serialize(),
			success : function (data) {
				if(data.status.errorCode == 0){
					window.location.href = "/";
				}else{
					chenggong_alert(2,data.status.msg);
				}
			}
		})
		return false;
	}
</script>
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
	padding:calc((100vh - 650px)/2) 0 20px;
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
	height: 40px;
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

</script>
</body>
</html>