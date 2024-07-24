@extends('web.template.mb13.layouts.main')
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
                    $('#modal-tit').modal({
//                        clickClose: false
                    });
                })
            })(jQuery);
        </script>
    @endif
@endsection
@section('content')

    <div class="banner">
        <div class="con">
            @if (Auth::guard('member')->guest())
                <div class="login-module index-login">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <div class="module">
                            <input type="text" name="name" class="inp" placeholder="账号">
                            {{--<span class="tips">@mon</span>--}}
                        </div>
                        <div class="module">
                            <input type="password" name="password" class="inp" placeholder="密码">
                        </div>
                        <div class="module code">
                            <input type="text" name="captcha" class="inp" placeholder="验证码">
                            <a class="vPic" onclick="javascript:re_captcha();" style="right: -70px;top: 1px">
                                <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}"
                                     id="c2c98f0de5a04167a9e427d883690ff11">
                            </a>
                            <script>
                                function re_captcha() {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    document.getElementById('c2c98f0de5a04167a9e427d883690ff11').src = $url;
                                }
                            </script>
                        </div>
                        <button type="button" class="login-btn modal-login_submit ajax-submit-btn">会员登入</button>
                        <a href="{{ route('web.register_one') }}" class="register-btn">立即注册</a>
                    </form>
                </div>
            @else
                <div class="login-module index-login after-login">
                    <div class="line">
                        帐号：<span class="brightYellow">{{ $_member->name }}</span>
                    </div>
                    <div class="line">
                         余额：<span class="brightYellow money-index">{{ $_member->all_money }}</span>
						 剩余码量：<span class="brightYellow money-index">{{ $_member->ml_money }}</span>
						 
                        {{--<a class="info-icon" href="javascript:void(0)"><img src="images/add.png"></a>--}}
                    </div>
                    <div class="line">
                        @if($_system_config->is_new_center ==1)
                            <a href="{{ route('member.userCenter') }}?type=6">会员中心</a>
						   <a href="{{ route('member.userCenter') }}?type=1">存取款</a>							
							   <a href="{{ route('member.userCenter') }}?type=4">账户记录</a>
                            @else
                        <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;|&nbsp;
                        <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;|&nbsp;
                        <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;|&nbsp;
                         @if(!$_system_config->mz_open)
							<a title="额度转换" href="{{ route('member.indoor_transfer') }}">额度转换</a>&nbsp;|&nbsp;
						 @endif
                        <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>
                        @endif
                    </div>
                    <div class="line">
                        <a class="register-btn" href="{{ route('member.logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                        <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div class="index-news">
            <div class="wrap">
                <div class="news-tit">
                    最新公告：
                </div>
                <marquee onmouseover="this.stop()" onmouseout="this.start()" direction="left" scrollamount=3
                         loop="infinite">
                    @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>

    <div class="first-game">
        <div class="wrap">
            <ul>
                <li class="game01"><a href="javascript:;" class="daili_apply"></a></li>
                <li class="game02"><a href="javascript:;"></a></li>
                <li class="game03"><a href="javascript:;"></a></li>
                <li class="game04">
                    <a href="javascript:;" onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')"></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg"><img src="{{ asset('/web/') }}/images/bg02.jpg"></div>

    {{--<div class="games">--}}
        {{--<div class="wrap">--}}
            {{--<ul>--}}
                {{--<li class="games01"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games02"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games03"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games04"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games05"><a href="{{ route('web.eGame') }}"></a></li>--}}
            {{--</ul>--}}
            {{--<ul>--}}
                {{--<li class="games06"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games07"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games08"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games09"><a href="{{ route('web.eGame') }}"></a></li>--}}
                {{--<li class="games10"><a href="{{ route('web.eGame') }}"></a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="game-type">
        <div class="wrap">
            <ul>
                <li class="gametype01"><a href="{{ route('web.liveCasino') }}"></a></li>
                <li class="gametype02"><a href="{{ route('web.liveCasino') }}"></a></li>
                <li class="gametype03"><a href="{{ route('web.liveCasino') }}"></a></li>
                <li class="gametype04"><a href="{{ route('web.liveCasino') }}"></a></li>
            </ul>
        </div>
    </div>

    <div class="game-bot">
        {{--<img style="display: inline-block" src="{{ asset('/web/') }}/images/bg04.jpg">--}}
        <div class="wrap">
            <div class="footer-gamelink">
                <a href="javascript:;"><img style="display: inline-block" src="{{ asset('/web/') }}/mb13/images/bbinlogo.png"></a>
                <a href="javascript:;"><img style="display: inline-block" src="{{ asset('/web/') }}/mb13/images/ublogo.png"></a>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            $(function () {

            });
        })(jQuery)
    </script>
@endsection
