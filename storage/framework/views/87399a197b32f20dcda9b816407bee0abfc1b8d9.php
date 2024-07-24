<!DOCTYPE html>
<!-- saved from url=(0029)/m/nav -->
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
		<h1>個人信息</h1>
	</div>
	<div id="new_grxx">
	    <h5 class="new_grxx_h5"><span>銀行卡綁定</span></h5>
	     
	    <?php if(!$_member->bank_name): ?>
	    <div class="new_grxx_add" onclick="location.href = '/m/bind_bank'" style="line-height: 3rem;">+添加银行卡</div>
	    <div class="new_grxx_div" style="border-bottom: 1px solid #292d30;">
	        <p>實名認證</p>
	        <span>未認證</span>
	    </div>
         <?php else: ?> 
         <div class="new_grxx_add" style="background: linear-gradient(to right, #e92976 0%, #9a4aeb 100%) !important; padding-top:.5rem; height:2.5rem;">
             <p class="new_grxx_add_p"><img src="/new/img/yhk.png?v=20230830" /></p>
             <h5><?php echo e(str_repeat('*', strlen($_member->bank_card) - 3) . substr($_member->bank_card, -3)); ?></h5>
             <h6>	        <?php
	        
	        $name = $_member->bank_username; // 假设姓名是王佳美
            
            if (mb_strlen($name, 'utf-8') === 2) {
                $maskedName = mb_substr($name, 0, 1) . '*';
            } elseif (mb_strlen($name, 'utf-8') > 3) {
                $maskedName = mb_substr($name, 0, 1) . '*' . mb_substr($name, -1);
            } else {
                $maskedName = $name;
            }
            echo $maskedName;
?></h6>
         </div>
         
         <div class="new_grxx_div" style="border-bottom: 1px solid #292d30;">
	        <p>實名認證<i>
	        <?php
	        
	        $name = $_member->bank_username; // 假设姓名是王佳美
            
            if (mb_strlen($name, 'utf-8') === 2) {
                $maskedName = mb_substr($name, 0, 1) . '*';
            } elseif (mb_strlen($name, 'utf-8') > 3) {
                $maskedName = mb_substr($name, 0, 1) . '*' . mb_substr($name, -1);
            } else {
                $maskedName = $name;
            }
            echo $maskedName;
?>
	        
	        </i></p>
	        <span class="on">已認證</span>
	    </div>
         <?php endif; ?>
	     <?php if($_member->phone): ?>
	    <div class="new_grxx_div">
	        <p>手機號綁定<i><?php echo e(substr($_member->phone, 0, 2)); ?>******<?php echo e(substr($_member->phone, -1)); ?></i></p>
	        <span class="on">已綁定</span>
	    </div>
	    <?php else: ?> 
	    <div class="new_grxx_div" onclick="location.href='/m/bindphone'">
	        <p>手機號綁定</p>
	        <span>未綁定</span>
	    </div>
	    <?php endif; ?>
	</div>
	



<style>
#new_grxx{padding:.1rem .3rem; color: #fff;}
.new_grxx_h5{ font-size:.32rem;}
.new_grxx_h5 span{position:relative;line-height: 0.7rem;display: inline-block;}
.new_grxx_h5 span:after{content: ''; position: absolute; left: 0;bottom: 0; width: 100%; height: 2px; background: linear-gradient(to right, #eb5d4d 0%, #fb2464 100%);}
.new_grxx_add{ width:70%; margin:.6rem auto;background: rgba(42,48,52);border-radius: 0.2rem; text-align: center;  height:3rem;}
.new_grxx_div{border-bottom: 1px solid #292d30; padding:.4rem 0 .3rem; font-size: .3rem;display: flex; justify-content: space-between; align-items: center;}
.new_grxx_add_p{ width:.6rem; height:.6rem; border-radius:.6rem; background:#fff; display: flex;align-items: center;justify-content: center; margin:0 0 .3rem .4rem;}
.new_grxx_add_p img{ width:.46rem;}
.new_grxx_add h5{ font-size:.4rem; padding: 0 .4rem; text-align:left; margin-bottom:.3rem;}
.new_grxx_add h6{ font-size:.3rem; padding: 0 .4rem; text-align:left;}

.new_grxx_div p{}
.new_grxx_div p i{color:#888; font-size:.28rem; display:block; padding-top:.2rem;}
.new_grxx_div span{ color:red;font-weight: bold;}
.new_grxx_div span.on{color: green;}
</style>

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>