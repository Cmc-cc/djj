<html style="font-size: 24.5625px;"><head>
    <meta charset="UTF-8">
    <meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/zhuanpan/css/award.css?v=6">
    <link rel="stylesheet" href="/zhuanpan/css/common_shadow.css?v=4">
	
    <title>抽奖</title>
</head>
<body style="background:url('/zhuanpan/img/bjt.png');background-size:100%;background-repeat: no-repeat">
    <img src="/zhuanpan/img/guanbi.png" style="position: fixed;right: 10px;top: 10px;width: 40px;z-index:999999999" onclick="parent.$('#zhuanpan').parent().parent().parent().parent().parent().remove()">
    <div style="    text-align: center;color: #fff;position: relative;top: 1rem;color:#000">
        剩余抽奖次数：<span id="cishu">{{$member->zhuanpan}}</span>
    </div>
    <div class="content" style="margin-top: 4.2rem;">
        <div class="pointer"></div>
        <div class="rotate"><img id="rotate" src="/zhuanpan/img/tpl_img.png" alt="turntable" style="transform: rotate(0deg);"></div>
    </div>


    <!--抽中奖品展示-->
    <div class="switch_award common_switch" style="display: none;">
        <div class="shadow"></div>
        <div class="choose_candidate_msg show_award_msg">
            <div class="show_award_wp">
                <div class="show_award font_bold"><span>恭喜！抽到</span><span class="get_award">二等奖</span></div>
            </div>
            <div class="popup_handle">
                <a class="cancel_btn">确定</a>
            </div>
        </div>
    </div>
    <!--抽奖次数用完-->
    <div class="switch_no_chance common_switch" id="no_chance">
        <div class="shadow"></div>
        <div class="choose_candidate_msg success_info">
            <div class="vote_success_content">
                <span class="common_alarm failed"></span>
                <span>您的抽奖次数已用完~</span>
            </div>
            <div class="popup_handle">
                <a class="width140 back_award">知道了</a>
            </div>
        </div>
    </div>
	<!--登录提示框-->
    <div class="switch_no_chance common_switch" id="login" style="display: none;">
        <div class="shadow"></div>
        <div class="choose_candidate_msg success_info">
			&nbsp;
			<div class="phone_bj"><span class="phone_ms">手机号：</span><input type="text" id="tel" name="telephone" class="sinput">
			<input type="hidden" id="logact" name="logact" value="46924f07afb257bf1d8ec758cc7cf4a4">
			</div>
            <div class="popup_handle_login">
                <a class="width140 back_award" onclick="javascript:tijiao()">登录</a>
            </div>
        </div>
    </div>
	
    <script src="/zhuanpan/js/mobile.js"></script>
    <script src="/zhuanpan/js/jquery.min.js"></script>
    <script src="/zhuanpan/js/awardRotate.js"></script>
	<script>
// 		var flag_num = 1;
// 		function check_my() {
// 			if(flag_num == 0) {
// 				//alert("ok");	
// 				//$("#login").show();
// 				$('#login').slideDown('normal');
// 				return false;
// 			} else {
// 				return true;
// 			}
// 		}
		//登录请求的方法
		function tijiao() {
			var tel = $.trim($('#tel').val());
			var logact = $('#logact').val();
			if(tel !=''){
				//这里加入对手机号的正则判断
				if(!(/^1[3|4|5|7|8]\d{9}$/.test(tel))){	//错误的手机号
					alert('请输入正确的手机号');	return false;
				}
				$.ajax({
					url:'/index.php?s=/Home/Index/login/',
					data:{tel:tel,logact:logact},
					type:'post',
					success:function(msg){
						//alert(msg);
						if(msg == 1) {
							//alert('成功登录');
							setTimeout(function(){
								location.reload(true);
							},1888);
						} else {
							alert('登录失败，请重新登录');
						}
					}
				});
			}else{
				alert('请填写完整信息');
				return false;
			}	
		}
	</script>
	
    <script>
        !function(window, document, $, undefined) {
			
            var $rotate=$('#rotate'),
                turnplate={
                    restaraunts:['六等奖','一等奖','二等奖','三等奖','四等奖','五等奖',], 
                    bRotate :false 
                };

            var rotateFn = function (item, txt){
                var angles = item * (360 / turnplate.restaraunts.length) - (360 / (turnplate.restaraunts.length*2)),
                    $shadowShowSwitch=$(".switch_award");
                if(angles<270){
                    angles = 270 - angles;
                }else{
                    angles = 360 - angles + 270;
                }
                $rotate.stopRotate();
                $rotate.rotate({
                    angle:0,
                    animateTo:angles+1980,
                    duration:8000,
                    callback:function (){
                //弹出奖品
						var $showAward=$shadowShowSwitch.find(".show_award"),
                            $afterArrived=$shadowShowSwitch.find(".after_red");
                        // if(item==0){
                        //     $showAward.html("哎呀，没抽到哟！");
                        //     if($afterArrived.size()){
                        //         $afterArrived.remove();
                        //     }
                        // }else {
                            $showAward.html('<span>恭喜！抽到</span><span class="get_award"></span>');
                            /*if(item==2){
                                if(!$afterArrived.size()){
                                    $shadowShowSwitch.find(".show_award_wp").append(' <div class="after_red">（现金劵几日后会通过短信发到您手机）</div>');
                                }
                            }else {
                                if($afterArrived.size()){
                                    $afterArrived.remove();
                                }
                            } */
                            $shadowShowSwitch.find(".get_award").html(txt);
                        // }
                        $shadowShowSwitch.show();
                        turnplate.bRotate = !turnplate.bRotate;
                    }
                });
            };

            $('.pointer').click(function (){
                if(turnplate.bRotate){
                    return;
                }
				$.ajax({
					url: "/m/zhuan",
					async:false,		//这里应该是同步执行
					success: function( message ) {
						console.log(message)
						if(message == -1) {	//无抽奖机会
							//item = 0;
							 $("#no_chance").show();
						} else {		// 没有抽中    message ＝0；
							turnplate.bRotate = !turnplate.bRotate;
							rotateFn(message, turnplate.restaraunts[message]);
							$('#cishu').text(Number($('#cishu').text())-1);
						}
					}
				});	
		
            });

//点击弹框中的“取消”和“知道了”
            $('.cancel_btn').add(".back_award").on("click",function() {
                $(this).parent().parent().parent().hide();
            });
        }(window, document, jQuery);
    </script>

</body></html>