@extends('web.template.mb14.layouts.main')
@section('after.js')
    
@endsection
@section('content')
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
    <div class="indexbanner">
        <div class="login-wrap">
            <div class="banner-login wow flipInX animated">
                <div class="head"><img src="{{ asset('/web') }}/mb14/images/login-hd.png"></div>
                @if (Auth::guard('member')->guest())
                    <form method="POST" action="{{ route('member.login.post') }}">
                        <div class="module user">
                            <input type="text" name="name" class="inp" placeholder="用户名">
                        </div>
                        <div class="module psw">
                            <input type="password" name="password" class="inp" placeholder="用户密码">
                            <span class="tips">
                                <a href="javascript:;" class="forget"
                                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                                    忘记密码</a>
                            </span>
                        </div>
                        <div class="module verycode">
                            <input type="text" name="captcha" class="inp" placeholder="验证码">
                            <a class="vPic" onclick="javascript:re_captcha();" style="top: 3px;">
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
                        <div>
                            <button id="login-btn" class="modal-login_submit ajax-submit-btn"></button>
                        </div>
                        <div><a href="{{ route('web.register_one') }}" id="register-btn"></a></div>
                    </form>
                @else
                    <div class="after-login">
                        <div class="line">
                            <span class="half">账号：<span class="yellowCr">{{ $_member->name }}</span></span>
                            <br>
                            <span class="half">系统余额：<span class="yellowCr money-index">{{ $_member->all_money }}</span></span>
							 <span class="half">剩余码量：<span class="yellowCr money-index">{{ $_member->ml_money }}</span></span>
							
                        </div>
                        <br><br>
                        @if($_system_config->is_new_center == 1)
                            <div class="line">
                                <a href="{{ route('member.userCenter') }}?type=6">会员中心</a>
								 <a href="{{ route('member.userCenter') }}?type=1">存取款</a>
							 
							   <a href="{{ route('member.userCenter') }}?type=4">账户记录</a>
                            </div>
                            @else
                        <div class="line">
                            <a href="{{ route('member.userCenter') }}">会员中心</a>&nbsp;&nbsp;| &nbsp;
                            <a href="{{ route('member.finance_center') }}">线上存款</a>&nbsp;&nbsp;| &nbsp;
                            <a href="{{ route('member.member_drawing') }}">线上取款</a>
                        </div>
                        <div class="line">
                            <a href="{{ route('member.customer_report') }}">往来记录</a>&nbsp;&nbsp;| &nbsp;
                            @if(!$_system_config->mz_open)
							<a title="额度转换" href="{{ route('member.indoor_transfer') }}">额度转换</a>&nbsp;&nbsp;| &nbsp;
						    @endif
                            <a href="{{ route('member.message_list') }}">未读讯息({{ $_not_read_message_num }})</a>
                        </div>
                        @endif
                        <div class="line exit">
                            <a href="{{ route('member.logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <img src="{{ asset('/web/mb14/images/loginout-btn.png') }}">
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="lunbo" style="overflow: hidden;">
            <div class="hd">
                <ul>
                    @foreach($banners as $item)
                    <li @if($loop->first)class="on" @endif>1</li>
                    @endforeach
                </ul>
            </div>
            <div class="bd">
                <ul>
                    {{--<li><a href="javascript:;"><img src="{{ asset('/web') }}/mb14/images/banner01.jpg"></a></li>
                    <li style="display: none;"><a href="javascript:;"><img
                                    src="{{ asset('/web') }}/mb14/images/banner02.jpg"></a></li>

                    <li style="display: none;"><a href="javascript:;"><img
                                    src="{{ asset('/web') }}/mb14/images/banner03.jpg"></a></li>--}}
                    @foreach($banners as $item)
                        <li>
                            <a  target="_blank" href="{{$item->jumpurl}}">
                                <img src="{{$item->path}}"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
        </div>
        <div class="banner-news">
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

    <div class="main">
        <div class="wrap">
            <div class="left ">
                <div class="slotgame wow bounceInLeft animated">
                    <a href="{{ route('web.eGame') }}">
                        <img src="{{ asset('/web') }}/mb14/images/no1.png" class="img">
                        <div class="text">
                            <img src="{{ asset('/web') }}/mb14/images/no1-hd.png">
                            云集了全世界实力最强，玩家最多，最流行的电子游艺平台，热门游戏众多，让玩家爱不释手。
                        </div>
                        <div class="caijin">
                            <h3>超级彩金</h3>
                            <p>CNY <span id="cijinnum">¥ 9,216,288</span></p>
                            <script>
                                var $_money = parseInt(new Date().getTime() / 30000 * Math.random());
                                $('#cijinnum').html('¥' + $_money);
                            </script>
                        </div>
                    </a>
                </div>
                <div class="lotterygame wow bounceInLeft animated">
                    <a href="{{ route('web.lottory') }}">
                        <div class="left">
                            <img src="{{ asset('/web') }}/mb14/images/no3-hd.png">
                            <div class="text">
                                最好的体育投注系统，足球、篮球应有尽有，每周为您精选多场精彩赛事。
                            </div>
                        </div>
                        <div class="right img">
                            <img src="{{ asset('/web') }}/mb14/images/no3.png">
                        </div>
                    </a>
                </div>
            </div>
            <div class="left">
                <div class="sportbet wow bounceInRight animated">
                    <a href="{{ route('web.esports') }}">
                        <div class="img"><img src="{{ asset('/web') }}/mb14/images/no2.png"></div>
                        <img src="{{ asset('/web') }}/mb14/images/no2-hd.png" style="padding-top: 40px;">
                        <div class="text">
                            最好的体育投注系统，足球、篮球应有尽有，每周为您精选多场精彩赛事。
                        </div>
                    </a>
                </div>
                <div class="livecasinogame  wow bounceInRight animated">
                    <img src="{{ asset('/web') }}/mb14/images/no4-hd.png">
                    <ul>
                        <li><a href="{{ route('web.liveCasino') }}">百家乐</a></li>
                        <li><a href="{{ route('web.liveCasino') }}">三公</a></li>
                        <li><a href="{{ route('web.liveCasino') }}">德州扑克</a></li>
                        <li><a href="{{ route('web.liveCasino') }}">炸金花</a></li>
                    </ul>
                    <div class="img"><img src="{{ asset('/web') }}/mb14/images/no4-img.png"></div>
                </div>
            </div>
            <div class="bot wow bounceInUp animated">
                <img src="{{ asset('/web') }}/mb14/images/no5-hd.png">
                <div class="text">
                    我们的手机投注平台面向全网玩家，提供近百款老虎机百家乐以及彩票游戏投注，运用3D即时运算创造真实场景结合立
                    体影像，达到随时随地不间断娱乐的享受概念。
                </div>
                <div class="img"><img src="{{ asset('/web') }}/mb14/images/phone.png"></div>
            </div>
        </div>
    </div>

    <div class="index-about">
        <div class="wrap">
            <div class="con">
                <div class="top">
                    <div class="left"><img src="{{ asset('/web') }}/mb14/images/info-hd.png"></div>
                    <div class="left text">
                        {{ $_system_config->site_name }}
                        拥有着一支来自世界各国博彩界精英组合而成的世界顶尖级博彩服务团队。在这里我们将为您提供一个公平，公正的网络博彩平台，更承诺配备最优质的投注方法，并辅以最先进的网络技术支援，献上最佳的客户服务和最优惠的支付方案。
                    </div>
                </div>
                <div class="bot">
                    <ul class="service-list">
                        <li class="list01">
                            <span class="icon"></span>
                            <p class="tit">澳门热线</p>
                            <p class="num">{{ $_system_config->phone1 }}</p>
                        </li>
                        <li class="list02">
                            <a href="http://wpa.qq.com/msgrd?v=3&uin={{ $_system_config->qq }}&site=qq&menu=yes">
                                <span class="icon"></span>
                                <p class="tit">客服QQ</p>
                                <p class="num">{{ $_system_config->qq }}</p>
                            </a>
                        </li>
                        <li class="list03">
                            <a href="http://wpa.qq.com/msgrd?v=3&uin={{ $_system_config->qq }}&site=qq&menu=yes">
                                <span class="icon"></span>
                                <p class="tit">代理专员QQ</p>
                                <p class="num">{{ $_system_config->qq }} </p>
                            </a>
                        </li>
                        <li class="list04"
                            onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">
                            <span class="icon"></span>
                            <p class="tit">7X24小时</p>
                            <p class="num">在线客服</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        (function ($) {
            $(function () {
                $(".lunbo").slide({mainCell: ".bd ul", autoPlay: true, trigger: "click", delayTime: 2000});
                var wow = new WOW({
                    boxClass: 'wow',
                    animateClass: 'animated',
                    offset: 0,
                    mobile: true,
                    live: true
                });
                wow.init();
            })
        })(jQuery);
    </script>
@endsection
