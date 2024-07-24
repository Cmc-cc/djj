@extends('web.template.mb4.layouts.main')
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
    <div class="body">
        <div class="flexslider">
            <ul class="slides">
                {{--<li><a href="javascript:;"><img src="{{ asset('/web/mb4/images/banner1.jpg') }}" alt=""></a></li>
                <li><a href="javascript:;"><img src="{{ asset('/web/mb4/images/banner2.jpg') }}" alt=""></a></li>
                <li><a href="javascript:;"><img src="{{ asset('/web/mb4/images/banner3.jpg') }}" alt=""></a></li>--}}
                @foreach($banners as $item)
                    <li><a target="_blank" href="{{$item->jumpurl}}"><img src="{{ $item->path }}"/></a></li>
                @endforeach
                {{--<li><a href="javascript:;"><img src="{{ asset('/web/images/banner4.jpg') }}" alt=""></a></li>--}}
                {{--<li><a href="javascript:;"><img src="{{ asset('/web/images/banner5.jpg') }}" alt=""></a></li>--}}
            </ul>
            <div class="joinGame_btn">
                <span class="status">立即游戏</span>
                <span class="txt">十大顶尖游戏平台,1000多款電子游戏任你“博”！</span>
            </div>
        </div>

        <div class="first-floor">
            <div class="f1-butterfly">
                <div class="container">
                    <img src="{{ asset('/web/mb4/images/f1-gfx.png') }}" alt="">
                    <ul class="f1-tabs clear" id="myTabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="javascript:;">
                                <img src="{{ asset('/web/mb4/images/f1-slot.jpg') }}" alt="老虎机" />
                                <strong>電子游戏</strong>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:;">
                                <img src="{{ asset('/web/mb4/images/f1-casino.jpg') }}" alt="真人游戏" />
                                <strong>真人游戏</strong>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="javascript:;">
                                <img src="{{ asset('/web/mb4/images/f1-sports.jpg') }}" alt="體育投注" />
                                <strong>體育投注</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="gradient-bg">
                <div class="tab-content">
                    <div class="tab-panel active">
                        <img src="{{ asset('/web/mb4/images/xima-banner02.jpg') }}" style="height: 600px" alt="">
                        <a href="{{ route('web.eGame') }}" class="game-btn">立即进入</a>
                    </div>
                    <div class="tab-panel ">
                        <img src="{{ asset('/web/mb4/images/slot-gfx.png') }}"  style="height: 600px" alt="">
                        <a href="{{ route('web.liveCasino') }}" class="slot-btn">
                            <img src="{{ asset('/web/mb4/images/slot-btn.png') }}" alt="">
                        </a>
                    </div>
                    <div class="tab-panel">
                        <img src="{{ asset('/web/mb4/images/sports-gfx.jpg') }}"  style="height: 600px" alt="">
                        <a href="{{ route('web.esports') }}" class="sports-btn">
                            <img src="{{ asset('/web/mb4/images/sports-btn.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="blue-ribbon">
            <h2>为 什 么 选 择 {{$_system_config->site_name}} </h2>
        </div>
        <div class="second-floor">
            <div class="container">
                <div class="tab-content">
                    <div class="tab-panel clear active">
                        <img class="pullLeft" src="{{ asset('/web/mb4/images/second-1l.png') }}" alt="">
                        <img class="pullRight" src="{{ asset('/web/mb4/images/second-1r.png') }}" alt="">
                    </div>
                    <div class="tab-panel clear">
                        <img class="pullLeft" src="{{ asset('/web/mb4/images/second-2l.png') }}" alt="">
                        <img class="pullRight" src="{{ asset('/web/mb4/images/second-2r.png') }}" alt="">
                    </div>
                    <div class="tab-panel clear">
                        <img class="pullLeft" src="{{ asset('/web/mb4/images/second-3l.png') }}" alt="">
                        <img class="pullRight" src="{{ asset('/web/mb4/images/second-3r.png') }}" alt="">
                    </div>
                    <div class="tab-panel clear">
                        <img class="center" src="{{ asset('/web/mb4/images/second-4.png') }}" alt="">
                    </div>
                </div>
                <ul class="clear">
                    <li class="active"><a href="javascript:;">实 力</a></li>
                    <li><a href="javascript:;">便 捷</a></li>
                    <li><a href="javascript:;">信 誉</a></li>
                    <li><a href="javascript:;">情 怀</a></li>
                </ul>
            </div>
        </div>

        <div class="third-floor">
            <div class="third-board">
                <div class="container">
                    <img src="{{ asset('/web/mb4/images/f3-gfx.png') }}" alt="">
                    <ul>
                        <li>
                            <a href="javascript:;">
                                <div class="third-tab">
                                    <img class="op-hover" src="{{ asset('/web/mb4/images/third-1h.png') }}" alt="">
                                    <img class="op-default" src="{{ asset('/web/mb4/images/third-1.png') }}" alt="">
                                </div>
                                <strong>新人认证</strong>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="third-tab">
                                    <img class="op-hover" src="{{ asset('/web/mb4/images/third-2h.png') }}" alt="">
                                    <img class="op-default" src="{{ asset('/web/mb4/images/third-2.png') }}" alt="">
                                </div>
                                <strong>日久生情新人礼包</strong>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="third-tab">
                                    <img class="op-hover" src="{{ asset('/web/mb4/images/third-3h.png') }}" alt="">
                                    <img class="op-default" src="{{ asset('/web/mb4/images/third-3.png') }}" alt="">
                                </div>
                                <strong>好友推荐</strong>
                            </a>
                        </li>
                    </ul>
                    <a href="" class="right-link">
                        <img src="{{ asset('/web/mb4/images/right-link.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>

        <div class="fourth-floor">
            <div class="container">
                <img src="{{ asset('/web/mb4/images/fourth-gfx.png') }}" alt="">
                <img src="{{ asset('/web/mb4/images/suju.jpg') }}" alt="">
            </div>
        </div>

        <div class="fifth-floor">
            <div class="container clear">
                <div class="pullLeft">
                    <div class="divider textCenter">
                        <img src="{{ asset('/web/mb4/images/fifth-gfx.png') }}" alt="電子游戏">
                        <br>
                        <a href="javascript:void(0);" id="daili" class="btn-reg">申请代理</a>
                    </div>
                </div>
                <div class="pullRight textCenter">
                    <a href="https://support.microsoft.com/zh-cn/help/17621/internet-explorer-downloads" target="view_window" class="box-inline hvr-bob">
                        <img src="{{ asset('/web/mb4/images/fifth-1.png') }}" alt="IE"><br>
                        <strong>IE</strong><br>
                        <span>点击下载</span>
                    </a>
                    <a href="http://chrome.360.cn/" target="view_window" class="box-inline hvr-bob">
                        <img src="{{ asset('/web/mb4/images/fifth-2.png') }}" alt="360极速浏览器"><br>
                        <strong>360极速浏览器</strong><br>
                        <span>点击下载</span>
                    </a>
                    <a href="http://www.google.cn/chrome/browser/desktop/index.html" target="view_window" class="box-inline hvr-bob divider">
                        <img src="{{ asset('/web/mb4/images/fifth-3.png') }}" alt="谷歌浏览器"><br>
                        <strong>谷歌浏览器</strong><br>
                        <span>点击下载</span>
                    </a>
                    <a href="https://get.adobe.com/cn/flashplayer/?no_redirect" target="view_window" class="box-inline hvr-bob divider">
                        <img src="{{ asset('/web/mb4/images/fifth-4.png') }}" alt="Flash插件"><br>
                        <strong>Flash插件</strong><br>
                        <span>点击下载</span>
                    </a>
                    <a href="{{ $_system_config->app_link }}" class="box-inline hvr-bob" target="_blank">
                        <img src="{{ asset('/web/mb4/images/fifth-6.png') }}" alt="打鱼机"><br>
                        <strong>下载中心</strong><br>
                        <span>点击进入</span>
                    </a>
                </div>
            </div>
        </div>

    </div>



    <div class="notice_layer">
        <h3>公告详情 <span class="close"></span></h3>
        <div class="notice_con">
            @foreach($_system_notices as $v)
                <div class="module">
                    <h4>{{ $v->title }}</h4>
                    <p>✿{{ $v->content }}</p>
                </div>
            @endforeach
            {{--<div class="module">--}}
            {{--<h4>波音游戏</h4>--}}
            {{--<p>✿尊敬的腾博会会员， 由于波音平台電子游戏本身不具备记忆功能，如果您在游戏中由于网络连接服务器不稳定导致意外断线，重新登陆将无法继续完成上一局断开的游戏进程；很抱歉的告知您此类情况BBIN平台一律不予赔付，恕与本网站无关！ 建议您可以尝试PT、TTG、BSG或者MG平台游戏，种类更多，更有高达1.7%的洗码优惠！！！</p>--}}
            {{--</div>--}}
            {{--<div class="module">--}}
            {{--<h4>郑重声明</h4>--}}
            {{--<p>✿尊敬的会员，近期有很多私人QQ账号、QQ群和微信公众号冒充腾博会/腾博会代理的名义，四处招摇撞骗。在此腾博会提醒各位会员，请妥善保管好私人信息。网站所有优惠，充值方式，都以官网为准，请不要相信其他任何信息，以免造成不必要的损失！</p>--}}
            {{--</div>--}}
            {{--<div class="module">--}}
            {{--<h4>通知</h4>--}}
            {{--<p>✿ 最近波音平台检测到个别玩家有异常下注行为，影响到游戏的公平公正。根据波音平台处理意见，一旦波音平台查实，公司有权在毫无警告或通知下取消此会员所有的注单并冻结帐户，不予提款处理！对于不听劝告的玩家，后果自负！</p>--}}
            {{--</div>--}}
        </div>
    </div>

    <div id="dailiModal" class="modal modal-login modal-daili">
        <div class="modal-content">
            <form method="POST" action="{{ route('member.post_agent_apply') }}">
                <a href="" class="close bg-icon"></a>
                <div class="modal-login_form">
                    <h2>代理申请</h2>
                    <div class="modal-login_line">
                        <input type="text" placeholder="QQ" required name="qq">
                    </div>
                    <div class="modal-login_line">
                        <input type="text" placeholder="联系电话" required name="phone">
                    </div>
                    <div class="modal-login_line" style="height: auto;margin-bottom: 15px">
                        <textarea name="about" placeholder="填写申请"></textarea>
                    </div>
                    <div class="modal-login_line">
                        <button class="modal-login_submit ajax-submit-btn" type="button">确定</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        var m = "{{ $_member }}";
        var u = "{{ route('web.login') }}";
        (function($){
            $(function(){
                $('#daili').on('click',function(){
                    if (!m)
                    {
                        location.href=u
                    }else{
                        $('#dailiModal').modal();
                    }
                })
            })
        })(jQuery)
    </script>
    <script>


        (function ($) {
            $(function () {
                $('.flexslider').flexslider({
                    animation: 'fade',
                    directionNav: false
                });

                $('.menuBox').on('click', 'li', function () {
                    var index = $(this).index();
                    var $contentBox_item=$(this).closest('.menuBox').next('.contentBox').find('.contentBox_item');
                    $(this).addClass('active').siblings('li').removeClass('active');
                    $contentBox_item.removeClass('active').eq(index).addClass('active');
                });

                //公告
                $('#mar0').on('click',function(){
                    var notice_index=layer.open({
                        type: 1,
                        title: false,
                        closeBtn: 0,
                        area: ['680px'],
                        skin: 'layui-layer-nobg', //没有背景色
                        shadeClose: true,
                        content: $('.notice_layer')
                    });

                    $('.notice_layer').on('click','.close',function(){
                        layer.close(notice_index)
                    })
                })


                //superslide
                /* jQuery(".txtScroll-top").slide({mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,vis:9,pnLoop:true});*/

                //superslide
                var listMarqueIndex=0;
                var listMarqueShow=7;  //要显示的个数
                var listMarqueLength=$('.txtScroll-top .ntb-egzj li').length;  //总共显示的条数
                if(listMarqueLength>listMarqueShow){  //大于要显示的个数才执行动画
                    var listMarque=setInterval(function(){

                        console.log(listMarqueIndex);
                        if(listMarqueLength-listMarqueIndex>listMarqueShow){
                            listMarqueIndex++;
                            $('.txtScroll-top .ntb-egzj li').removeClass('on')
                            $('.txtScroll-top .ntb-egzj li').eq(listMarqueIndex).addClass('on');
                            $('.txtScroll-top .ntb-egzj').animate({
                                "top":"-=45px"
                            },800);
                        }else{
                            $('.txtScroll-top .ntb-egzj').animate({"top":'0'})
                            listMarqueIndex=0;
                            $('.txtScroll-top .ntb-egzj li').removeClass('on')
                            $('.txtScroll-top .ntb-egzj li').eq(listMarqueIndex).addClass('on')
                        }
                    },4000);
                }

                $('.disabled').on('click', function () {
                    layer.msg('暂未开放，敬请期待', {icon: 6});
                });
            })
        })(jQuery)
    </script>
    <script id="jsID" type="text/javascript">

    </script>

    <script>
        (function ($) {
            $(function () {
                $('.flexslider').flexslider({
                    directionNav: false
                });

                $('.f1-tabs').on('click','li',function(){
                    var index=$(this).index();
                    $(this).addClass('active').siblings('li').removeClass('active');
                    $('.first-floor .tab-panel').removeClass('active').eq(index).addClass('active');
                });

                $('.second-floor').on('click','li a',function(){
                    var $li=$(this).parent();
                    var index=$li.index();
                    $li.addClass('active').siblings('li').removeClass('active');
                    $('.second-floor .tab-panel').removeClass('active').eq(index).addClass('active');
                })
            })
        })(jQuery)
    </script>
@endsection
