@extends('web.template.mb22.layouts.main')
@section('content')
<!-- banner开始-->
<div class="banner">
	<div class="hd">
		<ul>
			@foreach($banners as $item)
				<li></li>
			@endforeach
		</ul>
	</div>
	<div class="bd">
		<ul>
			@foreach($banners as $item)
		{{--<a href="{{$item->jumpurl}}" target="_blank"><li>
				<img src="{{$item->path}}">
			</li></a>--}}
				<a href="{{$item->jumpurl}}" target="_blank"><li class="" style="background:url({{$item->path}}) no-repeat top center"></li></a>
			@endforeach
		{{--<li class="" style="background:url(/web/images/home/p4.jpg) no-repeat top center"></li>
		<li class="" style="background:url(/web/images/home/p1.jpg) no-repeat top center"></li>
		<li class="" style="background:url(/web/images/home/p2.jpg) no-repeat top center"></li>
		<li class="" style="background:url(/web/images/home/p5.jpg) no-repeat top center"></li>--}}
		</ul>
	</div>
	<!------------------------------------------------------------------------------------------->
	<div class="index-content">
		<div class="loginbox wow flipInX">
		@if (Auth::guard('member')->guest())
			<form method="POST" action="{{ route('member.login.post') }}">
				<div class="title">会员登录</div>
				<div class="con">
					<li class="user"><input type="text" class="text user" name="name" placeholder="账号"></li>
					<li class="mm"><input type="password" name="password" class="text password"  placeholder="密码"></li>
					<li class="yzm"  style="position:relative">
						<input type="text" name="captcha" placeholder="验证码" onfocus="javascript:re_captcha();" class="text yz">
						<a href="javscript:void(0)" class="codeimg"><img border="0" src="{{ URL('kit/captcha/1') }}" onclick="javascript:re_captcha();" id="codeurl" style="background-color:burlywood;position:absolute;top:-8px;right:2px;" height="35" width="58"></a>
					</li>
					<li class="lobtn" ><input type="button" name="formsub" border="0" class="ajax-submit-btn"></li>
					<li class="reg"><input type="button" onclick="javascript:window.location.href='{{ route('web.register_one') }}'"></li>
				</div>
				<div class="link">
					<a href="javscript:void(0)" onclick="alert('忘记账号密码，请联系在线客服人员取回！')">忘记密码</a>
				</div>					
			</form>
			<script>
				function re_captcha() {
					var url = "{{ URL('kit/captcha') }}";
					url = url + "/" + Math.random();
					document.getElementById('codeurl').src = url;
				}
			</script>
		@else
			<div class="title">欢迎光临</div>
			<div class="loginInner">
				<p>账 号：<span>{{ $_member->name }}</span></p>
				<p>系统余额：<span class="ch money" id="user_money">{{ $_member->all_money }}</span><a><img src="{{asset('web/mb22/images/icon07.png')}}" alt=""></a></p>
				@if($_system_config ->is_new_center == 1)
					<p>
						
						 <a href="{{ route('member.userCenter') }}?type=6">会员中心</a>&nbsp;</p>
								 <a href="{{ route('member.userCenter') }}?type=1">存取款</a>&nbsp;</p>							
							   <a href="{{ route('member.userCenter') }}?type=4">账户记录</a>&nbsp;</p>
					@else
				<p>
					<a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="{{ route('member.member_drawing') }}">线上取款</a>
				</p>
				<p>
					<a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;{{--&nbsp;|&nbsp;&nbsp;--}}
					{{--<a href="{{ route('member.message_list') }}"> 未读讯息({{ $_not_read_message_num }})</a>--}}
				</p>
				@endif
				<div class="subLink"><a href="{{ route('member.logout') }}"><img src="{{asset('web/mb22/images/loginout-btn.png')}}" alt=""></a></div>
			</div>		
		@endif
		</div>
	</div>
</div>
<div class="news">
	<div class="w1000">
		<div class="title">最新公告</div>
		<div class="bd">
			<marquee scrollamount="3" scrolldelay="100" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
			@foreach($_system_notices as $v)
				<a><<{{ $v->title }}>>{{ $v->content }}</a>
			@endforeach
			</marquee>
		</div>

		<div class="hd"><a class="next"></a><a class="prev"></a></div>
	</div>
</div>	



<div class="hotgame">
	<div class="hotgame-main w1000 clearfix">
		<div class="robot wow bounceInLeft"></div>
		<div class="hd">
			<a class="prev"></a>
			<ul>
			@if(in_array('PT', $_api_list))
				<li class="g3"><i><img src="{{asset('web/mb22/images/3.png')}}" /></i><p>PT电子</p><span>PT GAMING</span></li>
			@endif
			@if(in_array('MG', $_api_list))
				<li class="g1"><i><img src="{{asset('web/mb22/images/1.png')}}" /></i><p>MG电子</p><span>MG GAMING</span></li>
			@endif
			@if(in_array('BBIN', $_api_list))
				<li class="g4"><i><img src="{{asset('web/mb22/images/4.png')}}" /></i><p>BB电子</p><span>BB GAMING</span></li>
			@endif
			@if(in_array('SA', $_api_list))
				<li class="g5"><i><img style="width: 62px;height: 32px" src="{{asset('web/mb22/images/9.png')}}" /></i><p>SA电子</p><span>SA GAMING</span></li>
			@endif
			@if(in_array('VT', $_api_list))
				<li class="g6"><i><img src="{{asset('web/mb22/images/5.png')}}" /></i><p>VT电子</p><span>AG GAMING</span></li>
			@endif
			@if(in_array('CQ9', $_api_list))
				<li class="g8"><i><img style="width: 62px;height: 32px" src="{{asset('web/mb22/images/10.png')}}" /></i><p>CQ9</p><span>CQ9 GAMING</span></li>
			@endif
			@if(in_array('JDB', $_api_list))
				<li class="g2"><i><img style="width: 62px;height: 32px" src="{{asset('web/mb22/images/11.png')}}" /></i><p>JDB电子</p><span>JDB GAMING</span></li>
			@endif
			</ul>
			<a class="next"></a>
		</div>
		<div class="bd clearfix">

			@if(in_array('PT', $_api_list))
			<ul class="gameUl clearfix">
				<iframe style="width: 630px;height: 294px" src="{{route('wg.playGame')}}?plat_type=PT&gamename=MyGameLobby"></iframe>
			</ul>

			@endif
				@if(in_array('MG', $_api_list))
					<ul class="gameUl clearfix">
						<iframe style="width: 630px;height: 294px" src="{{route('wg.playGame')}}?plat_type=MG&gamename=MyGameLobby"></iframe>
					</ul>
				@endif
				@if(in_array('BBIN', $_api_list))
					<ul class="gameUl clearfix">
						<iframe style="width: 630px;height: 294px" src="{{route('wg.playGame')}}?plat_type=BBIN&gamename=MyGameLobby"></iframe>
					</ul>
				@endif
				@if(in_array('SA', $_api_list))
					<ul class="gameUl clearfix">
						<iframe style="width: 630px;height: 294px" src="{{route('wg.playGame')}}?plat_type=SA&gamename=MyGameLobby"></iframe>
					</ul>
				@endif
				@if(in_array('AG', $_api_list))
					<ul class="gameUl clearfix">
						<iframe style="width: 630px;height: 294px" src="{{route('wg.playGame')}}?plat_type=AG&gamename=MyGameLobby"></iframe>
					</ul>
				@endif
				@if(in_array('CQ9', $_api_list))
					<ul class="gameUl clearfix">
						<iframe style="width: 630px;height: 294px" src="{{route('wg.playGame')}}?plat_type=CQ9&gamename=MyGameLobby"></iframe>
					</ul>
				@endif
				@if(in_array('JDB', $_api_list))
					<ul class="gameUl clearfix">
						<iframe style="width: 630px;height: 294px" src="{{route('wg.playGame')}}?plat_type=JDB&gamename=MyGameLobby"></iframe>
					</ul>
				@endif
		</div>
		<div class="yjb wow bounceInRight">
			<div class="rich-title">
				<span class="t1">客户ID</span>
				<span class="t2">金额</span>
				<span class="t3">游戏名称 </span>
			</div>
			<div class="bd">
				<ul>
					<li>
						<span class="bdname">lc***2</span>
						<span class="bdjine">6509.41</span>
						<span>宝石联机</span>
					</li>
					<li>
						<span class="bdname">bk***0</span>
						<span class="bdjine">2804.22</span>
						<span>古怪猴子</span>
					</li>
					<li>
						<span class="bdname">bj***8</span>
						<span class="bdjine">9549.76</span>
						<span>明星97</span>
					</li>
					<li>
						<span class="bdname">gy***1</span>
						<span class="bdjine">67562.19</span>
						<span>古怪猴子</span>
					</li>
					<li>
						<span class="bdname">hb***5</span>
						<span class="bdjine">11497.30</span>
						<span>摆脱</span>
					</li>
					<li>
						<span class="bdname">be***9</span>
						<span class="bdjine">45453.63</span>
						<span>明星97</span>
					</li>
					<li>
						<span class="bdname">uk***8</span>
						<span class="bdjine">7754.19</span>
						<span>魔法美人鱼</span>
					</li>
					<li>
						<span class="bdname">ch***6</span>
						<span class="bdjine">3413.14</span>
						<span>AG捕鱼王</span>
					</li>
					<li>
						<span class="bdname">hm***5</span>
						<span class="bdjine">19200.70</span>
						<span>古怪猴子</span>
					</li>
					<li>
						<span class="bdname">uu***8</span>
						<span class="bdjine">7549.40</span>
						<span>明星97</span>
					</li>
					<li>
						<span class="bdname">ra***5</span>
						<span class="bdjine">24571.43</span>
						<span>幸运锦鲤</span>
					</li>
					<li>
						<span class="bdname">hn***0</span>
						<span class="bdjine">35493.00</span>
						<span>灵猴献瑞</span>
					</li>
					<li>
						<span class="bdname">nb***1</span>
						<span class="bdjine">21359.59</span>
						<span>魔法美人鱼</span>
					</li>
					<li>
						<span class="bdname">fi***9</span>
						<span class="bdjine">10211.69</span>
						<span>AG捕鱼王</span>
					</li>
					<li>
						<span class="bdname">hb***1</span>
						<span class="bdjine">46571.62</span>
						<span>幸运锦鲤</span>
					</li>
					<li>
						<span class="bdname">ha***8</span>
						<span class="bdjine">5875.77</span>
						<span>沉默的武士</span>
					</li>
					<li>
						<span class="bdname">nf***4</span>
						<span class="bdjine">5497.70</span>
						<span>灵猴献瑞</span>
					</li>
					<li>
						<span class="bdname">hb***8</span>
						<span class="bdjine">4768.23</span>
						<span>魔法美人鱼</span>
					</li>
					<li>
						<span class="bdname">hg***4</span>
						<span class="bdjine">39782.35</span>
						<span>宝石联机</span>
					</li>
					<li>
						<span class="bdname">hf***3</span>
						<span class="bdjine">8544.04</span>
						<span>AG捕鱼王</span>
					</li>
					<li>
						<span class="bdname">ga***8</span>
						<span class="bdjine">8148.37</span>
						<span>明星97</span>
					</li>
					<li>
						<span class="bdname">mj***3</span>
						<span class="bdjine">36244.21</span>
						<span>明星97</span>
					</li>
					<li>
						<span class="bdname">lo***2</span>
						<span class="bdjine">20108.70</span>
						<span>幸运锦鲤</span>
					</li>
					<li>
						<span class="bdname">jl***6</span>
						<span class="bdjine">34594.24</span>
						<span>淑女之夜</span>
					</li>
					<li>
						<span class="bdname">wh***6</span>
						<span class="bdjine">9540.40</span>
						<span>AG捕鱼王</span>
					</li>
					<li>
						<span class="bdname">li***5</span>
						<span class="bdjine">28545.34</span>
						<span>明星97</span>
					</li>
					<li>
						<span class="bdname">gj***3</span>
						<span class="bdjine">17863.75</span>
						<span>淑女之夜</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="quicklink">
	<div class="w1000">
		<ul class="clearfix">
			<li class="q1 wow bounceInUp" data-wow-delay="0.1s">
				<a href="{{ route('web.liveCasino') }}">
					<div class="photo">
						<img src="{{asset('web/mb22/images/q1.png')}}">
						<div class="hov">
							<h3>进入游戏</h3>
						</div>
					</div>
					<p>真人娱乐</p><span>汇聚全球最佳真人娱乐平台</span><i></i>
				</a>
			</li>
			<li class="q2 wow bounceInUp" data-wow-delay="0.2s">
				<a href="{{ route('web.eGame') }}">
					<div class="photo">
						<img src="{{asset('web/mb22/images/q2.png')}}">
						<div class="hov">
							<h3>进入游戏</h3>
						</div>
					</div>
					<p>电子游艺</p>
					<span>亚洲热门电子游戏平台 一网打尽</span>
					<i></i>
				</a>
			</li>
			<li class="q3 wow bounceInUp" data-wow-delay="0.3s">
				<a href="{{ route('web.lottory') }}">
					<div class="photo">
						<img src="{{asset('web/mb22/images/q3.png')}}">
						<div class="hov">
							<h3>进入游戏</h3>
						</div>
					</div>
					<p>彩票游戏</p>
					<span>全球最公开公正公平的彩票平台</span>
					<i></i>
				</a>
			</li>
			<li class="q4 wow bounceInUp" data-wow-delay="0.4s">
				<a href="{{ route('web.esports') }}">
					<div class="photo">
						<img src="{{asset('web/mb22/images/q4.png')}}">
						<div class="hov">
							<h3>进入游戏</h3>
						</div>
					</div>
					<p>体育赛事</p>
					<span>每周为您精选数千场热门比赛</span>
					<i></i>
				</a>
			</li>
		</ul>
	</div>
</div>





<div class="mobile">
	<div class="w1000 clearfix mobile-main">
		<div class="con wow slideInLeft">
			<div class="title"></div>
			<div class="txt">我们的手机投注平台面向全网玩家，提供近百款老虎机·百家乐·以及彩票游戏投注，线上存款及线上存款，一键操作，运用3D即时运算创造真实场景结合立体影像，完整规划的跨系统娱乐平台，整合同步账号和资料传输，达到随时随地不间断娱乐的享受概念。</div>
			<div class="pay"></div>
		</div>
		<div class="phone wow slideInRight"></div>
	</div>
</div>
@endsection
@section('after.js')

@if($_system_config->is_alert_on == 0)
	<style>
	.home_tanchu{display:block}
	#layui-layer1{background:transparent;height:420px}
	</style>
	<script>
	//捕获页
	layer.open({
	  type: 1,
	  shade: false,
	  title: false, //不显示标题
	  scrollbar: false,
	  area: ['650px'],
	  content: '<a class="home_tanchu" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin={{ $_system_config->qq }}&site=qq&menu=yes"><img src="{{ $_system_config->alert_img }}" /></a>',
	  cancel: function(){
		layer.msg('欢迎联系我们！', {time: 1000, icon:6});
	  }
	});		
	</script>
@endif
<script>
	@if (!Auth::guard('member')->guest())
    $(function () {
        $.ajax({
            type:'post',
            url : "{{route('member.api.wallet_balance')}}",
            dataType : 'json',
            success : function (data) {
                //console.log(data);
                if(data.statusCode == '01'){
                    var all = Number($('.money').text()) + Number(data.data);
                    $('.money').text('');
                    $('.money').text(parseInt(all.toFixed(2)));
                }
            }
        })
    })
	@endif
</script>
<script type="text/javascript">
	wow = new WOW({
		animateClass: 'animated',
		offset: 200,
		callback: function(box) {
			console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
		}
	});
	wow.init();

	jQuery(".banner").slide({mainCell:".bd ul",autoPlay:true});
	jQuery(".yjb").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:6,interTime:50,trigger:"click"});
	jQuery(".hotgame").slide({});
	jQuery(".hotgame").slide({titCell:".hd .test",mainCell:".hd ul",autoPage:true,effect:"left",autoPlay:true,vis:6});
</script>
@endsection
