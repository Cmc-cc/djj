@extends('web.template.mb17.layouts.main')
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
            (function ($) {
                $(function () {
                    $('#modal-tit').modal();
                })
            })(jQuery);
        </script>
    @endif
@endsection
@section('content')

    <div class="indexbanner">
        <div class="login-wrap">
            @if (Auth::guard('member')->guest())
                <div class="index-login">
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <div class="module">
                            <input type="text" name="name" class="inp" placeholder="账号">
                            {{--<span class="tips">@mon</span>--}}
                        </div>
                        <div class="module">
                            <input type="password" name="password" class="inp" placeholder="密码">
                        </div>
                        <div class="module">
                            <input type="text" name="captcha" class="inp" placeholder="验证码">
                            <a class="vPic" onclick="javascript:re_captcha();">
                                <img class="vertifyCode" src="{{ URL('kit/captcha/1') }}"
                                     id="c2c98f0de5a04167a9e427d883698fr8" style="height: 34px;">
                            </a>
                            <script>
                                function re_captcha() {
                                    $url = "{{ URL('kit/captcha') }}";
                                    $url = $url + "/" + Math.random();
                                    document.getElementById('c2c98f0de5a04167a9e427d883698fr8').src = $url;
                                }
                            </script>
                        </div>
                        <div>
                            <button class="login-btn modal-login_submit ajax-submit-btn">会员登入</button>
                        </div>
                        <div><a href="{{ route('web.register_one') }}" class="register-btn"></a></div>
                    </form>
                </div>
            @else
                <div class="index-login after-login">
                    <h3 class="welcome-tit">欢迎光临 Welcome</h3>
                    <div class="line">帐号：<span>{{ $_member->name }}</span></div>
                    <div class="line">余额：<span class="money-index">{{ $_member->all_money }}</span></div>
					<div class="line">剩余码量：<span class="money-index">{{ $_member->ml_money }}</span></div>
					
                    @if($_system_config->is_new_center == 1)
                        <div class="line">
                           
							 <a href="{{ route('member.userCenter') }}?type=7">会员中心</a>
								 <a href="{{ route('member.userCenter') }}?type=1">存取款</a>
							 
							   <a href="{{ route('member.userCenter') }}?type=4">账户记录</a>
                        </div>
                        @else
                    <div class="line">
                        <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;&nbsp;|&nbsp;
                        <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;&nbsp;|&nbsp;
                        <a href="{{ route('member.member_drawing') }}">线上取款</a>&nbsp;&nbsp;|&nbsp;
                        <a href="{{ route('member.indoor_transfer') }}">接口余额</a>&nbsp;&nbsp;|&nbsp;
                        <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>&nbsp;&nbsp;|&nbsp;
                    </div>
                    @endif
                    <div class="line">
                        <a class="exit" href="{{ route('member.logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                    </div>
                    <form id="logout-form" action="{{ route('member.logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endif
        </div>
        <div class="lunbo" style="overflow: hidden;">
            <div class="hd">
                <ul>
                    {{--<li class="on">1</li>
                    <li>2</li>
                    <li>3</li>--}}
                    {{--<li>4</li>--}}
                    {{--<li>5</li>--}}
                    @foreach($banners as $item)
                        <li></li>
                    @endforeach
                </ul>
            </div>
            <div class="bd">
                <ul>
                    @foreach($banners as $item)
                        <li><a href="{{$item->jumpurl}}" target="_blank"><img src="{{ $item->path }}"></a>
                        </li>
                    @endforeach
                    {{--<li style="display: none;"><a href="javascript:;"><img src="{{ asset('/web') }}/mb17/images/slide03.jpg"></a>
                    </li>
                    <li style="display: none;"><a href="javascript:;"><img src="{{ asset('/web') }}/mb17/images/slide04.jpg"></a>
                    </li>
                    <li style="display: none;"><a href="javascript:;"><img src="{{ asset('/web') }}/mb17/images/slide05.jpg"></a>
                    </li>--}}
                </ul>
            </div>
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
        </div>
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

    <div class="index-games">
        <div class="wrap">
            <div class="top">
                <a class="toplink01" href="javascript:;"></a>
                <a class="toplink02" href="javascript:;"></a>
                <a class="toplink03" href="javascript:;"></a>
                <a class="toplink04" href="javascript:;"></a>
                <a class="toplink05" href="javascript:;"></a>
            </div>
            <div class="body">
                <div id="cijinnum" class="title">loading...</div>
                <script>
                    var $_money = parseInt(new Date().getTime() / 9000 * Math.random());
                    $('#cijinnum').html('¥' + $_money);
                </script>
                <ul>
                    <li><a href="{{ route('web.eGame') }}" class="game01"></a></li>
                    <li><a href="{{ route('web.eGame') }}" class="game02"></a></li>
                    <li><a href="{{ route('web.eGame') }}" class="game03"></a></li>
                    <li><a href="{{ route('web.eGame') }}" class="game04"></a></li>
                    <li><a href="{{ route('web.eGame') }}" class="game05"></a></li>
                    <li><a href="{{ route('web.eGame') }}" class="game06"></a></li>
                    <li><a href="{{ route('web.eGame') }}" class="game07"></a></li>
                    <li><a href="{{ route('web.eGame') }}" class="game08"></a></li>
                </ul>
            </div>
            <div class="game-news">
                <div class="module news-live"><a href="{{ route('web.liveCasino') }}"></a></div>
                <div class="module news-lottery"><a href="{{ route('web.lottory') }}"></a></div>
                <div class="module news-sports"><a href="{{ route('web.esports') }}"></a></div>
                <div class="module news-mobile"><a href="{{ route('wap.index') }}"></a></div>
            </div>
        </div>
    </div>

    <script>
        (function ($) {
            $(function () {
                $(".lunbo").slide({mainCell: ".bd ul", autoPlay: true, trigger: "click", delayTime: 2000});
            });
        })(jQuery);
    </script>
@endsection
