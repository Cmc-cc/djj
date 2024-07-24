<!DOCTYPE html>
<!-- saved from url=(0041)/m/recharge_record -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
    <meta name="csrf-token" content="Xq26q21cIIcUe7g0ljuZBMlJCEO4iqIp5lWwUVKn">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
	<link rel="apple-touch-icon" href="/wap/images/iconq.png">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
<body class="m_bac">

<link type="text/css" rel="stylesheet" href="/new/css/public.css">
<div class="m_container">

	<div class="nytop" style="position: fixed;top:0;width: 100%;">
		<!-- <a href="javascript:history.go(-1);" class="fhbtn"></a> -->
		<h2><a href="/m/userinfo" style="left: .3rem;">返回</a></h2>
		<h1>{{trans("lang.xxhy")}}</h1>
	</div>

	<div style="position: fixed;top:.9rem;width: 100%;height:.68rem;background: #3a3a3a; overflow:hidden;">
		<a href="/m/daili_money_log"><div class="acse ">{{trans('lang.yjffjl')}}</div></a>
		<a href="/m/member_offline_recharge"><div class="acse ">{{trans('lang.xxhyckjl')}}</div></a>
		<a href="/m/member_offline_drawing"><div class="acse">{{trans('lang.xxhytkjl')}}</div></a>
		<a href="/m/member_offline"><div class="acse as">{{trans('lang.xxhy')}}</div></a>
		<a href="/m/member_offline_sy"><div class="acse ">{{trans('lang.hysybb')}}</div></a>
	</div>

	<!--<div class="select-info">-->
 <!--       <div class="select-dw" style="width:23%">-->
 <!--           <span style="line-height:.6rem;font-size:.32rem;color:#fff">選擇日期：</span>-->
 <!--       </div>-->
 <!--       <div class="select-time" style="width:72%;margin-left: 0px;">-->
	<!--		<div style="width:100%;overflow: hidden;">-->
 <!--               <p  style="width: 16%" tid="1" @if($day==1)class="on"@endif onclick="location.href='/m/member_offline?day=1'">今日</p>-->
 <!--               <p style="width: 15.5%" tid="2" @if($day==2)class="on"@endif onclick="location.href='/m/member_offline?day=2'">2日</p>-->
	<!--			<p style="width: 15.5%" tid="3" @if($day==3)class="on"@endif onclick="location.href='/m/member_offline?day=3'">3日</p>-->
	<!--			<p style="width: 15.5%" tid="5" @if($day==5)class="on"@endif onclick="location.href='/m/member_offline?day=5'">5日</p>-->
 <!--               <p style="width: 18%" tid="7" @if($day==7)class="on"@endif onclick="location.href='/m/member_offline?day=7'">7日内</p>-->
 <!--               <p style="width: 19.5%" tid="30" @if($day==30)class="on"@endif onclick="location.href='/m/member_offline?day=30'">30日内</p>-->
 <!--           </div>-->
 <!--       </div>-->
 <!--   </div>-->

    <div class="m_body" style="margin-top:1.72rem">
		<div class="container-fluid gm_main">			
			<div class="content">
				<div class="info-list">
				    @if ($data->total() > 0)
    			    <table class="Hyzx-table mt10 MMain" style="line-height: 1.5;width:100%;">
                        <thead style="background:#eaeaea;">
                        <tr>
                            <th style="width:35%;text-align:center; font-size:14px;">{{trans('lang.jine')}}</th>
                            <th style="width:35%;text-align:center; font-size:14px;">{{trans('lang.user')}}</th>
                            <th style="width:35%;text-align:center; font-size:14px;">{{trans('lang.xingming')}}</th>
                        </tr>
                        </thead>
                        <tbody id="general-msg">
                            
                                @foreach($data as $item)
                                    <tr class="haveRead MColor1" style="display: table-row;">
                                        <td style="text-align:center;">
                                            {{ $item->money }}
                                        </td>
                                        <td style="text-align:center;">{{ $item->name }}</td>
                                        
                                        <td style="text-align:center;">
                                        
                                            {{ $item->real_name }}
                                        </td>
                                    </tr>                
                                @endforeach
        					
                        </tbody>
                        <tfoot id="msgfoot" style="display:none;">
                        
                        </tfoot>
                    </table>
                    <div class="page" style="text-align:center;">{{$data->appends(['day'=>request()->day])->links()}}</div>
                    @else
    			    <div class="dropload-noData">{{trans('lang.zwjl')}}</div>
    			    @endif
				</div>
    			<div class="dropload-down">
    			    
    			</div>
    	    </div>     
		</div>
    </div>

 </div>

<style>
body{
	background:#fff;
	padding-bottom:0;
}
.container-fluid{
	padding:0;
}
table tr{
	line-height: 36px;
	border-bottom:1px solid #f5f5f5;
}
</style>

<script>	


$(function(){
	var lock = false;
	var tabClick = false;
	var page = 1;
    // 每页展示10个
    var size = 10;

	
function GetData({ url , success, error }){
	var api_type = $('option:selected', '#api_type').val()||'';
	var day = '';
	$('.select-time p').each(function(){
		if($(this).hasClass('on')){
			day = $(this).attr('tid');
		}
	});
	
	$(".dropload-noData").remove();
	$(".dropload-down").remove();
	
}

function html(data, add, _day) {
	
	var day = '';
	$('.select-time p').each(function(){
		if($(this).hasClass('on')){
			day = $(this).attr('tid');
		}
	});
	
	arrLen = data.data.length;
	
	for(var i=0; i< arrLen ; i++){
						   /*if(data.data[i].payment_type==1){
								kuangchoumengsongsanqianxia='支付宝扫码';	
							}else if(data.data[i].payment_type==2){
								kuangchoumengsongsanqianxia='微信扫码';	
							}else if(data.data[i].payment_type==3){
								kuangchoumengsongsanqianxia='银行卡转账';	
							}else if(data.data[i].payment_type==4){
								kuangchoumengsongsanqianxia='第三方充值';	
							}else if(data.data[i].payment_type==8){
								kuangchoumengsongsanqianxia='QQ钱包扫码';	
							}else if(data.data[i].payment_type==5){
							   kuangchoumengsongsanqianxia='微信转卡';
						   }else if(data.data[i].payment_type==6){
							   kuangchoumengsongsanqianxia='支付宝转卡';
						   }*/
		if(data.data[i].payment_type==1){
			kuangchoumengsongsanqianxia='支付寶掃碼';
		}else if(data.data[i].payment_type==2){
			kuangchoumengsongsanqianxia='微信掃碼';
		}else if(data.data[i].payment_type==3){
			kuangchoumengsongsanqianxia='銀行卡轉賬 / 轉數快';
		}else if(data.data[i].payment_type==4){
			kuangchoumengsongsanqianxia='在線支付';
		}else if(data.data[i].payment_type==5){
			kuangchoumengsongsanqianxia='微信轉卡';
		}else if(data.data[i].payment_type==6){
			kuangchoumengsongsanqianxia='支付寶轉卡';
		}else if(data.data[i].payment_type==8){
			kuangchoumengsongsanqianxia='QQ钱包扫码';
		}else if(data.data[i].payment_type==10){
			kuangchoumengsongsanqianxia='Payme (HK)';
		}else if(data.data[i].payment_type==11){
			kuangchoumengsongsanqianxia='Alipay (HK)';
		}else if(data.data[i].payment_type==12){
			kuangchoumengsongsanqianxia='Tap&Go (HK)';
		}else if(data.data[i].payment_type==13){
			kuangchoumengsongsanqianxia='TNG (HK)';
		}else if(data.data[i].payment_type==14){
			kuangchoumengsongsanqianxia='便利店增值 (HK)';
		}else if (data.data[i].payment_type==15){
			kuangchoumengsongsanqianxia='人工充值';
		}else if (data.data[i].payment_type==18){
			kuangchoumengsongsanqianxia='虛擬幣';
		}
							var status = data.data[i].status;
							if (status == 1)
								status = '<span style="color:#3535ca">等待審核</span>';
							else if(status == 2)
								status = '<span style="color:#336600">充值成功</span>';
							else if(status ==3)
								status = '<span style="color:#ed1818">充值失敗</span>'
							var yuanyin=data.data[i].fail_reason;
							if(yuanyin==''){
								yuanyin='';
							}

						   var str = '<div class="info-item">';
							str +='			<div class="basic-info">';
							str +='				<h2>';
							str +='					<p>'+kuangchoumengsongsanqianxia+'</p>';
							str +='					<span>'+data.data[i].hk_at+'</span>';
							str +='				</h2>';
							str +='				<div>';
							str +='					<p>';
							str +='						 交易金額: <span>$ '+data.data[i].money+'</span>';
							str +='					</p>';
							str +='					<p>';
							str +='					   狀態: <span>'+status+'</span>';
							str +='					</p>';
							str +='				</div>';
							str +='			</div>';
							str +='			<div class="detailed-info">';
							str +='				<h3>';
							str +='					<p>訂單號</p>';
							str +='					<span> '+data.data[i].bill_no+'</span>';
							str +='				</h3>';
							str +='				<h3>';
							str +='					<p>交易時間</p>';
							str +='					<span>'+data.data[i].hk_at+'</span>';
							str +='				</h3>';
							str +='				<h3>';
							str +='					<p>交易方式</p>';
							str +='					<span> '+kuangchoumengsongsanqianxia+'</span>';
							str +='				</h3>';
							str +='				<h3>';
							str +='					<p>交易金額</p>';
							str +='					<span>'+data.data[i].money+'</span>';
							str +='				</h3>';
							str +='				<h3>';
							str +='					<p>交易狀態</p>';
							str +='					<span> '+status+'</span>';
							str +='				</h3>';
							str +='				<h3>';
							str +='					<p>備註</p>';
							str +='					<span style="color:#ed1818">'+yuanyin+'</span>';
							str +='				</h3>';
							str +='			</div>';
							str +='		</div>';
						
                           $(".info-list").append(str);
						}
}

	// scroll event
//     $(window).scroll(function(){
		
//         // scroll at bottom
// 		if( tabClick ) {
// 			return;
// 		}
//         if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 60 )) {
			
// 			if( lock ) {
// 				return;
// 			}
// 			$(".content").append('<div class="dropload-load"><span class="loading"></span>加載中-...</div>')
// 			lock = true;
//             page++;
			
// 			var day = '';
// 			$('.select-time p').each(function(){
// 				if($(this).hasClass('on')){
// 					day = $(this).attr('tid');
// 				}
// 			});
			
// 			GetData({
//                 url: "",
//                 success: function(data) {
// 					$(".dropload-load").remove();
					
//                     var arrLen = data.data.length;
					
//                     if(arrLen < 10){
						
// 						lock = true;
// 						$(".dropload-down").remove();
// 						$(".content").append('<div class="dropload-down"><div class="dropload-noData">暫無數據</div></div>')
						
//                     }else {
						
// 						lock = false;
// 					}
					
//                     // 为了测试，延迟1秒加载
//                     // 插入数据到页面，放到最后面
// 					$(".dropload-load").remove();
// 					html(data, true, day);
                        
//                 },
//                 error: function() {
//                     alert('Ajax error!');
//                     // 即使加载出错，也得重置
//                     me.resetload();
//                 }
//             })
//         }
//     });


// 		var lodTab = "";
//         $("body").on('click','.select-time p',function(){ 
			
//             page = 1;			
			
// 				tabClick = true;
// 				  // 重置页数，重新获取loadDownFn的数据
// 				$(this).addClass("on").siblings().removeClass("on");
// 				$(".info-list").html(" ");
// 			$(".dropload-load").remove();
// 				 $(".content").append('<div class="dropload-load"><span class="loading"></span>加載中-...</div>')
// 				$(".dropload-noData").remove();
// 				 $(".dropload-down").remove();
// 				 var day = '';
// 				$('.select-time p').each(function(){
// 					if($(this).hasClass('on')){
// 						day = $(this).attr('tid');
// 					}
// 				});
// 				if( day != lodTab ) {
// 					lodTab = day;
// 				}
				
// 				 GetData({
//                         url: "",
//                         success: function(data) {
//                             // 为了测试，延迟1秒加载

								
// 								 // 为了测试，延迟1秒加载
								
// 									$(".dropload-load").remove();
// 									$(".dropload-down").remove();
// 									if( data.data.length < 10 ) {
// 										lock = true;
// 										$(".content").append('<div class="dropload-down"><div class="dropload-noData">暫無數據</div></div>')
// 									}else {
// 										lock = false;
// 									}
// 									tabClick = false;
// 									if( lodTab == day ) {
// 										$(".info-list").html(" ");
// 									}
// 									html(data, true, day);
									
//                         },
//                         error: function() {
//                             alert('Ajax error!');
//                             // 即使加载出错，也得重置
//                             me.resetload();
//                         }
//                     });
// 				getTotal();
			  
			 
//          })  

//         $("body").on('click','.basic-info',function(){  
// 		   if($(this).hasClass('show')){
// 			  	 $(this).siblings(".detailed-info").slideUp();
// 				 $(this).removeClass('show')
// 			  }else{
// 				 	$(this).siblings(".detailed-info").slideDown();
// 				 $(this).addClass('show')
// 				 }
//          })

// 		$('.select-time p').eq(0).click()		 
});
   </script>
   


<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js?t=100"></script>


</body></html>