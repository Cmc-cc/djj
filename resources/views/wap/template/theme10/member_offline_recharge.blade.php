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
	<link type="text/css" rel="stylesheet" href="/new/css/style.css?v=20230825">
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
		<h1>{{trans("lang.xxhyckjl")}}</h1>
	</div>

	<div style="position: fixed;top:.9rem;width: 100%;height:.68rem;background: #3a3a3a;">
		<a href="/m/daili_money_log"><div class="acse ">{{trans('lang.yjffjl')}}</div></a>
		<a href="/m/member_offline_recharge"><div class="acse as">{{trans('lang.xxhyckjl')}}</div></a>
		<a href="/m/member_offline_drawing"><div class="acse">{{trans('lang.xxhytkjl')}}</div></a>
		<a href="/m/member_offline"><div class="acse">{{trans('lang.xxhy')}}</div></a>
		<a href="/m/member_offline_sy"><div class="acse ">{{trans('lang.hysybb')}}</div></a>
	</div>

	<div class="select-info">
        <div class="select-dw" style="width:23%">
            <span style="line-height:.6rem;font-size:.32rem;color:#fff">選擇日期：</span>
        </div>
        <div class="select-time" style="width:72%;margin-left: 0px;">
			<div style="width:100%;overflow: hidden;">
                <p style="width: 16%" tid="1" class="on" onclick="qiehua(1,this)">{{trans("lang.jinri")}}</p>
                <p style="width: 15.5%" tid="2" onclick="qiehua(2,this)">2{{trans("lang.day")}}</p>
				<p style="width: 15.5%" tid="3" onclick="qiehua(3,this)">3{{trans("lang.day")}}</p>
				<p style="width: 15.5%" tid="5" onclick="qiehua(5,this)">5{{trans("lang.day")}}</p>
                <p style="width: 18%" tid="7" onclick="qiehua(7,this)">7{{trans("lang.day")}}</p>
                <p style="width: 19.5%" tid="30" onclick="qiehua(30,this)">30{{trans("lang.day")}}</p>
            </div>
        </div>
    </div>

    <div class="m_body" style="margin-top:2.42rem">
		<div class="container-fluid gm_main">			
			<div class="content">
				<div class="info-list" style="padding-bottom:15px;">
			
					<div id="list" style="margin-bottom:20px;">
					
					</div>
					
					
					<div class="loading" id="load" style="text-align: center;">{{trans("lang.shanglajiazaigengduo")}}</div>
					<div class="jiazaizhon" style="display:none;"><div  style=" display: flex;justify-content: center;"><img style="width:20px;" src = "/new/img/20210326203301943.gif" />&nbsp;&nbsp;&nbsp;{{trans("lang.jiazaizhong")}}...</div></div>
     
				</div>
    	    </div>     
		</div>
    </div>

 </div>

<style>
	.list{ padding: .2rem 0 0; background: #fff; border-bottom: 1px solid #E5E5E5; font-size:.28rem; margin-top:1px;}
	.list-top{ transition: all .3s; border-bottom: 1px solid #E5E5E5; padding: 0 0.8rem 0.1rem 0.3rem; background: url(/new/img/jt.png) 97% center no-repeat;  background-size: 0.32rem;    position: relative;}
	.list-top1{display: flex; justify-content: space-between; height: 0.8rem; align-items: center; }
	.list-top12{background: url(/new/img/jt2.png) 97% center no-repeat;  background-size: 0.32rem;}
	.list-top1 h5{color: #666; font-size: .34rem; font-weight: bold;}
	.list-top1 p{}
	.list-top a{ display: block; width: 0.45rem; height: 0.45rem; position: absolute; left: 92%; top: 0.57rem;}
	.list-top2{ display: flex; justify-content: space-between; height: 0.6rem; align-items: center;}
	.list-top2 div{}
	.list-top2 div strong{}
	.list-bottom{ padding: 0.2rem 0.4rem; font-size:.26rem; display:none;}
	.list-bottom div{line-height: 1.5; display: flex;}
	.list-bottom div span{}
	.list-bottom div span:last-child{}
	.list-bottom div span:first-child{ display: block; width: 24%;}
	.all-info{ overflow:hidden;}
    .nytop h2 a{text-decoration: unset;}
    .container-fluid{ padding:0;}
    .info-list{    background: transparent}
</style>

<script>	
function qiehuan(_this){
					if($(_this).attr('data-type') == 1){
						$(_this).attr('data-type',2).closest('.list-top').addClass('list-top12').siblings('.list-bottom').show(300)
					}
					else{
						$(_this).attr('data-type',1).closest('.list-top').removeClass('list-top12').siblings('.list-bottom').hide(300)
					}
				}
let type = 1;
				function qiehua(int,_this){
					$('#list').html('');
					getUserList.page = 1;
					type = int
					$(_this).addClass('on').siblings('p').removeClass('on');
					getUserList.isGet = true;
					getUserList.get();
					$(window).scrollTop(0)
				}
				
						/* jQuery类级别插件扩展 */
						$.extend({
							onReachBottom:function (params,callFn) {
								if(!params.container || !params.content){
									console.error('{{trans("lang.queshaocanshu")}}');
									return;
								}
					 
								var $container=params.container,
									$content=params.content,
									distance=params.distance || 30;
					 
								$container.scroll(function() {
									var awayBtm =$content.height() - $container.scrollTop() - $container.height();
									if(awayBtm<=distance){
										callFn && callFn();
									}
								});
							}
						});
					 
						/* 调用插件 */
						$.onReachBottom({
							"container":$(window),  /* 容器对象 */
							"content":$(document),  /* 内容对象 */
							"distance":40           /* 触发事件距离，默认30px */
						},function () {
							/* 插件回调函数 */
							getUserList.get();
						});
					 
						/* 项目方法 */
						var getUserList={
							/* 允许请求 */
							isGet:true,
							/* 条数 */
							rows:10,
							last_page: 0,
							/* 页码 */
							page:1,
							/*获取*/
							get:function () {
								if(!this.isGet){
									return;
								}
								/* 关闭请求条件，避免多次调用 */
								this.isGet=false;
					 
								/* 缓存 this 对象 */
								var _self=this;
					 
								$("#load").hide();
								$('.jiazaizhon').show();
					 
								/* 模拟请求 */
								
								$.ajax({
									url : "/m/member_offline_recharge_api?page="+getUserList.page+'&day='+type,
									type : 'GET',
				
									success : function (data) {
										if(data.status.errorCode == 0){
											
											$('#total').text(data.data.total)
											getUserList.last_page = data.data.data.last_page
											let data2 = data.data.data.data

											if(getUserList.last_page == 0 || (getUserList.last_page == getUserList.page && getUserList.page != 1)){
												_self.isGet = false;
												$("#load").show().text('{{trans("lang.meiyougengduole")}}');
												$('.jiazaizhon').hide();
												return false;
											}
											for(let item of data2){
												let zhuangtai = ``,zhuangtai2 = ``;
												if(item.status == 1){
													zhuangtai = '<strong style="color:orange;">{{trans("lang.dqr")}}</strong>';
					
												}
												else if(item.status == 2){
													zhuangtai = '<strong style="color:green;">{{trans("lang.hkcg")}}</strong>';
						
												}
												else{
													zhuangtai = '<strong style="color:red;">{{trans("lang.hksb")}}</strong>';
											
												}
												$('#list').append(`<div class="list">
														<div class="list-top">
															<div class="list-top1">
																<h5>`+item.account+`</h5>
																<p>`+item.created_at+`</p>
															</div>
															<div class="list-top2">
																<div>{{trans("lang.jine")}}: <strong style="color:red;">$ `+item.money+`</strong></div>
																<div>{{trans("lang.zhuangtai")}}：
																`
																+
																zhuangtai
																+
																`
																</div>
															</div>
															<a href = "javascript:;" onclick="qiehuan(this)" data-type = "1"></a>
														</div>
														<div class="list-bottom">
															<div><span>{{trans("lang.dingdanhao")}}</span><span>`+ item.bill_no+`</span></div>
															<div><span>{{trans("lang.jiaoyishijian")}}</span><span>` + item.created_at +`</span></div>
														
															<div><span>{{trans("lang.jiaoyifangshi")}}</span><span>`+item.account+`</span></div>
															<div><span>{{trans("lang.jiaoyizhuangtai")}}</span> ` + zhuangtai + `</div>
															<div><span>{{trans("lang.jine")}}</span> ` + item.money + `</div>
															<div><span>{{trans("lang.beizhu")}}</span><span>` + (item.fail_reason == null?'' : item.fail_reason) +`</span></div>
														</div>
													</div>`)
									
											}
											
											/* 允许重新加载 */
											$("#load").show();
											$('.jiazaizhon').hide();
					 
											_self.isGet=true;
											_self.page++;
									
										}else{
											chenggong_alert(2,"{{trans('lang.zanghao')}}{{trans('lang.huo')}}{{trans('lang.mima')}}{{trans('lang.cuowu')}}")
										}
									}
								})
								
						
							}
						};
					 
						/* 初始化模拟数据 */
						getUserList.get();


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
});
   
</script>

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>