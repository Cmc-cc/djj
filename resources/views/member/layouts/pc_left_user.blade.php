
	
		
			<div class="sidebar-wrapper">
					<!-- <img src="../web/images/huanya/ag14.png" class="logo1"> -->
					 <div class="logged">
					 <div id="screen"></div>
					 
						 <div class="uIconchose">
							<img src="/images/avatar-01.png " id="uiconnow">
							<span><i></i></span>
						 </div>
						 
						 <div class="ring-wrapper">
							<a href="#" class="switchroute">
							   <div class="ring-ring"></div>
							   <div class="count" id="woshimsgg" style="display:none"> {{ $_member->name }}</div>
							</a>
						 </div>
						 <div class="info-wrapper">
											<!-- <div class="user-level">VIP 0</div> -->
							<div class="user-name"><span id="userName" style="font-weight: bold;letter-spacing: 0.1px;"> {{ $_member->name }}<i class="lvl0"></i></span>
								<!-- <div class="ud-line"></div> -->
							</div>
							<!-- <div class="user-amount">
								<span id="session" style="display:none;">dd1122</span>
								<span>$</span><span  id="gamemoneyyy">0.70</span>
								<div class="refresh"></div>
								<div class="ud-line"></div>
							</div> -->
						 </div>
						 
						 <div class="money-wrapper">
							<div class="new-money-btn deposit">
							  <a class="switchroute" href="new_bank_pay">
							   <div>
								<div class="btn-img"></div>
								<span>{{trans("lang.cunkuan")}} </span>
							   </div>
							  </a>
							</div>			  
							<div class="new-money-btn rebate">
							  <a class="switchroute" href="send_fs">
							   <div>
								<div class="btn-img"></div>
								<span>{{trans("lang.fanshui")}}</span>
							   </div>
							  </a>
							</div>
							<div class="new-money-btn withdraw">
							  <a class="switchroute" href="member_drawing_xin">
							   <div style="overflow: hidden;">
								<div class="btn-img"></div>
								<span>{{trans("lang.tixian")}} </span>
							   </div>
							  </a>
							</div>
						 </div>
					 </div>
					  <?php
    $url = $_SERVER['REQUEST_URI'];
	echo $url;
    ?>
	
					 <div class="tab-wrapper">
    					<a class="switchroute" href="userCenter">
    					    <div class="side-tab @if(strstr($url,'userCenter')) active @endif">
    					        <i class="asd2"></i>
    					        <span>{{trans("lang.jibenchezi")}} </span>
    					   </div>
    					 </a>
    					<a class="switchroute" href="indoor_transfer_xin">
    					    <div class="side-tab @if(strstr($url,'indoor_transfer_xin')) active @endif">
    					        <i class="asd4"></i>
    					        <span>{{trans("lang.edzh")}}</span>
    					   </div>
    					</a>
    					<a class="switchroute" href="singlenote_report_xin">
    					    <div class="side-tab @if(strstr($url,'singlenote_report_xin')) active @endif">
    					        <i class="asd5"></i>
    					        <span>{{trans("lang.dingdanchaxun")}}</span>
    					   </div>
    					</a>
    					<a class="switchroute" href="customer_report_xin">
    					    <div class="side-tab @if(strstr($url,'customer_report_xin')) active @endif">
    					        <i class="asd6"></i>
    					        <span>{{trans("lang.zjls")}}</span>
    					   </div>
    					</a>
    					<a class="switchroute" href="{{ route('member.login_psw_xin') }}">
    					    <div class="side-tab @if(strstr($url,'login_psw_xin') || strstr($url,'safe_psw_xin')) active @endif">
    					        <i class="asd3"></i>
    					        <span>{{trans("lang.xgmm")}}</span>
    					   </div>
    					</a>
    					<a class="switchroute" href="/activities">
    					    <div class="side-tab @if(strstr($url,'activities')) active @endif">
    					        <i class="asd2"></i>
    					        <span>{{trans("lang.yhhd")}}</span>
    					   </div>
    					</a>
    					<a class="switchroute" href="/notice">
    					    <div class="side-tab @if(strstr($url,'notice')) active @endif">
    					        <i class="asd4"></i>
    					        <span>{{trans("lang.xtgg")}}</span>
    					   </div>
    					</a>
    					<a href="javascript:if(confirm('{{trans("lang.quedingtc")}}'))location='';">
    						<div class="logout-tab">
    							<div class="lg-icon"></div>
    							{{trans("lang.tcdl")}}
    						</div>
    					</a>
					 </div>
					 
					 <div class="service-wrapper">
							<div class="hidden-line"></div>
							<div class="online-btn" onclick="javascript:window.open('{{$_system_config->service_link}}','','width=1000,height=700,left=455,top=190')">
								<div class="icon-box"></div>
								<span>{{trans("lang.zxkf")}}</span>
							</div>
							<div class="callback-btn">
								<div class="icon-box"></div>
								<span>{{trans("lang.gjdh")}}</span>
							</div>
							<div class="clearfix"></div>
							<h3>{{$_system_config->phone1}}</h3>
					 </div>
				 </div>

				 
<script>
            var xiaoshu = 0;
    		function chongzhi() {
			let val = $("#amount").val();
			if(val != '' && val > 0){
			    arr = val.split('.');
				if(paytype == 2){
					$.ajax({
						type:"post",
						url:"{{ route('wap.post_qq_pay') }}",
						data : {money:arr[0],xiaoshu:arr[1],'paytype':paytype,'account':account},
						beforeSend: function(){
							open_load();
						},
						complete: function(){
							close_load();
						},
						success : function (data) {
							if(data.status.errorCode == 0){
								///差关闭弹框
								chenggong_alert(1,data.status.msg);
								setTimeout(() => {
									reset();
									window.parent._close_fu();
								},1500)
							}else{
								chenggong_alert(2,data.status.msg);
							}
							close_load()
						}
					})
				}else{
					$.ajax({
						type:"post",
						url : "{{ route('ajax_pay') }}",
						data : {amount:arr[0],xiaoshu:xiaoshu,'paytype':paytype,'bankId':bankid,'account':account},
						beforeSend: function(){
							open_load();
						},
						complete: function(){
							close_load();
						},
						success : function (data) {
							if(data.status.errorCode == 0){
								///差关闭弹框
								chenggong_alert(1,data.status.msg);
								setTimeout(() => {
									reset();
									window.parent._close_fu();
								},1500)
							}else{
								chenggong_alert(2,data.status.msg);
							}
							close_load()
						}
					})
				}

			}
			else{
				chenggong_alert(2,'{{trans("lang.qsrzqdsz")}}');
			}

		}
	
		function jine_input(){
		   	xiaoshu  = Math.floor(Math.random()*90) + 10;
			let val = $("#amount").val();
		    val = val*1+xiaoshu/100;
		    $("#amount").val(val)
		}
		

	function setPay(i){
	    if(i==1){
	        $(".fps").show();
	        $(".trc").hide();
	        $(".erc").hide();
	        $(".bank").hide();
	    }
	    if(i==3){
	         $(".fps").hide();
	        $(".trc").show();
	        $(".erc").hide();
	        $(".bank").hide();
	    }
	    if(i==4){
	        $(".fps").hide();
	        $(".trc").hide();
	        $(".erc").show();
	        $(".bank").hide();
	    }
	    if(i==5){
	         $(".fps").hide();
	        $(".trc").hide();
	        $(".erc").hide();
	        $(".bank").show();
	    }
	}
	
		function tixian(){
		    var type= $("#type").val();
		    var payment_desc = '';
		    var account ='';
		    var bank_name = '';
		    var username = $("#username").val();
		     if(!username){
		             chenggong_alert(2,'{{trans("lang.qingshuru")}}{{trans("lang.zhenshixingming")}}')
                     return false;
		        }
		    if(type==1){
		        var fps = $("#fps").val();
		        payment_desc = '转速快';
		        account = fps;
		        if(!fps){
		             chenggong_alert(2,'{{trans("lang.qingshuru")}}{{trans("lang.zsk")}}')
                     return false;
		        }
		    }
		     if(type==3){
		        var trc20 = $("#trc20").val();
		        payment_desc = 'USDT-TRC20';
		        account = trc20;
		         if(!trc20){
		             chenggong_alert(2,'{{trans("lang.qingshuru")}}USDT-TRC20')
                     return false;
		        }
		    }
		     if(type==4){
		        var erc20 = $("#trc20").val();
		        payment_desc = 'USDT-ERC20';
		        account = erc20;
		        if(!erc20){
		             chenggong_alert(2,'{{trans("lang.qingshuru")}}USDT-ERC20')
                     return false;
		        }
		    }
		     if(type==5){
		       var bank_name = $("#bank_name").val();
		       var bank_card = $("#bank_card").val();
		        payment_desc = '银行转账';
		        account =  bank_card;
		       if(!bank_name || !bank_card){
		             chenggong_alert(2,'{{trans("lang.qingshuru")}}{{trans("lang.yhzh2")}}')
                     return false;
		        }
		    }
            var money = $("#money2222").val();
            if(money==''){
                chenggong_alert(2,'{{trans("lang.qingshuru")}}{{trans("lang.tkje")}}')
                return false;
            }

            var qk_pwd = $("#qk_pwd").val();
            if(qk_pwd==''){
                chenggong_alert(2,'{{trans("lang.qingshuru")}}{{trans("lang.tkmm")}}')
                return false;
            }

            $.ajax({
                type:"post",
                url:"{{ route('wap.post_drawing') }}",
                data : {qk_pwd:qk_pwd,money:money,name:username,bank_name:bank_name,payment_desc:payment_desc,account:account,type:type},
                beforeSend: function(){
                    open_load();
                },
                complete: function(){
                    close_load();
                },
                success : function (data) {
                    if(data.status.errorCode == 0){
                        ///差关闭弹框
                        chenggong_alert(1,data.status.msg);
                        setTimeout(() => {
                            reset2();
							window.parent._close_fu();
                        },1500)
                    }else{
                        chenggong_alert(2,data.status.msg);
                    }
                    close_load()
                }
            })
        }
</script>
	 <style type="text/css">
 			.ta_c{
			    text-align: center;
			}
            
            @-webkit-keyframes rotation{
            from {-webkit-transform: rotate(0deg);}
            to {-webkit-transform: rotate(360deg);}
            }
            
            .Rotation{
            -webkit-transform: rotate(360deg);
            animation: rotation 3s linear infinite;
            -moz-animation: rotation 3s linear infinite;
            -webkit-animation: rotation 3s linear infinite;
            -o-animation: rotation 3s linear infinite;
            }
			.fl {
				float: left;
			}
			.fr {
				float: right;
			}
			.member-wrapper {
			  width: 100%;
			  float: left;
			  background: #f7f9fb;
			}
			.member-wrapper:before, .member-wrapper:after {
				content: '';
				display: table;
			}
			.member-wrapper:after {
				clear: both;
			}
			.member-wrapper .user-info {
				padding: 36px 48px 48px;
				background-color: #fff;
				margin-bottom: 12px;
			}
			.member-wrapper .user-info:before, .member-wrapper .user-info:after {
				  content: '';
				  display: table;
			}
			.member-wrapper .user-info:after {
				  clear: both;
			}
			.member-wrapper .user-info .left {
				  float: left;
				  width: 401px;
				  margin-right: 48px;
			}
			.member-wrapper .user-info .left .name-row {
					margin-bottom: 16px;
			}
			.member-wrapper .user-info .left .name-row:before, .member-wrapper .user-info .left .name-row:after {
					  content: '';
					  display: table;
			}
			.member-wrapper .user-info .left .name-row:after {
					  clear: both;
			}
			.member-wrapper .user-info .left .name-row h2 {
					  color: #d0a275;
					  font-size: 20px;
					  font-weight: 400;
					  float: left;
					  line-height: 34px;
			}
			.member-wrapper .user-info .left .name-row .icons {
					  float: right;
			}
			.member-wrapper .user-info .left .name-row .icons .icon {
						width: 34px;
						height: 34px;
						background-size: 100% 100%;
						float: left;
						margin-left: 12px;
			}
			.member-wrapper .user-info .left .name-row .icons .icon.info {
						  background: url(/images/xm.png) no-repeat;
			}
			.member-wrapper .user-info .left .name-row .icons .icon.info.active {
						  background: url(/images/xm1.png) no-repeat;
			}
			.member-wrapper .user-info .left .name-row .icons .icon.phone {
						  background: url(/images/sj.png) no-repeat;
			}
			.member-wrapper .user-info .left .name-row .icons .icon.phone.active {
							background: url(/images/sj1.png) no-repeat;
			}
			.member-wrapper .user-info .left .name-row .icons .icon.card {
						  background: url(/images/yh.png) no-repeat;
			}
			.member-wrapper .user-info .left .name-row .icons .icon.card.active {
							background: url(/images/yh1.png) no-repeat;
			}
			.member-wrapper .user-info .left .star-row {
					margin-bottom: 36px;
			}
			.member-wrapper .user-info .left .star-row:before, .member-wrapper .user-info .left .star-row:after {
					  content: '';
					  display: table;
			}
			.member-wrapper .user-info .left .star-row:after {
					  clear: both;
			}
			.member-wrapper .user-info .left .star-row .user-level {
					  font-size: 12px;
					  width: 48px;
					  height: 20px;
					  line-height: 20px;
					  background-color: #cbab8c;
					  border-radius: 10px;
					  color: #f9f7f7;
					  text-align: center;
					  float: left;
					  margin-right: 12px;
			}
			.member-wrapper .user-info .left .star-row .stars {
					  float: left;
					  margin-right: 7px;
					  padding-top: 4px;
					  font-size: 0px;
			}
			.member-wrapper .user-info .left .star-row .stars .star {
						width: 12px;
						height: 12px;
						display: inline-block;
						background: url(/images/vip0.png) no-repeat;
						background-size: 100% 100%;
						margin-right: 2px;
			}
			.member-wrapper .user-info .left .star-row .stars .star.active {
						  background: url(/images/vip.png) no-repeat;
			}
			.member-wrapper .user-info .left .star-row .question {
					  float: left;
					  width: 16px;
					  height: 16px;
					  background: url(/images/xunwen.png) no-repeat;
					  background-size: 100% 100%;
					  opacity: .4;
					  -webkit-transition: .3s;
					  transition: .3s;
					  cursor: pointer;
					  margin-top: 2px;
					  position: relative;
					  z-index: 2;
			}
			.member-wrapper .user-info .left .star-row .question:hover {
						opacity: 1;
			}
			.member-wrapper .user-info .left .star-row .question:hover .pop-rule {
						  display: block;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule {
						display: none;
						z-index: 2;
						position: absolute;
						width: 310px;
						background-color: #fff;
						-webkit-box-sizing: border-box;
								box-sizing: border-box;
						padding: 12px 12px 6px;
						border: 1px solid #f7f9fb;
						top: -15px;
						left: 35px;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule:before {
						  content: '';
						  display: inline-block;
						  position: absolute;
						  width: 0;
						  height: 0;
						  border-color: transparent;
						  border-style: solid;
						  top: 12px;
						  left: -13px;
						  border-width: 10px 13px 10px 0;
						  border-right-color: #333333;
						  pointer-events: none;
						  -webkit-transition: .3s;
						  transition: .3s;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule:after {
						  content: '';
						  position: absolute;
						  width: 0;
						  height: 0;
						  border-color: transparent;
						  border-style: solid;
						  top: 9px;
						  left: -11px;
						  border-width: 13px 16px 13px 0;
						  border-right-color: #fff;
						  pointer-events: none;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .gray {
						  font-size: 14px;
						  color: #999999;
						  margin-bottom: 6px;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row {
						  background-color: #f7f9fb;
						  height: 38px;
						  padding: 100%;
						  padding: 2px 6px;
						  -webkit-box-sizing: border-box;
								  box-sizing: border-box;
						  margin-bottom: 6px;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row:before, .member-wrapper .user-info .left .star-row .question .pop-rule .vip-row:after {
							content: '';
							display: table;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row:after {
							clear: both;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row h4 {
							font-size: 14px;
							color: #546690;
							float: left;
							font-weight: 400;
							line-height: 38px;
							margin-right: 10px;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star {
							float: left;
							width: 120px;
							height: 14px;
							background-size: 100%;
							margin-top: 12px;
							background-repeat: no-repeat;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip1 {
							  background-image: url(/images/vip1.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip2 {
							  background-image: url(/images/vip2.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip3 {
							  background-image: url(/images/vip3.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip4 {
							  background-image: url(/images/vip3.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip5 {
							  background-image: url(/images/vip5.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip6 {
							  background-image: url(/images/vip6.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip7 {
							  background-image: url(/images/vip7.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-star.vip8 {
							  background-image: url(/images/vip8.png);
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-require {
							float: right;
							font-size: 12px;
							color: #666666;
							text-align: center;
							width: 100px;
			}
			.member-wrapper .user-info .left .star-row .question .pop-rule .vip-row .vip-require .white {
							  color: #a9a6a6;
							  margin-top: 2px;
			}
			.member-wrapper .user-info .left .level-row {
					font-size: 12px;
			}
			.member-wrapper .user-info .left .level-row .gray {
					  color: #666666;
					  margin-right: 6px;
			}
			.member-wrapper .user-info .left .level-row .bet {
					  color: #F9AB10;
			}
			.member-wrapper .user-info .left .level-row .progress-wrapper {
					  position: relative;
			}
			.member-wrapper .user-info .left .level-row .progress-wrapper .progress-bar {
						position: relative;
						width: 100%;
						height: 6px;
						border-radius: 3px;
						background-color: #eaeaea;
						margin: 12px 0 6px;
						overflow: hidden;
			}
			.member-wrapper .user-info .left .level-row .progress-wrapper .progress-bar .progress-run {
						  position: absolute;
						  height: 100%;
						  border-radius: 3px;
						  -webkit-transition: 1s;
						  transition: 1s;
						  background-image: linear-gradient(135deg, #EB5D4D, #FB2464);
						  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EB5D4D', endColorstr='#FB2464', GradientType=1);
			}
			.member-wrapper .user-info .left .level-row .progress-wrapper .progress-level .level-left {
						float: left;
						color: #FB2464;
			}
			.member-wrapper .user-info .left .level-row .progress-wrapper .progress-level .level-right {
						float: right;
						color: #666666;
			}
			.member-wrapper .user-info .right {
				  float: left;
			}
			.member-wrapper .user-info .right > h5 {
					font-size: 14px;
					color: #444c64;
					margin-bottom: 10px;
			}
			.member-wrapper .user-info .right .credit {
					background-image: linear-gradient(135deg, #d6bca2, #774617);
					filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFD96B', endColorstr='#F9AB10', GradientType=1);
					-webkit-background-clip: text;
					-webkit-text-fill-color: transparent;
					font-size: 30px;
					font-weight: bold;
					margin-bottom: 36px;
					margin-right: 17px;
			}
			@media  all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
			.member-wrapper .user-info .right .credit {
						color: #F9AB10;
						background: transparent;
			}
			}
			.member-wrapper .user-info .right .refresh {
					display: inline-block;
					width: 20px;
					height: 20px;
					background: url(/images/shuaxin.png) no-repeat;
					background-size: 100% 100%;
					cursor: pointer;
			}
			.member-wrapper .user-info .right .btn-wrapper {
					margin-top: 36px;
					font-size: 16px;
			}
			.member-wrapper .user-info .right .btn-wrapper:before, .member-wrapper .user-info .right .btn-wrapper:after {
					  content: '';
					  display: table;
			}
			.member-wrapper .user-info .right .btn-wrapper:after {
					  clear: both;
			}
			.member-wrapper .user-info .right .btn-wrapper button {
					  width: 120px;
					  height: 50px;
					  background-image: linear-gradient(270deg,#d2b496,#dccab8);
					  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EB5D4D', endColorstr='#FB2464', GradientType=1);
					  color: #FFF;
					  margin-right: 36px;
					  line-height: 50px;
					  cursor: pointer;
					  border:0;
					  border-radius: 8px;
			}
			.member-wrapper .user-info .right .btn-wrapper button:hover {
					  background-image: linear-gradient(270deg,#dccab8,#d2b496);
			}
			.member-wrapper .user-info .right .btn-wrapper button:nth-child(3) {
						margin-right: 0;
			}
			.member-wrapper .user-info .right .btn-wrapper button .btn-icon {
						display: inline-block;
						width: 26px;
						height: 26px;
						background-size: 100% 100%;
						margin-right: 10px;
						position: relative;
						top: 6px;
			}
			.member-wrapper .user-info .right .btn-wrapper button.deposit .btn-icon {
						background: url(/images/qukuan1.png) no-repeat;
			}
			.member-wrapper .user-info .right .btn-wrapper button.rebate .btn-icon {
						background: url(/images/xima.png) no-repeat;
			}
			.member-wrapper .user-info .right .btn-wrapper button.withdraw .btn-icon {
						background: url(/images/cunkuan1.png) no-repeat;
			}
			.member-wrapper .middle-info {
				margin-bottom: 12px;
			}
			.member-wrapper .middle-info:before, .member-wrapper .middle-info:after {
				  content: '';
				  display: table;
			}
			.member-wrapper .middle-info:after {
				  clear: both;
			}
			.member-wrapper .middle-info .middle-block {
				  width: 326px;
				  height: 260px;
				  background-color: #fff;
				  margin-right: 12px;
				  float: left;
				  -webkit-box-sizing: border-box;
						  box-sizing: border-box;
				  padding: 30px 24px 0;
			}
			.member-wrapper .middle-info .middle-block:nth-child(3) {
					margin-right: 0;
			}
			.member-wrapper .middle-info .middle-block .title-bar {
					margin-bottom: 24px;
			}
			.member-wrapper .middle-info .middle-block .title-bar:before, .member-wrapper .middle-info .middle-block .title-bar:after {
					  content: '';
					  display: table;
			}
			.member-wrapper .middle-info .middle-block .title-bar:after {
					  clear: both;
			}
			.member-wrapper .middle-info .middle-block .title-bar h2 {
					  font-size: 20px;
					  color: #666666;
					  font-weight: 400;
					  float: left;
			}
			.member-wrapper .middle-info .middle-block .title-bar span {
					  float: right;
					  color: #a9a6a6;
					  font-size: 14px;
					  cursor: pointer;
					  line-height: 28px;
			}
			.member-wrapper .middle-info .middle-block .title-bar span:hover {
						text-decoration: underline;
			}
			.member-wrapper .middle-info .middle-block .card, .member-wrapper .middle-info .middle-block .no-info {
					width: 100%;
					height: 155px;
					overflow: hidden;
			}
			.member-wrapper .middle-info .middle-block .no-info {
					text-align: center;
					line-height: 155px;
					color: #666666;
					font-size: 14px;
			}
			.member-wrapper .middle-info .middle-block .card {
					padding: 18px 24px;
					-webkit-box-sizing: border-box;
							box-sizing: border-box;
					background-color: #f7f9fb;
			}
			.member-wrapper .middle-info .middle-block .card .card-title {
					  margin-bottom: 24px;
			}
			.member-wrapper .middle-info .middle-block .card .card-title:before, .member-wrapper .middle-info .middle-block .card .card-title:after {
						content: '';
						display: table;
			}
			.member-wrapper .middle-info .middle-block .card .card-title:after {
						clear: both;
			}
			.member-wrapper .middle-info .middle-block .card .card-title .card-logo {
						width: 32px;
						height: 32px;
						background-size: cover;
						margin-right: 6px;
			}
			.member-wrapper .middle-info .middle-block .card .card-title .card-name {
						font-size: 16px;
						color: #797979;
						line-height: 32px;
						max-width: 144px;
						overflow-x: hidden;
						text-overflow: ellipsis;
						white-space: nowrap;
			}
			.member-wrapper .middle-info .middle-block .card .card-title .card-type {
						font-size: 14px;
						color: #666666;
						line-height: 32px;
			}
			.member-wrapper .middle-info .middle-block .card .card-num {
					  color: #907575;
					  font-size: 20px;
					  font-weight: bold;
					  margin-bottom: 12px;
			}
			.member-wrapper .middle-info .middle-block .card .card-owner {
					  color: #999999;
					  font-size: 14px;
					  padding-left: 12px;
			}
			.member-wrapper .middle-info .middle-block .promos .promo {
					margin-bottom: 12px;
					cursor: pointer;
			}
			.member-wrapper .middle-info .middle-block .promos .promo h3 {
					  font-weight: 100;
					  color: #636875;
					  font-size: 14px;
					  margin-bottom: 6px;
			}
			.member-wrapper .middle-info .middle-block .promos .promo p {
					  color: #666666;
					  font-size: 14px;
			}
			.member-wrapper .middle-info .middle-block .promos .promo:hover h3 {
					  text-decoration: underline;
			}
			.member-wrapper .middle-info .middle-block .msgs .msg {
					color: #FFF;
					font-size: 14px;
					white-space: nowrap;
					text-overflow: ellipsis;
					overflow: hidden;
					margin-bottom: 12px;
					cursor: pointer;
			}
			.member-wrapper .middle-info .middle-block .msgs .msg.read {
					  color: #999999;
			}
			.member-wrapper .middle-info .middle-block .msgs .msg:hover {
					  text-decoration: underline;
			}
			.member-wrapper .recent-records {
				background-color: #fff;
				padding: 16px 24px 18px;
			}
			.member-wrapper .recent-records .tile-bar {
				  margin-bottom: 12px;
			}
			.member-wrapper .recent-records .tile-bar:before, .member-wrapper .recent-records .tile-bar:after {
					content: '';
					display: table;
			}
			.member-wrapper .recent-records .tile-bar:after {
					clear: both;
			}
			.member-wrapper .recent-records .tile-bar h2 {
					font-size: 20px;
					color: #666666;
					float: left;
					font-weight: 400;
			}
			.member-wrapper .recent-records .tile-bar span {
					font-size: 14px;
					color: #a9a6a6;
					float: right;
					line-height: 28px;
					cursor: pointer;
			}
			.member-wrapper .recent-records .tile-bar span:hover {
					  text-decoration: underline;
			}
			.member-wrapper .recent-records .recent {
				  background-color: #f0f3f7;
			}
			.member-wrapper .recent-records .recent:before, .member-wrapper .recent-records .recent:after {
					content: '';
					display: table;
			}
			.member-wrapper .recent-records .recent:after {
					clear: both;
			}
			.member-wrapper .recent-records .recent.deposit {
					margin-bottom: 6px;
			}
			.member-wrapper .recent-records .recent .recent-head {
					text-align: center;
					padding: 30px 0;
					-webkit-box-sizing: border-box;
							box-sizing: border-box;
					width: 120px;
					background-color: #bac3cc;
					color: #FFF;
					float: left;
			}
			.member-wrapper .recent-records .recent .recent-head img {
					  margin-bottom: 3px;
			}
			.member-wrapper .recent-records .recent .recent-body, .member-wrapper .recent-records .recent .no-info {
					float: left;
					height: 117px;
			}
			.member-wrapper .recent-records .recent .no-info {
					text-align: center;
					line-height: 120px;
					color: #666666;
					font-size: 14px;
					width: calc(100% - 120px);
			}
			.member-wrapper .recent-records .recent .recent-body {
					font-size: 14px;
					color: #999999;
			}
			.member-wrapper .recent-records .recent .recent-body:before, .member-wrapper .recent-records .recent .recent-body:after {
					  content: '';
					  display: table;
			}
			.member-wrapper .recent-records .recent .recent-body:after {
					  clear: both;
			}
			.member-wrapper .recent-records .recent .recent-body .block1 {
					  width: 318px;
					  -webkit-box-sizing: border-box;
							  box-sizing: border-box;
					  float: left;
					  padding: 29px 0 29px 29px;
					  color: #666666;
			}
			.member-wrapper .recent-records .recent .recent-body .block1 p span {
						color: #9a7b7b;
						padding-left: 12px;
			}
			.member-wrapper .recent-records .recent .recent-body .block1 p.time {
						margin-bottom: 24px;
			}
			.member-wrapper .recent-records .recent .recent-body .block2, .member-wrapper .recent-records .recent .recent-body .block3, .member-wrapper .recent-records .recent .recent-body .block4 {
					  line-height: 120px;
					  text-align: center;
					  float: left;
			}
			.member-wrapper .recent-records .recent .recent-body .block2, .member-wrapper .recent-records .recent .recent-body .block4 {
					  width: 158px;
			}
			.member-wrapper .recent-records .recent .recent-body .block3 {
					  width: 180px;
					  color: #d49925;
			}
			.member-wrapper .recent-records .recent .recent-body .block4.success {
					  color: #61C260;
			}
			.member-wrapper .recent-records .recent .recent-body .block4.fail {
					  color: #E05244;
			}
			
			/*新版会员中心开始*/
/**
.container {
    min-width: 1200px;
    box-sizing: border-box;
    margin: 0 auto 14px;
    padding: 10px 0 0;
}
.container:after, .container:before {
	content: "";
    display: block;
    width: 100%;
    clear: both;
}*/
.sidebar-wrapper {
    letter-spacing: 1px;
    width: 180px;
    margin-left: 5rem;
    box-sizing: border-box;
    float: left;
    margin-right: 14px;
}
.sidebar-wrapper .logo1, .sidebar-wrapper .picture-logo img {
    width: 170px;
    height: 91px;
    display: block;
    cursor: pointer;
    margin-bottom: 10px;
}
img {
    border-style: none;
}
.sidebar-wrapper .logged {
    background-color: #fff;
    padding: 20px 0 8px;
    margin-bottom: 10px;
    position: relative;
	text-align: center;
}
.sidebar-wrapper .logged .ring-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
}
.sidebar-wrapper .logged .ring-wrapper .ring-ring {
    width: 14px;
    height: 16px;
    background: url(/images/xx.png) no-repeat;
    background-size: cover;
    cursor: pointer;
    transform-origin: top center;
}
.sidebar-wrapper .logged .ring-wrapper .count {
    position: absolute;
    top: -15px;
    right: -15px;
    color: #fff;
    font-size: 20px;
    width: 28px;
    height: 28px;
	line-height: 28px;
    border-radius: 50%;
    background-color: #d8a878;
    transform: scale(.5);
    text-align: center;
    overflow: hidden;
}
.sidebar-wrapper .info-wrapper {
    padding-left: 8px;
}
.sidebar-wrapper .info-wrapper .user-level {
    font-size: 12px;
    width: 48px;
    height: 17px;
    line-height: 17px;
    background-color: #414755;
    border-radius: 9px;
    color: #fff;
    text-align: center;
    cursor: pointer;
    margin-bottom: 2px;
}
.sidebar-wrapper .info-wrapper .user-name {
    position: relative;
	padding-bottom: 12px;
}
.sidebar-wrapper .info-wrapper .user-name span {
    font-size: 14px;
    color: #414655;
    max-width: 129px;
    overflow: hidden;
    vertical-align: super;
    cursor: pointer;
}
.sidebar-wrapper .info-wrapper .user-name span i {
    display: inline-block;
    width: 40px;
    height: 16px;
    margin-left: 10px;
    background-repeat: no-repeat;
	vertical-align: -2px;
}
.sidebar-wrapper .info-wrapper .ud-line {
    width: 156px;
    height: 1px;
    background-color: #434242;
    position: absolute;
    bottom: 0;
}
.sidebar-wrapper .info-wrapper .user-amount {
    margin-bottom: 12px;
    position: relative;
    padding-bottom: 3px;
    padding-top: 2px;
}
.sidebar-wrapper .info-wrapper .user-amount:after, .sidebar-wrapper .info-wrapper .user-amount:before {
    content: "";
    display: table;
}
.sidebar-wrapper .info-wrapper .user-amount span {
    font-size: 14px;
    font-weight: 700;
    background-image: linear-gradient(135deg, #cbab8b, #bb7a38);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FFD96B", endColorstr="#F9AB10", GradientType=1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    float: left;
    line-height: 21px;
    margin-right: 3px;
    cursor: pointer;
}
.sidebar-wrapper .info-wrapper .user-amount .refresh {
    width: 17px;
    height: 15px;
    background: url(/images/sx.png) no-repeat;
    float: right;
    background-size: 100% 100%;
    cursor: pointer;
    margin-top: 3px;
    margin-right: 4px;
}
.sidebar-wrapper .info-wrapper .user-amount:after {
    clear: both;
}
.sidebar-wrapper .info-wrapper .user-amount:after, .sidebar-wrapper .info-wrapper .user-amount:before {
    content: "";
    display: table;
}
.sidebar-wrapper .logged .money-wrapper {
    margin-bottom: 5px;
}
.sidebar-wrapper .money-wrapper {
    margin-bottom: 10px;
}
.sidebar-wrapper .money-wrapper:after {
    clear: both;
}
.sidebar-wrapper .money-wrapper:after, .sidebar-wrapper .money-wrapper:before {
    content: "";
    display: table;
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn {
    float: left;
    width: 33.333%;
    font-size: 12px;
    text-align: center;
    position: relative;
    cursor: pointer;
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn.deposit .btn-img {
    width: 26px;
    height: 20px;
    background-image: url(/images/ck.png);
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn.deposit:hover .btn-img {
    background-image: url(/images/ck1.png);
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn .btn-img {
    margin: 0 auto 8px;
    background-size: cover;
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn span {
    color: #414655;
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn:first-child:after, .sidebar-wrapper .logged .money-wrapper .new-money-btn:nth-child(2):after {
    content: "";
    display: block;
    width: 1px;
    height: 25px;
    position: absolute;
    top: 6px;
    right: 0;
    background-color: #4f4f4f;
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn.rebate .btn-img {
    margin: 0 auto 6px;
    width: 22px;
    height: 22px;
    background-image: url(/images/icon_12.png);
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn.rebate:hover .btn-img {
    background-image: url(/images/icon_12s.png);
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn.withdraw .btn-img {
    width: 26px;
    height: 20px;
    background-image: url(/images/qk.png);
}
.sidebar-wrapper .logged .money-wrapper .new-money-btn.withdraw:hover .btn-img {
    background-image: url(/images/qk1.png);
}
.sidebar-wrapper .tab-wrapper {
    min-height: 430px;
    margin-bottom: 10px;
    background-color: #fff;
    position: relative;
}
.sidebar-wrapper .tab-wrapper .side-tab.active, .sidebar-wrapper .tab-wrapper .side-tab:hover {
    opacity: 1;
    background-color: #fff9f3;
}
.sidebar-wrapper .tab-wrapper .side-tab {
    font-size: 14px;
    color: #414655;
    box-sizing: border-box;
    height: 44px;
    line-height: 44px;
    cursor: pointer;
    transition: .3s;
    position: relative;
    text-align: center;
}
.sidebar-wrapper .tab-wrapper .side-tab:hover {
    font-size: 16px;
	color:#d49c64;
}
.sidebar-wrapper .tab-wrapper .side-tab i {
    display: inline-block;
    width: 24px;
    height: 24px;
    margin-right: 5px;
    background-repeat: no-repeat;
	vertical-align: -7px;
	background-size: 232px 24px;
}
.asd1 {
    background-image: url(/images/sprite.png);
	background-position: -104px 0px;
}
.asd2 {
    background-image: url(/images/sprite.png);
	background-position: -52px 0px;
}
.asd3 {
    background-image: url(/images/sprite.png);
}
.asd4 {
    background-image: url(/images/sprite.png);
	background-position: -156px 0px;
}
.asd5 {
    background-image: url(/images/sprite.png);
	background-position: -25px 0px;
}
.asd6 {
    background-image: url(/images/sprite.png);
	background-position: -78px 0px;
}
.asd7 {
    background-image: url(/images/sprite.png);
	background-position: -129px 0px;
}
.asd8 {
    background-image: url(/images/sprite.png);
	background-position: -181px 0px;
}
.sidebar-wrapper .tab-wrapper .side-tab.active:after, .sidebar-wrapper .tab-wrapper .side-tab:hover:after {
    transform: scaleY(1);
}
.sidebar-wrapper .tab-wrapper .side-tab:after {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 4px;
    height: 100%;
    background-color: #e0bc97;
    transform: scaleY(0);
    transform-origin: center top;
    transition: .3s;
}
.sidebar-wrapper .tab-wrapper .logout-tab {
    color: #414655;
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    cursor: pointer;
    padding-bottom: 12px;
}
.sidebar-wrapper .tab-wrapper .logout-tab:before {
    content: "";
    display: block;
    width: 126px;
    height: 1px;
    background-color: rgba(67, 66, 66, .5);
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    margin: 0 auto;
}
.sidebar-wrapper .tab-wrapper .logout-tab .lg-icon {
    width: 20px;
    height: 20px;
    background-image: url(/images/tc.png);
    background-size: cover;
    margin: 17px auto 8px;
}
.sidebar-wrapper .tab-wrapper .logout-tab:hover .lg-icon {
    background-image: url(/images/tc1.png);
}
.sidebar-wrapper .service-wrapper {
    background-color: #fff;
    padding-top: 16px;
    padding-bottom: 12px;
    position: relative;
}
.sidebar-wrapper .service-wrapper:after {
    clear: both;
}
.sidebar-wrapper .service-wrapper:after, .sidebar-wrapper .service-wrapper:before {
    content: "";
    display: table;
}
.sidebar-wrapper .service-wrapper .hidden-line {
    position: absolute;
    width: 1px;
    height: 35px;
    background-color: #4f4f4f;
    top: 22px;
    left: 0;
    right: 0;
    margin: 0 auto;
}
.sidebar-wrapper .service-wrapper .online-btn {
    float: left;
}
.sidebar-wrapper .service-wrapper .callback-btn, .sidebar-wrapper .service-wrapper .online-btn {
    width: 79px;
    color: #414755;
    text-align: center;
    font-size: 13px;
    box-sizing: border-box;
    cursor: pointer;
    margin-bottom: 8px;
}
.sidebar-wrapper .service-wrapper .online-btn .icon-box {
    background-image: url(/images/kf.png);
}
.sidebar-wrapper .service-wrapper .online-btn:hover .icon-box {
    background-image: url(/images/kf1.png);
}
.sidebar-wrapper .service-wrapper .callback-btn .icon-box {
    background-image: url(/images/dh.png);
}
.sidebar-wrapper .service-wrapper .callback-btn:hover .icon-box {
    background-image: url(/images/dh1.png);
}
.sidebar-wrapper .service-wrapper .callback-btn .icon-box, .sidebar-wrapper .service-wrapper .online-btn .icon-box {
    width: 34px;
    height: 34px;
    margin: 0 auto 12px;
    background-size: cover;
}
.sidebar-wrapper .service-wrapper .callback-btn span, .sidebar-wrapper .service-wrapper .online-btn span {
    opacity: .6;
}
.sidebar-wrapper .service-wrapper .callback-btn {
    float: right;
}
.clearfix {
    clear: both;
}
.sidebar-wrapper .service-wrapper h3 {
    text-align: center;
    color: #d1a581;
    font-weight: 400;
    font-size: 16px;
}
.right-container {
    position: relative;
    width: 500px;
    float: left;
}
.right-container:after, .right-container:before {
    content: "";
    display: table;
}
.notice-wrapper {
    width: 1002px;
    height: 70px;
    float: left;
    position: relative;
    z-index: 0;
    padding: 10px 0;
    box-sizing: border-box;
}
.notice-wrapper:after {
    clear: both;
}
.notice-wrapper:after, .notice-wrapper:before {
    content: "";
    display: table;
}
.notice-wrapper .notification {
    width: 633px;
    height: 100%;
    float: left;
    overflow: hidden;
    cursor: pointer;
    background-color: #2c2c2d;
    margin-right: 6px;
}
.notice-wrapper .notification img {
    display: block;
    box-sizing: border-box;
    float: left;
    padding: 17px 4px 0 8px;
    width: 28px;
}
.notice-wrapper .notification .message-wrapper {
    color: #fff;
    opacity: .4;
    float: left;
    margin: 0;
    height: 50px;
    line-height: 50px;
    width: calc(100% - 32px);
    overflow: hidden;
}
.notice-wrapper .notification .message-wrapper p {
    white-space: nowrap;
    margin: 0;
    display: inline-block;
    transition-timing-function: linear;
    transform: translateX(1000px);
}
.notice-wrapper .search-input {
    width: 363px;
    height: 100%;
    float: left;
    background-color: #242424;
    position: relative;
    z-index: 98;
    padding: 0 15px 0 20px;
    box-sizing: border-box;
}
.notice-wrapper .search-input > img {
    display: block;
    box-sizing: border-box;
    float: right;
    padding: 13px 11px 12px 13px;
    width: 49px;
}
.page-wrapper {
    width: 1002px;
    float: left;
}


/*新版会员中心结束*/
.abutton {
    font-size: 14px;
    text-decoration: none;
    color: #fff;
    height: 30px;
    line-height: 30px;
    background: linear-gradient(270deg,#d2b496,#dccab8);
    padding: 4px 24px;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    box-sizing: border-box;
    border-radius: 50px;
}
.member-body, .dialog-component, .modal-dialog {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #414655;
}

.member-body {
	visibility: visible;
    max-width: 1002px;
    margin: 0 auto;
}
#banner {
    background-image: url(../images/banner.jpg);
    background-size: cover;
}
#banner {
    width: 100%;
    position: relative;
    height: 286px;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #000;
}
#layout-top-area {
    background-image: linear-gradient(90deg, #3a3736 170px ,#2b2923 270px,#544e45 910px,#35322d);
    position: relative;
    display: table;
    width: 100%;
    height: 50px;	
}

#layout-top-area .sider-area {
    color: rgb(216, 173, 119);
    position: absolute;
    width: 200px;
    font-size: 20px;
    text-align: center;
    padding-top: 11px;
    font-family: 黑体;
    margin-top: 3px;
    padding-top: 0;
    width: 180px;
    z-index: 10;	
}

#layout-top-area .nav-area {
    padding-left: 30px;
    height: 50px;
    border-top-right-radius: 5px;
    border-top-left-radius: 70px;
    border-bottom-right-radius: 70px;
    left: 180px;
    position: absolute;
    right: 0;
    color: #fff;
    font-size: 20px;
    list-style: none;
}
#layout-top-area .sider-area span:before {
    content: "\f2be";
    font-size: 30px;
    margin-right: 5px;
    font-family: "FontAwesome";
}
#layout-top-area .nav-area li {
    display: inline-block;
    width: 12.5%;
    text-align: center;
    font-size: 16px;
    position: relative;
	line-height: 50px;
}

#layout-top-area .nav-area li a {
    display: inline-block;
	width: 98px;
    line-height: 47px;
}
#layout-top-area .nav-area li a:hover {
    text-decoration:none;
}
.nav-area li.active a {
    color: #ffa131;
}
.nav-area li a {
    color: #ffe8bd;
    font-size: 12px;
    font-weight: bold;
}

#layout-main-area {
    display: table;
    height: 776px;
    width: 100%;
    position: relative;
}
#layout-main-area #main-menu {
    border-radius: 3px;
}

#main-container {
    background-color: #fff;
    margin: 0px;
    vertical-align: top;
    position: relative;	
}
#main-container1 {
    padding: 10px;
    background-color: #fff;
    vertical-align: top;
    position: relative;	
	width:100%;
}
.menu-area{
    width:100%
}
#main-menu {
    width: 20%;
	height:100%;
    background-color: #bbb7b1;
    padding: 0 10px;
	border-bottom-left-radius: 5px;
    vertical-align: top;	
	float:left
}
#main-menu .list-group {
    margin: 12px 0 0;
}

#main-menu .list-group .list-group-item {
    margin: 5px 0;
    color: #fff;
}
#main-menu .list-group-item {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;	
    padding-bottom: 6px !important;
    font-size: 16px;
    border: none;
    background-color: transparent;
    margin: 0;
    padding: 0;	
    cursor: pointer;	
}
#main-menu .list-group-item:first-child {
    border-radius: 0;
}

#main-menu .list-group .list-group-item a {
    background-color: #fff;
    padding-bottom: 7px;
    border-radius: 5px;
}
#main-menu .list-group-item a {
    padding-left: 50px;
    text-align: left;
    text-decoration: none;
    display: inline-block;
    width: 100%;
    padding-top: 7px;
    background-color: #fff;
    padding-bottom: 7px;
    border-radius: 5px;	
}
#main-menu a:visited, #main-menu a:link {
    color: #333;
}
#main-menu .list-group-item a:before {
    font-size: 25px;
    font-family: "FontAwesome";
    margin-left: -30px;
    margin-right: 10px;
    width: 30px;
    display: inline-block;
    text-align: center;
}
#main-menu .list-group .list-group-item.active a:after {
    font-size: 25px;
    font-family: "FontAwesome";
    content: "\f0da";
    float: right;
    margin-right: -7px;
	color: #bd512c;
}

#main-menu .list-group .list-group-item.active a {
    box-shadow: 4px 6px 8px #888;
    margin-right: -18px;
    color: #fff;
	background-color: #bd512c;

}
.list-group .payment a:before {
    background-image: url(../images/payment_menu.png);
    content: "\a0";
}
.list-group .payment.weixin a:before {
    background-position: -90px 0;
}
.list-group .payment.alipay a:before {
    background-position: -60px 0;
}
.list-group .payment.third_pay a:before {
    background-position: -210px 0;
}
.list-group .payment.qqpay a:before {
    background-position: -150px 0;
}
.list-group .member-info a:before {
    content: "\f15c";
	
}
.list-group .member-password a:before {
    content: "\f023";
    vertical-align: middle;
}
.list-group .member-password1 a:before {
    content: "\f14d";
    vertical-align: middle;
	color:#333
}
.list-group .system-message a:before {
    content: "\f028";
}
.list-group .complaint a:before {
    content: "\f098";
}
.list-group .activity a:before {
    content: "\f018";
}
.list-group .mymessage a:before {
    content: "\f0e0";
}
.info-container .info td {
    padding: 3px;
}

/* 主体 */
.module-main {
    height: auto !important;
    position: relative;
	padding: 0 10px;
	    margin-left: 7rem;
}
.module-main1 {
    height: auto !important;
    min-height: 560px;
    position: relative;
    padding: 0 35px 0 10px;
}
.info-container {
    color: #333;
}
.info-container .heading {
    border-left: 5px solid #995521;
    padding-left: 10px;
    font-size: 16px;
    line-height: 16px;
    margin-top: 5px;
    margin-bottom: 10px;
    color: #333;
}
.info-container .heading {
    border-left-color: rgb(179, 129, 65);
}
.info-container .info {
    background-color: #F8F8F8;
    border: 1px solid #ECE8E9;
}
.info-container .info {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ECE8E9;
    border-radius: 5px;
    background-color: #F8F8F8;
    margin-bottom: 20px;
}
.info-container .item-info span {
    font-size: 20px;
    color: #DF9917;
}
.top-menu-area {
    border-radius: 20px;
    width: 42%;
    background-color: #ebecec;
    border: 1px solid #cccccc;
    padding: 7px 10px;
	color: #333;
	margin:0 auto;
	text-align:center;
	overflow: hidden;
}
.top-menu-area a.active{
	color: #ec971f;
}
.top-menu-area a:hover{
	text-decoration:none;
}
.top-menu-area a:first-child {
    border-right:2px solid #848484;
}
.top-menu-area a:last-child{
	padding-left:4px !important;
}
.top-menu-area a {
    padding: 0;
    border: none;
    display: block;
    vertical-align: middle;
	color:#7b7b7b;
    padding:0 10px;
    border: none;
	width: 50%;
	float: left;
}
.module-top{
	margin:10px 0;
}
.form-group{
	overflow:hidden;
}
.form-group .info{
	padding-top:7px;
}

.list-head-container .list-head {
    background-color: #eceaea;
	padding: 5px 0;
}
.list-head, .list-footer {
    font-weight: bold;
    text-align: center;
    font-size: 15px;
    display: table;
    width: 100%;
}
.exchange td{
	text-align:center;
	padding:5px !important;
	vertical-align: middle !important;
}
.exchange td.exchange-money {
    color: #DF9917;
}
.exchange .btn-sm {
    padding: 2px 5px !important;
}
.info-container .btn-sm:hover{
	padding: 6px 11px !important;
}
.btn-primary {
    background-color: #d34e20;
}
.turn-action{
	margin:15px auto;
}
.turn-action a:hover{
	text-decoration:none;
}
.turn-action a{
	color:#333;
	display:inline-block;
	width:60px;
	text-align:center;
	padding:8px 16px;
	background-color:#F8F8F8;
	margin-right:-5px;
}
.turn-action a：visited{
	text-decoration:none;
}
.turn-action a.active{
	color: #fff;
    background-color: rgb(78,159,133);
}
.turn-area label{
	text-align:right;
	padding-top:7px;
}
.pay-time .col-xs-3{
	padding-left:0;
	padding-right:5px;
}
.pay-time .col-xs-3:last-child{
	padding-right:0;
}
.top-filter{
	overflow:hidden;
}

/* 资金流水 */
.table-top table{width: 100%;margin-top: 0 !important}
.table-top table thead{background: #e5e7e8}
.table-top table thead th{height: 36px;text-align: center;vertical-align: middle;font-size: 14px !important;font-weight: normal;color: #888;}
.table-top table tbody td{padding: 12px 10px 12px 10px;text-align: center;font-size: 14px !important;border-bottom: 0px solid #e6e6e6}

/*page*/
.tcdPageCode{color: #7d7b79;text-align:center;width:100%}
.tcdPageCode a{display: inline-block;color: #fff;display: inline-block;height: 25px;	line-height: 25px;	padding: 0 10px;  background: linear-gradient(to bottom, #aba8a8, #28343a);	margin: 0 3px;border-radius: 4px;vertical-align: middle;}
.tcdPageCode a:hover{text-decoration: none;color: #fff;background-color: #ff6644;}
.tcdPageCode span.current{display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 3px;color: #fff;background: linear-gradient(to bottom, #e09d3b, #b36046);border-radius: 4px;vertical-align: middle;}
.tcdPageCode span.disabled{	display: inline-block;height: 25px;line-height: 25px;padding: 0 10px;margin: 0 3px;color: #969393;background: linear-gradient(to bottom, #f7f9fb, #b2b7bb);;border-radius: 4px;vertical-align: middle;}

/* message */
.message-item{
	margin-bottom:15px !important;
	border-radius:4px;
	box-shadow: 0 0 7px rgba(0,0,0,.06);
}
.message-title{
	font-size:14px;
	color:#717171;
}
.message-content{
	font-size:12px;
	color:#777;
	line-height:20px;
}

/* layer */
.layui-layer-btn .layui-layer-btn0 {
    border-color: rgb(78,159,133) !important;
    background-color: rgb(78,159,133) !important;
}

.loading_shadow {
	position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    right: 0;
    background: rgba(255,255,255,0.0);
    z-index: 99999;
    text-align: center;
}
.loading_shadow .loading_win {
    display: inline-block;
    margin: 40px;
    margin-top: 30%;
}

.refresh {
    display: inline-block;
    background: url(/web/images/bg-ico.png) no-repeat center center;
    background-position: -80px -102px;
    width: 18px;
    height: 16px;
    margin-left: 10px;
    margin-top: 3px;
    vertical-align: inherit;
}

.member-container{
	margin-top:0px;
}


.Hyzx-right h3 {
    font: 15px/42px "microsoft yahei";
    height: 42px;
    color: #333;
    padding: 0 20px 0 0;
    border-bottom: 1px solid #787878;
}
.Hyzx-right h3 span {
    display: inline-block;
    width: 160px;
    text-align: center;
    font-size: 24px;
}
.flt {
    float: left;
}
.Hyzx-right h3 .Hyzx-btn {
    margin-top: 5px;
}
.Hyzx-btn.active {
    background: #8d5547;
}
.Hyzx-btn {
    /*display: block;*/
    font: 12px/26px arial;
    height: 26px;
    color: #fff;
    text-align: center;
    padding: 5px 10px;
    background: #959698;
    transition: all 0.3s;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
    margin-right: 1px;
    margin-bottom: 1px;
}
.Hyzx-btn:hover, .Hyzx-btn.active {
    background: #525456;
}
.Hyzx-right h3 .Hyzx-btn:nth-last-of-type(1) {
    position: relative;
    padding-right: 10px;
}
.Hyzx-right h3 .Hyzx-btn:nth-last-of-type(1):after {
    content: "";
    display: block;
    position: absolute;
    border-top: 26px solid transparent;
    border-left: 16px solid #8d5547;
    top: 0px;
    right: -16px;
    transition: all 0.3s;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
}
.Hyzx-right h3 .Hyzx-btn:nth-last-of-type(1):hover:after {
  border-left: 16px solid #a57f51;
}
.zfu{height:50px;line-height: 50px;float:left;text-align: center;}
.zfu1{color: #444343;display: block;height: 50px;line-height: 50px;padding: 0 18px;}
.zfu1:hover{color: #f3f3f3;}
.bgc{background:#414755;padding: 0 18px;}
.zfu:hover{background:#414655}
.abutton {
    font-size: 14px;
    text-decoration: none;
    color: #fff;
    height: 30px;
    line-height: 30px;
    background: linear-gradient(270deg,#d2b496,#dccab8);
    padding: 4px 24px;
    -webkit-transition-property: all;
    transition-property: all;
    -webkit-transition-duration: .3s;
    transition-duration: .3s;
    box-sizing: border-box;
    border-radius: 50px;
}
.btn-primaryaa {
    background-color: #e44812 !important;
}

#news{position:relative;height:40px;top:162px;background:rgba(0, 0, 0, 0.4);width:100%;position:fixed;z-index: 99;}
#news .wrapper:before{float:left;margin-right:10px;padding-left:5px;color:#ecc866;line-height:40px}
#hot-news{white-space:nowrap;overflow:hidden}
#hot-news a{color:#d8d4ce;font-size:14px;text-decoration:none;line-height:40px}
#hot-news a:hover{text-decoration:underline}
#marquee{width:600px;max-height:500px;margin:30px auto 0 auto;background-color:#fff;-moz-border-radius:5px;-webkit-border-radius:5px;border-radius:5px;cursor:default;-moz-transition:margin-top ease-in 300ms;-o-transition:margin-top ease-in 300ms;-webkit-transition:margin-top ease-in 300ms;transition:margin-top ease-in 300ms}
.wrapper{position:relative;width:1000px;margin:0 auto;}
.form-control {
	display:block;
	width:100% !important;
	height:46px !important;
	padding:6px 12px !important;
	font-size:14px !important;
	line-height:1.42857143 !important;
	color:#414655 !important;
	background-color:#fff;
	background-image:none;
	border:1px solid #dcdbdb;
	border-radius:4px;
	-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s
}

.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9 {
	position:relative;
	min-height:1px;
	padding-right:15px;
	padding-left:15px
}
.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9 {
	float:left
}
.col-xs-12 {
	width:100%
}
.col-xs-11 {
	width:91.66666667%
}
.col-xs-10 {
	width:73.3333333%
}
.col-xs-9 {
	width:75%
}
.col-xs-8 {
	width:100%
}
.col-xs-7 {
	width:58.33333333%
}
.col-xs-6 {
	width:50%
}
.col-xs-5 {
	width:41.66666667%
}
.col-xs-4 {
	width:33.33333333%
}
.col-xs-3 {
	width:25% !important
}
.col-xs-2 {
	width:16.66666667%
}
.col-xs-1 {
	width:8.33333333%
}
.col-xs-pull-12 {
	right:100%
}
.col-xs-pull-11 {
	right:91.66666667%
}
.col-xs-pull-10 {
	right:83.33333333%
}
.col-xs-pull-9 {
	right:75%
}
.col-xs-pull-8 {
	right:66.66666667%
}
.col-xs-pull-7 {
	right:58.33333333%
}
.col-xs-pull-6 {
	right:50%
}
.col-xs-pull-5 {
	right:41.66666667%
}
.col-xs-pull-4 {
	right:33.33333333%
}
.col-xs-pull-3 {
	right:25%
}
.col-xs-pull-2 {
	right:16.66666667%
}
.col-xs-pull-1 {
	right:8.33333333%
}
.col-xs-pull-0 {
	right:auto
}
.col-xs-push-12 {
	left:100%
}
.col-xs-push-11 {
	left:91.66666667%
}
.col-xs-push-10 {
	left:83.33333333%
}
.col-xs-push-9 {
	left:75%
}
.col-xs-push-8 {
	left:66.66666667%
}
.col-xs-push-7 {
	left:58.33333333%
}
.col-xs-push-6 {
	left:50%
}
.col-xs-push-5 {
	left:41.66666667%
}
.col-xs-push-4 {
	left:33.33333333%
}
.col-xs-push-3 {
	left:25%
}
.col-xs-push-2 {
	left:16.66666667%
}
.col-xs-push-1 {
	left:8.33333333%
}
.col-xs-push-0 {
	left:auto
}
.col-xs-offset-12 {
	margin-left:100%
}
.col-xs-offset-11 {
	margin-left:91.66666667%
}
.col-xs-offset-10 {
	margin-left:83.33333333%
}
.col-xs-offset-9 {
	margin-left:75%
}
.col-xs-offset-8 {
	margin-left:66.66666667%
}
.col-xs-offset-7 {
	margin-left:58.33333333%
}
.col-xs-offset-6 {
	margin-left:50%
}
.col-xs-offset-5 {
	margin-left:41.66666667%
}
.col-xs-offset-4 {
	margin-left:33.33333333%
}
.col-xs-offset-3 {
	margin-left:25%
}
.col-xs-offset-2 {
	margin-left:16.66666667%
}
.col-xs-offset-1 {
	margin-left:8.33333333%
}
.col-xs-offset-0 {
	margin-left:0
}
@media (min-width:768px) {
	.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9 {
	float:left
}
.col-sm-12 {
	width:100%
}
.col-sm-11 {
	width:91.66666667%
}
.col-sm-10 {
	width:83.33333333%
}
.col-sm-9 {
	width:75%
}
.col-sm-8 {
	width:66.66666667%
}
.col-sm-7 {
	width:58.33333333%
}
.col-sm-6 {
	width:50%
}
.col-sm-5 {
	width:41.66666667%
}
.col-sm-4 {
	width:33.33333333%
}
.col-sm-3 {
	width:25%
}
.col-sm-2 {
	width:16.66666667%
}
.col-sm-1 {
	width:8.33333333%
}
.col-sm-pull-12 {
	right:100%
}
.col-sm-pull-11 {
	right:91.66666667%
}
.col-sm-pull-10 {
	right:83.33333333%
}
.col-sm-pull-9 {
	right:75%
}
.col-sm-pull-8 {
	right:66.66666667%
}
.col-sm-pull-7 {
	right:58.33333333%
}
.col-sm-pull-6 {
	right:50%
}
.col-sm-pull-5 {
	right:41.66666667%
}
.col-sm-pull-4 {
	right:33.33333333%
}
.col-sm-pull-3 {
	right:25%
}
.col-sm-pull-2 {
	right:16.66666667%
}
.col-sm-pull-1 {
	right:8.33333333%
}
.col-sm-pull-0 {
	right:auto
}
.col-sm-push-12 {
	left:100%
}
.col-sm-push-11 {
	left:91.66666667%
}
.col-sm-push-10 {
	left:83.33333333%
}
.col-sm-push-9 {
	left:75%
}
.col-sm-push-8 {
	left:66.66666667%
}
.col-sm-push-7 {
	left:58.33333333%
}
.col-sm-push-6 {
	left:50%
}
.col-sm-push-5 {
	left:41.66666667%
}
.col-sm-push-4 {
	left:33.33333333%
}
.col-sm-push-3 {
	left:25%
}
.col-sm-push-2 {
	left:16.66666667%
}
.col-sm-push-1 {
	left:8.33333333%
}
.col-sm-push-0 {
	left:auto
}
.col-sm-offset-12 {
	margin-left:100%
}
.col-sm-offset-11 {
	margin-left:91.66666667%
}
.col-sm-offset-10 {
	margin-left:83.33333333%
}
.col-sm-offset-9 {
	margin-left:75%
}
.col-sm-offset-8 {
	margin-left:66.66666667%
}
.col-sm-offset-7 {
	margin-left:58.33333333%
}
.col-sm-offset-6 {
	margin-left:50%
}
.col-sm-offset-5 {
	margin-left:41.66666667%
}
.col-sm-offset-4 {
	margin-left:33.33333333%
}
.col-sm-offset-3 {
	margin-left:25%
}
.col-sm-offset-2 {
	margin-left:16.66666667%
}
.col-sm-offset-1 {
	margin-left:8.33333333%
}
.col-sm-offset-0 {
	margin-left:0
}
}@media (min-width:992px) {
	.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9 {
	float:left
}
.col-md-12 {
	width:100%
}
.col-md-11 {
	width:91.66666667%
}
.col-md-10 {
	width:83.33333333%
}
.col-md-9 {
	width:75%
}
.col-md-8 {
	width:66.66666667%
}
.col-md-7 {
	width:58.33333333%
}
.col-md-6 {
	width:50%
}
.col-md-5 {
	width:41.66666667%
}
.col-md-4 {
	width:33.33333333%
}
.col-md-3 {
	width:25%
}
.col-md-2 {
	width:16.66666667%
}
.col-md-1 {
	width:8.33333333%
}
.col-md-pull-12 {
	right:100%
}
.col-md-pull-11 {
	right:91.66666667%
}
.col-md-pull-10 {
	right:83.33333333%
}
.col-md-pull-9 {
	right:75%
}
.col-md-pull-8 {
	right:66.66666667%
}
.col-md-pull-7 {
	right:58.33333333%
}
.col-md-pull-6 {
	right:50%
}
.col-md-pull-5 {
	right:41.66666667%
}
.col-md-pull-4 {
	right:33.33333333%
}
.col-md-pull-3 {
	right:25%
}
.col-md-pull-2 {
	right:16.66666667%
}
.col-md-pull-1 {
	right:8.33333333%
}
.col-md-pull-0 {
	right:auto
}
.col-md-push-12 {
	left:100%
}
.col-md-push-11 {
	left:91.66666667%
}
.col-md-push-10 {
	left:83.33333333%
}
.col-md-push-9 {
	left:75%
}
.col-md-push-8 {
	left:66.66666667%
}
.col-md-push-7 {
	left:58.33333333%
}
.col-md-push-6 {
	left:50%
}
.col-md-push-5 {
	left:41.66666667%
}
.col-md-push-4 {
	left:33.33333333%
}
.col-md-push-3 {
	left:25%
}
.col-md-push-2 {
	left:16.66666667%
}
.col-md-push-1 {
	left:8.33333333%
}
.col-md-push-0 {
	left:auto
}
.col-md-offset-12 {
	margin-left:100%
}
.col-md-offset-11 {
	margin-left:91.66666667%
}
.col-md-offset-10 {
	margin-left:83.33333333%
}
.col-md-offset-9 {
	margin-left:75%
}
.col-md-offset-8 {
	margin-left:66.66666667%
}
.col-md-offset-7 {
	margin-left:58.33333333%
}
.col-md-offset-6 {
	margin-left:50%
}
.col-md-offset-5 {
	margin-left:41.66666667%
}
.col-md-offset-4 {
	margin-left:33.33333333%
}
.col-md-offset-3 {
	margin-left:25%
}
.col-md-offset-2 {
	margin-left:16.66666667%
}
.col-md-offset-1 {
	margin-left:8.33333333%
}
.col-md-offset-0 {
	margin-left:0
}
}@media (min-width:1200px) {
	.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9 {
	float:left
}
.col-lg-12 {
	width:100%
}
.col-lg-11 {
	width:91.66666667%
}
.col-lg-10 {
	width:83.33333333%
}
.col-lg-9 {
	width:75%
}
.col-lg-8 {
	width:66.66666667%
}
.col-lg-7 {
	width:58.33333333%
}
.col-lg-6 {
	width:50%
}
.col-lg-5 {
	width:41.66666667%
}
.col-lg-4 {
	width:33.33333333%
}
.col-lg-3 {
	width:25%
}
.col-lg-2 {
	width:16.66666667%
}
.col-lg-1 {
	width:8.33333333%
}
.col-lg-pull-12 {
	right:100%
}
.col-lg-pull-11 {
	right:91.66666667%
}
.col-lg-pull-10 {
	right:83.33333333%
}
.col-lg-pull-9 {
	right:75%
}
.col-lg-pull-8 {
	right:66.66666667%
}
.col-lg-pull-7 {
	right:58.33333333%
}
.col-lg-pull-6 {
	right:50%
}
.col-lg-pull-5 {
	right:41.66666667%
}
.col-lg-pull-4 {
	right:33.33333333%
}
.col-lg-pull-3 {
	right:25%
}
.col-lg-pull-2 {
	right:16.66666667%
}
.col-lg-pull-1 {
	right:8.33333333%
}
.col-lg-pull-0 {
	right:auto
}
.col-lg-push-12 {
	left:100%
}
.col-lg-push-11 {
	left:91.66666667%
}
.col-lg-push-10 {
	left:83.33333333%
}
.col-lg-push-9 {
	left:75%
}
.col-lg-push-8 {
	left:66.66666667%
}
.col-lg-push-7 {
	left:58.33333333%
}
.col-lg-push-6 {
	left:50%
}
.col-lg-push-5 {
	left:41.66666667%
}
.col-lg-push-4 {
	left:33.33333333%
}
.col-lg-push-3 {
	left:25%
}
.col-lg-push-2 {
	left:16.66666667%
}
.col-lg-push-1 {
	left:8.33333333%
}
.col-lg-push-0 {
	left:auto
}
.col-lg-offset-12 {
	margin-left:100%
}
.col-lg-offset-11 {
	margin-left:91.66666667%
}
.col-lg-offset-10 {
	margin-left:83.33333333%
}
.col-lg-offset-9 {
	margin-left:75%
}
.col-lg-offset-8 {
	margin-left:66.66666667%
}
.col-lg-offset-7 {
	margin-left:58.33333333%
}
.col-lg-offset-6 {
	margin-left:50%
}
.col-lg-offset-5 {
	margin-left:41.66666667%
}
.col-lg-offset-4 {
	margin-left:33.33333333%
}
.col-lg-offset-3 {
	margin-left:25%
}
.col-lg-offset-2 {
	margin-left:16.66666667%
}
.col-lg-offset-1 {
	margin-left:8.33333333%
}
.col-lg-offset-0 {
	margin-left:0
}
.form-horizontal .control-label{padding:0; width:18% !important;}
.form-control[disabled],.form-control[readonly],fieldset[disabled] .form-control {
	background-color:#f3f3f3de;
	opacity:1
}
.form-control[disabled],fieldset[disabled] .form-control {
	cursor:not-allowed
}
/* CSS Document */
.uIconchose { cursor:pointer; width:80px; height:80px; overflow:hidden; position:relative; margin:0 auto 12px; border-radius:50%;}
.uIconchose img { display:block; width:100%;}
.uIconchose span{ position:absolute; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.3); display:none;}
.uIconchose span i {width: 25px;
    height: 22px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate3d(-50%,-50%,0);
	background-image:url(../css/images/spritephoto.png);
    background-repeat: no-repeat;
    background-size: 50px 22px;
    background-position: 0 0;}
.uIconchose:hover span { display:block;}
.choseAlticon { 
    display: none;
    height: 498px;
    overflow: hidden;
    width: 480px;
    border-radius: 8px;
    position: fixed;
    left: 50%;
    top: 50%;
    z-index: 5;
    transform: translate(-50%,-50%);
    background: #fff;}
.choseiconTit {    width: 100%;
    height: 48px;
    line-height: 48px;
    text-align: center;
    font-size: 18px;
    color: #fff;
    background-image: linear-gradient(97deg,#dccab8,#d2b496);
    position: relative;}
.closeAlt {    position: absolute;
    right: 18px;
    top: 16px;
    display: block;
    width: 16px;
    height: 16px;
    cursor: pointer;
	background-image: url(../css/images/icon_closed.png);
    background-repeat: no-repeat;
    background-size: contain;}
.img-preview { margin:40px auto 0;}
.img-preview img { width:120px; height:120px; display:block; border-radius:50%; margin:0 auto;}
.iconListbox {width: 100%;
    padding: 0 17px;
    margin-top: 40px;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;}
.iconListbox li {margin: 0 5px 20px;
    border-radius: 50%; cursor:pointer;
    height: 60px;
    width: 60px; box-sizing:border-box;
    position: relative;}
.iconListbox li img { display:block; width:100%; height:100%;}
.iconListbox li.on {border: 2px solid #b1987f!important;}
.iconListbox li:hover { border: 2px solid #b1987f!important;}
.iconListbox li.on:before { content:'';    content: "";
    display: block;
    border: 5px solid transparent;
    border-bottom-color: #b1987f;
    position: absolute;
    left: 50%;
    transform: translate3d(-50%,0,0);
    bottom: -8px;}
.choseAlticon .sureIconuser{width: 320px;
    height: 40px;
    line-height: 40px;
    border: none;
    border-radius: 4px;
    text-align: center;
    box-shadow: 0 4px 6px 4px rgba(219,198,177,.24);
    background: linear-gradient(99deg,#dccab8,#d2b496);
    font-size: 14px;
    color: #fff;
    box-sizing: border-box;
    cursor: pointer; display:block; margin:20px auto;}
#screen { display:none; z-index:3; position:fixed; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.5);}

.member-body *, .dialog-component *, .modal-dialog * {

    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-group {
    margin: 15px 0;
}
/* 资金流水 */
.table-top table{width: 100%;margin-top: 0 !important}
.table-top table thead{background: #e5e7e8}
.table-top table thead th{height: 36px;text-align: center;vertical-align: middle;font-size: 14px !important;font-weight: normal;color: #888;}
.table-top table tbody td{padding: 12px 10px 12px 10px;text-align: center;font-size: 14px !important;border-bottom: 0px solid #e6e6e6}
.table-striped>tbody>tr:nth-of-type(even) {
	background-color:#f3f3f3
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
			</style>