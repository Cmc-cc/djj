<!DOCTYPE html>
<!-- saved from url=(0031)https://www.cash669.net/m/login -->
<html style="font-size:52px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title><?php echo e($_system_config->site_title); ?></title>
    <meta name="csrf-token" content="wUxifFFxA9pQMvmJZmJILveg0jDGYRe0XRGqwkct">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link type="text/css" rel="stylesheet" href="/wap/theme10/css/userinfo.css">
	<link rel="apple-touch-icon" href="https://www.cash669.net/wap/images/iconq.png">

	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
<!--<body class="m_bac" style="background: url(/new/img/quickRegister_bg2.jpg) no-repeat;background-size: cover;">-->
   <body class="m_bac" style="background: url(../images/quickRegister_bg.jpg) no-repeat 50% #090913;background-size: cover"> 
   

<style>
    * {touch-action: pan-y;}
    input::-webkit-input-placeholder {color: #c3c3c3;}
	#successAlt img { width:20%; margin:0 auto;}
	#screen { position:fixed;left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); display:none;}
	#successAlt { width:240px; z-index:999!important; padding:40px 0;background:rgba(255, 255, 255, 0.95);}
	#bgvideo{position:fixed; left:50%; top:50%;transform: translate(-50%, -50%);  width:340%; z-index:-1;}
</style>

<link rel="stylesheet" type="text/css" href="/new/css/css.css">
<script type="text/javascript" src="/new/css/jquery-1.12.4.min.js"></script>
<script src="/new/css/jquery.Cookie.js"></script>
<script src="/new/css/img_ver.js"></script>


<div class="nytop" style="background:none">
	<a href="javascript:history.go(-1);" class="fhbtn"></a>
	 <h1><a href="#" style="color:#fff">用户登录</a></h1>
	 <h2><a href="<?php echo e(route('wap.register')); ?>">注册</a></h2> 
</div>
<!-- <img src="https://h5static.0am08m.com/assets/v4_entry/quickRegister_logo.png?version=1596036760231" style="width:16%;margin:30px auto"> -->
<div class="loginBox">
	<div class="loginTit" align="center">
	    <img src="<?php echo e($setting->m_site_logo); ?>" style="width:70%"></div>
	<!-- <form id="loginForm"  action="https://www.cash669.net/m/login" method="post"> -->
		<div class="loginBar">
		    
		    <form method="post" onSubmit="return check_login(this)" id="form1" checkby_ruivalidate url="" action="<?php echo e(route('wap.login.post')); ?>" style="margin-top: 30px;">
    			<ul>
    				<li><input type="text" class="user" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.zanghao')); ?> " id="name" name="name"><i class="line"></i><span class="clearBtn"></span></li>
    				<!--<li class="keywords"><input type="password" class="keyword" placeholder="<?php echo e(trans('lang.qingshuru')); ?><?php echo e(trans('lang.mima')); ?>" id="pass" name="password"><i class="line"></i><span class="eye"></span></li>-->
    				
    				<li class="keywords"><input id="pass" name="password" type="password" class="keyword" minlength="6" maxlength="16" placeholder="<?php echo e(trans('lang.qingzaicishuru')); ?><?php echo e(trans('lang.mima')); ?> *"><i class="line"></i><span class="eye"></span></li>
    			</ul>
    		
    			<div class="findpwd"><p class="remberBtns" id="kefu_box"><?php echo e(trans('lang.wjmm')); ?></p><a href="<?php echo e(route('wap.register')); ?>"><?php echo e(trans('lang.ljzc')); ?></a></div>
    			<input type="hidden" name="act" value="login">
    			<button type="submit" class="subBtn"><?php echo e(trans('lang.denglu')); ?></button>
    		</from>
    		
		</div>
	<!--</form> -->
</div>

<style>
	.findpwd p { float:left; color:#888; background:url(/web/css/single/images/icon_uncheck.png) left center no-repeat; padding-left:.4rem; background-size:.25rem auto;}
	.findpwd p.cur {background: url(/web/css/single/images/icon_check.png) left center no-repeat;padding-left:.4rem; background-size:.25rem auto;}
</style>
<script>
	if(localStorage.username && localStorage.password){
        $('#name').val(localStorage.username);
        $('#pass').val(localStorage.password);
    }
    function check_login(obj) {
        $.ajax({
            url : "<?php echo e(route('wap.login.post')); ?>",
            type : 'POST',
            data : $("#form1").serialize(),
            success : function (data) {
                if(data.status.errorCode == 0){
                    localStorage.username = $('#name').val();
                    localStorage.password = $('#pass').val();
                    location.href=data.url;
                }else{
                    alert(data.status.msg);
                }
            }
        })
        return false;
    }
    
    $('#kefu_box').click(function(){
        layer.open({
            content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">招募代理Whats: 67604785</span></div>   <div class="layui-m-layerbtn"><a href="<?php echo e($setting->service_link); ?>" target="_blank"><span yes="" type="1"><?php echo e(trans("lang.zxkf")); ?></span></a></div>'
            ,skin: 'footer'
        });
    })
	  function wechat(){
        layer.open({
            content: '<img src="<?php echo e($setting->wx_pic); ?>" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
    
    $('.clearBtn').click(function(){
		$(this).siblings('input').val('');
		$(this).hide();
	})
	$('.eye').click(function(){
		if($(this).hasClass('cur')){
			$(this).removeClass('cur');
			$(this).css('background','url(/new/img/closeeye.png)');
			$(this).css('background-size','100% 100%');
			$(this).siblings('input').attr('type','password');
		}else{
			$(this).addClass('cur');
			$(this).css('background','url(/new/img/openeye.png)');
			$(this).css('background-size','100% 100%');
			$(this).siblings('input').attr('type','text');
		}
	})
	$('.keyword').focus(function(){
		$(this).css('color','#fff');
		//$(this).parent('li').siblings('keywords').css('background','url(images/key.png) .26rem center no-repeat')
		//$(this).parent('li').siblings('keywords').css('background-size','.32rem auto')
		//$(this).parent('li').css('background','url(/new/img/key.png) .26rem center no-repeat')  //图片是切换的  原 keyon.png
		//$(this).parent('li').css('background-size','.32rem auto')
		if($(this).siblings('.eye').hasClass('cur')){
			$(this).siblings('.eye').css('background','url(/new/img/zhengyan.png)');
			$(this).siblings('.eye').css('background-size','100% 100%');
		}else{
			$(this).siblings('.eye').css('background','url(/new/img/closeeye.png)');
			$(this).siblings('.eye').css('background-size','100% 100%');
		}
	})
	$('.keyword').blur(function(){
		$(this).css('color','#fff');
		//$(this).parent('li').css('background','url(images/key.png) .26rem center no-repeat')
		$(this).parent('li').css('background-size','.32rem auto');
		if($(this).siblings('.eye').hasClass('cur')){
			$(this).siblings('.eye').css('background','url(/new/img/openeye.png)');
			$(this).siblings('.eye').css('background-size','100% 100%');
		}else{
			$(this).siblings('.eye').css('background','url(/new/img/closeeye.png)');
			$(this).siblings('.eye').css('background-size','100% 100%');
		}
	})
</script>


<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>