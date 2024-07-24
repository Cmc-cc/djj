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
	<a href="javascript:window.location.href='/m/userinfo';" class="fhbtn"></a>
    <h1>提现</h1>
	<!-- <h2><a href="">在線客服</a></h2> -->
	<script>
	    <?php
	    if(!$_member->bank_card){
	        echo 'alert("請先綁定銀行");window.location.href = "/m/userinfo2";';
	    }
	    ?>
	</script>
</div>
    
    <style>
    .drawInfor{ color:#FFF;}
        .drawInfor-top{}
        .drawInfor-top h5{font-size: .3rem;  line-height: .8rem; height:.9rem;}
        .drawInfor-top1{display: flex;    justify-content: space-between;align-items: center}
        .drawInfor-top1 span{background: url(/new/img/a46.png) center no-repeat;
    width: 0.56rem;
    height: 0.56rem;
    text-align: center;
    line-height: .56rem;
    color: #000;
    font-size: .4rem;
    background-size: contain;}
        .drawInfor-top1 h4{    width: 55%;    font-size: .5rem;
    font-weight: bold;}
        .drawInfor-top1 i{     background: linear-gradient(to bottom, #eb5d4d 0%, #fb2464 100%) !important;
    display: block;
    line-height: .56rem;
    height: 0.56rem;
    width: 2rem;
    text-align: center;
    border-radius: 0.7rem;}
    .usdttxt2{}
    .usdttxt2 p{width:.6rem; height:.6rem; border-radius:.6rem; background:#fff; display: flex;align-items: center;justify-content: center;}
    .usdttxt2 p img{ width:.46rem; margin:0;}
    .drawInfor li{display: flex;align-items: center;}
    </style>
	<div class="drawInfor">
	    <div class="drawInfor-top">
	        <h5>賬戶餘額</h5>
	        <div class="drawInfor-top1">
	            <span>$</span>
	            <h4 class="member_money">{{$member->money}}</h4>
	            <i id="trans_all">資金回收</i>
	        </div>
	    </div>
		<ul>
		    <li class="usdttxt2"><span class="usdttxt">收款銀行</span><p><img src="/new/img/yhk.png" /></p>&nbsp;&nbsp;({{$_member->bank_card}})&nbsp;&nbsp;<?php
	        
	        $name = $_member->bank_username; // 假设姓名是王佳美
            
            if (mb_strlen($name, 'utf-8') === 2) {
                $maskedName = mb_substr($name, 0, 1) . '*';
            } elseif (mb_strlen($name, 'utf-8') > 3) {
                $maskedName = mb_substr($name, 0, 1) . '*' . mb_substr($name, -1);
            } else {
                $maskedName = $name;
            }
            echo $maskedName;
?></li>
		    <li><span class="usdttxt">取款金額</span><input type="number" name="money" id="money" placeholder="請輸入取款金額" autocomplete="off"></li>
		    <li><span class="usdttxt">取款密碼</span><input type="password" name="qk_pwd" id="qk_pwd" placeholder="請輸入取款密碼" autocomplete="off"></li>
		    
		    <li><span class="usdttxt">尚未打碼量</span><span style="font-size: 14px;
    font-weight: bold;
    margin-left: 10px;
}">{{$member->ml_money}}</span></li>
		</ul>
		<input type="button" value="{{trans('lang.qr')}}" class="subBtn ajax-submit-btn" id="subBtn" style="background:linear-gradient(to right, #cead8b , #dec7a7)">
		<div style="color:#fff;line-height:2" class="desc">{{trans("lang.tkts")}}</div>
	</div>



<!-- 获取焦点加亮 -->
	<script>
	$('#trans_all').click(function (){
				_this = $(this);
				_this.html('回收中...');
				// $('.allButton').attr('disabled',true);
				// $('.gamecode').each(function(){
                    var that=$(this);
                    $.ajax({
                            url:'/member/transfer_all',
                            type:'post',
                            data:{api_name:that.data('code'),transfer_type:1},
                            success:function(res){
                                $.ajax({
                                    url:'/m/membermoney',
                                    success:function(res){
                                        $('.member_money').text(res.money)
                                        
                                    }
                                })
                                setTimeout(function(){
                        		    _this.html('資金回收');
                        		},1000)
                            }
                        })
        // 		});	
        		
		})
		
	$('#subBtn').click(function(){
	    $.ajax({
				type:"post",
				url:"{{ route('wap.post_drawing') }}",
				data : {code:$('#code').val(),qk_pwd:$('#qk_pwd').val(),money:$('#money').val(),bank_card:'{{$_member->bank_card}}',name:'{{$_member->name}}',bank_name:'{{$_member->bank_name}}'},
				success : function (data) {
					if(data.status.errorCode == 0){
                        location.href=data.url;
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