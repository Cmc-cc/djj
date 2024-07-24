<!DOCTYPE html>
<!-- saved from url=(0025)/m -->
<html style="font-size:52px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
    <meta name="csrf-token" content="tOOOsj01s4j0MxU9zbEhfByWzjN7TUahAmo2mAzM">
	<link type="text/css" rel="stylesheet" href="/new/css/swiper.css">
	<link type="text/css" rel="stylesheet" href="/new/css/reset.css">
	<link type="text/css" rel="stylesheet" href="/new/css/style.css?v=20230825">
	
	<link rel="apple-touch-icon" href="/wap/images/iconq.png">

	<script type="text/javascript" src="/new/css/jquery.js"></script>
	<script type="text/javascript" src="/new/css/font.js"></script>
	<script type="text/javascript" src="/new/css/swiper.min.js"></script>
	<script type="text/javascript" src="/new/css/jquery.SuperSlide.2.1.js"></script>

	<style>
    .jump{
                padding:20px;
                /* 设置图片跳动动画 */
                animation: jump 1.5s ease infinite;
            }
    @keyframes jump{
                0%{ transform:translateY(0) scale(1,1);}
                /* 中间状态图片位移并且拉伸 */
                50%{transform:translateY(-50px) scale(0.97,1.03);}
                100%{transform:translateY(0) scale(1,1);}
            }
            
            .noticeBtn {
            	width: .42rem;
            	height: .42rem;
            	background: url(../images/sprite.png) no-repeat -10.23rem 0;
            	background-size: 14.3rem .48rem;
            	position: relative;
            
                left: 5.5rem
            }
            .userChoses {
               position: absolute;
                width: 35px !important;
                height: 35px !important;
                /* border-radius: 50%; */
                /* border: 0.04rem solid #d4cc9a; */
                /* overflow: hidden; */
                top: 0;
                left: 0.23rem
            }
            .noticeAltbox1{
                z-index: 1000 !important;
            }
</style>
    	<meta name="apple-mobile-web-app-capable" content="yes"><!-- 删除苹果默认的工具栏和菜单栏 -->
    <meta name="x5-fullscreen" content="true"><!-- QQ强制全屏 -->
    <meta name="full-screen" content="yes"><!-- UC强制全屏 -->
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss"></head>
<body class="m_bac">
	<!--<img id="layertitle" src="/new/img/goback.png" style="position:fixed;top:10px;right:10px;z-index:99999999;display:none;width:40px;">-->

	<!-- <img  src="/zhuanpan/z2.png" style="position:fixed;right:10px;top:150px;width:70px;z-index:9" class="jump tojump"> -->
	<!-- <div class="header">
    <img src="/uploads/logo/e37c1ed3c4fa52f7f906ea1b09a1a3cc2e4a25be.png">
    <div class="noticeBtn"><a href="https://direct.lc.chat/13354977/;"></a></div>
</div> -->
<div class="header">
    	<div class="headerTop" style="height: 20px;">
             <div class="userName" style="display:none">
                @if (!Auth::guard('member')->guest())
                    <p>{{ $_member -> name }}</p>
                @else
                    <p>請登錄</p>
                @endif
              </div>
              <div class="glodBox" style="display:none">
                <img src="../images/jinbin.png" class="glodImg">
                
                <p class="member_money">{{@$_member -> money?$_member -> money:'0.00'}}</p>
              </div>
              
              <div class="noticeBtn" onclick="window.location.href='/m/msg'" style="background: url(/images/xiaoxi.png);background-size:100% 100%;"></div>
              
              <!--<img src="../images/i_sound.png?v=23" class="img1 img_guanbi" style="width: 30px;position: absolute; right: 65px">-->
              <!-- <img src="../images/i_flag_tw.png?v=23" class="img1 img_guanbi" style="width: 35px;position: absolute; right: 9px">-->
            @if (!Auth::guard('member')->guest())
                
                <!--<a href="/m/drawing" class="signBtn">{{trans("lang.tixian")}}</a>-->
                <!--<a href="/m/recharge" class="signBtn">{{trans("lang.chongzhi")}}</a>-->
            @else
                <!--<a href="/m/login" class="signBtn">{{trans("lang.denglu")}}</a>-->
                <!--<a href="/m/register" class="signBtn">{{trans("lang.zhuce")}}</a>-->
            @endif
        </div>
     <!--<div class="headerNotice">-->
     <!--       <div class="txtMarquee-left">-->
     <!--           <div class="bd">-->
          
     <!--                <div class="tempWrap" style="overflow:hidden; position:relative; width:759px">-->
     <!--                   <marquee style="color:#fff;font-size:.26rem; line-height:.6rem;">{{$system_notices2->content}}&nbsp;&nbsp;&nbsp;&nbsp;{{trans("lang.zxrs")}}<?php //echo rand(11000,13000)?></marquee>-->
    	<!--				</ul>-->
    	<!--			</div>-->
     <!--            </div>-->
     <!--        </div>-->
     <!--    </div>-->
     <div class="userChoses">
        <img src="{{$setting->m_site_logo}}">
     </div>
</div>	<div class="banner" >
			<div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
				<div class="swiper-wrapper" >
				    
				    @foreach($banners as $item)
					<div class="swiper-slide" data-swiper-slide-index="0" >
						<a><img src="{{$item->path}}" style="border-radius:0.1rem"></a>
					</div>
					 @endforeach
					<!--<div class="swiper-slide" data-swiper-slide-index="1" >-->
					<!--	<a><img src="/css/img/4f9d541593d82b5431e7a0d188b5807d248dc7a2.jpg"></a>-->
					<!--</div>-->
					<!--<div class="swiper-slide" data-swiper-slide-index="2" >-->
					<!--	<a><img src="/css/img/4f9d541593d82b5431e7a0d188b5807d248dc73.jpg"></a>-->
					<!--</div>-->
					<!--<div class="swiper-slide" data-swiper-slide-index="3" >-->
					<!--	<a><img src="/css/img/4f9d541593d82b5431e7a0d188b580748dc4.jpg"></a>-->
					<!--</div>-->
					<!--<div class="swiper-slide" data-swiper-slide-index="4" >-->
					<!--	<a><img src="/css/img/4f9d541593d82b5431e7a0d188b580748d5.jpg"></a>-->
					<!--</div>-->
					<!--<div class="swiper-slide" data-swiper-slide-index="5" >-->
					<!--	<a><img src="/css/img/4f9d541593d82b5431e7a0d188b5807d248dc6.jpg"></a>-->
					<!--</div>					-->
				</div>
				<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
			</div>
	</div>

	
	
	
	<style>
	    .gameitem-live-img{
	        
	    }
	    
	    
	    .txtMarquee-left{
	       width: 5.2rem!important;
	    }
	    .headerNotice{
	       padding-left: 0.2rem;
	       margin-bottom: 0.1rem;
	       color: #000;
	       background: none;
	    }
	    .txtMarquee-left{
	        background: url(../images/i_noitce.png) left center no-repeat;
	        background-size: 0.4rem;
	        padding-right: 10px!important;
	    }
	    .userChose{
	        top: -10px!important
	    }
	    
	    .home-link-bar .tab {
    display: flex;
    justify-content: space-between;
    padding: 10px;
}


.home-link-bar .tab .tab-left {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    color: #b1987f;
    font-size: 4vmin;
}

.home-link-bar .tab .tab-right {
    /*width: 36vmin;*/
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    /*padding-left: .4rem;*/
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

html[language='en'] .home-link-bar .tab .tab-right {
    width: 46vmin;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    /*padding-left: .4rem;*/
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

html[language='vn'] .home-link-bar .tab .tab-right {
    width: 28vmin;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    /*padding-left: .4rem;*/
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
}

html[language='th'] .home-link-bar .tab .tab-right {
    width: 46vmin;
}

.home-link-bar .tab .tab-right .tab-right-btn {
    width: 13vmin;
    text-align: center;
}

html[language='en'] .home-link-bar .tab .tab-right .tab-right-btn {
    width: 18vmin;
    text-align: center;
}

html[language='vn'] .home-link-bar .tab .tab-right .tab-right-btn {
    width: 13vmin;
    text-align: center;
}

html[language='th'] .home-link-bar .tab .tab-right .tab-right-btn {
    width: 18vmin;
    text-align: center;
}

.home-link-bar .tab .tab-right .tab-right-btn .deposit-icon{
    width: 10vmin;
    height: 10vmin;
    background: url(../images/sprite1.png) no-repeat 0 0;
    background-size: 115vmin 15vmin;
    background-position: 0 0;
    display:block; 
    margin:auto;
}

.home-link-bar .tab .tab-right .tab-right-btn .transfer-icon{
    width: 10vmin;
    height: 10vmin;
    background: url(../images/sprite1.png) no-repeat 0 0;
    background-size: 115vmin 15vmin;
    background-position: -10vmin 0;
    display:block; 
    margin:auto;
}

.home-link-bar .tab .tab-right .tab-right-btn .withdraw-icon{
    width: 10vmin;
    height: 10vmin;
    background: url(../images/sprite1.png) no-repeat 0 0;
    background-size: 115vmin 15vmin;
    background-position: -20vmin 0;
    display:block; 
    margin:auto;
}

.home-link-bar .tab .tab-right .tab-right-btn .vip-icon{
    width: 10vmin;
    height: 10vmin;
    background: url(../images/sprite1.png) no-repeat 0 0;
    background-size: 115vmin 15vmin;
    background-position: -30.2vmin 0;
}
.home-link-bar .tab .tab-right .tab-right-btn .xingxing-icon{
    width: 10vmin;
    height: 10vmin;
    background: url(../images/sprite1.png) no-repeat 0 0;
    background-size: 115vmin 15vmin;
    background-position: -30vmin 0;
    display:block; 
    margin:auto;
}
	    .gameList{
	        padding: 0.1rem;
	        position: absolute;
            top: 6rem;
	    }
	    
	    .box {padding-top:.1rem;padding-left:.12rem;padding-right: .1rem!important;}
	    
	</style>
	
	
	<div class="headerNotice">
	   
        <div class="txtMarquee-left">
            
            <div class="bd">
      
                 <div class="tempWrap" style="overflow:hidden; position:relative; width:759px">
                    <marquee style="color:#9aa4c2;font-size:.24rem; line-height:.6rem;">{{$system_notices2->content}}&nbsp;&nbsp;&nbsp;&nbsp;{{trans("lang.zxrs")}}<?php echo rand(11000,13000)?></marquee>
                    
    			
    			</div>
    			<
             </div>
         </div>
         
          <div class="hotTag">
              <img src="https://www.emb141.com/wap/images/iconHotEvents.png" style="width: 1.3rem;
    position: absolute;
    right: 10px;
    top: 4rem">
          </div>
     </div>
	
	<div class="home-link-bar">
	    
	    	<div class="tab">
            	<div class="tab-left">
            	      @if (Auth::guard('member')->guest())
            	 <!--   <div class="moneystyle">-->
            	 <!--       <a href="/m/login" style="color:#b1987f">登入</a>/-->
            	 <!--       <a href="/m/register" style="color:#b1987f">註冊</a>-->
            	 <!--   </div>-->
            	 <!--   <div class="onlineusers" style="font-size:14px;">-->
            		<!--	<div class="onlineusersimg" style="padding: 10px 0px">-->
            		<!--	    線上人數:-->
            		<!--		<span class="onlinepeople"><?php //echo rand(11000,13000)?></span>-->
            		<!--	</div>-->
            		<!--</div>-->
            		<div style="">
            	        <a href="/m/login">
            				<p style="font-size: .28rem;color: #414655;height: .4rem;line-height: .4rem;">您還未登錄</p>
            				<p style="font-size: .24rem;color: #a5a9b3;height: .4rem;line-height: .4rem;">
            				    <a href="/m/login" style="color:#a5a9b3">請先登錄</a>/<a href="/m/register" style="color:#a5a9b3">註冊後查看</a>
            				    </p>
            			</a>
            		</div>
            		  @endif
        		  	@if (!Auth::guard('member')->guest())
					<div class="onlineusers" style="font-size:14px;">
						<div class="onlineusersimg">
						    
							<span class="onlinepeople" style="margin-left:3px;">{{@$_member->name}}</span>
						</div>
					</div>
					<div class="moneystyle">
						<span class="mark-txt" style="margin-left:2px;">	<img src="../images/jinbin.png"  style="vertical-align:middle;width:23px;margin-left:0px;margin-top:-3px;display:inline-block">$<text id="gamemoney" class="gamemoney_text">{{@$_member -> money?$_member -> money:'0.00'}}</text></span>
					
					
					</div>
					
					@endif
            		  
            		  
            	</div>
            	<div class="tab-right">
            	        
            	        @if (!Auth::guard('member')->guest())
                           <div class="tab-right-btn btn-pop" data-pop="recharge-dialog" onclick="window.location.href='/m/recharge'">
            				<div class="deposit-icon"></div>
            				<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;">{{trans("lang.chongzhi")}}</h4>
            				<h4 style="height: 3vmin;"></h4>
            			</div>
            			<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog" onclick="window.location.href='/m/drawing'">
            				<div class="withdraw-icon"></div>
            				<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;">{{trans("lang.tixian")}}</h4>
            				<h4 style="height: 3vmin;"></h4>
            			</div>
            			<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog" onclick="window.location.href='/m/msg'">
            				<div class="xingxing-icon"></div>
            				<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;" class="icon4">{{trans("lang.xiaoxi")}}</h4>
            				<h4 style="height: 3vmin;"></h4>
            			</div>
                        @else
                             <div class="tab-right-btn btn-pop" data-pop="recharge-dialog" onclick="window.location.href='/m/drawing'">
            				<div class="deposit-icon"></div>
            				<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;">{{trans("lang.chongzhi")}}</h4>
            				<h4 style="height: 3vmin;"></h4>
            			</div>
            			<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog" onclick="window.location.href='/m/recharge'">
            				<div class="withdraw-icon"></div>
            				<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;">{{trans("lang.tixian")}}</h4>
            				<h4 style="height: 3vmin;"></h4>
            			</div>
            			<div class="tab-right-btn btn-pop" data-pop="withdraw-dialog" onclick="window.location.href='/m/msg'">
            				<div class="xingxing-icon"></div>
            				<h4 style="color:#b1987f; font-size: 3vmin; font-weight: 400;" class="icon4">{{trans("lang.xiaoxi")}}</h4>
            				<h4 style="height: 3vmin;"></h4>
            			</div>
                        @endif
            	    
                       
            								
            	</div>
             </div>
	    
	</div>

	
	<style>
	
	
    	.gameControl .gameChose.active {
            	border-bottom-left-radius: .24rem;
            	border-bottom-right-radius: .24rem;
            	box-shadow: 0 0.08rem 0.12rem 0 rgba(168,135,102,.5);
            	background-repeat: no-repeat;
            	background-size: cover;
            	border-bottom: 1px solid #bd9f7f;
            	background-image: url(../images/tabSelected.png);
        }
        .gameChose {
        	width: 1.2rem;
        	height: .8rem;
        	box-sizing: border-box;
        	margin-bottom: .2rem;
        	border-radius: .2rem;
        	box-shadow: 0 0.08rem 0.12rem 0 rgba(65,70,92,.3);
        	background-image: url(../images/tabNormal.png);
        	background-repeat: no-repeat;
        	background-position: 50%;
        	background-size: 100% 100%;
        	-webkit-box-align: center;
        	align-items: center;
        	position: relative;
        	overflow: hidden;
        	margin-left: 0.1rem;
        }
        .icon5 {
	width: .8rem;
	height: .8rem;
	position: absolute;
	left: -.08rem;
	background-image: url(../images/home_tabs.png);
	background-repeat: no-repeat;
	background-size: .98rem 11.52rem;
	background-position: -.05rem -.05rem;
}

.icon6 {
	width: .8rem;
	height: .8rem;
	position: absolute;
	left: -.08rem;
	background-image: url(../images/home_tabs.png);
	background-repeat: no-repeat;
	background-size: .98rem 11.52rem;
	background-position: -.04rem -1rem;
}

.icon7 {
	width: .8rem;
	height: .8rem;
	position: absolute;
	left: -.08rem;
	background-image: url(../images/home_tabs.png);
	background-repeat: no-repeat;
	background-size: .98rem 11.52rem;
	background-position: -.04rem -4.84rem;
}

.icon8 {
	width: .8rem;
	height: .8rem;
	position: absolute;
	left: -.08rem;
	background-image: url(../images/home_tabs.png);
	background-repeat: no-repeat;
	background-size: .98rem 11.52rem;
	background-position: -.04rem -2.92rem;
}

.icon9 {
	width: .8rem;
	height: .8rem;
	position: absolute;
	left: -.08rem;
	background-image: url(../images/home_tabs.png);
	background-repeat: no-repeat;
	background-size: .98rem 11.52rem;
	background-position: -.04rem -1.96rem;
}

.icon10 {
	width: .8rem;
	height: .8rem;
	position: absolute;
	left: -.08rem;
	background-image: url(../images/home_tabs.png);
	background-repeat: no-repeat;
	background-size: .98rem 11.52rem;
	background-position: -.04rem -3.88rem;
}
.gameChose span {
	display: inline-block;
	width: .52rem;
	text-align: center;
	font-size: .2rem;
	color: #9aa4c2;
	position: absolute;
	right: .04rem;
	top: .32rem;
}

.gameControl .gameChose.active .icon5 {
	background-position: -.04rem -5.83rem;
}

.gameControl .gameChose.active .icon6 {
	background-position: -.04rem -6.79rem;
}

.gameControl .gameChose.active .icon7 {
	background-position: -.04rem -10.63rem;
}

.gameControl .gameChose.active .icon8 {
	background-position: -.04rem -8.71rem;
}

.gameControl .gameChose.active .icon9 {
	background-position: -.04rem -7.75rem;
}

.gameControl .gameChose.active .icon10 {
	background-position: -.04rem -9.67rem;
}

.gameControl .gameChose.active {
	border-bottom-left-radius: .24rem;
	border-bottom-right-radius: .24rem;
	box-shadow: 0 0.08rem 0.12rem 0 rgba(168,135,102,.5);
	background-repeat: no-repeat;
	background-size: cover;
	border-bottom: 1px solid #bd9f7f;
	background-image: url(../images/tabSelected.png);
}

.gameControl .gameChose.active span {
	color: #fff;
}

.gameBox {
	display: flex;
	-webkit-box-pack: justify;
	justify-content: space-between;
}

.gameChose {
	width: 1.2rem;
	height: .8rem;
	box-sizing: border-box;
	margin-bottom: .2rem;
	border-radius: .2rem;
	box-shadow: 0 0.08rem 0.12rem 0 rgba(65,70,92,.3);
	background-image: url(../images/tabNormal.png);
	background-repeat: no-repeat;
	background-position: 50%;
	background-size: 100% 100%;
	-webkit-box-align: center;
	align-items: center;
	position: relative;
	overflow: hidden;
}
.cardBottom a {
	display: block;
	float: left;
	background: #d9d9d9;
	/*height: 2.8rem;*/
	border-radius: .12rem;
	box-shadow: 0 0.04rem 0.2rem 0 rgba(65,70,92,.3);
	position: relative;
	width: 100%;
	-webkit-box-direction: normal;
	box-sizing: border-box;
	overflow: hidden;
	margin-bottom: .15rem;
}

.cardBottom a:nth-child(2n) {
	float: right;
}
.gameBox .swiper-slide {
    background: none!important;
}
.gameBox .swiper-container{
    height:7rem;
}

.noticeAltbox-bottom{ display:flex; justify-content:center; flex-wrap:wrap; padding:10px 0;}
    .noticeAltbox-bottom span{    background: #d2b79c;
    color: #ffffff;
    width: 40%;
    text-align: center;
    line-height: 40px;
    margin: 10px;
    border-radius: 6px;}
	</style>
	
	<div class="gameList">
	<div class="gameBox">
    	<div class="gameControl">
    	    <div class="gameChose active">
            	<div class="icon10"></div>
                <span>電子</span>
            </div>
            <div class="gameChose">
            	<div class="icon6"></div>
                <span>真人</span>
            </div>
            <div class="gameChose">
            	<div class="icon7"></div>
                <span>棋牌</span>
            </div>
        	<div class="gameChose ">
            	<div class="icon5"></div>
                <span>體育</span>
            </div>
            
            <div class="gameChose">
            	<div class="icon8"></div>
                <span>捕鱼</span>
            </div>
            <!--<div class="gameChose">-->
            <!--	<div class="icon9"></div>-->
            <!--    <span>彩票</span>-->
            <!--</div>-->
            
        </div>
		<div class="gameBar">
			<div class="swiper-container swiper-container-initialized swiper-container-vertical swiper-container-ios" id="swiper-container1">
    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
      <div class="swiper-slide swiper-slide-active" style="height: 331px;">
      	<div class="swiper-container swiper-container2 swiper-container-initialized swiper-container-vertical swiper-container-free-mode swiper-container-ios">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
              <div class="swiper-slide swiper-slide-active">                
					<div class="box">
					
						<div class="cardBottom">
								<a class="toplay2" @if($_member) data-url="/game/playGame?plat_type=JK&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="JK"><img src="https://www.hkblr.com/images/JOKER.png"></a>
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=JD&game_type=SL&game_code=&devices=1" @else data-url="" @endif data-code="JD"><img src="https://www.hkblr.com/images/JDB.png"></a>
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PG&game_type=SL&game_code=&devices=1" @else data-url="" @endif data-code="PG"><img src="https://www.hkblr.com/images/PG.png"></a>
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=CQ&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="CQ"><img src="https://www.hkblr.com/images/LIVE22.png"></a>
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PS&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="PS"><img src="https://www.hkblr.com/images/game/yg.png"></a>
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PN&game_type=3&game_code=&devices=1" @else data-url="" @endif data-code="PN"><img src="https://www.hkblr.com/images/game/png.png"></a>
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=GB&game_type=SL&game_code=&devices=1" @else data-url="" @endif data-code="PN"><img src="/bbindz.jpg"></a>
						</div>
					</div>
               </div>
            </div>
         <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
       <div class="swiper-slide swiper-slide-next" style="height: 331px;">
      	<div class="swiper-container swiper-container2 swiper-container-initialized swiper-container-vertical swiper-container-free-mode swiper-container-ios">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
              <div class="swiper-slide swiper-slide-active">                
					<div class="box">
				
						<div class="cardBottom">
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=DG&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="DG"><img src="https://www.hkblr.com/images/DG.png"></a>
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=S6&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="S6"><img src="/bbin.jpg"></a>
															
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=WC&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="WC"><img src="https://www.hkblr.com/images/WM.png"></a>
															
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=GB&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="GB"><img src="/sexy.jpg"></a>
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=E0&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="E0"><img src="https://www.hkblr.com/images/game/evosx.png"></a>
														
						</div>
					</div>
               </div>
            </div>
         <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
       <div class="swiper-slide" style="height: 331px;">
      	<div class="swiper-container swiper-container2 swiper-container-initialized swiper-container-vertical swiper-container-free-mode swiper-container-ios">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
              <div class="swiper-slide swiper-slide-active">                
				  	<div class="box">
				
						<div class="cardBottom">
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="KY"><img src="https://www.hkblr.com/images/KY.png"></a>
						</div>
					</div>
               </div>
            </div>
         <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
       <div class="swiper-slide" style="height: 331px;">
      	<div class="swiper-container swiper-container2 swiper-container-initialized swiper-container-vertical swiper-container-free-mode swiper-container-ios">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
              <div class="swiper-slide swiper-slide-active">                
					<div class="box">
				
						<div class="cardBottom">
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=S3&game_type=5&devices=1" @else data-url="" @endif data-code="S3"><img src="/wap/theme10/images/sbo1.png"></a>
															
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=ST&game_type=5&game_code=&devices=1" @else data-url="" @endif data-code="ST"><img src="/wap/theme10//images/crown.png"></a>
								<!--<a href="javascript:;" ><img src="https://www.dcclub88.com/new0404/images/sboSport.png"></a>-->
															
								<!--<a href="javascript:;" ><img src="https://www.dcclub88.com/new0404/images/HG.png"></a>-->
															
								<!--<a href="javascript:;" >-->
								<!--	<img src="/wap/theme10/images/obsport.png">-->
								<!--</a>-->
														
						</div>
					</div>
               </div>
            </div>
         <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
       <div class="swiper-slide" style="height: 331px;">
      	<div class="swiper-container swiper-container2 swiper-container-initialized swiper-container-vertical swiper-container-free-mode swiper-container-ios">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
              <div class="swiper-slide swiper-slide-active">                
					<div class="box">
				
						<div class="cardBottom">
								
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=JK&game_type=FH&devices=1" @else data-url="" @endif data-code="JK"><img src="https://www.hkblr.com/images/JOKER.png"></a>
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=JD&game_type=FH&devices=1" @else data-url="" @endif  data-code="GB"><img src="https://www.hkblr.com/images/JDB.png"></a>
								<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=GB&game_type=FH&devices=1" @else data-url="" @endif  data-code="GB"><img src="/bbindz.jpg"></a>
								
														
						</div>
					</div>
               </div>
            </div>
         <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
      </div>
     <!-- <div class="swiper-slide" style="height: 331px;">-->
     <!-- 	<div class="swiper-container swiper-container2 swiper-container-initialized swiper-container-vertical swiper-container-free-mode swiper-container-ios">-->
     <!--       <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">-->
     <!--         <div class="swiper-slide swiper-slide-active">                -->
					<!--<div class="box">-->
				
					<!--	<div class="cardBottom">-->
								
					<!--			<a href="javascript:;" ><img src="/wap/theme10/images/sbo1.png"></a>-->
															
					<!--			<a href="javascript:;" ><img src="/wap/theme10//images/crown.png"></a>-->
															
					<!--			<a href="javascript:;" >-->
					<!--				<img src="/wap/theme10/images/obsport.png">-->
					<!--			</a>-->
														
					<!--	</div>-->
					<!--</div>-->
     <!--          </div>-->
     <!--       </div>-->
     <!--    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>-->
     <!-- </div>-->
    </div>

    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        	
        </div>
    </div>
</div>

<script>
var mySwiper1 = new Swiper('#swiper-container1', {
		direction: 'vertical',

			on: {
			slideChangeTransitionStart: function(){
			  var activeNum = this.activeIndex;
			  $('.gameControl .gameChose').eq(activeNum).addClass('active').siblings().removeClass('active');
			},
		  },
	  });
	  var mySwiper2 = new Swiper('.swiper-container2',{//子swiper
		direction: 'vertical',
		nested:true,
		//resistanceRatio: 0,
		slidesPerView: 'auto',
		freeMode: true,
		scrollbar: {
		  el: '.swiper-scrollbar',
		},
	  })

		
	//opacity清除内容重叠bug
    var swiperBanner = new Swiper('.banner .swiper-container', {
      pagination: {
        el: '.banner .swiper-pagination',
		clickable: true,
      },
	  autoplay: {
		disableOnInteraction: false,
	  },
	  loop:true,
	  speed: 1000,
    });
	$('.gameControl .gameChose').click(function(){
		var num = $(this).index();
		var activeIndx = $('.active').index();
		console.log(activeIndx);
		$(this).addClass('active').siblings().removeClass('active');
		mySwiper1.slideTo(num);
	})
	jQuery(".wzgg").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:1,interTime:50});
</script>
	<div style="display:none">
    @foreach($api_list as $item)
        <span class="gamecode" data-code="{{$item->api_name}}"></span>
    @endforeach
</div>

<div id="cover" style="display: none;"></div>
<div class="noticeAltbox noticeAltbox1" style="display: none;">
		<div class="noticeTitlebox">
			您需要為【<span id="plat_type"></span>】轉入金額嗎?
		</div>
		<div class="formAlt">
			<div class="lastMoney">
				<p>當前余額：<span id="lesNum">{{@$_member->money}}</span></p>
				<a id="trans_all" href="javascript:void(0)">資金回收</a>
			</div>
			<div class="formSlides">
				<input type="tel" id="moneyInp" placeholder="输入金额" oninput="value=value.replace(/[^\d]/g,'')">
				<button type="button" class="allButton">全部</button>
			</div>
		</div>
		<div class="altButtonbox">
			<a  id="login_url" >直接進入遊戲</a>
			<button style="background: #d2b79c;
    color: #ffffff;display: inline-block;
    width: 2.62rem;
    line-height: .82rem;font-size: .32rem;
    border-radius: 3px;
    margin: 0 0.32rem;    border: none;" href="javascript:void(0)" id="rightEnter" >立即轉入遊戲</button>
		</div>
</div>
<div class="noticeAltbox noticeAltbox2">
		<div class="noticeTitlebox">
			<span id="plat_type" class="plat_type">JOKER</span>
		</div>
		
		<div class="noticeAltbox-bottom">
			<span onclick="beishu(2)">X2</span>
			<span onclick="beishu(5)">X5</span>
			<span onclick="beishu(10)">X10</span>
			<span onclick="beishu(20)">X20</span>
		</div>
    </div>

	<script type="text/javascript">
	
	//弹出图片
	var is_alert_on = '{{$setting->is_alert_on}}'
	var resourcesUrl = '{{$setting->alert_img}}'
	var resourcesType = 1;
	if(is_alert_on==0){
	    lookPicture(resourcesUrl,resourcesType)
	}
	function lookPicture(resourcesUrl,resourcesType) {
  // resourcesUrl：接受的图片地址，resourcesType之前定义的数据类型（可省略）
            if (resourcesUrl == "") {
                layer.msg("没有发现图片！");
                return;
            }
            var img = new Image();
            img.onload = function () {//避免图片还未加载完成无法获取到图片的大小。
                //避免图片太大，导致弹出展示超出了网页显示访问，所以图片大于浏览器时下窗口可视区域时，进行等比例缩小。
                var max_height = $(window).height() - 100;
                var max_width = $(window).width()- 100;

                //rate1，rate2，rate3 三个比例中取最小的。
                var rate1 = max_height / img.height;
                var rate2 = max_width / img.width;
                var rate3 = 1;
                var rate = Math.min(rate1, rate2, rate3);
                //等比例缩放
                var imgHeight = img.height * rate; //获取图片高度
                var imgWidth = img.width * rate; //获取图片宽度

                var imgHtml = "<img src='" + resourcesUrl + "' width='" + imgWidth + "px' height='" + imgHeight + "px'/>";
                //弹出层
               if (resourcesType ==1 ) {
                   layer.open({
                       type:1,//可传入的值有：0（信息框，默认）1（页面层）2（iframe层）3（加载层）4（tips层）
                       shade: 0.6,
                       maxmin: true,
                       anim: 1,
                    //   title: '图片预览',
                       area: ['auto', 'auto'],
                       // skin: 'layui-layer-nobg', //没有背景色
                       shadeClose: true,
                       content: imgHtml
                   });
                   $(".layui-m-layerbtn span, .layui-m-layerchild h3 ").css("display:none");
               }
            }
            img.src = resourcesUrl;
        }
	
	
		setTimeout(function(){
        $('#footer3').addClass('cur')
    },500)

    $('body').on('click','.kefu_box',function(){
        layer.open({
            content: '{{-- <div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">招募代理Whats: </span></div> --}}  {{--<div class="layui-m-layerbtn"><span yes="" type="1" onclick="wechat()">{{trans("lang.weixin")}}</span></div>--}} <div class="layui-m-layerbtn"><a href="{{$setting->service_link}}" target="_blank"><span yes="" type="1">{{trans("lang.zxkf")}}</span></a></div>'
            ,skin: 'footer'
        });
    })
    function wechat(){
        layer.open({
            content: '<img src="{{$setting->wx_pic}}" style="width:200px;height:200px;">'
            ,btn: 'OK'
        });
    }
        
        $('.toplay').click(function(){
            var url = $(this).data('url');
            var code = $(this).data('code');
            $('#login_url').attr('data-url',url);
            $('#rightEnter').attr('data-code',code);
            $('#plat_type').text(code);
            if(!url){
                alert('請先登入游戲！',1);
            }else{
                $.ajax({
                    url:'/m/membermoney',
                    success:function(res){
                        $('#lesNum').text(res.money)
                        $('.member_money').text(res.money)
                        
                    }
                })
                $('#moneyInp').val('');
                $('#cover,.noticeAltbox1').fadeIn();
            }
        })

        $('.toplay2').click(function(){
            var url = $(this).data('url');
            if(!url){
                alert('請先登入游戲！',1);
            }else{
                $('#cover,.noticeAltbox2').fadeIn();
				// window.open(url);
            	//$('#layertitle').show();
                //layer.open({
                //  type: 1
                //  ,shadeClose: true
                //    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                //  ,anim: 'down'
                //  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                //});
            }
        })
        function beishu(int){
            $('#plat_type').text('JK' + int);
            $('#rightEnter').attr('data-code','JK' + int)
            var url = '/game/playGame?plat_type=JK' + int+'&game_type=SL&game_code=&devices=1';
            $('#cover,.noticeAltbox1').fadeIn();
            $('#login_url').attr('data-url',url);
        }


        $('#login_url').click(function(){
            var url = $(this).attr('data-url');
			location.href=url;
			
                $('#cover,.noticeAltbox').fadeOut();
				return false;
                $('#layertitle').show();
                layer.open({
                  type: 1
                  ,shadeClose: true
                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                  ,anim: 'down'
                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                });
        })
        
        
        $('#layertitle').click(function(){
            layer.closeAll();
            $(this).hide();
        })
        $('#rightEnter').click(function(){
            var code = $(this).attr('data-code');
            var money = $('#moneyInp').val();
            if(!money){
                layer.open({
                    content: '金额需大于0'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
                return;
            }
        var url = $('#login_url').attr('data-url');
        
				var loding =  layer.open({
			type: 2
			,content: '加载中',
			shade: 'background-color: rgba(0,0,0,.3)' //自定义遮罩的透明度
		});
				    $.ajax({
                        url : "{{ route('member.post_transfer') }}",
                        type : 'POST',
                        data : {money:money,transfer_type:0,code:code,account1:1},
                        success : function (data) {
                            layer.closeAll();
                            layer.open({
                                        content: data.status.msg
                                        ,skin: 'msg'
                                        ,time: 2 //2秒后自动关闭
                                    });
                            if(data.status.errorCode==0){
                                location.href=url;
                                setTimeout(function(){
                                //alert(data.status.msg);
                                    
                                	$.ajax({
                                       url:'/m/membermoney',
                                        success:function(res){
                                            $('#lesNum').text(res.money)
                                            $('.member_money').text(res.money)
                                            
                                          
                                                    
                                        }
                                    })
                                },2500);
                            }
                            
                        }
                    })
				
            
            
              
			
                //$('#cover,.noticeAltbox').fadeOut();
                //$('#layertitle').show();
                return false;
                layer.open({
                  type: 1
                  ,shadeClose: true
                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                  ,anim: 'down'
                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                });
        })
        
        
        
        $('.joker').click(function(){
            var url = $(this).data('url');
            var code = $(this).data('code');
            $('#moneyInp').val('');
            if(!url){
                alert('请先登录游戏！',1);
            }else{
                var u = navigator.userAgent;
                var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
                var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
                if(isiOS){
                    $('#login_url').attr('data-url',url);
                        $('#rightEnter').attr('data-code',code);
                        $('#plat_type').text(code);
                        if(!url){
                            alert('请先登录游戏！',1);
                        }else{
                            $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('#lesNum').text(res.money)
                                    $('.member_money').text(res.money)
                                    
                                }
                            })
                            
                            $('#cover,.noticeAltbox').fadeIn();
                    }
                    // $('#layertitle').show();
                    // layer.open({
                    //   type: 1
                    //   ,shadeClose: true
                    //     ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 95vh;" ></iframe>'
                    //   ,anim: 'down'
                    //   ,style: 'position:fixed; left:0; bottom:0; width:100%; height:95%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                    // });
                }else if(isAndroid){
                    $('#login_url').attr('data-url','/m/app_login?url='+encodeURIComponent(url)+'&code='+code);
                        $('#rightEnter').attr('data-code',code);
                        $('#plat_type').text(code);
                        if(!url){
                            alert('请先登录游戏！',1);
                        }else{
                            $.ajax({
                                url:'/m/membermoney',
                                success:function(res){
                                    $('#lesNum').text(res.money)
                                    $('.member_money').text(res.money)
                                    
                                }
                            })

                            $('#cover,.noticeAltbox').fadeIn();
                    }
                }
            }
        })
        $('body').on('click','#appp',function(){
            var code =$(this).data('code');
            $.ajax({
                url:'/api/jokergame',
                data:{code:code},
                success:function(res){
                    location.href=res;
                }
            })
        })
        $('body').on('click','#dojoker',function(){
            layer.closeAll();
            var url = $(this).data('url');
            $('#layertitle').show();
                    layer.open({
                      type: 1
                      ,shadeClose: true
                        ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;" ></iframe>'
                      ,anim: 'down'
                      ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
                    });
        })
        
        $('#lang').click(function(){
        layer.open({
            content: `<div class="layui-m-layerbtn">
                        <span yes="" type="1"  class="lang" data-lang="zh_cn">
                            <img src="/data/zh_cn.png" style="width: 32px;height: 20px;vertical-align: middle;">
                            简体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="ft">
                            <img src="/data/ft.png" style="width: 32px;height: 20px;vertical-align: middle;">
                            繁体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="en">
                            <img src="/data/en_us.png" style="width: 32px;height: 20px;vertical-align: middle;">
                            English
                        </span>
                    </div>`
            ,skin: 'footer'
        });
    })
    $('body').on('click','.lang',function(){
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            type:'post',
            success:function(res){
                location.reload()
            }
        })
    })
    $('#layertitle').click(function(){
        $(this).hide();
        layer.close(layer.index);
    })
    
    @if($gonggao==1)
        // $(function(){
        //     layer.open({
        //         title: [
        //           "{{trans('lang.xtgg')}}",
        //           "background-color: #0b93ae; color:#fff;"
        //         ]
        //         ,content: '{{$system_notices2->content}}'
        //     });
        //     $('.layui-m-layercont').css('color','#000');
        //     $('h3').css('margin','0');
        // })
    @endif



		jQuery(".txtMarquee-left").slide({mainCell:".bd ul",autoPlay:true,effect:"leftMarquee",vis:1,interTime:50});
		var swiperBanner = new Swiper('.banner .swiper-container', {
			autoplay:{
				disableOnInteraction: false,
			},
			loop:true,
		});
		var swiperGame = new Swiper('.gameSlide .swiper-container', {
			autoHeight: true,
			on: {
				slideChangeTransitionStart: function(){
					var num = this.activeIndex;
					$('.slideChose span').eq(num).addClass('cur').siblings().removeClass('cur')
				},
			},
		});
		$('.slideChose span').click(function(){
			var num = $(this).index();
			$(this).addClass('cur').siblings().removeClass('cur');
			swiperGame.slideTo(num);
		})
		
		$('.gameControl .gameChose').click(function(){
    		var num = $(this).index();
    		var activeIndx = $('.active').index();
    		console.log(activeIndx);
    		$(this).addClass('active').siblings().removeClass('active');
    		swiperGame.slideTo(num);
	    })
		
	</script>
	<script type="text/javascript">
		$('.clickbtn').click(function(){
			var url = $(this).attr('data-url');
			var plat_type = $(this).attr('plat_type');
			if (plat_type == 'EVO' ){
				if (!confirm('Evolution(EVO)真人視訊平台 每注 / 每局 賠付上限為 10萬HKD 封頂，請知悉！超過10萬HKD以上的彩金將會按10萬HKD計算，亦會在出金時扣除! 凡進入(EVO)平台遊戲即代表接受本條款！')){
					return false;
				}
			}
			$('#login_url').attr('href','').attr('href',url);
			$('#plat_type').html(plat_type);
			$('#rightEnter').attr('plat_type',plat_type)
			$('#moneyInp').val('');
			// console.log(url);
			$('#cover,.noticeAltbox').fadeIn();
		})
		$('#cover').click(function(){
			$('#cover,.noticeAltbox').fadeOut();
		})
		$('.allButton').click(function(){
			var lesNum = $('#lesNum').html();
			$('#moneyInp').val(lesNum);
		})

		$('#trans_all').click(function (){
            var len = $('.gamecode').length;
            var ok = 0;
				_this = $(this);
				_this.html('回收中...');
				// $('.allButton').attr('disabled',true);
				var len = $('.gamecode').length;
				var lens = 0;
				$('.gamecode').each(function(k,v){
                    var that=$(this);
                    $.ajax({
                            url:'/member/one_transfer',
                            type:'post',
                            data:{api_name:that.data('code'),transfer_type:1},
                            success:function(res){
                                ok++;
                                if(res.status.msg){
                                    // lens++;
                                    if (ok == len){
                                        
                                            $.ajax({
                                                url:'/m/membermoney',
                                                success:function(res){
                                                    $('#lesNum').text(res.money)
                                                    $('.member_money').text(res.money)
                                                    _this.html('資金回收');
                                                }
                                            })
                                        
                                    }
                                }
                            }
                        })
        		});	
		})
		
	$('#lang').click(function(){
        layer.open({
            content: `<div class="layui-m-layerbtn">
                        <span yes="" type="1"  class="lang" data-lang="zh_cn">
                            简体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="ft">
                            繁体中文
                        </span>
                    </div>
                    <div class="layui-m-layerbtn">
                        <span yes="" type="1" class="lang" data-lang="en">
                            English
                        </span>
                    </div>`
            ,skin: 'footer'
        });
    })
    $('body').on('click','.lang',function(){
        var lang = $(this).data('lang');
        $.ajax({
            url:'/m/changelang',
            data:{lang:lang},
            type:'post',
            success:function(res){
                location.reload()
            }
        })
    })

 //    setInterval(function(){
	//     $.ajax({
	//         url:'/m/tongzhi',
	//         success:function(res){
	//             if(res==1){
	//                 layer.open({
 //                      content: '<img  src="zhuanpan/z.png" style="width:200px;margin:0 auto;" onclick="zhuanpan()">'
 //                      ,style: 'background:none; color:#fff; border:none;text-align:center;' //自定风格
 //                      ,time: 0
 //                    });
	//             }
	//         }
	//     })
	// },2000)
	// function zhuanpan(){
	//     $('#layertitle').show();
	//     var url="/m/zhuanpan";
	//     layer.open({
 //                  type: 1
 //                  ,shadeClose: true
 //                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;"  id="zhuanpan"></iframe>'
 //                  ,anim: 'down'
 //                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
 //        });
	// }

	// $('.tojump').click(function(){
	//     var url="/m/zhuanpan";
	//     layer.open({
 //                  type: 1
 //                  ,shadeClose: true
 //                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;"  id="zhuanpan"></iframe>'
 //                  ,anim: 'down'
 //                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
 //        });
	// })
	</script>
@extends('wap.template.theme10.layouts.fotter')



<div class="bj"></div>

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
</script>

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>


</body></html>