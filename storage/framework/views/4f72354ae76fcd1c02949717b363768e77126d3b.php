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
		<a href="javascript:window.location.href='/m';" class="fhbtn"></a>
		<h1>个人中心</h1>
	</div>
	
	<!--<div data-v-7ada146e="" class="rainIcon-countdown" style="animation: bounce-data-v-7ada146e 1.5s cubic-bezier(.28,.84,.42,1) infinite;">-->
	<!--    <img data-v-7ada146e="" src="/new/img/agent.png">-->
	<!--</div>-->
	
	
	<div class="grzx">
		<div class="grzxbox">
			<h2><?php echo e($_member -> name); ?></h2>
						<p onclick="location.href='/m/userinfo2'"><span class="fr"><a class="btn1"></a></span><i class="xtb1"></i>VIP0</p>
			
			<ul>
                <?php if($_member->is_daili): ?>
				<!--<li><span><i class=" xtb3 "></i><?php echo e(trans("lang.bdsj")); ?></span></li>-->
				<?php endif; ?>
				
				<li style="float: right;"  >
				    <span style="line-height:1.5">
				        <?php if(!$_member->bank_name): ?>
				        <img src="/new/img/a47.png?v=20230829" style="float: left;margin-right:5px;width:24px;" >
				        <?php else: ?>
				         <img src="/new/img/a47a.png?v=20230829" style="float: left;margin-right:5px;width:24px;" >
				        <?php endif; ?>
				        銀行卡綁定
				    </span>
				</li>
				<li style="float: right;"  >
				    <span style="line-height:1.5">
				        <?php if(!$_member->phone): ?>
				        <img src="/new/img/a44.png?v=20230829" style="float: left;margin-right:5px;width:24px;" >
				        <?php else: ?>
				        <img src="/new/img/a44a.png?v=20230829" style="float: left;margin-right:5px;width:24px;" >
				        <?php endif; ?>
				        手機號綁定
				    </span>
				</li>
				<?php if($_member->is_daili == 1): ?>
				<!--<li style="float: left;"  onclick="location.href='<?php echo e($AGENT_URL); ?>/daili/login2?token=<?php echo e($_member->last_session); ?>'">-->
				<!--    <span style="line-height:1.5">-->
				        
				<!--        <img src="/new/img/a42.png?v=20230829" style="float: left;margin-right:5px;width:24px;" >-->
				<!--        代理中心-->
				<!--    </span>-->
				<!--</li>-->
				  <?php endif; ?>
				<li style="float: left;"  >
				    <span style="line-height:1.5">
				        <?php if(!$_member->bank_name): ?>
				        <img src="/new/img/agent.png?v=20230829" style="float: left;margin-right:5px;width:24px;" >
				        <?php else: ?>
				        <img src="/new/img/agents.png?v=20230829" style="float: left;margin-right:5px;width:24px;" >
				        <?php endif; ?>
				        實名認證
				    </span>
				</li>
               
               
				<!--<li style="float: right;"  onclick="location.href='/m/agent'">-->
				<!--    <span style="line-height:1.5">-->
				<!--        <img src="/new/img/agent.png" style="float: left;margin-right:5px;width:20px;" ><?php echo e(trans("lang.dlzx")); ?>-->
				<!--    </span>-->
				<!--</li>-->

			</ul>
			
		</div>
	</div>
	<style>
	    #trans_all{
            background: linear-gradient(to bottom,#eb5d4d 0%,#fb2464 100%);
            display: block;
            line-height: .56rem;
            height: 0.56rem;
            width: 2rem;
            text-align: center;
            border-radius: 0.7rem;
            color:#fff;
            position: absolute;
            right: 0;
            top: 1rem;
	    }
	</style>
	

    
	<div class="zzc">
		<div class="zzc_tit" style="position: relative;">
			<h2><?php echo e(trans("lang.zzhye")); ?></h2>
			<i id="trans_all">資金回收</i>
		</div>
		<div class="zzc_nr">
			<span id="session" style="display:none;"><?php echo e($_member -> money); ?></span>
			<p>
			</p><div style="width:100%;overflow: hidden;">
				<span style="display:block;float:left;width:.45rem;margin-right: .16rem;"><i class="xtb5">$</i></span>
				<span id="gamemoney" class="member_money" style="color: #eb8f74;font-size: .48rem;display:block;float:left;width:52%;line-height: .48rem;"><?php echo e($_member -> money); ?></span>
				<!--<span style="display:block;float:right;"><a href="javascript:void(0);" onclick="aaaa()" class="refresh11" style="height: .5rem;line-height: .5rem;background: linear-gradient(to right, #ec5c4d , #fa2563);border-radius: 1.2rem;padding: 0 15px;">資金回收</a></span>-->
			</div>
			<p></p>
			<ul>
				
				 <?php if($setting->is_fs==1): ?>
				    <li><a href="/m/recharge" class="on1"><i class="xtb6"></i><?php echo e(trans("lang.chongzhi")); ?></a></li>
			     	<li><a href="javascript:void(0);" class="xmjf"><i class="xtb10"></i>返水</a></li>
					<li><a href="/m/drawing"><i class="xtb8"></i><?php echo e(trans("lang.tixian")); ?></a></li>
				 <?php else: ?>
				    <li style="width:50%;"><a href="/m/recharge" class="on1"><i class="xtb6"></i><?php echo e(trans("lang.chongzhi")); ?></a></li>
				  	<li style="width:50%"><a href="/m/drawing"><i class="xtb8"></i><?php echo e(trans("lang.tixian")); ?></a></li>
				 <?php endif; ?>
				
			
			</ul>
		</div>
	</div>
	<div class="zzc">
		<div class="zzc_tit">
			<h2><span class="fr"><a href="/m/msg">全部消息</a></span>消息</h2>
		</div>
		<div class="qbhd_nr">
			<ul>
					<li>
						<div class="qbhdbox">
						    <?php if($msg): ?>
						        <h3 style="line-height: 1.2;"><?php echo e($msg->content); ?></h3>
							<?php else: ?>
						        <h3>暫無記錄</h3>
						    <?php endif; ?>
							
						</div>
					</li>
			</ul>
		</div>
	</div>
	<div class="zzc">
		<div class="zzc_tit">
			<h2><span class="fr"><a href="/m/activity_list">更多</a></span>福利活動</h2>
		</div>
		<div class="qbhd_nr">
			<ul>
			    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    <li>
							<a href="<?php echo e(route('wap.activity_detail', ['id' => $item->id])); ?>">
								<div class="qbhdbox">
									<span class="xtb9"></span>
									<h2><?php echo e($item->title); ?></h2>
									<p><?php echo e($item->hdsj); ?></p>
									<span class="xtb7"></span>
								</div>
							</a>
				    </li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
			</ul>
		</div>
		<!--<div style="background: linear-gradient(to right, #d3b99e , #caa167);border-radius: .12rem;text-align: center;">-->
		<!--	<a href="/m/my_activity" style="color:#fff;display: block;padding: .32rem 0;">活動列表</a>-->
		<!--</div>-->
	</div>
	<div class="zzc" style="padding-bottom:3%;">
		<div class="zzc_tit">
			<h2><span class="fr"><a href="/m/recharge_record">詳細</a></span>報表</h2>
		</div>
		<div class="qbhd_nr">
			<ul>
				<li>
					<div class="zxjl">
						<div class="zxjl_left">
							<img src="/new/css/a47.png">
							<p>存款</p>
						</div>

						<div class="zxjl_right">
						    <?php if($recharge): ?>
						    <b class="fr">
								<h2>
								    <?php if($recharge->status==1): ?>待确认<?php endif; ?>
								    <?php if($recharge->status==2): ?><font color="#20a53a">成功</font><?php endif; ?>
								    <?php if($recharge->status==3): ?><font color="#ff3300">失败</font><?php endif; ?>
								</h2>
							</b>
							<p><span><?php echo e(date('m-d',strtotime($recharge->created_at))); ?></span><?php echo e($recharge->money); ?>元</p>
							<p>
								<span><?php echo e(date('i:s',strtotime($recharge->created_at))); ?></span><em>
									<?php echo e(config('platform.recharge_type')[$recharge->payment_type]); ?>

								</em>
							</p>
						    <?php else: ?>
						        <h2 style="margin-right:.4rem">暫無記錄</h2>
						    <?php endif; ?>
							
						</div>
					</div>
				</li>
				<li>
					<div class="zxjl">
						<div class="zxjl_left">
							<img src="/new/css/a49.png">
							<p>提現</p>
						</div>
						<div class="zxjl_right">
							<?php if($drawing): ?>
						    <b class="fr">
								<h2>
								    <?php if($drawing->status==1): ?>待确认<?php endif; ?>
								    <?php if($drawing->status==2): ?><font color="#20a53a">成功</font><?php endif; ?>
								    <?php if($drawing->status==3): ?><font color="#ff3300">失败</font><?php endif; ?>
								</h2>
							</b>
							<p><span><?php echo e(date('m-d',strtotime($drawing->created_at))); ?></span><?php echo e($drawing->money); ?>元</p>
							<p>
								<span> <?php echo e(date('i:s',strtotime($drawing->created_at))); ?></span><em>
									<?php echo e($drawing->bank_name); ?>

								</em>
							</p>
						    <?php else: ?>
						        <h2 style="margin-right:.4rem">暫無記錄</h2>
						    <?php endif; ?>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<a href="javascript:;" class="btn2" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><?php echo e(trans("lang.tcdl")); ?></a>
	</div>

    <style>
    .btn5{
        display: block;
        text-align: center;
        color: #fff;
        font-size: .28rem;
        line-height: .98rem;
        background: linear-gradient(#eb5a4d, #ff2467);
        border-radius: 0.12rem;
        width: 100%;
        border: none;
        padding: 0;
    }
    </style>
	<!-- 反水 -->
	<div class="bj"></div>
	<div class="cmtc">
		
			<div class="cmtc_tit"><h2><?php echo e(trans("lang.ssfs")); ?></h2><span class="btn3 ggbtn"></span></div>
			<div class="cmnr">
								<h2><span>$&nbsp;</span><strong id="zongfangshui"><?php echo e($total['fs_money']); ?></strong></h2>
				<p class="xmsm">自主洗碼，實時結算，請投注達標後再試！</p>
				<!--<i class="zkcq">詳細展開</i>-->
				<ul class="nrxg">
					<li><span>遊戲</span></li>
					<li><span>投注額</span></li>
					<li><span>洗碼比例</span></li>
					<li><span>洗碼金額</span></li>
					<li>真人</li>
					<li id="zhenrentz_amount">0.00</li>
					<li id="zhenrenbili">0</li>
					<li id="zhenrenfs">0.00</li>
					<li>電子遊戲</li>
					<li id="dianzitz_amount">0.00</li>
					<li id="dianzibili">0</li>
					<li id="dianzifs">0.00</li>
					<li>捕魚</li>
					<li id="buyutz_amount">0.00</li>
					<li id="buyubili">0</li>
					<li id="buyufs">0</li>
					<li>體育</li>
					<li id="tiyutz_amount">0.00</li>
					<li id="tiyubili">0</li>
					<li id="tiyufs">0.00</li>
					<li>棋牌</li>
					<li id="qipaitz_amount">0.00</li>
					<li id="qipaibili">0</li>
					<li id="qipaifs">0.00</li>
					<li>彩票</li>
					<li id="caipiaotz_amount">0.00</li>
					<li id="caipiaobili">0</li>
					<li id="caipiaofs">0.00</li>

					<li>JOKER(2倍)</li>
					<li id="joker_2_tz_amount">0.00</li>
					<li id="joker_2_bili">0</li>
					<li id="joker_2_fs">0.00</li>

					<li>JOKER(5倍)</li>
					<li id="joker_5_tz_amount">0.00</li>
					<li id="joker_5_bili">0</li>
					<li id="joker_5_fs">0.00</li>

					<li>JOKER(10倍)</li>
					<li id="joker_10_tz_amount">0.00</li>
					<li id="joker_10_bili">0</li>
					<li id="joker_10_fs">0.00</li>

					<li>JOKER(20倍)</li>
					<li id="joker_20_tz_amount">0.00</li>
					<li id="joker_20_bili">0</li>
					<li id="joker_20_fs">0.00</li>

					<li>電競</li>
					<li id="dianjingtz_amount">0.00</li>
					<li id="dianjingbili">0</li>
					<li id="dianjingfs">0.00</li>
				</ul>
			</div>
			<div class="cmbtn">
				<ul>
					<li><a href="javascript:void(0);" class="btn3">取消</a></li>
					<li>
						<button type="button" class="btn5 ajax-submit-btn" id="fanshuic">
							<?php echo e(trans("lang.qr")); ?>

						</button>
					</li>
				</ul>
			</div>
		
	</div>

	<script type="text/javascript">
		$('.zkcq').click(function(){
			if($(this).hasClass('on2')){
				$(this).removeClass('on2');
				$(this).siblings('.nrxg').css('height','0');
				$(this).html('詳細展開');
			}else{
				$(this).addClass('on2');
				$(this).siblings('.nrxg').css('height','auto');
				$(this).html('收起');
			}
		})
	</script>
	<script type="text/javascript">
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
                                        // $('.member_money').text(res.money)
                                        setTimeout(function(){
                                            $.ajax({
                                                url:'/m/membermoney',
                                                success:function(res){
                                                    // $('#lesNum').text(res.money)
                                                    $('.member_money').text(res.money)
                                                    _this.html('資金回收');
                                                }
                                            })
                                        },500)
                                            
                                        
                                    }
                                })
                        //         setTimeout(function(){
                        // 		    _this.html('資金回收');
                        // 		},1000)
                            }
                        })
        // 		});	
        		
		})
		
		
	$('#fanshuic').click(function(){
	    var btn = $('#fanshuic');
        btn.attr("disabled",true);
        $.ajax({
            url : "/m/send_fs",
            type : 'POST',
            success : function (data) {
                alert(data.status.msg);
                if(data.status.errorCode == 0){
                    btn.attr("disabled",false);
                    location.reload();
                }
            }
        })
        return false;
	})
        
		$('.xmjf').click(function(){
			//loading层
// 			layer.open({type: 2});
			$('.cmtc').css('bottom','.12rem');
			$('.bj').fadeIn();
// 			$.ajax({
// 				type:'POST',
// 				url:'/m/ajax_fs',
// 				dataType:'json',
// 				cache: false,
// 				error: function() {
// 					alert('Failed!! Please Try Again!!');
// 					return false;
// 				},
// 				success: function(data) {
// 					layer.closeAll();

// 					if(data.code == 1) {

// 						$('#zongfangshui').html(data.data.zongfanshui);
// 						$('#all_fs').val(data.data.zongfanshui);

// 						$('#zhenrentz_amount').html(data.data.zhenrentz_amount);
// 						$('#zhenrenbili').html(data.data.zhenrenbili);
// 						$('#zhenrenfs').html(data.data.zhenrenfs);

// 						$('#dianzitz_amount').html(data.data.dianzitz_amount);
// 						$('#dianzibili').html(data.data.dianzibili);
// 						$('#dianzifs').html(data.data.dianzifs);

// 						$('#buyutz_amount').html(data.data.buyutz_amount);
// 						$('#buyubili').html(data.data.buyubili);
// 						$('#buyufs').html(data.data.buyufs);

// 						$('#tiyutz_amount').html(data.data.tiyutz_amount);
// 						$('#tiyubili').html(data.data.tiyubili);
// 						$('#tiyufs').html(data.data.tiyufs);

// 						$('#qipaitz_amount').html(data.data.qipaitz_amount);
// 						$('#qipaibili').html(data.data.qipaibili);
// 						$('#qipaifs').html(data.data.qipaifs);

// 						$('#caipiaotz_amount').html(data.data.caipiaotz_amount);
// 						$('#caipiaobili').html(data.data.caipiaobili);
// 						$('#caipiaofs').html(data.data.caipiaofs)

// 						$('#joker_2_tz_amount').html(data.data.joker_2_tz_amount);
// 						$('#joker_2_bili').html(data.data.joker_2_bili);
// 						$('#joker_2_fs').html(data.data.joker_2_fs)

// 						$('#joker_5_tz_amount').html(data.data.joker_5_tz_amount);
// 						$('#joker_5_bili').html(data.data.joker_5_bili);
// 						$('#joker_5_fs').html(data.data.joker_5_fs)

// 						$('#joker_10_tz_amount').html(data.data.joker_10_tz_amount);
// 						$('#joker_10_bili').html(data.data.joker_10_bili);
// 						$('#joker_10_fs').html(data.data.joker_10_fs);

// 						$('#joker_20_tz_amount').html(data.data.joker_20_tz_amount);
// 						$('#joker_20_bili').html(data.data.joker_20_bili);
// 						$('#joker_20_fs').html(data.data.joker_20_fs)

// 						$('#dianjingtz_amount').html(data.data.dianjingtz_amount);
// 						$('#dianjingbili').html(data.data.dianjingbili);
// 						$('#dianjingfs').html(data.data.dianjingfs)

// 						$('#game_str').val(data.data.game_str)
// 						$('.cmtc').css('bottom','.12rem');
// 						$('.bj').fadeIn();
// 					}
// 				}
// 			});

		})
		$('.btn3').click(function(){
			$('.cmtc').css('bottom','-15rem');
			$('.bj').fadeOut();
		})
	</script>

	<!-- 系统消息弹出框 -->
	<div class="cd-popup" role="alert">
		<div class="cd-popup-container">
			<p id="msg-content"></p>
			<ul class="cd-buttons">
				<li><a href="javascript:void(0)">確&nbsp;定</a></li>
			</ul>
			<a href="/m/nav#" class="cd-popup-close img-replace">关闭</a>
		</div> <!-- cd-popup-container -->
	</div>
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
	<script>
		function aaaa(){
			$('.refresh11').each(function(){
				var _this=$(this);

				_this.html('回收中...');

				_this.removeAttr('onclick')
				$.post('/api/trans_all', function (data) {
					if ( data['code'] == 0 ) {

						_this.html('資金回收');
						_this.attr('onclick','aaaa()')
					}else{
						alert(data['msg']);
						_this.attr('onclick','aaaa()')
					}

				});
			});

		}
	</script>


<form id="logout-form" action="<?php echo e(route('wap.logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

                            </form>  


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
<?php echo $__env->make('wap.template.theme10.layouts.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>