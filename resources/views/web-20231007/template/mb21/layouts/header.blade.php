<div class="weihuan-header">
	<div class="top">
		<ul>
            @if (!Auth::guard('member')->guest())
            <li><a href="{{ route('member.userCenter') }}">个人中心</a></li>
            @endif
            {{--<li><a href="{{route('web.navHelp')}}">帮助中心</a></li>
            <li><a href="{{route('web.navAbout')}}">关于我们</a></li>--}}
            <li><a href="{{ route('daili.login.post') }}"target="_blank">代理加盟</a></li>
            <!--<li><a href="{{ $_system_config->service_link }}">在线客服</a></li>-->
        </ul>
        <div class="languages">
            <div class="chose chinese">
                <img src="{{ asset('/web/mb21/images/top1.png') }}">简体中文
            </div>
            <div class="list">
                <li><img src="{{ asset('/web/mb21/images/top2.png') }}">English</li>
                <li><img src="{{ asset('/web/mb21/images/top3.png') }}">ประเทศไทย</li>
                <li><img src="{{ asset('/web/mb21/images/top4.png') }}">ភាសាខ្មែរ</li>
                <li><img src="{{ asset('/web/mb21/images/top5.png') }}">한국어</li>
                <li><img src="{{ asset('/web/mb21/images/top6.png') }}">Malaysia</li>
                <li><img src="{{ asset('/web/mb21/images/top7.png') }}">Indonesia</li>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container" style="width: 100%">
            <div class="logo">
                <a href="{{ route('web.index') }}"><img src="{{ $_system_config->site_logo}}"></a>
            </div>
            @if (Auth::guard('member')->guest())
            <form class="login_from"  method="POST" action="{{ route('member.login.post') }}">
                <div class="menu active">
                    <label for="username">用户名</label>
                    <input class="username" type="text" placeholder="请输入用户名" required name="name">
                    <label for="password">密 码</label>
                    <input class="psw" type="password" placeholder="请输入密码" required name="password">
                    <input name="captcha" type="text" placeholder="验证码">
                    <a  class="code-img" onclick="javascript:re_captcha();" title="点击刷新验证码">
                        <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}" id="c2c98f0de5a04167a9e427d883690ff6">
                    </a>
                    <button class="login" type="button" onclick="weihuan_login_func('.login_from')">登 录</button>
                    <a href="{{ route('web.register_one') }}"><span class="reg" id="reg">立即注册</span></a>
                </div>
            </form>
            @else
            <div class="menu">
                <div class="user">
                    <span class="user_name">尊敬的：&nbsp;&nbsp;{{ $_member->name }}</span>
                    <span class="total_balance">账号余额&nbsp;&nbsp;<strong class="money">{{ $_member->all_money }}</strong>元
                    	{{-- <img src="{{ asset('/web/images/home/refresh.png') }}" class="refresh" data-type="total_all"> --}}
                    </span>
                </div>
                <div class="other">
                    @if($_system_config->is_new_center==1)
                 <a href="{{ route('member.userCenter') }}"><button>立即存款</button></a>

                 <a href="{{ route('member.userCenter',['type'=>2]) }}"><button>出纳柜台</button></a>
                    @else
                        <a href="{{ route('member.finance_center') }}"><button>立即存款</button></a>

                        <a href="{{ route('member.member_drawing') }}"><button>出纳柜台</button></a>
                    @endif

                 <a class="logout" href="{{ route('member.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">安全退出</a>
                 <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                 style="display: none;">
                 {{ csrf_field() }}
             </form>
         </div>
     </div>
     @endif
 </div>
</div>

@yield('nav')
</div>
<!--半透明遮罩层-->
<div class="backdrop"></div>
<script>
$(document).ready(function() {
	//回车提交事件
	$(".login_from").bind('keydown', function(event) { 
		if(event.keyCode==13){ 
			weihuan_login_func('.login_from');
		}   
	}); 
});
</script>
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