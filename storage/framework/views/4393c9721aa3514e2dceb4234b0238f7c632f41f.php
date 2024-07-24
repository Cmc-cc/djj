<!DOCTYPE html>
<!-- saved from url=(0035)https://www.cash669.net/m/bind_bank -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title><?php echo e($_system_config->site_title); ?></title>
    <meta name="csrf-token" content="Xq26q21cIIcUe7g0ljuZBMlJCEO4iqIp5lWwUVKn">
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
<body class="m_bac">

    <div class="nytop">
	<a href="javascript:history.go(-1);" class="fhbtn"></a>
    <h1><?php echo e(trans("lang.bdsj")); ?></h1>
	<!-- <h2><a href="">在線客服</a></h2> -->
</div>

	<div class="drawInfor">
		<ul>
			<?php if($member->phone): ?>
			    <li class="usdt"><span> <?php echo e(trans("lang.ybdsjh")); ?>&nbsp;&nbsp;&nbsp;<?php echo e($member->phone); ?></span></li>
			<?php endif; ?>
			<!--<li>-->
			<!--    <span>区号</span>-->
			<!--	<select class="select" name="bank_name" style="color: rgb(153, 153, 153);" id="bank_name">-->
			<!--		<option value="" style="color: rgb(255, 255, 255);">-- <?php echo e(trans("lang.qxz")); ?> --</option>-->
			<!--								<option value="转速快"><?php echo e(trans("lang.zsk")); ?></option>-->
   <!--                                         <option value="USDT">USDT</option>-->
   <!--                                         <option value="中国工商银行"><?php echo e(trans("lang.zggsyh")); ?></option>-->
   <!--                                         <option value="中国建设银行"><?php echo e(trans("lang.zgjsyh")); ?></option>-->
   <!--                                         <option value="中国农业银行"><?php echo e(trans("lang.zgnyyh")); ?></option>-->
   <!--                                         <option value="中国银行"><?php echo e(trans("lang.zgyh")); ?></option>-->
   <!--                                         <option value="中国交通银行"><?php echo e(trans("lang.zgjtyh")); ?></option>-->
   <!--                                         <option value="招商银行"><?php echo e(trans("lang.zsyh")); ?></option>-->
   <!--                                         <option value="广发银行"><?php echo e(trans("lang.gfyh")); ?></option>-->
   <!--                                         <option value="平安银行"><?php echo e(trans("lang.payh")); ?></option>-->
   <!--                                         <option value="浦发银行"><?php echo e(trans("lang.pfyh")); ?></option>-->
   <!--                                         <option value="民生银行"><?php echo e(trans("lang.msyh")); ?></option>-->
   <!--                                         <option value="中国邮政储蓄银行"><?php echo e(trans("lang.zgyz")); ?></option>-->
   <!--                                         <option value="华夏银行"><?php echo e(trans("lang.hxyh")); ?></option>-->
   <!--                                         <option value="深圳发展银行"><?php echo e(trans("lang.szfz")); ?></option>-->
   <!--                                         <option value="中信银行"><?php echo e(trans("lang.zxyh")); ?></option>-->
   <!--                                         <option value="兴业银行"><?php echo e(trans("lang.xyyh")); ?></option>-->
   <!--                                         <option value="光大银行"><?php echo e(trans("lang.gdyh")); ?></option>-->
   <!--                                         <option value="渣打银行"><?php echo e(trans("lang.zdyh")); ?></option>-->
   <!--                                         <option value="汇丰银行"><?php echo e(trans("lang.hfyh")); ?></option>-->
   <!--                                         <option value="中兴银行"><?php echo e(trans("lang.zxyh")); ?></option>-->
   <!--                                         <option value="恒生银行"><?php echo e(trans("lang.hsyh")); ?></option>-->
   <!--                                         <option value="创新银行"><?php echo e(trans("lang.cxyh")); ?></option>-->
			<!--						</select>-->
			<!--</li>-->
			<li><span><?php echo e(trans("lang.sjh")); ?></span><input type="text" name="phone" id="phone" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.sjh')); ?>" autocomplete="off"></li>
			
			<li style="position:relative;">
			    <span><?php echo e(trans("lang.yzm")); ?></span>
			    <input type="number" name="code" id="code" autocomplete="off" placeholder="<?php echo e(trans('lang.qsr')); ?><?php echo e(trans('lang.yzm')); ?>">
			    <input type="button" id="btn" value="<?php echo e(trans('lang.hqyzm')); ?>" class="sty2 yanzhen" style="height: 27px;outline: none;cursor: pointer;position: absolute;top: 13px;right: 20px;">
			</li>
			
			
			
		</ul>
		<input type="button" value="<?php echo e(trans('lang.qr')); ?>" class="subBtn ajax-submit-btn" id="subBtn">
	</div>


<!-- 获取焦点加亮 -->
	<script>
	$('#subBtn').click(function(){
	    $.ajax({
				type:"post",
				url:"<?php echo e(route('wap.bindphone')); ?>",
				data : {phone:$('#phone').val(),code:$('#code').val()},
				success : function (data) {
					if(data.status.errorCode == 0){
                        location.reload();
                    }else{
                        alert(data.status.msg);
                    }

				}
			})
			return false;
	})
	
	
	
	$('.drawInfor input').focus(function(){
		console.log($(this).parent())
		$(this).parent('li').css('border-bottom','1px solid #fff');
		$(this).parent('li').siblings().css('border-bottom','1px solid #292d30')
	})
	$('.drawInfor input').blur(function(){
		$(this).parent('li').css('border-bottom','1px solid #292d30');
		$(this).parent('li').siblings().css('border-bottom','1px solid #292d30')
	})
	
	var countdown=60;   
function settime() {  
    if (countdown == 0) {   
        $('.sty2').attr("disabled", false);      
        $('.sty2').val("<?php echo e(trans('lang.hqyzm')); ?>");   
        countdown = 60;   
        return;  
    } else {   
        $('.sty2').attr("disabled", 'disabled');   
        $('.sty2').val("<?php echo e(trans('lang.cxfs')); ?>(" + countdown + ")");   
        countdown--;   
    }   
setTimeout(function() {   
    settime() }  
    ,1000)   
}
$('.sty2').click(function(){
    if (countdown != 60) {
      return false;
    }
    var phone = $('#phone').val();
    var pattern = /^1[0-9]{10}$/;
    if (!phone) {alert("请输入手机号");return false}
    $.ajax({
        url:"/m/msgcode",
        data:{phone:phone},
        success:function(msg){
            alert(msg.url+msg.status.msg);
            if (msg.status.errorCode==0) {
                settime()
            }else{
                location.href='/m/bindphone';
            }
        }
    });
    return false;
  }) 
</script>

<!-- select下拉框默认option为灰色，选中option颜色为白色 -->
<script>
        $(function() {
            var unSelected = "#999";
            var selected = "#fff";
            $("select").css("color", unSelected);
            $("option").css("color", selected);
            $("select").change(function() {
                var selItem = $(this).val();
                if(selItem == $(this).find('option:first').val()) {
                    $(this).css("color", unSelected);
                } else {
                    $(this).css("color", selected);
                }
            });
        });
    </script>

<script type="text/javascript">
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
	
	
// 	function checkform(obj){
// 			$.ajax({
// 				type:"post",
// 				url:"<?php echo e(route('wap.post_drawing')); ?>",
// 				data : $('#register_form').serialize(),
// 				success : function (data) {
// 					if(data.status.errorCode == 0){
//                         location.href=data.url;
//                     }else{
//                         alert(data.status.msg);
//                     }

// 				}
// 			})
// 			return false;
// 		};
		
		$('#bank_name').change(function(){
		    if($(this).val() == 'USDT'){
		        $('.usdttxt').text('USDT收款地址');
		        $('.usdt').hide();
		    }else{
		        
                $('.usdttxt').text('收款帳號');        
		        $('.usdt').show();
		    }
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