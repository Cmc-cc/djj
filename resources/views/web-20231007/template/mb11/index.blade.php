@extends('web.template.mb11.layouts.main')
@section('after.js')
    @if($_system_config->is_alert_on == 0)
        <div id="modal-tit" class="modal modal-login">
            <div class="modal-content" style="width: 650px;height: 414px;padding: 0">
                <a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>
                <a href="javascript:;">
                    <img src="{{ $_system_config->alert_img }}" alt="">
                </a>
            </div>
        </div>
        <script>
            (function($){
                $(function(){
                    $('#modal-tit').modal();
                })
            })(jQuery);
        </script>
    @endif
@endsection
@section('content')
    @if (Auth::guard('member')->guest())
        <div class="banner">
            <div class="wrap con">
                <div class="index-login">
                    <div class="title"><img src="{{ asset('/web/images/title_login.png') }}"></div>
                    <div class="body">
                        <form method="POST" action="{{ route('member.login.post') }}">
                            <div class="module">
                                <input class="inp" type="text" placeholder="帐号" maxlength="12" name="name">
                                {{--<span class="tit">@sh</span>--}}
                            </div>
                            <div class="module">
                                <input class="inp" type="password" placeholder="密码" maxlength="12" name="password">
                            </div>
                            <div class="module code">
                                <input class="inp" type="text" placeholder="验证码" maxlength="4" name="captcha">
                                <a class="vPic" onclick="javascript:re_captcha();"><img src="{{ URL('kit/captcha/1') }}"
                                                                                        id="c2c98f0de5a04167a9e427d883690ff6"></a>
                                <script>
                                    function re_captcha() {
                                        $url = "{{ URL('kit/captcha') }}";
                                        $url = $url + "/" + Math.random();
                                        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src = $url;
                                    }
                                </script>
                            </div>
                            <button class="login-btn modal-login_submit ajax-submit-btn"></button>
                        </form>
                    </div>
                    <div class="bot-btn">
                        <a class="join" href="{{ route('web.register_one') }}">加入会员</a>
                        <a class="join" href="javascript:;">忘记密码</a>
                    </div>
                    <div class="register-btn">
                        <a href="{{ route('web.register_one') }}" title="免费加入"></a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="banner">
            <div class="wrap con">
                <div class="index-login after-login">
                    <div class="title"><img src="{{ asset('/web/mb11/images/title_viewaccount.png') }}"></div>
                    <div class="body">
                        <div class="userinfo">
                            <p>帐号：{{ $_member->name }}</p>
                            <p>账户余额： <strong id="money">{{ $_member->all_money }}</strong></p>
							<p>剩余码量： <strong id="money">{{ $_member->ml_money }}</strong></p>
							
                        </div>

                        <div class="link">
                            @if($_system_config->is_new_center == 1)
                                <a href="{{ route('member.userCenter') }}?type=7">会员中心</a>
							 <a href="{{ route('member.userCenter') }}?type=1">我要存款</a>
							  <a href="{{ route('member.userCenter') }}?type=3">我要取款</a>
							   <a href="{{ route('member.userCenter') }}?type=4">账户记录</a>
                            @else
                            <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;|
                            <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;|
                            <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;|
                            @if(!$_system_config->mz_open)
							<a title="额度转换" href="{{ route('member.indoor_transfer') }}">额度转换</a>&nbsp;|
						    @endif
                            <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>&nbsp;|
                            @endif
                            <a class="logoutbtn quit_btn" href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                            <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                    <div class="bot-btn">
                        <span class="join">欢迎您光临</span>
                        <span class="join">WELCOME</span>
                    </div>
                    <div class="register-btn">
                        <a href="{{ route('web.activityList') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="games-index">
        <div class="wrap">
            <ul class="left game-list-index">
                <li class="game01"><a title="体育" href="{{ route('web.esports') }}"></a></li>
                <li class="game02"><a title="真人" href="{{ route('web.liveCasino') }}"></a></li>
                <li class="game03"><a title="优惠" href="{{ route('web.activityList') }}"></a></li>
                <li class="game04"><a title="彩票" href="{{ route('web.lottory') }}"></a></li>
                <li class="game05"><a title="电子" href="{{ route('web.eGame') }}"></a></li>
                <li class="game06"><a title="手机下注" href="javascript:;"></a></li>
            </ul>
            <div class="news">
                <div class="marquee-con">
                    <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="up" scrollamount=2
                             loop="infinite">
                        @foreach($_system_notices as $v)
                            <div>
                                <span>~{{ $v->title }}~</span>
                                <span>{{ $v->content }}</span>
                            </div>
                        @endforeach
                    </marquee>
                </div>
            </div>
            <div class="download">
                <a href="javascript:;"></a>
            </div>
        </div>
    </div>

@endsection
