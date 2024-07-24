@extends('web.template.mb21.layouts.main')
@section('content')
<div class="weihuan-home">
	<div class="weihuan-home-slider">
		<div class="swiper-container">
			<div class="swiper-wrapper">
				@foreach($banners as $item)
				<div class="swiper-slide">
					<a href="{{$item->jumpurl}}" target="_blank">
					<img src="{{$item->path}}"></a>
				</div>
					@endforeach
			</div>
			<!-- 分页器 -->
			<div class="swiper-pagination"></div>
		</div>
	</div>
</div>

<div class="weihuan-home-notice">
	<div class="container">
		<img src="{{ asset('/web/mb21/images/notice.png') }}">
		<div id="notice">
			<div id="innotice">
				@foreach($_system_notices as $v)
				<div id="notice1">
					<span>
						* {{ $v->title }}
					</span>
				</div>
				@endforeach
				<div id="notice2"></div>
			</div>
		</div>
	</div>
</div>
<div class="weihuan-home-game">
	<div class="container">
		<div class="list clear">
			<div class="left">
				<div class="a">
					<li>
						<a href="{{ route('web.eGame') }}">
							<div class="title">老虎机</div>
							<img src="{{ asset('/web/mb21/images/game1.jpg') }}">
							<div class="btn">
								<button type="">立即游戏</button>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ route('web.liveCasino') }}">
							<div class="title">真人視訊</div>
							<img src="{{ asset('/web/mb21/images/game.jpg') }}">
							<div class="btn">
								<button type="">立即游戏</button>
							</div>
						</a>
					</li>
				</div>
				<div class="b">
					<li>
						<a href="{{ route('web.poker') }}">
							<div class="title">棋牌游戏</div>
							<img src="{{ asset('/web/mb21/images/img5.jpg') }}">
							<div class="btn">
								<button type="">立即游戏</button>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ route('web.eGame') }}">
							<div class="title">電子竞技</div>
							<img src="{{ asset('/web/mb21/images/img6.jpg') }}">
							<div class="btn">
								<button type="">立即游戏</button>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ route('web.catchFish') }}" >
							<div class="title">捕魚游戏</div>
							<img src="{{ asset('/web/mb21/images/img7.jpg') }}">
							<div class="btn">
								<button type="">立即游戏</button>
							</div>
						</a>
					</li>
					<li>
						<a href="{{ route('web.lottory') }}">
							<div class="title">彩票</div>
							<img src="{{ asset('/web/mb21/images/img8.jpg') }}">
							<div class="btn">
								<button type="">立即游戏</button>
							</div>
						</a>
					</li>
				</div>
			</div>
			<div class="right">
				<a href="{{ route('web.esports') }}" >
					<div class="title">體育竞技</div>
					<img src="{{ asset('/web/mb21/images/img3.jpg') }}">
					<div class="btn">
						<button type="">立即游戏</button>
					</div>
				</a>
			</div>
		</div>
		<div class="other clear">
			<div class="video">
				<div class="title">精彩视频</div>
				<img class="bg" src="{{ asset('/web/mb21/images/video.jpg') }}">
				<div class="btn"><img src="{{ asset('/web/mb21/images/play.png') }}"></div>
			</div>
			<div class="pool">
				<div class="title">PT总奖池</div>
				<img class="bg" src="{{ asset('/web/mb21/images/pool.jpg') }}">
				<div class="pool-num" style="background-image: url({{ asset('/web/mb21/images/pool_num.png') }});">
					<div>
						<span class="j0">¥</span>
						<span class="j1">0</span>
						<span class="j2">0</span>
						<span class="j3">0</span>
						<span class="j4">0</span>
						<span class="j5">0</span>
						<span class="j6">0</span>
						<span class="j7">0</span>
						<span class="j8">0</span>
						<span class="j9">0</span>
					</div>
				</div>
				<span id="text1" style="color:#000;display:none;">1,331,282.74 MYR</span>
				<span id="text7" style="color:#000;display:none;">1.00 MYR</span>
			</div>
			<div class="news">
				<div class="title">玩家喜讯</div>
				<div class="news-list">
					<ul>
						<li>
							<span>15***20</span>
							<span>投注30.00元</span>
							<span>108好汉</span>
							<span>喜得大奖￥6,184.00</span>
						</li>
						<li>
							<span>1x***wq</span>
							<span>投注80.00元</span>
							<span>糖果派对</span>
							<span>喜得大奖￥1,431,248.84</span>
						</li>
						<li>
							<span>su***77</span>
							<span>投注500.00元</span>
							<span>糖果派对</span>
							<span>喜得大奖￥5,731,328.00</span>
						</li>
						<li>
							<span>ff***a2</span>
							<span>投注30.00元</span>
							<span>篮球巨星</span>
							<span>喜得大奖￥6,184.00</span>
						</li>
						<li>
							<span>15***50</span>
							<span>投注30.00元</span>
							<span>108好汉</span>
							<span>喜得大奖￥6,184.00</span>
						</li>
						<li>
							<span>15***50</span>
							<span>投注30.00元</span>
							<span>108好汉</span>
							<span>喜得大奖￥6,184.00</span>
						</li>
						<li>
							<span>15***50</span>
							<span>投注30.00元</span>
							<span>108好汉</span>
							<span>喜得大奖￥6,184.00</span>
						</li>
						<li>
							<span>15***50</span>
							<span>投注30.00元</span>
							<span>108好汉</span>
							<span>喜得大奖￥6,184.00</span>
						</li>
						<li>
							<span>15***50</span>
							<span>投注30.00元</span>
							<span>108好汉</span>
							<span>喜得大奖￥6,184.00</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	var Swiper = new Swiper ('.swiper-container', {
		loop: true,
		speed:900,
		autoplay: {stopOnLastSlide: true,disableOnInteraction: 0},
		pagination: {el: '.swiper-pagination',clickable: true},
	});


// 公告滚动
var speed=20;
var tab=document.getElementById("notice");
var tab1=document.getElementById("notice1");
var tab2=document.getElementById("notice2");
tab2.innerHTML=tab1.innerHTML;
function Marquee(){
	if(tab2.offsetWidth-tab.scrollLeft<=0){
		tab.scrollLeft-=tab1.offsetWidth;
	}else{
		tab.scrollLeft++;
	}
}
var MyMar=setInterval(Marquee,speed);
tab.onmouseover=function() {clearInterval(MyMar)};
tab.onmouseout=function() {MyMar=setInterval(Marquee,speed)};


// 首页公告
$('.weihuan-home-notice').click(function() {
	layer.open({
		type: 1
		,area: ['1000px','530px']
		,shadeClose: false
		,anim: 1
		,skin: 'weihuan-home-notice-pop'
		,title: false
		,content:  '\
		<h3>公告</h3>\
		<div class="body">\
		@foreach($_system_notices as $v)\
		<li onclick="weihuan_notice_li(this)">\
		{{ $v->title }}\
        <h2><img src="{{ asset('/web/images/user/news.png') }}">{{$v->updated_at}}</h2>\
		<p>{{ $v->content }}</p>\
		</li>\
		@endforeach\
		</div>\
		'
	});
});


// 首页视频
$('.weihuan-home-game .other .video .btn').click(function() {
	layer.open({
		type: 1
		,area: ['900px','auto']
		,shadeClose: false
		,anim: 1
		,skin: 'weihuan-home-game-video-pop'
		,title: false
		,content:  '\
		<div class="body">\
		<video controls="controls" autoplay="autoplay" style="width:100%;">\
		<source src="/web/mb21/images/mv.m4v"></video>\
		</div>\
		'
	});
});

</script>

@endsection
