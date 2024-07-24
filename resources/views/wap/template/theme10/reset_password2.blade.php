<!DOCTYPE html>
<!-- saved from url=(0035)https://www.cash669.net/m/bind_bank -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title }}</title>
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
    <h1>{{trans("lang.xgzfmm")}}</h1>
	<!-- <h2><a href="">在線客服</a></h2> -->
</div>

	<div class="drawInfor">
		<ul>

			<li><span>{{trans("lang.jmm")}}</span><input type="password" name="old_password" id="old_password" placeholder="{{trans('lang.qsr')}}{{trans('lang.jmm')}}" autocomplete="off"></li>
			<li><span>{{trans("lang.xmm")}}</span><input type="password" name="password" id="password" placeholder="{{trans('lang.qsr')}}{{trans('lang.xmm')}}" autocomplete="off"></li>
			<li><span>{{trans("lang.qrmm")}}</span><input type="password" name="password_confirmation" id="password_confirmation" placeholder="{{trans('lang.qsr')}}{{trans('lang.qrmm')}}" autocomplete="off"></li>
			@if($setting->sms_message)
    			<li style="position:relative;">
    			    <span>{{trans("lang.yzm")}}</span>
    			    <input type="number" name="code" id="code" autocomplete="off" placeholder="{{trans('lang.qsr')}}{{trans('lang.yzm')}}">
    			    <input type="button" id="btn" value="{{trans('lang.hqyzm')}}" class="sty2 yanzhen" style="height: 27px;outline: none;cursor: pointer;position: absolute;top: 13px;right: 20px;">
    			</li>
			@endif
			
			
		</ul>
		<input type="button" value="{{trans('lang.qr')}}" class="subBtn ajax-submit-btn" id="subBtn">
	</div>


<!-- 获取焦点加亮 -->
	<script>
	$('#subBtn').click(function(){
	    $.ajax({
				type:"post",
				url:"{{ route('wap.reset_qk_password') }}",
				data : {old_password:$('#old_password').val(),password:$('#password').val(),password_confirmation:$('#password_confirmation').val(),code:$('#code').val()},
				success : function (data) {
				    alert(data.status.msg);
					if(data.status.errorCode == 0){
                        location.href=data.url;
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
        $('.sty2').val("{{trans('lang.hqyzm')}}");   
        countdown = 60;   
        return;  
    } else {   
        $('.sty2').attr("disabled", 'disabled');   
        $('.sty2').val("{{trans('lang.cxfs')}}(" + countdown + ")");   
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
    var pattern = /^1[0-9]{10}$/;

    $.ajax({
        url:"/m/msgcode",
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
// 				url:"{{ route('wap.post_drawing') }}",
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

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js?v=20230831"></script>


</body></html>