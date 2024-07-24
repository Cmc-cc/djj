<!DOCTYPE html>
<!-- saved from url=(0034)/m/recharge -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title><?php echo e($_system_config->site_title); ?></title>
    <meta name="csrf-token" content="YDo4JRuWXJvw0xMWks04m1wWy4YRz4UeJMzdfzr4">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link type="text/css" rel="stylesheet" href="/wap/theme10/css/userinfo.css">
	<link rel="apple-touch-icon" href="/wap/images/iconq.png">
	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
<body class="m_bac">


<div class="nytop">
	<a href="javascript:history.go(-1);" class="fhbtn"></a>
    <h1><?php echo e(trans("lang.chongzhi")); ?></h1>
	<h2><a href="<?php echo e($setting->service_link); ?>"><?php echo e(trans("lang.zxkf")); ?></a></h2>
</div>

<div class="savebox">
                <div class="saveBar">
                	<a href="<?php echo e(route('wap.qq_pay')); ?>">
                        <div class="saveimg"><img src="/new/css/fps.png"></div>
                        <div class="saveTxT">
                            <h2><?php echo e(trans("lang.zsk")); ?></h2>
                        </div>
                        <span></span>
                    </a>
                </div>
	           <!--         <div class="saveBar">-->
            <!--     <a href="/m/usdt">-->
            <!--         <div class="saveimg"><img src="/new/css/xnb.png"></div>-->
            <!--         <div class="saveTxT">-->
            <!--             <h2>虛擬幣支付</h2>-->
            <!--         </div>-->
            <!--         <span></span>-->
            <!--     </a>-->
            <!--</div>           -->
	            <div class="saveBar">
                     <a href="<?php echo e(route('wap.third_bank_pay')); ?>">
                         <div class="saveimg"><img src="/new/css/bld.png"></div>
                         <div class="saveTxT">
                             <h2><?php echo e(trans("lang.bldzz")); ?></h2>
                         </div>
                         <span></span>
                     </a>
                 </div>
                          
	        
             
			 
            
			
</div>    





<script type="text/javascript">

    setTimeout(function(){
        $('#footer5').addClass('cur')
    },350)
	$('.gdbtn').click(function(){
		$('.dhtc').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.contact').click(function(){
		$('.contact_content').css('bottom','.12rem');
		$('.bj').fadeIn();
	})
	$('.qxbtn').click(function(){
		$('.dhtc').css('bottom','-4rem');
		$('.bj').fadeOut();
	})
	$('.qxbtn_2').click(function(){
		$('.contact_content').css('bottom','-10rem');
		$('.bj').fadeOut();
	})
	$('#lang').change(function () {
		var lang =  $("#lang option:selected").attr('href');
		window.location.href = lang;

	})
	$('.fixBottom a').click(function () {
		$(this).addClass('cur').siblings().removeClass('cur');
	})
</script>

<!-- 进入游戏加载 -->
<!--   <link rel="stylesheet" href="/wap/css/loadAnimation.css" />
  <div class="login-wrap" style="display:none">
      <div class="loading-content">
          <svg viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <g id="circle" class="g-circles g-circles--v3">
                  <circle id="12" transform="translate(35, 16.698730) rotate(-30) translate(-35, -16.698730) " cx="35" cy="16.6987298" r="10"></circle>
                  <circle id="11" transform="translate(16.698730, 35) rotate(-60) translate(-16.698730, -35) " cx="16.6987298" cy="35" r="10"></circle>
                  <circle id="10" transform="translate(10, 60) rotate(-90) translate(-10, -60) " cx="10" cy="60" r="10"></circle>
                  <circle id="9" transform="translate(16.698730, 85) rotate(-120) translate(-16.698730, -85) " cx="16.6987298" cy="85" r="10"></circle>
                  <circle id="8" transform="translate(35, 103.301270) rotate(-150) translate(-35, -103.301270) " cx="35" cy="103.30127" r="10"></circle>
                  <circle id="7" cx="60" cy="110" r="10"></circle>
                  <text x="50%" y="55%">进入游戏中</text>
                  <circle id="6" transform="translate(85, 103.301270) rotate(-30) translate(-85, -103.301270) " cx="85" cy="103.30127" r="10"></circle>
                  <circle id="5" transform="translate(103.301270, 85) rotate(-60) translate(-103.301270, -85) " cx="103.30127" cy="85" r="10"></circle>
                  <circle id="4" transform="translate(110, 60) rotate(-90) translate(-110, -60) " cx="110" cy="60" r="10"></circle>
                  <circle id="3" transform="translate(103.301270, 35) rotate(-120) translate(-103.301270, -35) " cx="103.30127" cy="35" r="10"></circle>
                  <circle id="2" transform="translate(85, 16.698730) rotate(-150) translate(-85, -16.698730) " cx="85" cy="16.6987298" r="10"></circle>
                  <circle id="1" cx="60" cy="10" r="10"></circle>
              </g>
          </svg>
      </div>
  </div>
<script>
function js_method() {
$(".login-wrap").css("display", "block");
return true;
}	
</script> -->

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>
<?php echo $__env->make('wap.template.theme10.layouts.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>