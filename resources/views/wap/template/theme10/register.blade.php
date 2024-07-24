<!DOCTYPE html>
<!-- saved from url=(0034)https://www.cash669.net/m/register -->
<html style="font-size:52px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
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
<!--<body class="m_bac" style="background: url(/new/img/quickRegister_bg1.jpg) no-repeat 50% #090913;background-size: cover;">-->
 <body class="m_bac" style="background: url(../images/quickRegister_bg.jpg) no-repeat 50% #090913;background-size: cover"> 

<link rel="stylesheet" type="text/css" href="/new/css/css.css">
<script type="text/javascript" src="/new/css/jquery-1.12.4.min.js"></script>
<script src="/new/css/img_ver.js"></script>
<style>
* {touch-action: pan-y;}
.loginBar1 li:nth-child(1){ background:url(/new/img/user.png) .26rem center no-repeat  #2b2f33; background-size:.32rem auto;}
input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
  color: #fbfbfb;;
}

input::-webkit-input-placeholder {
        color: #c3c3c3;
    }
	#successAlt img { width:20%; margin:0 auto;}
	#screen { position:fixed;left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5); display:none;}
	#successAlt { width:240px; z-index:999!important; padding:40px 0;background:rgba(255, 255, 255, 0.95);}
	#bgvideo{position:fixed; left:50%; top:50%;transform: translate(-50%, -50%);  width:340%; z-index:-1;}
	select{outline: none;-webkit-appearance: none;}
</style>


<div class="nytop" style="background:none">
  <a href="javascript:history.go(-1);" class="fhbtn"></a>
  <h2><a href="{{ route('wap.login') }}">登录</a></h2> 
  <!--<h2><a href="{{ $_system_config -> app_link }}" target="_blank">{{trans('lang.xzapp')}}</a></h2>-->
</div>
<div class="loginBox">
    <div class="loginBar1">
        <form method="post" action="{{ route('wap.register.post') }}"  onSubmit="return check_form(this)" id="form1">
        	<ul>
            	<li><input id="regUsername" name="name" type="text" class="user" required="required" minlength="6" maxlength="9" placeholder="{{trans('lang.zanghao')}}"><i class="line"></i><span class="clearBtn"></span></li>
    			<!-- <li><input id="realname" name="real_name" type="text" class="user"  maxlength="6" placeholder="真实姓名(与银行卡姓名相同) *><i class="line"></i><span class="clearBtn"></span></li> -->
                <li class="keywords"><input id="regUserpwd" name="password" required="required" type="password" class="keyword" minlength="6" maxlength="16" placeholder="{{trans('lang.qingshuru')}}{{trans('lang.mima')}}"><i class="line"></i><span class="eye"></span></li>
                <li class="keywords"><input id="regUserSurepwd" name="password_confirmation"  required="required" type="password" class="keyword" minlength="6" maxlength="16" placeholder="{{trans('lang.qingzaicishuru')}}{{trans('lang.mima')}} *"><i class="line"></i><span class="eye"></span></li>
                
                <li style="background:url('/new/img/key.png') 0.26rem center / 0.32rem no-repeat #2b2f33;" class="keywords"><input id="regUserWithdrawalsPwd" name="qk_pwd" required="required"  type="password" class="keyword" minlength="6" maxlength="16" placeholder="{{trans('lang.qingshuru')}}{{trans('lang.qkmm')}} *"><i class="line"></i><span class="eye"></span></li>
                
                <!--<li style="background:url('/new/img/user.png') 0.26rem center / 0.32rem no-repeat #2b2f33;"><input id="username" name="username" type="text" class="user"  placeholder="請輸入真實英文姓名"><i class="line"></i><span class="clearBtn"></span></li>-->
                @if($setting->is_real_name_1)
    		        <li style="background:url('/new/img/user.png') 0.26rem center / 0.32rem no-repeat #2b2f33;"><input id="real_name" name="real_name" type="text" class="user"  @if($setting->is_real_name_2)   required="required" @endif  placeholder="請輸入真實英文姓名"><i class="line"></i><span class="clearBtn"></span></li>
                @endif
                
                 @if($setting->is_phone_1)
    			<li style="background:url('/new/img/a44a2.png') 0.26rem center / 0.32rem no-repeat #2b2f33;"><input id="phone" name="phone" type="tel" class="user" maxlength="16"   @if($setting->is_phone_2)   required="required" @endif  placeholder="{{trans('lang.qingshuru')}}{{trans('lang.sjh')}}*"><i class="line"></i></li>
                <!--<li style="background:url('/new/img/a44a2.png') 0.26rem center / 0.32rem no-repeat #2b2f33;"><input id="code" name="code" type="text" class="user"  @if($setting->is_phone_2)   required="required" @endif placeholder="{{trans('lang.qingshuru')}}{{trans('lang.yzm')}}*" style="width: 50%;"><i class="line"></i><input type="button" id="btn" value="{{trans('lang.hqyzm')}}" class="sty2 yanzhen"  style="width: 50%;"></li>-->
                @else
                	<!--<li style="background:url('/new/img/a44a2.png') 0.26rem center / 0.32rem no-repeat #2b2f33;"><input id="phone" name="phone" type="tel" class="user" maxlength="8" placeholder="{{trans('lang.qingshuru')}}{{trans('lang.sjh')}}*"><i class="line"></i></li>-->
                @endif
                
                @if($setting->is_email_1)
    		        <li style="background:url('/new/img/email.png') 0.23rem center / 0.42rem no-repeat #2b2f33;"><input id="email" name="email" type="text" class="user"  @if($setting->is_email_2)   required="required" @endif  placeholder="请输入邮箱"><i class="line"></i><span class="clearBtn"></span></li>
                @endif
                
                @if($setting->is_qq_1)
    		        <li style="background:url('/new/img/qq.png') 0.23rem center / 0.42rem no-repeat #2b2f33;"><input id="qq" name="qq" type="text" class="user"  @if($setting->is_qq_2)   required="required" @endif  placeholder="请输入QQ号"><i class="line"></i><span class="clearBtn"></span></li>
                @endif
                
                @if($setting->is_weixin_1)
    		        <li style="background:url('/new/img/weixin.png') 0.15rem center / 0.55rem no-repeat #2b2f33;"><input id="weixin" name="weixin" type="text" class="user"  @if($setting->is_weixin_2)   required="required" @endif  placeholder="请输入微信号"><i class="line"></i><span class="clearBtn"></span></li>
                @endif
                
                @if($setting->is_regtj_1)
    		        <li style="background:url('/new/img/user.png') 0.26rem center / 0.32rem no-repeat #2b2f33;"><input id="t_name" name="t_name" type="text" class="user"  @if($setting->is_regtj_2)   required="required" @endif  placeholder="請輸入推荐人"><i class="line"></i><span class="clearBtn"></span></li>
                @endif
                
             
                
                
               
                
    			<!--<li class="bizhong">-->
    			<!--	<select name="currency_code" class="bizhong">-->
    			<!--							<option value="zh_hk">港币</option>-->
    			<!--						</select>-->
    			<!--	<i class="line"></i>-->
    			<!--	<span class="xiala"></span>-->
    			<!--</li>-->
            </ul>
        
		<div style="text-align: center;font-size: .28rem;"><a href="/m" style="color:#d2cfcf">返回首頁</a></div>
		<!--<span style="display: none;"><input id="t_name" name="t_name" type="text" placeholder="介绍人(选填)"></span>-->
		<!--<input id="i_code" type="hidden" name="i_code" value="">-->
         <button type="submit" class="subBtn">註冊</button>
         </form>
    </div>
	<!--</form>-->
</div>

<script>
	$('#screen').click(function(){
		$('#imgVer').fadeOut();
		$('#screen').fadeOut();
	})
	$('#zcname').blur(function(){
		var nameVal = $(this).val();
		var sign;
		$.ajax({
			async : false,
			url : 'https://www.cash669.net/register_jianche',
			type : 'post',
			dataType : 'json',
			data : {
				type : 'account',
				account : nameVal
			},
			success : function (data) {
				if(data.success == false){
					sign = false;
				}else{
					sign = true;
				}
			}
		});
		//console.log(sign);
		if(sign == false) {
			layer.open({
				content : '用户名已经存在',
				btn : ['确定']
			});
			return false;
		}else{
			return true
		}
	})
	
	$('.user').focus(function(){
		//$(this).parent('li').css('background','url(images/user.png) .26rem center no-repeat')   //图片是切换的  原 useron.png
		//$(this).parent('li').siblings().css('background','url(/new/img/key.png) .26rem center no-repeat')
		//$(this).parent('li').siblings().css('background-size','.32rem auto')
		//$(this).parent('li').css('background-size','.32rem auto')
		$(this).css('color','#fff');
	})
	$('.user').change(function(){
		var uval = $(this).val().length;
		if(uval>0){
			$('.clearBtn').show();
		}
	})
		$('.clearBtn').click(function(){
		$(this).siblings('input').val('');
		$(this).hide();
	})
	$('.user').blur(function(){
		$(this).css('color','#fff');
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
    var phone = $('#phone').val();
    var pattern = /^1[0-9]{10}$/;
    if (!phone) {alert("请输入手机号");return false}
    if(phone.length != 8){
            alert("手机号格式不正确");
            return false;
    }
    $.ajax({
        url:"/m/rmsgcode",
        data:{phone:phone},
        success:function(msg){
            alert(msg.url+msg.status.msg);
                settime()
        }
    });
    return false;
  })
  
  
	function check_form(obj) {
       $.ajax({
		   url : "{{ route('wap.register.post') }}",
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
            content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">招募代理Whats: 67604785</span></div>  {{--<div class="layui-m-layerbtn"><span yes="" type="1" onclick="wechat()">{{trans("lang.weixin")}}</span></div> --}} <div class="layui-m-layerbtn"><a href="{{$setting->service_link}}" target="_blank"><span yes="" type="1">{{trans("lang.zxkf")}}</span></a></div>'
            ,skin: 'footer'
        });
    })
    function wechat(){
        layer.open({
            content: '<img src="{{$setting->wx_pic}}" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
    
    
	$('.loginBar1 .eye').click(function(){
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
	 imgVer({
            el:'$("#imgVer")',
            width:'260',
            height:'160',
            img:[
                '/web/css/single/yanzheng/ver.png',
                '/web/css/single/yanzheng/ver-1.png',
                '/web/css/single/yanzheng/ver-2.png',
                '/web/css/single/yanzheng/ver-3.png'
            ],
            success:function () {

				var name = $("input[name=name]").val();
				var pass = $("input[name=password]").val();
				var password_confirmation = $("input[name=password_confirmation]").val();
				var currency_code = $("select[name=currency_code]").val();
				var i_code = $('#i_code').val();
				var t_name = $('#t_name').val();
				var phone = $("input[name=phone]").val();
				var sms_code = $('input[name=sms_code]').val();

				$.ajax({
					url : 'https://www.cash669.net/m/register',
					type : 'post',
					dataType : 'json',
					data : {
						name:name,
						password:pass,
						currency_code:currency_code,
						password_confirmation:password_confirmation,
						i_code : i_code,
						t_name : t_name,
						phone : phone,
						sms_code : sms_code
					},
					success : function (data) {
						var html = '';
						var obj = JSON.parse(data.status.msg);

						console.log(data.status.errorCode);
						if (data.status.errorCode == 0) {
						$(".ver-tips").html('<i style="background-position:-4px -1207px;"></i><span style="color:#42ca6b;">验证通过</span><span></span>');
							$(".ver-tips").addClass("slider-tips");
							$(".puzzle-lost-box").addClass("hidden");
							$("#puzzleBox").addClass("hidden");
						    $('#successAlt').fadeIn();
							setTimeout(function() {
										$(".ver-tips").removeClass("slider-tips");
										$('#imgVer').hide();
										$('#successAlt').fadeOut();
										
										//imgVer(Config);
									},
									500);

							if (data.url) {
								setTimeout(function () {
											location.href = data.url;
										},
										1000);

							}
						} else {
							$('#imgVer').hide();
							$('#screen').hide()
							;							//$(".puzzle-lost-box").addClass("hidden");
							//$("#puzzleBox").addClass("hidden");
							for (var p in obj) {
								if (typeof (obj[p]) == 'string') {
									html += '<p><b>' + obj[p] + '</b></p>';
								} else if (obj[p] instanceof Array) {
									for (var i = 0; i < obj[p].length; i++) {
										html += '<p><b>' + obj[p][i] + '</b></p>';
									}

								}
							}
							//
							layer.open({
								content: html,
								btn: ['确定']
							})
						}
					}
				});
                //alert('执行登录函数');
                $(".login").css({
                    "left":"0",
                    "opacity":"1"
                });
                $(".verBox").css({
                    "left":"0",
                    "opacity":"1"
                });
                $(".tips").html('你是不是不知道账号密码！？？？');
                $("#logo").attr("src",'images/login-err.png')
            },
            error:function () {
                //alert('错误什么都不执行')
            }
        });
		
</script>


<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>