<!-- 头部开始 -->
<div class="topbar">
	<div class="w1000 clearfix">
		<div class="topleft">
			<a href="javascript:void(0)" class="pz"><div class="paizhao"></div></a>
			<div class="language">
				<span>语言选择：</span>
				<a href="javascript:void(0)" class="lang"><img src="{{asset('/web/mb22/images/cn.png')}}"></a>
				<a href="javascript:void(0)" class="lang"><img src="{{asset('/web/mb22/images/hk.png')}}"></a>
				<a href="javascript:void(0)" class="lang"><img src="{{asset('/web/mb22/images/usa.png')}}"></a>
			</div>
			<div class="url">易记域名：{{$_system_config->site_domain}}</div>
		</div>
		<div class="topright">
			{{--<a href="{{ route('web.xianlu') }}" target="_blank" class="t3">线路检测</a>|
			<a href="{{ route('web.quick') }}" target="_blank" class="t1">快速充值中心</a>|--}}
			<a href="{{ route('wap.index') }}" class="t2">手机投注</a>|
			<a href="{{ route('web.activityList') }}" class="t3">优惠办理大厅</a>|
			<a  class="t4 daili_apply">代理申请</a>|
			<a target="_blank" href="{{route('daili.init')}}" class="t5">代理登录</a>
		</div>
	</div>
</div>
<!--半透明遮罩层-->
<div class="backdrop"></div>
<style type="text/css">
.navbar-nav .dropdown-menu{padding:0;background:rgba(44,34,35,0.8);border-color:#fee6a9;margin:0px 0 0 -5%;min-width:110%;width:110%;}
.navbar-nav .dropdown-menu.casino{width:220%;margin-left:-60%;text-align:left;}
.navbar-nav .dropdown-menu>li{border-top:1px solid #636261;}
.navbar-nav .dropdown-menu.casino>li{display:inline-block;width:49%;text-align:left;}
.navbar-nav .dropdown-menu a{padding:3px 3px 3px 55px;line-height:30px;color:#ffec00;font-size:12px;}
.navbar-nav .casino-dropdown ul{position:absolute;}
.navbar-nav .casino-dropdown ul:not(.casino-menu2){left:0px}
ul.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus{color:#ff0d0d}
.navbar-nav .casino-menu2{left:65px}
.navbar-nav .dropdown-menu .icon-api{background-image:url(web/images/index/icon-menu-api.png);background-repeat:no-repeat;background-position-x:13px;}
.navbar-nav .dropdown-menu .icon-api.zr-ag{background-position-y:-124px;}
.navbar-nav .dropdown-menu .icon-api.zr-bb{background-position-y:-156px;}
.navbar-nav .dropdown-menu .icon-api.zr-ds{background-position-y:-223px;}
.navbar-nav .dropdown-menu .icon-api.zr-ebet{background-position-y:-28px;}
.navbar-nav .dropdown-menu .icon-api.zr-gd{background-position-y:-189px;}
.navbar-nav .dropdown-menu .icon-api.zr-mg{background-position-y:5px;}
.navbar-nav .dropdown-menu .icon-api.zr-og{background-position-y:-60px;}
.navbar-nav .dropdown-menu .icon-api.zr-sa{background-position-y:-92px;}
.navbar-nav .dropdown-menu .icon-api.dz-ag{background-position-y:-388px;}
.navbar-nav .dropdown-menu .icon-api.dz-bb{background-position-y:-421px;}
.navbar-nav .dropdown-menu .icon-api.dz-hb{background-position-y:-323px;}
.navbar-nav .dropdown-menu .icon-api.dz-mg{background-position-y:-354px;}
.navbar-nav .dropdown-menu .icon-api.dz-nyx{background-position-y:-289px;}
.navbar-nav .dropdown-menu .icon-api.dz-pt{background-position-y:-256px;}
.navbar-nav .dropdown-menu .icon-api.dz-bsg{background-position-y:5px;}
.navbar-nav .dropdown-menu .icon-api.dz-sg{background-position-y:-716px;}
.navbar-nav .dropdown-menu .icon-api.dz-png{background-position-y:-748px;}
.navbar-nav .dropdown-menu .icon-api.dz-gg{background-position-y:-780px;}
.navbar-nav .dropdown-menu .icon-api.dz-dt{background-position-y:-812px;}
.navbar-nav .dropdown-menu .icon-api.dz-gns{background-position-y:-844px;}
.navbar-nav .dropdown-menu .icon-api.dz-prg{background-position-y:-877px;}
.navbar-nav .dropdown-menu .icon-api.dz-mw{background-position-y:-940px;}
.navbar-nav .dropdown-menu .icon-api.dz-pg{background-position-y:-1517px}
.navbar-nav .dropdown-menu .icon-api.dz-nt{background-position-y:-1484px}
.navbar-nav .dropdown-menu .icon-api.ty-hg{background-position-y:-453px;}
.navbar-nav .dropdown-menu .icon-api.ty-im{background-position-y:-487px;}
.navbar-nav .dropdown-menu .icon-api.ty-sb{background-position-y:-520px;}
.navbar-nav .dropdown-menu .icon-api.ty-bb{background-position-y:-553px;}
.navbar-nav .dropdown-menu .icon-api.ty-rs{background-position-y:-1356px;}
.navbar-nav .dropdown-menu .icon-api.ty-bc{background-position-y:-1388px;}
.navbar-nav .dropdown-menu .icon-api.ty-ysb{background-position-y:-1420px;}
.navbar-nav .dropdown-menu .icon-api.ty-esb{background-position-y:-1615px;}
.navbar-nav .dropdown-menu .icon-api.cp-bb{background-position-y:-651px;}
.navbar-nav .dropdown-menu .icon-api.cp-kg{background-position-y:-586px;}
.navbar-nav .dropdown-menu .icon-api.cp-vr{background-position-y:-1550px}
.navbar-nav .dropdown-menu .icon-api.cp-chq{background-position-y:-619px;}
.navbar-nav .dropdown-menu .icon-api.cp-yzt{background-position-y:-684px;}
.navbar-nav .dropdown-menu .icon-api.cp-lt{background-position-y:-1648px;}
.navbar-nav .dropdown-menu .icon-api.zr-opus-l,.navbar .navbar-nav .dropdown-menu .icon-api.ty-opus-s{background-position-y:-289px;}
.navbar-nav .dropdown-menu .icon-api.zr-shenbo{background-position-y:-908px;}
.navbar-nav .dropdown-menu .icon-api{background-image:url(web/images/index/icon-menu-api.png);background-repeat:no-repeat;background-position-x:13px;}
.navbar-nav .dropdown-menu .icon-api.dz-hh{background-position-y:-972px;}
.navbar-nav .dropdown-menu .icon-api.dz-bq{background-position-y:-1004px;}
.navbar-nav .dropdown-menu .icon-api.dz-zcbp{background-position-y:-1036px;}
.navbar-nav .dropdown-menu .icon-api.dz-lh{background-position-y:-1068px;}
.navbar-nav .dropdown-menu .icon-api.dz-tg{background-position-y:-1100px;}
.navbar-nav .dropdown-menu .icon-api.dz-byds{background-position-y:-1132px;}
.navbar-nav .dropdown-menu .icon-api.dz-zcjb{background-position-y:-1164px;}
.navbar-nav .dropdown-menu .icon-api.-ky{background-position-y:-1453px;}
.navbar-nav .dropdown-menu .icon-api.dz-zn{background-position-y:-1228px;}
.navbar-nav .dropdown-menu .icon-api.dz-fl{background-position-y:-1260px;}
.navbar-nav .dropdown-menu .icon-api.dz-qz{background-position-y:-1292px;}
.navbar-nav .dropdown-menu .icon-api.dz-bytx{background-position-y:-1328px;}
.nav-wrap .dropdown-casino{position:absolute;left:-50%;width:263px;}
.nav-wrap .dropdown-casino ul{list-style:none;display:inline-block;width:128px;padding:0;vertical-align:top}
.nav-wrap .dropdown-casino li{width:128px;}
.nav-wrap .dropdown-casino li a{display:inline-block;;color:#2f1c01;color:rgba(0,0,0,.8);font-size:12px;width:128px;overflow:hidden;text-overflow:ellipsis;padding:5px;text-align:center;}
.nav-wrap .dropdown-casino li a:hover,.nav-wrap .dropdown-casino li a:focus{text-decoration:none;}
.navbar-nav .dropdown-menu.chess-menu .icon-api{background:url(web/images/chess_logo_black.png) no-repeat;width:40px;display:inline-block;}
.navbar-nav .dropdown-menu.chess-menu .icon-api.p-p-ky{background-position:8px -2px;}
.navbar-nav .dropdown-menu.chess-menu .icon-api.p-vg{background-position:8px -40px;}
.navbar-nav .dropdown-menu.chess-menu .icon-api.p-qly{background-position:8px -82px;}
.navbar-nav .dropdown-menu.chess-menu .icon-api.p-ly{background-position:8px -120px;}
.navbar-nav .dropdown-menu.nav-4{min-width:120%;background:rgba(30,30,30,.8);left:-5%;border:2px solid #ffd053;top:100%;padding-top:0;}
.navbar-nav .dropdown-menu.nav-4.display-inline-block{min-width:240%;left:-10%;}
.navbar-nav .dropdown-menu.nav-4:before{content:'';display:inline-block;width:100%;height:5px;background:url(web/images/sub-arrow.png) no-repeat center bottom;position:absolute;top:-7px;}
.navbar-nav .dropdown-menu.nav-4 span{width:92%;height:39px;line-height:39px;display:none;text-align:center;color:#f00;border-bottom:1px dotted #3c3c3c;margin:0 auto;font-weight:bold;}
.navbar-nav .dropdown-menu.nav-4 li{text-align:center;margin:0 auto;width:100%;height:39px;color:#fff;font-size:13px;border-bottom:1px dotted #3c3c3c;line-height:24px;}
.navbar-nav .dropdown-menu.nav-4.display-inline-block li{width:49%;display:inline-block;}
.navbar-nav .dropdown-menu.nav-4 li a{padding:0;line-height:39px;color:#fff;font-weight:normal;}
.navbar-nav .dropdown-menu.nav-4 li a:hover{color:#ffd954;}
.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus{background-color:rgba(0,0,0,0);}
.navbar-nav .dropdown-menu.nav-4 li a:before{content:'';width:50px;height:33px;display:inline-block;background:url(/web/mb22/images/navbar-sub-sprite2.png) no-repeat center top;margin:2px 0;float:left;}
.navbar-nav .dropdown-menu.nav-4 li a.l-lt:before{background-position-y:-508px;}
.navbar-nav .dropdown-menu.nav-4 li a.l-kg:before{background-position-y:-480px;}
.navbar-nav .dropdown-menu.nav-4 li a.l-bb:before{background-position-y:-30px;}
.navbar-nav .dropdown-menu.nav-4 li a.l-vr:before{background-position-y:-872px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-bb:before{background-position-y:-30px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-ag:before{background-position-y:0;}
.navbar-nav .dropdown-menu.nav-4 li a.i-ebet:before{background-position-y:-90px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-opus-l:before{background-position-y:-207px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-og:before{background-position-y:-150px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-sa:before{background-position-y:-180px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-gd:before{background-position-y:-118px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-ds:before{background-position-y:-60px;}
.navbar-nav .dropdown-menu.nav-4 li a.i-shenbo:before{background-position:0 -720px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-ag:before{background-position-y:0;}
.navbar-nav .dropdown-menu.nav-4 li a.c-bb:before{background-position-y:-30px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-mg:before{background-position-y:-270px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-hb:before{background-position-y:-240px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-pt:before{background-position-y:-300px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-bsg:before{background-position-y:-330px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-sg:before{background-position-y:-360px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-mw:before{background-position-y:-690px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-png:before{background-position-y:-600px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-prg:before{background-position-y:-660px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-gns:before{background-position-y:-630px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-gg:before{background-position-y:-570px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-dt:before{background-position-y:-540px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-bb:before{background-position-y:-30px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-pg:before{background-position-y:-940px;}
.navbar-nav .dropdown-menu.nav-4 li a.c-nt:before{background-position-y:-910px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-hg:before{background-position:0 -390px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-bb:before{background-position-y:-30px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-sb:before{background-position:0 -420px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-im:before{background-position:0 -450px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-rs:before{background-position:0 -753px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-bc:before{background-position:0 -840px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-ysb:before{background-position:0 -796px;}
.navbar-nav .dropdown-menu.nav-4 li a.s-opus-s:before{background-position-y:-207px;}
.navbar-nav .dropdown-menu.nav-4 li a.p-p-ky:before{background-position:0 -970px;}
.navbar-nav .dropdown-menu.nav-4 li a.p-vg:before{background-position:0 -1005px;}
.navbar-nav .dropdown-menu.nav-4 li a.p-qly:before{background-position:0 -1040px;}
</style>
<div class="headfloat">
    <div class="menu">
	    <div class="list w1000" id="menulist">
		    <div class="logo">
             <a href="{{ route('web.index') }}" class="logo">
              <img src="{{ $_system_config->site_logo}}">
             </a></div>
			    <ul class="list-unstyled _vr_nav">
				    <li><a data-page="index.html" href="{{ route('web.index') }}">首页<span>HOME</span></a></li>
					<li class="subnav" rel="sub-casino"> <a data-page="casino.html" class="dropdown-toggle" href="{{ route('web.eGame') }}">電子游艺<span>CASINO</span></a></li>
					<li class="subnav hot nav-blink2" rel="sub-live"> <a data-page="live.html" class="dropdown-toggle" href="{{ route('web.liveCasino') }}">真人視訊<span>LIVE</span></a></li>
					<li class="subnav" rel="sub-sports"> <a data-page="sports.html" class="dropdown-toggle" href="{{ route('web.esports') }}">體育竞技<span>SPORT</span></a></li>
					<li class="subnav hot nav-blink2" rel="sub-lottery"> <a data-page="lottery.html" class="dropdown-toggle" href="{{ route('web.lottory') }}">彩票游戏<span>LOTTERY</span></a></li>
					<li class="subnav" rel="sub-chess"> <a href="{{ route('web.poker') }}" data-apitype="5" data-href="" data-mt-ic="_vr_mt_casino_34">棋牌游戏<span>CHESS</span></a></li>
					<li class="hot nav-blink3"><a data-page="promo.html" class="casinoH" href="{{ route('web.activityList') }}">优惠活动<span>PROMOTIONS</span></a></li>
				</ul>
			</div>
		</div>
		<div class="nav-2-1">
		    <nav class="navbar-sub">
      <div class="sub-content" id="sub-lottery" rel="sub-lottery" style="display:none;">
       <div class="container">
        <div class="row row-gutter-0">
         <div class="col-7-1">
          <dl class="sub-box rebate">
           <dt>
            <span class="num-num num-single" num="1"></span>
            <i class="num-dot"></i>
            <span class="num-num num-decimal" num="0"></span>
            <i class="num-pre"></i>
           </dt>
           <dd>
            <p>天天返水,最高可达</p>
           </dd>
          </dl>
         </div>
         <div class="col-7-6">
          <div class="api-games">
           <ul class="list-table">
            @if(in_array('VR', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="22"@if($_member) href="{{ route('game.playGame') }}?plat_type=VR&game_type=3" target="_blank" @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="4"> <span class="apiicon vr shake shake-little"></span> <p> <i>VR真人彩票</i> 高画质专业彩票平台,提供多元化视频传输 </p> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="22" @if($_member) href="{{ route('game.playGame') }}?plat_type=VR&game_type=3" @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="4">立即游戏</a> </p>
              </dd>
             </dl> </li>
            @endif
             @if(in_array('BBIN', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="2"@if($_member) href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=3" target="_blank" @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="4"> <span class="apiicon bb shake shake-little"></span> <p> <i>bb彩票</i> 北京、澳洲等快乐彩玩法多样，惊喜连连。法模式，玩法赔率业界最高。 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="2"@if($_member) href="{{ route('game.playGame') }}?plat_type=BBIN&game_type=3" target="_blank" @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="4">立即游戏</a> </p>
              </dd>
             </dl> </li>
            @endif
            <!--<li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="10" @if($_member) href="{{ route('game.playGame') }}?gametype=ltlottery" target="_blank" @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="4"> <span class="apiicon bb shake shake-little"></span> <p> <i>BB彩票</i> 六合彩、时时彩、快乐彩等彩种最全的平台。 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="10" @if($_member) href="{{ route('game.playGame') }}?gametype=ltlottery" target="_blank" @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="4">立即游戏</a> </p>
              </dd>
             </dl> </li-->
           </ul>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="sub-content" id="sub-live" rel="sub-live" style="display:none;">
       <div class="container">
        <div class="row row-gutter-0">
         <div class="col-7-1">
          <dl class="sub-box rebate">
           <dt>
            <span class="num-num num-single" num="2"></span>
            <i class="num-dot"></i>
            <span class="num-num num-decimal" num="0"></span>
            <i class="num-pre"></i>
           </dt>
           <dd>
            <p>天天返水,最高可达</p>
           </dd>
          </dl>
         </div>
         <div class="col-7-6">
          <div class="api-games">
           <ul class="list-table">
            @if(in_array('BBIN', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="10" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1"> <span class="apiicon bb shake shake-little"></span> <i>BB富贵厅</i> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="10" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1">立即游戏</a> </p>
              </dd>
             </dl> </li>
            @endif
             @if(in_array('AG', $_api_list) || in_array('AGS',$_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="9" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1"> <span class="apiicon ag shake shake-little"></span> <i>AG女优厅</i> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="9" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1">立即游戏</a> </p>
              </dd>
             </dl> </li>
            @endif
             @if(in_array('SUNBET', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="33" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1"> <span class="apiicon shenbo shake shake-little"></span> <i>SUN太阳厅</i> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="33" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SUNBET&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1">立即游戏</a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('OG', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="7" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1"> <span class="apiicon og shake shake-little"></span> <i>OG东方厅</i> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="7" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=OG&game_type=1','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1">立即游戏</a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('SA', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="17" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1"> <span class="apiicon sa shake shake-little"></span> <i>SA澳门厅</i> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="17" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=SA&game_type=1','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1">立即游戏</a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('GD', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="5" href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                  @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1"> <span class="apiicon gd shake shake-little"></span> <i>GD锦绣厅</i> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="5" href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GD&game_type=1','','width=1024,height=768')"
                     @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="1">立即游戏</a> </p>
              </dd>
             </dl> </li>
             @endif
            {{--<li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="1" href="javascript:void(0)" data-apitype="1"> <span class="apiicon ds shake shake-little"></span> <i>DS贵宾厅</i> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="1" href="javascript:void(0)" data-apitype="1">立即游戏</a> </p>
              </dd>
             </dl> </li> --}}
           </ul>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="sub-content" id="sub-sports" rel="sub-sports" style="display:none;">
       <div class="container">
        <div class="row row-gutter-0">
         <div class="col-7-1">
          <dl class="sub-box rebate">
           <dt>
            <span class="num-num num-single" num="1"></span>
            <i class="num-dot"></i>
            <span class="num-num num-decimal" num="2"></span>
            <i class="num-pre"></i>
           </dt>
           <dd>
            <p>天天返水,最高可达</p>
           </dd>
          </dl>
         </div>
         <div class="col-7-6">
          <div class="api-games">
           <ul class="list-table">
            @if(in_array('GJ', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="12" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="{{ route('game.playGame') }}?gametype=ball"> <span class="apiicon hg shake shake-little"></span> <p> <i>皇冠體育</i> 提供足球、篮球等最完整、最准确、最即时的的體育赛事信息。 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="12" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=GJ&game_type=4','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="{{ route('game.playGame') }}?gametype=ball">立即游戏</a> </p>
              </dd>
             </dl> </li>
            @endif
             @if(in_array('IBC', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="19" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="{{ route('game.playGame') }}?gametype=ball"> <span class="apiicon sb shake shake-little"></span> <p> <i>沙巴體育</i> 多元化滚球玩法，快速投注完美结合，亚洲最受欢迎的线上體育专家。 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="19" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IBC&game_type=4','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="{{ route('game.playGame') }}?gametype=ball">立即游戏</a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('BBIN', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="36" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="{{ route('game.playGame') }}?gametype=ball"> <span class="apiicon ysb shake shake-little"></span> <p> <i>BBIN體育</i> 提供的足球、篮球、亚洲乐透、亚洲赛马、赛狗和世界各地的股票指数都应有尽有。 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="36" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=4','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="{{ route('game.playGame') }}?gametype=ball">立即游戏</a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('IM', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="4" href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IM&game_type=4','','width=1024,height=768')"
                  @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href=""> <span class="apiicon im shake shake-little"></span> <p> <i>IM體育</i> 每月提供超过10，000场各类赛事，是亚洲最大的體育平台供应商之一。 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="4" href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=IM&game_type=4','','width=1024,height=768')"
                     @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="">立即游戏</a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('AG', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="37" href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                  @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href=""> <span class="apiicon ag shake shake-little"></span> <p> <i>AG體育</i> 足球、篮球等最完整最即时赛事投注 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="37" href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=4','','width=1024,height=768')"
                     @else onclick="return layer.msg('请先登录！',{icon:6})" @endif data-apitype="3" data-href="">立即游戏</a> </p>
              </dd>
             </dl> </li>
              @endif
           </ul>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="sub-content" id="sub-casino" rel="sub-casino" style="display:none;">
       <div class="container">
        <div class="row row-gutter-0">
         <div class="col-7-1">
          <dl class="sub-box rebate">
           <dt>
            <span class="num-num num-single" num="3"></span>
            <i class="num-dot"></i>
            <span class="num-num num-decimal" num="0"></span>
            <i class="num-pre"></i>
           </dt>
           <dd>
            <p>天天返水,最高可达</p>
           </dd>
          </dl>
         </div>
         <div class="col-7-6">
          <div class="api-games">
           <ul class="list-table">
            @if(in_array('MG', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="3" href="{{route('game.playGame')}}?plat_type=MG&game_type=2" data-apitype="2" data-mt-ic="_vr_mt_casino_3" target="_blank"> <span class="apiicon mg shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="3" href="{{route('game.playGame')}}?plat_type=MG&game_type=2" data-apitype="2"  data-mt-ic="_vr_mt_casino_3"> MG電子 </a> </p>
              </dd>
             </dl>
            </li>
            @endif
             @if(in_array('PP', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a target="_blank" class="shake shake-opacity _vr_mt_check" data-api="38" href="{{route('game.playGame')}}?plat_type=MG&game_type=2" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_38"> <span class="apiicon prg shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="38" href="{{route('game.playGame')}}?plat_type=MG&game_type=2" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_38"> PP電子 </a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('SG', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a target="_blank" class="shake shake-opacity _vr_mt_check" data-api="25" href="{{route('game.playGame')}}?plat_type=SG&game_type=2" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_25"> <span class="apiicon sg shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="25" href="{{route('game.playGame')}}?plat_type=SG&game_type=2" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_25"> SG電子 </a> </p>
              </dd>
             </dl> </li>
             @endif
            <!--<li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="20" href="javascript:void(0)" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_20"> <span class="apiicon bsg shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="20" href="javascript:void(0)" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_20"> BSG電子 </a> </p>
              </dd>
             </dl> </li>-->
             @if(in_array('MW', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a target="_blank" class="shake shake-opacity _vr_mt_check" data-api="35" href="{{route('game.playGame')}}?plat_type=MW&game_type=2" data-apitype="2"  data-mt-ic="_vr_mt_casino_35"> <span class="apiicon mw shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="35" href="{{route('game.playGame')}}?plat_type=MW&game_type=2" data-apitype="2" data-mt-ic="_vr_mt_casino_35"> MW電子 </a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('PT', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a target="_blank" class="shake shake-opacity _vr_mt_check" data-api="6" href="{{route('game.playGame')}}?plat_type=PT&game_type=2" data-apitype="2"  data-mt-ic="_vr_mt_casino_6"> <span class="apiicon pt shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="6" href="{{route('game.playGame')}}?plat_type=PT&game_type=2" data-apitype="2"  data-mt-ic="_vr_mt_casino_6"> PT電子 </a> </p>
              </dd>
             </dl> </li>
             @endif
            <!--li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="26" href="{{ route('web.eGame') }}?api_name=PNG" data-apitype="2" data-href="{{ route('web.eGame') }}?api_name=PNG" data-mt-ic="_vr_mt_casino_26"> <span class="apiicon png shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="26" href="{{ route('web.eGame') }}?api_name=PNG" data-apitype="2" data-href="{{ route('web.eGame') }}?api_name=PNG" data-mt-ic="_vr_mt_casino_26"> PNG電子 </a> </p>
              </dd>
             </dl> </li>
           </ul>
           <ul class="list-table"-->
             @if(in_array('AG', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a  target="_blank" class="shake shake-opacity _vr_mt_check" data-api="9" href="{{route('game.playGame')}}?plat_type=AG&game_type=2"  data-apitype="2"  data-mt-ic="_vr_mt_casino_9"> <span class="apiicon ag shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="9" href="{{route('game.playGame')}}?plat_type=AG&game_type=2" data-apitype="2" data-mt-ic="_vr_mt_casino_9"> AG電子 </a> </p>
              </dd>
             </dl> </li>
             @endif
             @if(in_array('BBIN', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a target="_blank" class="shake shake-opacity _vr_mt_check" data-api="10" href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2" data-apitype="2"  data-mt-ic="_vr_mt_casino_10"> <span class="apiicon bb shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="10" href="{{route('game.playGame')}}?plat_type=BBIN&game_type=2" data-apitype="2"  data-mt-ic="_vr_mt_casino_10"> BB電子 </a> </p>
              </dd>
             </dl> </li>
            @endif
            <!--li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="15" href="javascript:void(0)" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_15"> <span class="apiicon hb shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="15" href="javascript:void(0)" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_15"> HABA電子 </a> </p>
              </dd>
             </dl> </li-->
             @if(in_array('DT', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a target="_blank" class="shake shake-opacity _vr_mt_check" data-api="27" href="{{route('game.playGame')}}?plat_type=DT&game_type=2" data-apitype="2" data-mt-ic="_vr_mt_casino_27"> <span class="apiicon dt shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a target="_blank" class="enter-link _vr_mt_check _vr_mt_slogan" data-api="27" href="{{route('game.playGame')}}?plat_type=DT&game_type=2" data-apitype="2" data-mt-ic="_vr_mt_casino_27"> DT電子 </a> </p>
              </dd>
             </dl> </li>
            @endif

            <!--li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="28" href="javascript:void(0)" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_28"> <span class="apiicon gg shake shake-little"></span> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="28" href="javascript:void(0)" data-apitype="2" data-href="" data-mt-ic="_vr_mt_casino_28"> GG捕魚 </a> </p>
              </dd>
             </dl> </li-->
           </ul>
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="sub-content" id="sub-chess" rel="sub-chess" style="display:none;">
       <div class="container">
        <div class="row row-gutter-0">
         <div class="col-7-1">
         </div>
         <div class="col-7-7">
          <div class="api-games">
           <ul class="list-table">
            @if(in_array('KY', $_api_list))
            <li>
             <dl class="sub-box api-item">
              <dt>
               <a class="shake shake-opacity _vr_mt_check" data-api="34" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="5" data-href="" data-mt-ic="_vr_mt_casino_34"> <span class="apiicon p-ky shake shake-little"></span> <p> <i>KY棋牌</i> 多款主流游戏可供选择，覆盖区域广 </p> </a>
              </dt>
              <dd>
               <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="34" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=KY&game_type=7','','width=1024,height=768')"
									   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="5">立即游戏</a> </p>
              </dd>
             </dl> </li>
            @endif
             @if(in_array('VG', $_api_list))
              <li>
               <dl class="sub-box api-item">
                <dt>
                 <a class="shake shake-opacity _vr_mt_check" data-api="34" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VG&game_type=7','','width=1024,height=768')"
                    @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="5" data-href="" data-mt-ic="_vr_mt_casino_34"> <span class="apiicon vg shake shake-little"></span> <p> <i>VG棋牌</i> 多款主流游戏可供选择，覆盖区域广 </p> </a>
                </dt>
                <dd>
                 <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="34" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=VG&game_type=7','','width=1024,height=768')"
                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="5">立即游戏</a> </p>
                </dd>
               </dl> </li>
             @endif
             @if(in_array('LEG', $_api_list))
              <li>
               <dl class="sub-box api-item">
                <dt>
                 <a class="shake shake-opacity _vr_mt_check" data-api="34" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEG&game_type=7','','width=1024,height=768')"
                    @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="5" data-href="" data-mt-ic="_vr_mt_casino_34"> <span class="apiicon ly shake shake-little"></span> <p> <i>LEG棋牌</i> 多款主流游戏可供选择，覆盖区域广 </p> </a>
                </dt>
                <dd>
                 <p><a class="enter-link _vr_mt_check _vr_mt_slogan" data-api="34" href="javascript:void(0)"@if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=LEG&game_type=7','','width=1024,height=768')"
                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif data-apitype="5">立即游戏</a> </p>
                </dd>
               </dl> </li>
             @endif
           </ul>
           <ul class="list-table">
           </ul>
          </div>
         </div>
        </div>
       </div>
      </div>
     </nav>
			<style type="text/css">
			a:hover{text-decoration:none}
			.nav-2-1 .navbar-sub{width:100%;position:absolute;z-index:99;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.5);box-shadow:0 2px 5px 0 rgba(0,0,0,0.5);background:url(/web/mb22/images/menubox.png) top center repeat-x;background-size:cover;-moz-background-size:cover;-webkit-background-size:cover;}
			.nav-2-1 .navbar-sub>.sub-content{height:150px;border-bottom:1px solid #333;overflow:hidden;}
			.nav-2-1 .api-item:hover{background:url(/web/mb22/images/navbar-sub-sprite.png) no-repeat -1000px 0;}
			#sub-casino.sub-content{height:200px;}
			.nav-2-1 #sub-casino .sub-box>dt{height:75px;}
			.nav-2-1 #sub-casino ul{border-bottom:1px solid #333;}
			.nav-2-1 #sub-casino .rebate dt{height:120px}
			.nav-2-1 #sub-casino .apiicon{height:75px;}
			.nav-2-1 .sub-box{text-align:center;margin-bottom:0;}
			.nav-2-1 .sub-box>dt{height:125px;overflow:hidden;position:relative;}
			.nav-2-1 .sub-box>dt>a>i{font-style:normal;font-size:14px;font-weight:bold;position:absolute;left:0;right:0;bottom:8px;}
			.nav-2-1 .sub-box>dt>a>p{display:inline-block;font-weight:normal;line-height:1.2em;width:105px;height:100px;margin:0;padding:10px 0 0 5px;text-align:left;vertical-align:top;color:#888;}
			.nav-2-1 .sub-box>dt>a>p>i{font-style:normal;font-size:14px;font-weight:bold;display:block;color:#fff;margin-bottom:10px;}
			.nav-2-1 #sub-sports .sub-box>dt>a>p{width:78px;font-size:12px;padding-top:0;text-align:center;}
			.nav-2-1 .sub-box>dd{height:24px;overflow:hidden;}
			.nav-2-1 .sub-box>dd>p,.headfloat .sub-box>dd>p>a,.headfloat .sub-box>dt>a{line-height:22px;margin:0;font-size:14px;color:#eee;text-shadow:0 1px 0 #000;}
			.nav-2-1 .sub-box>dd>p>a:hover,.headfloat .sub-box>dt>a:hover,.headfloat .sub-box>dt>a:hover p>i,.headfloat .api-item:hover>dd>p>a{color:#f3de8c;}
			.nav-2-1 .rebate dt{padding-top:0px;}
			.nav-2-1 .apiicon{width:100px;height:100px;position:relative;display:inline-block;background:url(/web/mb22/images/navbar-sub-sprite.png) no-repeat;}
			.nav-2-1 .apiicon.pt{background-position:0 -115px;}
			.nav-2-1 .apiicon.bb{background-position:-100px -100px;}
			.nav-2-1 .apiicon.mg{background-position:-200px -115px;}
			.nav-2-1 .apiicon.ag{background-position:-300px -100px;}
			.nav-2-1 .apiicon.nyx{background-position:-400px -115px;}
			.nav-2-1 .apiicon.hb{background-position:-500px -115px;}
			.nav-2-1 .apiicon.gd{background-position:-604px -100px;}
			.nav-2-1 .apiicon.og{background-position:-700px -100px;}
			.nav-2-1 .apiicon.hg{background-position:-800px -100px;}
			.nav-2-1 .apiicon.im{background-position:-900px -100px;}
			.nav-2-1 .apiicon.rs{background-position:-700px -200px;}
			.nav-2-1 .apiicon.bc{background-position:-585px 0;}
			.nav-2-1 .apiicon.ysb{background-position:-685px 0;}
			.nav-2-1 .apiicon.sa{background-position:0 -200px;}
			.nav-2-1 .apiicon.ebet{background-position:-100px -200px;}
			.nav-2-1 .apiicon.ds{background-position:-202px -200px;}
			.nav-2-1 .apiicon.dw{background-position:-300px -200px;}
			.nav-2-1 .apiicon.kg{background-position:-400px -200px;}
			.nav-2-1 .apiicon.yzt{background-position:-600px -400px;}
			.nav-2-1 #sub-lottery .apiicon.vr{background-position:-221px -392px;}
			.nav-2-1 .apiicon.chq{background-position:-500px -200px;}
			.nav-2-1 .apiicon.sb{background-position:-600px -200px;}
			.nav-2-1 .apiicon.xhg{background-position:-700px -200px;}
			.nav-2-1 .apiicon.opus-s{background-position:-800px -200px;}
			.nav-2-1 .apiicon.opus-l{background-position:-800px -200px;}
			.nav-2-1 .apiicon.shenbo{background-position:-1212px -200px;}
			.nav-2-1 .apiicon.bsg{background-position:-900px -210px;}
			.nav-2-1 .apiicon.sg{background-position:-1100px -215px;}
			.nav-2-1 .apiicon.png{background-position:-700px -315px;}
			.nav-2-1 .apiicon.gg{background-position:-800px -310px;}
			.nav-2-1 .apiicon.dt{background-position:-900px -315px;}
			.nav-2-1 #sub-casino .apiicon.ag{background-position:-300px -115px;}
			.nav-2-1 #sub-casino .apiicon.bb{background-position:-100px -115px;}
			.nav-2-1 .apiicon.gns{background-position:-1000px -315px;}
			.nav-2-1 .apiicon.prg{background-position:-1100px -315px;}
			.nav-2-1 .apiicon.mw{background-position:-1210px -315px;}
			.nav-2-1 .apiicon.pg{background-position:4px -411px}
			.nav-2-1 .apiicon.nt{background-position:-103px -409px}
			.nav-2-1 .apiicon.lt,.headfloat .apiicon.tl{background-position:-1000px -200px;}
			.nav-2-1 .apiicon.mg-01{background-position:0 -300px;}
			.nav-2-1 .apiicon.mg-02{background-position:-100px -300px;}
			.nav-2-1 .apiicon.mg-03{background-position:-200px -300px;}
			.nav-2-1 .apiicon.mg-04{background-position:-300px -300px;}
			.nav-2-1 .apiicon.mg-05{background-position:-400px -300px;}
			.nav-2-1 .apiicon.mg-06{background-position:-500px -300px;}
			.nav-2-1 .api-games>ul>li{border-right:1px solid rgba(200,200,200,0.2);}
			.nav-2-1 .api-games>ul>li:first-child{border-left:1px solid rgba(200,200,200,0.2);}

			.nav-2-1 .num-dot,.headfloat .num-pre,.headfloat .num-num{height:100px;position:relative;display:inline-block;background:url(/web/mb22/images/navbar-sub-sprite.png) no-repeat;}
			.nav-2-1 .num-dot{width:10px;background-position:-500px 0;}
			.nav-2-1 .num-num{width:50px;}.nav-2-1 .num-num[num="1"]{width:30px;background-position:0 0;}
			.nav-2-1 .num-num[num="2"]{background-position:-50px 0;}
			.nav-2-1 .num-num[num="3"]{background-position:-100px 0;}
			.nav-2-1 .num-num[num="4"]{background-position:-150px 0;}
			.nav-2-1 .num-num[num="5"]{background-position:-200px 0;}
			.nav-2-1 .num-num[num="6"]{background-position:-250px 0;}
			.nav-2-1 .num-num[num="7"]{background-position:-300px 0;}
			.nav-2-1 .num-num[num="8"]{background-position:-350px 0;}
			.nav-2-1 .num-num[num="9"]{background-position:-400px 0;}
			.nav-2-1 .num-num[num="0"]{background-position:-450px 0;}
			.nav-2-1 #sub-chess .sub-box .apiicon.p-ky,.nav-2-1 #sub-chess .sub-box .apiicon.vg,.nav-2-1 #sub-chess .sub-box .apiicon.qly,.nav-2-1 #sub-chess .sub-box .apiicon.ly{width:170px;height:110px;background:url(/web/mb22/images/navbar-sub-chess-first1.png)}
			.nav-2-1 #sub-chess .sub-box .apiicon.p-ky{background-position:-10px 0;}
			.nav-2-1 #sub-chess .sub-box .apiicon.vg{background-position:-228px 0;}
			.nav-2-1 #sub-chess .sub-box .apiicon.qly{background-position:-432px 0;}
			.nav-2-1 #sub-chess .sub-box .apiicon.ly{background-position:-640px 0;}
			.nav-2-2 .headfloat{width:100%;position:absolute;top:36px;left:0;background:#37251c}
			.nav-2-2 .nav_fixed{position:fixed;top:0;left:0;z-index:999;}
			.nav-2-2 .menu{height:88px;}
			.nav-2-2 .menu ul{float:right;text-align:right;width:850px;margin:0;}
			.nav-2-2 .menu ul li{display:inline-block;height:88px;text-align:center;line-height:23px;position:relative;}
			.nav-2-2 .menu ul li a{display:block;padding:25px 10px 0;color:#ffc641;font-size:14px;}
			.nav-2-2 .menu ul li a span{display:block;color:#ffc641;font-size:12px;}
			.nav-2-2 .menu ul li .hot{position:absolute;right:14px;top:6px;}
			.nav-2-2 .menu ul li .hot2{right:14px;}
			.nav-2-2 .navbar-sub{width:100%;position:absolute;z-index:99;-webkit-box-shadow:0 2px 5px 0 rgba(0,0,0,0.5);box-shadow:0 2px 5px 0 rgba(0,0,0,0.5);background:url(/web/mb22/images/menubox.png) top center repeat-x;background-size:cover;-moz-background-size:cover;-webkit-background-size:cover;}
			.nav-2-2 .navbar-sub>.sub-content{height:150px;border-bottom:1px solid #333;overflow:hidden;}
			.nav-2-2 .api-item:hover{background:url(/web/mb22/images/navbar-sub-sprite.png) no-repeat -1000px 0;}
			#sub-casino.sub-content{height:200px;}
			.nav-2-2 #sub-casino .sub-box>dt{height:75px;}
			.nav-2-2 #sub-casino ul{border-bottom:1px solid #333;}
			.nav-2-2 #sub-casino .rebate dt{height:120px}
			.nav-2-2 #sub-casino .apiicon{height:75px;}
			.nav-2-2 .sub-box{text-align:center;margin-bottom:0;}
			.nav-2-2 .sub-box>dt{height:125px;overflow:hidden;position:relative;}
			.nav-2-2 .sub-box>dt>a>i{font-style:normal;font-size:14px;font-weight:bold;position:absolute;left:0;right:0;bottom:8px;}
			.nav-2-2 .sub-box>dt>a>p{display:inline-block;font-weight:normal;line-height:1.2em;width:105px;height:100px;margin:0;padding:10px 0 0 5px;text-align:left;vertical-align:top;color:#888;}
			.nav-2-2 .sub-box>dt>a>p>i{font-style:normal;font-size:14px;font-weight:bold;display:block;color:#fff;margin-bottom:10px;}
			.nav-2-2 #sub-sports .sub-box>dt>a>p{width:78px;font-size:12px;padding-top:0;text-align:center;}
			.nav-2-2 .sub-box>dd{height:24px;overflow:hidden;}
			.nav-2-2 .sub-box>dd>p,.headfloat .sub-box>dd>p>a,.headfloat .sub-box>dt>a{line-height:22px;margin:0;font-size:14px;color:#eee;text-shadow:0 1px 0 #000;}
			.nav-2-2 .sub-box>dd>p>a:hover,.headfloat .sub-box>dt>a:hover,.headfloat .sub-box>dt>a:hover p>i,.headfloat .api-item:hover>dd>p>a{color:#f3de8c;}
			.nav-2-2 .rebate dt{padding-top:20px;}
			.nav-2-2 #sub-lottery .apiicon{width:100px;height:100px;position:relative;display:inline-block;background:url(web/images/navbar-sub-lottery/navbar-sub-lottery-first4.png) no-repeat;}
			.nav-2-2 #sub-live .apiicon{width:100px;height:100px;position:relative;display:inline-block;background:url(web/navbar-sub-live/navbar-sub-live-first5.png) no-repeat;}
			.nav-2-2 #sub-casino .apiicon{width:100px;height:100px;position:relative;display:inline-block;background:url(web/images/index/navbar-sub-sprite.png) no-repeat;}
			.nav-2-2 #sub-sports .apiicon{width:100px;height:100px;position:relative;display:inline-block;background:url(web/images/navbar-sub-sports/navbar-sub-sports-first4.png) no-repeat;}
			.nav-2-2 #sub-lottery .apiicon.kg{background-position:-100px 7px;}
			.nav-2-2 #sub-lottery .apiicon.bb{background-position:-700px 7px;}
			.nav-2-2 #sub-lottery .apiicon.vr{background-position:-1000px 7px;}
			.nav-2-2 #sub-lottery .apiicon.lt,.headfloat #sub-lottery .apiicon.tl{background-position:-399px 7px;}
			.nav-2-2 #sub-casino .apiicon.mg{background-position:-200px -115px;}
			.nav-2-2 #sub-casino .apiicon.pt{background-position:0 -115px;}
			.nav-2-2 #sub-casino .apiicon.ag{background-position:-300px -115px;}
			.nav-2-2 #sub-casino .apiicon.nyx{background-position:-400px -115px;}
			.nav-2-2 #sub-casino .apiicon.hb{background-position:-500px -115px;}
			.nav-2-2 #sub-casino .apiicon.bb{background-position:-100px -115px;}
			.nav-2-2 #sub-casino .apiicon.bsg{background-position:-900px -215px;}
			.nav-2-2 #sub-casino .apiicon.sg{background-position:-1100px -215px;}
			.nav-2-2 #sub-casino .apiicon.png{background-position:-700px -315px;}
			.nav-2-2 #sub-casino .apiicon.gg{background-position:-800px -310px;}
			.nav-2-2 #sub-casino .apiicon.dt{background-position:-900px -315px;}
			.nav-2-2 #sub-casino .apiicon.gns{background-position:-1000px -315px;}
			.nav-2-2 #sub-casino .apiicon.prg{background-position:-1100px -315px;}
			.nav-2-2 #sub-casino .apiicon.mw{background-position:-1210px -315px;}
			.nav-2-2 #sub-casino .apiicon.pg{background-position:10px -420px}
			.nav-2-2 #sub-casino .apiicon.nt{background-position:-103px -420px}
			.nav-2-2 #sub-sports .apiicon.hg{background-position:-1px 2px;}
			.nav-2-2 #sub-sports .apiicon.sb{background-position:-113px 2px;}
			.nav-2-2 #sub-sports .apiicon.rs{background-position:-228px 2px;}
			.nav-2-2 #sub-sports .apiicon.bc{background-position:-342px 2px;}
			.nav-2-2 #sub-sports .apiicon.ysb{background-position:-456px 2px;}
			.nav-2-2 #sub-sports .apiicon.bb{background-position:-685px 2px;}
			.nav-2-2 #sub-sports .apiicon.im{background-position:-569px 2px;}
			.nav-2-2 #sub-live .apiicon.bb{background-position:-7px -11px;}
			.nav-2-2 #sub-live .apiicon.ag{background-position:-115px -11px;}
			.nav-2-2 #sub-live .apiicon.ebet{background-position:-228px -11px;}
			.nav-2-2 #sub-live .apiicon.opus-l{background-position:-338px -11px;}
			.nav-2-2 #sub-live .apiicon.og{background-position:-444px -11px;}
			.nav-2-2 #sub-live .apiicon.sa{background-position:-557px -11px;}
			.nav-2-2 #sub-live .apiicon.gd{background-position:-664px -11px;}
			.nav-2-2 #sub-live .apiicon.ds{background-position:-771px -11px;}
			.nav-2-2 #sub-live .apiicon.shenbo{background-position:-890px -11px;}
			.nav-2-2 #sub-chess .sub-box .apiicon.p-ky,.nav-2-2 #sub-chess .sub-box .apiicon.vg,.nav-2-2 #sub-chess .sub-box .apiicon.qly,.nav-2-2 #sub-chess .sub-box .apiicon.ly{width:170px;height:110px;background:url(web/images/index/navbar-sub-chess-first1.png)}
			.nav-2-2 #sub-chess .sub-box .apiicon.p-ky{background-position:-10px 0;}
			.nav-2-2 #sub-chess .sub-box .apiicon.vg{background-position:-228px 0;}
			.nav-2-2 #sub-chess .sub-box .apiicon.qly{background-position:-432px 0;}
			.nav-2-2 #sub-chess .sub-box .apiicon.ly{background-position:-640px 0;}
			#sub-chess .list-table li dl dt a span{margin-top:15px}
			.nav-2-2 .apiicon{width:100px;height:100px;position:relative;display:inline-block;background:url(web/images/index/navbar-sub-sprite.png) no-repeat;}
			.nav-2-2 .apiicon.mg-01{background-position:0 -300px;}
			.nav-2-2 .apiicon.mg-02{background-position:-100px -300px;}
			.nav-2-2 .apiicon.mg-03{background-position:-200px -300px;}
			.nav-2-2 .apiicon.mg-04{background-position:-300px -300px;}
			.nav-2-2 .apiicon.mg-05{background-position:-400px -300px;}
			.nav-2-2 .apiicon.mg-06{background-position:-500px -300px;}
			.nav-2-2 .api-games>ul>li{border-right:1px solid rgba(200,200,200,0.2);}
			.nav-2-2 .api-games>ul>li:first-child{border-left:1px solid rgba(200,200,200,0.2);}
			.nav-2-2 .num-dot,.headfloat .num-pre,.headfloat .num-num{height:100px;position:relative;display:inline-block;background:url(/web/mb22/images/navbar-sub-sprite.png) no-repeat;}
			.nav-2-2 .num-dot{width:10px;background-position:-500px 0;}
			.nav-2-2 .num-pre{width:32px;background-position:-510px 0;}
			.nav-2-1 .num-pre{width:32px;background-position:-510px 0;}
			.nav-2-2 .num-num{width:50px;}
			.nav-2-2 .num-num[num="1"]{width:30px;background-position:0 0;}
			.nav-2-2 .num-num[num="2"]{background-position:-50px 0;}
			.nav-2-2 .num-num[num="3"]{background-position:-100px 0;}
			.nav-2-2 .num-num[num="4"]{background-position:-150px 0;}
			.nav-2-2 .num-num[num="5"]{background-position:-200px 0;}
			.nav-2-2 .num-num[num="6"]{background-position:-250px 0;}
			.nav-2-2 .num-num[num="7"]{background-position:-300px 0;}
			.nav-2-2 .num-num[num="8"]{background-position:-350px 0;}
			.nav-2-2 .num-num[num="9"]{background-position:-400px 0;}
			.nav-2-2 .num-num[num="0"]{background-position:-450px 0;}
			</style>
		</div>
	</div>
</div>
<script src="{{asset('/web/mb22/js/gui-base.js')}}"></script>
  <script>
  $(function() {
    dropdownOpen();
    initMenuEvents();
});
function dropdownOpen() {
    var $dropdownLi = $('._vr_loginSuccess .dropdown');
    $dropdownLi.mouseover(function() {
        $(this).addClass('open');
    }).mouseout(function() {
        $(this).removeClass('open');
    });
}
function initMenuEvents() {
    var dataPage = window.location.pathname.split("/")[1] == "" ? "index.html": window.location.pathname.split("/")[1];
    var currentNavSelector = '._vr_nav a[data-page="' + dataPage + '"]';
    var $currentNav = $(currentNavSelector).parent();
    $currentNav.siblings().removeClass("active");
    $currentNav.addClass("active");
    if (dataPage != 'agent.html') {
        jQuery("._vr_nav").slide({
            type: "menu",
            titCell: "li",
            targetCell: ".dropdown-menu",
            effect: "slideDown",
            delayTime: 300,
            triggerTime: 0,
            returnDefault: true
        });
    } else {
        jQuery(".slide").hover(function() {
            jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
        },
        function() {
            jQuery(this).find(".prev,.next").fadeOut()
        });
        jQuery(".slide").slide({
            titCell: ".slide-indicators ul",
            mainCell: ".slide-inner ul",
            effect: "fold",
            autoPlay: true,
            interTime: 5500,
            autoPage: true,
            trigger: "click",
            startFun: function(i) {
                var curLi = jQuery(".slide .slide-inner li").eq(i);
                if ( !! curLi.attr("data-src")) {
                    curLi.css("background-image", curLi.attr("data-src")).removeAttr("data-src")
                }
            }
        });
    }
    var mega = {};
    var $activeElement;
    $('[rel]').hover(function() {
        $activeElement = $activeElement != undefined ? $activeElement: $('.active[rel]');
        var _rel = $(this).attr('rel');
        clearTimeout(mega[_rel + '_timer']);
        mega[_rel + '_timer'] = setTimeout(function() {
            $('[rel]').each(function() {
                $(this)[_rel == $(this).attr('rel') ? 'addClass': 'removeClass']('active');
            });
            $('#' + _rel).stop(true, true).slideDown("300");
        },150);
    },function() {
        var _rel = $(this).attr('rel');
        clearTimeout(mega[_rel + '_timer']);
        mega[_rel + '_timer'] = setTimeout(function() {
            $('[rel]').removeClass('active');
            $activeElement.addClass('active');
            $('#' + _rel).stop(true, true).slideUp(300);
        },150);
    });
}
</script>
<script src="{{asset('/web/mb22/js/menu.js')}}"></script>
<script>
$(function() {
		  textBlink($(".nav-blink1"),"#d4b979","yellow",300);
		  textBlink($(".nav-blink2"),"#d4b979","red",350);
		  textBlink($(".nav-blink3"),"#d4b979","yellow",300);
		  textBlink($(".info-link1"),"#999","#1de000",250);
		  textBlink($(".info-link2"),"#999","#7800ff",350);
		  $('.partner-wrap ul li a').hover(function() {
			  $('span',this).stop().animate({'opacity':1},300);
			  $(this).stop().animate({"backgroundPositionY":"40px"});
			  $(".hontu-wrap").css("z-index","0");
		  },function() {
			  $('span',this).stop().animate({'opacity':0},300);
			  $(this).stop().animate({"backgroundPositionY":0});
			  $(".hontu-wrap").css("z-index","-1");
		  });
	  });
</script>
