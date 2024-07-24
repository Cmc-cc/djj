@extends('web.template.mb5.layouts.main')
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
{{--<div id="modal-tit" class="modal modal-login">--}}
{{--<div class="modal-content" style="width: 650px;height: 414px;padding: 0">--}}
{{--<a href="" class="close bg-icon" style="top: 0;right: -20px;opacity: 1;background-color: #ccc"></a>--}}
{{--<a href="http://wpa.qq.com/msgrd?v=3&uin=189983035&site=qq&menu=yes">--}}
{{--<img src="{{ asset('/web/images/modal-tit.jpg') }}" alt="">--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<script>--}}
{{--(function($){--}}
{{--$(function(){--}}
{{--$('#modal-tit').modal();--}}
{{--})--}}
{{--})(jQuery);--}}
{{--</script>--}}
        <!--banner-->
<div class="bannerBox">
    <div class="hd">
        <ul>
            {{--<li></li>
            <li></li>
            <li></li>--}}
            @foreach($banners as $item)
                <li></li>
            @endforeach
        </ul>
    </div>
    <!-- 前后按钮 -->
    <a href="javascript:void(0)" class="prev"></a>
    <a href="javascript:void(0)" class="next"></a>
    <div class="bd">
        <ul>

            {{--<li>
                <a target="_blank">
                    <img src="{{ asset('/web/mb5/images/index-banner1.jpg') }}" alt="">
                </a>
            </li>--}}
            @foreach($banners as $item)
                <li><a href="{{$item->jumpurl}}" target="_blank"><img src="{{ $item->path }}"/></a></li>
            @endforeach
            {{--<li>
            <a target="_blank">
            <img src="{{ asset('/web/mb5/images/index-banner2.jpg') }}" alt="">
            </a>
            </li>

            <li>
            <a target="_blank">
            <img src="{{ asset('/web/mb5/images/index-banner3.jpg') }}" alt="">
            </a>
            </li>--}}


        </ul>
    </div>
</div>

<!--notice-->
<div class="notice-row">
    <div class="noticeBox">
        <div class="w">
            <div class="title">
                最新公告：
            </div>
            <div class="bd2">
                <div id="memberLatestAnnouncement" style="cursor:pointer;color:#fff;">
                    <marquee id="mar0" scrollamount="3" scrolldelay="100" direction="left" onmouseover="this.stop();"
                             onmouseout="this.start();">
                        @foreach($_system_notices as $v)
                            <span>~{{ $v->title }}~</span>
                            <span>{{ $v->content }}</span>
                        @endforeach
                    </marquee>
                </div>
            </div>
        </div>
    </div>
</div>

<!--main-->
<div class="mainBox1">
    <div class="w">
        <div class="mainBox1-content">
            <ul>
                <li class="li1"><a class="daili_apply" href="javascript:void(0);">代理加盟</a></li>
                <li class="li2"><a href="javascript:void(0);"
                                   @if($_member) onclick="javascript:window.open('{{ route('member.finance_center') }}','','width=1024,height=768')"
                                   @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>充值中心</a></li>
                <li class="li3"><a href="{{ route('web.activityList') }}">优惠活动</a></li>
                <li class="li5"><a href="javascript:void(0);"
                                   onclick="javascript:window.open('{{ $_system_config->service_link }}','','width=1024,height=768')">在线客服</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="mainBox2">
    <div class="mainBox2-inner">
        <div class="w">
            <div class="hd J-nav-tab">
                <ul>
                    <li class="li1">
                        <a onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')" class="on">
                            <div class="img">
                                <img src="{{ asset('/web/mb5/images/img-mg.png') }}"/>
                            </div>
                            <h3>MG電子</h3>
                            <img src="{{ asset('/web/mb5/images/re.gif') }}" class="re"/>
                            <p>MGGAMING</p>
                        </a>
                    </li>

                    <li class="li3">
                        <a onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=2','','width=1024,height=768')">
                            <div class="img">
                                <img src="{{ asset('/web/mb5/images/img-bbin.png') }}"/>
                            </div>
                            <h3>BBIN電子</h3>

                            <p>BBINGAMING</p>
                        </a>
                    </li>
                    <li class="li4">
                        <a onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=2','','width=1024,height=768')">
                            <div class="img">
                                <img src="{{ asset('/web/mb5/images/img-ag.png') }}"/>
                            </div>
                            <h3>AG電子</h3>
                            <img src="{{ asset('/web/mb5/images/re.gif') }}" class="re"/>
                            <p>AGGAMING</p>
                        </a>
                    </li>
                    <li class="li2">
                        <div class="li4">
                            <a onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PT&game_type=2','','width=1024,height=768')">
                            <div class="img">
                                <img src="{{ asset('/web/mb5/images/img-pt.png') }}"/>
                            </div>
                            <h3>PT電子</h3>
                            <img src="{{ asset('/web/mb5/images/re.gif') }}" class="re"/>
                            <p>PTGAMING</p>
                            </a>
                        </div>
                    </li>
                    <li class="li5">
                        <a onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=PP&game_type=2','','width=1024,height=768')">
                        <div class="li4">
                            <div class="img">
                                <img src="{{ asset('/web/mb5/images/h-pp.png') }}"/>
                            </div>
                            <h3>PP電子</h3>
                            <img src="{{ asset('/web/mb5/images/re.gif') }}" class="re"/>
                            <p>PPAMING</p>
                        </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bd">
                <div class="gameBoxWrap fl">
                    <div id="gameBox1" class="gameBoxItem hide" style="display: block;">

                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_14.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>冰上曲棍球</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>

                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_15.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>宝石之轮</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_17.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>银行抢匪2</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_16.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>花花公子</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>

                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_30.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>不朽的浪漫</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_31.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>丛林快讯</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>

                    </div>


                    <div id="gameBox2" class="gameBoxItem hide">
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_32.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>三个小丑</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_33.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>复仇者联盟</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_34.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>船长的宝藏</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>

                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_35.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>古怪猴子</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_36.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>钢铁侠2</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/pic_37.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>雷神</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>

                    </div>

                    <div id="gameBox3" class="gameBoxItem hide">

                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q1.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>糖果派对</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>

                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q2.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>超级7</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q3.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>圣兽传说</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q4.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>喜福猴年</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q5.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>连环夺宝</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q6.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>金瓶梅2</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;" onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=2','','width=1024,height=768')">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>

                    </div>

                    <div id="gameBox4" class="gameBoxItem hide">

                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q7.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>灵猴献瑞</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>

                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q8.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>捕魚王二代</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q9.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>复古花园</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q10.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>麻将老虎机</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q11.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>水果拉霸</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>
                        <div class="item6">
                            <img src="{{ asset('/web/mb5/images/q12.png') }}" width="142" height="140">
                            <h2></h2>
                            <p>太空漫游</p>
                            <div class="cornerCC"></div>
                            <dl>
                                <a href="javascript:;">
                                    <dt>立即游戏</dt>
                                </a>
                            </dl>
                        </div>

                    </div>


                </div>
                <div class="gameBoxTxtWrap fl">
                    <div class="sy_m_box">
                        <div class="sy_m hide" id="gameBox1Txt" style="display:block">
                            <div class="sy_m1">
                                <img src="{{ asset('/web/mb5/images/ioc-qiandai.png') }}" alt="">
                                <span>MG彩金奖池</span>
                            </div>
                            <div class="sy_m2">
                                <div class="game-view">
                                    <div class="jackpot">
                                        CNY <span>3850310</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sy_m hide" id="gameBox2Txt">
                            <div class="sy_m1">
                                <img src="{{ asset('/web/mb5/images/ioc-qiandai.png') }}" alt="">
                                <span>PT彩金奖池</span>
                            </div>
                            <div class="sy_m2">
                                <div class="game-view">
                                    <div class="jackpot">
                                        CNY <span>7960310.08</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sy_m hide" id="gameBox3Txt">
                            <div class="sy_m1">
                                <img src="{{ asset('/web/mb5/images/ioc-qiandai.png') }}" alt="">
                                <span>BBIN彩金奖池</span>
                            </div>
                            <div class="sy_m2">
                                <div class="game-view">
                                    <div class="jackpot">
                                        CNY <span>7960843</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sy_m hide" id="gameBox4Txt">
                            <div class="sy_m1">
                                <img src="{{ asset('/web/mb5/images/ioc-qiandai.png') }}" alt="">
                                <span>AG彩金奖池</span>
                            </div>
                            <div class="sy_m2">
                                <div class="game-view">
                                    <div class="jackpot">
                                        CNY <span>5623420</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sy_m hide" id="gameBox5Txt">
                            <div class="sy_m1">
                                <img src="{{ asset('/web/mb5/images/ioc-qiandai.png') }}" alt="">
                                <span>OG彩金奖池</span>
                            </div>
                            <div class="sy_m2">
                                <div class="game-view">
                                    <div class="jackpot">
                                        CNY <span>7960310.08</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <!--榜单-->

                    <div class="am_r">
                        <div class="l_top">
                            <img src="{{ asset('/web/mb5/images/ico-jb.png') }}" alt="">
                            <span>超级赢家榜</span>
                        </div>
                        <div class="l_bot">
                            <span>客户ID</span>
                            <span>金额</span>
                            <span>游戏名称</span>
                        </div>
                        <div class="list_lh">
                            <div class="bd2">
                                <ul>
                                    <li class="lieven">
                                        <span>ba***k</span>
                                        <span>3243.00</span>
                                        <span>舌尖上的点心</span>
                                    </li>
                                    <li>
                                        <span>le***e</span>
                                        <span>4937.00</span>
                                        <span>摇钱树</span>
                                    </li>
                                    <li class="lieven">
                                        <span>bb***m</span>
                                        <span>1269.00</span>
                                        <span>沙漠寻宝</span>
                                    </li>
                                    <li>
                                        <span>le***e</span>
                                        <span>1478.00</span>
                                        <span>雷霆战神</span>
                                    </li>
                                    <li class="lieven">
                                        <span>vv***e</span>
                                        <span>13662.00</span>
                                        <span>金瓶梅</span>
                                    </li>
                                    <li>
                                        <span>ja***k</span>
                                        <span>26557.00</span>
                                        <span>热血棒球</span>
                                    </li>
                                    <li class="lieven">
                                        <span>dj***1</span>
                                        <span>12623.00</span>
                                        <span>沙漠寻宝</span>
                                    </li>
                                    <li class="lieven">
                                        <span>Ev***n</span>
                                        <span>16892.00</span>
                                        <span>黑手党</span>
                                    </li>
                                    <li>
                                        <span>vv***e</span>
                                        <span>31545.00</span>
                                        <span>四大美女</span>
                                    </li>
                                    <li class="lieven">
                                        <span>Do***n</span>
                                        <span>2596.00</span>
                                        <span>热血棒球</span>
                                    </li>
                                    <li>
                                        <span>zh***K</span>
                                        <span>1576.00</span>
                                        <span>沙滩比基尼</span>
                                    </li>
                                    <li class="lieven">
                                        <span>qw***q</span>
                                        <span>3699.00</span>
                                        <span>深海探险</span>
                                    </li>
                                    <li>
                                        <span>As***f</span>
                                        <span>4563.00</span>
                                        <span>深海探险</span>
                                    </li>
                                    <li class="lieven">
                                        <span>Do***n</span>
                                        <span>7178.00</span>
                                        <span>沙漠寻宝</span>
                                    </li>
                                    <li>
                                        <span>fw***1</span>
                                        <span>8931.00</span>
                                        <span>黑手党</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
</div>

<div class="mainBox3">
    <div class="manu">
        <div class="w">
            <div class="manu_t">
                <ul>
                    <li class="st_a">
                        <div class="or_1">
                            <img src="{{ asset('/web/mb5/images/live_icon.png') }}"/>
                            <h3>CASINO</h3>
                            <p>
                                <span>九大顶级視訊，</span>
                                <em>给您最丰富的视觉感受</em>
                            </p>
                        </div>
                        <div class="or_m"></div>
                        <div class="or_2">
                            <ul>
                                <li class="uu_1">
                                    <a href="javascript:void(0)"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    >
                                        <h3>AG 視訊</h3>
                                        <p>立即游戏</p>
                                    </a>
                                </li>
                                <li class="uu_2">
                                    <a href="javascript:void(0)"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    >
                                        <h3>BB 視訊</h3>
                                        <p>立即游戏</p>
                                    </a>
                                </li>
                                <li class="uu_3">
                                    <a href="javascript:void(0)"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    >
                                        <h3>MG 視訊</h3>
                                        <p>立即游戏</p>
                                    </a>
                                </li>
                                <li class="uu_7">
                                    <a href="javascript:void(0)"
                                       @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=ALLBET&game_type=1','','width=1024,height=768')"
                                       @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                                    >
                                        <h3>AB 視訊</h3>
                                        <p>立即游戏</p>
                                    </a>
                                </li>

                                {{--<li class="uu_5">
                                    <a href="javascript:void(0)">
                                        <h3>OG 視訊</h3>
                                        <p>立即游戏</p>
                                    </a>
                                </li>--}}
                                {{--<li class="uu_4">--}}
                                {{--<a href="javascript:void(0)">--}}
                                {{--<h3>LEBO厅</h3>--}}
                                {{--<p>立即游戏</p>--}}
                                {{--</a>--}}
                                {{--</li>--}}

                                {{--<li class="uu_6">--}}
                                {{--<a href="javascript:void(0)">--}}
                                {{--<h3>DS 視訊</h3>--}}
                                {{--<p>立即游戏</p>--}}
                                {{--</a>--}}
                                {{--</li>--}}

                                {{--<li class="uu_8">--}}
                                {{--<a href="javascript:void(0)">--}}
                                {{--<h3>HG 視訊</h3>--}}
                                {{--<p>立即游戏</p>--}}
                                {{--</a>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                    </li>
                    <li class="st_b tag-new" style="cursor:pointer;">
                        <div class="or_1">
                            <a href="javascript:void(0)"
                               @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=AG&game_type=1','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif
                            >
                                <h3><img src="{{ asset('/web/mb5/images/img-ag.png') }}" alt=""></h3>
                                <h4>AG視訊</h4>
                                <p>
                                    亚洲唯一AV女忧<br>发牌
                                </p>
                            </a>
                        </div>
                    </li>
                    <li class="st_c">
                        <div class="or_1">
                            <a href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=MG&game_type=1','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                <h3><img src="{{ asset('/web/mb5/images/img-mg.png') }}" alt=""></h3>
                                <h4>MG視訊</h4>
                                <p>
                                    极致的博彩<br>
                                    用户体验
                                </p>
                            </a>
                        </div>
                    </li>
                    <li class="st_d" style="cursor:pointer;">
                        <div class="or_1">
                            <a href="javascript:void(0)" @if($_member) onclick="javascript:window.open('{{ route('game.playGame') }}?plat_type=BBIN&game_type=1','','width=1024,height=768')"
                               @else onclick="return layer.msg('请先登录!',{icon:6})" @endif>
                                <h3><img src="{{ asset('/web/mb5/images/img-bbin.png') }}" alt=""></h3>
                                <h4>BBIN視訊</h4>
                                <p>
                                    亚洲最流行的<br>
                                    真人娱乐
                                </p>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="mainBox4">
    <div class="w">
        <div class="mainBox4-inner">
            <h2>
                随时随地 手机轻松投注
            </h2>
            <p>
                手机投注平台面向全网玩家，提供近万款電子游艺、老虎机、百家乐以及彩票
                游戏、體育投注，线上存款及线上取款，一键操作， 运用3D即时运算创造真实
                场景结合立体影像，完整规划的跨系统娱乐平台，整合同步账号和资料传输，
                达到随时随地不间断娱乐的享受概念。
            </p>
            <p class="p2"><img src="{{ asset('/web/mb5/images/ico-ios.png') }}" alt=""><span>+</span><img
                        src="{{ asset('/web/mb5/images/ico-apk.png') }}" alt="">支持iOS &amp;
                Android所有移动设备</p>
        </div>
    </div>
</div>
<div class="mainBox5">
    <div class="w">
        <div class="aboutBox">
            <h2>
                关于我们
                <small>about us</small>
            </h2>
            <p>
                {{ $_system_config->site_name }}线上娱乐城拥有着一支来自全球博彩精英组合而成的世界顶尖级博彩服务团队与{{ $_system_config->site_name }}
                度假村斥巨资联合打造。
                <br/>在{{ $_system_config->site_name }}线上娱乐城我们提供”专注完美，近乎苛求”的高质量全方位服务，集团融合十大国际化平台，秉承“多平台技术”与“高质量服务”为主轴，
                <br/>献上最佳的客户服务和最优惠的支付方案，我们致力于为广大客户提供丰富多彩的博彩活动，并极力以最优越的客户服务及丰富的奖赏作回馈.
                <br/>本公司的经营理念是通过向顾客提供最佳的在线博彩及多元化的网上娱乐，以进一步拓展我们的业务。
                <br/>秉持非突破不可的信念，将{{ $_system_config->site_name }}打造成亚洲领先在线专业品牌。
            </p>
        </div>
    </div>
</div>
<script id="jsID" type="text/javascript">

</script>

<script>
    (function ($) {
        $(function () {
            $(".bannerBox").slide({
                mainCell: ".bd ul",
                effect: "fold",
                autoPlay: true,
                delayTime: 1000,
                interTime: 5000
            });


            $(".item6").hover(
                    function () {
                        var that = this;
                        item6Timer = setTimeout(function () {
                            $(that).find("div").animate({width: 142, height: 140, left: 0, top: 0}, 300, function () {
                                $(that).find("h2").fadeOut(200);
                                $(that).find("dl").fadeIn(200);
                            });
                        }, 100);

                    },
                    function () {
                        var that = this;
                        clearTimeout(item6Timer);
                        $(that).find("dl").fadeOut(200);
                        $(that).find("div").stop().animate({width: 0, height: 0, left: 20, top: 55}, 300);
                        $(that).find("h2").fadeIn(200);
                    }
            );

            //tab 切换
            $(".J-nav-tab").each(function () {
                $(this).find("a").mouseenter(function () {
                    var $this = $(this);
                    var $obj = $this.attr("href");
                    var $obj2 = $this.attr("href") + "Txt";
                    $(".J-nav-tab a").removeClass("on")
                    $this.addClass("on");
                    $($obj).show().siblings().hide()
                    $($obj2).show().siblings().hide()
                    return false;
                })
            });

            $(".list_lh").slide({mainCell: "ul", autoPlay: true, effect: "topMarquee", interTime: 50, vis: 5});


        })
    })(jQuery)
</script>
@endsection
