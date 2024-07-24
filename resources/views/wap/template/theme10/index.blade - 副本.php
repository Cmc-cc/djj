<!DOCTYPE html>
<!-- saved from url=(0025)/m -->
<html style="font-size:52px !important"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
    <title>{{ $_system_config->site_title}}</title>
    <meta name="csrf-token" content="3hplwWiRuwjL5qqhhcn4Z9FQKHBNGpDuYGc461Fs">
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
<link href="/new/css/layer.css" type="text/css" rel="styleSheet" id="layermcss">
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
</style>
</head>
<body class="m_bac">
	
	<img id="layertitle" src="/new/img/goback.png" style="position:fixed;top:10px;right:10px;z-index:99999999;display:none;width:40px;">

	<img  src="/zhuanpan/z2.png" style="position:fixed;right:10px;top:150px;width:70px;z-index:9" class="jump tojump">

	<div style="display:flex;color:#fff;font-size: 12px;margin-top:5px;">
	    <div style="flex:1;text-align:center;">
	        <img src="/new/img/c1.png" style="width:50px;margin:0 auto;"><br/>
	        英属维尔京群岛<br/>(BVI)认证
	    </div>
	    <div style="flex:1;text-align:center;">
	        <img src="/new/img/logo.png" style="width:50px;margin:0 auto;"><br/>
	        东亚集团官方运营<br/>
	        <div class="glodBox" style="margin-left:0.54rem;margin-top:0.14rem;">
                <img src="/new/css/glod.png" class="glodImg">
                <p class="member_money">{{$_member -> money}}</p>
            </div>
	    </div>
	    <div style="flex:1;text-align:center;">
	        <img src="/new/img/c2.png" style="width:50px;margin:0 auto;"><br/>
	        菲律宾（PAGCOR)<br/>监管博彩执照
	    </div>
	</div>
    
    <div class="banner" >
		<div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-ios">
			<div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-752px, 0px, 0px);height:100px;">
			    @foreach($banners as $item)
    				<div class="swiper-slide"  style="width: 376px;">
    				    <a>
    				        <img src="https://betone.cc{{ $item->path }}">
    				    </a>
    				</div>
				@endforeach
            </div>
		<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
	</div>
	<div class="header">
        <!--<div class="headerTop">-->
        <!--     <div class="userName">-->
        <!--        @if (!Auth::guard('member')->guest())-->
        <!--            <p>{{ $_member -> name }}</p>-->
        <!--        @else-->
        <!--            <p>請登錄</p>-->
        <!--        @endif-->
        <!--      </div>-->
        <!--      <div class="glodBox">-->
        <!--        <img src="/new/css/glod.png" class="glodImg">-->
        <!--        <p>{{$_member -> money}}</p>-->
        <!--      </div>-->
        <!--    @if (!Auth::guard('member')->guest())-->
        <!--        <a href="/m/transfer" class="signBtn">{{trans("lang.edu")}}</a>-->
        <!--        <a href="/m/recharge" class="signBtn">{{trans("lang.chongzhi")}}</a>-->
        <!--    @else-->
        <!--        <a href="/m/login" class="signBtn">{{trans("lang.denglu")}}</a>-->
        <!--        <a href="/m/register" class="signBtn">{{trans("lang.zhuce")}}</a>-->
        <!--    @endif-->
        <!-- </div>-->
         <div class="headerNotice">
            <div class="txtMarquee-left">
                <div class="bd">
                     <div class="tempWrap" style="overflow:hidden; position:relative; width:759px">
                        <marquee style="color:#fff;font-size:20px;margin-top: 5px;">{{$system_notices->content}}&nbsp;&nbsp;&nbsp;&nbsp;{{trans("lang.zxrs")}}<?php echo rand(11000,13000)?></marquee>
    					</ul>
    				</div>
                 </div>
             </div>
         </div>
         <!--<div class="userChose">-->
         <!--   <img src="/new/img/logo.png">-->
         <!--</div>-->
    </div>
	
	<div class="slideChose">
		<!--<span class="cur">{{trans("lang.shouye")}}</span>-->
		<!--<span >{{trans("lang.dianzi")}}</span>-->
		<!--<span class="">{{trans("lang.shixun")}}</span>-->
		<!--<span class="">{{trans("lang.qipai")}}</span>-->
		<!--<span class="">{{trans('lang.tiyu')}}</span>-->
		<!--<span class="">{{trans("lang.buyu")}}</span>      -->
		<!--<span class="">{{trans("lang.caipiao")}}</span>-->
		<!--<span onclick="location.href='/m/recharge'">{{trans("lang.chongzhi")}}</span>-->
		<!--<span onclick="location.href='/m/drawing'">{{trans("lang.tixian")}}</span>-->
		
		<!--<span class="" id="lang">{{trans("lang.yuyan")}}</span>-->
		
		<div class="child">
		    	<span class="cur">{{trans("lang.shouye")}}</span>
		    	<span class="" id="lang">{{trans("lang.yuyan")}}</span>
		    	<span onclick="location.href='/m/recharge'">{{trans("lang.chongzhi")}}</span>
		    	<span onclick="location.href='/m/drawing'">{{trans("lang.tixian")}}</span>
		    	<span class="">{{trans("lang.caipiao")}}</span>
		</div>
	    <div class="tab">
	        	<span class="a1"><a href="#a">{{trans("lang.dianzi")}}</a></span>
        		<span class="a2"><a href="#b">{{trans("lang.shixun")}}</a></span>
        		<span class="a3"><a href="#c">{{trans("lang.qipai")}}</a></span>
        		<span class="a4"><a href="#d">{{trans('lang.tiyu')}}</a></span>
        		<span class="a5"><a href="#e">{{trans("lang.buyu")}}</a></span>      
	    </div>

	
	
		
	
		
	</div>
	<style>
	.myswiper.swiper {
        width: 100%;
        height: 100%;
      }

     .myswiper .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #131313;
	  height:auto;
	  /*line-height:75px;*/
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
      flex-wrap: wrap;
    }

     .myswiper .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper.myswiper {
        margin-left: auto;
        margin-right: auto;
      }
      .swiper-slide p{line-height: initial;background: #000;}
	</style>
    <div class="tabItem">
          <div class="swiper myswiper ">
                    <div class="swiper-wrapper">
            
	        	    
				<!--	<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=AG&game_type=3&devices=1" @else data-url="" @endif data-code="AG">
    					    <img src="/new/img/img/mabu.png">
    					</a>  
					</div>   -->
				<!--	<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=OB&game_type=3&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/obdy.png">
    					</a>
					</div> -->
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=CQ9&game_type=3&devices=1" @else data-url="" @endif data-code="CQ9">
    					    <img src="/new/img/img/cq9.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=TTG&game_type=3&devices=1" @else data-url="" @endif data-code="TTG">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
				<!--	<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=AT&game_type=3&devices=1" @else data-url="" @endif data-code="AT">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>  -->
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=JDB&game_type=3&devices=1" @else data-url="" @endif data-code="JDB">
    					    <img src="/new/img/img/jdb.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=BBIN&game_type=3&devices=1" @else data-url="" @endif data-code="BBIN">
    					    <img src="/new/img/img/bbinyx.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=PNG&game_type=3&devices=1" @else data-url="" @endif data-code="PNG">
    					    <img src="/new/img/img/pngyx.png">
    					</a>
					</div>
			<!--		<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=RTG&game_type=3&devices=1" @else data-url="" @endif data-code="RTG">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=PG&game_type=3&devices=1" @else data-url="" @endif data-code="PG">
    					    <img src="/new/img/img/pg.png">
    					</a>
					</div>
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=PP&game_type=3&devices=1" @else data-url="" @endif data-code="PP">
    					    <img src="/new/img/img/ppzr.png">
    					</a>
					</div>
			<!--		<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=PT&game_type=3&devices=1" @else data-url="" @endif data-code="PT">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>  -->
			<!--		<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=ISB&game_type=3&devices=1" @else data-url="" @endif data-code="ISB">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
					<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=GSS&game_type=3&devices=1" @else data-url="" @endif data-code="GSS">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
			<!--		<div class="swiper-slide 1" >  
    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=MG&game_type=3&devices=1" @else data-url="" @endif data-code="MG">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->



					
				
					


				<!--	<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=AG&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="AG">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->

			<!--		<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=AB&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="AB">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/obzr.png">
    					</a>
					</div>
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=YB&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="YB">
    					    <img src="/new/img/img/ybb.png">
    					</a>
					</div>
					<div class="swiper-slide 2" >
    					<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=DG&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="DG"><img src="/new/img/img/dg.png"></a>
					</div>
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=WM&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="WM">
    					    <img src="/new/img/img/wmss.png">
    					</a>
					</div>
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=XGLIVE&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="XGLIVE">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
				<!--	<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=BG&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="BG">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
					<div class="swiper-slide 2" >  
    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=1&game_code=&devices=1" @else data-url="" @endif data-code="BBIN">
    					    <img src="/new/img/img/bbss.png">
    					</a>
					</div>





			       <!-- <div class="swiper-slide 2">
    					<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=AWC&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="AWC"><img src="/new/img/img/ae.png"></a>
					</div>
				
					
					<div class="swiper-slide 2" >
    					<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=IBO&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="IBO"><img src="/new/img/img/ibo.png"></a>
					</div>
				
					<div class="swiper-slide 2" >
    					<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=OGPlus&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="OGPlus"><img src="/new/img/img/og.png"></a>
			        </div> -->
			   
					
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=GDQ&game_type=6&devices=1" @else data-url="" @endif data-code="GDQ">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=TH&game_type=6&devices=1" @else data-url="" @endif data-code="TH">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=AP&game_type=6&devices=1" @else data-url="" @endif data-code="AP">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=LEG&game_type=6&devices=1" @else data-url="" @endif data-code="LEG">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=OB&game_type=6&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 3" >

    					<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=KY&game_type=6&devices=1" @else data-url="" @endif data-code="KY">
    					    <img src="/new/img/img/KY.png">
    					</a>
					</div>
					<!-- <div class="swiper-slide 3" > -->

    			<!--		<a class="toplay" @if($_member) data-url="/api/gamelist?api_code=BL&game_type=6&devices=1" @else data-url="" @endif data-code="BL">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>   -->
				
					
					
				  
				    <div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=5&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=7&devices=1" @else data-url="" @endif data-code="OB">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=IA&game_type=7&devices=1" @else data-url="" @endif data-code="IA">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=TFG&game_type=7&devices=1" @else data-url="" @endif data-code="TFG">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=AVIA&game_type=7&devices=1" @else data-url="" @endif data-code="AVIA">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=SBO&game_type=5&devices=1" @else data-url="" @endif data-code="SBO">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=IBC&game_type=5&devices=1" @else data-url="" @endif data-code="IBC">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=5&devices=1" @else data-url="" @endif data-code="BBIN">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>
					<div class="swiper-slide 5" id="d" >

    					<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=SS&game_type=5&devices=1" @else data-url="" @endif data-code="SS">
    					    <img src="/new/img/img/mabu.png">
    					</a>
					</div>

					
			


							
				        <div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=2&game_code=200&devices=1" @else data-url="" @endif data-code="OB">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=OB&game_type=6&game_code=200&devices=1" @else data-url="" @endif data-code="OB">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=2&game_code=510&devices=1" @else data-url="" @endif data-code="KY">
					           <img src="/new/img/img/KY.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=KY&game_type=2&game_code=520&devices=1" @else data-url="" @endif data-code="KY">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AT&game_type=2&game_code=cmf0001&devices=1" @else data-url="" @endif data-code="AT">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AT&game_type=2&game_code=cmf0002&devices=1" @else data-url="" @endif data-code="AT">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AB3&devices=1" @else data-url="" @endif data-code="CQ9">
					           <img src="/new/img/img/CQ9.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AT05&devices=1" @else data-url="" @endif data-code="CQ9">
					           <img src="/new/img/img/CQ9.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=2&game_code=cq9-AT01&devices=1" @else data-url="" @endif data-code="CQ9">
					           <img src="/new/img/img/CQ9.png">
            				</a>
						</div>

						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7001&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7002&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7003&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7004&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7005&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7006&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=2&game_code=7_7007&devices=1" @else data-url="" @endif data-code="JDB">
					           <img src="/new/img/img/JDB.png">
            				</a>
						</div>


						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=lkpy&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=hwby&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=dsnh&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=jcby&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=AP&game_type=2&game_code=jlongfishing&devices=1" @else data-url="" @endif data-code="AP">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=BBIN&game_type=2&game_code=0&devices=1" @else data-url="" @endif data-code="BBIN">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
						<div class="swiper-slide 6" id="e">

							<a class="joker" @if($_member) data-url="/game/playGame?plat_type=LEG&game_type=2&game_code=510&devices=1" @else data-url="" @endif data-code="LEG">
					           <img src="/new/img/img/mabu.png">
            				</a>
						</div>
			       
				</div>
			
            </div>
    <!-- <div class="swiper-scrollbar"></div> -->
  </div>
  
	
	<div class="gameSlide" style="height:50vh" >
		<div class="swiper-container1 swiper-container-initialized1 swiper-container-horizontal1 swiper-container-autoheight1 swiper-container-ios">
			<div class="swiper-wrapper1" style=" transform: translate3d(0px, 0px, 0px); transition-duration: 300ms;">
			     <!--首页-->
			    <div class="swiper-slide 0" style="height:100%">   
			        <video src="/new/img/tank.mp4" style="width:100%;height:212px;" controls="controls">
			            
			        </video>
			        
			        
			        <div style="height:100%">
            			<ul  style="overflow-y:auto;" id="ul1">
            			    <li style="width: 49%;float: left;margin-right: 1%;">
            							<a href="/m/activity_list">
            								<div class="qbhdbox" style="height:auto">
            									
            									<h2 style="padding:0;">
            									    <img src="/new/img/article/6.png" style="width: 20px;height: 20px; float: left;margin-top: -2.5px;margin-right: 10px;">
            									    活动中心
            								    </h2>
            								</div>
            							</a>
            				    </li>
            				    <li style="width: 49%;float: left;margin-right: 1%;">
            							<a class="kefu_box">
            								<div class="qbhdbox" style="height:auto">
            									
            									<h2 style="padding:0;">
            									    <img src="/new/img/article/8.png" style="width: 20px;height: 20px; float: left;margin-top: -2.5px;margin-right: 10px;">
            									    客服中心
            								    </h2>
            								</div>
            							</a>
            				    </li>
            				    <li style="width: 49%;float: left;margin-right: 1%;">
            							<a href="/m/transfer">
            								<div class="qbhdbox" style="height:auto">
            									
            									<h2 style="padding:0;">
            									    <img src="/new/img/article/10.png" style="width: 20px;height: 20px; float: left;margin-top: -2.5px;margin-right: 10px;">
            									    额度转换
            								    </h2>
            								</div>
            							</a>
            				    </li>
            				    <li style="width: 49%;float: left;margin-right: 1%;">
            							<a href="/m/userinfo">
            								<div class="qbhdbox" style="height:auto">
            									
            									<h2 style="padding:0;">
            									    <img src="/new/img/article/11.png" style="width: 20px;height: 20px; float: left;margin-top: -2.5px;margin-right: 10px;">
            									    个人中心
            								    </h2>
            								</div>
            							</a>
            				    </li>
            			    @foreach($article as $k => $item)
            				    <li style="width: 49%;float: left;margin-right: 1%;">
            							<a href="{{ route('wap.article_type', ['id' => $k]) }}">
            								<div class="qbhdbox" style="height:auto">
            									
            									<h2 style="padding:0;">
            									    <img src="/new/img/article/{{$k}}.png" style="width: 20px;height: 20px; float: left;margin-top: -2.5px;margin-right: 10px;">
            									    {{$item}}
            								    </h2>
            								</div>
            							</a>
            				    </li>
            				@endforeach
            				
            			</ul>
            		</div>
            		<div style="clear:both"></div>
            		
			    </div>

			    <!--电子-->
				<!--<div class="swiper-slide 1" style="width: 376px;">  -->
				<!--	<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JOKER2&game_type=2&devices=1" @else data-url="" @endif data-code="JOKER2">-->
				<!--	    <img src="/new/img/img/joker2.png">-->
				<!--	</a>-->
				<!--	<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JOKER5&game_type=2&devices=1" @else data-url="" @endif data-code="JOKER5">-->
				<!--	    <img src="/new/img/img/joker5.png">-->
				<!--	</a>-->
				<!--	<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JOKER10&game_type=2&devices=1" @else data-url="" @endif data-code="JOKER10">-->
				<!--	    <img src="/new/img/img/joker10.png">-->
				<!--	</a>-->
				<!--	<a class="joker" @if($_member) data-url="/game/playGame?plat_type=JOKER20&game_type=2&devices=1" @else data-url="" @endif data-code="JOKER20">-->
				<!--	    <img src="/new/img/img/joker20.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=Mabu&game_type=redirect&game_code=solt&devices=1" @else data-url="" @endif data-code="Mabu">-->
				<!--	    <img src="/new/img/img/mabu.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=JDB&game_type=redirect&game_code=7&devices=1" @else data-url="" @endif data-code="JDB">-->
				<!--	    <img src="/new/img/img/jdb.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=CQ9&game_type=redirect&game_code=solt&devices=1" @else data-url="" @endif data-code="CQ9">-->
				<!--	    <img src="/new/img/img/cq9.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PS&game_type=PSPS-LOBBY&game_code=solt&devices=1" @else data-url="" @endif data-code="PS">-->
				<!--	    <img src="/new/img/img/psdz.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=KA&game_type=redirect&game_code=solt&devices=1" @else data-url="" @endif data-code="KA">-->
				<!--	    <img src="/new/img/img/ka.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="/game/playGame?plat_type=PG&game_type=PG0&game_code=solt&devices=1" @else data-url="" @endif data-code="PG">-->
				<!--	    <img src="/new/img/img/pg.png">-->
				<!--	</a>-->
				<!--</div>-->
				<!--视讯-->
				<!--<div class="swiper-slide 2" style="width: 376px;">-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=AWC&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="AWC"><img src="/new/img/img/ae.png"></a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=IBO&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="IBO"><img src="/new/img/img/ibo.png"></a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=DG&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="DG"><img src="/new/img/img/dg.png"></a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=OGPlus&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="OGPlus"><img src="/new/img/img/og.png"></a>-->
				<!--</div>-->
			
				<!--棋牌-->
				<!--<div class="swiper-slide 3" style="width: 376px;">-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=XSJ&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="XSJ">-->
				<!--	    <img src="/new/img/img/XSJ.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=KX&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="KX">-->
				<!--	    <img src="/new/img/img/KX.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=IMCG&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="IMCG">-->
				<!--	    <img src="/new/img/img/IM.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=KY&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="KY">-->
				<!--	    <img src="/new/img/img/KY.png">-->
				<!--	</a>-->
				<!--</div>-->
								    <!--彩票-->
			 <!--   <div class="swiper-slide" style="width: 376px;color:#fff;text-align:center;font-size:30px">-->
				<!--	    维护中-->
				<!--</div>-->
				<!--电子-->
				<!--<div class="swiper-slide 4" style="width: 376px;">-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=UG&game_type=&game_code=&devices=1" @else data-url="" @endif data-code="UG">-->
				<!--	    <img src="/new/img/img/UG.png">-->
				<!--	</a>-->
				<!--</div>-->
				
	
				<!--体育-->
				<!--<div class="swiper-slide 5" style="width: 376px;">-->
				<!--	<a class="joker" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=JOKER1&game_type=6&game_code=&devices=1" @else data-url="" @endif data-code="JOKER1">-->
				<!--	    <img src="/new/img/img/jokerby.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=PS&game_type=redirect&game_code=&devices=1" @else data-url="" @endif  data-code="PS">-->
				<!--	    <img src="/new/img/img/psby.png">-->
				<!--	</a>-->
				<!--	<a class="toplay" @if($_member) data-url="{{ route('game.playGame') }}?plat_type=YL&game_type=redirect&game_code=&devices=1" @else data-url="" @endif  data-code="YL">-->
				<!--	    <img src="/new/img/img/ylby.png">-->
				<!--	</a>-->
				<!--</div>-->
					<!--捕鱼-->
				<!--<div class="swiper-slide 6" style="width: 376px;">-->
					
				<!--</div>-->
				
			</div>
		<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
	</div>

<div style="display:none">
    @foreach($api_list as $item)

        <span class="gamecode" data-code="{{$item->api_name}}"></span>
    @endforeach
</div>

<div id="cover" style="display: none;"></div>
<div class="noticeAltbox" style="display: none;">
		<div class="noticeTitlebox">
			您需要為【<span id="plat_type"></span>】轉入金額嗎?
		</div>
		<div class="formAlt">
			<div class="lastMoney">
				<p>當前余額：<span id="lesNum">{{$_member->money}}</span></p>
				<a id="trans_all" href="javascript:void(0)">資金回收</a>
			</div>
			<div class="formSlides">
				<input type="tel" id="moneyInp" placeholder="输入金额" oninput="value=value.replace(/[^\d]/g,'')">
				<button type="button" class="allButton">全部</button>
			</div>
		</div>
		<div class="altButtonbox">
			<a  id="login_url" >直接進入遊戲</a>
			<button style="background: linear-gradient(to bottom, #a70707 0%, #50030f 100%);
    color: #ffffff;display: inline-block;
    width: 2.62rem;
    line-height: .82rem;font-size: .32rem;
    border-radius: 3px;
    margin: 0 0.32rem" href="javascript:void(0)" id="rightEnter" >立即轉入遊戲</button>
		</div>
</div>


	<script type="text/javascript">
	setTimeout(function(){
        $('#footer3').addClass('cur')
    },200)

    $('body').on('click','.kefu_box',function(){
        layer.open({
            content: '<div class="layui-m-layerbtn"><span yes="" type="1" onclick="tapCopy('+"'url_whats'"+')" data-clipboard-target="#url">招募代理Whats: 67604785</span></div><div class="layui-m-layerbtn"><span yes="" type="1" onclick="wechat()">{{trans("lang.weixin")}}</span></div><div class="layui-m-layerbtn"><a href="{{$setting->service_link}}" target="_blank"><span yes="" type="1">{{trans("lang.zxkf")}}</span></a></div>'
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
                alert('请先登录游戏！',1);
            }else{
                $.ajax({
                    url:'/m/membermoney',
                    success:function(res){
                        $('#lesNum').text(res.money)
                        $('.member_money').text(res.money)
                        
                    }
                })
                $('#moneyInp').val('');
                $('#cover,.noticeAltbox').fadeIn();
            }
        })
        $('#login_url').click(function(){
            var url = $(this).attr('data-url');
                $('#cover,.noticeAltbox').fadeOut();
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
                    alert(data.status.msg);
                    	$.ajax({
                           url:'/m/membermoney',
                            success:function(res){
                                $('#lesNum').text(res.money)
                                $('.member_money').text(res.money)
                                        
                        }
                    })
                }
            })
                $('#cover,.noticeAltbox').fadeOut();
                $('#layertitle').show();
                var url = $('#login_url').attr('data-url');
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
        $(function(){
            layer.open({
                title: [
                  "{{trans('lang.xtgg')}}",
                  "background-color: #0b93ae; color:#fff;"
                ]
                ,content: '{{$system_notices->content}}'
            });
            $('.layui-m-layercont').css('color','#000');
            $('h3').css('margin','0');
        })
    @endif
    
    
    
    $(function(){
        let y = $(".gameSlide").height()
        let v = $("video").height()
        let  h = $(window).height()
         if(h>800){
               $("#ul1").css("height",y - v)
         }else{
               $("#ul1").css("height",y - v - 60)
         }
          
       var swiperT = new Swiper(".myswiper", {
        loop: true,
        speed: 300,
        slidesPerView:'auto',
        spaceBetween: 5,
        mousewheelControl: true,
        roundLengths : true, 
        loopedSlides: 8,
        loopFillGroupWithBlank: true,
        freeMode: true,
        freeModeMomentum : true,
        freeModeSticky : true,
        freeModeMomentumBounceRatio : 0,
        direction: 'vertical',
        //   centeredSlides : true,
	  //watchSlidesProgress : true,
      // setWrapperSize: true,
      });
       document
        .querySelector('.a1')
        .addEventListener('click', function (e) {
          e.preventDefault();
          swiperT.slideTo(8, 0);
        });
       document
        .querySelector('.a2')
        .addEventListener('click', function (e) {
          e.preventDefault();
          swiperT.slideTo(15, 0);
        });
       document
        .querySelector('.a3')
        .addEventListener('click', function (e) {
          e.preventDefault();
          swiperT.slideTo(22, 0);
        });
       document
        .querySelector('.a4')
        .addEventListener('click', function (e) {
          e.preventDefault();
          swiperT.slideTo(26, 0);
        });
       document
        .querySelector('.a5')
        .addEventListener('click', function (e) {
          e.preventDefault();
          swiperT.slideTo(27, 0);
        });

   swiperT.on('setTranslate', function () {

   })
      swiperT.on('slideChangeTransitionEnd', function () {
            let swiperIndex = swiperT.activeIndex;
                console.log(swiperT.realIndex)
            if(swiperT.realIndex == 1 || swiperT.realIndex <= 7){
                    	$('.slideChose .tab span').eq(0).addClass('cur').siblings().removeClass('cur')
            }else if(swiperT.realIndex >= 8 && swiperT.realIndex <= 13){
                	$('.slideChose .tab span').eq(1).addClass('cur').siblings().removeClass('cur')
            }else if(swiperT.realIndex >= 14 && swiperT.realIndex <= 20){
                	$('.slideChose .tab span').eq(2).addClass('cur').siblings().removeClass('cur')
            }else if(swiperT.realIndex >= 21 && swiperT.realIndex <= 29){
                	$('.slideChose .tab span').eq(3).addClass('cur').siblings().removeClass('cur')
            }else if(swiperT.realIndex >= 30 ){
                	$('.slideChose .tab span').eq(4).addClass('cur').siblings().removeClass('cur')
            }
            // $('.timeSnapUpSwiperDiv .swiper-slide').eq(swiperIndex).addClass('timeSnapUpActBox').siblings()
            //     .removeClass('timeSnapUpActBox');
        });
    })
    
    

    
    
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
				//	$('.slideChose span').eq(num).addClass('cur').siblings().removeClass('cur')
				},
			},
		});
		$('.slideChose .child span').click(function(){
		    $('.slideChose  span').removeClass('cur');
			var num = $(this).index();
			$(this).addClass('cur').siblings().removeClass('cur');
			if(num >=0){
			 //   $('video').pause();
			}
			if(num ==1 || num == 2 || num == 3){
			 return
			}
			if(num == 4){
			   layer.open({
                    content: '<div style="font-size:18px">正在维护中</div>'
                    ,skin: 'msg'
                    ,time: 2 //2秒后自动关闭
                });
			 return
			}
			if(num >=7){
			    return;
			}
			$(".gameSlide").show()
            $(".tabItem").css("left","100%")
			swiperGame.slideTo(num);
		})
		$('.slideChose .tab span').click(function(){
			console.log(21123)
		     $('video').trigger("pause");
		    $('.slideChose  span').removeClass('cur');
			var num = $(this).index();
			$(this).addClass('cur').siblings().removeClass('cur');
            $(".gameSlide").hide()
           	$(".tabItem").css("left","0%")
		//	swiperGame.slideTo(num);
		})
	</script>
	<script type="text/javascript">
		$('.clickbtn').click(function(){
			var url = $(this).attr('data-url');
			var plat_type = $(this).attr('plat_type');
			if (plat_type == 'EVO' ){
				if (!confirm('EVO真人平台閃電賠率及超級骰宝特別賠率政策!  所有會員凡在EVO 真人平台中的任何閃電賠率遊戲中或超級骰宝中所得的閃電賠率或超級骰宝特別賠率彩金,單注彩金上限為10000 ,超過10000以上的彩金將會按10000計算,亦會在出金時扣除! 凡進入EVO平台遊戲即當用戶接受條款!')){
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

				_this = $(this);
				_this.html('回收中...');
				// $('.allButton').attr('disabled',true);
				$('.gamecode').each(function(){
                    var that=$(this);
                    $.ajax({
                            url:'/member/one_transfer',
                            type:'post',
                            data:{api_name:that.data('code'),transfer_type:1},
                            success:function(res){
                                $.ajax({
                                    url:'/m/membermoney',
                                    success:function(res){
                                        $('#lesNum').text(res.money)
                                        $('.member_money').text(res.money)
                                        
                                    }
                                })
                            }
                        })
        		});	
        		setTimeout(function(){
        		    _this.html('資金回收');
        		},1000)
				
				
				// $.ajax({
    //                 url:'/member/one_transfer',
    //                 type:'post',
    //                 data:{api_name:$('#rightEnter').attr('data-code'),transfer_type:1},
    //                 success:function(res){
    //                     _this.html('資金回收');
				// 		$('.allButton').attr('disabled',false);
				// 		sign = true;
				// 		if(res.status.errorCode==1){
				// 		    layer.open({
    //         					content: res.status.msg
    //         					,skin: 'msg'
    //         					,time: 2 //2秒后自动关闭
    //         				});
    //         				return false;
				// 		}else if(res.status.errorCode==0){
				// 		    $('#lesNum').text(0)
				// 		}
    //                 }
    //             })
				
				
				// $.post('/api/trans_all', function (data) {
				// 	if ( data['code'] == 0 ) {
				// 		_this.html('資金回收');
				// 		$('.allButton').attr('disabled',false);
				// 		sign = true;
				// 		// $('.refuseBtn').trigger('click')
				// 	}else{
				// 		alert(data['msg']);
				// 	}
				// });

		})
		$('#rightEnter').click(function(){
			var money = $('#moneyInp').val();
			var plat_type = $(this).attr('plat_type');
			var url = $('#login_url').attr('href');
			// console.log(url);
			if (!money){
				layer.open({
					content: '請輸入轉賬金額'
					,skin: 'msg'
					,time: 2 //2秒后自动关闭
				});
				return false;
			}
			var that = $(this);
			var loding =  layer.open({
				type: 2
				,content: '加載中',
				shade: 'background-color: rgba(0,0,0,.3)' //自定义遮罩的透明度
			});
// 			$(this).attr('disabled',true);
			$.ajax({
				type: 'POST',
				url: '/m/transfer',
				data: {
					out_account: 'center',
					in_account : plat_type,
					money : money
				},
				dataType: "json",
				success: function(data){
					layer.close(loding)
					var html = '';
					var obj = JSON.parse (data.status.msg);
					for ( var p in obj ) {
						if (typeof (obj[p]) == 'string') {
							html+= '<p><b>'+ obj[p] + '</b></p>';
						} else if(obj[p] instanceof Array) {
							for (var i=0;i<obj[p].length;i++) {
								html+= '<p><b>'+ obj[p][i] + '</b></p>';
							}
						}
					}
					var css = 'color: #333; background-color: #fff; width: auto';
					layer.open({
						content: html,
						time: 1,
						style: css
					});
				    
					that.removeAttr('disabled');
					if (data.url){
						$('#moneyInp').val('');
						$('#cover,.noticeAltbox').fadeOut();
						// window.open(url);
						window.location.href=url;
					}
				}
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
	</script>

	<!-- <div class="fixBottom">
	<a href="/m" class="cur">
		<span></span>
		<p>首頁</p>
	</a>
	<a href="/m/activity_list">
		<span></span>
		<p>福利</p>
	</a>
	
	<a href="javascript:void(0);" class="contact">
		<span></span>
		<p>客服</p>
	</a>
	<a href="javascript:void(0);" class="gdbtn">
		<span></span>
		<p>更多</p>
	</a>
	<a href="/m/nav">
		<span></span>
					<p>登錄</p>
			</a>
</div> -->
<!-- <div class="h110"></div> -->
@extends('wap.template.theme10.layouts.fotter')



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

	setInterval(function(){
	    $.ajax({
	        url:'/m/tongzhi',
	        success:function(res){
	            if(res==1){
	                layer.open({
                      content: '<img  src="zhuanpan/z.png" style="width:200px;margin:0 auto;" onclick="zhuanpan()">'
                      ,style: 'background:none; color:#fff; border:none;text-align:center;' //自定风格
                      ,time: 0
                    });
	            }
	        }
	    })
	},2000)
	function zhuanpan(){
	    $('#layertitle').show();
	    var url="/m/zhuanpan";
	    layer.open({
                  type: 1
                  ,shadeClose: true
                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;"  id="zhuanpan"></iframe>'
                  ,anim: 'down'
                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
        });
	}

	$('.tojump').click(function(){
	    var url="/m/zhuanpan";
	    layer.open({
                  type: 1
                  ,shadeClose: true
                    ,content:'<iframe src="'+url+'" frameborder="false" width="100%" scrolling="yes" allowtransparency="true" style="height: 100vh;"  id="zhuanpan"></iframe>'
                  ,anim: 'down'
                  ,style: 'position:fixed; left:0; bottom:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
        });
	})
</script>

<script type="text/javascript" src="/new/css/layer.js"></script>
<script type="text/javascript" src="/new/css/wap_ajax-submit-form.js"></script>

	<style>
	    .tabItem{display:block;height:50vh;overflow-y:hidden;position:absolute;left:100%;width:100%}
	    .tab a{color: #fff;} 
	    /*.tabItem .swiper-slide{height:auto}*/
	    .tabItem .swiper-slide a{display: inline-block;margin-bottom:5px}
	    body{overflow:hidden}
	</style>
</body></html>