@extends('web.template.mb6.layouts.main')
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

    <div class="homeIndex">
        <div class="mainNotice" id="NoticeCenter">
            <!--公告栏组件-->
            <div class="Hscrolltxt">
                <marquee scrollamount="3" id="ele-msgNews" scrolldelay="100" direction="left" onmouseover="this.stop();"
                         onmouseout="this.start();"
                         style="cursor: pointer;line-height:32px;color:#fff;font-size:14px;">
                    @foreach($_system_notices as $v)
                        <span>~{{ $v->title }}~</span>
                        <span>{{ $v->content }}</span>
                    @endforeach
                </marquee>
            </div>
        </div>

        <div class="wrapper-skitter" style="margin-top: 118px;">
            <div class="box_skitter box_skitter_large" style="margin:0;padding:0">
                <ul>
                    {{--<li>--}}
                    {{--<a href="javascript:void(0)"><img src="{{ asset('/web/images/img/banner_vk.jpg') }}" class="cube"/></a>--}}

                    {{--</li>--}}
                    @foreach($banners as $item)
                    <li>
                        <a href="{{$item->jumpurl}}"><img src="{{$item->path}}" class="cubeRandom"/></a>

                    </li>
                    @endforeach
                    {{--<li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web/mb6/images/img/caip.jpg') }}" class="block"/></a>

                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web/mb6/images/img/bydr.jpg') }}" class="cube"/></a>

                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="{{ asset('/web/mb6/images/img/ywxj1.jpg') }}" class="cubeStop"/></a>

                    </li>--}}
                </ul>
            </div>
        </div>

        <ul class="mod-menu">
            <li><a href="{{ route('web.register_one') }}">注册</a></li>
            <li><a href="{{ route('member.finance_center') }}">存款</a></li>
            <li><a href="{{ route('member.member_drawing') }}">取款</a></li>
            <li><a href="{{ route('web.activityList') }}">优惠</a></li>
            <li><a href="">代理</a></li>
            <li><a class="item" href="javascript:void(0)">新手</a></li>
        </ul>

        <div class="TabMeunBox">
            <h3 class="gameBoxTix">电子游戏 SLOT MACHINE</h3>
            {{--<div class="numbox">--}}
            {{--<span class="num" id="num04"></span>--}}
            {{--<script>--}}
            {{--var i3 = 87100.25 + parseInt(Math.random() * 100, 10);--}}
            {{--var max3 = 1000000.00;--}}
            {{--var id3;--}}
            {{--function add3() {--}}
            {{--if (i3 < max3) {--}}
            {{--i3 += 10.5;--}}
            {{--id3 = setTimeout("add3()", 1000);--}}
            {{--if(i3<100000){--}}
            {{--document.getElementById("num04").innerHTML ="00"+i3;--}}
            {{--}else if(i3>100000&&i3==100000){--}}
            {{--document.getElementById("num04").innerHTML ="0"+i3;--}}
            {{--}--}}
            {{--}--}}
            {{--else {--}}
            {{--clearTimeout(id3);--}}
            {{--}--}}
            {{--}--}}
            {{--add3();--}}
            {{--</script>--}}
            {{--</div>--}}
                    <!--彩金 end-->

            <div class="tab_box">
                <div>
                    <ul class="list">
                        <li class="fleft">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('mg.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/02.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>大厨师</h3>
                                    <span class="i-sc">92,300</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('mg.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/03.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>抢银行</h3>
                                    <span class="i-sc">97,190</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <div class="clearfix"></div>
                        <li class="fleft">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('mg.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/05.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>冰上曲棍球</h3>
                                    <span class="i-sc">97,700</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('mg.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/01.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>不朽的浪漫</h3>
                                    <span class="i-sc">97,800</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>

                    </ul>
                </div>
                <!--MG end-->

                <div class="hide">
                    <ul class="list">
                        <li class="fleft">
                            <a href="javascript:;" onclick="javascript:window.open(' {{ route('pt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/1607161125512735.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>古怪猴子</h3>
                                    <span class="i-sc">96,190</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('pt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/1607161125543986.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>复仇者联盟</h3>
                                    <span class="i-sc">99,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <div class="clearfix"></div>
                        <li class="fleft">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('pt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/1607161125565397.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>招财进宝</h3>
                                    <span class="i-sc">86,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('pt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/1607161125591958.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>湛蓝深海</h3>
                                    <span class="i-sc">88,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                    </ul>
                </div>
                <!--PT end-->
                <!--AG-->
                <div class="hide">
                    <ul class="list">
                        <li class="fleft">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('ag.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513564843343.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>千炮捕鱼</h3>
                                    <span class="i-sc">85,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('ag.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513565143344.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>齐天大圣</h3>
                                    <span class="i-sc">88,110</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <div class="clearfix"></div>
                        <li class="fleft">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('ag.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513565543345.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>灵猴献瑞</h3>
                                    <span class="i-sc">97,900</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('ag.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513565943346.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>性感女仆</h3>
                                    <span class="i-sc">86,160</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                    </ul>
                </div>
                <!--AG end-->
                <div class="hide">
                    <ul class="list">
                        <li class="fleft">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('bbin.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513560143331.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>连环夺宝</h3>
                                    <span class="i-sc">84,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('bbin.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513560541732.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>糖果派对</h3>
                                    <span class="i-sc">88,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <div class="clearfix"></div>
                        <li class="fleft">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('bbin.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513560943333.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>斗鸡</h3>
                                    <span class="i-sc">93,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('bbin.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/16070513561343334.jpg') }}" alt="" />
                                <div class="tlebox">
                                    <h3>三国</h3>
                                    <span class="i-sc">97,100</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                    </ul>
                </div>
                <!--BBIN end-->
                <div class="hide">
                    <ul class="list">
                        <li class="fleft">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('pp.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/gp1.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>金瓶梅</h3>
                                    <span class="i-sc">83,570</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('pp.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/gp2.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>锦鲤纳福</h3>
                                    <span class="i-sc">94,154</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <div class="clearfix"></div>
                        <li class="fleft">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('pp.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/gp3.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>水果乐园</h3>
                                    <span class="i-sc">90,110</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('pp.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/gp4.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>四大美人</h3>
                                    <span class="i-sc">97,340</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                    </ul>
                </div>
                <!--BSG end-->
                <div class="hide">
                    <ul class="list">
                        <li class="fleft">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('vt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/hb3.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>罗马帝国</h3>
                                    <span class="i-sc">86,170</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:;" onclick="javascript:window.open('{{ route('vt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/hb1.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>发财神</h3>
                                    <span class="i-sc">91,189</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <div class="clearfix"></div>
                        <li class="fleft">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('vt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/hb2.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>狼贼夺宝</h3>
                                    <span class="i-sc">80,350</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                        <li class="fright">
                            <a href="javascript:void(0)" onclick="javascript:window.open('{{ route('vt.playGame') }}?gamename=MyGameLobby','','width=1024,height=768')">
                                <img src="{{ asset('/web/mb6/images/img/hb4.png') }}" alt="" />
                                <div class="tlebox">
                                    <h3>十二生肖</h3>
                                    <span class="i-sc">89,130</span>
                                </div>
                                <i class="i-jiao"></i>

                            </a>
                        </li>
                    </ul>
                </div>
                <!--GT end-->
            </div>
            <ul class="tab_menu">
                <li class="current"><a class="i-1" href="javascript:void(0)">MG电子</a></li>
                <li class="item"><a class="i-2" href="javascript:void(0)">PT电子</a></li>
                <li><a class="i-3" href="javascript:void(0)">AG电子</a></li>
                <li class="item"><a class="i-4" href="javascript:void(0)">BBIN电子</a></li>
                <li><a class="i-5" href="javascript:void(0)">GPI电子</a></li>
                <li class="item"><a class="i-6" href="javascript:void(0)">HB电子</a></li>
            </ul>
        </div>


        <div class="wrapper">
            <h3 class="gameBoxTix">更多精彩 尽在{{ $_system_config->site_name }}
                <p>More exciting to do in the Macao Interstellar</p>
            </h3>
            <ul class="gameBox">
                <li>
                    <a href="{{ route('web.liveCasino') }}">
                        <img alt="" src="{{ asset('/web/mb6/images/img/16070513552843322.png') }}">
                    </a>
                    <h3>真人娱乐 live dealer</h3>
                    <div class="line"></div>
                    <p>
                        {{ $_system_config->site_name }}集合十大真人娱乐平台，为您提供最顶级的娱乐体验，真人娱乐场天天返水高达1.2%
                    </p>
                </li>
                <li>
                    <a href="{{ route('web.esports') }}">
                        <img alt="" src="{{ asset('/web/mb6/images/img/16070513553244823.png') }}">
                    </a>
                    <h3>体育赛事 sport</h3>
                    <div class="line"></div>
                    <p>
                        英超、意甲、德甲、西甲等世界足坛顶尖赛事，让您畅享足球赛事的同时可以时刻体验体育投注的魅力。
                    </p>
                </li>
                <li class="item3">
                    <a href="{{ route('web.lottory') }}">
                        <img alt="" src="{{ asset('/web/mb6/images/img/16070513553646424.png') }}">
                    </a>
                    <h3>彩票游戏 lottery</h3>
                    <div class="line"></div>
                    <p>
                        江西时时彩，新疆时时彩，天津时时彩，广东快乐十分等，六合彩赔率业界最高48.2倍1
                    </p>
                </li>
            </ul>
        </div>
        <div class="APPbanner">
            <img class="app_erweima" src="{{ $_system_config->wap_qrcode }}" alt="">
        </div>
    </div>
@endsection
