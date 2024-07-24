<!DOCTYPE html>
<!-- saved from url=(0029)/m/nav -->
<html style="font-size:52.400000000000006px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
    <meta name="csrf-token" content="YDo4JRuWXJvw0xMWks04m1wWy4YRz4UeJMzdfzr4">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css">
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
		<h1>{{trans('lang.dlzx')}}</h1>
	</div>
	<!--<div class="grzx">-->
	<!--	<div class="grzxbox">-->
	<!--		<h2>{{ $_member -> name }}</h2>-->
	<!--					<p><span class="fr"><a href="/m/service" class="btn1"></a></span><i class="xtb1"></i>VIP 1</p>-->
	<!--		@if($_member->phone)-->
	<!--		<ul>-->

	<!--			<li><span><i class=" xtb3 "></i>{{trans("lang.bdsj")}}</span></li>-->
	<!--			<li style="float: right;"  onclick="location.href='/m/agent'"><span style="line-height:1.5"><img src="/new/img/agent.png" style="float: left;margin-right:5px;width:20px;">{{trans("lang.dlzx")}}</span></li>-->

	<!--		</ul>-->
	<!--		@endif-->
	<!--	</div>-->
	<!--</div>-->
	
	<div class="zzc">
		<div class="zzc_tit">
			<h2><span class="fr"></span>{{trans('lang.tglj')}}</h2>
		</div>
		<div class="qbhd_nr">
			<ul>
					<li>
						<div class="qbhdbox">

						        <h3 style="color:#fff;line-height: 2;">{{ config('app.qrcode_url').'?i='.$_member->invite_code }}</h3>

							
						</div>
					</li>
			</ul>
		</div>
	</div>
    <div class="zzc">
		<div class="zzc_nr">
		    <input type="text" id="huming" style="opacity:0;position:fixed;bottom:0;" value="{{ config('app.qrcode_url').'?i='.$_member->invite_code }}">
			<ul>
				<li style="width:49%;" onclick="copy('huming')"><a class="on1">{{trans("lang.fzlj")}}</a></li>
				<li style="width:49%;" id="qrcode"><a >{{trans("lang.ewmtg")}}</a></li>
			</ul>
		</div>
	</div>

    <div class="inforTxt">
    	<ul>
            <li>
    		   
            	<div class="inforLeft">
                	<h2>{{trans('lang.yjffjl')}}</h2>
                </div>
                <a href="/m/daili_money_log" class="changebtn">查看</a>
    	    </li>
    	    <li>
    		   
            	<div class="inforLeft">
                	<h2>{{trans('lang.xxhyckjl')}}</h2>
                </div>
                <a href="/m/member_offline_recharge" class="changebtn">查看</a>
    	    </li>
    	    <li>
    		   
            	<div class="inforLeft">
                	<h2>{{trans('lang.xxhytkjl')}}</h2>
                </div>
                <a href="/m/member_offline_drawing" class="changebtn">查看</a>
    	    </li>
    	    <li>
    		   
            	<div class="inforLeft">
                	<h2>{{trans('lang.xxhy')}}</h2>
                </div>
                <a href="/m/member_offline" class="changebtn">查看</a>
    	    </li>
    	    <li>
    		   
            	<div class="inforLeft">
                	<h2>{{trans('lang.hysybb')}}</h2>
                </div>
                <a href="/m/member_offline_sy" class="changebtn">查看</a>
    	    </li>
        </ul>
    </div>


	<script type="text/javascript">
	$('#qrcode').click(function(){
                layer.open({
                    type: 2,
                });
                $.ajax({
                    url:'/m/qrcode',
                    type:'post',
                    success:function(res){
                        layer.closeAll();
                        agent_img = res;
                        layer.open({
                            type: 1
                            ,shadeClose: true
                            ,content:'<img src="'+agent_img+'" style="width:80vw">'
                        });
                    },error:function(){
                        layer.closeAll();
                        layer.msg("error");
                    }
                })
        })
        
        
	function copy(id) {

  var ele = document.getElementById(id);
  var ele_val = ele.value;
  selectText(ele, 0, ele_val.length);
  document.execCommand("Copy");
  alert('{{trans("lang.fzcg")}}');
}

function selectText(textbox, startIndex, stopIndex) {
  if (textbox.createTextRange) {
    var range = textbox.createTextRange();
    range.collapse(true);
    range.moveStart('character', startIndex); //起始光标
    range.moveEnd('character', stopIndex - startIndex); //结束光标
    range.select(); //不兼容苹果
  } else {
    textbox.setSelectionRange(startIndex, stopIndex);
    textbox.focus();
  }
}



	$('#fanshuic').click(function(){
	    var btn = $('#fanshuic');
        btn.attr("disabled",true);
        $.ajax({
            url : "{{route('wap.send_fs')}}",
            type : 'POST',
            success : function (data) {
                alert(data.status.msg);
                if(data.status.errorCode == 0){
                    btn.attr("disabled",false);
                    location.href=data.url;
                }
            }
        })
        return false;
	})

		$('.btn3').click(function(){
			$('.cmtc').css('bottom','-15rem');
			$('.bj').fadeOut();
		})
	</script>

	<script>
		jQuery(document).ready(function($){
			//open popup
			$('.ace').on('click', function(event){
				event.preventDefault();
				var uid = $(this).attr('uid');
				var msgId = $(this).attr('msgId');
				var type = $(this).attr('type');
				$.ajax({
					type:'GET',
					url:'/post_msg',
					dataType:'json',
					data: {'id': msgId,'type':type,'uid':uid},
					cache: false,
					error: function() {
						alert('Failed!! Please Try Again!!');
						return false;
					},
					success: function(data) {
						var content = data.content;
						$('#msg-content').html('');
						$('#msg-content').html(content);
						$('#du').html('已讀')
					}
				});
				$('.cd-popup').addClass('is-visible');
			});

			//close popup
			$('.cd-popup').on('click', function(event){
				if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
					event.preventDefault();
					$(this).removeClass('is-visible');
				}
			});
			$('.cd-buttons a').click(function(){
				$('.cd-popup').removeClass('is-visible');
			})
			//close popup when clicking the esc keyboard button
			$(document).keyup(function(event){
				if(event.which=='27'){
					$('.cd-popup').removeClass('is-visible');
				}
			});
		});
	</script>
	<!-- 系统消息弹出框结束 -->

	<script type="text/javascript" src="/new/css/qingqiu.js"></script> <!-- 余额时时请求 -->

@extends('wap.template.theme10.layouts.fotter')


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

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>